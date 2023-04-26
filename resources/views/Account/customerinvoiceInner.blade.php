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
                                                     $sumfright=0;
                                                     $sumother=0;
                                                     $sumScst=0;
                                                     $sumCgst=0;
                                                     $sumIgst=0;
                                                     $sumTotal=0;
                                                    ?>
                                                    @foreach($docket as $allDocket)
                                                     
                                                     <?php 
                                                      echo "<pre>";
                                                      print_r($allDocket);
                                                      die;
                                                     
                                                     $i++;
                                                    
                                                     ?>
                                                     <tr>
                                                        <td class="p-1">{{$i}}</td>
                                                        <td class="p-1"><input type="checkbox" name="all" class="docketFirstCheck" value="{{$allDocket['id']}}"/>   </td>
                                                        <td class="p-1">{{$allDocket['Source']}} </td>
                                                        <td class="p-1">{{$allDocket['Booking_Date']}}</td>
                                                        <td class="p-1">{{$allDocket['Dest']}}</td>
                                                        <td class="p-1">{{$allDocket['PTL']}}</td>
                                                        <td class="p-1">{{$allDocket['Docket_No']}}</td>
                                                        <td class="p-1">{{$allDocket['Qty']}}</td>
                                                        <td class="p-1">{{$allDocket['Charged_Weight']}}</td>
                                                        <td class="p-1">@if($allDocket['rate']=='00'){{'ND'}}@else{{$allDocket['rate']}}@endif</td>
                                                        <td class="p-1">{{$allDocket['fright']}}</td>
                                                        <td class="p-1">{{$allDocket['Charge']}}</td>
                                                        <td class="p-1">{{$allDocket['cgst']}}</td>
                                                        <td class="p-1">{{$allDocket['scst']}}</td>
                                                        <td class="p-1">{{$allDocket['igst']}}</td>
                                                        <td class="p-1">{{$allDocket['total']}}</td>
                                                    </tr>
                                                    <?php 
                                                     $sumfright+=$allDocket['fright'];
                                                     $sumother+=$allDocket['Charge'];
                                                     $sumScst+=$allDocket['scst'];
                                                     $sumCgst+=$allDocket['cgst'];
                                                     $sumIgst+=$allDocket['igst'];
                                                     $sumTotal+=$allDocket['total'];
                                                    ?>
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
           var base_url = '{{url('')}}';
           var customer_name = $('#customer_name').val();
           var from_date = $('.from_date').val();
           var to_date = $('.to_date').val();
           var invoice_date = $('#invoice_date').val();
           var InvNo = $('#InvNo').val();
           var remarks = $('#remarks').val();
            $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/SubmitInvoice',
            cache: false,
            data: {
                'customer_name':customer_name,'from_date':from_date,'to_date':to_date,'invoice_date':invoice_date,'InvNo':InvNo,'remarks':remarks
            },
            success: function(data) {
               

            }
            });
 }
 </script>