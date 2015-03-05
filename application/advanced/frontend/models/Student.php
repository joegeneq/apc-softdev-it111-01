<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $studentidnumber
 * @property string $studentfirstname
 * @property string $studentlastname
 * @property string $studentgender
 * @property string $studentbirthdate
 * @property string $studentaddress
 * @property string $studentadmissiondate
 * @property integer $stuentlevel
 * @property string $studentstatus
 * @property integer $parent_id
 *
 * @property Attendance[] $attendances
 * @property Parent $parent
 * @property Subject[] $subjects
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
            [['studentbirthdate', 'studentadmissiondate'], 'safe'],
            [['stuentlevel', 'parent_id'], 'integer'],
            [['parent_id'], 'required'],
            [['studentidnumber', 'studentfirstname', 'studentlastname', 'studentgender', 'studentaddress', 'studentstatus'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'studentidnumber' => 'Studentidnumber',
            'studentfirstname' => 'Studentfirstname',
            'studentlastname' => 'Studentlastname',
            'studentgender' => 'Studentgender',
            'studentbirthdate' => 'Studentbirthdate',
            'studentaddress' => 'Studentaddress',
            'studentadmissiondate' => 'Studentadmissiondate',
            'stuentlevel' => 'Stuentlevel',
            'studentstatus' => 'Studentstatus',
            'parent_id' => 'Parent ID',
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
    public function getParent()
    {
        return $this->hasOne(Parent::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['student_id' => 'id']);
    }
}
