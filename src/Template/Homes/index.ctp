
<section id="home-slider">
  <div id="slider" class="sl-slider-wrapper">
    <div class="sl-slider">
      <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
        <div class="bg-img bg-img-1"></div>
        <div class="slide-caption">
          <div class="container">
            <div class="caption-content">
              <h2 class="animated fadeInDown">FIFGROUP<br>e-Recruitment</h2>
              <span class="animated fadeInDown"><a href="#">HOW TO APPLY</a></span>
              <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
            </div>
          </div>
        </div>    
      </div>          
      <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
        <div class="bg-img bg-img-2"></div>
        <div class="slide-caption">
          <div class="container">
            <div class="caption-content">
              <h2 class="animated fadeInDown">FIFGROUP<br>e-Recruitment</h2>
              <span class="animated fadeInDown"><a href="#">HOW TO APPLY</a></span>
              <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
            </div>
          </div>
        </div>    
      </div>

      <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">

        <div class="bg-img bg-img-3"></div>
        <div class="slide-caption">
          <div class="container">
            <div class="caption-content">
              <h2 class="animated fadeInDown">FIFGROUP<br>e-Recruitment</h2>
              <span class="animated fadeInDown"><a href="#">HOW TO APPLY</a></span>
              <!-- <a href="#" class="btn btn-blue btn-effect">Join US</a> -->
            </div>
          </div>
        </div>

      </div>

    </div><!-- /sl-slider -->

        <!-- 
        <nav id="nav-arrows" class="nav-arrows">
          <span class="nav-arrow-prev">Previous</span>
          <span class="nav-arrow-next">Next</span>
        </nav>
      -->

      <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
        <a href="javascript:;" class="sl-prev">
          <i class="fa fa-angle-left fa-3x"></i>
        </a>
        <a href="javascript:;" class="sl-next">
          <i class="fa fa-angle-right fa-3x"></i>
        </a>
      </nav>

      <nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
        <span class="nav-dot-current"></span>
        <span></span>
        <span></span>
      </nav>

    </div><!-- /slider-wrapper -->
  </section>

  <section id="new-vacancy">
    <div class="container block-vac">
      <div class="row">
        <div class="col-lg-12">
          <h2>Available Vacancy &nbsp;<i class="fa fa-suitcase">&nbsp;</i></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <?php foreach ($vacancies as $vacancy): ?>
            <div class="col-lg-4">
              <div class="block-vacancy">
                <h4><?= $vacancy->vacancy_name ?></h4>
                <h5 class="detail-job"><?= $vacancy->remark ?></h5>
                <p class="time"><i class="fa fa-clock-o">&nbsp;</i><?= $vacancy->valid_date_to ?></p>
              </div>
              <!-- <div class="block-vacancy">
                <h4>Lorem ipsum dolor sit amet</h4>
                <h5 class="detail-job">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</h5>
                <p class="time"><i class="fa fa-clock-o">&nbsp;</i>11 November 2015</p>
              </div> -->
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="link-more">
        <div class="col-lg-12" align="right">
          <h5><a href="" class="view-more">View More</a></h5>
        </div>
      </div>
    </div>
  </section>

 <!--  <section id="link-homepage">
    <div class="container block-home">
      <div class="row">
        <div class="col-lg-12" align="center">
          <h2>FIFGROUP e-Recruitment</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-4">
              <div class="block-link" align="center">
                <?= $this->Html->image('applicant/banner-1.jpg', ['class'=>'img-responsive']) ?>
                <h4>ABOUT FIFGROUP</h4>
                <p class="detail-link">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="block-link" align="center">
                <?= $this->Html->image('applicant/banner-2.jpg', ['class'=>'img-responsive']) ?>
                <h4>VACANCY</h4>
                <p class="detail-link">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="block-link" align="center">
                <?= $this->Html->image('applicant/banner-3.jpg', ['class'=>'img-responsive']) ?>
                <h4>HOW TO APPLY</h4>
                <p class="detail-link">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 -->