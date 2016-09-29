<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model suPnPsu\room\models\Room */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>
        <div class="room-view">

            <!--<h1><?= Html::encode($this->title) ?></h1>-->

            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>
            
            
            <div style="padding:20px;font-size:18px;background-color: <?=$model->stylies->backgroundColor?>;color:<?=$model->stylies->textColor?>;border:5px solid <?=$model->stylies->borderColor?>;">
                <?=$model->title?>
            </div>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',                    
                    //'title',
                    'code',
                    'support_no',
                    'building',
                    'class',
                    'close_up',
                    'status',
                    'created_at',
                    'created_by',
                    'updated_at',
                    'updated_by',
                ],
            ])
            ?>

        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
