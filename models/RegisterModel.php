<?php
namespace app\models;
use app\core\Model;

class RegisterModel extends Model
{
    public String $firstname = '';
    public String $lastname = '';
    public String $email = '';
    public String $password = '';
    public String $confirmPassword = '';
    
    public function register(){
       echo 'creating new user'; 
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

}