<section id="content" class="profile">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>VACANCY</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="block-profile-form">
          <div class="block-desc-vac" align="center">
            <small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</small>
            <div class="button-find">
              <a href="#" class="find-job">HOW TO APPLY</a>
            </div>
          </div>
          <div class="title">
            <h3>SEARCH YOUR VACANCY</h3>
          </div>
          <div class="search-vac">
            <div class="col-lg-12 block-search">
              <?= $this->Form->create() ?>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <select name='criteria' class="form-control">
                        <option value="" selected>JOBLIST</option>
                        <option value="vacancy_name">Name</option>
                        <option value="job_name">Position</option>
                        <option value="company_name">Placed</option>
                        <option value="valid_date_from">Post Date</option>
                        <option value="valid_date_to">Closed Date</option>
                      </select>
                    </div>
                  </div>  
                  <div class="col-lg-4">
                    <div class="form-group">
                      <?= $this->Form->input('search', ['class'=>'form-control', 'id'=>'vacancy', 'placeholder'=>'Enter Keywords..', 'label'=>false]) ?>
                    </div>
                  </div>  
                  <div class="col-lg-4">
                    <?= $this->Form->submit(__d('Vacancies', 'SEARCH'), ['class' => "btn searh-vac"]) ?>
                  </div>
                </div>
              <?= $this->Form->end() ?>
            </div>
          </div>
          <div class="block-content-profile">
            <div class="form-content">
              <table class="table table-striped custab">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Placed</th>
                    <th>Post Data</th>
                    <th>Close Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  <?php foreach ($vacancies as $vacancy): ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= h($vacancy->vacancy_name) ?></td>
                      <td><?= h($vacancy->job_name) ?></td>
                      <td><?= h($vacancy->company_name) ?></td>
                      <td><?= h($vacancy->valid_date_from) ?></td>
                      <td><?= h($vacancy->valid_date_to) ?></td>
                      <td>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vacancy->vacancy_id], ['class'=>'btn btn']) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>
            <!-- <div class="page-nation" align="center">
              <ul class="pagination pagination-large">
                <li class="disabled"><span>«</span></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="disabled"><span>...</span></li><li>
                <li><a rel="next" href="#">»</a></li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>