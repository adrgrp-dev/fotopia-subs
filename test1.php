
<?php include "header.php"; ?>


    <script>



function setColor(val)
{



$("#realtorDiv").removeAttr("style");
$("#pcadminDiv").removeAttr("style");
if(val=='Realtor')
{



$("#realtorDiv").attr("style","color:#000;background:#aad1d6;height:80px;border-radius:80px 0px 0px 80px;text-align:center;padding:25px 0px;");
$("#pcadminDiv").attr("style","color:#000;background:#fff;height:80px;border-radius:0px 80px 80px 0px;text-align:center;padding:25px 0px;");
}
else
{



$("#pcadminDiv").attr("style","color:#000;background:#aad1d6;height:80px;border-radius:0px 80px 80px 0px;text-align:center;padding:25px 0px;");
$("#realtorDiv").attr("style","color:#000;background:#fff;height:80px;border-radius:80px 0px 0px 80px;text-align:center;padding:25px 0px;");
}
}
</script>



<div class="col-md-6" style="background:#aad1d6;height:100px;padding:10px;border-radius:80px;">



<div class="col-md-6" style="color:#000;background:#aad1d6;height:80px;border-radius:80px 0px 0px 80px;text-align: center;padding: 25px 0px;" id="realtorDiv" onClick="setColor('Realtor')">Realtor</div>
<div class="col-md-6" style="color:#000;background:#FFF;height:80px;border-radius:0px 80px 80px 0px;text-align:center;padding: 25px 0px;" id="pcadminDiv"onclick="setColor('PCAdmin')">PCAdmin</div>
</div>

<?php include "footer.php"; ?>