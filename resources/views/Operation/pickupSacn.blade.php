@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Scan Date<span
                                                 class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="1" class="form-control datepickerOne scanDate" name="scanDate" id="scanDate" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vehicle Type</label>
                                                <div class="col-md-8">
                                                <select onchange="selectVehicle();" name="vehicleType" id="vehicleType" tabindex="2" class="form-control selectBox vehicleType">
                                                <option value="Self Vehicle">Self Vehicle</option>
                                                <option value="Vendor Vehicle">Vendor Vehicle</option>
                                                <option value="Market Vehicle">Market Vehicle</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vendor Name<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                               <select tabindex="3" class="form-control vendorName vendorDetails" name="vendorName" id="vendorName" value="" onchange="getVendorVehicle(this.value)">
                                                <option value="">--select--</option>
                                               </select>    
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vehicle No<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                               <select  tabindex="4" class="form-control selectBox vehicleNo VehcleList" name="vehicleNo" id="vehicleNo" value="">
                                                <option value="">--select--</option>
                                               </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Driver Name<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="5" class="form-control driverName DrvierNamesearch" name="driverName" id="driverName" value="">
                                                <option value="">--select--</option>
                                                </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row mb-1">
                                                <label class="col-md-8 col-form-label" for="password">Start KM<span
                                                class="error">*</span></label>
                                                <div class="col-md-4">
                                                <input type="number" tabindex="6" class="form-control startkm" name="startkm" id="startkm" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">End KM<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="7" class="form-control endkm" name="endkm" id="endkm" value="" onchange="KiloMiterCheck();">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="marketHireAmountInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Market Hire Amount<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="8" class="form-control marketHireAmount" name="marketHireAmount" id="marketHireAmount" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div  id="advanceToBePaidInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Advance To Be Paid<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="9" class="form-control advanceToBePaid" name="advanceToBePaid" id="advanceToBePaid" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="paymentModeInput" class="col-6 d-none">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Payment Mode<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="paymentMode" id="paymentMode" tabindex="10" class="form-control selectBox paymentMode">
                                                      <option value="">--select--</option>
                                                      <option value="CASH">CASH</option>
                                                      <option value="BANK">BANK</option>
                                                      <option value="MOBILE">MOBILE</option>
                                                </select>
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="advanceTypeInput" class="col-6 d-none">
                                            <div  class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Advance Type<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                 <select name="advanceType" id="advanceType" tabindex="11" class="form-control selectBox advanceType">
                                                <option value="">--select--</option>
                                                <option value="TRIP">TRIP</option>
                                                <option value="FUEL">FUEL</option>
                                                <option value="OTHER">OTHER</option>
                                                 </select>
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Unloading Supervisor<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" tabindex="12" class="form-control unloadingSupervisorName" name="unloadingSupervisorName" id="unloadingSupervisorName" value=""> -->
                                                   
                                                <select tabindex="12" class="form-control unloadingSupervisorName unloadingSupervisorSearch" name="unloadingSupervisorName" id="unloadingSupervisorName" value="">
                                                <option value="">--select--</option>
                                               </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Pickup Person Name<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="13" class="form-control pickupPersonName PickupPersonNameSearch" name="pickupPersonName" id="pickupPersonName" value="">
                                                <option value="">--select--</option>
                                               </select> 
                                                </div>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Docket No.<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" tabindex="14" class="form-control docketNo" name="docketNo" id="docketNo" readonly onchange="EnterDocket(this.value)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Remark</label>
                                                <div class="col-md-8">
                                                <textarea rows="3" tabindex="15" class="form-control remark" name="remark" id="remark" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6"></div>
                                        <div class="col-6 text-end mb-1">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="16" value="Generate Pickup No" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genrateNO()">
                                                <a href="{{url('PickupScan')}}" tabindex="17" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>
                                
                            
                                    <div class="row bdr-top">
                                            <div class="col-6"></div>
                                            <div class="col-6 text-end">
                                                <div class="row mt-1">
                                                    <label class="col-md-4 col-form-label" for="userName">Pickup Number<span
                                                            class="error">*</span></label>
                                                        <div class="col-md-4">
                                                        <input type="text" tabindex="17" class="form-control pickupNumber" name="pickupNumber" id="pickupNumber" >
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="button" tabindex="18" value="Print Pickup Number" class="btn btn-primary PrinttSubmit" id="PrinttSubmit" onclick="printNO()">
                                                        </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                      <div class="row tabels">
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('js/custome.js')}}"></script>
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