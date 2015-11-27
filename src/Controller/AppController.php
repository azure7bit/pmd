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
 
    public function initialize()
    {
      // Always enable the MyUtils Helper
      parent::initialize();        
      $this->viewBuilder()->layout('admin');        
    }

    public $components = [
      'Auth' ,
      'Flash',
    ];

    protected $_UsersAutentication = array(
      'authenticate'=> [
        AuthComponent::ALL => ['userModel' => 'Users'],
        'Form' => [
          'fields' => ['username' => 'email', 'password' => 'password']
        ],
      ],
      'sessionKey' => 'Auth.Admin', 
      'loginAction' => ['controller' => 'Authentications', 'action' => 'login', 'admin' => true], 
      'loginRedirect' => '/', 
      'logoutRedirect' => '/login');


    public $helpers = ['Form'];

    public function beforeFilter(Event $e) 
    {
      $name = $this->request->session()->read();
      $this->_manageAuthConfigs();
    }

    // protected function isPrefix($prefix)
    // {
    //   $params = $this->request->params;
    //   return isset($params['prefix']) && $params['prefix'] === $prefix;
    // }

    public function beforeRender(Event $e) {
      // set in the view the currentUser

      $authUser = !empty($this->Auth->user()) ? $this->Auth->user() : null;
      $this->set(['authUser'=>$authUser]);

      // set in view the body class
      $this->set('bodyClass', 
        sprintf('%s %s', strtolower($this->name), strtolower($this->name) . '-' . strtolower($this->request->params['action'])));
    }

    private function _manageAuthConfigs() {

      $this->Auth->config($this->_ApplicantsAutentication);          

      $this->Auth->config($this->_UsersAutentication);
      $this->Auth->allow();

    }


}