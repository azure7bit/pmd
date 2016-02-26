<section id="content" class="profile">
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>YOUR PROFILE</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="block-profile-form">
          <?= $this->element('Applicant/menu') ?>
            <div class="block-content-edit-profile">
              <div class="form-content">
                <?= $this->Form->create(null, ['type'=>'file']) ?>
                  <div class="form-group">
                    <?= $this->Form->input('id_card', ['value'=>$applicant->id_card, 'class'=>'form-control']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('email', ['value'=>$applicant->email, 'class'=>'form-control', 'type'=>'email']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('nickname', ['value'=>$applicant->nickname, 'class'=>'form-control']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('handphone', ['value'=>$applicant->handphone, 'class'=>'form-control']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('place', ['value'=>$applicant->place, 'class'=>'form-control']) ?>
                  </div>
                  <div class='input-group date'>
                    <?= $this->Form->input('birthdate', ['class'=>'form-control', 'id'=>'birthdate', 'value'=>$applicant->birthdate, 'type'=>'text']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('domicile', ['class'=>'form-control', 'value'=>$applicant->domicile]) ?>
                  </div>
                  <div class="form-group">
                    <label>Current Address</label>
                    <?= $this->Form->textarea('current_address',['class'=>"form-control",'rows'=>5,'height'=>'124px','value'=>$applicant->current_address]) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('religion', ['class'=>'form-control', 'value'=>$applicant->religion]) ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">GENDER<span class="mandatory">*</span></label>
                    <div class="clearfix"></div>
                    <?= $this->Form->radio('gender', [['value'=>'Male','text'=>'Male'],['value'=>'Female','text'=>'Female']],['value'=>$applicant->gender, 'class'=>'form-control']) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('email', ['type'=>'email', 'class'=>'form-control', 'value'=>$applicant->email] ) ?>
                  </div>

                    <div class="form-group line-bottom">
                      <label>EDUCATION</label>
                    </div>
                    <div class="form-group">
                      <table>
                        <thead>
                          <th><label>LEVEL</label></th>
                          <th><label>UNIVERSITY / INSTITUTION</label></th>
                          <th><label>CITY</label></th>
                          <th><label>MAJOR</label></th>
                          <th><label>START YEAR</label></th>
                          <th><label>END YEAR</label></th>
                          <th><label>GPA</label></th>
                        </thead>
                        <tbody class="bodyEducation">
                      <?php if(!empty($applicant->applicant_educations)){ ?>
                        <?php foreach($applicant->applicant_educations as $education): ?>
                          <tr class="trEducation">
                            <td>
                              <!-- <select class="form-control" >
                                <option value="0" selected>Level</option>
                                <option value="1">Level1</option>
                                <option value="2">Level2</option>
                              </select> -->
                              <input type="text" class="form-control" id="edc_level" value="<?= $education->edc_level ?>" >
                              
                            </td>
                            <td>
                              <input type="text" class="form-control" id="institution" value="<?= $education->institution ?>" >
                            </td>
                            <td>
                              <input type="text" class="form-control" id="city" value="<?= $education->city ?>" >
                            </td>
                            <td>
                              <input type="text" class="form-control" id="major" value="<?= $education->major ?>" >
                            </td>
                            <td>
                              <!-- <select class="form-control" >
                                <option value="0" selected>Year</option>
                                <option value="1">2015</option>
                                <option value="2">2014</option>
                              </select> -->
                              <input type="text" class="form-control" id="start_year" value="<?= $education->start_year ?>" >
                            </td>
                            <td>
                              <!-- <select class="form-control" >
                                <option value="0" selected>Year</option>
                                <option value="1">2015</option>
                                <option value="2">2014</option>
                              </select> -->
                              <input type="text" class="form-control" id="end_year" value="<?= $education->end_year ?>" >
                            </td>
                            <td><input type="text" class="form-control" id="gpa" value="<?= $education->gpa ? $education->gpa : 0 ?>" ></td>     
                          </tr>
                          <?php endforeach; ?>
                        <?php } else { ?>
                          <tr class="trEducation">
                            <td>
                              <select class="form-control" >
                                <option value="0" selected>Level</option>
                                <option value="1">Level1</option>
                                <option value="2">Level2</option>
                              </select>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="institution" value="" >
                            </td>
                            <td>
                              <input type="text" class="form-control" id="city" value="" >
                            </td>
                            <td>
                              <input type="text" class="form-control" id="major" value="" >
                            </td>
                            <td>
                              <select class="form-control" >
                                <option value="0" selected>Year</option>
                                <option value="1">2015</option>
                                <option value="2">2014</option>
                              </select>
                            </td>
                            <td>
                              <select class="form-control" >
                                <option value="0" selected>Year</option>
                                <option value="1">2015</option>
                                <option value="2">2014</option>
                              </select>
                            </td>
                            <td><input type="text" class="form-control" id="gpa" value="" ></td> 
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <div class="form-group">
                        <a href="#" class="add" id="addEducation">ADD</a>&nbsp;&nbsp;<a href="#" id="deleteEducation" class="delete ">DELETE</a>
                      </div>
                    </div>

                  <div class="form-group line-bottom">
                    <label>ORGANIZATION</label>
                  </div>
                  <div class="form-group">
                    <table>
                      <thead>
                        <th><label>INSTITUTION</label></th>
                        <th><label>POSITION</label></th>
                        <th><label>START YEAR</label></th>
                        <th><label>END YEAR</label></th>
                      </thead>
                      <tbody class="bodyOrganization">
                        <tr class="trOrganization">
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Level</option>
                              <option value="1">Level1</option>
                              <option value="2">Level2</option>
                            </select>
                          </td>
                          <td><input type="email" class="form-control" id="exampleInstitution"></td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td> 
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                      <a href="#" id="addOrganization" class="add ">ADD</a>&nbsp;&nbsp;<a id="deleteOrganization" href="#" class="delete ">DELETE</a>
                    </div>
                  </div>

                  <div class="form-group line-bottom">
                    <label>WORKING EXPERIENCE</label>
                  </div>
                  <div class="form-group">
                    <table>
                      <thead>
                        <th><label>COMPANY</label></th>
                        <th><label>POSITION</label></th>
                        <th><label>START YEAR</label></th>
                        <th><label>END YEAR</label></th>
                        <th><label>REASON FOR LEAVING</label></th>
                        <th><label>SALARY</label></th>
                      </thead>
                      <tbody class="bodyExperience">
                        <tr class="trExperience">
                          <td><input type="email" class="form-control" id="exampleCompany" ></td>
                          <td><input type="email" class="form-control" id="examplePosition" ></td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td>
                          <td><input type="email" class="form-control" id="exampleReason" ></td>    
                          <td><input type="email" class="form-control" id="exampleSalary" ></td>  
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                      <a href="#" class="add" id="addExperience">ADD</a>&nbsp;&nbsp;<a href="#" class="delete" id="deleteExperience">DELETE</a>
                    </div>
                  </div>

                  <div class="form-group line-bottom">
                    <label>OTHER SKILL</label>
                  </div>
                  <div class="form-group">
                    <table>
                      <thead>
                        <th><label>CERTIFICATION</label></th>
                        <th><label>CITY</label></th>
                        <th><label>HOW LONG</label></th>
                        <th><label>YEAR</label></th>
                        <th><label>DESCRIPTION</label></th>
                      </thead>
                      <tbody class="bodySkill">
                        <tr class="trSkill">
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Certification</option>
                              <option value="1">Certification1</option>
                              <option value="2">Certification2</option>
                            </select>
                          </td>
                          <td><input type="email" class="form-control" id="exampleCityother" ></td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Year</option>
                              <option value="1">2015</option>
                              <option value="2">2014</option>
                            </select>
                          </td>
                          <td><input type="email" class="form-control" id="exampleDesc" ></td>    
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                      <a href="#" class="add" id="addSkill">ADD</a>&nbsp;&nbsp;<a href="#" class="delete" id="deleteSkill">DELETE</a>
                    </div>
                  </div>

                  <div class="form-group line-bottom">
                    <label>INTERESTED</label>
                  </div>
                  <div class="form-group">
                    <table>
                      <thead>
                        <th><label>PRIORITY</label></th>
                      </thead>
                      <tbody class="bodyInterest">
                        <tr class="trInterest">
                          <td>
                            <select class="form-control" >
                              <option value="0" selected>Priority</option>
                              <option value="1">Priority1</option>
                              <option value="2">Priority2</option>
                              <option value="2">Priority3</option>
                            </select>
                          </td> 
                        </tr>
                      </tbody>
                    </table>
                    <div class="form-group">
                      <a href="#" class="add " id="addInterest">ADD</a>&nbsp;&nbsp;<a href="#" class="delete " id="deleteInterest">DELETE</a>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">EXPECTED SALARY</label>
                    <input type="email" class="form-control" id="exampleSalary" >
                  </div>

                  <div class="form-group">
                    <label for="inlineRadio1">ARE YOU HAVE FRIEND OR RELATIVE IN FIFGROUP?</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" > Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" > No
                    </label>

                    <div class="clearfix"></div>

                    <div class="form-group ttl">
                      <label for="filter">WHO ?</label>
                      <div class="clearfix"></div>
                      
                      <select class="form-control" >
                        <option value="0" selected>Sibling</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      <select class="form-control" >
                        <option value="0" selected>Position</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inlineRadio1">ARE YOU WILLING TO LOCATED ALL AROUND INDONESIA?</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio1" value="option3" > Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option4" > No
                    </label><br>
                  </div>
                  <div class="form-group">
                    <label for="inlineRadio1">ARE YOU WILLING TO BUSINESS TRIP?</label><br>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio1" value="option5" > Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions3" id="inlineRadio2" value="option6" > No
                    </label><br>
                  </div>
                  <div class="form-group line-bottom">
                    <label>UPLOAD</label>
                  </div>
                  <div class="form-group">
                    <label>PHOTO</label>
                    <?= $this->Form->input('avatar', ['label'=>false, 'type'=>'file', 'value'=>$applicant->avatar]) ?>
                    <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 200KB | JPG, JPEG, PNG.</p>
                  </div>
                  <div class="form-group">
                    <label>CERTIFICATED</label>
                    <input id="exampleInputFile" type="file" >
                    <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 1MB | PDF.</p>
                  </div>
                  <div class="form-group">
                    <label>TRANSCRIPT</label>
                    <input id="exampleInputFile" type="file" >
                    <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 1MB | PDF.</p>
                  </div>
                  <div class="form-group">
                    <label>RESUME</label>
                    <input id="exampleInputFile" type="file" >
                    <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 500KB | PDF.</p>
                  </div>
                  <div class="form-group">
                    <br>
                    <div class="button-find">
                      <?= $this->Form->button('Save', ['class'=>'find-job']) ?>
                      <?= $this->Form->button('Cancel', ['class'=>'find-job']) ?>
                    </div>
                  </div>
                <?= $this->Form->end() ?>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>