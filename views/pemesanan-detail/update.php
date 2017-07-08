<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananDetail */

$this->title = 'Update Pemesanan Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php echo $this->render('_form', [
'model' => $model,
]); ?>

