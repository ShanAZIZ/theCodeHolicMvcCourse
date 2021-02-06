<?php


namespace app\models;


class ContactForm extends \shan\mvcPhpCore\Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';
    public function rules()
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Enter your email',
            'body' => 'Enter your message',
        ];
    }
    public function send()
    {
        return true;
    }
}