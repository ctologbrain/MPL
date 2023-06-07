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
                <h4 class="page-title">FORWARDING REGISTER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                <form action="" method="GET">
                    @csrf
                    @method('GET')
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="office_name"><b>Office Name</b></label>
                                                <div class="col-md-8">
    
                                                <select  tabindex="1" class="form-control selectBox  office" name="office" id="office">
                                                        <option value="">--Select--</option>
                                                        @foreach($Office as $key)
                                                        <option value="{{$key->id}}"  @if(request()->get('office') !='' && request()->get('office')==$key->id){{'selected'}}@endif>{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                                <label class="col-md-6 col-form-label" for="form_date"><b>From Date</b><span
                                                 class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text"  @if(request()->get('formDate')!='')  value="{{ request()->get('formDate') }}"  @endif tabindex="2" class="form-control datepickerOne formDate" name="formDate" id="formDate" >
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="to_date"><b>To Date</b><span
                                                 class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" tabindex="3" class="form-control datepickerOne todate"  @if(request()->get('todate')!='')  value="{{ request()->get('todate') }}"  @endif   name="todate" id="todate" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start">
                                           
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="submit" tabindex="4" value="Generate Report" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                            
                                        </div>
                                    </div>
                                
                            
                                  
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-12">
                    <div class="row docket_bookin_customer"> 
                    <div class="col-3"> <span><b> Total Record:</b> {{$forwardingOffice->total()}}</span></div>   
                    
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="table-responsive a">
                    <table class="table table-bordered table-centered mb-1 mt-1 az_report">
                                        <thead>
                                            <tr class="main-title text-dark text-start">
                                                <th class="p-1 text-center">SL#</th>
                                                <th class="p-1 text-start" style="min-width: 150px;">Office Name</th>
                                                <th class="p-1 text-start" style="min-width: 120px;">Forwarding Date</th>
                                                 <th class="p-1 text-start" style="min-width: 250px;">3PL Vendor Name</th>
                                                 <th class="p-1 text-end" style="min-width: 150px;">Total Dockets</th>
                                                 <th class="p-1 text-end" style="min-width: 150px;">Forwarding Wt</th>
                                                 <th class="p-1 text-end" >NDR</th>
                                                 <th class="p-1 text-end" >RTO</th>
                                                 <th class="p-1 text-end">Delivered</th>
                                                 <th class="p-1 text-end">Pending</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                        <?php $i=0; 
                                            $page=request()->get('page');
                                            if(isset($page) && $page>1){
                                                $page =$page-1;
                                            $i = intval($page*10);
                                            }
                                            else{
                                            $i=0;
                                            }
                                            ?>
                                            @foreach($forwardingOffice as $key)
                                            <?php 
                                            $i++; ?>
                                        <tr>
                                                <td class="p-1 text-center">{{$i}} </td>
                                                <td class="p-1 text-start">{{$key->DocketDetails->offcieDetails->OfficeCode}} ~ {{$key->DocketDetails->offcieDetails->OfficeName}}</td>
                                                <td class="p-1 text-start">{{date("d-m-Y", strtotime($key->Forwarding_Date))}}</td>
                                                <td class="p-1 text-start">{{$key->vendorDetails->VendorCode}} ~{{$key->vendorDetails->VendorName}}</td>
                                               
                                               
                                                <td class="p-1 text-end"><a href="#">{{$key->TotDock}}</a></td>
                                                <td class="p-1 text-end"><a href="#">{{$key->Forwarding_Weight}}</a></td>
                                                <td class="p-1 text-end"><a href="#">{{$key->DocketDetails->TotNDR}}</a></td>
                                                <td class="p-1 text-end"><a href="#">{{$key->DocketDetails->TotRTO}}</a></td>
                                                <td class="p-1 text-end"><a href="#">{{$key->DocketDetails->DRSDel+$key->DocketDetails->RDel}}</a></td>
                                                <td class="p-1 text-end">{{''}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table> 


                    </div>
                    </div>
                    <div class="d-flex d-flex justify-content-between">
                            {!! $forwardingOffice->appends(Request::all())->links() !!}
                    </div>
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