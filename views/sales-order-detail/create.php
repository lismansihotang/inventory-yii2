<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesOrderDetail */

$this->title = 'Create Sales Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'Sales Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


