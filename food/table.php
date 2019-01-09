 <?php  
ob_start();
    session_start();
    require_once 'config/connect.php';
    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
        header('location: login2.php');
    }

/*include 'inc/header.php'; 
include 'inc/petnav.php'; */
$uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];
/*$cart = $_SESSION['cart'];*/

 $connect = mysqli_connect("localhost", "root", "", "ecomphp");  
 $query ="SELECT * FROM orders WHERE uid='$uid'  ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   


           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript">  var table = $('#employee_data').DataTable();
 
new $.fn.dataTable.Buttons( table, {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
 
table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
</script>
         
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
               
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                                        <th>Adoption No</th>
                        <th>Application Id</th>
                        <th>Date & Time</th>
                        <th>Application Status</th>
                        <th>Payment</th>
                        <!-- <th>cost</th> -->
                        <th>View</th>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["ivid"].'</td>  
                                    <td>'.$row["orderstatus"].'</td>  
                                    <td>'.$row["paymentmode"].'</td>  
                                    <td>'.$row["totalprice"].'</td>  
                                    
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  

 </script> 