<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermintanDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintan-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_permintaan') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'harga') ?>

    <?= $form->field($model, 'jml') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
