@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">DASHBOARD DETAIL - MISSING GATEPASS</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card missing-gatepass">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="one-day btn-primary">
                                                <div>{{$TimingTweentyFourCount->TotalDock}}</div>
                                                <div>0-24 hours</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="one-day btn-secondary">
                                                <div>{{$TimingFortyEightCount->TotalDock}}</div>
                                                <div>25-48 hours</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="one-day btn-success">
                                                <div>{{$TimingSeventyTwoCount->TotalDock}}</div>
                                                <div>49-72 hours</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                             <div class="one-day btn-warning">
                                                <div>{{$Time72Pluse->TotalDock}}</div>
                                                <div>+72 hours</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="one-day btn-info">
                                                <div>{{intval($TimingTweentyFourCount->TotalDock+$TimingFortyEightCount->TotalDock+$TimingSeventyTwoCount->TotalDock+$Time72Pluse->TotalDock)}}</div>
                                                <div>All</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gatepass-details row">
                                                <div class="col-md-8">
                                                    Total Docket: <b>{{intval($TimingTweentyFourCount->TotalDock+$TimingFortyEightCount->TotalDock+$TimingSeventyTwoCount->TotalDock+$Time72Pluse->TotalDock)}}</b> &nbsp;
                                                    Total Pieces: <b> @isset($SumDocketStuff->qty){{$SumDocketStuff->qty}} @endisset</b>&nbsp;
                                                    Total Actual Weight: <b>@isset($SumDocketStuff->actW) {{$SumDocketStuff->actW}} @endisset</b>&nbsp;
                                                    Total Charge Weight:<b> @isset($SumDocketStuff->chgW){{$SumDocketStuff->chgW}} @endisset </b>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <a href="{{url('/MissingGatePassWithDocketDownload')}}" class="btn btn-primary p-1">Export &nbsp; <i class="fa fa-download" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-md-12">
                                        <table class="table-responsive table-bordered">
                                                    <thead>
                                                        <tr class="main-title text-dark">
                                                        
                                                            <th class="p-1 td1">SL#</th>
                                                            <th class="p-1 td2">Date</th>
                                                            <th class="p-1 td3">Origin</th>
                                                            <th class="p-1 td4">Origin State</th>
                                                            <th class="p-1 td5">Dest.</th>
                                                            <th class="p-1 td6">Dest. State</th>
                                                            <th class="p-1 td7">Docket No.</th>
                                                            <th class="p-1 tdM8">Client Name</th>
                                                            <th class="p-1 td9">Pieces</th>
                                                            <th class="p-1 td10">Act. Wt</th>
                                                            <th class="p-1 td11">Chrg. Wt.</th>
                                                            <th class="p-1 td12">Sale Type</th>
                                                            <th class="p-1 td13">Branch</th>
                                                            <th class="p-1 td14">Delay In Hour.</th>

                                                           

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
                                                        $delayCal=0; ?>
                                                        @foreach($MissingDocket as $key)
                                                         <?php $i++;  
                                                         date_default_timezone_set("Asia/Kolkata");
                                                         $delayCal =intval( strtotime(date("Y-m-d H:i:s"))-strtotime($key->Booking_Date));
                                                        $delayCal = number_format(($delayCal/(60*60)),0);
                                                         
                                                         ?>
                                                        <tr>
                                                           
                                                            <td class="p-1">{{$i}}</td>
                                                            <td class="p-1">{{$key->Booking_Date}}  </td>

                                                            <td class="p-1">@isset($key->PincodeDetails->CityDetails->CityName ) {{$key->PincodeDetails->CityDetails->CityName}} @endisset</td>
                                                            <td class="p-1">@isset($key->PincodeDetails->StateDetails->name ) {{$key->PincodeDetails->StateDetails->name}} @endisset</td>
                                                            <td class="p-1">
                                                                @isset($key->DestPincodeDetails->CityDetails->CityName )
                                                                {{$key->DestPincodeDetails->CityDetails->CityName}} @endisset</td>
                                                            <td class="p-1">@isset($key->DestPincodeDetails->StateDetails->name) {{$key->DestPincodeDetails->StateDetails->name}} @endisset</td>
                                                            <td class="p-1"><a target="_blank" href="{{url('/docketTracking')}}">{{$key->Docket_No}}</a></td>
                                                            <td class="p-1">@isset($key->customerDetails->CustomerCode ) {{$key->customerDetails->CustomerCode}}~ {{$key->customerDetails->CustomerName}} @endisset</td>
                                                            <td class="p-1">@isset($key->DocketProductDetails->Qty) {{$key->DocketProductDetails->Qty}} @endisset</td>
                                                            <td class="p-1">@isset($key->DocketProductDetails->Actual_Weight) {{$key->DocketProductDetails->Actual_Weight}} @endisset</td>
                                                            <td class="p-1">@isset($key->DocketProductDetails->Charged_Weight) {{$key->DocketProductDetails->  Charged_Weight}} @endisset</td>
                                                            <td class="p-1">-</td>
                                                            <td class="p-1">@isset($key->offcieDetails->OfficeCode ){{$key->offcieDetails->OfficeCode}}~ {{$key->offcieDetails->OfficeName}} @endisset</td>
                                                            <td class="p-1">{{$delayCal}}</td>
                                                            
                                                        </tr>
                                                      @endforeach
                                                        
                                                                    
                                                                   
                                                                   
                                                             </tbody>
                                                         
                                                            </table> 
                                                            </div>
                                    </div>
                                    
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                        <div class="row tabels">
                             <div class="d-flex d-flex justify-content-between">
                            {!! $MissingDocket->appends(Request::all())->links() !!}
                            </div>
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