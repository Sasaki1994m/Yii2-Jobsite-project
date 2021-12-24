<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $category app\models\Category */
/* @var $form ActiveForm */
$this->title = 'Create A Category - Ultimate Job Website ';
?>
<div class="maincontent">
    <div class="category-create">
    <h2 class="page-header border-bottom">Add New Cagegory </h2>
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($category, 'name') ?>
        
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div><!-- category-create -->
</div>