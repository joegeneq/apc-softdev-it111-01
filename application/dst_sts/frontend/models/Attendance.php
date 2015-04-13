<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property integer $id
 * @property string $attendance_date
 * @property string $attendance_status
 * @property integer $student_id
 *
 * @property Student $student
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attendance_date', 'attendance_status', 'student_id'], 'required'],
            [['attendance_date'], 'safe'],
            [['attendance_status'], 'string'],
            [['student_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attendance_date' => 'Attendance Date',
            'attendance_status' => 'Attendance Status',
            'student_id' => 'Student Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
