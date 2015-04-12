<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $student_id_number
 * @property string $student_first_name
 * @property string $student_last_name
 * @property string $student_gender
 * @property string $student_birthdate
 * @property string $student_address
 * @property string $student_admission_date
 * @property integer $student_level
 * @property string $student_status
 * @property integer $section_id
 *
 * @property Attendance[] $attendances
 * @property Parents[] $parents
 * @property Section $section
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id_number', 'student_first_name', 'student_last_name', 'student_gender', 'student_admission_date', 'student_level', 'student_status', 'section_id'], 'required'],
            ['student_id_number', 'unique', 'targetClass' => '\backend\models\Student', 'message' => 'This student ID has already been taken.'],
            [['section_id'], 'integer'],
            [['student_gender', 'student_status'], 'string'],
            [['student_birthdate', 'student_admission_date'], 'safe'],
            [['student_id_number', 'student_first_name', 'student_last_name'], 'string', 'max' => 45],
            [['student_address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id_number' => 'Id Number',
            'student_first_name' => 'First Name',
            'student_last_name' => 'Last Name',
            'student_gender' => 'Gender',
            'student_birthdate' => 'Birthdate',
            'student_address' => 'Address',
            'student_admission_date' => 'Admission Date',
            'student_level' => 'Level',
            'student_status' => 'Status',
            'section_id' => 'Section Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Parents::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }
}
