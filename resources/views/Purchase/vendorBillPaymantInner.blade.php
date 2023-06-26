<div class="col-12">
<h5 style="color: #C00;">Total Outstanding: {{$vendorAmountSum}}</h5>
</div>
<div class="col-12 main-title text-center text-center fw-bold">
<table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:100px;" class="p-1">Action</th>
            <th style="min-width:130px;" class="p-1">Bill Number</th>
            <th style="min-width:100px;" class="p-1">Bill Date</th>
            <th style="min-width:100px;" class="p-1">Overdue Days</th>
            <th style="min-width:100px;" class="p-1">Total Item</th> 
            <th style="min-width:100px;" class="p-1">Bill Amount</th>
            <th style="min-width:100px;" class="p-1">Net Payable</th>
            <th style="min-width:100px;" class="p-1">Adjusted Amount</th>
            <th style="min-width:100px;" class="p-1">Outstanding Amt</th>
            
           </tr>
         </thead>
         <tbody>
             <?php 
                 $i=0;
                 $default=$amount;
                 $sumofDefault=0;
                 $sumofOut=0;
                 $sumOutAmounts=0;
                 $adjAmount=0;
              ?>
         @foreach($vendor as $VendorData)
         <?php $i++; 
         $netAmount=$VendorData->net_amt-$VendorData->TotalPaid;
         if($default >= $netAmount)
         {
            $Calamount=$netAmount;
            $amount1=0;
         }else{
            $Calamount=$default;
            $amount1=$netAmount-$default;
         }

           
         ?>
            <tr>
             <td class="p-1">{{$i}}</td>
             <td class="p-1"><input type="checkbox" data-chk="this" class="checkCheckBox{{$i}} checkbbbbb" name="Money[{{$i}}][checked]" @if($Calamount !=0){{'checked'}}@endif onclick="checkCheckBox('{{$VendorData->id}}','{{$Calamount}}','{{$default}}','{{$amount}}','{{$i}}','{{$netAmount}}')" value="{{$VendorData->id}}"></td>
             <td class="p-1">{{$VendorData->BillNo}}</td>
             <td class="p-1">{{$VendorData->BillDate}}</td>
             <td class="p-1">1</td>
             <td class="p-1">1</td>
             <td class="p-1">{{$amount}}/{{$VendorData->net_amt}}/{{$default}}<input type="hidden" name="Money[{{$i}}][BillAmount]" class="billAmount{{$i}}" id="billAmount{{$i}}" value="{{$VendorData->net_amt}}"></td>
             <td class="p-1">{{$netAmount}}</td>
             <td class="p-1"><span id="AdjAmountBYid{{$i}}">{{$Calamount}}</span><input type="hidden" name="Money[{{$i}}][AdjAmount]" class="AdjAmount{{$i}}" id="AdjAmount{{$i}}" value="{{$Calamount}}"></td>
             <td class="p-1"><span id="OutStandingAmount{{$i}}">{{$amount1}}</span> <input type="hidden" name="Money[{{$i}}][OutStand]" class="OutStand{{$i}} sumoutstanding" id="OutStand{{$i}}" value="{{$amount1}}"></td>
            </tr>
            <?php
               if(($default - $netAmount) >=0)
               {
                  $default = $default - $netAmount;
               }
               else
               {
                  $default=0;
               }
              
               if($default >= $netAmount)
               {
                  $sumofDefault+=$netAmount;
               }
               else
               {
                  $sumofDefault+=$default;
               }
               $sumOutAmounts+=$amount1;
               $adjAmount+=$Calamount;
          
         ?>
           @endforeach
           
         </tbody>
        </table>
</div>
<div class="row">
<div class="col-8 mt-1">

<textarea class="form-control remark" id="remark" name="remark" placeholder="Remarks" tabindex="12">sss</textarea>
</div>

<div class="col-4 mt-1">

<div class="row">
<label class="col-md-6 col-form-label text-end" for="recieved_amnt">Recieved Amount</label>
<div class="col-md-6">
<input type="text" name="recieved_amnt" value="{{$amount}}" class="recieved_amnt form-control" id="recieved_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label text-end" for="adjusted_amnt">Adjusted Amount</label>
<div class="col-md-6">
<input type="text" name="adjusted_amnt" value="{{$adjAmount}}" class="adjusted_amnt form-control" id="adjusted_amnts"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label text-end" for="outstanding_amnt">Outstanding Amount</label>
<div class="col-md-6">
<input type="text" name="outstanding_amnt" value="{{$sumOutAmounts}}" class="outstanding_amnt form-control" id="outstanding_amnt"  disabled>
</div>
</div>
<div class="row">
<label class="col-md-6 col-form-label" for="outstanding_amnt"></label>
<div class="col-md-6 text-end">
<input type="submit" tabindex="13" value="Save"
class="btn btn-primary btnSubmit" id="btnSubmit">
</div>
</div>
</div>
</div>
<script>
   function checkCheckBox(InvId,Calamount,Amount,RecAmount,inc,NetAmount)
   {
     
      var RecAmount1='{{$amount}}';
      var ckecdLendth=$('.checkbbbbb:checked').length;
      var totalSum=$('.sumoutstanding').length;
      var CustTarrifQty =0;
      for(var i=1;  i <= ckecdLendth; i++){
           CustTarrifQty += parseInt($(".AdjAmount"+i).val());
          }
       
          if($('.checkCheckBox'+inc).is(":checked")){
            
            if(RecAmount <= CustTarrifQty){
              $('.checkCheckBox'+inc).prop('checked',false);
             return false;
            }
            else if( $("[data-chk='this']").prop("checked") == false )
            {
               $('.checkCheckBox'+inc).prop('checked',false);
                return false;
            }
            
            else if(ckecdLendth ==1)
            {
              
               var adjAmount=parseInt(RecAmount1)-parseInt(CustTarrifQty);
               var Out1s=parseInt(NetAmount)-parseInt(adjAmount);
               $('.AdjAmount'+inc).val(adjAmount);  
               $('#AdjAmountBYid'+inc).text(adjAmount);
               $('.OutStand'+inc).val(Out1s);
               $('#OutStandingAmount'+inc).text(Out1s);
            }
            else if(ckecdLendth !=1 && ckecdLendth !=0)
            {
               
               var adjAmount=parseInt(RecAmount1)-parseInt(CustTarrifQty);
               var Out1s=parseInt(NetAmount)-parseInt(adjAmount);
               $('.AdjAmount'+inc).val(adjAmount);  
               $('#AdjAmountBYid'+inc).text(adjAmount);
               $('.OutStand'+inc).val(Out1s);
               $('#OutStandingAmount'+inc).text(Out1s);
            }
          }
          else{
             $('.AdjAmount'+inc).val(0);
             $('.OutStand'+inc).val(NetAmount);
             $('#AdjAmountBYid'+inc).text(0);
             $('#OutStandingAmount'+inc).text(NetAmount);
             

          }
          for(var i=1;  i <= totalSum; i++){
            OutStandAmount += parseInt($(".OutStand"+i).val());
          }
          $('.outstanding_amnt').val(OutStandAmount);
          
   }
</script>