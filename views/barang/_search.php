<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nm_barang') ?>

    <?= $form->field($model, 'ket_barang') ?>

    <?= $form->field($model, 'harga_beli') ?>

    <?= $form->field($model, 'margin_jual') ?>

    <?php // echo $form->field($model, 'harga_jual') ?>

    <?php // echo $form->field($model, 'id_satuan_kecil') ?>

    <?php // echo $form->field($model, 'id_satuan_besar') ?>

    <?php // echo $form->field($model, 'id_kategori') ?>

    <?php // echo $form->field($model, 'id_lokasi') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'min_stock') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
