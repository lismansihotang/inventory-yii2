<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'so_id') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'jml') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
