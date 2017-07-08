<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
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
            echo $form->field($model, 'nm_supplier')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'alamat')->textarea(['rows' => 6]); 

    echo $form->field($model, 'no_telp')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'no_fax')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'email')->textInput(['maxlength' => true]); 

 ?>        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord ? 'Create'                                : 'Update', ['class' => $model->isNewRecord ? 'btn
                                btn-success' : 'btn btn-primary']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="box-footer">

    </div>
</div>


