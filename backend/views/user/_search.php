<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'username') ?>
    <?php echo $form->field($model, 'email') ?>
    <?= $form->field($model, 'role_id')->dropDownList(User::getroleList(),
        [ 'prompt' => 'Please Choose One' ]);?>
    <?= $form->field($model, 'user_type_id')->dropDownList(User::getuserTypeList(),
        [ 'prompt' => 'Please Choose One' ]);?>
    <?= $form->field($model, 'status_id')->dropDownList($model->statusList,
        [ 'prompt' => 'Please Choose One' ]);?>
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
