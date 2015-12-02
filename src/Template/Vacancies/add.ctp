<div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Library</a></li>
        <li class="active">Data</li>
      </ol>      
      <div class="col-lg-9"> 
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
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Add Description
        </button>
        <div class="collapse" id="collapseExample">
          <div>
            <br>        
                <div class="form-group col-sm-7">                  
                  <?= $this->Form->input('company_id', ['options'=>$companies, 'class' => 'form-control']) ?>                 
                </div><br>
                <div class="form-group col-sm-7">                  
                  <?= $this->Form->input('branch_id', ['options'=>$branches, 'class' => 'form-control']) ?>
                </div><br>
                <div class="form-group col-sm-7">
                  <?= $this->Form->input('organization_id', ['options'=>$organizations, 'class' => 'form-control']) ?>
                </div><br>
                <div class="form-group col-sm-7">
                  <?= $this->Form->input('job_id', ['options'=>$jobs, 'class' => 'form-control']) ?>
                </div><br>
                <div class="form-group col-sm-7">
                  <?= $this->Form->input('people_category_code',['class' => 'form-control']) ?>
                </div><br>
                <div class="form-group col-sm-7">
                  <?= $this->Form->input('employment_category_code',['class' => 'form-control']) ?>
                </div><br>            
            
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Valid</label>
                <input type="text" class="form-control" name="daterange" value="01/01/2015 - 01/31/2015" />
              </div>
                    
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Required Person</label>
                <input type="number" name="required_personnel" class="form-control"/>
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
        </div>
        <div class="clearfix"></div><br>
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

        <br><br>


      </div>
    </div>
  </div>