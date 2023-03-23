@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">Docket Tracking</h4>
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
                                        
                                           <div class="col-12">
                                               <div class="row">
                                                   <table class="table-responsive docket_tracking">
                                                       <tr>
                                                        <td colspan="5">
                                                            <div class="row">
                                                                <div class="col-2">DOCKET NUMBER </div>
                                                                <div class="col-4">
                                                                <input type="text" tabindex="1" class="form-control docket_no" name="docket_no" id="docket_no">
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="button" class="btn btn-primary">Go</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="back-color">DACC</td>
                                                        <td></td>
                                                        <td class="back-color">SALE TYPE</td>
                                                        <td></td>
                                                        
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">BOOKING DATE</td>
                                                        <td class="d12"></td>
                                                        <td class="back-color d13">BOOKING BRANCH</td>
                                                        <td colspan="2" class="d14"></td>
                                                        <td class="back-color d15">MODE</td>
                                                        <td class="d-16"></td>
                                                        <td class="back-color d17">DELIVERY TYPE</td>
                                                        <td class="d18"></td>
                                                       </tr>
                                                       <tr>
                                                        <td class="back-color d11">ORIGIN</td>
                                                        <td class="d12"></td>
                                                        <td class="back-color d13">DESTINATION</td>
                                                        <td colspan="2" class="d14"></td>
                                                        <td class="back-color d15">TOTAL INVOICE</td>
                                                        <td class="d-16"></td>
                                                        <td class="back-color d17">TOTAL GOODS VALUE</td>
                                                        <td class="d18"></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">SHIPPER</td>
                                                        <td class="d12" colspan="4"></td>
                                                       
                                                        <td class="back-color d15">PIECES</td>
                                                        <td class="d-16"></td>
                                                        <td class="back-color d17">ACTUAL WEIGHT</td>
                                                        <td class="d18"></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">CONSIGNER</td>
                                                        <td class="d12" colspan="4"></td>
                                                       
                                                        <td class="back-color d15">CAHRGE WEIGHT</td>
                                                        <td class="d-16"></td>
                                                        <td class="back-color d17">VOLUMETRIC WEIGHT</td>
                                                        <td class="d18"></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">CONSIGNEE</td>
                                                        <td class="d12" colspan="4"></td>
                                                       
                                                        <td class="back-color d15">EDD</td>
                                                        <td class="d-16"></td>
                                                        <td class="back-color d17">PRODUCT NAME</td>
                                                        <td class="d18"></td>
                                                       </tr>
                                                        <tr>
                                                        <td class="back-color d11">REMARKS</td>
                                                        <td class="d12" colspan="4"></td>
                                                       
                                                        <td class="back-color d15">CS PERSON</td>
                                                        <td class="d-16" colspan="4"></td>
                                                        
                                                       </tr>
                                                       <tr class="back-color">
                                                        <td class=" d11 blue-color">LAST STATUS</td>
                                                        <td class="d12" colspan="2"></td>
                                                       
                                                        <td class="d15 blue-color">STATUS DATE</td>
                                                        <td class="d-14"></td>
                                                        <td class="d-15 blue-color">LAST LOCATION</td>
                                                        <td class="d16"></td>
                                                        <td class="td17 blue-color">INVOIVE NO.</td>
                                                        <td class="td18"></td>
                                                       </tr>

                                                   </table>
                                                   <div class="col-12 mt-1">
                                                    <button type="button" class="btn btn-secondary">Case Open</button>
                                                     <button type="button" class="btn btn-secondary">Case ViewClose</button>
                                                      <button type="button" class="btn btn-secondary">Comments</button>
                                                       <button type="button" class="btn btn-secondary">Upload POD Image</button>
                                                        <button type="button" class="btn btn-secondary">POD Image</button>
                                                         <button type="button" class="btn btn-secondary">View Sign</button>
                                                          <img src="http://127.0.0.1:8000/assets/images/map.png"/>
                                                          <button type="button" class="btn btn-secondary">Delivery Address</button>
                                                          <button type="button" class="btn btn-secondary">Item Detail</button>
                                                          <button type="button" class="btn btn-secondary">AWB Load Image</button>
                                                   </div>
                                               </div>
                                           </div>    
                                        
                                   </div>
                               </div>
                           </div>
                        </div> <!-- tab-content -->
                       
                    </form>

                </div> <!-- end card-body -->
                <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row tabels">
                            </div>
                        </div>
                
                </div> <!-- end card-->

            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>




<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
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
              alert('please Enter Scan Date');
              return false;
           }
           if($("#vehicleType").val()=='')
           {
              alert('please select  Vehicle Type');
              return false;
           }
           
            if($("#vendorName").val()=='')
           {
              alert('please Enter Vendor Name');
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
            
            }
            });
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

 //     function DepositeCashToHo()
 // {
 //  // $(".btnSubmit").attr("disabled", true);
 //   if($('#projectCode').val()=='')
 //   {
 //      alert('please Enter project Code');
 //      return false;
 //   }
 //   if($('#projectName').val()=='')
 //   {
 //      alert('please Enter project Name');
 //      return false;
 //   }
   
 //    if($('#ProjectCategory').val()=='')
 //   {
 //      alert('please select Project Category');
 //      return false;
 //   }
 //   var projectCode=$('#projectCode').val();
 //   var projectName=$('#projectName').val();
 //   var ProjectCategory=$('#ProjectCategory').val();
 //   var Pid=$('#Pid').val();
 
 //      var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/AddProduct',
 //       cache: false,
 //       data: {
 //           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid
 //       },
 //       success: function(data) {
 //        location.reload();
 //       }
 //     });
 //  }  
 //  function viewproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', true);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', true);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', true);
      
 //       }
 //     });
 //  }
 //  function Editproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.Pid').val(obj.id);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', false);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', false);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', false);
        
      
 //       }
 //     });
 //  }
</script>