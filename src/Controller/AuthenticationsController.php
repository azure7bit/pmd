<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\AdminController;
use App\Model\Table\AdminsTable;
use Cake\Event\Event;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;

/**
 * Authentications Controller
 *
 * @property \App\Model\Table\AuthenticationsTable $Authentications
 */
class AuthenticationsController extends AppController
{

	 use LoginTrait;
   use RegisterTrait;
}
