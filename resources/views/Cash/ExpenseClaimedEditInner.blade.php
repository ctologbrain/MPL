                   <table class="table table-bordered" id="dynamic_field">
                     <thead>
                     <th width="10%">Action</th>
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
                       <tr id="row{{$inner->id}}">
                       <td> <a  href="javascript:void(0);" onclick="deleteRequest('{{$inner->id}}');">Delete</a> </td>
                        <td>
                        {{$inner->Debit}}
                           
                       </td>

                        <td>{{$inner->Parent}}
                        </td>
                         <td>{{$inner->DBtReason}}
                         </td>
                        <td>
                        {{date("d-m-Y",strtotime($inner->FromDate))}}
                       </td>
                        <td>
                        {{date("d-m-Y",strtotime($inner->ToDate))}}
                       </td>
                        <td>{{$inner->Reason}}
                       </td>
                       <td >
                        {{$inner->Remark}}
                        </td>
                </tr>
                @endforeach
                
            </tbody>
            </table>

          <script type="text/javascript">
        
               $(document).ready(function(){





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
      
        
           
        var i = 0;
$('#add').click(function(){

    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input id="amount'+i+'" class="amnt" type="text" required autocomplete="off" name="Expenses['+i+'][amount]"/ style="width:100%"></td><td><input id="Parent'+i+'" type="text"  autocomplete="off" name="Expenses['+i+'][Parent]" style="width:100%"/></td><td><select id="exp'+i+'" class="form-control selectBox2"   name="Expenses['+i+'][Exp]"><option value="">Select</option>@foreach($DebitResion as $debit)<option value="{{$debit->Id}}">{{$debit->Reason}}</option>@endforeach</select></td><td><input id="FromDate'+i+'" type="text"required autocomplete="off" class="datepickerTwo" name="Expenses['+i+'][FromDate]" style="width:100%"/></td><td><input id="ToDate'+i+'" type="text"required autocomplete="off" name="Expenses['+i+'][ToDate]" class="datepickerTwo" style="width:100%"/></td><td><input id="REfrenceType'+i+'" type="text" autocomplete="off" name="Expenses['+i+'][REfrenceType]" style="width:100%"/></td><td><input  id="REfrenceName'+i+'" type="text"required autocomplete="off" name="Expenses['+i+'][REfrenceName]" style="width:80%"/>&nbsp;<button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        $('.datepickerTwo').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight:true
      });
      $(".selectBox2").select2();
});
    
$(document).on('click','.btn_remove', function(){
    var button_id = $(this).attr("id");
    $("#row"+button_id+"").remove();
});




$(document).on("click","#submit",function(e){
    if($('#Tdate').val()=='')
   {
      alert('please Enter Deposit Date');
      return false;
   }
   if($('#Advicedate').val()=='' ){
        alert('please Enter Advice Date');
      return false;
   }
   if($('#ToDepoBalace').val()=='')
   {
      alert('please Select To Depo');
      return false;
   }
   
    if($('.amnt').val()=='')
   {
      alert('please Enter Amount');
      return false;
   } 

   if($('#Reamrk').val()=='')
   {
      alert('please Enter Remark');
      return false;
   }
   var Totlength =  $('.amnt').length;
   for(var J=0; J<Totlength; J++){
     if( $("#amount"+J).val() ==""){
        alert("Please Enter Amount");
        return false;
     }
     if( $("#exp"+J).val() ==""){
        alert("Please Enter A/C Expance");
        return false;
     }
     if( $("#ToDate"+J).val() ==""){
        alert("Please Enter To Date");
        return false;
     }
     if( $("#FromDate"+J).val() ==""){
        alert("Please Enter From Date");
        return false;
     }
     if( $("#REfrenceType"+J).val() ==""){
        alert("Please Enter Referance");
        return false;
     }
     
   }
    var sum=0;
   $(".amnt").each(function(i){
    sum += parseInt($(this).val());
   });
    
   var depB=  $("#totalAmnt").val();
   var Total =$("#SumTotalTAmt").val();
    if(depB >= sum && Total>= sum){ 
       // $("#formid").submit();



    var base_url = '{{url('')}}';
    var formdata = new FormData();
    formdata.append("Advicedate", $("#Advicedate").val());
    formdata.append("AdviceNo", $("#AdviceNo").val());
    formdata.append("ToOffce", $("#ToOffce").val());
    formdata.append("ClaimType", $("#ClaimType").val());
    formdata.append("OffcieName", $("#OffcieName").val());
    formdata.append("ToDepoBalace", $("#ToDepoBalace").val());
    formdata.append("Reamrk", $("#Reamrk").val());
    if($("#Image2").val()!=""){
    formdata.append("Image2", $("#Image2")[0].files[0]);
    }
    var indx =0;
    $(".amnt").each(function(indx){
      formdata.append("Expenses["+indx+"][amount]", $("#amount"+indx).val());
      formdata.append("Expenses["+indx+"][Parent]", $("#Parent"+indx).val());
      formdata.append("Expenses["+indx+"][exp]", $("#exp"+indx).val());
      formdata.append("Expenses["+indx+"][FromDate]", $("#FromDate"+indx).val());
      formdata.append("Expenses["+indx+"][ToDate]", $("#ToDate"+indx).val());
      formdata.append("Expenses["+indx+"][REfrenceType]", $("#REfrenceType"+indx).val());
      formdata.append("Expenses["+indx+"][REfrenceName]", $("#REfrenceName"+indx).val());
      ++indx;
    });

   $.ajax({
   type: 'POST',
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
   },
   url: base_url + '/ExpenseClaimedEditPost',
   cache: false,
   processData:false,
   contentType:false,
   data: formdata,
   success: function(data) {
      var obj = JSON.parse(data);
      alert(obj.Status);
      location.reload();
   }
   });

   }
    else{
        alert("Insufficient Balance Amount");
        return false;
    }

});


        });

        function deleteRequest(Id){
            var AdviceNo=$('#AdviceNo').val();
            if($('#AdviceNo').val()==""){
                alert("please Enter Advice No");
                return false;
            }
            if(confirm("Are You Sure ?")){
            var base_url = '{{url('')}}';
            $.ajax({
                type: 'POST',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: base_url + '/DeleteRequestExp',
            cache: false,
            data: {
                'Id':Id
            },
            success: function(data) {
                $("#row"+Id).remove();
                getAdviceDetails();
            }
         });
        }

        }
    


       
  
            </script>