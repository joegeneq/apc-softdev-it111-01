<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $eventtitle
 * @property string $eventdate
 * @property string $eventvenue
 * @property string $eventdescription
 * @property string $eventstatus
 * @property integer $admin_id
 *
 * @property Admin $admin
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin_id'], 'required'],
            [['id', 'admin_id'], 'integer'],
            [['eventdate'], 'safe'],
            [['eventtitle', 'eventvenue', 'eventdescription', 'eventstatus'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'eventtitle' => 'Eventtitle',
            'eventdate' => 'Eventdate',
            'eventvenue' => 'Eventvenue',
            'eventdescription' => 'Eventdescription',
            'eventstatus' => 'Eventstatus',
            'admin_id' => 'Admin ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }
}
