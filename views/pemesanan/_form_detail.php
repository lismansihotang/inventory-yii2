<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Barang;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananDetail */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail List Barang</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php
            $form = ActiveForm::begin(['action' => ['pemesanan-detail/create']]);
            echo $form->field($model, 'id_pemesanan')->hiddenInput(['value' => $id])->label(false);
            echo $form->field($model, 'id_barang')->widget(
                Select2::className(),
                [
                    'data'          => ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang'),
                    'options'       => ['placeholder' => 'Pilih Barang...'],
                    'pluginOptions' => ['allowClear' => true],
                ]
            );
            echo $form->field($model, 'qty')->textInput();
            echo $form->field($model, 'harga')->textInput(['maxlength' => true]);
            echo $form->field($model, 'subtotal')->textInput(['maxlength' => true]);
            ?>
            <div class="form-group">
                <?php echo Html::submitButton(
                    $model->isNewRecord ?
                        '<i class="glyphicon glyphicon-floppy-disk"> </i> ' . 'Create' : '<i class="glyphicon glyphicon-floppy-disk"> </i> ' . 'Update',
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
<?php
$js = <<<JS
$('#pemesanandetail-id_barang').on('change',function(){
        $.ajax({
           url: '?r=pemesanan-detail/item-price',
           dataType:'json',
           data: {id: $(this).val()},
           success: function(harga) {
               $('#pemesanandetail-harga').val(harga);
           },
           error: function(){
            alert('Error!!! Some function not run');
            }
        });
});

$('#pemesanandetail-qty').on('change',function(){
    var qty = parseInt($(this).val());
    if(qty !== ''){
        var harga = parseInt($('#pemesanandetail-harga').val());
        var subtotal = qty*harga;
        $('#pemesanandetail-subtotal').val(subtotal);
    }
});
JS;
$this->registerJs($js);
