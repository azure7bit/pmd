<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organization'), ['action' => 'edit', $organization->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organization'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organizations view large-9 medium-8 columns content">
    <h3><?= h($organization->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Organization Name') ?></th>
            <td><?= h($organization->organization_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($organization->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Organization Id') ?></th>
            <td><?= $this->Number->format($organization->organization_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($organization->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Updated By') ?></th>
            <td><?= $this->Number->format($organization->last_updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Creation Date') ?></th>
            <td><?= h($organization->creation_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Update Date') ?></th>
            <td><?= h($organization->last_update_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Remark') ?></h4>
        <?= $this->Text->autoParagraph(h($organization->remark)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Organizations') ?></h4>
        <?php if (!empty($organization->organizations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Organization Name') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Creation Date') ?></th>
                <th><?= __('Last Updated By') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organization->organizations as $organizations): ?>
            <tr>
                <td><?= h($organizations->id) ?></td>
                <td><?= h($organizations->organization_id) ?></td>
                <td><?= h($organizations->organization_name) ?></td>
                <td><?= h($organizations->remark) ?></td>
                <td><?= h($organizations->created_by) ?></td>
                <td><?= h($organizations->creation_date) ?></td>
                <td><?= h($organizations->last_updated_by) ?></td>
                <td><?= h($organizations->last_update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organizations', 'action' => 'view', $organizations->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organizations', 'action' => 'edit', $organizations->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organizations', 'action' => 'delete', $organizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizations->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vacancies') ?></h4>
        <?php if (!empty($organization->vacancies)): ?>
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
            <?php foreach ($organization->vacancies as $vacancies): ?>
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
