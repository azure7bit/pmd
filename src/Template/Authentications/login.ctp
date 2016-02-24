<section id="content" class="profile" style="margin-top: 5%;">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>LOGIN</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="block-profile-form">
          <?= $this->Form->create(null, ["url" => ["controller"=>"Authentications", "action"=>"login"]]); ?>
            <div class="form-group">
              <?= $this->Form->input('email', ['class'=>'form-control']) ?>
            </div>
            <div class="form-group">
              <?= $this->Form->input('password', ['class'=>'form-control']) ?>
            </div>
            <div class="col-lg-12 padding">
              <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                    <label>
                      <input type="checkbox">&nbsp;Remember Me
                    </label>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="row"> 
                    <p class="txt-forgot"><a href="/forgot-password">Forgot Password ?</a></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <?= $this->Form->submit(__d('Users', 'LOGIN'), ['class' => "btn btn-login btn-default"]) ?>
            <br>
            <p class="txt-account">Don't have an account? &nbsp;<a href="/register">Signup Here</a></p>
          <?= $this->Form->end() ?>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</section>