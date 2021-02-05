<?php


namespace app\core\form;


abstract class UserModel extends \app\core\DbModel
{

    abstract public function getDisplayName(): string;
}