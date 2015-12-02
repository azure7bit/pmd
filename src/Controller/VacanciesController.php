<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vacancies Controller
 *
 * @property \App\Model\Table\VacanciesTable $Vacancies
 */
class VacanciesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Branches', 'Organizations', 'Jobs']
        ];
        $this->set('vacancies', $this->paginate($this->Vacancies));
        $this->set('_serialize', ['vacancies']);
    }

    /**
     * View method
     *
     * @param string|null $id Vacancy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vacancy = $this->Vacancies->get($id, [
            'contain' => ['Companies', 'Branches', 'Organizations', 'Jobs']
        ]);
        $this->set('vacancy', $vacancy);
        $this->set('_serialize', ['vacancy']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vacancy = $this->Vacancies->newEntity();
        if ($this->request->is('post')) {
            $vacancy = $this->Vacancies->patchEntity($vacancy, $this->request->data);
            if ($this->Vacancies->save($vacancy)) {
                $this->Flash->success(__('The vacancy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vacancy could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Vacancies->Companies->find('list', ['limit' => 200, 'keyField' => 'id','valueField' => 'company_name']);
        $branches = $this->Vacancies->Branches->find('list', ['limit' => 200, 'keyField' => 'id','valueField' => 'branch_name']);
        $organizations = $this->Vacancies->Organizations->find('list', ['limit' => 200, 'keyField' => 'id','valueField' => 'organization_name']);
        $jobs = $this->Vacancies->Jobs->find('list', ['limit' => 200, 'keyField' => 'id','valueField' => 'job_name']);

        $this->set(compact('vacancy', 'companies', 'branches', 'organizations', 'jobs'));
        $this->set('_serialize', ['vacancy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vacancy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vacancy = $this->Vacancies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vacancy = $this->Vacancies->patchEntity($vacancy, $this->request->data);
            if ($this->Vacancies->save($vacancy)) {
                $this->Flash->success(__('The vacancy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vacancy could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Vacancies->Companies->find('list', ['limit' => 200]);
        $branches = $this->Vacancies->Branches->find('list', ['limit' => 200]);
        $organizations = $this->Vacancies->Organizations->find('list', ['limit' => 200]);
        $jobs = $this->Vacancies->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('vacancy', 'companies', 'branches', 'organizations', 'jobs'));
        $this->set('_serialize', ['vacancy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vacancy id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vacancy = $this->Vacancies->get($id);
        if ($this->Vacancies->delete($vacancy)) {
            $this->Flash->success(__('The vacancy has been deleted.'));
        } else {
            $this->Flash->error(__('The vacancy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
