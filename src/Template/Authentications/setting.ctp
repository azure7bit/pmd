<section id="content" class="profile" style="margin-top:5%;">
	<div class="container block-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="block-profile-form">
						<div class="block-content-setting">
							<div class="head-setting" align="center">
								<?= $this->Html->image('logo.png', ['class'=>'img-responsive']) ?>
								<h2>CHANGE PASSWORD</h2>
							</div>
							<?= $this->Form->create() ?>
							<div class="form-group">
								<?= $this->Form->input('current_password', ['type' => 'password', 'required' => true, 'label' => __d('Users', 'Current password'), 'class'=>'form-control']); ?>
							</div>
							<div class="form-group">
								<?= $this->Form->input('password', ['type' => 'password', 'required' => true, 'label' => __d('Users', 'New password'), 'class'=>'form-control']); ?>
							</div>
							<div class="form-group">
								<?= $this->Form->input('password_confirmation', ['type' => 'password', 'required' => true, 'label' => __d('Users', 'Re-type password'), 'class'=>'form-control']); ?>
							</div>
							<?= $this->Form->end() ?>
							<div class="clearfix"></div>
							<p><a type="submit" class="btn btn-login btn-default">SUBMIT</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>
		</div>
	</div>
</section>