<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "adviser".
 *
 * @property integer $id
 * @property string $adviser_first_name
 * @property string $adviser_last_name
 * @property string $adviser_gender
 *
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
            [['id', 'adviser_first_name', 'adviser_last_name'], 'required'],
            [['id'], 'integer'],
            [['adviser_gender'], 'string'],
            [['adviser_first_name', 'adviser_last_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adviser_first_name' => 'First Name',
            'adviser_last_name' => 'Last Name',
            'adviser_gender' => 'Gender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['adviser_id' => 'id']);
    }
}
