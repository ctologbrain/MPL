@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card customer_special_container">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">

                                        <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="load_type">Load Type:</label>
                                                        <div class="col-6">
                                                        <select name="load_type" tabindex="1" class="form-control load_type" id="load_type" disabled>
                                                           <option value="1">CONSOLE</option>
                                                        </select> 
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="docket_no">Docket No<span
                                                                class="error">*</span></label>
                                                              <div class="col-md-6">
                                                            <input type="text" name="docket_no" tabindex="2"
                                                                class="form-control docket_no" id="docket_no" onchange="getDocketDetails(this.value);">
                                                                <input type="hidden" name="Docket_ID" id="Docket_ID">

                                                              </div>
                                                    </div>
                                                </div>
                                                

                                               
                                                 

                                                
                                        </div>
                                    </div>


                                     <div class="col-6">

                                        <table class="table-respnsive table-bordered right-table">
                                            <tr>
                                                <td class="p-1">Customer Name:</td>
                                                <td class="p-1" id="custName"></td>
                                            </tr>
                                             <tr>
                                                <td class="p-1">Booking Date:</td>
                                                <td class="p-1" id="BookDate"></td>
                                            </tr>
                                             <tr>
                                                <td class="p-1">Weight:</td>
                                                <td class="p-1" id="Weight"></td>
                                            </tr>
                                        </table>



                                    </div>

                                 
                                   
                                 
                                    
                                  


                                  

                                   

                                  
                                   
                                   
                               
                                </div>

                                  

                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>

                 <div class="col-12">

                                         <table class="table-responsive table-bordered bottom-table">
                                                    <thead>
                                                        <tr class="main-title text-dark">
                                                        
                                                            <th class="p-1 text-start">Charge Name</th>
                                                            <th class="p-1 text-end">Amount</th>
                                                            <th class="p-1"></th>
                                                          
                                                           

                                                           

                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                      
                                                        <tr>
                                                            <td class="p-1">
                                                                 <select name="charge_name" tabindex="3" class="form-control charge_name" id="charge_name">
                                                                    <option value="">--Select--</option>
                                                                    @foreach($CustomerOtherCharges as $key)
                                                           <option value="{{$key->Id}}">{{$key->Title}}</option>
                                                           @endforeach
                                                          
                                                        </select> 
                                                                
                                                            </td>
                                                            <td class="p-1">
                                                                <input step="0.1" type="number" name="amount" id="amount" class="form-control amount text-end" tabindex="4">
                                                            </td>

                                                            <td class="p-1 text-start">
                                                                 <input type="button" tabindex="5" value="Save"
                                                    class="btn btn-primary btnSubmit" id="btnSubmit"
                                                    onclick="SaveCustomerDocketCharge();">
                                                      <a href="{{url('CustomerDocketOtherCharges')}}" tabindex="6"
                                                    class="btn btn-primary">Cancel</a>
                                                            </td>
                                                          
                                                        </tr>
                                                  
                                                        
                                                                    
                                                                   
                                                                   
                                                             </tbody>
                                                         
                                                            </table> 
                                    </div>
              
           </div>     
        </div>
    </div>
</form>
</div>

<script>
    $('select').select2();
    
    
    
    function getDocketDetails(Docket)
    {
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getDocketDetailForCharge',
       cache: false,
       data: {
           'Docket':Docket
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
           // alert(obj.datas)
            $('#custName').text(obj.datas.customer_details.CustomerCode+'~'+obj.datas.customer_details.CustomerName);
            $('#BookDate').text(obj.datas.Booking_Date);
            $('#Weight').text(obj.datas.docket_product_details.Charged_Weight);
             $('#Docket_ID').val(obj.datas.id);
        }
        else{
            alert("No Docket Found");
             $('#Docket_ID').val('');
            $('#docket_no').val('');
            $('#docket_no').focus();
            $('#custName').text('');
            $('#BookDate').text('');
            $('#Weight').text('');
           return false;
            
           
        }

       }
     });
}
function SaveCustomerDocketCharge()
{
    if($('#Docket_ID').val()=='')
    {
        alert('Please Enter Docket No.');
        return false;
    }
    if($('#charge_name').val()=='')
    {
        alert('Please Select Charge Name');
        return false;
    }
    if($('#amount').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
   
    var Docket_ID=$('#Docket_ID').val();
    var charge_name=$('#charge_name').val();
    var amount=$('#amount').val();
    
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CustomerDocketOtherChargesData',
       cache: false,
       data: {
           'Docket_ID':Docket_ID,'charge_name':charge_name,'amount':amount
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        alert(data);
        location.reload();
        // const obj = JSON.parse(data);
        // $('.gatepassNo').text(' '+obj.gatepass);
        // $('.gate_pass_number').val(obj.gatepass);
        // $('.id').val(obj.id);
       }
     });

}

    </script>
             
    