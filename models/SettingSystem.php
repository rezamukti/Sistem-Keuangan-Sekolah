<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


namespace app\models;

use Yii;

/**
 * This is the model class for table "setting_system".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $email
 * @property string $telp
 */
class SettingSystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'telp', 'regency'], 'required', 'message' => 'Harus diisi!'],
            [['name', 'description'], 'string', 'max' => 245],
            [['address'], 'string', 'max' => 445],
            [['email', 'telp'], 'string', 'max' => 45],
            [['email'], 'email', 'message' => 'Format email tidak benar.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Sekolah',
            'description' => 'Description',
            'address' => 'Alamat Lengkap Sekolah',
            'email' => 'Email',
            'telp' => 'Telp',
            'regency' => 'Kabupaten/Kota',
        ];
    }
}
