<section id="content" class="profile" style='margin-top: 5%;'>
  <div class="container block-content">
    <div class="row">
      <div class="col-lg-12" align="center">
        <div class="block-profile">
          <h2>My PROFILE</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="block-profile-form">
          <?= $this->element('Applicant/menu') ?>
          <div class="block-content-edit-profile">
            <div class="form-content">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">ID CARD<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="exampleID" disabled> -->
                  <p><?= h($applicant->id_card ? $applicant->id_card : '-') ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">FULL NAME<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="exampleFullname" disabled> -->
                  <p><?= h($applicant->full_name ? $applicant->full_name : '-') ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NICK NAME<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="exampleNickname" disabled> -->
                  <p><?= h($applicant->nickname) ?></p>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">ID CARD<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="exampleID" disabled> -->
                  <p><?= h($applicant->handphone ? $applicant->handphone : '-') ?></p>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">PLACE<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="examplePlace" disabled> -->
                  <p><?= h($applicant->place) ?></p>
                </div>
                <div class="form-group ttl">
                  <label for="filter">BIRTH DATE<span class="mandatory">*</span></label>
                  <div class="clearfix"></div>
                  <p><?= h($applicant->birth_date) ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DOMICILIE<span class="mandatory">*</span></label>
                  <p><?= h($applicant->domicile) ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CURRENT ADDRESS<span class="mandatory">*</span></label>
                  <!-- <textarea id="message" class="form-control" name="message" required="required" rows="5" style="height: 124px;" disabled></textarea> -->
                  <p><?= $applicant->current_address ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">RELIGION<span class="mandatory">*</span></label>
                  <p><?= h($applicant->religion) ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">GENDER<span class="mandatory">*</span></label>
                  <!-- <select class="form-control" disabled>
                    <option value="0" selected>Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select> -->
                  <p><?= h($applicant->gender) ?></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">EMAIL ADDRESS<span class="mandatory">*</span></label>
                  <!-- <input type="email" class="form-control" id="exampleEmail" disabled> -->
                  <p><?= $applicant->email ?></p>
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
                    <tbody>
                    <?php foreach($applicant->applicant_educations as $education): ?>
                      <tr>
                        <td>
                          <!-- <select class="form-control" disabled>
                            <option value="0" selected>Level</option>
                            <option value="1">Level1</option>
                            <option value="2">Level2</option>
                          </select> -->
                          <input type="text" class="form-control" id="edc_level" value="<?= $education->edc_level ?>" disabled>
                          
                        </td>
                        <td>
                          <input type="text" class="form-control" id="institution" value="<?= $education->institution ?>" disabled>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="city" value="<?= $education->city ?>" disabled>
                        </td>
                        <td>
                          <input type="text" class="form-control" id="major" value="<?= $education->major ?>" disabled>
                        </td>
                        <td>
                          <!-- <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select> -->
                          <input type="text" class="form-control" id="start_year" value="<?= $education->start_year ?>" disabled>
                        </td>
                        <td>
                          <!-- <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select> -->
                          <input type="text" class="form-control" id="end_year" value="<?= $education->end_year ?>" disabled>
                        </td>
                        <td><input type="text" class="form-control" id="gpa" value="<?= $education->gpa ? $education->gpa : 0 ?>" disabled></td>     
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                  <!-- <div class="form-group">
                    <a href="#" class="add disabled">ADD</a>&nbsp;&nbsp;<a href="#" class="delete disabled">DELETE</a>
                  </div> -->
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
                    <tbody>
                      <tr>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Level</option>
                            <option value="1">Level1</option>
                            <option value="2">Level2</option>
                          </select>
                        </td>
                        <td><input type="email" class="form-control" id="exampleInstitution" disabled></td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td> 
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="form-group">
                    <a href="#" class="add disabled">ADD</a>&nbsp;&nbsp;<a href="#" class="delete disabled">DELETE</a>
                  </div> -->
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
                    <tbody>
                      <tr>
                        <td><input type="email" class="form-control" id="exampleCompany" disabled></td>
                        <td><input type="email" class="form-control" id="examplePosition" disabled></td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td>
                        <td><input type="email" class="form-control" id="exampleReason" disabled></td>    
                        <td><input type="email" class="form-control" id="exampleSalary" disabled></td>  
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="form-group">
                    <a href="#" class="add disabled">ADD</a>&nbsp;&nbsp;<a href="#" class="delete disabled">DELETE</a>
                  </div> -->
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
                    <tbody>
                      <tr>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Certification</option>
                            <option value="1">Certification1</option>
                            <option value="2">Certification2</option>
                          </select>
                        </td>
                        <td><input type="email" class="form-control" id="exampleCityother" disabled></td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Year</option>
                            <option value="1">2015</option>
                            <option value="2">2014</option>
                          </select>
                        </td>
                        <td><input type="email" class="form-control" id="exampleDesc" disabled></td>    
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="form-group">
                    <a href="#" class="add disabled">ADD</a>&nbsp;&nbsp;<a href="#" class="delete disabled">DELETE</a>
                  </div> -->
                </div>
                <div class="form-group line-bottom">
                  <label>INTERESTED</label>
                </div>
                <div class="form-group">
                  <table>
                    <thead>
                      <th><label>PRIORITY</label></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <select class="form-control" disabled>
                            <option value="0" selected>Priority</option>
                            <option value="1">Priority1</option>
                            <option value="2">Priority2</option>
                            <option value="2">Priority3</option>
                          </select>
                        </td> 
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="form-group">
                    <a href="#" class="add disabled">ADD</a>&nbsp;&nbsp;<a href="#" class="delete disabled">DELETE</a>
                  </div> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">EXPECTED SALARY</label>
                  <input type="email" class="form-control" id="exampleSalary" disabled>
                </div>
                <div class="form-group">
                  <label for="inlineRadio1">ARE YOU HAVE FRIEND OR RELATIVE IN FIFGROUP?</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled> Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled> No
                  </label><br>
                  <div class="form-group ttl">
                    <label for="filter">WHO ?</label>
                    <div class="clearfix"></div>
                    <div class="form-control no-border">
                      <input type="email" class="form-control" id="exampleNameSibing" disabled>
                    </div>
                    <select class="form-control" disabled>
                      <option value="0" selected>Sibling</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                    <select class="form-control" disabled>
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
                    <input type="radio" name="inlineRadioOptions2" id="inlineRadio1" value="option3" disabled> Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option4" disabled> No
                  </label><br>
                </div>
                <div class="form-group">
                  <label for="inlineRadio1">ARE YOU WILLING TO BUSINESS TRIP?</label><br>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions3" id="inlineRadio1" value="option5" disabled> Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions3" id="inlineRadio2" value="option6" disabled> No
                  </label><br>
                </div>
                <div class="form-group line-bottom">
                  <label>UPLOAD</label>
                </div>
                <div class="form-group">
                  <label>PHOTO</label>
                  <!-- <input id="exampleInputFile" type="file" disabled>
                  <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 200KB | JPG, JPEG, PNG.</p> -->
                  <p class="help-block" style="text-align:left; font-size:12px;">file : <?= h($applicant->avatar) ?></p>
                </div>
                <div class="form-group">
                  <label>CERTIFICATED</label>
                  <!-- <input id="exampleInputFile" type="file" disabled>
                  <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 1MB | PDF.</p> -->
                  <p class="help-block" style="text-align:left; font-size:12px;">file : <?= h($applicant->cv) ?></p>
                </div>
                <div class="form-group">
                  <label>TRANSCRIPT</label>
                  <!-- <input id="exampleInputFile" type="file" disabled>
                  <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 1MB | PDF.</p> -->
                  <p class="help-block" style="text-align:left; font-size:12px;">file : <?= h($applicant->transcript) ?></p>
                </div>
                <div class="form-group">
                  <label>CERTIFICATE</label>
                  <!-- <input id="exampleInputFile" type="file" disabled>
                  <p class="help-block" style="text-align:left; font-size:12px;">Maximum file size of 500KB | PDF.</p> -->
                  <p class="help-block" style="text-align:left; font-size:12px;">file : <?= h($applicant->certificate) ?></p>
                </div>
                <!-- <div class="form-group">
                  <br>
                  <div class="button-find">
                    <a href="#" class="find-job disabled">SAVE</a>&nbsp;&nbsp;<a href="#" class="find-job disabled">CANCEL</a>
                  </div>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>