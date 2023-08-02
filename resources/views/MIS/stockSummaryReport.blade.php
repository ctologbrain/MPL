@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                  
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
   
     
<div class="row">
        <div class="col-xl-12">
            <div class="card stck_summary">
                <div class="card-body">
                    <form>
                    @csrf
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                       
                                        
                                        <div class="col-md-12">
                                            <div class="gatepass-details row">
                                              <div class="col-md-3">
                                                <select class="form-control office_name selectBox p-1" id="office_name" id="office_name" name="office_name" tabindex="1">
                                                    <option value="" selected>--office--</option>
                                                    @foreach($office as $offices)
                                                    <option value="{{$offices->id}}" @if(request()->get('office_name') !='' && request()->get('office_name')==$offices->id){{'selected'}}@endif>{{$offices->OfficeCode}}~{{$offices->OfficeName}}</option>
                                                    @endforeach
                                                                            
                                                </select>
                                              </div>
                                              <div class="col-md-3">
                                                <input type="text" name="from_date" id="from_date" class="from_date form-control datepickerOne" tabindex="2" value="{{ request()->get('from_date') }}" placeholder="From Date">
                                              </div>
                                              <div class="col-md-3">
                                                <input type="text" name="to_date" id="to_date" class="to_date form-control datepickerOne" tabindex="3" placeholder="To Date" value="{{ request()->get('to_date') }}">
                                              </div>
                                                <div class="col-md-3 col-12 mt-11">
                                                <input type="submit" tabindex="4" value="Search" class="btn btn-primary btnSubmit" id="btnSubmit" >
                                                <a href="{{url('StockSummaryReport')}}" class="btn btn-primary btnSubmit" id="btnSubmit">Cancel</a>
                                                <input type="submit" name="submit" tabindex="6" value="Download" class="btn btn-primary btnSubmit" id="btnSubmit" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="table-responsive a">
                                                    <table class="table table-bordered table-centered mb-1 mt-1 az_report">
                                                            <thead>
                                                                <tr class="main-title text-dark text-start">
                                                                    <th class="p-1">SL#</th>
                                                                    <th class="p-1">Office Name</th>
                                                                    <th class="p-1">Issue Date</th>
                                                                     <th class="p-1">Issued</th>
                                                                     <th class="p-1">Docket Series</th>
                                                                     <th class="p-1">Used</th>
                                                                     <th class="p-1">Un-Used</th>
                                                                     <th class="p-1">Cancelled</th>
                                                                     <th class="p-1">Missing</th>
                                                                  </tr>
                                                            </thead> 
                                                            <tbody>
                                                            <?php $i=0; ?>
                                                                @foreach($Data as $stockReport)
                                                                <?php $i++; ?>
                                                                <tr class="text-start">
                                                                    <td class="p-1">{{$i}}</td>
                                                                    <td class="p-1">{{$stockReport->OfficeName}}</td>
                                                                    <td class="p-1">{{$stockReport->IssueDate}}</td>
                                                                    <td class="p-1">{{$stockReport->Qty}}</td>
                                                                    <td class="p-1">{{$stockReport->Sr_From}}-{{$stockReport->Sr_To}}</td>
                                                                    <td class="p-1"><a href="{{url('StockSummaryDetails?Did='.$stockReport->id.'&IssueDate='.$stockReport->IssueDate.'&Status=3')}}">{{$stockReport->Booked}}</a></td>
                                                                    <td class="p-1"><a href="{{url('StockSummaryDetails?Did='.$stockReport->id.'&IssueDate='.$stockReport->IssueDate.'&Status=0')}}">{{$stockReport->Unused}}</a></td>
                                                                    <td class="p-1"><a href="{{url('StockSummaryDetails?Did='.$stockReport->id.'&IssueDate='.$stockReport->IssueDate.'&Status=1')}}">{{$stockReport->Cancel}}</a></td>
                                                                    <td class="p-1">0</td>
                                                                    
                                                                </tr>
                                                                @endforeach
                                                                        
                                                                    </tbody>
                                                                
                                                    </table> 
                                                </div>
                                        
                                           
                                                
                                         </div>
                                         <div class="col-md-12">
                                            <div class="d-flex d-flex justify-content-between">
                                              {!! $Data->appends(Request::all())->links() !!}
                                            </div>
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
                        </div>
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script>
      $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('select').select2();
   function gitFcmNumber(value)
    {
     
     if(value==1)
      { 
        $('.fpm_number').attr('disabled', false);
      }
     else{
       
         $('.fpm_number').attr('disabled', true);
     }
    }
    function GetFcmDetails(Fpm)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getFcmDetails',
       cache: false,
       data: {
           'Fpm':Fpm
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.route').val(obj.Route_Id).trigger('change');
        $('.vendor_name').val(obj.Vehicle_Provider).trigger('change');
        $('.vehicle_name').val(obj.Vehicle_No).trigger('change');
        $('.vehicle_model').val(obj.Vehicle_Model).trigger('change');
        $('.driver_name').val(obj.Driver_Id).trigger('change');
     
       }
     });
    }
    function getSourceAndDest(routeId)
    {
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getSourceAndDest',
       cache: false,
       data: {
           'routeId':routeId
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
          $('.origin').val(obj.statrt_point_details.CityName);
          $('.origin').attr('readonly', true);
          $('.destination').val(obj.end_point_details.CityName);
          $('.destination').attr('readonly', true);
    //       $.ajax({
    //      type: 'POST',
    //      headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getOffcieByCity',
    //    cache: false,
    //    data: {
    //        'EndPoint':obj.Destination
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
         
         
    //    }
    //  });
       }
     });
    }
    function getDocketDetails(Docket,BranchId)
{
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsBooked',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':BranchId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.Docket').val('');
            $('.Docket').focus();
            $('.pieces').val('');
            $('.weight').val('');
            $('.displayPices').val('');
            $('.displayWeight').val('');
            $('#partpices').text('');
            $('#partWidth').text('');
            return false;
        }
        else{
            $('.pieces').val(obj.partQty);
            $('.weight').val(obj.partWeight);
            $('.displayPices').val(obj.qty);
            $('.displayWeight').val(obj.ActualW);
            $('#partpices').text(obj.partQty);
            $('#partWidth').text(obj.partWeight);
            
           
        }

       }
     });
}
function genrateGatePass()
{
    if($('#GP_Time_Stamp').val()=='')
    {
        alert('Please Enter gatePass Time');
        return false;
    }
    if($('#PlacementTimeStamp').val()=='')
    {
        alert('Please Enter Placement Time');
        return false;
    }
    if($('#route').val()=='')
    {
        alert('Please Select Route');
        return false;
    }
    if($('#vendor_name').val()=='')
    {
        alert('Please Selelct Vendor Name');
        return false;
    }
    if($('#vehicle_name').val()=='')
    {
        alert('Please Selelct Vehicle Name');
        return false;
    }
    if($('#vehicle_model').val()=='')
    {
        alert('Please Selelct Vehicle Model');
        return false;
    }
    if($('#sprvisor_name').val()=='')
    {
        alert('Please Enter Sprvisor Name');
        return false;
    }
    
    var with_fpm = $("input[name=with_fpm]:checked").val();
    var GP_Time_Stamp=$('#GP_Time_Stamp').val();
    var fpm_number=$('#fpm_number').val();
    var PlacementTimeStamp=$('#PlacementTimeStamp').val();
    var route=$('#route').val();
    var type=$('#type').val();
    var vendor_name=$('#vendor_name').val();
    var vehicle_name=$('#vehicle_name').val();
    var vehicle_model=$('#vehicle_model').val();
    var driver_name=$('#driver_name').val();
    var mob_no=$('#mob_no').val();
    var dev_id=$('#dev_id').val();
    var sprvisor_name=$('#sprvisor_name').val();
    var seal_number=$('#seal_number').val();
    var remark=$('#remark').val();
    var start_km=$('#start_km').val();
    var vehicle_teriff=$('#vehicle_teriff').val();
    var adv_driver=$('#adv_driver').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitVehicleGatePass',
       cache: false,
       data: {
           'with_fpm':with_fpm,'GP_Time_Stamp':GP_Time_Stamp,'PlacementTimeStamp':PlacementTimeStamp,'route':route,'vendor_name':vendor_name,'vehicle_name':vehicle_name,'vehicle_model':vehicle_model,'driver_name':driver_name,'mob_no':mob_no,'dev_id':dev_id,'sprvisor_name':sprvisor_name,'remark':remark,'start_km':start_km,'vehicle_teriff':vehicle_teriff,'adv_driver':adv_driver,'type':type,'seal_number':seal_number,'fpm_number':fpm_number
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        const obj = JSON.parse(data);
        $('.gatepassNo').text(' '+obj.gatepass);
        $('.gate_pass_number').val(obj.gatepass);
        $('.id').val(obj.id);
       }
     });

}
function SaveGatePassOrDocket()
{
    if($('#id').val()=='')
    {
       alert('Please Genrate Gatepass number first');
       return false; 
    }
    if($('#destination_office').val()=='')
    {
       alert('Please Enter destination office');
       return false; 
    }
    if($('#Docket').val()=='')
    {
       alert('Please Enter Docket');
       return false; 
    }
    var id=$('#id').val();
    var Docket=$('#Docket').val();
    var destination_office=$('#destination_office').val();
    var pieces=$('#pieces').val();
    var weight=$('#weight').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GatePassWithDocket',
       cache: false,
       data: {
           'id':id,'Docket':Docket,'destination_office':destination_office,'pieces':pieces,'weight':weight
       },
       success: function(data) {
        $('.Docket').val('');
        $('.pieces').val('');
        $('.weight').val('');
        $('.displayPices').val('');
        $('.displayWeight').val('');
        $('#partpices').text('');
        $('#partWidth').text('');
        $('.Docket').focus();
        $('.tabelData').html(data);
        $('#hidden').addClass('pppp');
       }
     });
}
function printgatePass()
{
    if($('#gate_pass_number').val()=='')
    {
        alert('Please Enter GatePass Number');
        return false;
    }
    var base_url = '{{url('')}}';
    var gatePass=$('#gate_pass_number').val();
    location.href = base_url+"/print_gate_Number/"+gatePass;
  
}
    </script>
             
    