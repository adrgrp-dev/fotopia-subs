
<?php
ob_start();

include "connection1.php";

$loggedin_id=$_SESSION['admin_loggedin_id'];


?>
<style>
@media only screen and (max-width: 600px) {

.mob-i{

  margin-left: -40px!important;
}
td
{
min-width:100px!important;
}
#label_list_order
{
  margin-bottom: 50px;
}
#label_create_new_order 
{
  margin-top:-40px;
  right: 10%;
}
.infobar
{
      margin-top: -23px !important;
    margin-right: -50px;
}
.nav-tabs
{
 border: none !important; 
 margin-top: 5px !important ;
}
.view-btn{
 
   margin-left:40% !important;
}
.search-field
{
  padding-left: -10px !important;
}
.form-control
{
  width: 95% !important;
}

}
.view-btn{
  display:inline-table;
  float:left;
  margin-left:20px;
  border-radius:20px;
  padding:2px;
  font-size: 12px;
}
.btn-default{
  padding-top: 5px !important;
}
.nav-tabs > li
{
  margin-left: 0px !important;
}
.nav-tabs > li > a:hover
{
  padding-bottom: 8px;
}
.nav-tabs > li.active > a:hover
{
  padding-bottom: 2px;
}


.nav-tabs > li > a
{
  border-radius: 5px!important;
}

.tab-box .nav-tabs li.active 
{
  padding-top: 6px!important;
    padding-bottom: 6px!important;
    padding-left: 0px!important;
    padding-right: 0px!important;
}
th,th > span
{
    background: #aad1d6;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 3px !important;
}
th:first-child,th:last-child
{
  vertical-align: bottom;
}
.infobar .infos p
{
  margin-right: -40px;
}
</style>
<?php
if(isset($_REQUEST['rejectbtn']))
{
$order_id=$_REQUEST['order_id'];
mysqli_query($con,"delete from appointment_updates where order_id='$order_id'");
$get_action_detail_query=mysqli_query($con,"select * from orders where id='$order_id'");
$get_action_detail=mysqli_fetch_assoc($get_action_detail_query);
$photographer_id=$get_action_detail['photographer_id'];

// mysqli_query($con,"INSERT INTO `user_actions`( `module`, `action`, `action_done_by_name`, `action_done_by_id`,`photographer_id`, `Realtor_id`,`action_date`) VALUES ('Appointment','Rejected','$loggedin_name',$loggedin_id,$photographer_id,$loggedin_id,now())");

header("location:subcsrOrder_list1.php?rej=1");
}


if(isset($_REQUEST['approvebtn']))
{
$order_id=$_REQUEST['order_id'];

 $updates=mysqli_query($con,"select * from appointment_updates where order_id='$order_id'");
$updates1=mysqli_fetch_array($updates);
$from_datetime=$updates1['from_datetime'];
$to_datetime=$updates1['to_datetime'];
$due_date=$updates1['due_date'];
$prods=$updates1['products'];
$notes=$updates1['booking_notes'];
$ph_id=$updates1['photographer_id'];

//echo "update appointments set from_datetime='$from_datetime',to_datetime='$to_datetime' where order_id='$order_id'";

mysqli_query($con,"update orders set product_id='$prods',booking_notes='$notes',order_due_date='$due_date' where id='$order_id'");
mysqli_query($con,"update appointments set from_datetime='$from_datetime',to_datetime='$to_datetime' where order_id='$order_id'");
$get_action_detail_query=mysqli_query($con,"select * from orders where id='$order_id'");
$get_action_detail=mysqli_fetch_assoc($get_action_detail_query);
$photographer_id=$get_action_detail['photographer_id'];

// mysqli_query($con,"INSERT INTO `user_actions`( `module`, `action`, `action_done_by_name`, `action_done_by_id`,`photographer_id`, `Realtor_id`,`action_date`) VALUES ('Appointment','Approved','$loggedin_name',$loggedin_id,$photographer_id,$loggedin_id,now())");

mysqli_query($con,"delete from appointment_updates where order_id='$order_id'");
header("location:subcsrOrder_list1.php?app=1");
}
?>

<?php include "header.php";  ?>
 <div class="section-empty bgimage8">
        <div class="container" style="margin-left:0px;height:inherit;width:100%">
            <div class="row">
            <hr class="space s">
                <div class="col-md-2">
                  <script>
                  function mouseover(d)
                  {
                   $('#showComment'+d).toggleClass("hide");
                  }
                  function mouseover2(d)
                  {
                   $('#showComment'+d).toggleClass("hide");
                  }
                  </script>
                  <style>


</style>

       <?php include "sidebar.php";  ?>

       

                </div>
                <div class="col-md-10" style="padding-left:30px;margin-top: 23px;">
                <div class="tab-box" data-tab-anima="show-scale">
                 
                  <p align="right" style="position: absolute;right: 15px;" >
                      
                        </p>
                <ul class="nav nav-tabs">
                <li  id="click1" class="active"><a href="#tab1" ><span>Monthly Plans</span></a></li>
                <li id="click2"><a href="#tab2" ><span>Annual Plans</span></a></li>
                </ul>
                
                <div class="panel active" id="tab1">

<div class="row">
    <?php
                       
                        $get_sub_query=mysqli_query($con,"SELECT * FROM `subscription_packs` WHERE  status=1 and duration_in_days=30");
                        while($get_sub=mysqli_fetch_array($get_sub_query))
                        {
                        
                      ?>
                        <div class="col-md-3">
                            <div class="list-group pricing-table">
                                <div class="list-group-item pricing-price">
                                    <?php echo "$ ".$get_sub['cost']; ?>/ <span>MONTH</span>
                                </div>
                                <div class="list-group-item pricing-name">
                                    <h3><?php echo $get_sub['plan_name']; ?></h3>
                                </div>
                                <div class="list-group-item"><?php echo $get_sub['storage'].' GB Storage'; ?></div>
                                <div class="list-group-item"><?php echo $get_sub['photographer_limit']." "."Photographer"; ?></div>
                                <div class="list-group-item"><?php echo $get_sub['csr_limit']." "."Csr"; ?></div>
                                
                                
                                
                                
                                <div class="list-group-item">
                                    <a class="btn btn-sm btn-default" href="subscription_invoice.php?sub_id=<?php echo $get_sub['id']; ?>";> Order now </a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                     <?php
                       
                        $get_sub_tril_query=mysqli_query($con,"SELECT * FROM `subscription_packs` WHERE status=1 and duration_in_days=15");
                        while($get_sub=mysqli_fetch_array($get_sub_tril_query))
                        {
                        
                      ?>
                        
   <div class="col-md-3">
                            <div class="list-group pricing-table">
                                <div class="list-group-item pricing-price">
                                    <?php echo "$ ".$get_sub['cost']; ?> / <span>MONTH</span>
                                </div>
                                <div class="list-group-item pricing-name">
                                    <h3><?php echo $get_sub['plan_name']; ?></h3>
                                </div>
                                <div class="list-group-item"><?php echo $get_sub['storage'].' GB Storage'; ?></div>
                                <div class="list-group-item"><?php echo $get_sub['photographer_limit']." "."Photographer"; ?></div>
                                <div class="list-group-item"><?php echo $get_sub['csr_limit']." "."Csr"; ?></div>
                                
                                
                                
                                
                                <div class="list-group-item">
                                    <a class="btn btn-sm btn-default" href="subscription_invoice.php?<?php echo $get_sub['id']; ?>";> Order now </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>

                </div>

                <div class="panel" id="tab2">

                
<div class="row">
                          <?php
                       
                        $get_sub_query1=mysqli_query($con,"SELECT * FROM `subscription_packs` WHERE  status=1 and duration_in_days=365");
                        while($get_sub1=mysqli_fetch_array($get_sub_query1))
                        {
                        
                      ?>
                        <div class="col-md-4">
                            <div class="list-group pricing-table">
                                <div class="list-group-item pricing-price">
                                    <?php echo "$ ".$get_sub1['cost']; ?>/ <span>ANNUAL</span>
                                </div>
                                <div class="list-group-item pricing-name">
                                    <h3><?php echo $get_sub1['plan_name']; ?></h3>
                                </div>
                                <div class="list-group-item"><?php echo $get_sub1['storage'].' GB Storage'; ?></div>
                                <div class="list-group-item"><?php echo $get_sub1['photographer_limit']." "."Photographer"; ?></div>
                                <div class="list-group-item"><?php echo $get_sub1['csr_limit']." "."Csr"; ?></div>
                                
                                
                                
                                
                                <div class="list-group-item">
                                    <a class="btn btn-sm btn-default" href="subscription_invoice.php?sub_id=<?php echo $get_sub1['id']; ?>" > Order now </a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                        

                    </div>
                                            </div>

 <hr class="space l" />
</div></div></div></div>
    
<?php if(@$_REQUEST["c"] || @$_REQUEST["searchAddress"] || @$_REQUEST['vAll']) { ?>
    <script>$(document).ready(function() {
  $("#click1").removeClass("active");
  $("#click4").removeClass("active");
   $("#click3").removeClass("active");
   $("#tab1").removeClass("active");
   $("#tab4").removeClass("active");
   $("#tab3").removeClass("active");
   $("#click2").click();
   $("#tab2").addClass("active");
  });
     </script>
 <?php } ?>
  <?php if(@isset($_REQUEST["na"])) { ?>
    <script>$(document).ready(function() { $("#tab4").removeClass("active");
    $("#click4").click();
    $("#tab4").addClass("active");
     $("#tab3").removeClass("active");
     
  });
     </script>
 <?php } ?>




<?php include "footer.php";  ?>

