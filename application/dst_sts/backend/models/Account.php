<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $acounttype
 * @property string $accountusername
 * @property string $accountpassword
 * @property string $accountdateregistered
 * @property string $accountstatus
 * @property integer $instructor_id
 * @property integer $admin_id
 * @property integer $parents_id
 *
 * @property Admin $admin
 * @property Instructor $instructor
 * @property Parents $parents
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acounttype', 'accountusername', 'accountpassword', 'accountstatus', 'instructor_id', 'admin_id', 'parents_id'], 'required'],
            [['accountdateregistered'], 'safe'],
            [['instructor_id', 'admin_id', 'parents_id'], 'integer'],
            [['acounttype', 'accountusername', 'accountpassword', 'accountstatus'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acounttype' => 'Type',
            'accountusername' => 'Username',
            'accountpassword' => 'Password',
            'accountdateregistered' => 'Date Registered',
            'accountstatus' => 'Status',
            'instructor_id' => 'Instructor ID',
            'admin_id' => 'Admin ID',
            'parents_id' => 'Parents ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
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
    public function getParents()
    {
        return $this->hasOne(Parents::className(), ['id' => 'parents_id']);
    }
}
