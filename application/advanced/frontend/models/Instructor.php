<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instructor".
 *
 * @property integer $id
 * @property string $instructorfirstname
 * @property string $instructorlastname
 * @property string $instructoradmissiondate
 *
 * @property Account[] $accounts
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
            [['instructorfirstname', 'instructorlastname'], 'required'],
            [['instructoradmissiondate'], 'safe'],
            [['instructorfirstname', 'instructorlastname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instructorfirstname' => 'Instructorfirstname',
            'instructorlastname' => 'Instructorlastname',
            'instructoradmissiondate' => 'Instructoradmissiondate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['instructor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['instructor_id' => 'id']);
    }
}
