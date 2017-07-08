<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'no_po') ?>

    <?= $form->field($model, 'tgl_po') ?>

    <?= $form->field($model, 'id_supplier') ?>

    <?php // echo $form->field($model, 'id_customer') ?>

    <?php // echo $form->field($model, 'no_pengiriman') ?>

    <?php // echo $form->field($model, 'tgl_pengiriman') ?>

    <?php // echo $form->field($model, 'lokasi_pengiriman') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'disc') ?>

    <?php // echo $form->field($model, 'ppn') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'insert_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
