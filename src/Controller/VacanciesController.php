<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class VacanciesController extends AppController
{

    public function index()
    {
        $this->set('vacancies', $this->paginate($this->Vacancies));
        $this->set('_serialize', ['vacancies']);
    }

    // public function view($id = null)
    // {
    //     $applicant = $this->Applicants->get($id, [
    //         'contain' => ['ApplicantJobLists']
    //     ]);
    //     $this->set('applicant', $applicant);
    //     $this->set('_serialize', ['applicant']);
    // }

    public function add()
    {
        $vacancy = $this->Vacancies->newEntity();
        if ($this->request->is('post')) {
            $vacancy = $this->Vacancies->patchEntity($vacancy, $this->request->data);
            if ($this->Vacancies->save($vacancy)) {
                $this->Flash->success(__('The vacancy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vacancy'));
        $this->set('_serialize', ['vacancy']);
    }

    // public function edit($id = null)
    // {
    //     $applicant = $this->Applicants->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $applicant = $this->Applicants->patchEntity($applicant, $this->request->data);
    //         if ($this->Applicants->save($applicant)) {
    //             $this->Flash->success(__('The applicant has been saved.'));
    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('applicant'));
    //     $this->set('_serialize', ['applicant']);
    // }

    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $applicant = $this->Applicants->get($id);
    //     if ($this->Applicants->delete($applicant)) {
    //         $this->Flash->success(__('The applicant has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
    //     }
    //     return $this->redirect(['action' => 'index']);
    // }
}
