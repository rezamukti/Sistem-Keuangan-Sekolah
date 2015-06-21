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
 * This is the model class for table "religion".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Student[] $students
 */
class StudentImport extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    public function rules()
    {
        return [
            [['file'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'nis',
            // 'full_name' => 'name',
        ];
    }

}
