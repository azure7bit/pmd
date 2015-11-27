<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicants form large-9 medium-8 columns content">
    <?= $this->Form->create($applicant, ['type' => "file"]) ?>
    <fieldset>
        <legend><?= __('Add Applicant') ?></legend>
        <?php
            echo $this->Form->input('id_card');
            echo $this->Form->input('full_name');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('birthdate', ['minYear' => date('Y') - 40, 'maxYear' => date('Y') - 19,]);            
            echo $this->Form->input('religion');
            echo $this->Form->input('blood_type');
            echo $this->Form->input('phone_number');
            echo $this->Form->input('gender');
            echo $this->Form->file('avatar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
