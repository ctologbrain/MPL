@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">DEBIT NOTE</h4>
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
                                        <div class="col-4">
                                            <div class="row">
                                                            <label class="col-md-4 col-form-label" for="customer_name">Customer Name</label>
                                                                  <div class="col-md-8">
                                                              
                                                                    <select name="customer_name" tabindex="1"
                                                                    class="form-control customer_name" id="customer_name" onchange="getCustomers(this.value);">
                                                                    <option value="">--Select--</option>
                                                                    @foreach($Customer as $key)
                                                                    <option value="{{$key->id}}"> {{$key->CustomerCode}}~ {{$key->CustomerName}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                            <label class="col-md-3 col-form-label" for="debit_note_no">Debit Note No</label>
                                                                  <div class="col-md-3">
                                                                <input readonly type="text" name="debit_note_no" tabindex="2"
                                                                    class="form-control debit_note_no" id="debit_note_no" onchange="">
                                                                    <input type="hidden" name="CustId" tabindex="2"
                                                                    class="form-control CustId" id="CustId" disabled="disabled">
                                                                    <input type="hidden" name="Addressid" tabindex="2"
                                                                    class="form-control Addressid" id="Addressid" disabled="disabled">
                                                                    <input type="hidden" name="Invid" tabindex="2"
                                                                    class="form-control Invid" id="Invid" disabled="disabled">

                                                                  </div>
                                                                  <label class="col-md-3 col-form-label" for="debit_note_date">Debit Note Date</label>
                                                                  <div class="col-md-3">
                                                                <input type="text" name="debit_note_date" tabindex="3"
                                                                    class="form-control debit_note_date datetimeone" id="debit_note_date" onchange="">
                                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                            <label class="col-md-4 col-form-label" for="login_name">Address 1</label>
                                                                  <div class="col-md-8">
                                                               <textarea class="form-control address_1" name="address_1" id="address_1" tabindex="4">
                                                               </textarea>
                                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                            <label class="col-md-3 col-form-label" for="login_name">Address 2</label>
                                                                  <div class="col-md-9">
                                                               <textarea class="form-control address_2" name="address_2" id="address_2" tabindex="5">
                                                               </textarea>
                                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-1">
                                            <div class="row">
                                                            <label class="col-md-4 col-form-label" for="pincode">Pincode</label>
                                                                  <div class="col-md-8">
                                                               <input type="text" class="form-control pincode" name="pincode" id="pincode">
                                                                  </div>
                                                                  
                                            </div>
                                        </div>
                                        <div class="col-6 mt-1">
                                            <div class="row">
                                                            <label class="col-md-3 col-form-label" for="city">City</label>
                                                                  <div class="col-md-9">
                                                               <input type="text" class="form-control city" name="city" id="city" tabindex="6">
                                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                            <label class="col-md-4 col-form-label" for="state">State</label>
                                                                  <div class="col-md-8">
                                                               <input type="text" class="form-control state gstPer" name="state" id="state" tabindex="7"> 
                                                                  </div>
                                                                  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                            <label class="col-md-3 col-form-label" for="gst_no">GST No</label>
                                                                  <div class="col-md-5">
                                                               <input type="text" class="form-control gst_no" name="gst_no" id="gst_no" tabindex="8">

                                                                  </div>
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
                    <tr class="main-title text-dark">
                        <th colspan="9" class="p-1">
                            Charge Detail
                        </th>
                    </tr>
                    <tr class="main-title text-dark">
                        <th class="p-1" style="min-width: 190px;">Charge Name</th>
                        <th class="p-1" style="min-width: 150px;">Reference No</th>
                        <th class="p-1" style="min-width: 100px;">Amount</th>
                        <th class="p-1" style="min-width: 50px;">GST(%)</th>
                        <th class="p-1" style="min-width:50px;">CGST Amt</th>
                        <th class="p-1" style="min-width: 50px;">SGST Amt</th>
                        <th class="p-1" style="min-width: 50px;">IGST Amt</th>
                        <th class="p-1" style="min-width: 50px;">Total</th>
                        <th class="p-1" style="min-width: 80px;"> </th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td class="p-1"> 
                           
                            <select name="charge_name" tabindex="9"
                                class="form-control charge_name" id="charge_name">
                                <option value="">--Select--</option>
                                @foreach($Charge as $key)
                                <option value="{{$key->Id}}"> {{$key->Title}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="p-1">
                            <input onchange="getinvoiceDetails(this.value);" type="text" name="refernce_no" id="refernce_no" class="refernce_no form-control" tabindex="10">

                            <input  type="hidden" name="cgst" id="cgst" class="cgst form-control" >
                            <input  type="hidden" name="sgst" id="sgst" class="sgst form-control" >
                            <input  type="hidden" name="igst" id="igst" class="igst form-control" >
                            <input  type="hidden" name="total" id="total" class="total form-control">

                            <input type="hidden" name="invoice_date" class="invoice_date form-control" >
                            <input type="hidden" name="invoice_amnt" class="invoice_amnt form-control">
                         </td>
                        <td class="p-1">
                            <input onchange="calculateCustCredit(this.value);" type="text" name="invoice_amnt_credit" id="invoice_amnt_credit" class="invoice_amnt_credit form-control" tabindex="11">
                        </td>
                        <td class="p-1">
                            <input type="text" name="gst" id="gst" class="gst form-control" tabindex="12">
                        </td>
                        <td class="p-1">
                            <input readonly type="text" name="Deb_cgst" id="Deb_cgst" class="cgst_credit form-control" tabindex="13">
                        </td>
                        <td class="p-1">
                            <input readonly type="text" name="Deb_sgst" id="Deb_sgst" class="sgst_credit form-control" tabindex="14">
                        </td>
                        <td class="p-1">
                            <input readonly type="text" name="Deb_igst" id="Deb_igst" class="igst_credit form-control" tabindex="15">
                        </td>
                         <td class="p-1">
                            <input readonly type="text" name="Deb_total" id="Deb_total" class="total_Credit form-control" tabindex="16">
                        </td>
                        <td class="p-1">
                               <input onclick="SubmitDebitNode();" type="button" tabindex="4" value="Add"
                            class="btn btn-primary btnSubmit" id="btnSubmit"
                            onclick="" tabindex="17">
                        </td>      
                    </tr>
                    <tr>
                        <td class="p-1" colspan="5">
                            <div class="row">

                      
                                <label class="col-md-2 col-form-label" for="gst_no">Remarks</label>
                                      <div class="col-md-6">
                                   <textarea class="form-control remark" name="remark" id="remark" tabindex="18"> 
                                       
                                   </textarea>

                                      </div>
                                      
                            </div>
                        </td>
                        <td class="p-1" colspan="4">
                            <div class="col-12 col-md-12">
                            <div class="row float-end">

                            
                                <label class="col-md-5 col-form-label" for="gst_no">Debit Note Number</label>
                                      <div class="col-md-4">
                                  <input type="text" name="debit_note_no" class="debit_note_no form-control" id="debit_note_no" tabindex="19">

                                      </div>
                                      <div class="col-md-2">
                                          <input  type="button" tabindex="4" value="Print"
                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                        onclick="" tabindex="20">
                                      </div>
                                      
                            </div>
                        </div>
                        </td>
                    </tr>                
                 </tbody>
            </table> 
        </div>
    </div>     
</form>
</div>
<!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->
<script>
   
    $('select').select2();
    $('.datetimeone').datepicker({dateFormat: 'dd-mm-yyyy',todayHighlight:true,AutoClose:true });
  
    function calculateCustCredit(Amount)
    {
        var state=$('.state').val();gstPer
        var gstPer=$('.gstPer').val();
        if(gstPer=='Delhi')
        {
            var gstPerNew=(Amount*gstPer)/100;
            var cgst=0;
            var sgst=0;
            var igst=gstPerNew;
            var total=parseFloat(cgst)+parseFloat(sgst)+parseFloat(igst)+parseFloat(Amount);
        }
        else{
            var gstP=gstPer/2;
            var gstPerNew=(Amount*gstP)/100;
            var cgst=gstPerNew;
            var sgst=gstPerNew;
            var igst=0;
            var total=parseFloat(cgst)+parseFloat(sgst)+parseFloat(igst)+parseFloat(Amount);
        }
        $('.cgst_credit').val(cgst)
        $('.sgst_credit').val(sgst)
        $('.igst_credit').val(igst)
        $('.total_Credit').val(total)
        
      
    }
    
   
    

function SubmitDebitNode()
{
    if($('#customer_name').val()=='')
    {
        alert('Please Select Customer');
        return false;
    }
    if($('#credit_note_date').val()=='')
    {
        alert('Please Enter Date');
        return false;
    }
    if($('#CustId').val()=='')
    {
        alert('Please select Customer id');
        return false;
    }
    if($('#Addressid').val()=='')
    {
        alert('Please select Address Id');
        return false;
    }
    if($('.charge_name').val()==''){
        alert('Please select Charge Name');
        return false;
    }

    if($('#refernce_no').val()=='')
    {
        alert('Please Enter Referance No');
        return false;
    }
    if($('#Invid').val()=='')
    {
        alert('Please Enter  Inv Id');
        return false;
    }
    if($('.invoice_amnt').val()=='')
    {
        alert('Please Enter Invoice Amount');
        return false;
    }
    if($('.total').val()=='')
    {
        alert('Please Enter Total');
        return false;
    }
    if($('#invoice_amnt_credit').val()=='')
    {
        alert('Please Enter Credit Amount');
        return false;
    }
    if($('.total_Credit').val()=='')
    {
        alert('Please Enter Total Credit');
        return false;
    }
    

    var customer_name=$('#customer_name').val();
    var debit_note_date=$('#debit_note_date').val();
    var CustId=$('#CustId').val();
    var Addressid=$('#Addressid').val();
    var Invid=$('#Invid').val();
    var invoice_amnt=$('.invoice_amnt').val();
    var cgst=$('.cgst').val();
    var sgst=$('.sgst').val();
    var igst=$('.igst').val();
    var total=$('.total').val();
    var remark=$('.remark').val();
    var invoice_amnt_credit=$('.invoice_amnt_credit').val();
    var cgst_credit=$('#Deb_cgst').val();
    var sgst_credit=$('#Deb_sgst').val();
    var igst_credit=$('#Deb_igst').val();
    var total_Credit=$('#Deb_total').val();
    var invoice_date=$('.invoice_date').val();
    var Charge = $('.charge_name').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitDebitNode',
       cache: false,
       data: {
           'customer_name':customer_name,'debit_note_date':debit_note_date,'CustId':CustId,'Addressid':Addressid,'Invid':Invid,'invoice_amnt':invoice_amnt,'cgst':cgst,'sgst':sgst,'igst':igst,'total':total,'remark':remark,'invoice_amnt_credit':invoice_amnt_credit,'cgst_credit':cgst_credit,'sgst_credit':sgst_credit,'igst_credit':igst_credit,'total_Credit':total_Credit,'invoice_date':invoice_date,'Charge':Charge
       },
       success: function(data) {
        alert('Debit Note Add Sucessfully');
        location.reload();
       }
     });

}

    function getCustomers(Customer)
    {
    var base_url = '{{url('')}}';
     $.ajax({
     type: 'POST',
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
     },
     url: base_url + '/GetAllCustDetails',
     cache: false,
     data: {
     'Customer':Customer
   },
   success: function(data) {
     if(data=='false')
     {
         alert('No Invoice Found');
         return false;
     }
     else{
     const obj = JSON.parse(data);
       $('.address_1').val(obj.cust_address.Address1);
       $('.address_2').text(obj.cust_address.Address2);
       $('.pincode').val(obj.cust_address.Pincode);
       $('.city').val(obj.cust_address.City);
       $('.state').val(obj.cust_address.State);
       $('.gst_no').val(obj.GSTNo);
       $('.gstPer').val(obj.payment_details.Road)
       $('.CustId').val(obj.id)
       $('.Addressid').val(obj.cust_address.id)
      
     
       
     }
     
}
});
    
     
    }

    function getinvoiceDetails(InvNo)
    {
    var CustId = $('.customer_name').val();
     var base_url = '{{url('')}}';
     $.ajax({
     type: 'POST',
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
     },
     url: base_url + '/GetAllInvoiceDetails',
     cache: false,
     data: {
     'InvNo':InvNo,'CustId':CustId
    },
      success: function(data) {
     if(data=='false')
     {
         alert('No Invoice Found');
         $(".refernce_no").val('');
         $('.refernce_no').focus();
         return false;
     }
     else{
        const obj = JSON.parse(data);
        $('.Invid').val(obj.id);
        $('.invoice_amnt').val(obj.sum_sum_fright);
        $('.invoice_date').val(obj.InvDate)
        $('.cgst').val(obj.sum_sum_cgst)
        $('.sgst').val(obj.sum_sum_scst)
        $('.igst').val(obj.sum_sum_igst)
        $('.total').val(obj.sum_sum_total)
      }
      
}
});
    } 
    </script>
             
    