      <!-- /main nav -->
      <div class="modal fade  bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="head-modal" align="center">
                <?= $this->Html->image('applicant/logo.png', ['class' => 'img-responsive']) ?>
                <h2>LOGIN</h2>
              </div>
              <div class="clearfix"></div>
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
                      <p class="txt-forgot"><a href="">Forgot Password ?</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <br>
              <?= $this->Form->submit(__d('Users', 'LOGIN'), ['class' => "btn btn-login btn-default"]) ?>
              <br>
              <p class="txt-account">Don't have an account? &nbsp;<a href="">Signup Here</a></p>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade  bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog  modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="head-modal" align="center">
                <?= $this->Html->image('applicant/logo.png', ['class' => 'img-responsive']) ?>
                <h2>REGISTRATION</h2>
              </div>
              <div class="clearfix"></div>
              <?= $this->Form->create(null, ["url" => ["controller"=>"Authentications", "action"=>"register"]]); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">FULL NAME</label>
                <!-- <input type="email" class="form-control" id="exampleInputname"> -->
                <?= $this->Form->input('full_name', ['class'=>'form-control', 'id'=>'exampleInputname', "label"=>'']); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">PASSWORD</label>
                <!-- <input type="email" class="form-control" id="exampleInputPassword"> -->
                <?= $this->Form->input('password', ['class'=>"form-control",'id'=>"exampleInputPassword", "label"=>'']); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">RETYPE PASSWORD</label>
                <!-- <input type="email" class="form-control" id="exampleInputrEpASSWORD"> -->
                <?= $this->Form->input('password_confirm', ['class'=>"form-control",'id'=>"exampleInputrEpASSWORD",'type' => 'password', "label"=>'']); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">EMAIL</label>
                <!-- <input type="email" class="form-control" id="exampleInputEmail"> -->
                <?= $this->Form->input('email',['class' => 'form-control', 'id' =>'exampleInputEmail', "label"=>'']); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">CAPTCHA</label>
                <?= $this->Captcha->create('captcha', ['type'=>'image', 'theme'=>'random']); ?>
              </div>
              <div class="clearfix"></div>
              <br>
              <!-- <a type="submit" class="btn btn-login btn-default">SIGNUP</a> -->
              <?= $this->Form->submit(__d('Users', 'SIGNUP'), ['class' => "btn btn-login btn-default"]) ?>
              <br>
              <p class="txt-account">Already have an account? &nbsp;<a href="">Signin Here</a></p>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>