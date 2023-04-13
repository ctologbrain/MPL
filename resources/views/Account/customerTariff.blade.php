@include('layouts.appThree')

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
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card customer_tariff_container">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                     
                                    
                                   
                                    <div class="col-12 bdr-btm primary-bg p-1">
                                        <div class="row">
                                             <label class="col-md-2 col-form-label" for="customer_name">Customer Name</label>
                                            <div class="col-md-2">
                                                <input type="text" name="customer_name2" tabindex="1" class="form-control customer_name2" id="customer_name2">
                                           </div>
                                          <div class="col-2">
                                            <select name="vendor_name" tabindex="2"
                                                    class="form-control vendor_name selectBox" id="vendor_name">
                                                        <option value="">--select--</option>
                                                      
                                                        <option value="">LATEST</option>
                                                        <option value="">WITH HISTORY</option>
                                                        
                                                    </select>
                                            </div>
                                            <div class="col-6">
                                           <a href="#" class="header-btn" tabindex="3">Export</a>
                                           <a href="#" class="header-btn" tabindex="4">Missing Customer</a>
                                           <a href="#" class="header-btn" tabindex="5">Upload Contract</a>
                                           <a href="#" class="header-btn" tabindex="6">Tariff Mapping</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                 
                                    <div class="col-6 mt-1">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
                                            <div class="col-8">
                                         
                                           <select name="customer_name" class="form-control customer_name" id="customer_name" tabindex="7">
                                               <option value="">--selecte</option>
                                            @foreach($customer as $cust)   
                                            <option value="{{$cust->id}}">{{$cust->CustomerCode}}~{{$cust->CustomerName}}</option>
                                             @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>


                                    <div class="col-6 mt-1">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="wef_date">W. E. F. Date<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                <input type="text" name="wef_date" tabindex="8"
                                                    class="form-control wef_date datepickerOne" id="wef_date" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="tarrif_type">Tarrif Type</label>
                                            <div class="col-md-8">
                                               
                                              <select name="vendor_name" tabindex="9"
                                                    class="form-control tarrif_type selectBox" id="tarrif_type" name="tarrif_type">
                                                        <option value="">--select--</option>
                                                         @foreach($TariffType as $ttype)
                                                         <option value="{{$ttype->Id}}">{{$ttype->Origin}}-{{$ttype->Desitination}}</option>
                                                         @endforeach
                                                        
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-6">
                                       
                                    </div>


                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="destination_name"> Destination Name</label>
                                                  <div class="col-md-8">
                                                 <select  name="origin_name" tabindex="12"
                                                    class="form-control origin_name" id="origin_name">
                                                       <option value="">--select--</option>
                                                       @foreach($city as $cityes)
                                                       <option value="{{$cityes->id}}">{{$cityes->Code}}~{{$cityes->CityName}}</option>
                                                       @endforeach 
                                                    </select>
                                                  </div>
                                        </div>
                                    </div>

                                     <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="destination_name"> Destination Name</label>
                                                  <div class="col-md-8">
                                                 <select  name="destination_name" tabindex="12"
                                                    class="form-control destination_name" id="destination_name">
                                                       <option value="">--select--</option>
                                                       @foreach($city as $cityes)
                                                       <option value="{{$cityes->id}}">{{$cityes->Code}}~{{$cityes->CityName}}</option>
                                                       @endforeach 
                                                    </select>
                                                  </div>
                                        </div>
                                    </div>
                                     
                                  
                                    
                                   
                                     <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="mode_name"> Mode Name</label>
                                                  <div class="col-md-8">
                                                 <select name="mode_name" tabindex="13"
                                                    class="form-control mode_name" id="mode_name">
                                                 <option value="">--select--</option>
                                                 <option value="1">AIR</option>
                                                 <option value="2">ROAD</option>
                                                 <option value="3">TRAIN</option>
                                                 <option value="4">COURIER</option>
                                                </select>
                                                  </div>
                                        </div>
                                    </div>

                                   

                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="mode_name"> Product Name</label>
                                                  <div class="col-md-8">
                                                 <select name="product" class="form-control product" id="product">
                                                        <option value="">--select--</option>
                                                        @foreach($Product as $pro)
                                                        <option value="{{$pro->id}}">{{$pro->ProductCode}}~{{$pro->ProductName}}</option>
                                                        @endforeach
                                                    </select>
                                                  </div>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
                <div class="col-xl-12">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td1">Delivery Type</th>
                            <th class="p-1 td2">Rate Type</th>
                            <th class="p-1 td3">TAT</th>
                            <th class="p-1 td4">Min. Amount</th>
                            <th class="p-1 td5">Weight/Box Slabs</th>
                            <th class="p-1 td6"></th>
                            
                           

                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            <td class="p-1 td1"> 
                                 <select name="delivery_type" tabindex="15"
                                                    class="form-control delivery_type selectBox" id="delivery_type">
                                                        <option value="">--select--</option>
                                                        @foreach($DevileryType as $Devilery)
                                                        <option value="{{$Devilery->id}}">{{$Devilery->Title}}</option>
                                                        @endforeach
                                                       
                                                        
                                                    </select>
                            </td>
                            <td class="p-1 td2"> 
                                <div class="col-12">
                                    <select name="RateType" tabindex="16" class="form-control RateType" id="RateType">
                                    <option value="">--select--</option> 
                                    <option value="1">PER KG</option>
                                      <option value="2">PER BOXS</option>
                                    </select> 
                                </div>
                            </td>
                                 <td class="p-1 td3"><input type="text"  name="tat" tabindex="17"
                                                    class="form-control tat" id="tat">   </td>
                                 <td class="p-1 td4"><input type="text"  name="Amount" tabindex="18"
                                                    class="form-control Amount" id="Amount" > 
                                                     
                                </td>

                            <td class="p-1 td5">


                                <select name="weight_slab" tabindex="19" class="form-control weight_slab" id="weight_slab">
                                       <option value="">--select--</option>   
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>

                                    </select>  
                                                </td>
                            <td class="p-1 td6">
                                <input type="button" value="Add" class="btn btn-primary add" id="add" onclick="CaculateSlab()" tabindex="20">
                            </td>
                          
                       </tr>
                       <tr>
                            <td  class="p-1 text-start" colspan="6"  width="100%">
                              
                                <input type="button" value="Process" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()" tabindex="21">

                                <input type="button" value="Reset" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()" tabindex="22">
                                
                            </td>
                          
                        </tr>
                      
                        </tbody>
                         
                  </table> 
                  <div class="tabelData"></div>
                </div> 

               
           </div>     
        </div>
    </div>
</form>
</div>
<div class="TarrifModelModel"></div>
<script>
    $('select').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          language: 'es' ,
          autoclose:true
      });
    function CaculateSlab()
    {
     
     if($('#customer_name').val()=='')
     {
        alert('Select customer');
        return false; 
     }
     if($('#wef_date').val()=='')
     {
        alert('Enter Date');
        return false; 
     }
     if($('#tarrif_type').val()=='')
     {
        alert('Select Tarrif Type');
        return false; 
     }
     
     if($('#origin_name').val()=='')
     {
        alert('Select Origin Name');
        return false; 
     }
     if($('#destination_name').val()=='')
     {
        alert('Select Destination Name');
        return false; 
     }  
     if($('#mode_name').val()=='')
     {
        alert('Select Mode');
        return false; 
     }  
     if($('#product').val()=='')
     {
        alert('Select Product');
        return false; 
     } 
     if($('#delivery_type').val()=='')
     {
        alert('Select Delivery Type');
        return false; 
     } 
     if($('#RateType').val()=='')
     {
        alert('Select Rate');
        return false; 
     } 
     if($('#tat').val()=='')
     {
        alert('Enter TAT');
        return false; 
     } 
     if($('#Amount').val()=='')
     {
        alert('Enter Amount');
        return false; 
     } 
     if($('#weight_slab').val()=='')
     {
        alert('Select Slab');
        return false; 
     }
    var customer_name = $('#customer_name').val();
     var wef_date = $('#wef_date').val();
     var tarrif_type = $('#tarrif_type').val();
     var origin_name = $('#origin_name').val();
      var destination_name = $('#destination_name').val();
     var mode_name = $('#mode_name').val();
     var product = $('#product').val();
     var delivery_type = $('#delivery_type').val();
     var RateType = $('#RateType').val();
     var tat = $('#tat').val();
     var Amount = $('#Amount').val();
     var weight_slab = $('#weight_slab').val();
       var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CusomerTafiffModel',
       cache: false,
       data: {
           'customer_name':customer_name,'wef_date':wef_date,'tarrif_type':tarrif_type,'origin_name':origin_name,'destination_name':destination_name,'mode_name':mode_name,'product':product,'delivery_type':delivery_type,'RateType':RateType,'tat':tat,'Amount':Amount,'weight_slab':weight_slab
       },
       success: function(data) {
           $('.TarrifModelModel').html(data);
       
     
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
             
    