
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
    margin-top: 5px;
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
                      <?php
                       $csr_id=$_SESSION['admin_loggedin_id'];
                        $get_pcadmin_query=mysqli_query($con,"select * from admin_users where id=$csr_id");
                        $get_pcadmin=mysqli_fetch_array($get_pcadmin_query);
                        $pc_admin_id=$get_pcadmin['pc_admin_id'];
                      ?>
                        </p>
                <ul class="nav nav-tabs">
                <li  id="click1" class="active"><a href="#tab1" ><span>Subscription users</span></a></li>
                <li id="click2"><a href="#tab2" ><span>Trial users</span></a></li>
                </ul>





                
                <div class="panel active" id="tab1">

<div style="width:100%;">
        
                    <table class="table-stripped" style="color:#000;opacity:0.8;width:100%;">
                <thead>
                    <tr><th data-column-id="id" class="text-left" style=""><span class="text">

                                S.No

                        </span><span class="icon fa "></span></th><th data-column-id="name" class="text-left" style=""><span class="text">

                                Name

                        </span>



                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Subscription plan

                        </span>

                                                 </span><span class="icon fa "></span></th><th data-column-id="name" class="text-left" style=""><span class="text">

                                Duration

                        </span>

                         </span><span class="icon fa "></span></th><th data-column-id="name" class="text-left" style=""><span class="text">

                                Cost

                        </span>

                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Status

                        </span>

                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Subscribed on

                        </span>
                        <span class="icon fa "></span></th><th data-column-id="link" class="text-left" style=""><span class="text">

                                Approve

                        </span>



                        </th></tr>
                </thead>
                <tbody>

                                    <?php
                    //  ---------------------------------  pagination starts ---------------------------------------
                                        if(@$_GET["page"]<0)
                                                    {
                                                        $_GET["page"]=1;
                                                    }
                                    if(empty($_GET["page"]))
                                    {
                                        $_SESSION["page"]=1;
                                    }
                                    else {
                                        $_SESSION["page"]=$_GET["page"];
                                    }
                                    if($_SESSION["page"] == 0)
                                    {
                                        $_SESSION["page"]=1;
                                    }
                                    $q1="select count(*) as total from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id join subscription_invoice as sb on sb.subscription_pack_id=a.id join admin_users as au on au.id=sb.pc_admin_id where p.id=2";
                                    $result=mysqli_query($con,$q1);
                                    $data=mysqli_fetch_assoc($result);
                                    $total_no=$data['total'];
                                    $number_of_pages=50;
                                    $Page_check=intval($total_no/$number_of_pages);
                                    $page_check1=$total_no%$number_of_pages;
                                    if($page_check1 == 0)
                                    ;
                                    else {
                                        $Page_check=$Page_check+1;

                                    }
                                    if($Page_check<=$_SESSION["page"])
                                    {
                                        $_SESSION["page"]=$Page_check;
                                    }
                                        // how many entries shown in page

                                        //starting number to print the users shown in page
                                    $start_no_users = ($_SESSION["page"]-1) * $number_of_pages;

                             $cnt=$start_no_users;
                                    // $q = "SELECT *FROM admin_users WHERE type_of_user='FotopiaAdmin' 
                             $limit="LIMIT " . $start_no_users . ',' . $number_of_pages;
                                    $res=mysqli_query($con,"select concat(au.first_name,' ',au.last_name) as name,a.subscription_name,p.duration,p.cost,sb.approved_on,sb.created_on from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id join subscription_invoice as sb on sb.subscription_pack_id=a.id join admin_users as au on au.id=sb.pc_admin_id where p.id=2 ".$limit);

                                   
                                    while($res1=mysqli_fetch_array($res))
                                    {
                $cnt++;
                //-----------------------------------pagination end---------------------------------------------
                ?>
                <tr data-row-id="0" class="listPageTR">
                <td class="text-left" style=""><?php if($cnt<0){ echo "0";}else{ echo $cnt;} ?></td>
                <td class="text-left" style=""><?php echo $res1['name']; ?></td>
                <td class="text-left" style=""><?php echo $res1['subscription_name']; ?></td>
                <td class="text-left" style=""><?php echo $res1['duration'].' Days'; ?></td>
                <td class="text-left" style=""><?php echo $res1['cost']; ?></td>
                <td class="text-left" style=""><?php  if($res1['approved_on']==0){ echo "Not approved";}else{echo "Approved";} ?></td>

                <td class="text-left" style=""><?php echo $res1['created_on']; ?></td>
                <td class="text-left" style=""><a target="" href="#" class="btn btn-sm adr-save">Approve
                </a></td>
                </tr>
                <tr><td class="listPageTRGap">&nbsp;</td></tr>
                <?php } ?>
            </table></div>

            <div id="undefined-footer" class="bootgrid-footer container-fluid">
                <div class="row">
                    <div class="col-sm-6"><ul class="pagination"><li class="first disabled" aria-disabled="true"><a href="./admin_users.php?page=1" class="button">«</a></li><li class="prev disabled" aria-disabled="true">
                        <a href="<?php echo "./admin_users.php?page=".($_SESSION["page"]-1);?>" class="button">&lt;</a></li><li class="page-1 active" aria-disabled="false" aria-selected="true">
                            <a href="#1" class="button"><?php echo $_SESSION["page"]; ?></a></li><li class="next disabled" aria-disabled="true">
                                <a href="<?php echo "./admin_users.php?page=".($_SESSION["page"]+1);?>" class="button">&gt;</a></li><li class="last disabled" aria-disabled="true">
                                    <a href="<?php echo "./admin_users.php?page=".($Page_check);?>" class="button">»</a></li></ul></div><div class="col-sm-6 infoBar">
                                        <div class="infos"><p align="right"><span adr_trans="label_showing">Showing</span> <?php  if(($start_no_users+1)<0){ echo "0";}else{ echo $start_no_users+1;}?> <span adr_trans="label_to">to&nbsp</span> <?php if($cnt<0){ echo "0";}else{ echo $cnt;} ?> of &nbsp;<?php echo $total_no; ?> <span adr_trans="label_entries">entries</span></p></div>
                                </div>
                </div>
            </div>

                </div>

                <div class="panel" id="tab2">

  <div style="width:100%;">
        
                    <table class="table-stripped" style="color:#000;opacity:0.8;width:100%;">
                <thead>
                    <tr><th data-column-id="id" class="text-left" style=""><span class="text">

                                S.No

                        </span><span class="icon fa "></span></th><th data-column-id="name" class="text-left" style=""><span class="text">

                                Name

                        </span>

                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Subscription plan

                        </span>

                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Status

                        </span>

                        <span class="icon fa "></span></th><th data-column-id="logo" class="text-left" style=""><span class="text">

                                Subscribed on

                        </span>
                        <span class="icon fa "></span></th><th data-column-id="link" class="text-left" style=""><span class="text">

                                Approve

                        </span>



                        </th></tr>
                </thead>
                <tbody>

                                    <?php
                    //  ---------------------------------  pagination starts ---------------------------------------
                                        if(@$_GET["page"]<0)
                                                    {
                                                        $_GET["page"]=1;
                                                    }
                                    if(empty($_GET["page"]))
                                    {
                                        $_SESSION["page"]=1;
                                    }
                                    else {
                                        $_SESSION["page"]=$_GET["page"];
                                    }
                                    if($_SESSION["page"] == 0)
                                    {
                                        $_SESSION["page"]=1;
                                    }
                                    $q1="select count(*) as total from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id join subscription_invoice as sb on sb.subscription_pack_id=a.id join admin_users as au on au.id=sb.pc_admin_id where p.id=3";
                                    $result=mysqli_query($con,$q1);
                                    $data=mysqli_fetch_assoc($result);
                                    $total_no=$data['total'];
                                    $number_of_pages=50;
                                    $Page_check=intval($total_no/$number_of_pages);
                                    $page_check1=$total_no%$number_of_pages;
                                    if($page_check1 == 0)
                                    ;
                                    else {
                                        $Page_check=$Page_check+1;

                                    }
                                    if($Page_check<=$_SESSION["page"])
                                    {
                                        $_SESSION["page"]=$Page_check;
                                    }
                                        // how many entries shown in page

                                        //starting number to print the users shown in page
                                    $start_no_users = ($_SESSION["page"]-1) * $number_of_pages;

                             $cnt=$start_no_users;
                                    // $q = "SELECT *FROM admin_users WHERE type_of_user='FotopiaAdmin' 
                             $limit="LIMIT " . $start_no_users . ',' . $number_of_pages;
                                    $res=mysqli_query($con,"select concat(au.first_name,' ',au.last_name) as name,a.subscription_name,p.duration,p.cost,sb.approved_on,sb.created_on from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id join subscription_invoice as sb on sb.subscription_pack_id=a.id join admin_users as au on au.id=sb.pc_admin_id where p.id=3 ".$limit);

                                   
                                    while($res1=mysqli_fetch_array($res))
                                    {
                $cnt++;
                //-----------------------------------pagination end---------------------------------------------
                ?>
                <tr data-row-id="0" class="listPageTR">
                <td class="text-left" style=""><?php if($cnt<0){ echo "0";}else{ echo $cnt;} ?></td>
                <td class="text-left" style=""><?php echo $res1['name']; ?></td>
                <td class="text-left" style=""><?php echo $res1['subscription_name']; ?></td>
                <td class="text-left" style=""><?php  if($res1['approved_on']==0){ echo "Not approved";}else{echo "Approved";} ?></td>

                <td class="text-left" style=""><?php echo $res1['created_on']; ?></td>
                <td class="text-left" style=""><a target="" href="#" class="btn btn-sm adr-save">Approve
                </a></td>
                </tr>
                <tr><td class="listPageTRGap">&nbsp;</td></tr>
                <?php } ?>
            </table></div>
              
               <div id="undefined-footer" class="bootgrid-footer container-fluid">
                <div class="row">
                    <div class="col-sm-6"><ul class="pagination"><li class="first disabled" aria-disabled="true"><a href="./admin_users.php?page=1" class="button">«</a></li><li class="prev disabled" aria-disabled="true">
                        <a href="<?php echo "./admin_users.php?page=".($_SESSION["page"]-1);?>" class="button">&lt;</a></li><li class="page-1 active" aria-disabled="false" aria-selected="true">
                            <a href="#1" class="button"><?php echo $_SESSION["page"]; ?></a></li><li class="next disabled" aria-disabled="true">
                                <a href="<?php echo "./admin_users.php?page=".($_SESSION["page"]+1);?>" class="button">&gt;</a></li><li class="last disabled" aria-disabled="true">
                                    <a href="<?php echo "./admin_users.php?page=".($Page_check);?>" class="button">»</a></li></ul></div><div class="col-sm-6 infoBar">
                                        <div class="infos"><p align="right"><span adr_trans="label_showing">Showing</span> <?php  if(($start_no_users+1)<0){ echo "0";}else{ echo $start_no_users+1;}?> <span adr_trans="label_to">to&nbsp</span> <?php if($cnt<0){ echo "0";}else{ echo $cnt;} ?> of &nbsp;<?php echo $total_no; ?> <span adr_trans="label_entries">entries</span></p></div>
                                </div>
                </div>
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

