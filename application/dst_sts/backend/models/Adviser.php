<?php

namespace backend\models;

use Yii;

use common\models\User;

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
            [['adviser_full_name'], 'string', 'max' => 255],
            ['user_id', 'unique', 'message' => "This account has already been assigned."],
            ['adviser_full_name', 'unique', 'message' => "This adviser has already been assigned."],
            ['section_id', 'unique', 'message' => "This section has already been assigned."],
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
            'user_id' => 'Account Username',
            'section_id' => 'Section',
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
