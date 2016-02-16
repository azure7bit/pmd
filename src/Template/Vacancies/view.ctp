<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('Edit Vacancy'), ['action' => 'edit', $vacancy->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Vacancy'), ['action' => 'delete', $vacancy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vacancy->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Vacancies'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Vacancy'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?> </li>
  </ul>
</nav> -->
<div class="vacancies view large-9 medium-8 columns content">
  <h3><?= h($vacancy->vacancy_name) ?></h3>
    <table class="vertical-table">
      <tr>
        <th><?= __('Vacancy Code') ?></th>
        <td><?= h($vacancy->vacancy_code) ?></td>
      </tr>
      <tr>
        <th><?= __('Vacancy Name') ?></th>
        <td><?= h($vacancy->vacancy_name) ?></td>
      </tr>
      <tr>
        <th><?= __('Company') ?></th>
        <td><?= $this->Html->link($vacancy->company_name, ['controller' => 'Companies', 'action' => 'view', $vacancy->company_id]) ?></td>
      </tr>
      <tr>
        <th><?= __('Branch') ?></th>
        <td><?= $this->Html->link($vacancy->branch_name, ['controller' => 'Branches', 'action' => 'view', $vacancy->branch_id]) ?></td>
      </tr>
      <tr>
        <th><?= __('Organization') ?></th>
        <td><?= $this->Html->link($vacancy->organization_name, ['controller' => 'Organizations', 'action' => 'view', $vacancy->organization->id]) ?></td>
      </tr>
      <tr>
        <th><?= __('Job') ?></th>
        <td><?= $this->Html->link($vacancy->job_name, ['controller' => 'Jobs', 'action' => 'view', $vacancy->job->id]) ?></td>
      </tr>
      <tr>
        <th><?= __('People Category Code') ?></th>
        <td><?= h($vacancy->people_category_code) ?></td>
      </tr>
      <tr>
        <th><?= __('Employment Category Code') ?></th>
        <td><?= h($vacancy->employment_category_code) ?></td>
      </tr>
      <tr>
        <th><?= __('Vacancy Status Code') ?></th>
        <td><?= h($vacancy->vacancy_status_code) ?></td>
      </tr>
      <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($vacancy->id) ?></td>
      </tr>
      <tr>
        <th><?= __('Vacancy Id') ?></th>
        <td><?= $this->Number->format($vacancy->vacancy_id) ?></td>
      </tr>
      <tr>
        <th><?= __('Required Personnel') ?></th>
        <td><?= $this->Number->format($vacancy->required_personnel) ?></td>
      </tr>
      <tr>
        <th><?= __('Process Version Id') ?></th>
        <td><?= $this->Number->format($vacancy->process_version_id) ?></td>
      </tr>
      <tr>
        <th><?= __('Created By') ?></th>
        <td><?= $this->Number->format($vacancy->created_by) ?></td>
      </tr>
      <tr>
        <th><?= __('Last Updated By') ?></th>
        <td><?= $this->Number->format($vacancy->last_updated_by) ?></td>
      </tr>
      <tr>
        <th><?= __('Valid Date From') ?></th>
        <td><?= h($vacancy->valid_date_from) ?></td>
      </tr>
      <tr>
        <th><?= __('Valid Date To') ?></th>
        <td><?= h($vacancy->valid_date_to) ?></td>
      </tr>
      <tr>
        <th><?= __('Creation Date') ?></th>
        <td><?= h($vacancy->creation_date) ?></td>
      </tr>
      <tr>
        <th><?= __('Last Update Date') ?></th>
        <td><?= h($vacancy->last_update_date) ?></td>
      </tr>
    </table>
    <div class="row">
      <h4><?= __('Remark') ?></h4>
      <?= $this->Text->autoParagraph(h($vacancy->remark)); ?>
    </div>
    <div class="related">
      <h4><?= __('Related Vacancies') ?></h4>
      <?php if (!empty($vacancy->vacancies)): ?>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Vacancy Id') ?></th>
          <th><?= __('Vacancy Code') ?></th>
          <th><?= __('Vacancy Name') ?></th>
          <th><?= __('Company Id') ?></th>
          <th><?= __('Branch Id') ?></th>
          <th><?= __('Organization Id') ?></th>
          <th><?= __('Job Id') ?></th>
          <th><?= __('People Category Code') ?></th>
          <th><?= __('Employment Category Code') ?></th>
          <th><?= __('Valid Date From') ?></th>
          <th><?= __('Valid Date To') ?></th>
          <th><?= __('Required Personnel') ?></th>
          <th><?= __('Vacancy Status Code') ?></th>
          <th><?= __('Remark') ?></th>
          <th><?= __('Process Version Id') ?></th>
          <th><?= __('Created By') ?></th>
          <th><?= __('Creation Date') ?></th>
          <th><?= __('Last Updated By') ?></th>
          <th><?= __('Last Update Date') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
          <?php foreach ($vacancy->vacancies as $vacancies): ?>
          <tr>
              <td><?= h($vacancies->id) ?></td>
              <td><?= h($vacancies->vacancy_id) ?></td>
              <td><?= h($vacancies->vacancy_code) ?></td>
              <td><?= h($vacancies->vacancy_name) ?></td>
              <td><?= h($vacancies->company_id) ?></td>
              <td><?= h($vacancies->branch_id) ?></td>
              <td><?= h($vacancies->organization_id) ?></td>
              <td><?= h($vacancies->job_id) ?></td>
              <td><?= h($vacancies->people_category_code) ?></td>
              <td><?= h($vacancies->employment_category_code) ?></td>
              <td><?= h($vacancies->valid_date_from) ?></td>
              <td><?= h($vacancies->valid_date_to) ?></td>
              <td><?= h($vacancies->required_personnel) ?></td>
              <td><?= h($vacancies->vacancy_status_code) ?></td>
              <td><?= h($vacancies->remark) ?></td>
              <td><?= h($vacancies->process_version_id) ?></td>
              <td><?= h($vacancies->created_by) ?></td>
              <td><?= h($vacancies->creation_date) ?></td>
              <td><?= h($vacancies->last_updated_by) ?></td>
              <td><?= h($vacancies->last_update_date) ?></td>
              <td class="actions">
                  <?= $this->Html->link(__('View'), ['controller' => 'Vacancies', 'action' => 'view', $vacancies->id]) ?>

                  <?= $this->Html->link(__('Edit'), ['controller' => 'Vacancies', 'action' => 'edit', $vacancies->id]) ?>

                  <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vacancies', 'action' => 'delete', $vacancies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vacancies->id)]) ?>

              </td>
          </tr>
          <?php endforeach; ?>
      </table>
    <?php endif; ?>
    </div>
</div>
