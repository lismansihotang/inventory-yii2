<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">#<?php echo Html::encode($this->title); ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="btn-group margin-bottom-5">
            <?php echo Html::a(
                '<i class="glyphicon glyphicon-home"> </i> Home',
                ['index'],
                [
                    'class' => 'btn btn-sm
                                btn-success'
                ]
            );
            if ($model->status === 'New' OR $model->status === 'Progress') {
                echo Html::a(
                    '<i class="glyphicon glyphicon-edit"> </i> Update',
                    ['update', 'id' => $model->id],
                    [
                        'class'
                        => 'btn btn-sm btn-primary'
                    ]
                );
                echo Html::a(
                    '<i class="glyphicon glyphicon-trash"> </i> Delete',
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]
                );
            } ?>
        </div>
        <h1 class="pull-right"><?php
            echo number_format($model->total) . ' ';
            if ($model->status === 'New' OR $model->status === 'Progress') {
                echo '<div class="btn-group">';
                echo Html::a(
                    '<i class="glyphicon glyphicon-adjust"> </i> Batalkan Pemesanan',
                    ['cancel', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => [
                            'confirm' => 'Yakin akan membatalkan pemesanan ini?',
                            'method' => 'post',
                        ],
                    ]
                );
                echo Html::a(
                    '<i class="glyphicon glyphicon-floppy-saved"> </i> Simpan Pemesanan',
                    ['finish', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-success',
                        'data' => [
                            'confirm' => 'Yakin akan menyimpan pemesanan ini?',
                            'method' => 'post',
                        ],
                    ]
                );
                echo '</div>';
            }
            ?></h1>
        <?php
        echo DetailView::widget(
            [
                'model' => $model,
                'attributes' => [
                    'tgl',
                    'supplier.nm_supplier',
                ],
            ]
        ); ?>
    </div>
    <div class="box-footer">
        <?php
        if ($model->status === 'New' OR $model->status === 'Progress') {
            echo $this->render('_form_detail', ['model' => $modelDetail, 'id' => $model->id]);
        }
        ?>
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th class="width-5">No</th>
                <th>Nama Barang</th>
                <th class="width-5">Harga</th>
                <th class="width-5">Qty</th>
                <th class="width-5">Subtotal</th>
                <td class="width-5"></td>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($recordPemesananDetail) > 0) {
                $i = 1;
                foreach ($recordPemesananDetail as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['nm_barang']; ?></td>
                        <td class="text-right"><?php echo number_format($row['harga']); ?></td>
                        <td class="text-right"><?php echo number_format($row['qty']); ?></td>
                        <td class="text-right"><?php echo number_format($row['subtotal']); ?></td>
                        <td>
                            <?php
                            if ($model->status === 'New' OR $model->status === 'Progress') {
                                echo Html::a('<i class="glyphicon glyphicon-trash"> </i>', ['pemesanan-detail/delete', 'id' => $row['id'], 'id_pemesanan' => $model->id], ['title' => 'Delete Detail #' . $row['id'], 'data' => ['confirm' => 'Hapus Detail Penerimaan dengan Id:#' . $row['id'], 'method' => 'post']]);
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



