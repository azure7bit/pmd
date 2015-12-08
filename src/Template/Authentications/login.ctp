<?php use Cake\Core\Configure; ?>


<div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="box-login">
          <?= $this->Flash->render('auth') ?>
          <center><h2><legend><?= __d('Users', 'Please enter your email and password') ?></legend></h2></center>           
           <?= $this->Form->create(null,['class' => 'form-horizontal']) ?>
            <fieldset>
              <!-- Text input-->
              <div class="form-group nomargin">
                <label class="control-label" for="Email">Email</label>
                <div>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>                    
                    <?= $this->Form->input('email', ['required' => true, 'id' => 'Email', 'placeholder' => 'Enter Your Email', 'class' => 'form-control input-md', 'label' => false]) ?>        
                  </div>
                </div>
              </div>
              
              <!-- Password input-->
              <div class="form-group nomargin">
                <label class="control-label" for="Password">Password</label>
                <div>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>                    
                    <?= $this->Form->input('password', ['required' => true, 'id' => 'password', 'placeholder' => 'Enter Your Password' , 'class' => 'form-control input-md' , 'label' => false]) ?>
                  </div>
                </div>
              </div>
              <br>
              <?php
              if (Configure::check('Users.RememberMe.active')) {
                  echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                      'type' => 'checkbox',
                      'label' => __d('Users', 'Remember me'),
                      'checked' => 'checked'
                  ]);
              }
              ?>

              <?php              
              if (Configure::check('Users.Email.required')) {                  
                  echo $this->Html->link(__d('users', 'Reset Password'), ['action' => 'requestResetPassword']);
              }
              ?>

              <?= $this->Html->link(__d('users', 'Sign Up'), ['action' => 'register']); ?>
              <br><br>
              <!-- Button -->
              <div class="form-group nomargin">
                <div class="pull-right">
                  <button id="Submit" class="btn btn-success" type="Submit">Press To Validate</button>
                </div>
              </div>
            </fieldset>
          <?= $this->Form->end() ?>
        </div>


      </div>
    </div>
  </div>