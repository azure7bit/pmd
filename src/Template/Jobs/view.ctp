<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Job Name') ?></th>
            <td><?= h($job->job_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Id') ?></th>
            <td><?= $this->Number->format($job->job_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($job->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Updated By') ?></th>
            <td><?= $this->Number->format($job->last_updated_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Creation Date') ?></th>
            <td><?= h($job->creation_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Update Date') ?></th>
            <td><?= h($job->last_update_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Remark') ?></h4>
        <?= $this->Text->autoParagraph(h($job->remark)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($job->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Job Id') ?></th>
                <th><?= __('Job Name') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Creation Date') ?></th>
                <th><?= __('Last Updated By') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($job->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->id) ?></td>
                <td><?= h($jobs->job_id) ?></td>
                <td><?= h($jobs->job_name) ?></td>
                <td><?= h($jobs->remark) ?></td>
                <td><?= h($jobs->created_by) ?></td>
                <td><?= h($jobs->creation_date) ?></td>
                <td><?= h($jobs->last_updated_by) ?></td>
                <td><?= h($jobs->last_update_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Applicant Job Lists') ?></h4>
        <?php if (!empty($job->applicant_job_lists)): ?>
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
            <?php foreach ($job->applicant_job_lists as $applicantJobLists): ?>
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
    <div class="related">
        <h4><?= __('Related Vacancies') ?></h4>
        <?php if (!empty($job->vacancies)): ?>
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
            <?php foreach ($job->vacancies as $vacancies): ?>
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
