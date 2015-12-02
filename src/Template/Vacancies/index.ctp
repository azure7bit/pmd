<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vacancy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="vacancies index large-9 medium-8 columns content">
    <h3><?= __('Vacancies') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('vacancy_name') ?></th>
                <th><?= $this->Paginator->sort('company_id') ?></th>
                <th><?= $this->Paginator->sort('branch_id') ?></th>
                <th><?= $this->Paginator->sort('organization_id') ?></th>
                <th><?= $this->Paginator->sort('vacancy_status_code') ?></th>
                <th><?= $this->Paginator->sort('remark') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vacancies as $vacancy): ?>
            <tr>
                <td><?= h($vacancy->vacancy_name) ?></td>
                <td><?= $vacancy->has('company') ? $this->Html->link($vacancy->company->company_name, ['controller' => 'Companies', 'action' => 'view', $vacancy->company->id]) : '' ?></td>
                <td><?= $vacancy->has('branch') ? $this->Html->link($vacancy->branch->branch_name, ['controller' => 'Branches', 'action' => 'view', $vacancy->branch->id]) : '' ?></td>
                <td><?= $vacancy->has('organization') ? $this->Html->link($vacancy->organization->organization_name, ['controller' => 'Organizations', 'action' => 'view', $vacancy->organization->id]) : '' ?></td>
                <td><?= h($vacancy->vacancy_status_code) ?></td>
                <td><?= h($vacancy->remark) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vacancy->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vacancy->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vacancy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vacancy->id)]) ?>
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
