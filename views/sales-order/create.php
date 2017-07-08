<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */

$this->title = 'Create Sales Order';
$this->params['breadcrumbs'][] = ['label' => 'Sales Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


