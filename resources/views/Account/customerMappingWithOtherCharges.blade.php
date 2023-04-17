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
                                                        <input type="text" name="wef" class="form-control wef datetimeone" id="wef" tabindex="3">
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
                                                                class="form-control wef_date datetimeTwo" id="wef_date" onchange="">

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
                                                            <input type="text" name="charges" tabindex="6"
                                                                class="form-control charges" id="charges" onchange="">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                 <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="minimum_amount">Minimum Amount</label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="minimum_amount" tabindex="7"
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
                                                            <input type="text" name="range_from" tabindex="9"
                                                                class="form-control range_from" id="range_from" onchange="">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                  <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-5 col-form-label" for="range_to">Range To <span
                                                                class="error">*</span></label>
                                                              <div class="col-md-7">
                                                            <input type="text" name="range_to" tabindex="10"
                                                                class="form-control range_to" id="range_to" onchange="">

                                                              </div>
                                                    </div>
                                                </div>

                                                 <div class="col-4 mt-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="process_by">Process By</label>
                                                        <div class="col-8">
                                                        <select name="process_by" tabindex="11" class="form-control process_by" id="process_by">
                                                           <option value="1">ALL</option>
                                                          
                                                           <option value="2">ONE TO ONE MAPPING</option>
                                                           <option value="3">MULTIPLE MAPPING</option>
                                                           
                                                        </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-4 mt-1">
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
                                    <div class="col-12">
                                        <table class="table table-bordered table-centered">
                                            <thead>
                                                <tr class="main-title text-dark">
                                                    <th>SL#</th>
                                                    <th>ACTION</th>
                                                    <th>Customer Name</th>
                                                    <th>Charge Name</th>
                                                    <th>W.E.F</th>
                                                    <th>W.E.To</th>
                                                    <th>Charge Type</th>
                                                    <th>Charges</th>
                                                    <th>Minimum Amount</th>
                                                    <th>Rnage Type</th>
                                                    <th>Rnage From</th>
                                                    <th>Rnage To</th>
                                                    <th>Process By</th>
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
                                                if(isset($key->ChargeDataDetails->Type) && $key->ChargeDataDetails->Type==1){
                                                   $type= "Amount";
                                                }
                                                else if(isset($key->ChargeDataDetails->Type) && $key->ChargeDataDetails->Type==2){
                                                    $type= "%";
                                                }
                                                ?>
                                                <tr>
                                                    <td align="left" class="p-1">{{$i}}</td>
                                                    <td align="left" class="p-1"><a href="javascript:void(0);" onclick="getAllViewData('{{$key->Id}}');">View</a>|<a href="javascript:void(0);" onclick="getAllEdit('{{$key->Id}}');">Edit</a> </td>
                                                    <td align="left" class="p-1">{{$key->CustomerDataDetails->CustomerName}}</td>
                                                   
                                                    <td>{{$key->ChargeDataDetails->Title}}</td>
                                                    <td>{{$key->Date_From}}</td>
                                                    <td>{{$key->Date_To}}</td>
                                                    <td>{{$type}}</td>
                                                    <td>{{$key->ChargeDataDetails->Amount}}</td>
                                                    <td>{{$key->Min_Amt}}</td>
                                                    <td>{{$key->ChargeDataDetails->ChargeTypeDeatils->Title}}</td>
                                                    <td>{{$key->ChargeDataDetails->Range_From}}</td>
                                                    <td>{{$key->ChargeDataDetails->Range_To}}</td>
                                                    <td>{{$Process}}</td>
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
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});

    function getOtherChargeDeatails(Name)
    {
        var base_url = '{{url('')}}';
        var BranchId = $('.destination_office').val();
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
           
           var customer_name = $('#customer_name').val();
           if(customer_name!=''){
              $('#chrg_id').val(obj.datas.Id);
           
            $('#charge_name').val(obj.datas.Title);
            $('#charge_type').val(obj.datas.Type).trigger('change');
            $('#charges').val(obj.datas.Amount);
            $('#range_type').val(obj.datas.Range_Type).trigger('change');
            $('#range_from').val(obj.datas.Range_From);
            $('#range_to').val(obj.datas.Range_To);
           // $('#chrg_actions').val(obj.datas.Action).trigger('change');
            
         }
         else{
            alert('Customer Not Found');
            $('#customer_name').val('');
            $('#customer_name').focus('');
         }
            
        }
        else if(obj.status==0){
          alert('Charge Details Not Found');
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
     });
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
           'wef':wef,'wef_date':wef_date,'minimum_amount':minimum_amount,'process_by':process_by,'cust_map_id':cust_map_id,'cust_id':cust_id,'chrg_id':chrg_id
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
                $('#charge_type').val(obj.datas.charge_data_details.Type).trigger('change');
                $('#charges').val(obj.datas.charge_data_details.Amount);
                $('#range_type').val(obj.datas.charge_data_details.Range_Type).trigger('change');
                $('#range_from').val(obj.datas.charge_data_details.Range_From);
             $('#range_to').val(obj.datas.charge_data_details.Range_To);
           
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

            $("#cust_map_id").val(obj.datas.Id);
            $('#charge_name').prop("readonly",false);
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
              $('#wef').val(obj.datas.Date_From);
              $('#wef_date').val(obj.datas.Date_To);
              $('#minimum_amount').val(obj.datas.Min_Amt);
              $('#process_by').val(obj.datas.Process).trigger('change');
                $('#charge_type').val(obj.datas.charge_data_details.Type).trigger('change');
                $('#charges').val(obj.datas.charge_data_details.Amount);
                $('#range_type').val(obj.datas.charge_data_details.Range_Type).trigger('change');
                $('#range_from').val(obj.datas.charge_data_details.Range_From);
             $('#range_to').val(obj.datas.charge_data_details.Range_To);
         }
        }
     });
}


    </script>
             
    