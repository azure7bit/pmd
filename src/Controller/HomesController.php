<?php
  namespace App\Controller;

  use App\Controller\FrontsController;
  // use Cake\Event\Event;

  // use CakeDC\Users\Controller\Traits\LoginTrait;
  // use CakeDC\Users\Controller\Traits\RegisterTrait;

  class HomesController extends FrontsController{

    public function initialize(){
      parent::initialize();
      $this->Auth->allow();
    }

    public function index(){
      $this->loadModel('Vacancies');
      $vacancies = $this->Vacancies->find('All', ['contain' => []])->order(['valid_date_to' => 'DESC'])->limit(6);
      $this->set('vacancies', $vacancies);
      $this->set('_serialize', ['vacancies']);
    }

    public function about(){}

    public function faq(){}

    // function captcha()  {
    //   $this->autoRender = false;
    //   $this->layout='ajax';
    //   $this->Captcha->create();
    // }
  }