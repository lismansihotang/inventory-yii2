<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
app\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>
<body class="layout-boxed skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?php echo $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    );
    echo $this->render(
        'left.php',
        ['directoryAsset' => $directoryAsset]
    );
    echo $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ); ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
