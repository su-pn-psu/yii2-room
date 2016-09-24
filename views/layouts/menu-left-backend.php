<?php

use yii\bootstrap\Html;
use mdm\admin\components\Helper;
use yii\helpers\Url;

$module  = $this->context->module->id;
?>
<?php $this->beginContent('@app/views/layouts/main.php') ?>

<div class="row">
    <div class="col-md-3 hidden-print">


<?php if (Yii::$app->user->can('staff')): ?>
            <a href="<?= Url::to(["/{$module}/default/create"]) ?>" class="btn btn-success btn-block margin-bottom"><i class="fa fa-plus"></i> เพิ่มห้อง</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        ระบบจัดการห้อง
                    </h3>

                </div>
                <div class="box-body no-padding">




                    <?php
                    $menuItems = [
                            [
                            'label' => Html::icon('cloud-upload') . ' ' . Yii::t('app', 'ห้องทั้งหมด'),
                            'url' => ['/room/default/index'],
                        ],
                            [
                            'label' => Html::icon('inbox') . ' ' . Yii::t('app', 'ห้องที่กำลังใช้งาน'),
                            'url' => ['/room/default/use'],
                        ],
                    ];

                    $menuItems = Helper::filter($menuItems);
                    $menuItems = suPnPsu\borrowMaterial\components\FrontendNavigate::genCount($menuItems);
                    //$nav = new Navigate();
                    echo dmstr\widgets\Menu::widget([
                        'options' => ['class' => 'nav nav-pills nav-stacked'],
                        'encodeLabels' => false,
                        //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                        'items' => $menuItems,
                    ])
                    ?>
                </div>
            </div>



        <?php endif; ?>



    </div>
    <!-- /.col -->


    <div class="col-md-9">
        <div class="box">
            <?= $content ?>
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->


</div>


<?php $this->endContent(); ?>