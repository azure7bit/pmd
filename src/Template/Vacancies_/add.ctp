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
            <label for="inputEmail3" class="col-sm-2 control-label">Vacancy Name</label>
            <div class="col-sm-5">
              <input type="text" name="vacancy_name" class="form-control" id="inputEmail3" placeholder="">
            </div>
          </div>        
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Add Description
        </button>
        <div class="collapse" id="collapseExample">
          <div>
            <br>        
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Company &nbsp;</label>
                  <select name="company_id" class="form-control">
                    <option selected="">Select Company</option>
                    <?php foreach($companies as $companies){ ?>
                    <option value="<?php echo $companies->id ?>"><?php echo $companies->company_name ?></option>
                    <?php }?>                    
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Branch &nbsp;</label>
                  <select name="branch_id" class="form-control">
                    <option selected="">Select Branch</option>
                    <?php foreach($branches as $branches){ ?>
                    <option value="<?php echo $branches->id ?>"><?php echo $branches->branch_name ?></option>
                    <?php }?>                    
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Organisation &nbsp;</label>
                  <select name="organization_id" class="form-control">
                    <option selected="">Select Organization</option>
                    <?php foreach($organizations as $organizations){ ?>
                    <option value="<?php echo $organizations->id ?>"><?php echo $organizations->organization_name ?></option>
                    <?php }?>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Job &nbsp;</label>
                  <select name="job_id" class="form-control">
                    <option selected="">Select Job</option>
                    <?php foreach($jobs as $jobs){ ?>
                    <option value="<?php echo $jobs->id ?>"><?php echo $jobs->job_name ?></option>
                    <?php }?>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">People Category &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Employment Category &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
                  </select>
                </div><br>            
            
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Valid</label>
                <input type="text" class="form-control" name="daterange" value="01/01/2015 - 01/31/2015" />
              </div>
                    
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Required Person</label>
                <input type="number" class="form-control"/>
              </div>
                 
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Vacancy Status</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Open
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Closed
                  </label>
                </div>
              </div>
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Remark</label>
                <textarea type="text" class="form-control" id="exampleInputquest" placeholder=""></textarea>
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
        <?= $this->Form->button(__('Submit')) ?>
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