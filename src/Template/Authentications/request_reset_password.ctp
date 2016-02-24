<section id="content" class="profile" style="margin-top: 5%;">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>REQUEST RESET PASSWORD</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="block-profile-form">
          <?= $this->Form->create(); ?>
            <div class="form-group">
              <?= $this->Form->input('email', ['class'=>'form-control']) ?>
            </div>
            <div class="clearfix"></div>
			<p><?= $this->Form->submit(__d('Users', 'Reset Password'), ['class' => "btn btn-login btn-default"]) ?></p>
          <?= $this->Form->end() ?>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</section>