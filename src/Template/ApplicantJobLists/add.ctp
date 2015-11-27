<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicantJobLists form large-9 medium-8 columns content">
    <?= $this->Form->create($applicantJobList) ?>
    <fieldset>
        <legend><?= __('Add Applicant Job List') ?></legend>
        <?php
            echo $this->Form->input('job_id', ['options' => $jobs]);
            echo $this->Form->input('applicant_id', ['options' => $applicants]);
            echo $this->Form->input('created_by');
            echo $this->Form->input('creation_date');
            echo $this->Form->input('last_updated_by');
            echo $this->Form->input('last_update_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
