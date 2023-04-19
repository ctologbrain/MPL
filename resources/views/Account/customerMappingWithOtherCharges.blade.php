@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">CUSTOMER MAPPING WITH OTHER CHARGES</h4>
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
                                             <div class="col-8 p-1">
                                                <div class="row">
                                                 <label class="col-md-3 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
                                                <div class="col-md-3">

                                                    <select name="customer_name" tabindex="1" class="form-control customer_name" id="customer_name" onchange="getCustomerDetails(this.value);">
                                                        <option value="">--Select--</option>
                                                        @foreach($CustomerDetails as $key)
                                                           <option value="{{$key->id}}">{{$key->CustomerCode}} ~ {{$key->CustomerName}}</option>
                                                          @endforeach
                                                           
                                                        </select> 

                                                    
                                               </div>
                                                <label class="col-md-2 col-form-label" for="charge_name">Charge Name<span class="error">*</span></label>
                                              <div class="col-3">
                                               
                                                <select name="charge_name" tabindex="2" class="form-control charge_name" id="charge_name" onchange="getOtherChargeDeatails(this.value);">
                                                        <option value="">--Select--</option>
                                                        @foreach($CustomerOtherCharges as $key)
                                                           <option value="{{$key->Id}}">{{$key->Title}}</option>
                                                          @endforeach
                                                           
                                                        </select> 
                                              
                                                </div>
                                             </div>
                                            </div>
                                            
                                             <div class="col-4 text-end p-1">
                                                    <a href="#" class="btn btn-primary p-1">Export All</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-9">

                                        <div class="row">

                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="wef">W.E.F<span class="error">*</span></label>
                                                        <div class="col-8">
                                                        <input type="text" name="wef" class="form-control wef datepickerOne" id="wef" tabindex="3" autocomplete="off">
                                                        </div>
                                                        <input type="hidden" name="chrg_id" id="chrg_id">
                                                        
                                                        <input type="hidden" name="cust_map_id" id="cust_map_id">
                                                        
                                                        
                                                    </div>
                                                </div>


                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="wef_date">W.E.To <span
                                                                class="error">*</span></label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="wef_date" tabindex="4"
                                                                class="form-control wef_date datepickerTwo" id="wef_date" onchange="" autocomplete="off">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                  <div class="col-4 mt-1">

                                                </div>

                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="charge_type">Charge Type</label>
                                                        <div class="col-8">
                                                        <select name="charge_type" tabindex="5" class="form-control charge_type" id="charge_type">
                                                           <option value="1">%</option>
                                                          
                                                           <option value="2">AMOUNT</option>
                                                        </select> 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="charges">Charges <span
                                                                class="error">*</span></label>
                                                              <div class="col-md-7">
                                                            <input type="number" name="charges" tabindex="6"
                                                                class="form-control charges" id="charges" onchange="">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                 <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="minimum_amount">Minimum Amount</label>
                                                              <div class="col-md-7">
                                                            <input type="number" name="minimum_amount" tabindex="7"
                                                                class="form-control minimum_amount" id="minimum_amount" onchange="">

                                                              </div>
                                                    </div>
                                                </div>

                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="range_type">Range Type</label>
                                                        <div class="col-8">
                                                        <select name="range_type" tabindex="8" class="form-control range_type" id="range_type">
                                                            @foreach($ChargesRange as $key)
                                                           <option value="{{$key->Id}}">{{$key->Title}}</option>
                                                          @endforeach
                                                           
                                                        </select> 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="range_from">Range From <span
                                                                class="error">*</span></label>
                                                              <div class="col-md-7">
                                                            <input type="number" name="range_from" tabindex="9"
                                                                class="form-control range_from" id="range_from" onchange="">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                  <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="range_to">Range To <span
                                                                class="error">*</span></label>
                                                              <div class="col-md-7">
                                                            <input type="number" name="range_to" tabindex="10"
                                                                class="form-control range_to" id="range_to" onchange="">

                                                              </div>
                                                    </div>
                                                </div>

                                                 <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="process_by">Process By</label>
                                                        <div class="col-8">
                                                        <select name="process_by" tabindex="11" class="form-control process_by" id="process_by" onchange="ShowDestSource(this.value);">
                                                           <option value="1">ALL</option>
                                                          
                                                           <option value="2">ONE TO ONE MAPPING</option>
                                                           <option value="3">MULTIPLE MAPPING</option>
                                                           
                                                        </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div id="ContainerBox" class="col-4 mt-1" style="display: none;">
                                                     <div class="row text-end">
                                                        <label class="col-md-4 col-form-label"></label>
                                                           <div class="col-8">
                                             <input type="button" tabindex="4" value="Save"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="SubmitCustomerMapping();">
                                                        </div>
                                        </div>
                                                 </div>
                                  
                                        </div>
                                    </div>


                                     <div class="col-3 ">
                                       


                                    </div>
                                    <div id="ContainerBoxTwo" class="col-12" style="display: none;">
                                        <table class="table table-bordered table-centered mt-1">
                                                <tr>
                                                    <td align="left" class="p-1 text-start">Origin City<span class="error">*</span></td>
                                                    <td align="left" class="p-1">
                                                        

                                                      <select name="origin_city" tabindex="1" class="form-control origin_city" id="origin_city">
                                                        <option value="">--Select--</option>
                                                            @foreach($city as $key)
                                                           <option value="{{$key->id}}">{{$key->Code}}~{{$key->CityName}}</option>
                                                          @endforeach
                                                           
                                                        </select> 
                                                       
                                                    </td>
                                                    <td align="left" class="p-1 text-start"> Destination City<span class="error">*</span>
                                                    </td>
                                                    <td>
                                                         <select name="destination_city" tabindex="2" class="form-control destination_city" id="destination_city">
                                                            <option value="">--Select--</option>
                                                            @foreach($city as $key)
                                                           <option value="{{$key->id}}">{{$key->Code}}~{{$key->CityName}}</option>
                                                          @endforeach
                                                           
                                                        </select> 
                                                        
                                                    </td>
                                                    <td>
                                                        <input type="button" tabindex="3" value="Save"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="SubmitCustomerMapping();">
                                                            <a href="javascript:void(0);" tabindex="4" class="btn btn-primary" onclick="canceled();">Cancel</a> 
                                                    </td>
                                                </tr>
                                            
                                        </table>
                                     </div>
                                    <div class="col-12" style="overflow-x: auto;">
                                        <table class="table table-bordered table-centered table-responsive"  >
                                            <thead>
                                                <tr class="main-title text-dark">
                                                    <th >SL#</th>
                                                    <th style="min-width: 100px;">ACTION</th>
                                                    <th style="min-width: 200px;">Customer Name</th>
                                                    <th style="min-width: 100px;">Charge Name</th>
                                                    <th style="min-width: 100px;">W.E.F</th>
                                                    <th style="min-width: 100px;">W.E.To</th>
                                                    <th style="min-width: 100px;">Charge Type</th>
                                                    <th style="min-width: 100px;">Charges</th>
                                                    <th style="min-width: 200px;">Minimum Amount</th>
                                                    <th style="min-width: 100px;">Rnage Type</th>
                                                    <th style="min-width: 100px;">Rnage From</th>
                                                    <th style="min-width: 100px;">Rnage To</th>
                                                    <th style="min-width: 100px;">Process By</th>
                                                    <th style="min-width: 100px;">Origin</th>
                                                    <th style="min-width: 100px;">Destination</th>
                                                    <th style="min-width: 100px;">FS Charge</th>
                                                    <th style="min-width: 100px;">FS Freight</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0; ?>
                                                @foreach($CustOtherChargeWithCust as $key)
                                                <?php $i++; 
                                                if($key->Process==1){
                                                    $Process='ALL';
                                                }
                                                elseif($key->Process==2){
                                                       $Process= 'ONE TO ONE MAPPING';
                                                }
                                                elseif($key->Process==3){
                                                      $Process=  'MULTIPLE MAPPING';
                                                }
                                                if(isset($key->Charge_Type) && $key->Charge_Type==1){
                                                   $type= "Amount";
                                                }
                                                else if(isset($key->Charge_Type) && $key->Charge_Type==2){
                                                    $type= "%";
                                                }
                                                else{
                                                    $type= '';
                                                }
                                                ?>
                                                <tr>
                                                    <td align="left" class="p-1">{{$i}}</td>
                                                    <td align="left" class="p-1"><a href="javascript:void(0);" onclick="getAllViewData('{{$key->Id}}');">View</a>|<a href="javascript:void(0);" onclick="getAllEdit('{{$key->Id}}');">Edit</a> </td>
                                                    <td align="left" class="p-1">{{$key->CustomerDataDetails->CustomerName}}</td>
                                                   
                                                    <td>@isset($key->ChargeDataDetails->Title) {{$key->ChargeDataDetails->Title}} @endisset</td>
                                                    <td>{{$key->Date_From}}</td>
                                                    <td>{{$key->Date_To}}</td>
                                                    <td>{{$type}}</td>
                                                    <td>{{$key->Charge_Amt}}</td>
                                                    <td>{{$key->Min_Amt}}</td>
                                                    <td>@isset($key->ChargeTypeDeatils->Title) {{$key->ChargeTypeDeatils->Title}} @endisset</td>
                                                    <td>{{$key->Range_From}}</td>
                                                    <td>{{$key->Range_To}}</td>
                                                    <td>{{$Process}}</td>

                                                     <td>@isset($key->OriginDataDetails->Code) {{$key->OriginDataDetails->Code}}~{{$key->OriginDataDetails->CityName}} @endisset</td>
                                                      <td>
                                                        @isset($key->DestDataDetails->Code) {{$key->DestDataDetails->Code}}~{{$key->DestDataDetails->CityName}} @endisset
                                                      </td>
                                                       <td>{{$key->FS_Charge}}</td>
                                                        <td>{{$key->FS_Freight}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                     </div>
                                       <div class="d-flex d-flex justify-content-between">
                                        {{ $CustOtherChargeWithCust->appends(Request::except('page'))->links() }}
                                        </div>

                                   
                                 
                                    
                                  


                                  

                                   

                                  
                                   
                                   
                               
                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
              
           </div>     
        </div>
    </div>
</form>
</div>
<script>
   
    $('select').select2();
    // $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    // $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          language: 'es' ,
          autoclose:true
      });
    $('.datepickerTwo').datepicker({
          format: 'yyyy-mm-dd',
          language: 'es' ,
          autoclose:true
      });

    function getOtherChargeDeatails(Name)
    {
        var base_url = '{{url('')}}';
        var BranchId = $('.destination_office').val();
    if($('#charge_name').val()!=''){
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CustomerChargesMapWithCustomerData',
       cache: false,
       data: {
           'Name':Name
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
           
           var customer_name = $('#customer_name option:selected').val();
           if(customer_name!=''){
              $('#chrg_id').val(obj.datas.Id);
           
            $('#charge_name').val(obj.datas.Title);
            $('#charge_type').val(obj.datas.Type).trigger('change');
            $('#charges').val(obj.datas.Amount);
            $('#range_type').val(obj.datas.Range_Type).trigger('change');
            $('#range_from').val(obj.datas.Range_From);
            $('#range_to').val(obj.datas.Range_To);
           
            
         }
         else{
            alert('Customer Not Found');
            $('#charge_name').val('').trigger('change');
          $('#customer_name').val('');
            $('#customer_name').focus('');
         }
            
        }
        

       }
     });
   }
   else{
    // alert('Charge Details Not Found');
           $('#chrg_id').val('');
           $('#charge_name').val('').trigger('change');
            $('#charge_name').focus();

            $('#charge_type').val('').trigger('change');
            $('#charges').val('');
            $('#range_type').val('').trigger('change');
            $('#range_from').val('');
            $('#range_to').val('');
           // $('#chrg_actions').val('').trigger('change');
            return false;
   }
    }

     
    
    function getCustomerDetails(Name)
    {
    var base_url = '{{url('')}}';
   
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCustomerDetailsData',
       cache: false,
       data: {
           'Name':Name
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
            $('#charge_name').focus();
           
        }
        else{
           
            $('#customer_name').val('');
            $('#customer_name').focus();
            
           
        }

       }
     });
}


function SubmitCustomerMapping()
{
    if($("#cust_map_id").val()==''){
        if($("#customer_name").val()==''){
            alert('Please Selelct Customer Name');
            return false;
        }

        if($("#chrg_id").val()==''){
            alert('Please Selelct Charge Name');
            return false;
        }
    }

    if($('#wef').val()=='')
    {
        alert('Please Enter Wef');
        return false;
    }
    if($('#wef_date').val()=='')
    {
        alert('Please Enter Wef Date');
        return false;
    }
    if($('#charges').val()=='')
    {
        alert('Please Select Charges');
        return false;
    }
    if($('#range_type').val()=='')
    {
        alert('Please Selelct Range Type');
        return false;
    }
    
        if($('#range_from').val()=='')
        {
            alert('Please Selelct Range From');
            return false;
        }
        if($('#range_to').val()=='')
        {
            alert('Please Selelct Range To');
            return false;
        }

        if($('#process_by').val()==2){
            if($('#origin_city').val()=='')
            {
            alert('Please Selelct Origin City');
            return false;
            }

            if($('#destination_city').val()=='')
            {
            alert('Please Selelct Destination City');
            return false;
            }
        }

       var charge_name=  $('#charge_name').val();
        var Charge_Type=  $('#charge_type').val();
        var Charge_Amt=  $('#charges').val();
        var Range_Id=   $('#range_type').val();
        var Range_From=   $('#range_from').val();
        var Range_To=   $('#range_to').val();


    var  origin_city = $("#origin_city").val();
    var destination_city = $("#destination_city").val();

    var cust_id = $('#customer_name').val();
    var chrg_id = $('#chrg_id').val();
    var cust_map_id= $('#cust_map_id').val();
    var wef = $("#wef").val();
    var wef_date=$('#wef_date').val();
    var minimum_amount=$('#minimum_amount').val();
    var process_by=$('#process_by option:selected').val();

    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CustomerChargesMapWithCustomerPost',
       cache: false,
       data: {
           'wef':wef,'wef_date':wef_date,'minimum_amount':minimum_amount,'process_by':process_by,'cust_map_id':cust_map_id,'cust_id':cust_id,'chrg_id':chrg_id,'origin_city':origin_city,
            'destination_city':destination_city,'Range_Id':Range_Id,'Charge_Type':Charge_Type,'Charge_Amt':Charge_Amt,'Range_From':Range_From,'Range_To':Range_To
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        alert(data);
        location.reload();
      
       }
     });

}

function getAllViewData(Id)
{
    var base_url = '{{url('')}}';
   
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCustomerMapWithCustomerData',
       cache: false,
       data: {
           'Id':Id
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
        $('#customer_name').val(obj.datas.Customer_Id).trigger("change");
       // $('#charge_name').val(obj.datas.Charge_Id).trigger("change");
        $('#charge_name').prop("readonly",true);
        $('#charge_type').prop("disabled",true);
        $('#charges').prop("readonly",true);
        $('#range_type').prop("disabled",true);
        $('#range_from').prop("readonly",true);
         $('#range_to').prop("readonly",true);
      $(".btnSubmit").attr("disabled", true);
    $('#wef').prop("readonly",true);
    $('#wef_date').prop("readonly",true);
     $('#minimum_amount').prop("readonly",true);
     $('#process_by').prop("disabled",true);
         $('#wef').val(obj.datas.Date_From);
              $('#wef_date').val(obj.datas.Date_To);
              $('#minimum_amount').val(obj.datas.Min_Amt);
              $('#process_by').val(obj.datas.Process).trigger('change');
                $('#charge_type').val(obj.datas.Charge_Type).trigger('change');
                $('#charges').val(obj.datas.Charge_Amt);
                $('#range_type').val(obj.datas.Range_Id).trigger('change');
                $('#range_from').val(obj.datas.Range_From);
             $('#range_to').val(obj.datas.Range_To);

             if(obj.datas.Origin==2){
                $("#ContainerBox").css("display","none");
                $("#ContainerBoxTwo").css("display","block");
                $('#origin_city').val(obj.datas.Origin).trigger('change');
             }         
             else if(obj.datas.Origin==1){
                $("#ContainerBoxTwo").css("display","none");
                $("#ContainerBox").css("display","block");
             }
             
             if(obj.datas.Destination==2){
                $('#destination_city').val(obj.datas.Destination).trigger('change');
             }
             $('#origin_city').prop("disabled",true);
            $('#destination_city').prop("disabled",true);
           
        }
        

       }
     });
}

function getAllEdit(Id)
{ 
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCustomerMapWithCustomerData',
       cache: false,
       data: {
           'Id':Id
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
             $('#customer_name').val(obj.datas.Customer_Id).trigger("change");
            // $('#charge_name').val(obj.datas.Charge_Id).trigger("change");

            $("#cust_map_id").val(obj.datas.Id);
            $('#customer_name').prop("disabled",true);
            $('#charge_name').prop("disabled",true);
            $('#charge_type').prop("disabled",false);
            $('#charges').prop("readonly",false);
            $('#range_type').prop("disabled",false);
            $('#range_from').prop("readonly",false);
             $('#range_to').prop("readonly",false);
              $(".btnSubmit").attr("disabled", false);
            $('#wef').prop("readonly",false);
            $('#wef_date').prop("readonly",false);
             $('#minimum_amount').prop("readonly",false);
             $('#process_by').prop("disabled",false);
              $('#origin_city').prop("disabled",false);
            $('#destination_city').prop("disabled",false);
              $('#wef').val(obj.datas.Date_From);
              $('#wef_date').val(obj.datas.Date_To);
              $('#minimum_amount').val(obj.datas.Min_Amt);
              $('#process_by').val(obj.datas.Process).trigger('change');
                $('#charge_type').val(obj.datas.Charge_Type).trigger('change');
                $('#charges').val(obj.datas.Charge_Amt);
                $('#range_type').val(obj.datas.Range_Id).trigger('change');
                $('#range_from').val(obj.datas.Range_From);
             $('#range_to').val(obj.datas.Range_To);
             if(obj.datas.Origin==2){
                 $("#ContainerBoxTwo").css("display","block");
                  $("#ContainerBox").css("display","none");
                $('#origin_city').val(obj.datas.Origin).trigger('change');
             }
             else if(obj.datas.Origin==1){
                $("#ContainerBoxTwo").css("display","none");
                $("#ContainerBox").css("display","block");
             }

             
             if(obj.datas.Destination){
                $('#destination_city').val(obj.datas.Destination).trigger('change');
             }
         }
        }
     });
}


function ShowDestSource(LocationValue){
    if($('#charge_name').val()!=""){
    if(LocationValue==2){
        $("#ContainerBox").css("display","none");
        $("#ContainerBoxTwo").css("display","block");
    }
    else if(LocationValue==1){
        $("#ContainerBoxTwo").css("display","none");
        $("#ContainerBox").css("display","block");
    }
    else{
          $("#ContainerBox").css("display","none");
          $("#ContainerBoxTwo").css("display","none");
    }
}
else{
    alert("Please Selelct Charge Name");
     $('#process_by').prop("selected",false);
    $('#charge_name').focus();
}

}

    </script>
             
    