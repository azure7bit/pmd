<div class="block-photo-profile" align="center">
  <div class="img-photo">
    <?= $this->Html->image($applicant->avatar_url(), ['class'=>'img-responsive', 'alt'=>'profile']) ?>
  </div>
  <div class="username-profile">
    <h4>Your Username</h4>
  </div>
  <div class="block-menu-profile">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-4">
          <a class="menu-profile" href="">
            <i class="fa fa-envelope">&nbsp;&nbsp;</i>Notification&nbsp;&nbsp;<span class="badge badge-info">8</span>
          </a>
        </div>  
        <div class="col-lg-4">
          <!-- <a class="menu-profile" href=""><i class="fa fa-users">&nbsp;&nbsp;</i>Edit Profile</a> -->
          <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-users']).$this->Html->tag('span','  Edit Profile'), ['action' => 'edit', 'controller'=>'Applicants', $applicant->id], ['escape'=>false, 'class'=>"menu-profile"]) ?>
        </div>  
        <div class="col-lg-4">
          <a class="menu-profile" href=""><i class="fa fa-send">&nbsp;&nbsp;</i>Your Joblist</a>
        </div>  
      </div>
    </div>
  </div>
</div>