<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ApplicantJobLists Controller
 *
 * @property \App\Model\Table\ApplicantJobListsTable $ApplicantJobLists
 */
class ApplicantJobListsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs', 'Applicants']
        ];
        $this->set('applicantJobLists', $this->paginate($this->ApplicantJobLists));
        $this->set('_serialize', ['applicantJobLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicant Job List id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantJobList = $this->ApplicantJobLists->get($id, [
            'contain' => ['Jobs', 'Applicants']
        ]);
        $this->set('applicantJobList', $applicantJobList);
        $this->set('_serialize', ['applicantJobList']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicantJobList = $this->ApplicantJobLists->newEntity();
        if ($this->request->is('post')) {
            $applicantJobList = $this->ApplicantJobLists->patchEntity($applicantJobList, $this->request->data);
            if ($this->ApplicantJobLists->save($applicantJobList)) {
                $this->Flash->success(__('The applicant job list has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicant job list could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->ApplicantJobLists->Jobs->find('list', ['limit' => 200]);
        $applicants = $this->ApplicantJobLists->Applicants->find('list', ['limit' => 200]);
        $this->set(compact('applicantJobList', 'jobs', 'applicants'));
        $this->set('_serialize', ['applicantJobList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant Job List id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantJobList = $this->ApplicantJobLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantJobList = $this->ApplicantJobLists->patchEntity($applicantJobList, $this->request->data);
            if ($this->ApplicantJobLists->save($applicantJobList)) {
                $this->Flash->success(__('The applicant job list has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicant job list could not be saved. Please, try again.'));
            }
        }
        $jobs = $this->ApplicantJobLists->Jobs->find('list', ['limit' => 200]);
        $applicants = $this->ApplicantJobLists->Applicants->find('list', ['limit' => 200]);
        $this->set(compact('applicantJobList', 'jobs', 'applicants'));
        $this->set('_serialize', ['applicantJobList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant Job List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantJobList = $this->ApplicantJobLists->get($id);
        if ($this->ApplicantJobLists->delete($applicantJobList)) {
            $this->Flash->success(__('The applicant job list has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant job list could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
