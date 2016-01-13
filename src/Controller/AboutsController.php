<?php
namespace App\Controller;

use App\Controller\AdminController;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 */
class AboutsController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
      $this->set('abouts', $this->paginate($this->Abouts));
      $this->set('_serialize', ['abouts']);
    }

    /**
     * View method
     *
     * @param string|null $id About id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
      $about = $this->Abouts->get($id, [
        'contain' => []
        ]);
      $this->set('about', $about);
      $this->set('_serialize', ['about']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $about = $this->Abouts->newEntity();
      if ($this->request->is('post')) {
        $about = $this->Abouts->patchEntity($about, $this->request->data);
        if ($this->Abouts->save($about)) {
          $this->Flash->success(__('The about page has been saved.'));
          return $this->redirect(['action' => 'index']);
        } else {
          $this->Flash->error(__('The about page could not be saved. Please, try again.'));
        }
      }
      $this->set(compact('about'));
      $this->set('_serialize', ['about']);
    }

    /**
     * Edit method
     *
     * @param string|null $id About id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $about = $this->Abouts->get($id, [
        'contain' => []
        ]);

      if ($this->request->is(['patch', 'post', 'put'])) {
        $about = $this->Abouts->patchEntity($about, $this->request->data);
        if ($this->Abouts->save($about)) {
          $this->Flash->success(__('The about page has been saved.'));
          return $this->redirect(['action' => 'index']);
        } else {
          $this->Flash->error(__('The about page could not be saved. Please, try again.'));
        }
      }
      $this->set(compact('branch'));
      $this->set('_serialize', ['branch']);
    }

    /**
     * Delete method
     *
     * @param string|null $id About id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $about = $this->Abouts->get($id);
      if ($this->Abouts->delete($about)) {
        $this->Flash->success(__('The about page has been deleted.'));
      } else {
        $this->Flash->error(__('The about page could not be deleted. Please, try again.'));
      }
      return $this->redirect(['action' => 'index']);
    }
  }
