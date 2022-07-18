<?php
ob_start();

include "connection1.php";

?>


<?php include "header.php";  ?>
 <div class="bgimage9">
        <div class="container" style="margin-left:0px;height:inherit;width:100%;">
            <div class="row">
			<hr class="space s">
                <div class="col-md-2" style="left:-10px;">
	<?php include "sidebar.php"; ?>


			</div>
                 <div class="col-md-8" style="padiding-left:20px;">
 
				<div style="font-weight:500;width:100%; background: #FFF!important;
color:#000!important;padding:3%;border-radius:10px;">
				<h4 class="text-center">Transaction Status</h4>

				<hr class="space s"/>
			
         <div style="background:#FFF;padding:10px;border-radius:5px;max-height:fit-content;min-height: 450px;">
  <?php
              // $order_id=$_REQUEST['id'];
              // $get_summary_query=mysqli_query($con,"SELECT * from orders WHERE id='$order_id'");
              // $get_summary=mysqli_fetch_array($get_summary_query);

$get_subs_plan=mysqli_query($con,"select concat(au.first_name,' ',au.last_name) as name,a.subscription_name,p.duration,p.cost,sb.approved_on,sb.created_on,sb.invoice_id from subscription_packs as a JOIN plan_duration as p on a.id=p.subscription_cost_id join subscription_invoice as sb on sb.subscription_pack_id=a.id join admin_users as au on au.id=sb.pc_admin_id where p.id=2;");

$get_subs_plan1=mysqli_fetch_array($get_subs_plan);
              ?>

              <div class="col-md-12">

              <p align="center"><img src="smiley.png" alt="Success smiley" width="100" height="100"></p>
              <hr class="space s"/>

          </div>

  				<table style="color:#000;font-weight:600;margin-left: 160px;">

                  				<tr>
                  			  <td align="right" id="label_order_no" adr_trans="" style="width:150px;font-size: 13px;">Invoice #</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td><?php echo $get_subs_plan1['invoice_id']; ?><hr class="space xs"></td>
                  				</tr>

                  				<tr>
                  			  <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Transaction ID</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>634535725345<hr class="space xs"></td>
                  				</tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Amount</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>$200<hr class="space xs"></td>
                                </tr>

                                <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Status</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td><span adr_trans='' style='color: #fff; font-weight: bold;display: block;background:#008000;padding-top: 5px; max-width: 58px;padding-bottom: 5px;text-align: center;'>Success</span></td>
                                </tr>

                                <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Status Message</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>Transaction Successful<hr class="space xs"></td>
                                </tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Mode of Transaction</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>Credit Card (<i class="fa fa-cc-visa" aria-hidden="true"></i>)<hr class="space xs"></td>
                                </tr>

                                 <tr>
                              <td align="right" id="" adr_trans="" style="width:150px;font-size: 13px;">Transaction Date & Time</td><td align="center" class="td-space" style="width:130px;font-size: 13px;">:</td><td>18/07/2022, 12:54 pm (GMT-4)<hr class="space xs"></td>
                                </tr>

                            </table>

                            <div class="col-md-12">

<hr class="space m">
    <p align="center">Thanks for the payment. <a href="PCAdmin_dashboard.php" style="text-decoration:underline;color:blue;" >Click here</a> to go back to home.</p>
</div>  

                        </div>
</div>
</div>


    </div>
        </div>


		<?php include "footer.php";  ?>
