<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Abouts'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Abouts'), ['controller' => 'Abouts', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('New About'), ['controller' => 'Abouts', 'action' => 'add']) ?></li>
  </ul>
</nav>
<div class="Abouts form large-9 medium-8 columns content">
  <?= $this->Form->create($about) ?>
  <fieldset>
    <legend><?= __('Add About') ?></legend>
    <?php
      echo $this->Form->input('TITLE', ['type'=>'text']);
      echo $this->Form->input('CONTENT', ['type'=>'textarea', 'escape'=>false]);
      // echo $this->Form->input('created_by');
      // echo $this->Form->input('created_date');
      // echo $this->Form->input('updated_by');
      // echo $this->Form->input('updated_date');
    ?>
  </fieldset>
  <?= $this->Form->button(__('Submit')) ?>
  <?= $this->Form->end() ?>
</div>
