<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesOrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Order Details';
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
            <?php echo Html::a('<i class="glyphicon glyphicon-plus"> </i> '.'Create Sales Order Detail', ['create'], ['class' => 'btn btn-success']); ?>
        </p>
                            <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                        'id',
            'so_id',
            'id_barang',
            'jml',
            'harga',
            // 'subtotal',

            ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
            </div>
    <div class="box-footer">

    </div>
</div>

