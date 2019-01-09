<?php 
ob_start();
session_start();

require_once 'config/connect.php';
include 'inc/header.php'; 
/*include 'inc/nav.php';*/

  if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
    header('location: login2.php');
  }


/*$db = mysqli_connect('localhost', 'root', '', 'ecomphp');*/
/*$email = $_SESSION['customer'];
$uid   = $_SESSION['customerid'];
$cart  = $_SESSION['cart'];*/

 $uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];
$tid = "";
$ivid ="";
$errors = array(); 

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'ecomphp');

            // REGISTER USER
  if (isset($_POST['submit'])){
    // receive all input values from the form

    /* $email = mysqli_real_escape_string($db, $_POST['email']);*/
     
    $tid= ($_POST['password']);
    $ivid =($_POST['ivid']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

            
    if (empty($tid)) { array_push($errors, "Transaction id is required"); }
    if (empty($ivid)) { array_push($errors, "Invoice id is required"); }


      $user_check_query = "SELECT * FROM orders WHERE ivid='$ivid'  LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) { // if invoice id exists

        if ($user['ivid'] === $ivid) {


         // Finally, register user if there are no errors in the form
          if (count($errors) == 0){
            $tid =($_POST['password']);//saving in the database
            $ivid =($_POST['ivid']);
            $paymentid ='pid'.substr(strtoupper(md5(rand())),10,10);


              echo $sql = "UPDATE orders set trnsid='$tid', paymentid='$paymentid' , orderstatus='Paid'  where ivid='$ivid'" ;

              $result = mysqli_query($db, $sql) or die(' data are not INSERTED Error: '.mysqli_error($db));


             
              //query for data that send to email .
      $information="SELECT name, totalprice, thumb From products, orders, orderitems where orders.id=orderitems.orderid and orderitems.pid=products.id and orders.ivid='$ivid'";
       $result = mysqli_query($db, $information);
      $info = mysqli_fetch_assoc($result);

      $name=$info['name'];
      $price=$info['totalprice'];
      

             if(!$result){
                array_push($errors, "there is an error in connection".mysql_errno()); 
                }else{

                  require "PHPMailer-master/PHPMailerAutoload.php";
                  
                  $mail = new PHPMailer;

                 $mail->isSMTP();                               
                 $mail->Host = 'smtp.gmail.com'; 
                 $mail->SMTPAuth = true;                            
                 $mail->Username = 'pc0015@diit.info'; 
                 $mail->Password = 'diit123456';           
                 $mail->SMTPSecure = 'tls';                           
                 $mail->Port = 587;                             
                 //$mail->SMTPDebug = 2;                             
            

                  //$mail->addAddress('srabon.bilash@outlook.com', 'Srabon Chowdhury'); 
                  $mail->addAddress($email); 
                  $mail->isHTML(true);             



                  $mail->Subject = 'payment report';
                  $mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/><em>
                    wellcome to <em><a href="http://localhost/upet/">www.upet.com</a>.<br/><h3>
                      your payment id is:
                        '. $paymentid . '</h3><br/>.your product --'.$name.'.price= '.$price.'<br/> your order will be placed in 24 to 48 hours ';


                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                  if(!$mail->send()) {
                        array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
                      //echo 'Mailer Error: ' . $mail->ErrorInfo;
                    //$fmsg = "Invalid Login Credentials";
                    } else {
                              //echo "User exits, create session";
                            $_SESSION['customer'] = $email;
                         /* $_SESSION['customerid'] = mysqli_insert_id($db);*/
                        header("location: paymentconfirm.php");
                  }
                }
               }
             }
          }
        }

 

                          

?>


<section id="content">
    <div class="content-blog">
      <div class="container">
        <div class="row">
          <!--title-->
          <!-- <div class="page_header text-center">
             <h2>Shop - Account</h2>
            <p>Tagline Here</p> 
          </div> -->
          <!-- End title-->
          <div class="col-md-12">
        <div class="row shop-login">
        <!--Login section-->  
        <!-- <div class="col-md-6">
          <div class="box-content">
            <h3 class="heading text-center">I'm a Returning Customer</h3>
            <div class="clearfix space40"></div>
            <?php if(isset($_GET['message'])){
                if($_GET['message'] == 1){
             ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Login Credentials"; ?> </div>

             <?php } }?>
            <form class="logregform" method="post" action="loginprocess.php">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>E-mail Address</label>
                    <input type="email" name="email" value="" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="clearfix space20"></div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                     <a class="pull-right" href="#">(Lost Password?)</a> 
                    <label>Password</label>
                    <input type="password" name="password" value="" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="clearfix space20"></div>
              <div class="row">
                <div class="col-md-6">
                  <span class="remember-box checkbox">
                  <label for="rememberme">
                  <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                  </label>
                  </span> 
                </div>
                <div class="col-md-6">
                  <button type="submit" class="button btn-md pull-right">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div> -->

        <!--End of Login section-->
        <div class="col-md-6">
          <div class="box-content">
            <h1 id="page-title"> Bkash-help </h1>
            <br>
            <ol>
              <li>You can make payments from your bKash Account to any “Merchant” who accepts “bKash Payment”. Now you can bKash your Payment at more than 47,000 outlets nationwide. To bKash your Payment follow the steps below.</li>
              <li><p>01. Go to your bKash Mobile Menu by dialing *247#<br>
                      02. Choose “Payment”<br>
                      03. Enter the Merchant bKash Account Number you want to pay to<br>
                      04. Enter the amount you want to pay<br>
                      05. Enter a reference* against your payment (you can mention the purpose of the transaction in one word. e.g. Bill)<br>
                      06. Enter the Counter Number* (the salesperson at the counter will tell you the number)<br>
                      07. Now enter your bKash Mobile Menu PIN to confirm</p>

                      <p>&nbsp;</p>

                      <p>Done! You will receive a confirmation message from bKash.</p>

                      <p>*If Reference or Counter No. or both are not applicable, you can skip them by entering \0\.</p>

                      <p>&nbsp;</p>
              </li>

            </ol>
       
          </div>
        </div> 
         <div class="col-md-6">
          <div class="box-content">
           
            
            <form class="logregform" method="post" action="" name="subscription">
              <?php  if (count($errors) > 0) : ?>
                            <div class="error">
                              <?php foreach ($errors as $error) : ?>
                                <p><?php echo $error ?></p>
                              <?php endforeach ?>
                            </div>
                          <?php  endif ?>

           <?php
                  $uid = $_SESSION['customerid'];
                       
                   

                    $usersql = "SELECT email FROM users us JOIN orders o WHERE us.id=o.uid and us.id=$uid";
                    $userres = mysqli_query($connection, $usersql);
                    $userr1= mysqli_fetch_assoc($userres)        
                    
             ?>
              
              <br>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>E-mail Address  &nbsp;</label> <span id="errEmail1" class="error"></span>
                    <input type="email" name="email" class="form-control" maxlength="50" disabled="" value="<?php echo $userr1['email']; ?> ">
                    

                  </div>
                </div>
              </div>
              <div class="clearfix space20"></div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>invoice ID (Check Email from Invoice ID)</label> <span id="errPass" class="error"></span>
                    <input type="text" name="ivid" maxlength="50"  class="form-control">
                    
                  </div>
                 
                </div>
              </div>
              <div class="clearfix space20"></div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>Transaction ID (Provided BY BKASH/BANK)</label> <span id="errPass" class="error"></span>
                    <input type="text" name="password" maxlength="50"  class="form-control">
                    
                  </div>
                 
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="space20"></div>
                  <button class="button btn-md pull-right" id="submit1" type="submit" name="submit" value="Submit" onclick=" return validate();">..Submit..</button>
                </div>
              </div>
            </form>
          </div>
        </div> 
      </div>


              
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'inc/footer.php' ?>
  
      

