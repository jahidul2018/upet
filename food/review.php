<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								
							<!--	<li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p>T<?php echo $prodr['petdescription']; ?></p>
							</div>
							
						<!--	<div style="" class="tab-pane fade" id="mini-two">
								<table class="table tba2">
									<tbody>
										<tr>
											<td>Sizes</td>
											<td>M, L, XL, XXL</td>
										</tr>
										<tr>
											<td>Prodused in</td>
											<td>USA</td>
										</tr>
										<tr>
											<td>Material</td>
											<td>plastic, textile</td>
										</tr>
										<tr>
											<td>Colors</td>
											<td>red, black, grey</td>
										</tr>
										<tr>
											<td>Dimension</td>
											<td>20x40x33</td>
										</tr>
										<tr>
											<td>Type</td>
											<td>bag</td>
										</tr>
										<tr>
											<td>Weight</td>
											<td>0.35kg</td>
										</tr>
									</tbody>
								</table>
							</div>  -->

							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$id";
									$revcountres = mysqli_query($connection, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($prodr['petname'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.firstname, u.lastname, r.`timestamp`, r.review FROM reviews r JOIN usersmeta u WHERE r.uid=u.uid AND r.pid=$id";
										$selrevres = mysqli_query($connection, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/quote/1.jpg" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
										<!--	<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div> -->
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($connection, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 15){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u1.firstname, u1.lastname FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
										$userres = mysqli_query($connection, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['firstname'] . " " . $userr['lastname'];?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
									<!--	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400" required=""></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div>