<div class="col-12">
<h5 style="color: #C00;">Total Outstanding:<span class="totalOut"></span></h5>
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
                                                            <th class="p-1">Freight</th>
                                                            <th class="p-1">Tax Amount</th>
                                                            <th class="p-1">Bill Amount</th>
                                                            <th class="p-1">Paid Amount</th>
                                                            <th class="p-1">Less TDS</th>
                                                            <th class="p-1">Net Payable</th>
                                                            <th class="p-1">Adjust Amount</th>
                                                            <!-- <th class="p-1">Check AMM</th> -->
                                                            <th class="p-1">Outstanding Amount</th>
                                                            
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
                                                      if(isset($inv->TotalMoneyAmount) && $inv->TotalMoneyAmount !='')
                                                      {
                                                          $MonryAmount=$inv->TotalMoneyAmount;
                                                      }
                                                      else
                                                      {
                                                        $MonryAmount=0;
                                                      }
                                                      $earlier = new DateTime($inv->InvDate);
                                                      $later = new DateTime(date('Y-m-d'));
                                                      $abs_diff = $later->diff($earlier)->format("%a"); //3
                                                      if($apply_tds=='on'){
                                                        $totalTds=($inv->TotalFright*$tds)/100;
                                                    } else{
                                                       $totalTds=0;
                                                    }
                                                    $vvv=$inv->TotalAmount-$totalTds;
                                                    if($sumCgst==0)
                                                    {
                                                      $netPay=($inv->TotalAmount)-$MonryAmount;
                                                    }
                                                    else
                                                    {
                                                      $netPay=($inv->TotalAmount-$totalTds)-$MonryAmount;
                                                    }
                                                    
                                                  
                                                    $adjAmount=($sumCgst-$netPay);
                                                    // echo $sumCgst.'/'.$netPay;
                                                    // echo "<br>";
                                                    if($sumCgst >=$netPay)
                                                           {
                                                           
                                                              $ppp=$netPay;   
                                                           }
                                                           else{
                                                           
                                                            $ppp=$sumCgst;  
                                                           }
                                                         
                                                           if($sumCgst > 0)
                                                           {
                                                               $totaloutStand=$netPay-$ppp;
                                                           
                                                           }else{
                                                               $totaloutStand=$inv->TotalAmount;
                                                           }
                                                           
                                                  ?>
                                                    <tr>
                                                     <td>{{$i}}</td>
                                                     <td><input class="checkCheckBox{{$i}} checkbbbbb" name="Money[{{$i}}][checked]" onclick="checkCheckBox('{{$inv->id}}','{{$sumCgst}}','{{$i}}','{{$inv->TotalAmount}}','{{$inv->TotalFright}}','{{$tds}}','{{$MonryAmount}}','{{$netPay}}')" type="checkbox" @if($sumCgst > 0 && $MonryAmount != $vvv){{'checked'}}@endif value="{{$inv->id}}"></td>
                                                     <td>{{$inv->InvNo}}<input type="hidden"  name="Money[{{$i}}][InvId]" id="InvId{{$i}}" class="InvId{{$i}}" value="{{$inv->id}}"></td>
                                                     <td>{{$inv->InvDate}}</td>
                                                     <td>{{$abs_diff}}</td>
                                                     <td>{{$inv->TotalFright}}</td>
                                                     <td>{{$inv->TotalScst+$inv->TotalCgst+$inv->TotalIgst}}</td>
                                                     <td>{{$inv->TotalAmount}}</td>
                                                     <td>{{$MonryAmount}}<input type="hidden" name="Money[{{$i}}][PaidAmount]" id="paidAmount{{$i}}" class="PaidAmount{{$i}}" value="{{$MonryAmount}}"></td>
                                                     <td>
                                                        
                                                         <input type="text" class="form-control lessTds{{$i}}" value="@if($sumCgst > 0){{$totalTds}}@else{{'0'}}@endif"></td>
                                                     <td><span id="NetPayle{{$i}}">{{$netPay}}</span><input Type="hidden" class="NetPayleClass{{$i}}" value="{{$netPay}}"></td>
                                                    
                                                     <td>
                                                        
                                                         <span id="adjAmiuntId{{$i}}">{{$ppp}}</span>
                                                         <input type="hidden" name="Money[{{$i}}][adjAmiunt]" class="adjamount{{$i}} TotolAdj" value="{{$ppp}}">
                                                     </td>
                                                   
                                                     <td ><span id="outstandingAmountId{{$i}}">{{$totaloutStand}}</span><input type="hidden" class="OutStandingAmount{{$i}} sumoutstanding" id="OutStandingAmount{{$i}}" value="{{$totaloutStand}}"></td>
                                                        

                                                   
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
<input type="submit" tabindex="15" value="Save"
class="btn btn-primary btnSubmit" id="btnSubmit">
</div>
</div>
</div>
</div>
</div>
<script>
  $( document ).ready(function() {
    OutStandAmount=0;
    var RecAmount='{{$amount}}';
   var totalSum=$('.sumoutstanding').length;
     for(var i=1;  i <= totalSum; i++){
           if(isNaN(parseFloat($("#OutStandingAmount"+i).val()))) {
          var tal = 0;
          }
          else
          {
            var tal=parseFloat($("#OutStandingAmount"+i).val());
          }
            OutStandAmount +=tal; 
           
          }

         $('.totalOut').text((parseFloat(OutStandAmount)+parseFloat(RecAmount)).toFixed(2));
         $('.outstanding_amnt').val((parseFloat(OutStandAmount)+parseFloat(RecAmount)).toFixed(2));
        });
    function checkCheckBox(invId,Amount,inc,billAmount,fright,tds,MoneyAmount,netPay)
    {
     
        var RecAmount='{{$amount}}';
        var ckecdLendth=$('.checkbbbbb:checked').length;
        var CustTarrifQty =0;
        var OutStandAmount =0;
        var SumOfAdjAmount=0;
        var totalSum=$('.sumoutstanding').length;
       
        for(var i=1;  i <= ckecdLendth; i++){
           CustTarrifQty += parseInt($(".adjamount"+i).val());
          }
        
         
        if($('.checkCheckBox'+inc).is(":checked")){
            
            if(RecAmount <= CustTarrifQty){
              $('.checkCheckBox'+inc).prop('checked',false);
             return false;
            }
            else if(netPay == 0)
            {
              $('.checkCheckBox'+inc).prop('checked',false);
             return false;
            }
            else if(ckecdLendth ==1)
            {
             
              var adjAmount=parseFloat(RecAmount)-parseFloat(CustTarrifQty);
               $('.adjamount'+inc).val(parseFloat(RecAmount)-parseFloat(CustTarrifQty));  
                 var Totaltds=(tds*fright)/100;
                $('.lessTds'+inc).val(parseFloat(Totaltds));
                $('.NetPayleClass'+inc).val((billAmount-Totaltds)-MoneyAmount);
                $('.OutStandingAmount'+inc).val((billAmount-Totaltds)-adjAmount);
                $('#adjAmiuntId'+inc).text(parseFloat(RecAmount)-parseFloat(CustTarrifQty));  
               $('#NetPayle'+inc).text((billAmount-Totaltds)-MoneyAmount);
                $('#outstandingAmountId'+inc).text((billAmount-Totaltds)-adjAmount);
                $('.adjusted_amnt').val(CustTarrifQty);  
            }
            else if(ckecdLendth !=1 && ckecdLendth !=0)
            {
            
               var adjAmount=parseFloat(RecAmount)-parseFloat(CustTarrifQty);
               $('.adjamount'+inc).val(parseFloat(RecAmount)-parseFloat(CustTarrifQty));  
                 var Totaltds=(tds*fright)/100;
                $('.lessTds'+inc).val(parseFloat(Totaltds));
                $('.NetPayleClass'+inc).val((billAmount-Totaltds)-MoneyAmount);
                $('.OutStandingAmount'+inc).val(((billAmount-MoneyAmount)-Totaltds)-adjAmount);
                $('#adjAmiuntId'+inc).text(parseFloat(RecAmount)-parseFloat(CustTarrifQty));  
               $('#NetPayle'+inc).text((billAmount-Totaltds)-MoneyAmount);
                $('#outstandingAmountId'+inc).text(((billAmount-MoneyAmount)-Totaltds)-adjAmount);
                $('.adjusted_amnt').val(CustTarrifQty);
               
            }
        }else{
          var Totaltds=(tds*fright)/100;
            $('.adjamount'+inc).val(parseInt(0));
            $('.lessTds'+inc).val(parseInt(0));
            $('.NetPayleClass'+inc).val((parseInt(billAmount)-parseInt(Totaltds))-parseInt(MoneyAmount));
            $('.OutStandingAmount'+inc).val(billAmount);
            $('#adjAmiuntId'+inc).text(0);  
            $('#NetPayle'+inc).text(parseInt(billAmount)-parseInt(MoneyAmount));
            $('#outstandingAmountId'+inc).text(billAmount-MoneyAmount);
            $('.adjusted_amnt').val(CustTarrifQty);
           
         }
        
         for(var i=1;  i <= totalSum; i++){
           if(isNaN(parseFloat($("#OutStandingAmount"+i).val()))) {
          var tal = 0;
          }
          else
          {
            var tal=parseFloat($("#OutStandingAmount"+i).val());
          }
            OutStandAmount +=tal; 
           
          }
          for(var i=1;  i <= totalSum; i++){
           if(isNaN(parseFloat($(".adjamount"+i).val()))) {
          var tal2 = 0;
          }
          else
          {
            var tal2=parseFloat($(".adjamount"+i).val());
          }
          SumOfAdjAmount +=tal2; 
           
          }
          
          $('.outstanding_amnt').val(OutStandAmount.toFixed(2));
          $('.adjusted_amnt').val(SumOfAdjAmount.toFixed(2))
          $('.totalOut').text((parseFloat(OutStandAmount)+parseFloat(SumOfAdjAmount)).toFixed(2));
         return false;
        
    }
</script>