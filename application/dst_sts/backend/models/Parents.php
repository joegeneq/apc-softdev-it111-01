<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "parents".
 *
 * @property integer $id
 * @property string $parents_first_name
 * @property string $parents_last_name
 * @property string $parents_contact_number
 * @property string $parents_address
 * @property integer $user_id
 * @property integer $student_id
 *
 * @property Student $student
 * @property User $user
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parents_first_name', 'parents_last_name', 'user_id', 'student_id'], 'required'],
            [['user_id', 'student_id'], 'integer'],
            [['parents_first_name', 'parents_last_name', 'parents_contact_number'], 'string', 'max' => 45],
            [['parents_address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parents_first_name' => 'Parents First Name',
            'parents_last_name' => 'Parents Last Name',
            'parents_contact_number' => 'Parents Contact Number',
            'parents_address' => 'Parents Address',
            'user_id' => 'User ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
