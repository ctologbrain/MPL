@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">CREDIT NOTE</h4>
                 <div class="text-start fw-bold blue_color">
                        FIELDS WITH (*) MARK ARE MANDATORY.
              </div>
            </div>
        </div>
    </div>
   
     
<form>
@csrf
    <div class="row">
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
                                                class="form-control customer_name" id="customer_name" onchange="getCustomerDetails(this.value)">
                                                        <option value="">select customer</option>
                                                        @foreach($customer as $cust)
                                                        <option value="{{$cust->id}}">{{$cust->CustomerCode}}~{{$cust->CustomerName}}</option>
                                                        @endforeach
                                                    </select>
                                           
                                               </div>
                                             </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-3 col-form-label" for="credit_note_no">Credit Note No</label>
                                                                  <div class="col-md-3">
                                                                <input type="text" name="credit_note_no" tabindex="2"
                                                                    class="form-control credit_note_no" id="credit_note_no" disabled="disabled">
                                                                    <input type="hidden" name="CustId" tabindex="2"
                                                                    class="form-control CustId" id="CustId" disabled="disabled">
                                                                    <input type="hidden" name="Addressid" tabindex="2"
                                                                    class="form-control Addressid" id="Addressid" disabled="disabled">
                                                                    <input type="hidden" name="Invid" tabindex="2"
                                                                    class="form-control Invid" id="Invid" disabled="disabled">
                                                                  </div>
                                                                  <label class="col-md-3 col-form-label" for="credit_note_date">Credit Note Date</label>
                                                                  <div class="col-md-3">
                                                                <input type="text" name="credit_note_date" tabindex="3"
                                                                    class="form-control credit_note_date datepickerOne" id="credit_note_date" onchange="">

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
                                                               <input type="hidden" class="form-control gstPer" name="gstPer" id="gstPer">    
                                                            

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
                                                               <input type="text" class="form-control state" name="state" id="state" tabindex="7"> 
                                                                   
                                                            

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


                                        <table class="table-responsive table-bordered credit_table">
                                                <thead>
                                                    
                                                   
                                                    <tr class="main-title text-dark text-center">
                                                        
                                                        <th class="p-1" style="min-width: 400px;" colspan="3">Invoice Details</th>
                                                        <th class="p-1" style="min-width: 400px;" colspan="4">Credit Note Details</th>

                                                    </tr>
                                       
                                               </thead> 
                                             <tbody>
                                             

                                               <tr>
                                                <td class="p-1">
                                                    Against Invoice
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="against_invoice" class="against_invoice form-control" tabindex="9" onchange="getinvoiceDetails(this.value)">
                                                         </div>
                                                
                                                         <label class="col-md-3">Invoice Date</label>
                                                        <div class="col-md-3">
                                                        <input type="text" name="invoice_date" class="invoice_date form-control" disabled="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1">
                                                </td>
                                                <td class="p-1" colspan="4"></td>
                                               </tr>
                                               <tr>
                                                <td class="p-1">
                                                    Invoice Amount
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="invoice_amnt" class="invoice_amnt form-control">
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                    Credit Amount
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <input type="text" name="invoice_amnt" class="invoice_amnt_credit form-control" onchange="calculateCustCredit(this.value)">
                                                </td>
                                               </tr>


                                               <tr>
                                                <td class="p-1">
                                                    CGST
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="cgst" class="cgst form-control" tabindex="9" disabled>
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                        
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                    CGST
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <input type="text" name="cgst" class="cgst_credit form-control" tabindex="9" disabled>
                                                </td>
                                               </tr>
                                               <tr>
                                                <td class="p-1">
                                                    SGST
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="sgst" class="sgst form-control" disabled>
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                    SGST
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <input type="text" name="sgst_credit" class="sgst_credit form-control" disabled>
                                                </td>
                                               </tr>

                                               <tr>
                                                <td class="p-1">
                                                    IGST
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="igst" class="igst form-control" disabled>
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                    IGST
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <input type="text" name="igst_credit" class="igst_credit form-control" disabled>
                                                </td>
                                               </tr>

                                               <tr>
                                                <td class="p-1">
                                                    Total
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <input type="text" name="total" class="total form-control" disabled>
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                    Total
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <input type="text" name="total_Credit" class="total_Credit form-control" disabled>
                                                </td>
                                               </tr>

                                               <tr>
                                                <td class="p-1">
                                                    
                                                </td>
                                                <td class="p-1">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            
                                                         </div>
                                                
                                                         <label class="col-md-3"></label>
                                                        <div class="col-md-3">
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-1 main-title text-dark">
                                                   Remarks
                                                </td>
                                                <td class="p-1" colspan="4">
                                                    <textarea class="form-control remark" name="remark"></textarea>
                                                </td>
                                               </tr>

                                               <tr>
                                                <td colspan="2" class="p-1 text-center">
                                                   <a href="javascript:void(0);" tabindex="15" class="btn btn-primary" onclick="AddCreditNode();">Generate Credit Note</a>
                                                </td>
                                               
                                                <td colspan="5">

                                                    <div class="col-12 col-md-12">
                                                        <div class="row text-end">

                                                        </form>
                                                            <label class="col-md-5 col-form-label text-end" for="gst_no">Credit Note Number</label>
                                                            <form mothod="get" action="{{url('printCreditNode')}}">    
                                                            <div class="col-md-4">
                                                               <input type="text" name="credit_note_no_print" class="credit_note_no_print form-control" id="credit_note_no" tabindex="19">

                                                                  </div>
                                                                  <div class="col-md-2">
                                                                      <input type="submit" tabindex="4" value="Print"
                                                                  class="btn btn-primary btnSubmit" id="btnSubmit"
                                                                   tabindex="20" require> 
                                                                  </div>
                                                            </form>
                                                                  
                                                        </div>
                                                    </div>
                                                 </td>
                                               </tr>
                                               <tr>
                                                <td colspan="7" class="p-1 main-title text-dark text-start fw-bold">
                                                    Cancel Credit Note
                                                </td>
                                               </tr>
                                               <tr>
                                                <td colspan="7" class="p-1">
                                                   <div class="col-12 col-md-10">
                                                        <div class="row text-end">

                                                       
                                                            <label class="col-md-2 col-form-label text-end" for="gst_no">Credit Note Number</label>
                                                                  <div class="col-md-2">
                                                              <input type="text" name="credit_note_no_print" class="credit_note_no_cancel form-control" id="credit_note_no_print" tabindex="19">

                                                                  </div>
                                                                  <label class="col-md-2 col-form-label text-end" for="gst_no">Cancel Remarks</label>
                                                                   <div class="col-md-3">
                                                              <input type="text" name="cancel_remark can_remark" class="cancel_remark form-control" id="cancel_remark" tabindex="19">

                                                                  </div>
                                                                  <div class="col-md-3">
                                                                      <input type="button" tabindex="4" value="Cancel Credit Note"
                                                        class="btn btn-primary btnSubmit credit_note_no" id="btnSubmit"
                                                        onclick="cancelCreditNode()" tabindex="20">
                                                                  </div>
                                                                  
                                                        </div>
                                                    </div>
                                                </td>
                                               </tr>
                                               
                                               
                                              
                                            </tbody>
                                          </table> 

                                      
                                         

                                        
                            

</div>

<script>
     $('.datepickerOne').datepicker({
        format: 'dd-mm-yyyy',
        language: 'es' ,
        autoclose:true,
        todayHighlight: true,
    });
   $('select').select2();
    function getCustomerDetails(custid)
    {
        var base_url = '{{url('')}}';
     $.ajax({
     type: 'POST',
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
     },
     url: base_url + '/GetCustomerDetsilsCredit',
     cache: false,
     data: {
     'custid':custid
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
     url: base_url + '/CheckInvoiceCreditNode',
     cache: false,
     data: {
     'InvNo':InvNo,'CustId':CustId
    },
      success: function(data) {
     if(data=='false')
     {
         alert('No Invoice Found');
         $(".against_invoice").val('');
         $('.against_invoice').focus();
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
   
function AddCreditNode()
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
    if($('#against_invoice').val()=='')
    {
        alert('Please Enter Invoice');
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
    var credit_note_date=$('#credit_note_date').val();
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
    var cgst_credit=$('.cgst_credit').val();
    var sgst_credit=$('.sgst_credit').val();
    var igst_credit=$('.igst_credit').val();
    var total_Credit=$('.total_Credit').val();
    var invoice_date=$('.invoice_date').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitCreditNode',
       cache: false,
       data: {
           'customer_name':customer_name,'credit_note_date':credit_note_date,'CustId':CustId,'Addressid':Addressid,'Invid':Invid,'invoice_amnt':invoice_amnt,'cgst':cgst,'sgst':sgst,'igst':igst,'total':total,'remark':remark,'invoice_amnt_credit':invoice_amnt_credit,'cgst_credit':cgst_credit,'sgst_credit':sgst_credit,'igst_credit':igst_credit,'total_Credit':total_Credit,'invoice_date':invoice_date
       },
       success: function(data) {
        alert('Credit Note Add Sucessfully');
        location.reload();
       }
     });

}

function cancelCreditNode()
{
    if($('.credit_note_no_cancel').val()=='')
    {
       alert('Please Enter Credit Note');
       return false; 
    }
    if($('.cancel_remark').val()=='')
    {
       alert('Please Enter Remark');
       return false; 
    }
    var credit_note_no_cancel=$('.credit_note_no_cancel').val();
    var cancel_remark=$('.cancel_remark').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CancelCreditNode',
       cache: false,
       data: {
           'credit_note_no_cancel':credit_note_no_cancel,'cancel_remark':cancel_remark
       },
       success: function(data) {
        alert('Credit Note Cancel Sucessfully');
        location.reload();
       }
     });
   
    
  
  
}
function PrintCreditNode()
{
    alert(1);
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
             
