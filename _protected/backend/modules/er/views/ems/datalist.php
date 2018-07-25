<?php

use yii\helpers\Html;
use kartik\grid\GridView;
?>
<div class="row col-lg-12">
    <div class="well">
        <div class="box-tools pull-left">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <?= Html::a('<i class="fa fa-times"></i> close', ['index'], ['class' => 'btn btn-danger btn-xs']) ?>
                </div><!-- /.box-tools -->
                <?php
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'attribute' => 'date_service',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'hn',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'vn',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'sp',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'mi',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'st',
                            'vAlign' => 'middle',
                        ],
                        [
                            'attribute' => 'ems',
                            'vAlign' => 'middle',
                        ],
                    ],
                    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                    'toolbar' => [

                        '{export}',
                        '{toggleData}'
                    ],
                    'pjax' => true,
                    'bordered' => true,
                    'striped' => false,
                    'condensed' => false,
                    'responsive' => true,
                    'hover' => true,
                    'floatHeader' => true,
                    //'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
                    'showPageSummary' => true,
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY
                    ],
                ]);
                ?>
    </div>
    
</div>