@include('layouts.appOne')
  <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                  <li class="breadcrumb-item active">{{$title}}</li>
               </ol>
            </div>
            <h4 class="page-title">{{$title}}</h4>
         </div>
      </div>
   </div>
   <!-- end page title --> 
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
                <form action="" method="post" name="list_form" id="list_form">
      {{ csrf_field() }}
               <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                            
                            <div class="mb-2 col-md-3">
                           <select class="form-control selectBox" name="debit_res">
                            <option value="">Select Expense</option>  
                            @foreach($debitR as $dr) 
                           <option value="{{$dr->Id}}" @if(isset($post_value['debit_res']) && $post_value['debit_res']==$dr->Id){{'selected'}}@endif>{{$dr->Reason}}</option>  
                            @endforeach
                           </select>
                          </div> 
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepicker" name="from" id="Billdate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                          <div class="mb-2 col-md-3">
                         <input type="text" id="Mainrate" name="to" class="form-control datepicker" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
                          </div> 

                            <div class="mb-2 col-md-1">
                           <input type="submit" name="submit" class="btn btn-primary">
                          </div> 
                           <div class="mb-2 col-md-2">
                              <button type="submit" name="sumbit" value="Download" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></button>
                         </div>
                   </div>
         <h4 class="header-title nav nav-tabs nav-bordered mb-3 sucess">  </h4>
         <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                     <div class="mb-2 col-md-4"><b>Total Balance :{{$TotalVlaue}} </b>
                     </div>
                     
                    
                  </div>
              </div>
          </div>
             <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
            <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            <th width="2%">SL#</th>
           <th width="8%">Expense Account</th>
           <th width="8%">Self</th>
             <th width="9%">Grand Total</th>
           </tr>
         </thead>
        <tbody>
            <?php $i=0; ?>
          @foreach($getAllDepo as $depoLadger)
           <?php $i++; ?>
          <tr>
           <td>{{$i}}</td>   
            <td><b><a href="javascript:void(0)" onclick="getDepodata('{{$depoLadger->Debit_Reason}}');" >{{$depoLadger->DebitReason}}</b></a></td>
            <td>{{$depoLadger->TotalDebit}}</td>   
            <td>{{$depoLadger->TotalDebit}}</td>   
         
          </tr>
          @endforeach      
       </tbody>
     </table>
                    </div>
                   </div>
                    <div class="dataTables_paginate paging_simple_numbers examinationList" id="customers2_paginate"> 
        <div id="pages" class="pagelist">
            <div class="text-center"> 
    
 {{ $getAllDepo->appends(Request::except('page'))->links() }}
         </div>
       
        </div> 
        </div>
               </div>
             </div>
         </div>
      </div>
    </div>
</div>
<div id="DiscountModel"></div>
  
  
  <script type="text/javascript">
  $(".selectBox").select2();
   function getDepodata(id){
      var formDate=$("#Billdate").val();
      var ToDate=$("#Mainrate").val();
      $.ajax({
         url:"{{url('HeadWiseRegisterModel')}}",
         data:{id:id,formDate:formDate,ToDate:ToDate},
         headers:{
            'X-CSRF-Token':$("input[name=_token]").val()
         },
         type:"POST",
         success:function(data){
            $("#DiscountModel").html(data);
         }

      });
     }
     $(function(){
      var d = new Date();
    
   var y = d.getFullYear();
    var day = d.getDate();
      day =  day > 9 ? day : '0' + day ;
      var month = (d.getMonth() + 1);
     var m = month > 9 ? month : '0' + month;
    
    date=y+'-'+m+'-'+day;
    console.log(date);
      $("#Billdate").datepicker({
         format: 'dd-mm-yyyy',
         autoclose:true,
         todayHighlight:true
      });
       $("#Mainrate").datepicker({
         format: 'dd-mm-yyyy',
         autoclose:true,
         todayHighlight:true
      });
      




     })

     

     
  </script>
