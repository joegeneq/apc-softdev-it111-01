<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "adviser".
 *
 * @property integer $id
 * @property string $adviser_full_name
 * @property string $adviser_gender
 * @property integer $user_id
 * @property integer $section_id
 *
 * @property Section $section
 * @property User $user
 */
class Adviser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adviser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adviser_gender'], 'string'],
            [['user_id', 'section_id'], 'required'],
            [['user_id', 'section_id'], 'integer'],
            [['adviser_full_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adviser_full_name' => 'Full Name',
            'adviser_gender' => 'Gender',
            'user_id' => 'User Account Name',
            'section_id' => 'Section Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
