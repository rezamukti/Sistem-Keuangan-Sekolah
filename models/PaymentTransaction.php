<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_transaction".
 *
 * @property integer $id
 * @property integer $student_nis
 * @property integer $payment_for_id
 * @property string $payment_for_name
 * @property string $year
 * @property string $price_invoice
 * @property string $student_paid
 * @property integer $payment_status_id
 * @property integer $payment_method_id
 * @property integer $user_id
 * @property string $create_at
 */
class PaymentTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_nis', 'payment_for_id', 'payment_status_id', 'payment_method_id', 'user_id'], 'integer'],
            [['student_nis', 'payment_for_id', 'student_paid', 'payment_method_id','month'], 'required', 'message' => 'Harus diisi.'],
            [['year', 'create_at'], 'safe'],
            [['price_invoice', 'student_paid'], 'number'],
            [['payment_for_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_nis' => 'No Induk Siswa',
            'payment_for_id' => 'Pembayaran Untuk',
            'payment_for_name' => 'Pembayaran Untuk',
            'month' => 'Bulan',
            'year' => 'Tahun',
            'price_invoice' => 'Harga tagihan dari sekolah / yg harus dibayar oleh siswa',
            'student_paid' => 'Diterima sebesar Rp.',
            'payment_status_id' => 'Status',
            'payment_method_id' => 'Metode Pembayaran',
            'user_id' => 'user penerima pembayaran',
            'create_at' => 'Tanggal Bayar',
        ];
    }
}
