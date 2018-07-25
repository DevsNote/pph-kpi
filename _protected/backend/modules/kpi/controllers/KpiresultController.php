<?php

namespace backend\modules\kpi\controllers;

use Yii;
use common\models\Kpiresult;
use backend\modules\kpi\models\KpiresultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Kpi;
use yii\data\SqlDataProvider;

/**
 * KpiresultController implements the CRUD actions for Kpiresult model.
 */
class KpiresultController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kpiresult models.
     * @return mixed
     */
    public function actionIndex() {
        $decrypt = \Yii::$app->security->decryptByKey($_GET['id'], \Yii::$app->request->cookieValidationKey);
        $model = Kpiresult::find()->where(['kpi_id' => $decrypt])->all();
        //$searchModel = new KpiresultSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider = $kpi_result;
        //echo $decrypt;
        //$model = Kpiresult::find()->all();
        $kpi = Kpi::findOne($decrypt);
        $kpi_name = $kpi['kpi_name'];

        if ($kpi['datasource'] == 'manual') {
            $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM kpi_result WHERE kpi_id=:publish', [':publish' => $decrypt])->queryScalar();
            $dataProvider = new SqlDataProvider([
                'sql' => 'SELECT id,kpi_id,kpi_year,quarter_1,quarter_2,quarter_3,quarter_4 FROM kpi_result WHERE kpi_id=:publish',
                'params' => [':publish' => $decrypt],
                'totalCount' => $totalCount,
                //'sort' =>false, to remove the table header sorting
                'sort' => [
                    'attributes' => [
                        'title' => [
                        //'asc' => ['title' => SORT_ASC],
                        //'desc' => ['title' => SORT_DESC],
                        //'default' => SORT_DESC,
                        //'label' => 'Post Title',
                        ],
                        'author' => [
                        //'asc' => ['author' => SORT_ASC],
                        //'desc' => ['author' => SORT_DESC],
                        //'default' => SORT_DESC,
                        //'label' => 'Name',
                        ],
                        'created_on'
                    ],
                ],
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('index', [
                        //'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'kpi_id' => $decrypt,
                        'model' => $model,
                        'kpi_name' => $kpi_name,
                        'kpi' => $kpi,
            ]);
        }elseif ($kpi['datasource'] == 'sql') {
            return $this->render('index2');
        }



        //Flash massage
        //Yii::$app->session->setFlash('info', 'Info Flash');
        //Yii::$app->session->setFlash('warning', 'Warning Flash');
        //Yii::$app->session->setFlash('danger', 'Primary Flash');
        //Yii::$app->session->setFlash('success', 'New Success Flash');
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kpiresult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $decrypt = \Yii::$app->security->decryptByKey($_GET['id'], \Yii::$app->request->cookieValidationKey);
        //echo $decrypt_id;
        $kpi = Kpi::find()->where(['id' => $decrypt])->one();
        $kpi_id = $kpi['id'];
        $kpi_name = 'ปรับปรุงข้อมูลปีงบประมาณ : ';
        $model = new Kpiresult();

        if ($model->load(Yii::$app->request->post())) {
            //$model->kpi_id = 1;
            $model->evaluation_period_id = 1;
            $model->created_at = new \yii\db\Expression('NOW()');
            $model->created_by = Yii::$app->user->identity->id;
            $model->save();
            $encrypt = \Yii::$app->security->encryptByKey($model->kpi_id, \Yii::$app->request->cookieValidationKey);
            return $this->redirect(['index', 'id' => $encrypt]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'decrypt_id' => $decrypt,
                    'kpi_name' => $kpi_name,
                    'kpi_id' => $kpi_id,
        ]);
    }

    /**
     * Updates an existing Kpiresult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        //$kpi = Kpi::find()->where([]);
        $kpi_name = 'ปรับปรุงข้อมูลปีงบประมาณ : ' . $model->kpi_year;

        $encrypt = \Yii::$app->security->encryptByKey($model->kpi_id, \Yii::$app->request->cookieValidationKey);

        if ($model->load(Yii::$app->request->post())) {
            $model->kpi_id = $model->kpi_id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->updated_by = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index', 'id' => $encrypt]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'decrypt_id' => $model->kpi_id,
                    'kpi_name' => $kpi_name,
                    'kpi_id' => $model->kpi_id,
        ]);
    }

    /**
     * Deletes an existing Kpiresult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kpiresult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kpiresult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Kpiresult::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
