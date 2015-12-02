<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vacancy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vacancy->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vacancies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vacancies form large-9 medium-8 columns content">
    <?= $this->Form->create($vacancy) ?>
    <fieldset>
        <legend><?= __('Edit Vacancy') ?></legend>
        <?php
            echo $this->Form->input('vacancy_id');
            echo $this->Form->input('vacancy_code');
            echo $this->Form->input('vacancy_name');
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('branch_id', ['options' => $branches]);
            echo $this->Form->input('organization_id', ['options' => $organizations]);
            echo $this->Form->input('job_id', ['options' => $jobs]);
            echo $this->Form->input('people_category_code');
            echo $this->Form->input('employment_category_code');
            echo $this->Form->input('valid_date_from');
            echo $this->Form->input('valid_date_to');
            echo $this->Form->input('required_personnel');
            echo $this->Form->input('vacancy_status_code');
            echo $this->Form->input('remark');
            echo $this->Form->input('process_version_id');
            echo $this->Form->input('created_by');
            echo $this->Form->input('creation_date');
            echo $this->Form->input('last_updated_by');
            echo $this->Form->input('last_update_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
