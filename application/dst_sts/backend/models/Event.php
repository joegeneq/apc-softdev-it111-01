<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $event_title
 * @property string $event_date
 * @property string $event_venue
 * @property string $event_description
 * @property string $event_status
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
            [['event_title', 'event_status'], 'required'],
            [['event_date'], 'safe'],
            [['event_description', 'event_status'], 'string'],
            [['event_title'], 'string', 'max' => 45],
            [['event_venue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_title' => 'Title',
            'event_date' => 'Date',
            'event_venue' => 'Venue',
            'event_description' => 'Description',
            'event_status' => 'Status',
        ];
    }
}
