<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $id
 * @property string $section_name
 * @property string $section_level
 *
 * @property Adviser[] $advisers
 * @property Student[] $students
 * @property Subject[] $subjects
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_name', 'section_level'], 'required'],
            [['section_name', 'section_level'], 'string', 'max' => 45],
            ['section_name', 'unique', 'message' => "This section exists."],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_name' => 'Name',
            'section_level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvisers()
    {
        return $this->hasMany(Adviser::className(), ['section_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['section_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['section_id' => 'id']);
    }
}
