@include('layouts.appTwo')
<style>
    label{
        font-weight: 800;
    }

</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">APPROVAL MAPPING</li>
                    </ol>
                </div>
                <h4 class="page-title">APPROVAL MAPPING
                </h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                       <div class="col-12 mt-1">
                                           <div class="table-responsive a">
                                               <table class="table table-bordered table-stripped">
                                                   <thead>
                                                       <tr class="main-title">
                                                           <th class="p-1 text-center" style="min-width: 20px;">SL#</th>
                                                            <th class="p-1 text-start" style="min-width: 200px;">Office Name</th>
                                                           <th class="p-1 text-start" style="min-width: 200px;">First Approval Person</th>
                                                           <th class="p-1 text-start" style="min-width: 200px;">Second Approval Person</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td class="p-1 text-center">1</td>
                                                           <td class="p-1 text-start">AGR ~ AGRA</td>
                                                           <td class="p-1 text-start">
                                                            <select class="selectBox form-control">
                                                                <option value="1">MPL0290 ~ NARINDER RANA</option>
                                                                 <option value="2">MPL0082 ~ ABDUL FAIZAN</option>
                                                                  <option value="3">MPL0821 ~ MANISH KUMAR</option>
                                                            </select>
                                                              
                                                           </td>
                                                            <td class="p-1 text-start">
                                                              <select class="selectBox form-control">
                                                                <option value="1">MPL0290 ~ NARINDER RANA</option>
                                                                 <option value="2">MPL0082 ~ ABDUL FAIZAN</option>
                                                                  <option value="3">MPL0821 ~ MANISH KUMAR</option>
                                                            </select>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class="p-1 text-center">3</td>
                                                           <td class="p-1 text-start">AMD ~ AHMEDABAD</td>
                                                           <td class="p-1 text-start">
                                                            <select class="selectBox form-control">
                                                                <option value="1">MPL0290 ~ NARINDER RANA</option>
                                                                 <option value="2">MPL0082 ~ ABDUL FAIZAN</option>
                                                                  <option value="3">MPL0821 ~ MANISH KUMAR</option>
                                                            </select>
                                                           </td>
                                                            <td class="p-1 text-start">
                                                             <select class="selectBox form-control">
                                                                <option value="1">MPL0290 ~ NARINDER RANA</option>
                                                                 <option value="2">MPL0082 ~ ABDUL FAIZAN</option>
                                                                  <option value="3">MPL0821 ~ MANISH KUMAR</option>
                                                            </select>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class="p-1 text-center">2</td>
                                                           <td class="p-1 text-start">AMT ~ AMRAVATI</td>
                                                           <td class="p-1 text-start">
                                                               <select class="selectBox form-control">
                                                                 <option></option>
                                                             </select>
                                                           </td>
                                                            <td class="p-1 text-start">
                                                             <select class="selectBox form-control">
                                                                 <option></option>
                                                             </select>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class="p-1 text-center">4</td>
                                                           <td class="p-1 text-start">ALD ~ ALLAHABAD</td>
                                                           <td class="p-1 text-start">
                                                               <select class="selectBox form-control">
                                                                 <option></option>
                                                             </select>
                                                           </td>
                                                            <td class="p-1 text-start">
                                                              <select class="selectBox form-control">
                                                                 <option></option>
                                                             </select>
                                                           </td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </div>
                                           <div class="text-end m-b-1">
                                            <input type="button" name="" value="Save" class="btn btn-primary">
                                            <input type="button" name="" value="Cancel" class="btn btn-primary">
                                           </div>
                                       </div>
                                   
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
        </div> <!-- end col -->
    </div>
    
    
</div>
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('public/js/custome.js')}}"></script>
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
  var base_url = '{{url('')}}';
   

  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
    var pickup=$('#pickup').val();
    var scanDate=$('#scanDate').val();
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/submitPickupSacn',
           cache: false,
           data: {
           'Docket':Docket,'pickup':pickup,'scanDate':scanDate
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                    $('.docketNo').val('');
                    $('.tabels').html(obj.table)
                }
                else{
                    alert(obj.message)
                    $('.docketNo').val('');
                }
                
                

            
            }
            });
  }

    function genrateNO(){
        var base_url = '{{url('')}}';
        if($("#scanDate").val()=='')
           {
              alert('Please Enter Scan Date');
              return false;
           }
           // if($("#vehicleType").val()=='')
           // {
           //    alert('please select  Vehicle Type');
           //    return false;
           // }
           
            if($("#vendorName").val()=='')
           {
              alert('Please Enter Vendor Name');
              return false;
           }


            if($("#vehicleNo").val()=='')
           {
              alert('Please Select vehicle No');
              return false;
           }
            if($("#driverName").val()=='')
           {
              alert('Please Select driver Name');
              return false;
           }
           
           

           if($("#startkm").val()=='')
           {
              alert('Please Enter Start KM');
              return false;
           }

           if($("#endkm").val()=='')
           {
              alert('Please Enter End KM');
              return false;
           }

           if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Verify the KMs');
              return false;
           }

           if($("#vehicleType").val()=='Market Vehicle'){
                if($("#marketHireAmount").val()=='')
               {
                  alert('Please Enter Market Hire Amount');
                  return false;
               }
               if($("#advanceToBePaid").val()=='')
               {
                  alert('Please Enter Advance To be Paid');
                  return false;
               }
               if($("#paymentMode").val()=='')
               {
                  alert('Please Select Payment Mode');
                  return false;
               }
               if($("#advanceType").val()=='')
               {
                  alert('Please Select Advance Type');
                  return false;
               }
            
           }

            if($("#unloadingSupervisorName").val()=='')
           {
              alert('Please Enter Unloading Supervisor');
              return false;
           }
           if($("#pickupPersonName").val()=='')
           {
              alert('Please Enter Pickup Person Name');
              return false;
           }
           
          
           var  scanDate = $("#scanDate").val();
           var vehicleType  = $("#vehicleType").val();
           var vendorName  = $("#vendorName").val();
           var vehicleNo  = $("#vehicleNo").val();
           var driverName  = $("#driverName").val();
           var startkm  = $("#startkm").val();
           var endkm  = $("#endkm").val();
           var marketHireAmount  = $("#marketHireAmount").val();
           var unloadingSupervisorName  = $("#unloadingSupervisorName").val();
           var pickupPersonName  = $("#pickupPersonName").val();
           var remark  = $("#remark").val();
           var docketNo  = $("#docketNo").val();
           var advanceToBePaid  = $("#advanceToBePaid").val();
           var paymentMode  = $("#paymentMode").val();
           var advanceType  = $("#advanceType").val();

           if(confirm('Are You Sure To Generate Pickup Number?')){
           $(".btnSubmit").attr("disabled", true);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/AddPickuSacn',
           cache: false,
           data: {
           'scanDate':scanDate,'vehicleType':vehicleType,'vendorName':vendorName,'vehicleNo':vehicleNo,'driverName':driverName,'startkm':startkm,'endkm':endkm,'marketHireAmount':marketHireAmount,
            'unloadingSupervisorName':unloadingSupervisorName,
            'pickupPersonName':pickupPersonName,
            'remark':remark,
            'advanceToBePaid':advanceToBePaid,
            'paymentMode':paymentMode,
            'advanceType':advanceType
            
       }, 
            success: function(data) {
                const obj = JSON.parse(data);
                $('.docketNo').attr('readonly', false);
                $('.pickupIn').text(obj.data);
                $('.pickup').val(obj.LastId);
                $('.pickupNumber').val(obj.data);
            }
            });
       }
    }

   

    function selectVehicle(){
    var vehicleType=   $("#vehicleType").val()
    if(vehicleType=="Market Vehicle"){
        $("#marketHireAmountInput").removeClass('d-none');
     $("#advanceToBePaidInput").removeClass('d-none');
      $("#paymentModeInput").removeClass('d-none');
       $("#advanceTypeInput").removeClass('d-none');
   }
   if(vehicleType=="Vendor Vehicle"){
    $("#marketHireAmountInput").addClass('d-none');
     $("#advanceToBePaidInput").addClass('d-none');
      $("#paymentModeInput").addClass('d-none');
       $("#advanceTypeInput").addClass('d-none');
   }

    }
function getVendorVehicle(id)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetVendorVehicle',
       cache: false,
       data: {
           'id':id
       }, 
       success: function(data) {
        $('.VehcleList').html(data);
       }
     });
}

function printNO(){
    var base_url = '{{url('')}}';
    var PickupNo = $("#pickupNumber").val();
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/EditPickupScanPrint',
       cache: false,
       data: {
           'PickupNo':PickupNo
       }, 
       success: function(data) {
        if(data){
        var newWin = window.frames["printf"];
            newWin.document.write('<body onload="window.print()">'+data+'</body>');
            newWin.document.close();
        }
        else{
            alert('Pickup Scan no. Not Found');
           }
       }
     });
}

function KiloMiterCheck(){
    if(parseInt($("#startkm").val()) >= parseInt($("#endkm").val()))
           {
             alert('Please Verify the KMs');
              $("#endkm").val('');
              $("#endkm").focus();
    }
}

</script>