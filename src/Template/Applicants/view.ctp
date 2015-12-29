<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li>
      <?= $this->Html->link(__('Edit Applicant'), 
      ['action' => 'edit', $applicant->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Applicant'), 
      ['action' => 'delete', $applicant->id], 
      ['confirm' => __('Are you sure you want to delete # {0}?', $applicant->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Applicants'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Applicant'), ['action' => 'add']) ?> </li>
    <li>
      <?= $this->Html->link(__('List Applicant Job Lists'), 
      ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Applicant Job List'), 
      ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?> </li>
  </ul>
</nav>

<div class="applicants view large-9 medium-8 columns content">
  <h3><?= h($applicant->id) ?></h3>
  <table class="vertical-table">
    <tr>
      <th><?= __('Id Card') ?></th>
      <td><?= h($applicant->id_card) ?></td>
    </tr>
    <tr>
      <th><?= __('Full Name') ?></th>
      <td><?= h($applicant->full_name) ?></td>
    </tr>
    <tr>
      <th><?= __('Email') ?></th>
      <td><?= h($applicant->email) ?></td>
    </tr>
    <tr>
      <th><?= __('Place Of Birth') ?></th>
      <td><?= h($applicant->place_of_birth) ?></td>
    </tr>
    <tr>
      <th><?= __('Religion') ?></th>
      <td><?= h($applicant->religion) ?></td>
    </tr>
    <tr>
      <th><?= __('Blood Type') ?></th>
      <td><?= h($applicant->blood_type) ?></td>
    </tr>
    <tr>
      <th><?= __('Phone Number') ?></th>
      <td><?= h($applicant->phone_number) ?></td>
    </tr>
    <tr>
      <th><?= __('Gender') ?></th>
      <td><?= h($applicant->gender) ?></td>
    </tr>
    <tr>
      <th><?= __('Avatar') ?></th>
      <td><?= $this->Html->image($applicant->avatar_url("portrait")) ?></td>
    </tr>
    <tr>
      <th><?= __('Birthdate') ?></th>
      <td><?= h($applicant->birthdate) ?></td>
    </tr>
    <tr>
      <th><?= __('slug') ?></th>
      <td><?= h($applicant->slug) ?></td>
    </tr>
    <tr>
      <th><?= __('Active') ?></th>
      <td><?= $applicant->active ? __('Yes') : __('No'); ?></td>
    </tr>
  </table>

  <div class="row">
    <h4><?= __('Address') ?></h4>
    <?= $this->Text->autoParagraph(h($applicant->address)); ?>
  </div>
  
  <div class="related">
    <h4><?= __('Related Applicant Job Lists') ?></h4>
    <?php if (!empty($applicant->applicant_job_lists)): ?>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Job Id') ?></th>
          <th><?= __('Applicant Id') ?></th>
          <th><?= __('Created By') ?></th>
          <th><?= __('Creation Date') ?></th>
          <th><?= __('Last Updated By') ?></th>
          <th><?= __('Last Update Date') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($applicant->applicant_job_lists as $applicantJobLists): ?>
          <tr>
            <td><?= h($applicantJobLists->id) ?></td>
            <td><?= h($applicantJobLists->job_id) ?></td>
            <td><?= h($applicantJobLists->applicant_id) ?></td>
            <td><?= h($applicantJobLists->created_by) ?></td>
            <td><?= h($applicantJobLists->creation_date) ?></td>
            <td><?= h($applicantJobLists->last_updated_by) ?></td>
            <td><?= h($applicantJobLists->last_update_date) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'ApplicantJobLists', 'action' => 'view', $applicantJobLists->id]) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicantJobLists', 'action' => 'edit', $applicantJobLists->id]) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicantJobLists', 'action' => 'delete', $applicantJobLists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantJobLists->id)]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</div>