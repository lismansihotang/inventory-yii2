<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermintanDetail */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo Html::encode($this->title); ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php 

$form = ActiveForm::begin();
            echo $form->field($model, 'id_permintaan')->textInput(); 

    echo $form->field($model, 'id_barang')->textInput(); 

    echo $form->field($model, 'harga')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'jml')->textInput(); 

    echo $form->field($model, 'subtotal')->textInput(['maxlength' => true]); 

 ?>        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord ?
                                '<i class="glyphicon glyphicon-floppy-disk"> </i> '.'Create'                                : '<i class="glyphicon glyphicon-floppy-disk"> </i> '.'Update', ['class' => $model->isNewRecord ? 'btn
                                btn-success' : 'btn btn-primary']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="box-footer">

    </div>
</div>


