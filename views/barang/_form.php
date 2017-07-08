<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
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
            echo $form->field($model, 'nm_barang')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'ket_barang')->textarea(['rows' => 6]); 

    echo $form->field($model, 'harga_beli')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'margin_jual')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'harga_jual')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'id_satuan_kecil')->textInput(); 

    echo $form->field($model, 'id_satuan_besar')->textInput(); 

    echo $form->field($model, 'id_kategori')->textInput(); 

    echo $form->field($model, 'id_lokasi')->textInput(); 

    echo $form->field($model, 'stock')->textInput(); 

    echo $form->field($model, 'min_stock')->textInput(); 

    echo $form->field($model, 'user_id')->textInput(); 

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


