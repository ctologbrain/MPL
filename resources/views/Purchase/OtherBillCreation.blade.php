@include('layouts.appfour')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">VENDOR BILL ENTRY</li>
                    </ol>
                </div>
                <h4 class="page-title">VENDOR BILL ENTRY</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row p-1">
                                        <div class="col-6 border p-1">
                                            <div class="row">
                                                <div class="col-12 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="vendor_name"><b>Vendor Name</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-9">
                                                            <select tabindex="1" class="form-control vendor_name selectBox" name="vendor_name" id="vendor_name" onchange="getVendorDetails(this.value)">
                                                            <option value="">Select</option>
                                                            @foreach($vendor as $vendorDet)
                                                            <option value="{{$vendorDet->id}}">{{$vendorDet->VendorCode}}~{{$vendorDet->VendorName}}</option>
                                                            @endforeach
                                                            </select>
                                                          <input type="hidden" id="Invid" class="Invid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="billNo"><b>Bill No</b><span
                                                        class="error">*</span></label>
                                                        <div class="col-md-5">
                                                         <input type="text" tabindex="2" class="form-control billNo" name="billNo" id="billNo" >
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-12 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="Order_no"><b>Order No</b></label>
                                                        <div class="col-md-5">
                                                            <input type="text" tabindex="3" class="form-control Order_no" name="Order_no" id="Order_no" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="bill_amt"><b>Bill Amount</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="4" class="form-control bill_amt" name="bill_amt" id="bill_amt" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="bill_date"><b>Bill Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="5" class="form-control bill_date datepickerOne" name="bill_date" id="bill_date" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                 <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="bill_date"><b>Due Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="6" class="form-control bill_date datepickerOne" name="bill_due_date" id="bill_due_date">  
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-6 col-form-label" for="from_date"><b>From Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="7" class="form-control from_date datepickerOne" name="from_date" id="from_date" >  
                                                       </div>
                                                    </div>
                                                </div>
                                                 <div class="col-6 m-b-1">
                                                    <div class="row">
                                                        <label class="col-md-4 col-form-label" for="to_date"><b>To Date</b><span
                                                         class="error">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" tabindex="8" class="form-control to_date datepickerOne" name="to_date" id="to_date" >  
                                                       </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-5 border m-left_1">
                                            <table>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Address1:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="addressOne"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Address2:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="addressTwo"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>Pincode:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="Pincode"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>City:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="City"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>State:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="State"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 50px;" class="text-end"><b>GST No:</b></td>
                                                    <td style="min-width: 550px;" class="text-start"><span id="GSTNo"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <div class="row mt-1">
                                                <div class="table-responsive a">
                                                    <table class="table-bordered table-centered" style="width: 100%;">
                                                        <thead>
                                                            <tr class="main-title">
                                                                <th class="p-1 text-center" style="min-width: 150px;">Item Detail<span
                                                                 class="error">*</span></th>
                                                                <th class="p-1 text-center" style="min-width: 50px;">HSN Code</th>
                                                                <th class="p-1 text-center" style="min-width: 50px;">Quantity<span
                                                                 class="error">*</span></th>
                                                                 <th class="p-1 text-center" style="min-width: 50px;">Rate<span
                                                                 class="error">*</span></th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">Taxable Amount</th>
                                                                 <th class="p-1 text-center" style="min-width: 50px;">GST%</th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">GST Amount</th>
                                                                 <th class="p-1 text-center" style="min-width: 100px;">Total Amount</th>
                                                                 <th class="p-1 text-start" style="min-width: 250px;">Add</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="p-1">
                                                                    <input type="text" name="item_detail" class="item_detail form-control" id="item_detail" tabindex="9">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="hsn_code" class="hsn_code form-control" id="hsn_code" tabindex="10">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="quantity" class="quantity form-control" id="quantity" tabindex="11" onchange="claculateAmount()">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="rate" class="rate form-control" id="rate" tabindex="12" onchange="claculateAmount()">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="taxabble_amt" class="taxabble_amt form-control" id="taxabble_amt" tabindex="13" onchange="claculateAmount()" readonly>
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="gst" class="gst form-control" id="gst" tabindex="14" onchange="claculateAmount()">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="gst_amt" class="gst_amt form-control" id="gst_amt" tabindex="15" onchange="claculateAmount()" readonly>
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" name="total_amt" class="total_amt form-control" id="total_amt" tabindex="16" onchange="claculateAmount()" readonly>
                                                                </td>
                                                                <td class="p-1">
                                                                    <div class="col-md-4">
                                                                        <input type="button" name="add" class="form-control btn btn-primary" id="add" tabindex="16" value="Add" onclick="addVendorBill()">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody id="tables">

                                                        </body>
                                                    </table>
                                                    <table class="table-bordered" style="width: 100%;">
                                                           <tr>
                                                            <td colspan="3" class="p-1 sucess" style="width: 70%;"><b><span id="balanceAmount" class="success"></span></b></td>
                                                            <td class="text-end p-1" style="width: 15%;"><b>Sub Total</b></td>
                                                            <td class="p-1 text-start" style="width: 15%;">
                                                            <input type="text" name="sub_total" class="form-control sub_total" id="sub_total" tabindex="17" disabled>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="3" rowspan="4" class="p-1 ">
                                                            <textarea class="form-control bill_remark" placeholder="BILL REAMRKS" rows="7" tabindex="18"></textarea>
                                                           </td>
                                                            <td class="text-end p-1"><b>Discount(-)</b></td>
                                                            <td class="p-1 text-start">
                                                            <input type="text" name="sub_total" class="form-control discount" id="discount" tabindex="19" onchange="claculateDiscount()">
                                                           </td>
                                                         </tr>
                                                         <tr>
                                                           <td class="text-end p-1 d-flex">
                                                            <span><b>TDS(-)</b></span>
                                                            <input type="text" name="sub_total" class="form-control Tds" id="Tds" tabindex="20" onchange="claculateDiscount()"> <span><b>(%)</b></span>
                                                            </td>
                                                            <td class="p-1 text-start">
                                                             <input type="text" name="tds" class="form-control tdsAmount" id="tdsAmount" tabindex="21" disabled onchange="claculateDiscount()">
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                           <td class="text-end p-1">
                                                                <b>Adjustment(-)</b>
                                                          </td>
                                                            <td class="p-1 text-start">
                                                              <input type="text" name="adjustment" class="form-control adjustment" id="adjustment" tabindex="22" onchange="claculateDiscount()">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                         <td class="text-end p-1">
                                                              <b> Net Amount</b>
                                                            </td>
                                                            <td class="p-1 text-start">
                                                            <input type="text" name="net_amt" class="form-control net_amt" id="net_amt" tabindex="23" disabled onchange="claculateDiscount()">
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                        <td class="p-1" style="width: 10%;">
                                                            <input type="button" class="btn btn-primary" value="Cancel" tabindex="24" onclick="cancleBill()">
                                                        </td>
                                                        <td class="p-1 text-end" style="width: 45%;"><b>Attach Invoice Copy</b></td>
                                                        <td class="p-1" style="width: 15%;">
                                                            <input type="file" name="atach_copy" id="atach_copy">
                                                        </td>
                                                        <td colspan="2" class="p-1" style="width: 30%;">
                                                            <input type="button" class="btn btn-primary" value="Save" tabindex="25" onclick="addAndUpdateInvoice()">
                                                        </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                      <div class="row tabels">
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('public/js/custome.js')}}"></script>
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
  function getVendorDetails(VendrId)
  {
     
        var base_url = '{{url('')}}';
        $.ajax({
        type: 'POST',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
        url: base_url + '/GetVendorDetails',
        cache: false,
        data: {
        'VendrId':VendrId
        }, 
        success: function(data) {
        const obj = JSON.parse(data);
        $('#addressOne').text(obj.vendor_details.Address1);
        $('#addressTwo').text(obj.vendor_details.Address2);
        $('#Pincode').text(obj.vendor_details.Pincode);
        $('#City').text(obj.vendor_details.City);
        $('#State').text(obj.vendor_details.State);
        $('#GSTNo').text(obj.Gst);  
        }
    });
  }

    function addVendorBill(){
        var base_url = '{{url('')}}';
           if($("#vendor_name").val()=='')
           {
              alert('Please select vendor');
              return false;
           }
           if($("#billNo").val()=='')
           {
              alert('please enter  bill no');
              return false;
           }
           if($("#Order_no").val()=='')
           {
              alert('please enter  order no');
              return false;
           }
           if($("#bill_amt").val()=='')
           {
              alert('please select  bill amount');
              return false;
           }
          if($("#bill_date").val()=='')
           {
              alert('Please enter bill date');
              return false;
           }
          if($("#bill_due_date").val()=='')
           {
              alert('Please enter bill due date');
              return false;
           }
            if($("#from_date").val()=='')
           {
              alert('Please enter form date');
              return false;
           }
           if($("#to_date").val()=='')
           {
              alert('Please enter to date');
              return false;
           }
           if($("#item_detail").val()=='')
           {
              alert('Please enter item details');
              return false;
           }
           if($("#hsn_code").val()=='')
           {
              alert('Please enter hsn code');
              return false;
           }
           if($("#quantity").val()=='')
           {
              alert('Please enter quantity');
              return false;
           }
           if($("#rate").val()=='')
           {
              alert('Please enter rate');
              return false;
           }
           if($("#taxabble_amt").val()=='')
           {
              alert('Please enter taxabble amt');
              return false;
           }
           if($("#gst").val()=='')
           {
              alert('Please enter gst');
              return false;
           }
           if($("#gst_amt").val()=='')
           {
              alert('Please enter gst amt');
              return false;
           }
           if($("#total_amt").val()=='')
           {
              alert('Please enter total amt');
              return false;
           }
           
           var  Invid = $("#Invid").val();
           var  vendorname = $("#vendor_name").val();
           var billNo  = $("#billNo").val();
           var Order_no  = $("#Order_no").val();
           var bill_amt  = $("#bill_amt").val();
           var bill_date  = $("#bill_date").val();
           var bill_due_date  = $("#bill_due_date").val();
           var from_date  = $("#from_date").val();
           var to_date  = $("#to_date").val();
           var item_detail  = $("#item_detail").val();
           var hsn_code  = $("#hsn_code").val();
           var quantity  = $("#quantity").val();
           var rate  = $("#rate").val();
           var taxabble_amt  = $("#taxabble_amt").val();
           var gst  = $("#gst").val();
           var gst_amt  = $("#gst_amt").val();
           var total_amt  = $("#total_amt").val();
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/SubmitVendorBillEntry',
           cache: false,
           data: {
           'vendorname':vendorname,'billNo':billNo,'Order_no':Order_no,'bill_amt':bill_amt,'bill_date':bill_date,'bill_due_date':bill_due_date,'from_date':from_date,'to_date':to_date,
            'item_detail':item_detail,
            'hsn_code':hsn_code,
            'quantity':quantity,
            'rate':rate,
            'taxabble_amt':taxabble_amt,
            'gst':gst,
            'gst_amt':gst_amt,
            'total_amt':total_amt,
            'Invid':Invid
           }, 
            success: function(data) {
                claculateAmount();
                const obj = JSON.parse(data);
                $('#Invid').val(obj.lastid);
                $('.item_detail').focus();
                $('#tables').html(obj.httml);
                $("#item_detail").val('');
                $('#sub_total').val(obj.totalSum);
                $('#balanceAmount').text("Balance Amount : "+obj.balanceAmount);
                $("#hsn_code").val('');
                $("#quantity").val('');
                $("#rate").val('');
                $("#taxabble_amt").val('');
                $("#gst").val('');
                $("#gst_amt").val('');
                $("#total_amt").val('');
              }
            });
          }

   

    function claculateAmount(){
        if($('.quantity').val()=='')
        {
            var quantity=0;
        }
        else
        {
           var quantity=$('.quantity').val();
        }
        if($('.rate').val()=='')
        {
            var rate=0;
        }
        else
        {
           var rate=$('.rate').val();
        }
        if($('.taxabble_amt').val()=='')
        {
            var taxabble_amt=0;
        }
        else
        {
           var taxabble_amt=$('.taxabble_amt').val();
        }
        var TotalCalAmount=quantity*rate;
         $('.taxabble_amt').val(TotalCalAmount);
        if($('.gst').val() !=''){
         var gst=$('.gst').val();
         var  CalgstAmount=(TotalCalAmount*gst)/100;
         $('.gst_amt').val(CalgstAmount);
         $('.total_amt').val(parseInt(TotalCalAmount)+parseInt(CalgstAmount));
        }
    }
      function DeleteInvoceIane(Id,InvId)
      {
        if (!confirm("Do you want to delete")){
            return false; 
            }
          else
            {
            var bill_amt=$('.bill_amt').val();
            var base_url = '{{url('')}}';
            $.ajax({
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
            url: base_url + '/DeleteLaneForVendorInvoice',
            cache: false,
            data: {
            'id':Id,'InvId':InvId,'bill_amt':bill_amt
            }, 
            success: function(data) {
                const obj = JSON.parse(data);
                $('#Invid').val(obj.lastid);
                $('#tables').html(obj.httml);
                $('#sub_total').val(obj.totalSum);
                $('#balanceAmount').text("Balance Amount : "+obj.balanceAmount);
            }
         });
   
         }
    }
    function claculateDiscount()
    {
       var sub_total=$('.sub_total').val();
       if($('.discount').val() !='')
       {
         var discount=$('.discount').val();
       }
       else
       {
        var discount=0;
       }
       var afterDIscount=sub_total-discount;
       if($('.Tds').val() !='')
       {
        var Tds=$('.Tds').val();
         TdsAmos=(afterDIscount*Tds)/100;
         $('.tdsAmount').val(TdsAmos);
       }
       else
       {
        $('.tdsAmount').val(0);
       }
       if($('.adjustment').val() !='')
       {
           var AdjAmount=$('.adjustment').val();
       }
       else
       {
        var AdjAmount=0; 
       }
       var net_amt=$('.net_amt').val(afterDIscount-TdsAmos-AdjAmount);
      
    }
    function addAndUpdateInvoice()
    {
        if($('.Invid').val()=='')
        {
            alert('Please enter Invoice');
            return false;
        }
        var InvId=$('.Invid').val();
       var sub_total=$('.sub_total').val();
       var discount=$('.discount').val();
       var Tds=$('.Tds').val();
       var tdsAmount=$('.tdsAmount').val();
       var adjustment=$('.adjustment').val();
       var net_amt=$('.net_amt').val();
       var bill_remark=$('.bill_remark').val();
     
       var form = new FormData();
       if ($('#atach_copy')[0].files.length > 0) 
         {
         for (var i = 0; i < $('#atach_copy')[0].files.length; i++)
         form.append('file', $('#atach_copy')[0].files[i]);
         }
        form.append("sub_total",sub_total);
        form.append("InvId",InvId);
        form.append("discount",discount);
        form.append("Tds",Tds);
        form.append("tdsAmount",tdsAmount);
        form.append("adjustment",adjustment);
        form.append("net_amt",net_amt);
        form.append("bill_remark",bill_remark);
       


      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PostInvoiceDetails',
       cache: false,
       processData: false,
       contentType: false,
       data:form,
       success: function(data) {
        alert('Invoice Add Successfully');
        location.reload();
       }
     });
  }
  function cancleBill()
  {
      location.reload();
      return false;
           if (!confirm("Do you want to Cancle this invoice")){
            return false; 
            }
           else
            {
            var billNo=$('.billNo').val();
            var base_url = '{{url('')}}';
            $.ajax({
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
            url: base_url + '/CancleVendorInvoice',
            cache: false,
            data: {
            'billNo':billNo
            }, 
            success: function(data) {
               alert('Invoice Cancle Successfully');
            }
         });
   
         } 
  }  
    
      
      
     

    





</script>