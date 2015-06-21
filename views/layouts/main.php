<?php


 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */



use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\SettingSystem;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="KaryaKami.com">
    <meta name="email" content="ycared@gmail.com">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => SettingSystem::findOne(1)->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [

                Yii::$app->user->isGuest ?'':
                    ['label' => 'Transaksi Pembayaran', 'url' => ['/paymenttransaction'],
                        'options'=>['class'=>'dropdown'],
                        'items' => [
                            ['label' => 'Pembayaran', 'url' => ['/paymenttransaction']],
                            ['label' => 'Jenis Pembayaran', 'url' => ['/paymentfor']],
                            ['label' => 'Metode Pembayaran', 'url' => ['/paymentmethod']],
                            // ['label' => 'Status Pembayaran', 'url' => ['/paymentstatus']],
                        ]

                    ],
                    Yii::$app->user->isGuest ?'':
                    ['label' => 'Data Siswa', 'url' => ['/student'],
                        // 'options'=>['class'=>'dropdown'],
                        // 'items' => [
                        //     ['label' => 'Siswa', 'url' => ['/student']],
                        //     ['label' => 'Kelas', 'url' => ['/kelas']],
                        //     ['label' => 'Semester', 'url' => ['/semester']],
                        //     ['label' => 'Status Siswa', 'url' => ['/studentstatus']],
                        //     ['label' => 'Agama', 'url' => ['/religion']],
                        //     ['label' => 'Provinsi', 'url' => ['/province']],
                        //     ['label' => 'Kabupate ', 'url' => ['/regency']],
                        //     ['label' => 'Kab / Kota', 'url' => ['/city']],
                        //     ['label' => 'Jenis Kelamin', 'url' => ['/gender']],
                        // ]
                    ],
                    Yii::$app->user->isGuest ?'':
                    ['label' => 'Pengaturan', 'url' => ['/settingsystem']],

                    // ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->full_name . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">Hak Cipta &copy; <a href="http://karyakami.com">KaryaKami.com</a> <?= date('Y') ?></p>
            <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
