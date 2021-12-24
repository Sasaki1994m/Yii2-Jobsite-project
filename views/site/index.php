<?php

/* @var $this yii\web\View */

// $this->title = 'My Yii Application';
$this->title = 'Ultimate Job Website ';
?>
<div class="site-index">
<?php
// $identity = Yii::$app->user->identity;
// var_dump("認証結果${identity}");
?>
    <?php
        $msg = yii::$app->getSession()->getFlash('success'); 
        if(null !==$msg): ?>
        <div class="alert alert-primary"><?= $msg; ?></div>
        <?php endif;?>

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Ultimate Job Website! </h1>

        <p class="lead">Browse our open job listing or find employees</p>

        <p><a class="btn btn-lg btn-primary" href="index.php?r=job">Start Browsing</a>
        <a class="btn btn-lg btn-success" href="index.php?r=job/create">Create Listing</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Browse Listing</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="index.php?r=job">Browse Now &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Find Employees</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="">Find Now &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Join Now</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="index.php?r=/user/register">Join Now &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
