<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penerimaan */

$this->title = 'Update Penerimaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penerimaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php echo $this->render('_form', [
'model' => $model,
]); ?>

