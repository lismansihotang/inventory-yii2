<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerimaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Penerimaans';
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

        <p class="pull-right">
            <?php echo Html::a(
                '<i class="glyphicon glyphicon-plus"> </i> ' . 'Create Penerimaan',
                ['create'],
                ['class' => 'btn btn-success']
            );
            $gridColumns = [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'tgl',
                'id_pemesanan',
                'subtotal',
                'ppn',
                'disc',
                'total'
            ];
            echo ExportMenu::widget(
                [
                    'dataProvider'    => $dataProvider,
                    'columns'         => $gridColumns,
                    'fontAwesome'     => true,
                    'dropdownOptions' => [
                        'label' => 'Export Data',
                        'class' => 'btn btn-info'
                    ]
                ]
            );
            ?>
        </p>
        <?php
        echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'tgl',
                    'id_pemesanan',
                    'subtotal',
                    'ppn',
                    'disc',
                    'total',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]
        ); ?>
    </div>
    <div class="box-footer">

    </div>
</div>

