<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel suPnPsu\room\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ห้องทั้งหมด');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='box box-info'>
    <div class='box-header'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>
        <div class="room-index">

            <?php Pjax::begin(); ?>    
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'title',
                    'support_no',
                    'building',
                    'class',
                    'close_up',
                    // 'status',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
<?php Pjax::end(); ?>        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
