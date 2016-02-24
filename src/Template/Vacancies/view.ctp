<section id="content" class="profile" style="margin-top:5%;">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="block-profile-form">
          <div class="title-detail">
            <h3><?= h($vacancy->vacancy_name) ?></h3>
          </div>
          <div class="block-content-profile-vac">
            <div class="form-content">
              <?= $this->Form->create() ?>
                <div class="form-group">
                  <label>POSITION</label>
                  <p><?= h($vacancy->job_name) ?></p>
                </div>
                <div class="form-group">
                  <label>RESPONSIBILITY</label>
                  <p><?= $vacancy->remark ?></p>
                </div>
                <div class="form-group">
                  <label>REQUIREMENT</label>
                  <p><?= $vacancy->required_personel ?></p>
                </div>
                <div class="form-group">
                  <label>CLOSE DATE</label>
                  <p><?= $vacancy->valid_date_to ?></p>
                </div>
                <div class="form-group">
                  <label>ADDRESS OFFICE</label>
                  <p><?= $vacancy->company_name ?></p>
                  <p><?= $vacancy->address_line ?></p>
                </div>
                <div class="form-group">
                  <label>PHONE NUMBER</label>
                  <p>021-7612098</p>
                </div>
                <!-- <div class="form-group">
                  <a href="">www.fifgroup-bandung.com/vacancy</a>
                </div> -->
              <?= $this->Form->end() ?>
            </div>
          </div>
          <div class="post-content">
            <div class="button-find">
              <a href="#" class="find-job">APPLY</a>&nbsp;&nbsp;<a href="#" class="find-job">ADD TO JOBLIST</a>&nbsp;&nbsp;<a href="javascript:history.back();" class="find-job" >BACK</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>