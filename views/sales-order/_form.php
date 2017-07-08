<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */
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
            echo $form->field($model, 'tgl')->textInput(); 

    echo $form->field($model, 'no_po')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'tgl_po')->textInput(); 

    echo $form->field($model, 'id_supplier')->textInput(); 

    echo $form->field($model, 'id_customer')->textInput(); 

    echo $form->field($model, 'no_pengiriman')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'tgl_pengiriman')->textInput(); 

    echo $form->field($model, 'lokasi_pengiriman')->textarea(['rows' => 6]); 

    echo $form->field($model, 'subtotal')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'disc')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'ppn')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'total')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'insert_date')->textInput(); 

    echo $form->field($model, 'insert_user')->textInput(); 

    echo $form->field($model, 'update_date')->textInput(); 

    echo $form->field($model, 'update_user')->textInput(); 

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


