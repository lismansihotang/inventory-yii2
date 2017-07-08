<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pemesanan') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
