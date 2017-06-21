<?php 
  session_start();
  if (isset($_SESSION['username'])) {
  	$pageTitle = 'Dashboard';

  	include 'init.php';
  	
    /*  Start Dashboard Page  */ 

    ?>

      <!-- Start Home Stats -->
      <div class="home-stats">
        <div class="container">
          <h1 class="text-center">Dashboard</h1>
          <div class="row">
            <!-- Start Total Members Widget -->
            <div class="col-md-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo countItems('klant_id', 'klant'); ?></h3>
                  <p><?php echo lang('TOTAL MEMBERS'); ?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <?php echo lang('MORE INFO'); ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- End Total Members Widget --> 
            <!-- Start Items Widget -->
            <div class="col-md-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>50</h3>
                  <p><?php echo lang('TOTAL ITEMS'); ?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <?php echo lang('MORE INFO'); ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- End Total Items Widget --> 
            <!-- Start Orders Widget -->
            <div class="col-md-3">
              <!-- small box -->
              <div class="small-box bg-parse">
                <div class="inner">
                  <h3>50</h3>
                  <p><?php echo lang('NEW ORDERS'); ?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-cart-arrow-down"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <?php echo lang('MORE INFO'); ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- End Total Orders Widget -->
            <!-- Start Total Comments Widget -->
            <div class="col-md-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>50</h3>
                  <p><?php echo lang('TOTAL REVIEWS'); ?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-comments"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <?php echo lang('MORE INFO'); ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- End Total Comments Widget --> 
          </div>
        </div>
      </div>
      <!-- End Home Stats -->

      <!-- Start Latest Changes -->
      <div class="latest">
        <div class="container">
          <div class="row">
          <!-- Start Latest Rigesterd Users -->
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-users"></i> Latest registerd users
                </div>
                <div class="panel-body">
                  Test
                </div>
              </div>
            </div>
            <!-- Start Latest Rigesterd Users -->
            <!-- Start Latest Items -->
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-shopping-basket"></i> <?php echo lang('LATEST ITEMS'); ?>
                </div>
                <div class="panel-body">
                  Test
                </div>
              </div>
            </div>
            <!-- Start Latest Items -->
          </div>
        </div>
      </div>
      <!-- End Latest Changes -->

    <?php

    /*  End Dashboard Page  */

  	include $tpl . 'footer.inc.php';

  } else { 
  	header('Location: index.php');
  	exit();
  }

