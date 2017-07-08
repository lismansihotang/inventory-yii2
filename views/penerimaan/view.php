<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penerimaan */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penerimaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
        <div class="btn-group margin-bottom-5">
            <?php echo Html::a(
                '<i class="glyphicon glyphicon-home"> </i> ' . 'Home',
                ['index'],
                [
                    'class' => 'btn btn-sm
                                btn-success'
                ]
            );
            if ($model->status === 'New') {
                echo Html::a(
                    '<i class="glyphicon glyphicon-edit"> </i> ' . 'Update',
                    ['update', 'id' => $model->id],
                    [
                        'class'
                        => 'btn btn-sm btn-primary'
                    ]
                );
                echo Html::a(
                    '<i class="glyphicon glyphicon-trash"> </i> ' . 'Delete',
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]
                );
            }
            ?>
        </div>
        <h1 class="pull-right"><?php
            echo number_format($model->total) . ' ';
            if ($model->status === 'New') {
                echo '<div class="btn-group">';
                echo Html::a(
                    '<i class="glyphicon glyphicon-adjust"> </i> Batalkan Penerimaan',
                    ['cancel', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => [
                            'confirm' => 'Yakin akan membatalkan penerimaan ini?',
                            'method' => 'post',
                        ],
                    ]
                );
                echo Html::a(
                    '<i class="glyphicon glyphicon-floppy-saved"> </i> Simpan Penerimaan',
                    ['finish', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-success',
                        'data' => [
                            'confirm' => 'Yakin akan menyimpan penerimaan ini?',
                            'method' => 'post',
                        ],
                    ]
                );
            }
            echo '</div>';
            ?></h1>
        <?php echo DetailView::widget(
            [
                'model' => $model,
                'attributes' => [
                    'id',
                    'tgl',
                    'id_pemesanan',
                    'subtotal',
                    'ppn',
                    'disc',
                    'total',
                ],
            ]
        ); ?>
    </div>
    <div class="box-footer">
        <br>
        <?php
        if ($model->status === 'New') {
            $form = ActiveForm::begin(
                [
                    'method' => 'post',
                    'action' => 'index.php?r=penerimaan/proses-data&id=' . $model->id,
                    'options' => ['class' => 'form-horizontal']
                ]
            );
            if (count($detail) > 0) {
                foreach ($detail as $row) {
                    echo '<div class="form-group">';
                    echo Html::label($row['nm_barang'], 'nm_barang', ['class' => 'col-sm-4']);
                    echo '<div class="col-sm-2">';
                    echo Html::hiddenInput('id_barang[]', $row['id_barang']);
                    echo Html::hiddenInput('qty[]', $row['qty']);
                    echo Html::hiddenInput('harga[]', $row['harga']);
                    echo Html::textInput('qty_terima[]', $row['qty'], ['class' => 'form-control']);
                    echo '</div>';
                    echo Html::label(
                        '(' . number_format($row['harga']) . ' / ' . number_format(
                            $row['subtotal']
                        ) . ')',
                        'qty',
                        ['class' => 'col-sm-2']
                    );
                    echo '</div>';
                }
            }
            echo '<div class="form-group">';
            echo '<div class="col-sm-4">';
            echo Html::submitButton(
                '<i class="glyphicon glyphicon-floppy-disk"> </i> Save',
                ['class' => 'btn btn-sm btn-success']
            );
            echo '</div>';
            echo '</div>';
            ActiveForm::end();
        }
        ?>
    </div>
</div>



