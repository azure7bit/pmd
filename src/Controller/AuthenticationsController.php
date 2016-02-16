<?php
  namespace App\Controller;

  use App\Controller\AppController;
  use Cake\Event\Event;
  use Cake\Mailer\Email;

  /**
   * Authentications Controller
   *
   * @property \App\Model\Table\AuthenticationsTable $Authentications
   */
  class AuthenticationsController extends AppController
  {
    public function initialize(){
      parent::initialize();
      $this->viewbuilder()->layout('applicant');
      $this->Auth->allow('captcha');
    }

    public function login(){
      $this->loadModel('Applicants');
      if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
          $this->Auth->setUser($user);
          return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error('Your username or password is incorrect.');
      }
    }

    public function register(){
      $this->loadModel('Applicants');
      if ($this->request->is('post')) {
        $user = $this->Applicants->setCaptcha('captcha', $this->Captcha->getCode('captcha'));
        var_dump($user);
        $user = $this->Applicants->newEntity($this->request->data);
        if ($this->Applicants->save($user)) 
        {
          // $this->Auth->setUser($user->toArray());
          $email = new Email('default');
          $email->viewVars(['full_name' => $user->full_name])
                ->template('validation')
                ->emailFormat('html')
                ->subject('Email verification')
                ->to($user->email)
                ->send();
          $this->Flash->error('Email verification has been sent.');
          return $this->redirect(['controller'=>'Homes', 'action' => 'index']);
        }
      }

    }
    
    public function logout()
    {
      $this->Flash->success('You are now logged out.');
      return $this->redirect($this->Auth->logout());
    }

    public function setting(){}

    public function captcha()  {
      $this->autoRender = false;
      $this->layout='ajax';
      // if(!isset($this->Captcha))  { //if you didn't load in the header
      //     $this->Captcha = $this->loadComponent('Captcha'); //load it
      // }
      $this->Captcha->create();
    }
  }
