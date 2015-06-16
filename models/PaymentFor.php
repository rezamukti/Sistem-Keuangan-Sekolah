<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_for".
 *
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property string $price
 * @property string $semester_id
 * @property string $soft_delete
 */
class PaymentFor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_for';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'soft_delete'], 'safe'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 15],
            [['semester_id'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'year' => 'Year',
            'price' => 'Price',
            'semester_id' => 'Semester ID',
            'soft_delete' => 'Soft Delete',
        ];
    }
}
