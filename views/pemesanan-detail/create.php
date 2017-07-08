<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PemesananDetail */

$this->title = 'Create Pemesanan Detail';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


