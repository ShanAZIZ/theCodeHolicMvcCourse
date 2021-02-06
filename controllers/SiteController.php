<?php

namespace app\controllers;

use shan\mvcPhpCore\Application;
use shan\mvcPhpCore\Controller;
use shan\mvcPhpCore\Request;
use shan\mvcPhpCore\Response;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => "Shan"
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact',
        [
            'model' => $contact
        ]);
    }
}