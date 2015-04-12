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
 *
 * @property User $user
 * @property Section[] $sections
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
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
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
            'user_id' => "Adviser's Name",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['adviser_id' => 'id']);
    }
}
