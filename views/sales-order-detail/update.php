<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrderDetail */

$this->title = 'Update Sales Order Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sales Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php echo $this->render('_form', [
'model' => $model,
]); ?>

