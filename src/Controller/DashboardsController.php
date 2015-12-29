<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Dashboards Controller
 *
 * @property \App\Model\Table\DashboardsTable $Dashboards
 */
class DashboardsController extends AppController
{

  public function initialize(){
    parent::initialize();
    $this->loadModel('Applicants');
    $this->loadModel('Jobs');

  }

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    // Allow users to register and logout.
    // You should not add the "login" action to allow list. Doing so would
    // cause problems with normal functioning of AuthComponent.
    //$this->Auth->deny();
  }
  /**
    * Index method
    *
    * @return void
    */
  public function index()
  {           
    $count_applicant = $this->Applicants->find('all')->count();
    $count_job       = $this->Jobs->find('all')->count();
    $this->set('dashboards');
    $this->set('_serialize', ['dashboards','row_applicant']);      
    $this->set(compact('count_applicant','count_job'));
  }

  public function home(){
    
  }
}
