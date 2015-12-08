<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin
 */
class AdminController extends AppController
{
public function initialize()
    {
        // Always enable the MyUtils Helper
        parent::initialize();
        $this->loadComponent('Flash');
        $this->viewBuilder()->layout('admin');
    }
   
}
