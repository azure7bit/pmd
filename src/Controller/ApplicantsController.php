<?php
namespace App\Controller;

use App\Controller\FrontsController;
use Cake\Event\Event;
/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class ApplicantsController extends FrontsController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
      $this->set('applicants', $this->paginate($this->Applicants));
      $this->set('_serialize', ['applicants']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicant id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
      $applicant = $this->Applicants->get($id, [
          'contain' => ['ApplicantJobLists']
          ]);
      $this->set('applicant', $applicant);
      $this->set('_serialize', ['applicant']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $applicant = $this->Applicants->newEntity();
      if ($this->request->is('post')) {
        $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
        if ($this->Applicants->save($applicant)) {
          $this->Flash->success(__('The applicant has been saved.'));
          return $this->redirect(['action' => 'index']);
        } else {
          $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
      }
      $this->set(compact('applicant'));
      $this->set('_serialize', ['applicant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $applicant = $this->Applicants->get($id, ['contain' => []]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
        if ($this->Applicants->save($applicant)) {
          $this->Flash->success(__('The applicant has been saved.'));
          return $this->redirect(['action' => 'profile']);
        } else {
          $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
      }
      $this->set(compact('applicant'));
      $this->set('_serialize', ['applicant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $applicant = $this->Applicants->get($id);
      if ($this->Applicants->delete($applicant)) {
          $this->Flash->success(__('The applicant has been deleted.'));
      } else {
          $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
      }
      return $this->redirect(['action' => 'index']);
    }

    public function profile($id = null)
    {
      $id = $this->Auth->user()['id'];
      
      $applicant = $this->Applicants->get($id, 
        [
          'contain' => ['ApplicantJobLists','ApplicantEducations']
        ]);
      $this->set(compact('applicant'));
      $this->set('_serialize', ['applicant']);
    }

    public function joblist($id=null)
    {
      $id = $this->Auth->user()['id'];
        
      $applicant = $this->Applicants->get($id, [
        'contain' => ['ApplicantJobLists']
      ]);
      
      $this->set(compact('applicant'));
      $this->set('_serialize', ['applicant']);
    }

    // public function captcha()  {
    //   $this->autoRender = false;
    //   $this->layout='ajax';
    //   $this->Captcha->create();
    // }
}
