<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('New Applicant'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Applicant Job Lists'), ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Applicant Job List'), ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?></li>
</ul>
</nav> -->

<div class="applicants index large-9 medium-8 columns content">
  <h3><?= __('Admin Applicants') ?></h3>
  <table cellpadding="0" cellspacing="0" class="table table-bordered">
    <thead>
      <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('id_card') ?></th>
        <th><?= $this->Paginator->sort('full_name') ?></th>
        <th><?= $this->Paginator->sort('email') ?></th>
        <th><?= $this->Paginator->sort('avatar') ?></th>
        <th><?= $this->Paginator->sort('place_of_birth') ?></th>
        <th><?= $this->Paginator->sort('birthdate') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($applicants as $applicant): ?>
        <tr>
          <td><?= $this->Number->format($applicant->id) ?></td>
          <td><?= h($applicant->id_card) ?></td>
          <td><?= h($applicant->full_name) ?></td>
          <td><?= h($applicant->email) ?></td>
          <td><?= $this->Html->image($applicant->avatar_url("portrait")) ?></td>
          <td><?= h($applicant->placebirth) ?></td>
          <td><?= h($applicant->birthdate) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $applicant->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicant->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicant->id)]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
  </div>
</div>
