<div class="large-3 medium-4 columns"></div>
<div class="applicants form large-9 medium-8 columns content">
  <h1>Login</h1>
  <?= $this->Form->create() ?>
  <?= $this->Form->input('email') ?>
  <?= $this->Form->input('password') ?>
  <?= $this->Form->button('Login') ?>
  <?= $this->Form->end() ?>
</div>