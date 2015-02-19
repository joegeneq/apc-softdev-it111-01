<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $city_code
 * @property string $city_description
 * @property integer $province_id
 * @property integer $province_id1
 * @property integer $province_region_id1
 *
 * @property Province $provinceId1
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'province_id1', 'province_region_id1'], 'integer'],
            [['province_id1', 'province_region_id1'], 'required'],
            [['city_code', 'city_description'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_code' => 'City Code',
            'city_description' => 'City Description',
            'province_id' => 'Province ID',
            'province_id1' => 'Province Id1',
            'province_region_id1' => 'Province Region Id1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinceId1()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id1', 'region_id1' => 'province_region_id1']);
    }
}