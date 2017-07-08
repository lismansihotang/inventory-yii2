<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Supplier;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
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
        echo $form->field($model, 'tgl')->widget(
            DatePicker::className(),
            [
                'options'       => ['placeholder' => 'Pilih Tanggal Pemesanan', 'value' => date('Y-m-d')],
                'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
        );
        echo $form->field($model, 'id_supplier')->widget(
            Select2::className(),
            [
                'data'          => ArrayHelper::map(Supplier::find()->all(), 'id', 'nm_supplier'),
                'options'       => ['placeholder' => 'Pilih Nama Supplier...'],
                'pluginOptions' => ['allowClear' => true],
            ]
        );
        ?>
        <div class="form-group">
            <?php echo Html::submitButton(
                $model->isNewRecord ? '<i class="glyphicon glyphicon-floppy-disk"> </i> Create' : '<i class="glyphicon glyphicon-floppy-disk"> </i> Update',
                [
                    'class' => $model->isNewRecord ? 'btn
                                btn-success' : 'btn btn-primary'
                ]
            ); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="box-footer">

    </div>
</div>


