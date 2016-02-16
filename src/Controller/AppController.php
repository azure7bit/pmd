<?php
  /**
  * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
  * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
  *
  * Licensed under The MIT License
  * For full copyright and license information, please see the LICENSE.txt
  * Redistributions of files must retain the above copyright notice.
  *
  * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
  * @link          http://cakephp.org CakePHP(tm) Project
  * @since         0.2.9
  * @license       http://www.opensource.org/licenses/mit-license.php MIT License
  */
  namespace App\Controller;

  use Cake\Controller\Controller;
  use Cake\Controller\Component\AuthComponent;
  use Cake\Event\Event;
  use Cake\Network\Exception\NotFoundException;
  use Cake\Network\Exception\UnauthorizedException;
  /**
  * Application Controller
  *
  * Add your application-wide methods in the class below, your controllers
  * will inherit them.
  *
  * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
  */
  
  class AppController extends Controller {
 
  public $helpers = ['Html','Form','Captcha'];
   public function initialize(){
    $this->loadComponent('Flash');
    $this->loadComponent('Captcha');
    $this->loadComponent('Auth', [

      'authenticate'=> [
        AuthComponent::ALL => ['userModel' => 'Applicants'],
        'Form' => [
          'fields' => ['username' => 'email', 'password' => 'password']
        ],
      ],
      'loginAction' => ['controller' => 'Authentications', 'action' => 'login'], 
      'loginRedirect' => '/', 
      'logoutRedirect' => '/'
      
    ]);
    // $this->viewBuilder()->layout('admin');
    $this->Auth->allow(['login', 'register']);
    $this->viewBuilder()->layout('applicant');
  }


  public function beforeFilter(Event $e) 
  {
    $name = $this->request->session()->read();
    // $this->_manageAuthConfigs();
    // $this->Auth->allow();
  }

   // protected function isPrefix($prefix)
   // {
   //   $params = $this->request->params;
   //   return isset($params['prefix']) && $params['prefix'] === $prefix;
   // }

  public function beforeRender(Event $e) {
    $user = $this->Auth->user() ? $this->Auth->user() : null;
    $this->set('user', $user);
    $this->set('_serialize', ['user']);

    // set in view the body class
    $this->set('bodyClass', 
      sprintf('%s %s', strtolower($this->name), strtolower($this->name) . '-' . strtolower($this->request->params['action'])));
  }
}