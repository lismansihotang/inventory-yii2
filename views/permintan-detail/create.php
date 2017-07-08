<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PermintanDetail */

$this->title = 'Create Permintan Detail';
$this->params['breadcrumbs'][] = ['label' => 'Permintan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


