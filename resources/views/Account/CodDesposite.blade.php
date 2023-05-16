@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">COD DEPOSIT</h4>
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
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <select name="customer_name" tabindex="1" class="form-control customer_name" id="customer_name" onchange="">
                                                        <option value="">--SELECT--</option>
                                                         @foreach($Cust as $customer)  
                                                         <option value="{{$customer->id}}">{{$customer->CustomerCode}} ~ {{$customer->CustomerName}}</option> 
                                                         @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="payment_date">Payment Date</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="payment_date" tabindex="2" class="form-control payment_date datepickerOne" id="payment_dates" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="payment_mode">Payment Mode</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control selectBox payment_mode" id="payment_mode" name="payment_mode" tabindex="3">
                                                            <option value="1">--SELECT--</option>
                                                            <option value="1">BANK</option>
                                                            <option value="1">CASH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                               <div class="row">
                                                    <label class="col-md-4 col-form-label" for="amount">Amount</label>
                                                    <div class="col-md-6">
                                                        <input type="number" name="amount" tabindex="4" class="form-control amount" id="amount" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="bank_name">Bank Name</label>
                                                    <div class="col-md-8">
                                                         <select name="bank_name" tabindex="5" class="form-control bank_name" id="bank_name" >
                                                              <option value="">--SELECT</option>
                                                              @foreach($bank as $bankDetails)
                                                                <option value="{{$bankDetails->id}}">{{$bankDetails->BankName}}</option>  
                                                               @endforeach
                                                          </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="utr_no">Cheque/UTR No</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="utr_no" tabindex="6" class="form-control utr_no" id="utr_no" onchange="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                               <div class="row">
                                                    <label class="col-md-4 col-form-label" for="utr_date">Cheque/UTR Dates</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="utr_date" tabindex="7" class="form-control utr_date datepickerOne" id="utr_date">
                                                        <input type="hidden" id="CodAmount" class="codAmount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="remarks">Remarks</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control remarks" id="remarks" name="remarks" tabindex="8"></textarea>
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
                            <th class="p-1">Docket Number<span class="error">*</span></th>
                            <th class="p-1">Deposit Amount<span class="error">*</span></th>
                            <th class="p-1">COD Amount</th>
                            <th class="p-1">Deposited Amount</th>
                            <th class="p-1">Balance Amount</th>
                            <th class="p-1"></th>
                        </tr>          
                    </thead> 
                    <tbody>
                        <tr>
                            <td class="p-1">
                                <input type="text" name="docket_no" tabindex="9" class="form-control docket_no" id="docket_no" onchange="getDocketDetailsCodDepoite(this.value)">
                            </td>
                            <td class="p-1">
                                <input type="number" name="deposit_amount" tabindex="10" class="form-control deposit_amount" id="deposit_amount" >
                            </td>
                            <td class="p-1"><span id="codAmountShow"></span><input type="hidden" id="codAmountoo" class="codAmountoo"></td>
                            <td class="p-1"><span id="DepositedAmountShow"></span><input type="hidden" id="DepositedAmount" class="DepositedAmount"></td>
                            <td class="p-1"><span id="BalanceAmountShow"></span><input type="hidden" id="BalanceAmount" class="BalanceAmount"></td>
                            <td class="p-1">
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <input type="button" tabindex="4" value="Add" class="btn btn-primary btnSubmit" id="btnSubmit"
                                            onclick="addData()">
                                        <a href="" tabindex="5" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                           <td class="p-1" colspan="6"> 
                            <div class="row mt-1">
                                    <div class="col-md-2">
                                        <input type="button" tabindex="4" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit"
                                            onclick="addCodTransfer()">
                                        <a href="" tabindex="5" class="btn btn-primary">Reset All</a>
                                    </div>
                                    <div class="col-md-2 green-color fw-bold">
                                        Total Deposit Amount:
                                    </div>
                                     <div class="col-md-2 buee-color fw-bold">
                                        Balance Amount:
                                    </div>
                                </div>
                           </td>
                        </tr>
                    </tbody>
                </table>    
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
    
    function getDocketDetailsCodDepoite(docket)
    {
        if($('#customer_name').val()=='')
        {
           alert('Please Select Customer');
           $('#docket_no').val(''); 
           $('#docket_no').focus(); 
           $('.codAmount').val('');
           return false;
        }
        var base_url = '{{url('')}}';
        var customer_name = $('#customer_name').val();
        var amount = $('#amount').val();
        $.ajax({
        type: 'POST',
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketForCod',
       cache: false,
       data: {
           'docket':docket,'customer_name':customer_name
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message);
            $('#docket_no').val(''); 
            $('.codAmount').val('');
            $('#docket_no').focus(); 
            return false;

        }
        else{
            $('.codAmount').val(obj.CodAmount);
          }
     
       }
     });
    }
    function addData()
    {
       
          var codAmount=$('.codAmount').val();
         if($('.deposit_amount').val()=='')
         {
             alert('Please Enter Deposite Amount');
             return false;
         }
          var deposit_amount=$('.deposit_amount').val();
          $('#codAmountShow').text(parseFloat(codAmount).toFixed(2));
          $('.codAmountoo').val(codAmount);
          $('#DepositedAmountShow').text(parseFloat(deposit_amount).toFixed(2));
          $('.DepositedAmount').val(deposit_amount);
          var balanceAmount=codAmount-deposit_amount
          if(parseFloat(balanceAmount) < parseFloat(0))
          {
            alert('Please check amount');
            return false;  
          }
          $('#BalanceAmountShow').text(parseFloat(balanceAmount).toFixed(2));
          $('.BalanceAmount').val(balanceAmount);
        
    }
   
function addCodTransfer()
{
    if($('#customer_name').val()=='')
    {
        alert('Please Select Customer Name');
        return false;
    }
    if($('#payment_date').val()=='')
    {
        alert('Please Enter Payment Date');
        return false;
    }
    if($('#payment_mode').val()=='')
    {
        alert('Please Enter Paymant Mode');
        return false;
    }
    if($('#amount').val()=='')
    {
        alert('Please Enter Amount');
        return false;
    }
    if($('#bank_name').val()=='')
    {
        alert('Please Selelct Bank Name');
        return false;
    }
    if($('#utr_no').val()=='')
    {
        alert('Please Enter Cheque/UTR No');
        return false;
    }
    if($('#utr_date').val()=='')
    {
        alert('Please Enter Cheque/UTR Dates');
        return false;
    }
    
   
    var customer_name=$('#customer_name').val();
    var payment_date=$('#payment_dates').val();
    var payment_mode=$('#payment_mode').val();
    var amount=$('#amount').val();
    var bank_name=$('#bank_name').val();
    var utr_no=$('#utr_no').val();
    var utr_date=$('#utr_date').val();
    var remarks=$('#remarks').val();
    var docket_no=$('#docket_no').val();
    var deposit_amount=$('#deposit_amount').val();
    var codAmountoo=$('#codAmountoo').val();
    var DepositedAmount=$('#DepositedAmount').val();
    var BalanceAmount=$('#BalanceAmount').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitCodTranfer',
       cache: false,
       data: {
           'customer_name':customer_name,'payment_date':payment_date,'payment_mode':payment_mode,'amount':amount,'bank_name':bank_name,'utr_no':utr_no,'utr_date':utr_date,'remarks':remarks,'docket_no':docket_no,'docket_no':docket_no,'deposit_amount':deposit_amount,'codAmountoo':codAmountoo,'BalanceAmount':BalanceAmount
       },
       success: function(data) {
         $(".btnSubmit").attr("disabled", true);
         location.reload();
       
       }
     });

}

    </script>
             
    