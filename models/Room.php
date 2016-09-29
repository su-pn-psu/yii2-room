<?php

namespace suPnPsu\room\models;

use Yii;
use suPnPsu\user\models\User;
use suPnPsu\reserveRoom\models\RoomReserve;
use yii\helpers\ArrayHelper;
use wowkaster\serializeAttributes\SerializeAttributesBehavior;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property integer $support_no
 * @property string $building
 * @property string $class
 * @property string $close_up
 * @property integer $status
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property RoomReserve[] $roomReserves
 */
class Room extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['title', 'status', 'created_at', 'created_by'], 'required'],
                [['support_no', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
                [['style'], 'safe'],
                [['code'], 'string', 'max' => 10],
                [['title', 'building', 'class', 'close_up'], 'string', 'max' => 200],
                [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
                [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'รหัส'),
            'code' => Yii::t('app', 'รหัสห้อง'),
            'title' => Yii::t('app', 'ชื่อห้อง'),
            'support_no' => Yii::t('app', 'รองรับ(คน)'),
            'building' => Yii::t('app', 'อาคาร'),
            'class' => Yii::t('app', 'ชั้น'),
            'close_up' => Yii::t('app', 'อยู่ใกล้กับ/ติดกับ'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_at' => Yii::t('app', 'ปรับปรุงเมื่อ'),
            'updated_by' => Yii::t('app', 'ปรับปรุงโดย'),
            'style' => Yii::t('app', 'สไลล์'),
            'details' => Yii::t('app', 'รายละเอียด'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomReserves() {
        return $this->hasMany(RoomReserve::className(), ['room_id' => 'id']);
    }

    public static function getList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }

    public function getActivities() {
        $activities = $this->roomReserves;

        $event = [];
        if ($activities) {
            foreach ($activities as $act) {
                $event[] = [
                    'start' => Yii::$app->formatter->asTimestamp($act->date_start . ' ' . $act->time_start),
                    'end' => Yii::$app->formatter->asTimestamp($act->date_start . ' ' . $act->time_end),
                ];
            }
        }

        return $event;
    }

    ###########################
//    public $style_color;
//    public $style_bgColor;

    public function behaviors() {
        return [
                [
                'class' => SerializeAttributesBehavior::className(),
                'convertAttr' => ['style' => 'serialize']
            ]
        ];
    }    

    public function getStylies() {
        return $this->style ? (object) $this->style : null;
    }
    
    public function getDetails(){
//        'support_no' => Yii::t('app', 'รองรับ(คน)'),
//            'building' => Yii::t('app', 'อาคาร'),
//            'class' => Yii::t('app', 'ชั้น'),
//            'close_up' => Yii::t('app', 'อยู่ใกล้กับ/ติดกับ'),
        $str = [];
        $str[] = $this->support_no?'รองรับ '.$this->support_no.' คน':'';
        $str[] = $this->building?' อาคาร'.$this->building:'';
        $str[] = $this->class?' ชั่น'.$this->class:'';
        $str[] = $this->close_up?' ติดกับ'.$this->close_up:'';
                
        return @implode(' ', @array_filter($str));
    }
    
    

}
