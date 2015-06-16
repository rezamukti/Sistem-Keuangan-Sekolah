<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $nisn
 * @property string $nik
 * @property string $full_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $gender_id
 * @property integer $religion_id
 * @property string $mother_name
 * @property string $father_name
 * @property string $parent_occupation
 * @property integer $province_id
 * @property integer $regency_id
 * @property string $address
 * @property integer $city_id
 * @property string $rt
 * @property string $rw
 * @property string $postal_code
 * @property string $no_hp
 * @property integer $class_id
 * @property integer $student_status_id
 *
 * @property Class $class
 * @property Gender $gender
 * @property Religion $religion
 * @property StudentStatus $studentStatus
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth_date'], 'safe'],
            [['gender_id', 'religion_id', 'province_id', 'regency_id', 'city_id', 'class_id', 'student_status_id'], 'integer'],
            [['nisn', 'nik'], 'string', 'max' => 15],
            [['full_name', 'mother_name', 'father_name', 'parent_occupation'], 'string', 'max' => 50],
            [['birth_place'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 500],
            [['rt', 'rw'], 'string', 'max' => 3],
            [['postal_code'], 'string', 'max' => 6],
            [['no_hp'], 'string', 'max' => 14]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nisn' => 'Nisn',
            'nik' => 'Nik',
            'full_name' => 'Full Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender ID',
            'religion_id' => 'Religion ID',
            'mother_name' => 'Mother Name',
            'father_name' => 'Father Name',
            'parent_occupation' => 'Parent Occupation',
            'province_id' => 'Province ID',
            'regency_id' => 'Regency ID',
            'address' => 'Address',
            'city_id' => 'city or Subdistrict 
',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'postal_code' => 'Postal Code',
            'no_hp' => 'No Hp',
            'class_id' => 'Class ID',
            'student_status_id' => 'Student Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
        return $this->hasOne(Religion::className(), ['id' => 'religion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentStatus()
    {
        return $this->hasOne(StudentStatus::className(), ['id' => 'student_status_id']);
    }


    
}
