<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', ['model' => $model,]); ?>


