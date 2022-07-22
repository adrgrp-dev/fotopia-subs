<?php
ob_start();

include "connection1.php";
$loggedin_id=$_SESSION['admin_loggedin_id'];

$subs_id = $_REQUEST['sub_id'];

$get_subs_plan=mysqli_query($con,"SELECT * FROM `subscription_packs` WHERE id='$subs_id'");

$get_subs_plan1=mysqli_fetch_array($get_subs_plan);

?>

<?php 

function getName($n) {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

  $fotopia_payment_reference_no=getName(6);

if (isset($_REQUEST['proceed'])) { 

mysqli_query($con,"INSERT INTO `customer_subscription_package`(`subscription_pack_id`, `pc_admin_id`, `payment_terms`) VALUES ('$subs_id','$loggedin_id','1')");
$inserted_id=mysqli_insert_id($con);
mysqli_query($con,"INSERT INTO `customer_subscription_payment`(`pc_admin_id`, `subscription_pack_id`, `customer_subscription_pack_id`, `mode_of_payment`, `fotopia_payment_reference_no`) VALUES ('$loggedin_id','$subs_id','$inserted_id','Manual','$fotopia_payment_reference_no')");


header("location:PCAdmin_dashboard.php");

}

?>

<style>

#calendar
{
background-color:#FFFFFF;
}


.gmailEvent0
{
background:#D9534F!important;
color:white!important;
padding-left:5px;
}
th
{
    background: #aad1d6;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 3px !important;
}
.infobar .infos p
  {
    margin-right: -10px;
    ??color: black;
  }
#undefined-footer
{
  background: white;
  padding: 10px 10px;
}

thead > tr:last-child > th, th > span {
    background: #aad1d6;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 3px !important;
}
</style>

<script>

function checkbox_term(){

let checked=$('#terms1').is(':checked');

if (checked) {

 
  $("#term_err").html('');  
  return true;


}

else{

$("#term_err").html('Please check the terms and conditions.');

return false;

}


}  

</script>
<?php include "header.php";  ?>
 <div class="section-empty bgimage2">
        <div class="container" style="margin-left:0px;height:inherit">
            <div class="row">
      <hr class="space xs">
                <div class="col-md-2">
    <?php include "sidebar.php";?>


      </div>
                <div class="col-md-10" style="font-family:Arial, Helvetica, sans-serif;text-align: center;">
                    <hr class="space s">
<div style="background-color:white;border-radius:5px;text-align: right;">
  <hr class="space xs">
 <table class="" align="center" style="color: #000;background: white;opacity:0.9;width:98%;text-align:center;" aria-busy="false">
   
   <thead>
              <tr>
                <th id="inv_th" style="width:10%;text-align:center;" colspan="3"><span><h4 style="color: #000;">Summary</h4></span></th>
              </tr>
            </thead>
            <tbody>
               <tr><td><hr class="space s"></td></tr>
              <tr>

                <td style="width:50%">Subscription plan</td>
                    <td>:</td>  
                <td><?php echo $get_subs_plan1['plan_name']; ?>&nbsp;<a href="subscription_plan.php" target="_blank" style="font-size:9px;text-decoration:underline;color:blue">View plan</a></td>
                    
              </tr>

 <tr><td><hr class="space xs"></td></tr>

              <tr>
                <td>Plan duration</td>
                <td>:</td>
                <td><?php echo $get_subs_plan1['duration_in_days'].' Days'; ?></td>          
              </tr>

              <tr><td><hr class="space xs"></td></tr>

              <tr>
                <td>Storage</td>
                <td>:</td>
                <td><?php echo $get_subs_plan1['storage'].' GB'; ?></td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>

              <tr>
                <td>Photographer</td>
                <td>:</td>
                <td><?php echo $get_subs_plan1['photographer_limit']; ?></td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>

              <tr>
                <td>CSR</td>
                <td>:</td>
                <td><?php echo $get_subs_plan1['csr_limit']; ?></td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>
            </tbody>
                  </table>
   
<hr class="space m">

<p align="center" style="color:#000;font-size:16px;text-decoration: underline;font-weight: bold;">Pay subscription</p>
   <table class="" align="center" style="color: #000;background: white;opacity:0.9;width:98%;text-align:center;" aria-busy="false">
   
         <tr><td><hr class="space xs"></td></tr>
              <tr>
                <td>Payment ID</td>
                <td>:</td>
                <td style="width:48%;"><?php echo $get_subs_plan1['id']; ?></td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>
              <tr>
                <td>Subscription plan cost</td>
                <td>:</td>
                <td><?php echo '$'.$get_subs_plan1['cost']; ?></td>          
              </tr>
              <tr><td><hr class="space xs"></td></tr>

              <tr>
                <td>Promo code</td>
                <td>:</td>
                <td align="center"><input class="form-control" style="width:26%;" type="text" name="promo_code"/></td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>

<tr>
                <td>Tax</td>
                <td>:</td>
                <td>$0</td>          
              </tr>


               <tr><td><hr class="space s"></td></tr>
  <tr><td></td><td></td><td style="border-top:1.5px dashed #ccc;"></td></tr>

               <tr><td><hr class="space xs"></td></tr>
  <tr>
                <td>Amount to pay <span style="font-size:10px">(* Inc. of all taxes)</span></td>
                <td>:</td>
                <td><?php echo '$'.$get_subs_plan1['cost']; ?></td>          
              </tr>

               <tr><td><hr class="space s"></td></tr>
    
                  </table>                
            <p align="center"> <input id="terms1" name="terms" type="checkbox" class=" form-value" required="" />&nbsp;&nbsp;<span id="label_accept" adr_trans="label_accept">Accept our</span>
                                <a href="#tnc" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:underline" id="label_terms" adr_trans="label_terms">Terms & Conditions</a><br><span id="term_err" style="color:red;"></span>  </p>  
                                 <hr class="space s">
                </div>
                <hr class="space s">
         <a href="subscription_invoice.php?proceed=1&sub_id=<?php echo $subs_id; ?>" name="pay_now" onclick="return checkbox_term()" class="anima-button btn-sm btn adr-save"><i class="fa fa-arrow-right"></i>Proceed to payment</a>       

        </div>




                </div>


            </div>

 <div id="tnc" class="box-lightbox white" style="padding:25px">
                        <div class="subtitle g" style="color:#333333">
                            <h5 style="color:#333333" align="center" id="label_terms" adr_trans="label_terms">Terms and Conditions</h5>
                            <hr>
                            <span class="sub" style="color:#333333">Read and accept our terms and conditions.<br /><br /></span>

            <?php
            $cmsPage=mysqli_query($con,"select * from cms_pages where id=2");
            $cmsPage1=mysqli_fetch_array($cmsPage);
            echo $cmsPage1['page_content'];
            ?>
             </div>
                    </div>

    <?php include "footer.php";  ?>
