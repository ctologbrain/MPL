<div class="row"> <div class="col-12">
                                             <table class="table-responsive table-bordered customer_invoice">
                                                    <thead>
                                                        <tr class="col-12">
                                                            <th colspan="15" class="p-1">
                                                            <input type="button" tabindex="10" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit">
                                                        </th>
                                                        </tr>
                                                        <tr class="main-title text-dark">
                                                            <th class="p-1">SL#</th>
                                                            <th class="p-1">All <input type="checkbox" name="all" class="checkAll"/></th>
                                                            <th class="p-1">Org</th>
                                                            <th class="p-1">Date</th>
                                                            <th class="p-1">Dest</th>
                                                            <th class="p-1">Product</th>
                                                            <th class="p-1">Docket No</th>
                                                            <th class="p-1">Pcs</th>
                                                            <th class="p-1">Weight</th>
                                                            <th class="p-1">Rate</th>
                                                            <th class="p-1">Fright</th>
                                                            <th class="p-1">OTH Chrg</th>
                                                            <th class="p-1">CGST</th>
                                                            <th class="p-1">SGST</th>
                                                            <th class="p-1">IGST</th>
                                                            <th class="p-1">Total</th>
                                                        </tr>
                                                   </thead> 
                                                    <tbody>
                                                    <?php
                                                     $i=0; 
                                                     $j=0;
                                                     $sumfright=0;
                                                     $sumother=0;
                                                     $sumScst=0;
                                                     $sumCgst=0;
                                                     $sumIgst=0;
                                                     $sumTotal=0;
                                                    ?>
                                                    @foreach($docket as $allDocket)
                                                     <?php $j++ ?>
                                                    
                                                     <tr>
                                                        <td class="p-1">{{$j}}</td>
                                                        <td class="p-1"><input type="checkbox" name="all" class="docketFirstCheck" id="docketFirstCheck{{$i}}"  value="{{$allDocket['id']}}"/>   </td>
                                                        <td class="p-1">{{$allDocket['Source']}} <input type="hidden" name="SourceId" id="SourceId" class="SourceId{{$i}}" value="{{$allDocket['SourceId']}}"></td>
                                                        <td class="p-1">{{$allDocket['Booking_Date']}}<input type="hidden" name="BokkingDate" id="BokkingDate" class="BokkingDate{{$i}}" value="{{$allDocket['Booking_Date']}}"></td>
                                                        <td class="p-1">{{$allDocket['Dest']}}<input type="hidden" name="DestId" id="DestId" class="DestId{{$i}}" value="{{$allDocket['DestId']}}"></td>
                                                        <td class="p-1">{{$allDocket['PTL']}}<input type="hidden" name="Type" id="Type" class="Type{{$i}}" value="{{$allDocket['PTL']}}"></td>
                                                        <td class="p-1">{{$allDocket['Docket_No']}}<input type="hidden" name="Docket_No" id="Docket_No{{$i}}" class="Docket_No{{$i}}" value="{{$allDocket['Docket_No']}}"></td>
                                                        <td class="p-1">{{$allDocket['Qty']}}<input type="hidden" name="Qty" id="Qty" class="Qty{{$i}}" value="{{$allDocket['Qty']}}"></td>
                                                        <td class="p-1">{{$allDocket['Charged_Weight']}}<input type="hidden" name="Charged_Weight" class="Charged_Weight{{$i}}" id="Charged_Weight" value="{{$allDocket['Qty']}}"></td>
                                                        <td class="p-1">@if($allDocket['rate']=='00'){{'ND'}}<input type="hidden" name="rate" class="rate{{$i}}" id="rate" value="0">@else{{$allDocket['rate']}}<input type="hidden" name="rate" id="rate" class="rate{{$i}}" value="{{$allDocket['rate']}}">@endif</td>
                                                        <td class="p-1">{{$allDocket['fright']}}<input type="hidden" name="fright" id="fright" class="fright{{$i}}" value="{{$allDocket['fright']}}"></td>
                                                        <td class="p-1">{{$allDocket['Charge']}}<input type="hidden" name="Charge" id="Charge" class="Charge{{$i}}" value="{{$allDocket['Charge']}}"></td>
                                                        <td class="p-1">{{$allDocket['cgst']}}<input type="hidden" name="cgst" id="cgst" class="cgst{{$i}}" value="{{$allDocket['cgst']}}"></td>
                                                        <td class="p-1">{{$allDocket['scst']}}<input type="hidden" name="scst" id="scst" class="scst{{$i}}" value="{{$allDocket['scst']}}"></td>
                                                        <td class="p-1">{{$allDocket['igst']}}<input type="hidden" name="igst" id="igst" class="igst{{$i}}" value="{{$allDocket['igst']}}"></td>
                                                        <td class="p-1">{{$allDocket['total']}}<input type="hidden" name="total" id="total" class="total{{$i}}" value="{{$allDocket['total']}}"></td>
                                                    </tr>
                                                    <?php 
                                                     $sumfright+=$allDocket['fright'];
                                                     $sumother+=$allDocket['Charge'];
                                                     $sumScst+=$allDocket['scst'];
                                                     $sumCgst+=$allDocket['cgst'];
                                                     $sumIgst+=$allDocket['igst'];
                                                     $sumTotal+=$allDocket['total'];
                                                    ?>
                                                     <?php  
                                                     
                                                     $i++; ?>
                                                    @endforeach
                                                   
                                                    
                                                </tbody>
                                              </table> 
                                        </div>
                                        </div>
                                        <div class="p-1">
                                    <div class="row">
                                       <div class="col-12 col-md-8">
                                           <div class="row">
                                               <label class="col-md-2 col-form-label" for="invoice_date">Invoice Date</label>
                                               <div class="col-5">
                                                    <input type="text" class="form-control invoice_date datepickerOne" id="invoice_date" name="invoice_date" tabindex="14">
                                               </div>
                                               <label class="col-md-5 col-form-label"><span style="font-weight: 700;"><span style="color: #C00;">Next Invoice Number:</span> MPL/23-24/18</span><input type="hidden" name="InvNo" id="InvNo" value="{{'MPL/23-24/18'}}"></label>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-2 col-form-label" for="remarks">Remarks</label>
                                               <div class="col-7">
                                                    <textarea class="form-control remarks" name="remrks" id="remarks" name="remarks" tabindex="15"></textarea>
                                               </div>
                                           </div>
                                            <div class="row">
                                               <label class="col-md-12 col-form-label">Note: <span style="color: #C00;">After Process, All Waybill are locked. To Unlock AWB Click Reset. </span></label>
                                               
                                               
                                           </div>
                                            <div class="row">
                                               <label class="col-md-2 col-form-label" for="invoice_no">Invoice Number</label>
                                               <div class="col-3">
                                                    <input type="text" class="form-control invoice_no" id="invoice_no" name="invoice_no" tabindex="16">
                                               </div>
                                               <div class="col-7 right-btn">
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="17">Print Invoice</a>
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="18">Cancel Invoice</a>
                                                      <a href="#" class="back-color p-1 text-dark" tabindex="19">Download Annexture</a>
                                               </div>
                                               
                                           </div>
                                       </div>
                                        <div class="col-12 col-md-4 text-end">
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="ttl_fgrt_chrg">Total Freigt Charge:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumfright}}" class="form-control ttl_fgrt_chrg" id="ttl_fgrt_chrg" name="ttl_fgrt_chrg" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                              <label class="col-md-5 col-form-label" for="ttl_other_chrg">Total Other Charge:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumother}}" class="form-control ttl_other_chrg" id="ttl_other_chrg" name="ttl_other_chrg" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_cgst">Total CGST:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumCgst}}" class="form-control total_cgst" id="total_cgst" name="total_cgst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_sgst">Total SGST:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumScst}}" class="form-control total_sgst" id="total_sgst" name="total_sgst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_igst">Total IGST:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumIgst}}" class="form-control total_igst" id="total_igst" name="total_igst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_bill_amt">Total Bill Amount:</label>
                                               <div class="col-7">
                                                    <input type="text" value="{{$sumTotal}}" class="form-control total_bill_amt" id="total_bill_amt" name="total_bill_amt" disabled>
                                               </div>
                                               
                                           </div>
                                           <div class="row">
                                                <label class="col-md-4 col-form-label"></label>
                                               <div class="col-8">
                                                   <input type="button" class="form-control back-color"  value="Generate & Print Invoice" tabindex="20" onclick="genrateInvoice()">
                                               </div>
                                               
                                           </div>
<script>
     $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es' ,
        autoclose:true,
        todayHighlight: true,
    });
  $(".checkAll").click(function () {
     $('.docketFirstCheck').not(this).prop('checked', this.checked);
 });
 function genrateInvoice()
 {
           var formData = new FormData();
           var base_url = '{{url('')}}';
           var customer_name = $('#customer_name').val();
           var from_date = $('.from_date').val();
           var to_date = $('.to_date').val();
           var invoice_date = $('#invoice_date').val();
           var InvNo = $('#InvNo').val();
           var remarks = $('#remarks').val();
           var docketFirstCheck = [];
           var SourceId =[];
           var BokkingDate =[];
           var DestId =[];
           var Type =[];
           var Docket_No =[];
           var Qty =[];
           var Charged_Weight =[];
           var rate =[];
           var fright =[];
           var Charge =[];
           var cgst =[];
           var scst =[];
           var igst =[];
           var total =[];

            var a=1;
            for(var i=0;  i < $(".docketFirstCheck").length; i++){
                var a=a+i;
                formData.append("Multi["+i+"][docketFirstCheck]",$("#docketFirstCheck"+i).val());
                formData.append("Multi["+i+"][Source]",$(".SourceId"+i).val());
                formData.append("Multi["+i+"][Docket_No]",$(".Docket_No"+i).val());
                formData.append("Multi["+i+"][BokkingDate]",$(".BokkingDate"+i).val());
                formData.append("Multi["+i+"][DestId]",$(".DestId"+i).val());
                formData.append("Multi["+i+"][Type]",$(".Type"+i).val());
                formData.append("Multi["+i+"][Qty]",$(".Qty"+i).val());
                formData.append("Multi["+i+"][Charged_Weight]",$(".Charged_Weight"+i).val());
                formData.append("Multi["+i+"][rate]",$(".rate"+i).val());
                formData.append("Multi["+i+"][fright]",$(".fright"+i).val());
                formData.append("Multi["+i+"][Charge]",$(".Charge"+i).val());
                formData.append("Multi["+i+"][cgst]",$(".cgst"+i).val());
                formData.append("Multi["+i+"][scst]",$(".scst"+i).val());
                formData.append("Multi["+i+"][igst]",$(".igst"+i).val());
                formData.append("Multi["+i+"][total]",$(".total"+i).val());
            }
            formData.append("customer_name",customer_name);
            formData.append("from_date",from_date);
            formData.append("to_date",to_date);
            formData.append("invoice_date",invoice_date);
            formData.append("InvNo",InvNo);
            formData.append("remarks",remarks);
            $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/SubmitInvoice',
            data: formData,
            cache: false,
            contentType:false,
            processData:false,
            success: function(data) {
              alert('Invoice Genrated sucessfully');
              location.reload(); 

            }
            });
 }
 </script>