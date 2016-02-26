<div class="block-photo-profile" align="center">
  <div class="block-menu-profile">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-4">
        </div>  
        <div class="col-lg-4">
          <div class="img-photo">
            <?= $this->Html->image($applicant->avatar_url(), ['class'=>'img-responsive', 'alt'=>'profile']) ?>
          </div>
          <h2><?= $applicant->full_name ?></h2>
          <p><strong>Birth Date: </strong> <?= $applicant->birthdate ?> </p>
          <p><strong>Email: </strong> <?= $applicant->email ?> </p>
          <!-- <p><strong>Skills: </strong>
            <span class="tags">html5</span> 
            <span class="tags">css3</span>
            <span class="tags">jquery</span>
            <span class="tags">bootstrap3</span>
          </p> -->
          <div class="btn-edit">
            <?= $this->Html->link($this->Html->tag('i','',['class'=>'fa fa-users']).$this->Html->tag('span','  Click here to enable edit'), ['action' => 'edit', 'controller'=>'Applicants', $applicant->id], ['escape'=>false, 'class'=>"menu-profile"]) ?>
          </div>
        </div>  
        <div class="col-lg-4"></div>    
      </div>
    </div>
  </div>
</div>