<?php

namespace suPnPsu\room\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
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
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['support_no', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'building', 'class', 'close_up'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัส'),
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
        ];
    }
}
