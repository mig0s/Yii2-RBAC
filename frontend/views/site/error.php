<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($exception->statusCode == '404'): ?>
        <p class="text-danger lead">The system was not able to locate whatever you were looking for</p>
        <div class="alert alert-danger"><h1>404</h1></div>
    <?php elseif($exception->statusCode == '403'): ?>
        <p class="text-danger lead">You are not in the right place</p>
        <div class="alert alert-danger"><h1>403</h1></div>
    <?php else: ?>
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    <?php endif; ?>
    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
</div>