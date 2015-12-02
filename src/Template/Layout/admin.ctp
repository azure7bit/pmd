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
        <ul class="nav navbar-nav">
          <!-- <li class="active"><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li> -->
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span> 
              <strong>Welcome, User</strong>
               <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="navbar-login">
                  <div class="row">
                    <div class="col-lg-4">
                      <p class="text-center">
                          <span class="glyphicon glyphicon-user icon-size"></span>
                      </p>
                    </div>
                    <div class="col-lg-8">
                      <p class="text-left"><strong>User</strong></p>
                      <p class="text-left small">user@email.com</p>
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
                        <a href="#" class="btn btn-danger btn-block">Logout</a>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <?= $this->Flash->render() ?>

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

          <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-comment-o"></i> Applicants <i class="fa fa-angle-down pull-right"></i> 
          </a>
          <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div>
              <a href="manage-applicant.html" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Manage Applicants
              </a>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Schedule Psikotes
              </a>
              <a href="#" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Schedule Interview
              </a>
            </div>
          </div>
          
          <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-bar-chart-o"></i> Vacancy <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div>
              <a href="vacancies/add" class="itemsubs list-group-item">
                <i class="fa fa-search"></i> Create Vacancy
              </a>              
              <?= $this->Html->link($this->Html->tag('i', 'vacancies', ['class' => 'fa fa-facebook'
            ]), ['controller' => 'Vacancies', 'action'=>'index'], ['escape' => false, 'class' => 'btn btn-primary']); ?>
            </div>
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
        </div>         
      </div>
          <!-- END NAVBAR  -->

    <!-- CONTENT  -->
    <div class="col-lg-9"> 
    <?= $this->fetch('content') ?>    
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
  </script>
  <script type="text/javascript">
    var room = 1;
    function add_fields() {
        // var objTo = document.getElementById('room_fileds')
        // var divtest = document.createElement("div");
        // divtest.innerhtml = $('#room_fileds').html();
        
        // objTo.appendChild(divtest);
        // $('#room_fileds').clone().appendTo('.add_room_fields');
        $('.add_room_fields').append($('.form_table').html());

    }
  </script>
  </body>
</html>
