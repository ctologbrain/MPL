<div class="col-12">
<h5 style="color: #C00;">Total Outstanding:</h5>
</div>
<div class="col-12 main-title text-center text-center fw-bold">
<table class="table-responsive table-bordered customer_invoice">
                                                    <thead>
                                                      
                                                        <tr class="main-title text-dark">
                                                            <th class="p-1">SL#</th>
                                                            <th class="p-1">Action </th>
                                                            <th class="p-1">Invoice No</th>
                                                            <th class="p-1">Invoice Date</th>
                                                            <th class="p-1">Overdue Days</th>
                                                            <th class="p-1">Fright</th>
                                                            <th class="p-1">Tax Amount</th>
                                                            <th class="p-1">Bill Amount</th>
                                                            <th class="p-1">Paid Amount</th>
                                                            <th class="p-1">Less TDS</th>
                                                            <th class="p-1">Net Payable</th>
                                                            <th class="p-1">Adjust Amount</th>
                                                            <!-- <th class="p-1">Check AMM</th> -->
                                                            <th class="p-1">Outstang Amount</th>
                                                            
                                                        </tr>
                                                   </thead> 
                                                    <tbody>
                                                    <?php
                                                     $i=0; 
                                                     $j=0;
                                                     $sumCgst=$amount;
                                                     $sumoFAdj=0;
                                                     $sumofOut=0;
                                                      ?>
                                                    @foreach($CustInv as $inv)
                                                    
                                                    <?php $i++;
                                                    
                                                      $earlier = new DateTime($inv->InvDate);
                                                      $later = new DateTime(date('Y-m-d'));
                                                      $abs_diff = $later->diff($earlier)->format("%a"); //3
                                                    ?>
                                                    <tr>
                                                     <td>{{$i}}</td>
                                                     <td><input class="checkCheckBox{{$i}} checkbbbbb" onclick="checkCheckBox('{{$inv->id}}','{{$sumCgst}}','{{$i}}','{{$inv->TotalAmount}}','{{$inv->TotalFright}}','{{$tds}}')" type="checkbox" @if($sumCgst > 0){{'checked'}}@endif value="{{$inv->id}}"></td>
                                                     <td>{{$inv->InvNo}}</td>
                                                     <td>{{$inv->InvDate}}</td>
                                                     <td>{{$abs_diff}}</td>
                                                     <td>{{$inv->TotalFright}}</td>
                                                     <td>{{$inv->TotalScst+$inv->TotalCgst+$inv->TotalIgst}}}</td>
                                                     <td>{{$inv->TotalAmount}}</td>
                                                     <td>0</td>
                                                     <td>
                                                         <?php if($apply_tds=='on'){
                                                             $totalTds=($inv->TotalFright*$tds)/100;
                                                         } else{
                                                            $totalTds=0;
                                                         }?>
                                                         <input type="text" class="form-control lessTds{{$i}}" value="@if($sumCgst > 0){{$totalTds}}@else{{'0'}}@endif"></td>
                                                     <td><span id="NetPayle{{$i}}">@if($sumCgst > 0){{$inv->TotalAmount-$totalTds}}@else{{$inv->TotalAmount}}@endif</span><input Type="text" class="NetPayleClass{{$i}}" value="@if($sumCgst > 0){{$inv->TotalAmount-$totalTds}}@else{{$inv->TotalAmount}}@endif"> <?php $netPay=$inv->TotalAmount-$totalTds; ?></td>
                                                     <?php  $adjAmount=($sumCgst-$netPay);
                                                     ?>
                                                     <td>
                                                         <?php 
                                                           if($sumCgst >=$netPay)
                                                           {
                                                              $ppp=$netPay;   
                                                           }
                                                           else{
                                                            $ppp=$sumCgst;  
                                                           }
                                                         ?>
                                                         <span id="adjAmiuntId{{$i}}">{{$ppp}}</span>
                                                         <input tyep="text" class="adjamount{{$i}} TotolAdj" value="{{$ppp}}">
                                                     </td>
                                                     <?php
                                                     if($sumCgst > 0)
                                                        {
                                                            $totaloutStand=$netPay-$ppp;
                                                        
                                                        }else{
                                                            $totaloutStand=$inv->TotalAmount;
                                                        }
                                                     ?>
                                                     <td ><span id="outstandingAmountId{{$i}}">{{$totaloutStand}}</span><input type="text" class="OutStandingAmount{{$i}}" value="{{$totaloutStand}}"></td>
                                                        

                                                   
                                                    </tr>
                                                    <?php 
                                                     if($adjAmount >=0){
                                                    $sumCgst=abs(-$adjAmount);
                                                      }
                                                      else{
                                                        $sumCgst=0; 
                                                      }
                                                      $sumoFAdj+=$ppp;
                                                      $sumofOut+=$totaloutStand;
                                                     ?>
                                                    @endforeach
                                                  
                                                    
                                                </tbody>
                                              </table> 
</div>
<div class="col-12">
<div class="row">
<div class="col-8 mt-1">
<textarea class="form-control remark" id="remark" name="remark" placeholder="Remarks" tabindex="14"></textarea>
</div>
<div class="col-4 mt-1">
<div class="row">
<label class="col-md-6 col-form-label" for="recieved_amnt">Recieved Amount</label>
<div class="col-md-6">
<input type="text" name="recieved_amnt" class="recieved_amnt form-control" id="recieved_amnt" value="{{$amount}}" disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="adjusted_amnt">Adjusted Amount</label>
<div class="col-md-6">
<input type="text" name="adjusted_amnt" class="adjusted_amnt form-control" value="{{$sumoFAdj}}" id="adjusted_amnts"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="outstanding_amnt">Outstanding Amount</label>
<div class="col-md-6">
<input type="text" name="outstanding_amnt" class="outstanding_amnt form-control" value="{{$sumofOut}}" id="outstanding_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="outstanding_amnt"></label>
<div class="col-md-6 text-end">
<input type="button" tabindex="15" value="Save"
class="btn btn-primary btnSubmit" id="btnSubmit"
onclick="">
</div>
</div>
</div>
</div>
</div>
<script>
    function checkCheckBox(invId,Amount,inc,billAmount,fright,tds)
    {
       
        var RecAmount='{{$amount}}';
        var ckecdLendth=$('.checkbbbbb:checked').length;
        alert(ckecdLendth); 
        var CustTarrifQty =0;
        for(var i=1;  i <= ckecdLendth; i++){
            console.log(parseInt($(".adjamount"+i).val()));
           // alert(parseInt($(".adjamount"+i).val()));
            CustTarrifQty += parseInt($(".adjamount"+i).val());
          }
        alert(CustTarrifQty);
        if($('.checkCheckBox'+inc).is(":checked")){
            if(RecAmount <= CustTarrifQty){
              $('.checkCheckBox'+inc).prop('checked',false);
             return false;
            }
            else if(ckecdLendth ==1)
            {
              $('.adjamount'+inc).val(parseInt(RecAmount));  
            }
            else if(ckecdLendth !=1 && ckecdLendth !=0)
            {
               var adjAmount=parseInt(RecAmount)-parseInt(CustTarrifQty);
               $('.adjamount'+inc).val(parseInt(RecAmount)-parseInt(CustTarrifQty));  
                 var Totaltds=(tds*fright)/100;
                $('.lessTds'+inc).val(parseInt(Totaltds));
                $('.NetPayleClass'+inc).val(billAmount-Totaltds);
                $('.OutStandingAmount'+inc).val(billAmount-adjAmount);
                $('#adjAmiuntId'+inc).text(parseInt(RecAmount)-parseInt(CustTarrifQty));  
               $('#NetPayle'+inc).text(billAmount-Totaltds);
                $('#outstandingAmountId'+inc).text(billAmount-adjAmount);
            }
        }else{
            $('.adjamount'+inc).val(parseInt(0));
            $('.lessTds'+inc).val(parseInt(0));
            $('.NetPayleClass'+inc).val(billAmount);
            $('.OutStandingAmount'+inc).val(billAmount);
            $('#adjAmiuntId'+inc).text(0);  
              $('#NetPayle'+inc).text(billAmount);
                $('#outstandingAmountId'+inc).text(billAmount);
         }
         return false;
    }
</script>