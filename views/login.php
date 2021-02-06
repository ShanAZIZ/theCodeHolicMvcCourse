<?php
/** @var $model \app\models\User */
?>

<h1>Login</h1>

<?php $form = \shan\mvcPhpCore\form\Form::begin('', "post"); ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?= \shan\mvcPhpCore\form\Form::end() ?>
