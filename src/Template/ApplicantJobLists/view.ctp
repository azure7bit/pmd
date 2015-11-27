<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Applicant Job List'), ['action' => 'edit', $applicantJobList->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Applicant Job List'), ['action' => 'delete', $applicantJobList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantJobList->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applicantJobLists view large-9 medium-8 columns content">
    <h3><?= h($applicantJobList->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Job') ?></th>
            <td><?= $applicantJobList->has('job') ? $this->Html->link($applicantJobList->job->id, ['controller' => 'Jobs', 'action' => 'view', $applicantJobList->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Applicant') ?></th>
            <td><?= $applicantJobList->has('applicant') ? $this->Html->link($applicantJobList->applicant->id, ['controller' => 'Applicants', 'action' => 'view', $applicantJobList->applicant->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($applicantJobList->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($applicantJobList->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Updated By') ?></th>
            <td><?= $this->Number->format($applicantJobList->last_updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Creation Date') ?></th>
            <td><?= h($applicantJobList->creation_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Update Date') ?></th>
            <td><?= h($applicantJobList->last_update_date) ?></td>
        </tr>
    </table>
</div>
