<?php

namespace backend\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "parents".
 *
 * @property integer $id
 * @property string $parents_full_name
 * @property string $parents_contact_number
 * @property string $parents_address
 * @property integer $student_id
 * @property integer $user_id
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
            [['parents_full_name', 'student_id', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['parents_full_name', 'parents_address'], 'string', 'max' => 255],
            [['parents_contact_number'], 'string', 'max' => 45],
            [['user_id'], 'unique', 'message' => "This account has already been assigned."],
            [['parents_full_name'], 'unique', 'message' => "This parent has already been assigned."],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parents_full_name' => 'Full Name',
            'parents_contact_number' => 'Contact Number',
            'parents_address' => 'Address',
            'student_id' => "Student's Full Name",
            'user_id' => 'Account Username',
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
