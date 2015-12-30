<?php
  namespace App\Controller;

  use App\Controller\AppController;
  use Cake\Event\Event;
  use CakeDC\Users\Controller\Traits\LoginTrait;
  use CakeDC\Users\Controller\Traits\RegisterTrait;

  class HomesController extends AppController{
    public function initialize(){
      parent::initialize();
      $this->viewBuilder()->layout('applicant');
    }

    public function index(){
      $this->loadModel('Vacancies');
      $vacancies = $this->Vacancies->find('All', ['contain' => ['Jobs']])->order(['valid_date_to' => 'DESC'])->limit(6);
      $this->set('vacancies', $vacancies);
      $this->set('_serialize', ['vacancies']);
    }

    public function about(){}

    public function faq(){}
  }