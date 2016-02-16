<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?= $this->Html->charset() ?>
  <title>FIF E-Recruitment</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="img/applicant/fav-icon.png">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

  <?= $this->Html->css('applicant/font-awesome.min.css') ?>
  <?= $this->Html->css('applicant/jquery.fancybox.css') ?>
  <?= $this->Html->css('applicant/bootstrap.min.css') ?>
  <?= $this->Html->css('applicant/owl.carousel.css') ?>
  <?= $this->Html->css('applicant/slit-slider.css') ?>
  <?= $this->Html->css('applicant/animate.css') ?>
  <?= $this->Html->css('applicant/main.css') ?>

  <?= $this->Html->script('applicant/modernizr-2.6.2.min.js') ?>
  <!-- Essential jQuery Plugins
  ================================================== -->
  <!-- Main jQuery -->
  <?= $this->Html->script('applicant/jquery-1.11.1.min.js') ?>
  <!-- Twitter Bootstrap -->
  <?= $this->Html->script('applicant/bootstrap.min.js') ?>
  <!-- Single Page Nav -->

  <!-- jquery.fancybox.pack -->
  <?= $this->Html->script('applicant/jquery.fancybox.pack.js') ?>
  <!-- Owl Carousel -->
  <?= $this->Html->script('applicant/owl.carousel.min.js') ?>
  <!-- jquery easing -->
  <?= $this->Html->script('applicant/jquery.easing.min.js') ?>
  <!-- Fullscreen slider -->
  <?= $this->Html->script('applicant/jquery.slitslider.js') ?>
  <?= $this->Html->script('applicant/jquery.ba-cond.min.js') ?>
  <!-- onscroll animation -->
  <?= $this->Html->script('applicant/wow.min.js') ?>
  <!-- Custom Functions -->
  <?= $this->Html->script('applicant/main.js') ?>
</head>

<body id="body">
  <header id="navigation-top" class="navbar-inverse navbar-fixed-top animated-header">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <h1 class="navbar-brand">
          <a href="#body">
            <?= $this->Html->image('applicant/logo.png') ?>
          </a>
        </h1>
      </div>

      <!-- main nav -->
      <nav class="collapse navbar-collapse navbar-right" role="navigation">
        <ul id="nav" class="nav navbar-nav">
          <li><?= $this->Html->link(__('Home'), ['controller' => 'Homes', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('About'), ['controller' => 'Homes', 'action' => 'about']) ?></li>
          <li><?= $this->Html->link(__('Vacancy'), ['controller' => 'Vacancies', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('FAQ'), ['controller' => 'Homes', 'action' => 'faq']) ?></li>
          <?php if(empty($user)): ?>
            <li>
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm2">
              <i class="fa fa-lock">&nbsp;</i>SIGN IN</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">
              <i class="fa fa-user">&nbsp;</i>SIGNUP</a>
            </li>
          <?php endif; ?>
          <?php if(!empty($user)): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Welcome, <?= $user['full_name'] ?> <i class="fa fa-angle-down  fa-lg"></i>
              </a>
              <ul class="dropdown-menu bg-blue">
                <li>
                  <a href="/profile"><i class="fa fa-male fa-sm"></i> See Your Profile</a>
                </li>
                <li><a href="/setting"><i class="fa fa-cog fa-sm"></i> Setting</a></li>
                <li>
                  <a href="/logout" class="last"><i class="fa fa-power-off fa-sm"></i> Sign Out</a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </nav>

      <?= $this->element('Shared/modal') ?>
    </div>
  </header>
  
  <?= $this->Flash->render() ?>
  
  <main class="site-content" role="main">
    <?= $this->fetch('content') ?>
  </main>

  <footer id="footer">
    <div class="container">
      <div class="row text-center">
        <div class="footer-content">            
          <p>Copyright &copy; FIFGROUP e-Recruitment</p>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.creload').on('click', function() {
        var mySrc = $(this).prev().attr('src');
        var glue = '?';
        if(mySrc.indexOf('?')!=-1)  {
          glue = '&';
        }
        $(this).prev().attr('src', mySrc + glue + new Date().getTime());
        return false;
      });

      $("#addEducation").click(function(e){
        $('.trEducation').last().clone().appendTo(".bodyEducation");
        e.preventDefault();
      });
      $("#deleteEducation").click(function(e){
        if($('.trEducation').length > 1){
          $('.trEducation').last().remove();
        }
        e.preventDefault();
      });

      $("#addOrganization").click(function(e){
        $('.trOrganization').last().clone().appendTo(".bodyOrganization");
        e.preventDefault();
      });
      $("#deleteOrganization").click(function(e){
        if($('.trOrganization').length > 1){
          $('.trOrganization').last().remove();
        }
        e.preventDefault();
      });

      $("#addExperience").click(function(e){
        $('.trExperience').last().clone().appendTo(".bodyExperience");
        e.preventDefault();
      });
      $("#deleteExperience").click(function(e){
        if($('.trExperience').length > 1){
          $('.trExperience').last().remove();
        }
        e.preventDefault();
      });

      $("#addSkill").click(function(e){
        $('.trSkill').last().clone().appendTo(".bodySkill");
        e.preventDefault();
      });
      $("#deleteSkill").click(function(e){
        if($('.trSkill').length > 1){
          $('.trSkill').last().remove();
        }
        e.preventDefault();
      });

      $("#addInterest").click(function(e){
        $('.trInterest').last().clone().appendTo(".bodyInterest");
        e.preventDefault();
      });
      $("#deleteInterest").click(function(e){
        if($('.trInterest').length > 1){
          $('.trInterest').last().remove();
        }
        e.preventDefault();
      });
    });
  </script>
</body>
</html>