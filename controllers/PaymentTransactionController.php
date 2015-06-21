<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */

namespace app\controllers;

use Yii;
use app\models\PaymentTransaction;
use app\models\PaymentTransactionSearch;
use app\models\PaymentFor;
use app\models\PaymentTransactionLog;
use app\models\SettingSystem;
use app\models\Student;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Request;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use mPDF;
use kartik\mpdf\Pdf;
/**
 * PaymentTransactionController implements the CRUD actions for PaymentTransaction model.
 */
class PaymenttransactionController extends Controller
{
    public function behaviors()
    {
        return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' =>[
        'delete' => ['post'],
        ],
        ],
        'access' => [
        'class' => AccessControl::className(),
        'only' => ['update', 'index', 'create', 'delete', 'view', 'pdf'],
        'rules' =>  [
        [
        'actions' => ['update', 'index', 'create', 'view', 'pdf'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        ];
    }

    /**
     * Lists all PaymentTransaction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentTransactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single PaymentTransaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new PaymentTransaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaymentTransaction();

        if ($model->load(Yii::$app->request->post())) {
            if (!Student::find()->where(['nis' => $model->student_nis])->exists()) {
                $checkNIS=null;
                $model->addError('student_nis', "No Induk $model->student_nis tidak ada dalam Data Siswa.");
            } else {
                $checkNIS=true;
            }
        }


        if ($model->load(Yii::$app->request->post()) && $checkNIS!== null) {

            $paymentFor = PaymentFor::findOne($model->payment_for_id);

            $model->payment_for_name = $paymentFor->name;
            $model->price_invoice = $paymentFor->price;
            $model->year = $paymentFor->year;
            $model->user_id = Yii::$app->user->getId();

            if ($model->student_paid == $paymentFor->price) {
                $model->payment_status_id = 1; // LUNAS
            } elseif($model->student_paid < $paymentFor->price) {
                $model->payment_status_id = 2; // Kurang
            }elseif($model->student_paid > $paymentFor->price){
                $model->payment_status_id = 3; // Lebih
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing PaymentTransaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (!Student::find()->where(['nis' => $model->student_nis])->exists()) {
                $checkNIS=null;
                $model->addError('student_nis', "No Induk $model->student_nis tidak ada dalam Data Siswa.");
            } else {
                $checkNIS=true;
            }
        }


        if ($model->load(Yii::$app->request->post()) && $checkNIS !== null) {

            // Start logging table transaction
            $beforeUpdate = PaymentTransaction::findOne($id);
            $log = new PaymentTransactionLog();
            $log->user_id = Yii::$app->user->getId();
            $log->ip_address = $request->userIP;
            $log->user_agent = $request->userAgent;
            $log->url = $request->absoluteUrl;
            $log->user_host = $request->userHost;
            $log->payment_transaction_id = $id;
            $log->before_update = 'NIS : '.$beforeUpdate->student_nis.' | Pembayaran Untuk :'. $beforeUpdate->payment_for_name. ' | Sebesar :'. $beforeUpdate->student_paid.' | Bulan :'.$beforeUpdate->month. ' | Metode Pembayaran :'.$beforeUpdate->payment_method_id;
            $log->after_update = 'NIS : '.$model->student_nis.' | Pembayaran Untuk :'. $model->payment_for_name. ' | Sebesar :'. $model->student_paid.' | Bulan :'.$model->month. ' | Metode Pembayaran :'.$model->payment_method_id;
            $log->save();
            // End logging table transaction

            $model->update_at = date('Y-m-d H:i:s');
            $model->save(); // update payment transcation

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing PaymentTransaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PaymentTransaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaymentTransaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaymentTransaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPdf($id) {
        $pdf = new Pdf(['format' => 'A5']); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        // $mpdf->SetHeader($settingSystem->name); // call methods or set any properties
        // $mpdf->SetHeader($settingSystem->address); // call methods or set any properties
        $mpdf->WriteHtml($this->renderPartial('pdf',['model' => $this->findModel($id)])); // call mpdf write html
        $mpdf->Output(); // call the mpdf api output as needed
        exit;
    }




}
