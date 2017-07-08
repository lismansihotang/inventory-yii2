<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Permintaan */

$this->title = 'Create Permintaan';
$this->params['breadcrumbs'][] = ['label' => 'Permintaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


