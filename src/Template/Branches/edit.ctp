<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $branch->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vacancies'), ['controller' => 'Vacancies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vacancy'), ['controller' => 'Vacancies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="branches form large-9 medium-8 columns content">
    <?= $this->Form->create($branch) ?>
    <fieldset>
        <legend><?= __('Edit Branch') ?></legend>
        <?php
            echo $this->Form->input('branch_id');
            echo $this->Form->input('branch_name');
            echo $this->Form->input('remark');
            echo $this->Form->input('created_by');
            echo $this->Form->input('creation_date');
            echo $this->Form->input('last_updated_by');
            echo $this->Form->input('last_update_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
