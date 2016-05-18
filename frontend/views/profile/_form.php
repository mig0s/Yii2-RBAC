<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/**
 * @var yii\web\View $this
 * @var frontend\models\Profile $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="profile-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
    <?php echo $form->field($model,'birthdate')->widget(DatePicker::className(),
        ['clientOptions' => ['dateFormat' => 'yy-mm-dd']]); ?>
    <?= $form->field($model, 'gender_id')->dropDownList($model->genderList,
        ['prompt' => 'Please Choose One' ]);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>