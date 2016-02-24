<?php
  namespace App\Controller;

  use App\Controller\FrontsController;
  use Cake\Event\Event;
  use Cake\Mailer\Email;

  /**
   * Authentications Controller
   *
   * @property \App\Model\Table\AuthenticationsTable $Authentications
   */
  class AuthenticationsController extends FrontsController
  {
    public function initialize(){
      parent::initialize();
      $this->loadModel('Applicants');
      $this->viewbuilder()->layout('applicant');
      $this->Auth->allow(['captcha', 'requestResetPassword', 'setting']);
    }

    public function login(){
      if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
          $this->Auth->setUser($user);
          return $this->redirect("/");
        }
        $this->Flash->error('Your username or password is incorrect.');
      }
    }

    public function register(){
      if ($this->request->is('post')) {
        $user = $this->Applicants->setCaptcha('captcha', $this->Captcha->getCode('captcha'));
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

    public function setting($token){
      if (!$this->request->is('post'))
      {
        if(!empty($token))
        {
          $applicant = $this->Applicants->find()->where(['token'=>$token])->first();
        }
        else if(!empty($this->Auth->user()))
        {
          $user = $this->Auth->user();
          $applicant = $this->Applicants->get($user->id, ['contain' => []]);
        }
        else
        {
          return $this->redirect(['action' => 'login']);
        }
        if(!empty($applicant))
        {
          $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
          if ($this->Applicants->save($applicant))
          {
            $this->Flash->success(__('Password has been changed.'));
            return $this->redirect(['action' => 'login']);
          } 
          else 
          {
            $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
          }
        }
      }
    }

    public function captcha()  {
      $this->autoRender = false;
      $this->layout='ajax';
      $this->Captcha->create();
    }

    public function requestResetPassword()
    {
      $this->set('user', $this->Applicants->newEntity());
      $this->set('_serialize', ['user']);

      if (!$this->request->is('post')) {
        return;
      }

      $reference = $this->request->data('email');
     
      try {
        $resetUser = $this->Applicants->find()->where(['email'=>$reference])->first();
        if ($resetUser) {
          $resetUser->setToken();
          if($this->Applicants->save($resetUser))
          {
            $email = new Email('default');
            $email->viewVars(['full_name' => $resetUser->full_name, 'token' => $resetUser->token])
                ->template('reset_password')
                ->emailFormat('html')
                ->subject('password reset confirmation')
                ->to($reference)
                ->send();
          }
          $msg = __d('Users', 'Please check your email to continue with password reset process');
          $this->Flash->success($msg);
        } else {
          $msg = __d('Users', 'The password token could not be generated. Please try again');
          $this->Flash->error($msg);
        }
        return $this->redirect(['action' => 'login']);
      } catch (UserNotFoundException $exception) {
          $this->Flash->error(__d('Users', 'User {0} was not found', $reference));
      } catch (Exception $exception) {
          debug($exception);
          $this->Flash->error(__d('Users', 'Token could not be reset'));
      }
    }
  }
