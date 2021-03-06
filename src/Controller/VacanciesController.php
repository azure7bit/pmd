<?php
  namespace App\Controller;

  use App\Controller\FrontsController;

  /**
   * Vacancies Controller
   *
   * @property \App\Model\Table\VacanciesTable $Vacancies
   */
  class VacanciesController extends FrontsController
  {

    public function initialize()
    {
      parent::initialize();
      $this->Auth->allow(['index']);
      $this->viewbuilder()->layout('admin');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index($criteria = null, $search = null)
    {
      if(!empty($this->request->data)){
        $criteria = $this->request->data['criteria'];
        $search = $this->request->data['search'];
      }

      $this->paginate = [
      'contain' => ['Companies', 'Branches', 'WosJobs']
      ];

      if(!empty($criteria)){
        $this->set('vacancies', $this->paginate($this->Vacancies->find()->contain(['Companies','WosJobs','Branches'])->where([$criteria.' LIKE'=>'%'.$param.'%'])));
      }else{
        $this->set('vacancies', $this->paginate($this->Vacancies));
      }

      // $jobs = $this->Vacancies->WosJobs->find('list', ['keyField' => 'job_id','valueField' => 'job_name']);

      // $vacancies = $this->paginate($this->Vacancies);


      // $this->set(compact('vacancies', 'jobs'));

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
      $vacancy = $this->Vacancies->find('all')
        ->where(['vacancy_id' => $id])
        ->contain(['Companies', 'Branches', 'WosJobs'])
        ->first();
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
      
      if ($this->request->is(['patch', 'post', 'put'])) 
      {
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
 