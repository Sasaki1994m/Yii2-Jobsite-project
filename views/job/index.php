<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = ' Jobs - Ultimate Job Website ';
?>
<h1 class="page-header">Jobs<a class="btn btn-primary float-right" href="/index.php?r=job/create">Create</a></h1>
<hr>
    <?php
        $msg = yii::$app->getSession()->getFlash('success'); 
        if(null !==$msg): ?>
        <div class="alert alert-primary"><?= $msg; ?></div>
    <?php endif;?>
<?php if(!empty($jobs)) : ?>
<div class="row">
    <?php foreach($jobs as $job) : ?>

        <?php
        // description
        $description = strip_tags($job->description);
        if (strlen($description) > 80) {
            $formated_des = substr($description, 0, 80);
            $description = substr($formated_des, 0, strrpos($formated_des, ' '));
        }
        // Listed On
        $mydate = strtotime($job->create_date);
        $dtfromat = date(" F j,Y ", $mydate);
        ?>

    <div class="col-sm-6 col-md-3 myjob">
        <h4><?= $job->title;  ?></h4>
        <p><strong>Description:</strong><?= $description;  ?></p>
        <p><strong>City:</strong><?= $job->city;  ?></p>
        <p><strong>Address:</strong><?= $job->address;  ?></p> 
        <p><strong>Listed On:</strong><?= $dtfromat;  ?></p>
        <a class="btn btn-outline-secondary float-right" href="/index.php?r=job/details&id=<?= $job->id;?>">Read More..</a>
    </div>
    <?php endforeach ; ?>
</div>
<?php else : ?>
    <p class="lead" >No Job to list</p>
<?php endif ;?>
<?= LinkPager::widget(['pagination' => $pagination ]); ?>