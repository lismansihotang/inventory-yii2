<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barangs';
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
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
        <p>
            <?php echo Html::a('<i class="glyphicon glyphicon-plus"> </i> '.'Create Barang', ['create'], ['class' => 'btn btn-success']); ?>
        </p>
                            <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                        'id',
            'nm_barang',
            'ket_barang:ntext',
            'harga_beli',
            'margin_jual',
            // 'harga_jual',
            // 'id_satuan_kecil',
            // 'id_satuan_besar',
            // 'id_kategori',
            // 'id_lokasi',
            // 'stock',
            // 'min_stock',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
            </div>
    <div class="box-footer">

    </div>
</div>

