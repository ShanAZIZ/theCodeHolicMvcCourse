<?php
namespace app\models;
use app\core\DbModel;

class User extends DbModel
{
    public String $firstname = '';
    public String $lastname = '';
    public String $email = '';
    public String $password = '';
    public String $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
    }
    
    public function register()
    {
       return $this->save();
    }

    public function rules() :array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes() : array    
    {
        return ['firstname', 'lastname', 'email', 'password'];
    }

}