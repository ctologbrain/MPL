@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                 
                </div>
                <h4 class="page-title">SUPPLEMENTARY INVOICE</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    
    
    <form method="POST" action="" id="subForm">
        @csrf
        <div class="row pl-pr mt-1">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="bdr-btm mb-1">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="invoice_no">Invoice Number<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="invoice_no" tabindex="1"
                                                        class="form-control invoice_no" id="invoice_no" onchange="GetInvDetails(this.value)">
                                                        <input type="hidden" class="oldInvId">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">

                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="invoice_date">Invoice Date</label>
                                                    <div class="col-md-8"><input type="hidden" class="OldInvDate1">
                                                    <span id="oldInvDate"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-6">

                                                <div class="row mt-1">

                                                    <label class="col-md-4 col-form-label" for="invoice_date">Invoice Date</label>
                                                    <div class="col-md-4">
                                                     <input type="text" name="invoice_date" tabindex="2"
                                                     class="form-control invoice_date datepickerOne" id="invoice_date">
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="col-6">

                                            <div class="row mt-1">

                                                <label class="col-md-4 col-form-label" for="invoice_date"><span style="color: #C00;">Next Invoice Number</span></label>
                                                <div class="col-md-8">
                                                  
                                                    <input type="hidden" class="NewInvoiceNo">
                                                    <span class="newInv1"></span>
                                                 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row mt-1">

                                                <label class="col-md-4 col-form-label" for="billing_office">Billing Office</label>
                                                <div class="col-md-8">
                                                 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row mt-1">

                                                <label class="col-md-4 col-form-label" for="customer_name">Customer Name</label>
                                                <div class="col-md-8">
                                                    <input type="hidden" id="custmoerid" class="custmoerid">

                                                    <span id="CustomerId"></span>
                                                 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="address_1">Address 1</label>
                                           <div class="col-md-6">
                                            <input type="hidden" class="addressId">
                                            
                                            <span class="customer Address1"></span>
                                           </div>
                                           
                                       </div>
                                   </div>
                                   <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="address_2">Address 2</label>
                                           <div class="col-md-6">
                                           
                                           <span class="customer Address2"></span>
                                          </div>
                                           
                                       </div>
                                   </div>
                                   <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="pincode">Pincode</label>
                                           <div class="col-md-6">
                                           <span class="customer pinCode"></span>
                                        </div>
                                           
                                       </div>
                                   </div>
                                   <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="city">City</label>
                                           <div class="col-md-6">
                                           
                                           <span class="customer City"></span>
                                           </div>
                                           
                                       </div>
                                   </div>
                                   <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="state">State</label>
                                           <div class="col-md-6">
                                           <span class="customer State"></span>

                                           </div>
                                           
                                       </div>
                                   </div>

                                   <div class="col-6">
                                       <div class="row">
                                           <label class="col-md-4 col-form-label" for="gst_no">GST No</label>
                                           <div class="col-md-6">
                                           
                                           <span class="customer GSTNO"></span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <table class="table-responsive table-bordered">
            <thead>
                
             <tr class="main-title text-dark text-center">
                 <th colspan="9" class="p-1">
                   Charge Details  
               </th>
           </tr>
           <tr class="main-title text-dark">
            <th class="p-1" style="min-width:250px;">Charge Name<span class="error">*</span></th>
            <th class="p-1" style="min-width:100px;">Docket No<span class="error">*</span></th>
            <th class="p-1" style="min-width:50px;">Amount<span class="error">*</span></th>
            <th class="p-1" style="min-width:50px;">GST(%)</th>
            <th class="p-1" style="min-width:100px;">CGST Amt</th>
            <th class="p-1" style="min-width:100px;">SGST Amt</th>
            <th class="p-1" style="min-width:100px;">IGST Amt</th>
            <th class="p-1" style="min-width:100px;">Total Amt</th>
            <th class="p-1" style="min-width:100px;"></th>
        </tr>
    </thead> 
    <tbody>
        <tr>
            <td class="p-1"> 
               
             <select name="charge_name" class="form-control charge_name" id="charge_name" tabindex="3">
                 <option value="">select</option>
                 @foreach($otherCharge as $toher)
                 <option value="{{$toher->Id}}">{{$toher->Title}}</option>
                 @endforeach
             </select>
            </td>
            <td class="p-1">
            <input type="text" name="awb_no" class="form-control awb_no" id="awb_no" tabindex="4" onchange="checkDocketInInvoice(this.value)">
          </td>
           <td class="p-1">
            <input type="text" name="amnt" class="form-control amnt" id="amnt" tabindex="5">
        </td>
        <td class="p-1">
            <input type="text" name="gst" class="form-control gst" id="gst" tabindex="6"  onchange="calculateGst(this.value)">
        </td>
        <td class="p-1">
            <input type="text" name="cgst" class="form-control cgst" id="cgst" disabled>
        </td>
        <td class="p-1">
           <input type="text" name="sgst" class="form-control sgst" id="sgst" disabled>
       </td>
       <td class="p-1">
           <input type="text" name="igst" class="form-control igst" id="igst" disabled>
       </td>
       <td class="p-1">
           <input type="text" name="total_amnt" class="form-control total_amnt" id="total_amnt" disabled>
       </td>
       <td class="p-1">
           <input type="button" name="add" class="form-control add btn btn-primary" id="add" value="Add" onclick="AddInvoice()">
       </td>
   </tr>
   <tr>
     <td class="p-1 text-start" colspan="4">
        <div class="row">
          <label class="col-md-2 col-form-label" for="remark">Remarks</label>
          <div class="col-md-6">
             <textarea class="remark form-control" name="remark" id="remark" tabindex="7"></textarea>
         </div>
         <div class="col-md-2">
            <a href="{{url('SupplementaryBill')}}" class="btn btn-primary"  tabindex="8">Reset</a>
        </div>
    </div>
</td>
<td class="p-1" colspan="5">
    <div class="row float-end">
      <label class="col-md-4 col-form-label" for="invoice_no">Invoice Number</label>
      <div class="col-md-5">
         <input type="text" class="invoice_no form-control" name="invoice_no" id="invoice_no" tabindex="9">
     </div>
     <div class="col-md-2 text-start">
        <input type="button" class="btn btn-primary" value="Print" tabindex="10">
    </div>
</div>
</td>
</tr>
</tbody>
</table> 
<div class="invTable"></div>


</form>
</div>
<script>
 
    $('select').select2();
    $('.datepickerOne').datepicker({
        format: 'dd-mm-yyyy',
        language: 'es' ,
        autoclose:true,
        todayHighlight: true,
    });
  
function GetInvDetails(InvNo)
{
    var base_url = '{{url('')}}';
     $.ajax({
     type: 'POST',
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
     },
     url: base_url + '/CheckSupplyMantryInvoice',
     cache: false,
     data: {
     'InvNo':InvNo
   },
 success: function(data) {
     if(data=='false')
     {
         alert('No Invoice Found');
         return false;
     }
     else{
     const obj = JSON.parse(data);
       $('.OldInvDate1').val(obj.InvDate);
       $('#oldInvDate').text(obj.InvDate);
       $('.NewInvoiceNo').val(obj.InvNo+'/1');
       $('.newInv1').text(obj.InvNo+'/1');
       $('.custmoerid').val(obj.Cust_Id);
       $('#CustomerId').text(obj.customer_details.CustomerCode+' ~ '+obj.customer_details.CustomerName);
       $('.addressId').val(obj.customer_address_details.id);
       $('.Address1').text(obj.customer_address_details.Address1);
       $('.Address2').text(obj.customer_address_details.Address2);
       $('.pinCode').text(obj.customer_address_details.Pincode);
       $('.City').text(obj.customer_address_details.City);
       $('.State').text(obj.customer_address_details.State);
       $('.GSTNO').text(obj.customer_details.GSTNo);
       $('.oldInvId').val(obj.id);
     }
  
    
    
}
});
}
function calculateGst(gstper)
{
    
    var base_url = '{{url('')}}';
    var oldInvId = $('.oldInvId').val();
    var amnt = $('.amnt').val();
    var awb_no = $('.awb_no').val();
    $.ajax({
     type: 'POST',
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
   },
   url: base_url + '/CheckDocketInInvoice',
   cache: false,
   data: {
     'Docket':awb_no,'oldInvId':oldInvId
 },
 success: function(data) {
   const obj = JSON.parse(data);
    if(obj.city_details.state_details.name=='Delhi')
    {
    var cgst=0;
    var sgst=0;
    var igst=(amnt*gstper)/100;
    }
    else
    {
       
    var gsthalf=gstper/2;
    var cgst=(amnt*gsthalf)/100;
    var sgst=(amnt*gsthalf)/100;
    var igst=0; 
    }
    var total=parseFloat(amnt)+parseFloat(cgst)+parseFloat(sgst)+parseFloat(igst);
    $('.cgst').val(cgst);
    $('.sgst').val(sgst);
    $('.igst').val(igst);
    $('.total_amnt').val(total);
  
}
});
}
function checkDocketInInvoice(Docket)
{
    var base_url = '{{url('')}}';
    var oldInvId = $('.oldInvId').val();
    $.ajax({
     type: 'POST',
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
   },
   url: base_url + '/CheckDocketInInvoice',
   cache: false,
   data: {
     'Docket':Docket,'oldInvId':oldInvId
 },
 success: function(data) {
  if(data=='false')
  {
    alert('DOcket Not Found');
    $('#awb_no').val('');
    $('#awb_no').focus();
    return false;

  } 


}
});
}
function AddInvoice()
{
    if($('#invoice_no').val()=='')
    {
        alert('Please Enter Invoice');
        return false;
    }
    if($('.NewInvoiceNo').val()=='')
    {
        alert('Please Enter New Invoice');
        return false;
    }
    if($('.oldInvId').val()=='')
    {
        alert('Please Enter Old Invoice Id');
        return false;
    }
    if($('#invoice_date').val()=='')
    {
        alert('Please Enter Date');
        return false;
    }
    if($('.custmoerid').val()=='')
    {
        alert('Please Enter Customer Id');
        return false;
    } if($('.addressId').val()=='')
    {
        alert('Please Enter Address Id');
        return false;
    }
    if($('#charge_name').val()=='')
    {
        alert('Please Selelct Charge Name');
        return false;
    }
    if($('#awb_no').val()=='')
    {
        alert('Please Enter Docket No');
        return false;
    }
    if($('#amnt').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
    if($('#gst').val()=='')
    {
        alert('Please Enter Gst');
        return false;
    }
    var invoice_no=$('#invoice_no').val()
    var NewInvoiceNo=$('.NewInvoiceNo').val()
    var oldInvId=$('.oldInvId').val()
    var invoice_date=$('#invoice_date').val()
    var custmoerid=$('.custmoerid').val()
    var addressId=$('.addressId').val()
    var charge_name=$('#charge_name').val()
    var awb_no=$('#awb_no').val()
    var amnt=$('#amnt').val()
    var gst=$('#gst').val()
    var cgst=$('#cgst').val()
    var sgst=$('#sgst').val()
    var igst=$('#igst').val()
    var total_amnt=$('#total_amnt').val()
    var base_url = '{{url('')}}';
    $.ajax({
     type: 'POST',
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
   },
   url: base_url + '/submitSupplementryInvoice',
   cache: false,
   data: {
     'invoice_no':invoice_no,'NewInvoiceNo':NewInvoiceNo,'oldInvId':oldInvId,'invoice_date':invoice_date,'custmoerid':custmoerid,'addressId':addressId,'charge_name':charge_name,'awb_no':awb_no,'amnt':amnt,'gst':gst,'sgst':sgst,'igst':igst,'total_amnt':total_amnt
 },
 success: function(data) {
    $('.invTable').html(data);
    $('#awb_no').val('');
    $('#amnt').val('');
    $('#gst').val('');
    $('#cgst').val('');
    $('#sgst').val('');
    $('#igst').val('');
    $('#total_amnt').val('');
    $('#charge_name').val('').trigger('change');
    $('#charge_name').focus();
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

