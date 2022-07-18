<?php
ob_start();

include "connection1.php";
$loggedin_id=$_SESSION['admin_loggedin_id'];

$get_subs_plan=mysqli_query($con,"select a.subscription_name,p.duration,p.cost from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id where p.id=2");

$get_subs_plan1=mysqli_fetch_array($get_subs_plan);


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
                <th id="inv_th" style="width:10%;text-align:center;"><span> SUMMARY</span></th>
                <th id="inv_th" style="width:0%;text-align:center;"></th>

         <th id="inv_th" style="width:15%;text-align:center;"><span>COSTS</span></th>
              </tr>
            </thead>
            <tbody>
               <tr><td><hr class="space xs"></td></tr>
              <tr>
                <td><?php echo $get_subs_plan1['subscription_name'] ?></td>
                <td>:</td>
                <td><?php echo "$".$get_subs_plan1['cost'] ?></td>          
              </tr>
              <tr><td><hr class="space xs"></td></tr>
<tr>
                <td>Tax</td>
                <td>:</td>
                <td>$20</td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>

<tr>
                <td>Promo code</td>
                <td>:</td>
                <td align="center"><input class="form-control" style="width:26%;" type="text" name="promo_code"/></td>          
              </tr>

               <tr><td><hr class="space s"></td></tr>
  <tr><td></td><td></td><td style="border-top:1.5px dashed #ccc;"></td></tr>

               <tr><td><hr class="space xs"></td></tr>
  <tr>
                <td>Total</td>
                <td>:</td>
                <td>$200</td>          
              </tr>

               <tr><td><hr class="space xs"></td></tr>
            </tbody>
                  </table>
                   
                    
                </div>
                <hr class="space s">
         <a href="subs_paynow_summary.php" class="anima-button btn-sm btn adr-save"><i class="fa fa-arrow-right"></i>Proceed to payment</a>       

        </div>




                </div>


            </div>



    <?php include "footer.php";  ?>
