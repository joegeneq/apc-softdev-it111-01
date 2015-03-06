<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $subjectcode
 * @property string $subjectname
 * @property integer $student_id
 * @property integer $instructor_id
 *
 * @property Assessment[] $assessments
 * @property Instructor $instructor
 * @property Student $student
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'instructor_id'], 'required'],
            [['student_id', 'instructor_id'], 'integer'],
            [['subjectcode', 'subjectname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subjectcode' => 'Subjectcode',
            'subjectname' => 'Subjectname',
            'student_id' => 'Student ID',
            'instructor_id' => 'Instructor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssessments()
    {
        return $this->hasMany(Assessment::className(), ['subject_id' => 'id', 'subject_student_id' => 'student_id', 'subject_instructor_id' => 'instructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['id' => 'instructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
