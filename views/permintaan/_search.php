<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermintaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'id_toko') ?>

    <?= $form->field($model, 'subtotal') ?>

    <?= $form->field($model, 'disc') ?>

    <?php // echo $form->field($model, 'jml') ?>

    <?php // echo $form->field($model, 'ppn') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'insert_user') ?>

    <?php // echo $form->field($model, 'insert_date') ?>

    <?php // echo $form->field($model, 'update_user') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
