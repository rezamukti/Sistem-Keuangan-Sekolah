<?php


 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


	use yii\helpers\Url;
	use yii\widgets\ActiveForm;

?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<input type="file" name="StudentImport[file]">
	<!-- <input type="text" name="StudentImport[nis]"> -->
	<input type="submit">
<!-- </form> -->
    <?php $form = ActiveForm::end(); ?>