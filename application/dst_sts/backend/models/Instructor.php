<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "instructor".
 *
 * @property integer $id
 * @property string $instructor_first_name
 * @property string $instructor_last_name
 * @property string $instructor_gender
 * @property string $instructor_admission_date
 * @property integer $user_id
 *
 * @property User $user
 * @property InstructorHasSubject[] $instructorHasSubjects
 * @property Subject[] $subjects
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instructor_first_name', 'instructor_last_name', 'user_id'], 'required'],
            [['instructor_gender'], 'string'],
            [['instructor_admission_date'], 'safe'],
            [['user_id'], 'integer'],
            [['instructor_first_name', 'instructor_last_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instructor_first_name' => 'Instructor First Name',
            'instructor_last_name' => 'Instructor Last Name',
            'instructor_gender' => 'Instructor Gender',
            'instructor_admission_date' => 'Instructor Admission Date',
            'user_id' => 'User ID',
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
    public function getInstructorHasSubjects()
    {
        return $this->hasMany(InstructorHasSubject::className(), ['instructor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['instructor_id' => 'id']);
    }
}
