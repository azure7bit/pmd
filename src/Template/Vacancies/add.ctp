<?= $this->Html->addCrumb('Add vacancy', ['action'=>'add', 'controller'=>'Vacancies'); ?>
    <div class="col-sm-9"> 
      <h2>Create Vacancy</h2>
      <hr>
      <?= $this->Form->create($vacancy, ['class' => 'form-horizontal']) ?>
      <div class="form-group" align="left">
        <div class="col-sm-5">                            
          <?= $this->Form->input('vacancy_code',['class' => 'form-control']) ?>
        </div>

        <div class="col-sm-5">                            
          <?= $this->Form->input('vacancy_name',['class' => 'form-control']) ?>
        </div>

      </div>
        <div>
                  
          <div class="form-group col-sm-7">                  
            <?= $this->Form->input('company_id', ['options'=>$companies, 'class' => 'form-control']) ?>                 
          </div>
          <div class="form-group col-sm-7">                  
            <?= $this->Form->input('branch_id', ['options'=>$branches, 'class' => 'form-control']) ?>
          </div>
          <div class="form-group col-sm-7">
            <?= $this->Form->input('organization_id', ['options'=>$organizations, 'class' => 'form-control']) ?>
          </div>
          <div class="form-group col-sm-7">
            <?= $this->Form->input('job_id', ['options'=>$jobs, 'class' => 'form-control']) ?>
          </div>
          <div class="form-group col-sm-7">
            <?= $this->Form->input('people_category_code',['class' => 'form-control']) ?>
          </div>
          <div class="form-group col-sm-7">
            <?= $this->Form->input('employment_category_code',['class' => 'form-control']) ?>
          </div>

          <div class="form-group col-sm-7">
            <label for="employment-category-code">Valid Start</label>
            <?= $this->Form->input('valid_start', ['class'=>"form-control", 'label' => false]) ?>
          </div>

          <div class="form-group col-sm-7">
            <label for="employment-category-code">Valid End</label>
            <?= $this->Form->input('valid_end', ['class'=>"form-control", 'label' => false]) ?>
          </div>

          <div class="form-group col-sm-7">
            <?= $this->Form->input('required_personnel', ['class'=>"form-control", 'type' => 'number', 'min' => 0]) ?>
          </div>

          <div class="form-group col-sm-7">
            <label for="exampleInputquest">Vacancy Status</label>
            <div class="radio">
              <label>
                <input type="radio" name="vacancy_status_code" id="optionsRadios1" value="option1" checked>
                Open
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="vacancy_status_code" id="optionsRadios2" value="option2">
                Closed
              </label>
            </div>
          </div>
          <div class="form-group col-sm-7">
            <?= $this->Form->input('remark',['class' => 'form-control']) ?>
          </div>            
        </div>
      <!-- </div> -->
      <div class="clearfix"></div>
      <button type="submit" class="btn btn-success">
        Save
      </button>
      <button class="btn btn-warning" type="button">
        Reset
      </button>
      <?= $this->Form->end() ?>
      <table>
        <tr>
          <td></td>
        </tr>
      </table>

      


    </div>