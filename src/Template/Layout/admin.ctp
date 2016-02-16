<?php $cakeDescription = 'Admin' ?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css('bootstrap.css') ?>
  <?= $this->Html->css('style.css') ?>
  <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body>
  <nav class="navbar navbar-default nav-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <?= $this->Html->image('logo.png', ['class' => 'img-responsive img-brand']);?>        
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <?php if(!empty($user)): ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span> 
                <strong>Welcome, User</strong>
                <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="navbar-login">
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="text-center">
                          <span class="glyphicon glyphicon-user icon-size"></span>
                        </p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-left"><strong><?= $user['full_name'] ?></strong></p>
                        <p class="text-left small"><?= $user['email'] ?></p>
                        <p class="text-left">
                          <a href="#" class="btn btn-primary btn-block btn-sm">Settings</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="divider"></li>
                <li>
                  <div class="navbar-login navbar-login-session">
                    <div class="row">
                      <div class="col-lg-12">
                        <p>
                          <?= $this->Html->link(__('Logout'), ['controller'=>'Authentications', 'action' => 'logout'], ['class'=>"btn btn-danger btn-block"]) ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          <?php endIf ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?= $this->Flash->render() ?>

    <?php if(!empty($user)): ?>
      <!-- NAVBAR  -->
      <div class="col-sm-3 col-md-3 sidebar">
        <div class="mini-submenu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </div>
        <div class="list-group">
          <span href="#" class="list-group-item active titlemenu">
            <strong>MENU</strong>
            <!-- <span class="pull-right" id="slide-submenu">
              <i class="fa fa-times"></i>
            </span> -->
          </span>

          <a class="list-group-item" role="button" data-toggle="collapse" 
            data-parent="#accordion" href="#collapse2" aria-expanded="true" 
            aria-controls="collapseOne">
            <i class="fa fa-comment-o"></i> 
            Applicants <i class="fa fa-angle-down pull-right"></i> 
          </a>
          <div id="collapse2" class="panel-collapse collapse" role="tabpanel" 
          aria-labelledby="headingOne">
            <div>
              <?= $this->Html->link($this->Html->tag('i', 'Manage Applicants', ['class' => 'fa fa-facebook']), ['controller' => 'applicants', 'action'=>'index'], ['escape' => false, 'class' => 'itemsubs list-group-item']); ?>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Schedule Psikotes
              </a>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Schedule Interview
              </a>
            </div>
          </div>
          
          <a class="list-group-item active" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-bar-chart-o"></i> Vacancy <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <!-- <div> -->
              <a href="vacancies/add" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Create Vacancy
              </a>              
              <?= $this->Html->link($this->Html->tag('', 'Vacancies', ['class' => 'fa fa-facebook']), ['controller' => 'Vacancies', 'action'=>'Index'], ['escape' => false, 'class' => 'itemsubs list-group-item']); ?>
            <!-- </div> -->
          </div>

          <a class="list-group-item active" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-envelope"></i> Application Form <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div>
              <a href="index.html" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Create Section
              </a>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Manage Form
              </a>
            </div>
          </div>

          <a class="list-group-item active" role="button" data-toggle="collapse" data-parent="#accordion" href="#companies" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-envelope"></i> Companies <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div id="companies" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div>
              <a href="index.html" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Create Companies
              </a>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Manage Companies
              </a>
            </div>
          </div>

        </div>         
      </div>
      <!-- END NAVBAR  -->
    <?php endif ?>
    <!-- CONTENT  -->
    <div class="col-lg-9"> 
      <div class="container">
        <div class="row">
          <?= !empty($user) ? $this->Html->getCrumbs(' > ', 'Home') : null; ?>
          <?= $this->fetch('content') ?>    
        </div>
      </div>
    </div>
    <!-- CONTENT  -->


    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.validate.min') ?>
    <?= $this->Html->script('filter-table.js') ?>
    <?= $this->Html->script('ValidationFormScript.js') ?>
    <script type="text/javascript">
      $(function(){

        $('#slide-submenu').on('click',function() {             
          $(this).closest('.list-group').fadeOut('slide',function(){
            $('.mini-submenu').fadeIn();  
          });

        });

        $('.mini-submenu').on('click',function(){   
          $(this).next('.list-group').toggle('slide');
          $('.mini-submenu').hide();
        })
      })

      var room = 1;
      function add_fields() {
        $('.add_room_fields').append($('.form_table').html());
      }

      $('.creload').on('click', function() {
        var mySrc = $(this).prev().attr('src');
        var glue = '?';
        if(mySrc.indexOf('?')!=-1)  {
          glue = '&';
        }
        $(this).prev().attr('src', mySrc + glue + new Date().getTime());
        return false;
      });
    </script>
  </body>
  </html>
