<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

Yii::setAlias('@icon', '../uploads/');
$this->title = 'KPI Template โรงพยาบาลพบพระ';
?>

<section class="content-header">
    <h1>
        ประมวลผลข้อมูล
        <small>ปีงบประมาณ <?= $yy ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ผู้ป่วยนอก(คน/ครั้ง)</span>
                    <span class="info-box-number"><?= number_format($modelOPDHN); ?><small> / </small><?= number_format($modelOPDVN); ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"><a href="pages/examples/invoice.html">รายละเอียด</a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ผู้ป่วยใน(คน/ครั้ง)</span>
                    <span class="info-box-number"><?= number_format($modelHN); ?><small> / </small><?= number_format($modelVN); ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"><a href="pages/examples/invoice.html">รายละเอียด</a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">จำนวนวันนอน(วัน)</span>
                    <span class="info-box-number"><?= number_format($modelDay); ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"><a href="pages/examples/invoice.html">รายละเอียด</a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-ambulance" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">การส่งต่อ(ครั้ง)</span>
                    <span class="info-box-number"><?= number_format($modelReferVN); ?></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"><a href="pages/examples/invoice.html">รายละเอียด</a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">Label</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    echo Highcharts::widget([
                        'options' => [
                            'chart' => ['type' => 'spline'],
                            'title' => ['text' => 'ค่า CMI ผู้ป่วยใน'],
                            'xAxis' => [
                                'categories' => ['ต.ค.60', 'พ.ย.60', 'ธ.ค.60', 'ม.ค.61', 'ก.พ.61']
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'จำนวนครั้ง']
                            ],
                            'series' => [
                                //['name' => 'Jane', 'data' => [1, 0, 4]],
                                ['name' => 'ผู้ป่วยนอก', 'data' => [0.23, 0.30, 0.35, 0.41, 0.46]]
                            ]
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">5 อันดับโรคผู้ป่วยนอก</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">Label</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    echo Highcharts::widget([
                        'options' => [
                            'chart' => ['type' => 'bar'],
                            'title' => ['text' => '5 อันดับโรคผู้ป่วยนอก'],
                            'xAxis' => [
                                'categories' => ['ท้องร่วง', 'ไข้เลือดออก', 'มาลาเรีย', 'ทางเดินอาหาร', 'ไข้หวัดใหญ่']
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'จำนวนครั้ง']
                            ],
                            'series' => [
                                //['name' => 'Jane', 'data' => [1, 0, 4]],
                                ['name' => 'ผู้ป่วยนอก', 'data' => [15, 17, 13, 20, 12]]
                            ]
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">5 อันดับโรคผู้ป่วยใน</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">Label</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    echo Highcharts::widget([
                        'options' => [
                            'chart' => ['type' => 'bar'],
                            'title' => ['text' => '5 อันดับโรคผู้ป่วยใน'],
                            'xAxis' => [
                                'categories' => ['ท้องร่วง', 'ไข้เลือดออก', 'มาลาเรีย', 'ทางเดินอาหาร', 'ไข้หวัดใหญ่']
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'จำนวนครั้ง']
                            ],
                            'series' => [
                                //['name' => 'Jane', 'data' => [1, 0, 4]],
                                ['name' => 'ผู้ป่วยใน', 'data' => [5, 7, 3, 10, 2]]
                            ]
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">ปิรามิดประชากร</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="label label-primary">Label</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    echo Highcharts::widget([
                        'options' => [
                            'chart' => ['type' => 'bar'],
                            'title' => ['text' => 'ปิรามิดประชากร ปี 2560'],
                            'xAxis' => [[
                            'categories' => [
                                '0-4', '5-9', '10-14', '15-19',
                                '20-24', '25-29', '30-34', '35-39', '40-44',
                                '45-49', '50-54', '55-59', '60-64', '65-69',
                                '70-74', '75-79', '80-84', '85-89', '90-94',
                                '95-99', '100 + '
                            ],
                            'reversed' => false,
                            'labels' => ['step' => 1]
                                ],
                                [
                                    'opposite' => true,
                                    'reversed' => FALSE,
                                    'categories' => [
                                        '0-4', '5-9', '10-14', '15-19',
                                        '20-24', '25-29', '30-34', '35-39', '40-44',
                                        '45-49', '50-54', '55-59', '60-64', '65-69',
                                        '70-74', '75-79', '80-84', '85-89', '90-94',
                                        '95-99', '100 + '
                                    ],
                                    'linkedTo' => 0,
                                    'labels' => ['step' => 1]
                                ],
                            ],
                            'yAxis' => [
                                'title' => ['text' => NULL],           
                            ],
                            'plotOptions' => ['series' => ['stacking' => 'normal']],     
                            'series' => [
                                ['name' => 'Male', 'data' => [-2.2, -2.2, -2.3, -2.5, -2.7, -3.1, -3.2,-3.0, -3.2, -4.3, -4.4, -3.6, -3.1, -2.4,-2.5, -2.3, -1.2, -0.6, -0.2, -0.0, -0.0]],
                                ['name' => 'Female', 'data' => [2.1, 2.0, 2.2, 2.4, 2.6, 3.0, 3.1, 2.9,3.1, 4.1, 4.3, 3.6, 3.4, 2.6, 2.9, 2.9,1.8, 1.2, 0.6, 0.1, 0.0]]
                            ]
                        ]
                    ]);
                    ?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    The footer of the box
                </div><!-- box-footer -->
            </div><!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
    
    <!-- /.row -->

    <!-- Main row -->
    
    <!-- /.row -->
</section>
<!-- /.content -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>

