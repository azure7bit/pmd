<section id="content" class="profile" style="margin-top: 5%;">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>REGISTER</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>

      <div class="col-lg-6">
        <div class="block-profile-form">
          <?= $this->Form->create(null, ["url" => ["controller"=>"Authentications", "action"=>"register"]]); ?>
						<div class="form-group">
							<?= $this->Form->input('full_name', ['class'=>'form-control', 'id'=>'exampleInputname', "label"=>'FULL NAME']); ?>
						</div>

						<div class="form-group">
							<?= $this->Form->input('password', ['class'=>"form-control",'id'=>"exampleInputPassword", "label"=>'PASSWORD']); ?>
						</div>

						<div class="form-group">
							<?= $this->Form->input('confirm_password', ['class'=>"form-control",'id'=>"exampleInputrEpASSWORD",'type' => 'password', "label"=>'RETYPE PASSWORD']); ?>
						</div>

						<div class="form-group">
							<?= $this->Form->input('email',['class' => 'form-control', 'id' =>'exampleInputEmail', "label"=>'Email']); ?>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">CAPTCHA</label>
							<?= $this->Captcha->create('captcha', ['type'=>'image', 'theme'=>'random']); ?>
						</div>

						<div class="clearfix"></div>
						<p><?= $this->Form->submit(__d('Users', 'SIGNUP'), ['class' => "btn btn-login btn-default"]) ?></p>
						<p class="txt-account">Already have an account? &nbsp;<a href="">Signin Here</a></p>
					<?= $this->Form->end() ?>
        </div>
      </div>

      <div class="col-lg-3"></div>
    </div>
  </div>
</section>