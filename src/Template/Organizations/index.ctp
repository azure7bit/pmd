<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizations index large-9 medium-8 columns content">
    <h3><?= __('Organizations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('organization_id') ?></th>
                <th><?= $this->Paginator->sort('organization_name') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('creation_date') ?></th>
                <th><?= $this->Paginator->sort('last_updated_by') ?></th>
                <th><?= $this->Paginator->sort('last_update_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= $this->Number->format($organization->id) ?></td>
                <td><?= $this->Number->format($organization->organization_id) ?></td>
                <td><?= h($organization->organization_name) ?></td>
                <td><?= $this->Number->format($organization->created_by) ?></td>
                <td><?= h($organization->creation_date) ?></td>
                <td><?= $this->Number->format($organization->last_updated_by) ?></td>
                <td><?= h($organization->last_update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organization->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organization->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?>
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
