<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicants form large-9 medium-8 columns content">
    <?= $this->Form->create($applicant, ['type' => "file"]) ?>
    <fieldset>
        <legend><?= __('Add Applicant') ?></legend>
        <?php
            echo $this->Form->input('id_card');
            echo $this->Form->input('full_name');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('address');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('birthdate', ['minYear' => date('Y') - 40, 'maxYear' => date('Y') - 19,]);            
            echo $this->Form->input('religion');
            echo $this->Form->input('blood_type');
            echo $this->Form->input('phone_number');
            echo $this->Form->input('gender');
            echo $this->Form->file('avatar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
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
        <form class="form-horizontal">
          <div class="form-group" align="left">
            <label for="inputEmail3" class="col-sm-2 control-label">Vacancy Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="inputEmail3" placeholder="">
            </div>
          </div>
        </form>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Add Description
        </button>
        <div class="collapse" id="collapseExample">
          <div>
            <br>
            <form>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Company &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Branch &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Organisation &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
                  </select>
                </div><br>
                <div class="form-group col-sm-7">
                  <label for="exampleInputName2">Job &nbsp;</label>
                  <select class="form-control">
                    <option selected="">Company 1</option>
                    <option>Company 2</option>
                    <option>Company 3</option>
                    <option>Company 4</option>
                    <option>Company 5</option>
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
            </form>
            <form>
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Valid</label>
                <input type="text" class="form-control" name="daterange" value="01/01/2015 - 01/31/2015" />
              </div>
            </form>
            <form>
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Required Person</label>
                <input type="number" class="form-control"/>
              </div>
            </form>
            <form>
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
            </form>
            <form>
              <div class="form-group col-sm-7">
                <label for="exampleInputquest">Remark</label>
                <textarea type="text" class="form-control" id="exampleInputquest" placeholder=""></textarea>
              </div>
            </form>
          </div>
        </div>
        <div class="clearfix"></div><br>
        <button class="btn btn-success" type="button">
          Save
        </button>
        <button class="btn btn-warning" type="button">
          Reset
        </button>
        <table>
          <tr>
            <td></td>
          </tr>
        </table>

        <br><br>


      </div>
    </div>
  </div>