<div class="row">
                                             <table class="table-responsive table-bordered customer_invoice">
                                                    <thead>
                                                        <tr class="col-12">
                                                            <th colspan="15" class="p-1">
                                                            <input type="button" tabindex="10" value="Export" class="btn btn-primary btnSubmit" id="btnSubmit">
                                                        </th>
                                                        </tr>
                                                        <tr class="main-title text-dark">
                                                            <th class="p-1">SL#</th>
                                                            <th class="p-1">All <input type="checkbox" name="all"/></th>
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
                                                      <?php $i=0;?>
                                                        @foreach($docket as $allDocket)
                                                        <?php 
                                                        
                                                        $getRtyreType=DB::table('Cust_Tariff_Master')
                                                        ->where('Cust_Tariff_Master.Customer_Id',$allDocket->Cust_Id)
                                                        ->select('Cust_Tariff_Master.*')
                                                        ->orderBy('Id','DESC')
                                                        ->first();
                                                        
                                                        if(isset($getRtyreType->Id))
                                                        {
                                                           
                                                          $traffCode=$getRtyreType->Tarrif_Code; 
                                                          $SourceCity=$allDocket->PincodeDetails->city; 
                                                          $DestCity=$allDocket->DestPincodeDetails->city; 
                                                          $SourceState=$allDocket->PincodeDetails->State; 
                                                          $DestState=$allDocket->DestPincodeDetails->State; 
                                                          $SourcePinCode=$allDocket->PincodeDetails->id; 
                                                          $DestPinCode=$allDocket->DestPincodeDetails->id; 
                                                          $zoneSource=$allDocket->PincodeDetails->CityDetails->ZoneName;
                                                          $zoneDest=$allDocket->DestPincodeDetails->CityDetails->ZoneName;
                                                          $getTaranRate=DB::table('Cust_Tariff_Trans')->where('Tariff_M_ID',$getRtyreType->Id)
                                                          ->Where(function ($query) use($traffCode,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest){ 
                                                            if($traffCode==1)
                                                            {
                                                               
                                                              $query->where('Cust_Tariff_Trans.Origin',$SourceCity); 
                                                              $query->where('Cust_Tariff_Trans.Dest',$DestCity);  
                                                            }
                                                            if($traffCode==2)
                                                            {
                                                              
                                                               
                                                                $query->where('Cust_Tariff_Trans.Origin',$SourceState); 
                                                                $query->where('Cust_Tariff_Trans.Dest',$DestState);  
                                                            }
                                                            if($traffCode==3)
                                                            {
                                                              
                                                                $query->where('Cust_Tariff_Trans.Origin',$zoneSource); 
                                                                $query->where('Cust_Tariff_Trans.Dest',$zoneDest);  
                                                            }
                                                            if($traffCode==4)
                                                            {
                                                              
                                                                $query->where('Cust_Tariff_Trans.Origin',$SourcePinCode); 
                                                                $query->where('Cust_Tariff_Trans.Dest',$DestPinCode);  
                                                            }
                                                            })  
                                                            ->orderBy('Cust_Tariff_Trans.Id','DESC')
                                                            ->first(); 
                                                            $weight=$allDocket->DocketProductDetails->Charged_Weight;
                                                           if(isset($getTaranRate->Id)){
                                                           $getRate=DB::table('Cust_Tarrif_Slabs')->where('Tarrif_Id',$getTaranRate->Id)->first();  
                                                            if(isset($getRate->Rate))
                                                             {
                                                              $rate=$getRate->Rate;
                                                             }
                                                             else
                                                             {
                                                              $rate=0; 
                                                             }
                                                           }
                                                           else{
                                                            $rate=0; 
                                                            }
                                                          }
                                                         else{
                                                            $rate=0;    
                                                        }
                                                       
                                                        ?>
                                                       <?php $i++;?>
                                                      
                                                     <tr>
                                                        <td class="p-1">{{$i}}</td>
                                                        <td class="p-1"><input type="checkbox" name="all"/>   </td>
                                                        <td class="p-1">{{$allDocket->PincodeDetails->CityDetails->Code}}({{$allDocket->PincodeDetails->StateDetails->name}}) </td>
                                                        <td class="p-1">{{date("Y-m-d", strtotime($allDocket->Booking_Date))}}</td>
                                                        <td class="p-1">{{$allDocket->DestPincodeDetails->CityDetails->Code}}({{$allDocket->DestPincodeDetails  ->StateDetails->name}})</td>
                                                        <td class="p-1">PTL</td>
                                                        <td class="p-1">{{$allDocket->Docket_No}}</td>
                                                        <td class="p-1">{{$allDocket->DocketProductDetails->Qty}}</td>
                                                        <td class="p-1">{{$allDocket->DocketProductDetails->Charged_Weight}}</td>
                                                        <td class="p-1">{{$rate}}</td>
                                                        <td class="p-1">{{$allDocket->DocketProductDetails->Charged_Weight * $rate}}</td>
                                                        <td class="p-1">6980.0</td>
                                                        <td class="p-1">0.00</td>
                                                        <td class="p-1">418.82</td>
                                                        <td class="p-1">0.0</td>
                                                        <td class="p-1">7818.0</td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                    
                                                </tbody>
                                              </table> 
                                        </div>
                                        <div class="p-1">
                                    <div class="row">
                                       <div class="col-12 col-md-8">
                                           <div class="row">
                                               <label class="col-md-2 col-form-label" for="invoice_date">Invoice Date</label>
                                               <div class="col-5">
                                                    <input type="text" class="form-control invoice_date datetimeone" id="invoice_date" name="invoice_date" tabindex="14">
                                               </div>
                                               <label class="col-md-5 col-form-label"><span style="font-weight: 700;"><span style="color: #C00;">Next Invoice Number:</span> MPL/23-24/18</span></label>
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
                                                    <input type="text" class="form-control ttl_fgrt_chrg" id="ttl_fgrt_chrg" name="ttl_fgrt_chrg" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                              <label class="col-md-5 col-form-label" for="ttl_other_chrg">Total Other Charge:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control ttl_other_chrg" id="ttl_other_chrg" name="ttl_other_chrg" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_cgst">Total CGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_cgst" id="total_cgst" name="total_cgst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_sgst">Total SGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_sgst" id="total_sgst" name="total_sgst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_igst">Total IGST:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_igst" id="total_igst" name="total_igst" disabled>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-md-5 col-form-label" for="total_bill_amt">Total Bill Amount:</label>
                                               <div class="col-7">
                                                    <input type="text" class="form-control total_bill_amt" id="total_bill_amt" name="total_bill_amt" disabled>
                                               </div>
                                               
                                           </div>