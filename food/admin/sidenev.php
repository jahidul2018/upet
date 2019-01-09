<?php session_start();?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">upet</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> ADMIN DESHBOARD</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['email']; ?><b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                   <!-- <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>-->
                    <li>
                        <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                  <!--   <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li><a href="adopt.php">ADOPT PET</a></li>
							<li><a href="Shelter.php">SHELTER</a></li>
							<li><a href="food.php">PURCHASE FOOD</a></li>
							<li><a href="trainer.php">TRAINER</a></li>
							<li><a href="lostandfound.php">LOST &AMP; FOUND</a></li>
							<li><a href="club.php"> CLUB</a></li>

                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
					
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> ADOPT PET<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                             <li><a href="pet.php"> Adoption list</a></li>
                                 <li><a href="addpets.php">Add new Pet</a></li>
                                     <li><a href="ordersadopt.php">Addoption application</a></li>


                           
                        </ul>
                    </li>
                    <li>
                       <a href="#"><i class="fa fa-sitemap fa-fw"></i> SHELTER<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="viewshelter.php"> Shelter List</a></li>
                                <li><a href="addshelter.php">Add Shelter</a></li>
                                <li><a href="orders-shelter.php">View Request</a></li>
                                <li><a href="Booking-Placed-orders-shelter.php">Booking Placed </a></li>
                                  <li><a href="Cancelled-orders-shelter.php">Cancelled orders</a></li>
                                  <li><a href="paid-orders-shelter.php">paid orders</a></li>
                                  <li><a href="confirmpaid-orders-shelter.php">Confirm orders</a></li>
                                                
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> PURCHASE FOOD<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                           
                          
                            

                            <li>
                                <a href="#">Categories <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="categories.php">View Categories</a></li>
                                    <li><a href="addcategory.php">Add Category</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">products <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="products.php">View Products</a></li>
                                     <li><a href="addproduct.php">Add Product</a></li>
                                </ul>
                            </li>
                              <li><a href="orders.php">View Orders</a></li>
                               <li><a href="sale-items.php" title="">sold products</a></li>



                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> TRAINER<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li><a href="viewtrainer.php">View Trainer list</a></li>
                             <li><a href="addtrainer.php">Add trainer</a></li>
                              <li><a href="orders-trainer.php">Trainer Request</a></li>

                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> LOST &AMP; FOUND <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                             <li><a href="pet-rescued-list.php"> rescued list</a></li>
								<li><a href="pet-lost-list.php">Lost Pet</a></li>
                                 <li><a href="add-rescued-pets.php">Add rescued Pet</a></li>

                           <!--  <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                  
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> REPORT <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li><a href="todays-orders.php" target="_blank"> today orders</a></li>
                            <li><a href="yesterday-orders.php" target="_blank"> yesterday orders</a></li>
                            <li><a href="weekly-order.php" target="_blank"> weekly orders</a></li>
                              <li><a href="monhtly-orders.php" target="_blank"> monthly orders</a></li>
                              <li><a href="total-orders.php" title="all" target="_blank"> All orders</a></li>
								<li><a href="report-chart/bar/product-stock-report.php" title="all" target="_blank"> Sell per day</a></li>
									<li><a href="report-chart/bar/order-status-report.php" title="all" target="_blank"> order status</a></li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> CUSTOMERS INFO <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                           <li><a href="customers.php">View Customers</a></li>
                            <li><a href="reviews.php">View Reviews</a></li>
                            <li><a href="subscribe.php">Subscribe</a></li>
                            <li><a href="contact.php">FAQ </a></li>                           

                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                       <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> CLUB<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                           
                        </ul>
                    </li>           



                </ul>

            </div>
        </div>
    </nav>