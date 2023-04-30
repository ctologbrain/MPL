                   <table class="table table-bordered" id="dynamic_field">
                     <thead>
                      <th width="10%">Amount</th>
                      <th width="10%">Parent A/c</th>
                      <th width="15%">Expense A/c</th>
                      <th width="11%">From Date</th>
                      <th width="11%">To Date</th>
                      <th width="15%">Reference Type</th>
                      <th width="28%">Reference No</th>
                 
                   </thead>
                   <?php $count=count($InnerAdvice)+1; ;$i=0;?>
                       @foreach($InnerAdvice as $inner)
                   <?php $i++;?>
                       <tr>
                        <td>
                           <input type="hidden" required autocomplete="off" name="Expenses[{{$i}}][id]" style="width:100%"; value="{{$inner->id}}"  id="ImpId{{$i}}"/>
                            <input type="hidden" value="{{$inner->Balance}}"   name="Expenses[{{$i}}][balance]" id="a{{$i}}" class="bal">
                        <input data-target="{{$i}}" class="amnt" type="text" required autocomplete="off" name="Expenses[{{$i}}][amount]" style="width:100%"; value="{{$inner->Debit}}" />
                       </td>

                        <td>
                       <input type="text"required autocomplete="off" name="Expenses[{{$i}}][Parent]" style="width:100%" value="{{$inner->Parent}}" />
                        </td>
                         <td>
                         <select  class="exp select2" id="exp" name="Expenses[{{$i}}][Exp]">
                           <option value="">Select</option>
                           @foreach($DebitResion as $debit)
                            <option value="{{$debit->Id}}" @if(isset($inner->Debit_Reason) && $inner->Debit_Reason==$debit->Id){{'selected'}}@endif>{{$debit->Reason}}</option>
                           @endforeach
                        </select>
                         </td>
                        <td>
                     <input type="text"required autocomplete="off" name="Expenses[{{$i}}][FromDate]" style="width:100%" value="{{$inner->FromDate}}" class="datepickerOne" />
                       </td>
                        <td>
                     <input type="text"required autocomplete="off" name="Expenses[{{$i}}][ToDate]" style="width:100%" value="{{$inner->ToDate}}" class="datepickerOne" />
                       </td>
                        <td>
                      <input type="text"required autocomplete="off" name="Expenses[{{$i}}][REfrenceType]" style="width:100%" value="{{$inner->Reason}}" />
                       </td>
                     <!--   <td>
                  <input type="text"required autocomplete="off" name="key_learning[]" style="width:90%"/>
                  <button type="button" name="add" id="add" class="btn btn-success">+</button>
                       </td> -->
                    <td align="left">
                   <input  type="text" maxlength="200" id="ctl00_ContentPlaceHolder1_txtReferenceNo" class="txtboxMedium" autocomplete="off" style="text-transform: uppercase; width: 80%;" name="Expenses[{{$i}}][REfrenceName]" value="{{$inner->Remark}}">
                  <a href="javascript:void(0)" class="btn btn-danger btn_remove" onclick="deleteLane('{{$inner->id}}')">X</a>
               </td>
                      
                </tr>
                @endforeach
                 <tr>
                        <td>
                        <input type="hidden"    name="Expenses[0][balance]" id="a0" class="bal">
                        <input data-target="0"  class="amnt" type="text"  autocomplete="off" name="Expenses[0][amount]" style="width:100%";/>
                       </td>

                        <td>
                       <input type="text" autocomplete="off" name="Expenses[0][Parent]" style="width:100%"/>
                        </td>
                         <td>
                         <select  class="exp select2" id="exp" name="Expenses[0][Exp]">
                           <option value="">Select</option>
                           @foreach($DebitResion as $debit)
                            <option value="{{$debit->Id}}">{{$debit->Reason}}</option>
                           @endforeach
                        </select>
                         </td>
                        <td>
                     <input type="text" autocomplete="off" name="Expenses[0][FromDate]" class="datepickerOne" style="width:100%"/>
                       </td>
                        <td>
                     <input type="text" autocomplete="off" name="Expenses[0][ToDate]" class="datepickerOne" style="width:100%"/>
                       </td>
                        <td>
                      <input type="text" autocomplete="off" name="Expenses[0][REfrenceType]" style="width:100%"/>
                       </td>
                     <!--   <td>
                  <input type="text"required autocomplete="off" name="key_learning[]" style="width:90%"/>
                  <button type="button" name="add" id="add" class="btn btn-success">+</button>
                       </td> -->
                    <td align="left">
                   <input  type="text" maxlength="200" id="ctl00_ContentPlaceHolder1_txtReferenceNo" class="txtboxMedium" autocomplete="off" style="text-transform: uppercase; width: 80%;" name="Expenses[0][REfrenceName]">
                   <button type="button" name="ctl00$ContentPlaceHolder1$btnAddReference"  name="add" id="add" class="btn btn-success">+</button>
               </td>
                      
                </tr>
                <thead>
                      <th colspan="3">Remark</th>
                      <th colspan="3">Attach Document</th>
                      <th>Action</th>
                     
                    
                   </thead>
                   <tbody>
                      <td colspan="3"><input type="text" class="form-control" name="Reamrk" id="Remark" value="@if(isset($AdviceDet->ExpRemark)){{$AdviceDet->ExpRemark}}@endif"></td>
                      <td colspan="3"><input type="file" class="form-control" name="Image2">
                       @if(isset($AdviceDet->Bill_Image))
                       <a href="{{url($AdviceDet->Bill_Image)}}" target="_blank"><img src="{{url($AdviceDet->Bill_Image)}}" width="100px"></a>
                       @endif
                      </td>
                     
                      <td><input id="submit" type="submit" name="submit" class="btn btn-primary">&nbsp;<a href="" class="btn btn-primary">Cancel</a></td>
                   </tbody>
            </table>
          <script type="text/javascript">
              $(document).ready(function(){
            var i = '{{$count}}';
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="hidden" name="Expenses['+i+'][balance]" id="a'+i+'" class="bal"><input class="amnt" data-target="'+i+'" type="text" required autocomplete="off" name="Expenses['+i+'][amount]"/ style="width:100%"></td><td><input type="text" required autocomplete="off" name="Expenses['+i+'][Parent]" style="width:100%"/></td><td><select class="exp"  name="Expenses['+i+'][Exp]"><option value="">Select</option>@foreach($DebitResion as $debit)<option value="{{$debit->Id}}">{{$debit->Reason}}</option>@endforeach</select></td><td><input type="text"required autocomplete="off" class="datepickerOne" name="Expenses['+i+'][FromDate]" style="width:100%"/></td><td><input type="text"required autocomplete="off" name="Expenses['+i+'][ToDate]" class="datepickerOne" style="width:100%"/></td><td><input type="text"required autocomplete="off" name="Expenses['+i+'][REfrenceType]" style="width:100%"/></td><td><input type="text"required autocomplete="off" name="Expenses['+i+'][REfrenceName]" style="width:80%"/>&nbsp;<button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                   $('.datepickerOne').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                    });

            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
         });
       function deleteLane(id)
       {
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/DeleteLaneImapress',
       cache: false,
       data: {
         'id':id
       },
       success: function(data) {
        $('.asss').val('{{$Adv}}');
           if($('#AdviceNo').val()=='')
        {
            alert('Please enter Advice No');
            return false;
        }
        var AdviceNo=$('#AdviceNo').val();
        var base_url = '{{url('')}}';
        $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/GetAdviceDetails',
       cache: false,
       data: {
           'AdviceNo':'{{$Adv}}'
       },
       success: function(data) {
           if(data =='false')
           {
             alert('No record found');
             return false;
         }
         else
         {
             var obj=JSON.parse(data);
             $('#CompanyName').val('METROPOLIS LOGISTICS PVT LTD');
             $('#Office').val(obj.DepoName);
             $('#AdviceDate').val(obj.Date);
             $('#SumTotalTAmt').val(obj.SumTotalTAmt);
             $('#OffcieName').val(obj.DipoId);
             if(obj.AccType=='Branch Imprest')
             {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" selected>Branch Imprest</option> <option value="Staff Imprest">Staff Imprest</option>')
            }
            else if(obj.AccType=='Staff Imprest')
            {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" >Branch Imprest</option> <option value="Staff Imprest" selected>Staff Imprest</option>')
            }
            else
            {
                $('.ClaimType').html('<select class="form-control" name="ClaimType" id="ClaimType" tabindex="3"> <option value="">Select Claim type</option> <option value="Branch Imprest" >Branch Imprest</option> <option value="Staff Imprest">Staff Imprest</option>')
            }

        }
        var AdviceNo=$('#AdviceNo').val();
        var base_url = '{{url('')}}';
        $.ajax({
         type: 'POST',
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/webadmin/GetAdviceDetailsInner',
       cache: false,
       data: {
           'AdviceNo':AdviceNo
       },
       success: function(data) {
        $('.ssss').html(data);


       }
   });

    }
});
         
        }
     });
       }
       $(document).on("change",".amnt", function(){ 
        var sum=0;
        var b_sum=[];
            $(".amnt").each(function(i){
                sum += parseInt($(this).val());
            });
            
            $(".bal").each(function(i){
                b_sum.push(parseInt($(this).val()));
                });
        b_sum=  b_sum[b_sum.length-2];
             var tid= $(this).data("target");
                var  sl= parseInt( b_sum-parseInt($(this).val())).toFixed(2);
                $("#a"+tid).val(sl);
             
       });
      
           $(document).on("click","#submit", function(){ 
            if($("#ClaimType").val()==''){
                alert("Please enter claim type");
                return false;
            }
            if($("#AdviceNo").val()==''){
                alert("Please enter advice number");
                return false;
            }
           var b_sum=[];
            $(".bal").each(function(i){
                b_sum.push(parseInt($(this).val()));
                });
            b_sum=  b_sum[b_sum.length-2];

            var sum=0;
            $(".amnt").each(function(i){
                if($(this).val()=="" || $(this).val()=="NaN"){
                    sum=0;
                }
                else{
                    sum= parseInt($(this).val());
                }
                sum += sum;
            });
            console.log(b_sum);

            if(b_sum >= sum){
                $("#formid").submit();
            }
            else{
            alert("insufficient balance amount ");
            return false;
            }
            
           
        });
  
            </script>