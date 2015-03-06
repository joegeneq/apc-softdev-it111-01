<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parent".
 *
 * @property integer $id
 * @property string $parentfirstname
 * @property string $parentlastname
 * @property string $parentgender
 * @property string $parentcontactnumber
 * @property string $parentaddress
 *
 * @property Student[] $students
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['parentfirstname', 'parentlastname', 'parentgender', 'parentcontactnumber', 'parentaddress'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentfirstname' => 'Parentfirstname',
            'parentlastname' => 'Parentlastname',
            'parentgender' => 'Parentgender',
            'parentcontactnumber' => 'Parentcontactnumber',
            'parentaddress' => 'Parentaddress',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['parent_id' => 'id']);
    }
}
