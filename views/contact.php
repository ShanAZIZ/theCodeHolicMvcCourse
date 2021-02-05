<?php
use \app\core\form\TextAreaField;
use \app\core\form\Form;
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForms */
$this->title = 'Contact';


?>

<h1>Contact</h1>
<?php $form = Form::begin('', 'post') ?>
<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'email') ?>
<?= new TextAreaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php $form = Form::end() ?>
