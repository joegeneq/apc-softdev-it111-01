<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $id
 * @property string $section_name
 * @property string $section_level
 * @property integer $adviser_id
 *
 * @property Adviser $adviser
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
            [['id', 'section_name', 'section_level', 'adviser_id'], 'required'],
            [['id', 'adviser_id'], 'integer'],
            [['section_name', 'section_level'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_name' => 'Section Name',
            'section_level' => 'Section Level',
            'adviser_id' => 'Adviser ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdviser()
    {
        return $this->hasOne(Adviser::className(), ['id' => 'adviser_id']);
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
