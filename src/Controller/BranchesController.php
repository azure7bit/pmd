<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 */
class BranchesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('branches', $this->paginate($this->Branches));
        $this->set('_serialize', ['branches']);
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => ['Branches', 'Vacancies']
        ]);
        $this->set('branch', $branch);
        $this->set('_serialize', ['branch']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branch = $this->Branches->newEntity();
        if ($this->request->is('post')) {
            $branch = $this->Branches->patchEntity($branch, $this->request->data);
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The branch could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('branch'));
        $this->set('_serialize', ['branch']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branch = $this->Branches->patchEntity($branch, $this->request->data);
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The branch could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('branch'));
        $this->set('_serialize', ['branch']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branch = $this->Branches->get($id);
        if ($this->Branches->delete($branch)) {
            $this->Flash->success(__('The branch has been deleted.'));
        } else {
            $this->Flash->error(__('The branch could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
