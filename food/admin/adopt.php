<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2017',  1000,      400],
          ['2018',  1170,      460],
          ['2019',  660,       1120],
          ['2020',  1030,      540]
        ]);

        var options = {
          title: 'Weekly adopted',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2020',  400,      200],
          ['2019',  300,      100],
          ['2018',  200,       55],
          ['2017',  100,      50]
        ]);

        var options = {
          title: 'monthly adopted',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script>
<div class="menu-wrap">
        <div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
        <ul class="sf-menu">
          <li>
            <a href="index.php">Dashboard</a>
          </li>
          <!-- <li>
            <a href="#">Categories</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="categories.php">View Categories</a></li>
              <li><a href="addcategory.php">Add Category</a></li>
            </ul>
          </li> -->
          <li>
            <a href="#">Pet</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="pet.php">View Pet</a></li>
              <li><a href="addpets.php">Add Pet</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Adoption Request</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="ordersadopt.php">View Request</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Customers info</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="customers.php">View Customers</a></li>
              <li><a href="reviews.php">View Reviews</a></li>
            </ul>
          </li>
          <li>
            <a href="#">My Account</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      <!--  <div class="header-xtra">
          <div class="s-cart">
            <div class="sc-ico"><i class="fa fa-shopping-cart"></i><em>2</em></div>

            <div class="cart-info">
              <small>You have <em class="highlight">2 item(s)</em> in your shopping bag</small>
              <br>
              <br>
              <div class="ci-item">
                <img src="images/shop/2.jpg" width="70" alt=""/>
                <div class="ci-item-info">
                  <h5><a href="./single-product.html">Product fashion</a></h5>
                  <p>2 x $250.00</p>
                  <div class="ci-edit">
                    <a href="#" class="edit fa fa-edit"></a>
                    <a href="#" class="edit fa fa-trash"></a>
                  </div>
                </div>
              </div>
              <div class="ci-item">
                <img src="images/shop/8.jpg" width="70" alt=""/>
                <div class="ci-item-info">
                  <h5><a href="./single-product.html">Product fashion</a></h5>
                  <p>2 x $250.00</p>
                  <div class="ci-edit">
                    <a href="#" class="edit fa fa-edit"></a>
                    <a href="#" class="edit fa fa-trash"></a>
                  </div>
                </div>
              </div>
              <div class="ci-total">Subtotal: $750.00</div>
              <div class="cart-btn">
                <a href="#">View Bag</a>
                <a href="#">Checkout</a>
              </div>
            </div>
          </div>
          <div class="s-search">
            <div class="ss-ico"><i class="fa fa-search"></i></div>
            <div class="search-block">
              <div class="ssc-inner">
                <form>
                  <input type="text" placeholder="Type Search text here...">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </header>


	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Adopt A Pet</h2>
						<!-- <p>You can order products from here</p> -->
					</div>
					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart" style="width: 550px; height: 300px"></div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart1" style="width: 550px; height: 300px"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

  <!--pi chart-->



  <!--end of pi chart-->


<?php include 'inc/footer.php' ?>
