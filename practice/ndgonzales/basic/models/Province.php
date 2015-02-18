<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $province_code
 * @property string $province_description
 * @property integer $region_id
 * @property integer $region_id1
 *
 * @property City[] $cities
 * @property Region $regionId1
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'region_id1'], 'integer'],
            [['region_id1'], 'required'],
            [['province_code', 'province_description'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_code' => 'Province Code',
            'province_description' => 'Province Description',
            'region_id' => 'Region ID',
            'region_id1' => 'Region Id1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['province_id1' => 'id', 'province_region_id1' => 'region_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionId1()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id1']);
    }
}
