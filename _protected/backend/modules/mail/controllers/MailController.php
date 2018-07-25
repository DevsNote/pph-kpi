<?php

namespace backend\modules\mail\controllers;

use yii\web\Controller;
use Yii;
class MailController extends \yii\web\Controller {

    public function actionIndex() {
        /*
        $model = new ContactForm();
        if ($model->sendmail('naynote@gmail.com')) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }
         * 
         */
        Yii::$app->mailer->compose()
                ->setFrom('service.phobphrahospital@gmail.com')
                ->setTo('naynote@gmail.com')
                ->setSubject('test send mail')
                ->setTextBody('test send mail from yii2')
                ->send();
        return $this->render('index');
    }

}
