@include('layouts.appOne')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">UPLOAD INVOICE</h4>
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
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="customer_name">Customer Name<span class="error">*</span></label>
                                                     <div class="col-md-8">
                                                    <select name="customer_name" class="customer_name form-control" id="customer_name" tabindex="1">
                                                    <option value="">--Select--</option>
                                                    @foreach($Customer as $key)
                                                    <option value="{{$key->id}}">{{$key->CustomerCode}}~ {{$key->CustomerName}}</option>
                                                    @endforeach
                                                    </select>
                                                

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                                <label class="col-md-4 col-form-label" for="invoice_no">Invoice Number<span class="error">*</span></label>
                                                                      <div class="col-md-6">
                                                                   <input type="text" name="invoice_no" class="invoice_no form-control" id="invoice_no" tabindex="2">
                                                                      </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                                <label class="col-md-4 col-form-label" for="bill_date">Bill Submission Date</label>
                                                                      <div class="col-md-3">
                                                                   <input type="text" name="bill_date" class="bill_date form-control dateone" id="bill_date" tabindex="3">

                                                                      </div>
                                                                       <label class="col-md-3 col-form-label" for="bill_date">Bill Submission: </label>
                                                                       <div class="col-md-2">
                                                                       </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6">
                                                <div class="row mt-1">
                                                                <label class="col-md-4 col-form-label" for="select_file">Select File</label>
                                                                      <div class="col-md-5">
                                                                   <input type="file" name="select_file" class="select_file" id="select_file" tabindex="4">
                                                                      </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6 text-end mb-1">
                                             <input onclick="UploadInvoice();" type="button" tabindex="5" value="Save"
                                                class="btn btn-primary btnSubmit" id="btnSubmit"
                                                            onclick="">
                                             <a href="{{url('UploadInvoice')}}" tabindex="6" class="btn btn-primary">Cancel</a>
                                            </div>   
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </form>
</div>
<div class="generator-container allLists mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">SEARCH INVOICE</h4>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    
                                        <div class="row pl-pr mt-1">
                                            <div class="col-6">
                                                <div class="row">
                                                                <label class="col-md-3 col-form-label" for="customer_name">Customer Name</label>
                                                                      <div class="col-md-8">
                                                                      <select name="customer_name" class="customer_name form-control" id="customer" tabindex="7">
                                                    <option value="">--Select--</option>
                                                    @foreach($Customer as $key)
                                                    <option value="{{$key->id}}">{{$key->CustomerCode}}~ {{$key->CustomerName}}</option>
                                                    @endforeach
                                                    </select>
                                                                      </div>
                                                                      
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="invoice_no">Invoice Number</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="invoice_no" class="invoice_no form-control" id="invoice" tabindex="8">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input onclick="getInvoicedetails();" type="button" tabindex="9" value="GO" class="btn btn-primary" id="btnSub" >
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="col-12">
                                                 <div class="table-responsive">
                                                    <table class="table table-bordered table-centered mb-1 mt-1">
                                                        <thead>
                                                            <tr class="main-title text-dark">
                                                                <th class="p-1">SL#</th>
                                                                <th class="p-1">Customer Name</th>
                                                                <th class="p-1">Invoice No</th>
                                                                <th class="p-1">Document</th>
                                                                <th class="p-1">Submission Date</th>
                                                                <th class="p-1">Created By</th>
                                                                <th class="p-1">Created On</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tableBody">
                                                            <tr><td class="text-center p-1" colspan="7">NO RECORD FOUND</td></tr>
                                                        </tbody>
                                                    </table>
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
                   
    </form>
</div>
<!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> -->
<script>
   
    $('select').select2();
    $('.dateone').datepicker({
        dateFormat:"dd-mm-yyyy",
        autoclose:true,
        todayHighlight:true
    });
    // $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    // $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
   
    function getInvoicedetails()
    {
        var base_url = '{{url('')}}';
        var customer= $("#customer").val();
        var invoice= $("#invoice").val();
        if(customer!='' && invoice!=''){
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/UploadInvoiceData',
       cache: false,
       data: {
           'customer':customer ,'invoice':invoice
       },
       success: function(data) {
       
        const obj = JSON.parse(data);
        if(obj.status==1 && obj.result!=''){
            var htmlBody ='';
            var i=0;
            var a=1;
            var file='';
            $.each(obj.result, function(i){
                a=a+i;
                file =obj.result[i].Document;
                htmlBody+='<tr>';
                htmlBody+='<td class="p-1">'+a+'</td>';
                 htmlBody+='<td class="p-1">'+obj.result[i].customer_details.CustomerCode+'~'+obj.result[i].customer_details.CustomerName+'</td>';
                 htmlBody+='<td class="p-1">'+obj.result[i].InvoiceNo+'</td>';
                 htmlBody+='<td class="p-1"><a target="_blank" href="{{url('')}}'+'/'+file+'">View File</a></td>';
                 htmlBody+='<td class="p-1">'+obj.result[i].BillSubmissionDate+'</td>';
                 htmlBody+='<td>'+obj.result[i].user_details.name+'</td>';
                 htmlBody+='<td class="p-1">'+obj.result[i].Created_At+'</td>';
               
                 htmlBody+='</tr>';
            ++i;
            });
            $("#tableBody").html(htmlBody);
        }
        else {
            $("#tableBody").html('<tr><td class="text-center p-1" colspan="7">NO RECORD FOUND</td></tr>');
        }
        
     
       }
     });
    }
    else{
        alert('Please Enter Customer Name and Invoice No.');
    }
    }
   
    
function UploadInvoice()
{
    if($('#customer_name').val()=='')
    {
        alert('Please Enter Customer Name');
        return false;
    }
    if($('#invoice_no').val()=='')
    {
        alert('Please Enter Invoice No');
        return false;
    }
    if($('#bill_date').val()=='')
    {
        alert('Please Enter Bill Date');
        return false;
    }
    if($('#select_file').val()=='')
    {
        alert('Please Choose File');
        return false;
    }
    

    var cust_id =$('#customer_name').val();
    var InvoiceNo =$('#invoice_no').val();
    var BillSubmissionDate =$('#bill_date').val();
    var Document =$('#select_file')[0].files[0];

    var base_url = '{{url('')}}';
    var formdata = new FormData();
     formdata.append('cust_id',cust_id);
    formdata.append('InvoiceNo',InvoiceNo);
    formdata.append('BillSubmissionDate',BillSubmissionDate);
    formdata.append('Document',Document);
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/UploadInvoicePost',
       cache: false,
       processData:false,
       contentType:false,
       data: formdata,
       success: function(data) { 
        // const obj = JSON.parse(data);
        alert(data);
        if(data=='Upload Successfully'){
            $(".btnSubmit").attr("disabled", true);
        location.reload();
        }
       }
     });

}

    </script>
             
    