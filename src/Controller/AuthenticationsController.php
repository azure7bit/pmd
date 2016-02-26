<?php
  namespace App\Controller;

  use App\Controller\FrontsController;
  use Cake\Event\Event;
  use Cake\Mailer\Email;
  use Cake\Validation\Validator;

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
      $this->viewbuilder()->layout('admin');
      $this->Auth->allow(['captcha', 'requestResetPassword', 'changePassword', 'validateEmail']);
    }

    public function login(){
      if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        // var_dump($user);
        if ($user) {
          if($user['active']=='true'){
            $this->Auth->setUser($user);
            return $this->redirect("/");
          }else{
            $this->Flash->error('Your account must be validated first, please check your email to validate.');    
          }
          $this->Flash->error('Your username or password is incorrect.');
        }
      }
    }

    public function register(){
      if ($this->request->is('post')) {
        $user = $this->Applicants->setCaptcha('captcha', $this->Captcha->getCode('captcha'));
        $user = $this->Applicants->newEntity($this->request->data);
        $user->activate = 'false';
        $user->setToken();

        if($this->request->data['password']==$this->request->data['password_confirmation'])
        {
          if ($this->Applicants->save($user))
          {
            $email = new Email('default');
            $email->viewVars(['full_name' => $user->full_name, 'token' => $user->token])
                  ->template('validation')
                  ->emailFormat('html')
                  ->subject('Email verification')
                  ->to($user->email)
                  ->send();
            $this->Flash->success('Email verification has been sent.');
            return $this->redirect(['controller'=>'Homes', 'action' => 'index']);
          }else{
            $this->Flash->error('Register failed.');
            return;
          }
        }
        else
        {
          $this->Flash->error('Register failed.');
          return;
        }
      }
    }
    
    public function logout()
    {
      $this->Flash->success('You are now logged out.');
      return $this->redirect($this->Auth->logout());
    }


    public function setting($token = null)
    {
     if ($this->request->is('post'))
      {
        if(!empty($token))
        {
          $applicant = $this->Applicants->find()->where(['token'=>$token])->first();
        }
        else if(!empty($this->Auth->user()))
        {
          $user = $this->Auth->user();
          $applicant = $this->Applicants->get($user['id'], ['contain' => []]);
        }
        else
        {
          return $this->redirect(['action' => 'login']);
        }
        if(!empty($applicant))
        {

          $applicant = $this->Applicants->newEntity($this->request->data);

          $currentUser = $this->Applicants->get($user['id'], ['contain' => []]);
          
          if($this->request->data['password']==$this->request->data['password_confirmation']){
            if ($applicant->checkPassword($applicant->current_password, $currentUser->password)) {
              $currentUser->password = $this->request->data['password'];
              if ($this->Applicants->save($currentUser))
              {
                $this->Flash->success(__('Password has been changed.'));
                if(!empty($this->Auth->user())){
                  return $this->redirect(['action' => 'profile', 'controller'=>'Applicants']);
                }else{
                  return $this->redirect(['action' => 'login']);
                }
              } 
              else 
              {
                $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
              }
            }else{
              $this->Flash->error(__('The old password does not match'));   
            }
          }else{
            $this->Flash->error(__('The password does not match'));   
          }
        }
      }
    }

    public function changePassword($token=null){
      if ($this->request->is('post'))
      {
        $applicant = $this->Applicants->find()->where(['token'=>$token])->first();

        if(!empty($applicant))
        {
          
          $validator = $this->Applicants->validationDefault(new Validator());
          $validator = $this->Applicants->validationRegister($validator);

          if($validator){
            $applicant->password = $this->request->data['password'];
            $applicant->token = null;
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

    /**
     * Validate an email
     *
     * @param string $token token
     * @return void
     */
    public function validateEmail($token = null)
    {
      $token = $this->request->param('token');
      if(!empty($token))
      {
        $this->Applicants->newEntity();

        $applicant = $this->Applicants->find()->where(['token' => $token])->first();
        if(!empty($applicant))
        {
          $applicant->active = 'true';
          $applicant->activation_date = $applicant->setActivationDate();
          $applicant->token = null;
          
          if($this->Applicants->save($applicant))
          {
            $this->Auth->setUser($applicant);
            $this->Flash->success('Your account already validated');
            return $this->redirect(['action'=>'profile','controller'=>'Applicants']);
          }else{
            return $this->redirect(['action'=>'login']);
          }
        }
        else
        {
          $this->Flash->error("User not found for the given token and email.");
          return $this->redirect(['action'=>'login']);
        }
      }
      else
      {
        $this->Flash->error("User not found for the given token and email.");
        return $this->redirect(['action'=>'login']);
      }
    }

  }
