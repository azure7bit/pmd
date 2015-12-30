<!DOCTYPE html>
  <!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
  <!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
  <!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
  <!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
  <head>
    <!-- meta character set -->
    <?= $this->Html->charset() ?>
    
	<!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
	<!-- Meta Description -->
	<meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">

		
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="img/applicant/fav-icon.png">
		
	<!-- CSS================================================== -->
		
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

	<?= $this->Html->css('applicant/font-awesome.min.css') ?>
	<?= $this->Html->css('applicant/jquery.fancybox.css') ?>
	<?= $this->Html->css('applicant/bootstrap.min.css') ?>
	<?= $this->Html->css('applicant/owl.carousel.css') ?>
	<?= $this->Html->css('applicant/slit-slider.css') ?>
	<?= $this->Html->css('applicant/animate.css') ?>
	<?= $this->Html->css('applicant/main.css') ?>

	<?= $this->Html->script('applicant/modernizr-2.6.2.min.js') ?>
</head>
	
<body id="body">

  <!--Fixed Navigation==================================== -->
  <header id="navigation-top" class="navbar-inverse navbar-fixed-top animated-header">
    <div class="container">
      <div class="navbar-header">
      <!-- responsive nav button -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- /responsive nav button -->
					
      <!-- logo -->
      <h1 class="navbar-brand">
        <a href="#body">
		  <?= $this->Html->image('applicant/logo.png') ?>
		</a>
      </h1>
      <!-- /logo -->
   </div>

   <!-- main nav -->
   <nav class="collapse navbar-collapse navbar-right" role="navigation">
     <ul id="nav" class="nav navbar-nav">
       <li><?= $this->Html->link(__('Home'), ['controller' => 'Homes', 'action' => 'index']) ?></li>
       <li><?= $this->Html->link(__('About'), ['controller' => 'Homes', 'action' => 'about']) ?></li>
       <li><?= $this->Html->link(__('Vacancy'), ['controller' => 'Vacancies', 'action' => 'index']) ?></li>
       <li><?= $this->Html->link(__('FAQ'), ['controller' => 'Homes', 'action' => 'faq']) ?></li>
       <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm2"><i class="fa fa-lock">&nbsp;</i>SIGN IN</a></li>
       <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-user">&nbsp;</i>SIGNUP</a></li>
    </ul>
  </nav>

  <!-- /main nav -->
  <div class="modal fade  bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog  modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="head-modal" align="center">
			<?= $this->Html->image('applicant/logo.png', ['class' => 'img-responsive']) ?>
            <h2>LOGIN</h2>
          </div>
		  <div class="clearfix"></div>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">EMAIL</label>
              <input type="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">PASSWORD</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
         </form>
         <div class="col-lg-12 padding">
           <div class="row">
             <div class="col-lg-6">
               <div class="row">
                 <label>
                   <input type="checkbox">&nbsp;Remember Me
                 </label>
               </div>
             </div>
             <div class="col-lg-6">  
               <div class="row"> 
                 <p class="txt-forgot"><a href="">Forgot Password ?</a></p>
               </div>
             </div>
           </div>
         </div>
         <div class="clearfix"></div>
         <br>
         <a type="submit" class="btn btn-login btn-default">LOGIN</a>    
         <br>
         <p class="txt-account">Don't have an account? &nbsp;<a href="">Signup Here</a></p>  
       </div>
     </div>
   </div>
 </div>
 <div class="modal fade  bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
   <div class="modal-dialog  modal-md">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       </div>
       <div class="modal-body">
         <div class="head-modal" align="center">
		   <?= $this->Html->image('applicant/logo.png', ['class' => 'img-responsive']) ?>
           <h2>REGISTRATION</h2>
         </div>
         <div class="clearfix"></div>
          <?= $this->Form->create($user, ["url" => ["controller"=>"Authentications", "action"=>"register"]]); ?>
           <div class="form-group">
             <label for="exampleInputEmail1">FULL NAME</label>
             <!-- <input type="email" class="form-control" id="exampleInputname"> -->
             <?= $this->Form->input('full_name', ['class'=>'form-control', 'id'=>'exampleInputname', "label"=>'']); ?>
           </div>
           <div class="form-group">
              <label for="exampleInputPassword1">PASSWORD</label>
              <!-- <input type="email" class="form-control" id="exampleInputPassword"> -->
              <?= $this->Form->input('password', ['class'=>"form-control",'id'=>"exampleInputPassword", "label"=>'']); ?>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">RETYPE PASSWORD</label>
             <!-- <input type="email" class="form-control" id="exampleInputrEpASSWORD"> -->
             <?= $this->Form->input('password_confirm', ['class'=>"form-control",'id'=>"exampleInputrEpASSWORD",'type' => 'password', "label"=>'']); ?>
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">EMAIL</label>
             <!-- <input type="email" class="form-control" id="exampleInputEmail"> -->
             <?= $this->Form->input('email',['class' => 'form-control', 'id' =>'exampleInputEmail', "label"=>'']); ?>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">CAPTCHA</label>
             <!-- <form action="?" method="POST">
               <div class="g-recaptcha" data-sitekey="your_site_key"></div>
             </form> -->
             <?= $this->User->addReCaptcha(); ?>
           </div>
          <div class="clearfix"></div>
           <br>
           <!-- <a type="submit" class="btn btn-login btn-default">SIGNUP</a> -->
           <?= $this->Form->button(__d('Users', 'SIGNUP'), ['class' => "btn btn-login btn-default"]) ?>
           <br>
           <p class="txt-account">Already have an account? &nbsp;<a href="">Signin Here</a></p>
         </div>
         <?= $this->Form->end() ?>
       </div>
       </div>
      </div>
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
  </body>
</html>