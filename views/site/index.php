<div class="row">
    <?php
    use yii\bootstrap\Modal;

    /* @var $this yii\web\View */
    $this->title = 'Home';
    # Modal Form
    Modal::begin(
        [
            'id'            => 'modal',
            'size'          => 'modal-lg',
            'class'         => 'modal-success',
            'header'        => '<span id="modalHeaderTitle"></span>',
            'headerOptions' => ['id' => 'modalHeader']
        ]
    );
    echo '<div id="modalContent"></div>';
    Modal::end();
    # End Modal Form
    if (count($model) > 0) {
        foreach ($model as $key => $value) {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo count($value); ?></h3>

                        <p><?php echo strtoupper($key); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <a href="#" class="modalButtonView small-box-footer" title="<?php echo strtoupper($key); ?>">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div>