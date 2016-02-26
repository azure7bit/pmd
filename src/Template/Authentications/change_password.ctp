<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __d('Users', 'Please enter the new password') ?></legend>
    <br/><br/><br/>
        <?= $this->Form->input('password'); ?>
        <?= $this->Form->input('password_confirmation', ['type' => 'password', 'required' => true]); ?>

    </fieldset>
    <?= $this->Form->button(__d('Users', 'Submit')); ?>
    <?= $this->Form->end() ?>
</div>