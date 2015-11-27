<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicantJobLists index large-9 medium-8 columns content">
    <h3><?= __('Applicant Job Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('job_id') ?></th>
                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('creation_date') ?></th>
                <th><?= $this->Paginator->sort('last_updated_by') ?></th>
                <th><?= $this->Paginator->sort('last_update_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicantJobLists as $applicantJobList): ?>
            <tr>
                <td><?= $this->Number->format($applicantJobList->id) ?></td>
                <td><?= $applicantJobList->has('job') ? $this->Html->link($applicantJobList->job->id, ['controller' => 'Jobs', 'action' => 'view', $applicantJobList->job->id]) : '' ?></td>
                <td><?= $applicantJobList->has('applicant') ? $this->Html->link($applicantJobList->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $applicantJobList->applicant->id]) : '' ?></td>
                <td><?= $this->Number->format($applicantJobList->created_by) ?></td>
                <td><?= h($applicantJobList->creation_date) ?></td>
                <td><?= $this->Number->format($applicantJobList->last_updated_by) ?></td>
                <td><?= h($applicantJobList->last_update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $applicantJobList->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicantJobList->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicantJobList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantJobList->id)]) ?>
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
