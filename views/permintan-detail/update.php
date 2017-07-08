<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PermintanDetail */

$this->title = 'Update Permintan Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Permintan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php echo $this->render('_form', [
'model' => $model,
]); ?>

