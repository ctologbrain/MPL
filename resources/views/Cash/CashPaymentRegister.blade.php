@include('layouts.appOne')
<div class="generator-container allLists">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box main-title">
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
   <div class="row pl-pr">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
                <form action="" method="post" name="list_form" id="list_form">
      {{ csrf_field() }}
               <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row mt-1">
                           
                           <div class="mb-2 col-md-3">
                           <select class="form-control selectBox" name="depo">
                            <option value="">Select Office</option>  
                            @foreach($depo as $depos) 
                           <option value="{{$depos->id}}" @if(isset($post_value['depo']) && $post_value['depo']==$depos->id){{'selected'}}@endif>{{$depos->OfficeCode}} ~{{$depos->OfficeName}}</option>  
                            @endforeach
                           </select>
                          </div> 
                         
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepickerOne" name="from" id="BillDate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                          <div class="mb-2 col-md-3">
                         <input type="text" id="MainRate" name="to" class="form-control datepickerOne" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
                          </div> 

                            <div class="mb-2 col-md-2 d-flex">
                           <input type="submit" name="submit" class="btn btn-primary" style="margin-right: 5px;">
                         
                              <button type="submit" name="sumbit" value="Download" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></button>
                           </div>
                   </div>
         <h4 class="header-title nav nav-tabs nav-bordered mb-3 sucess">  </h4>
         <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                     
                      <div class="mb-2 col-md-4"><b>Total Balance  :@isset($TotalVlaue->TotalDebit){{$TotalVlaue->TotalDebit}} @endisset</b>
                     </div>
                    
                  </div>
              </div>
          </div>
             <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
            <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            <th width="2%">SL#</th>
            <th width="9%">Company Name</th>
            <th width="8%">Claim Type</th>
            <th width="10%">Office Name</th>
            <th width="8%">Employee Name</th>
            <th width="8%">Advice No</th>
            <th width="8%">Advice Date</th>
            <th width="9%">Total No Of Expense</th>
            <th width="9%">Expense Amount</th>
           </tr>
         </thead>
        <tbody>
            <?php $i=0; ?>
            @if(isset($getAllDepo) && count($getAllDepo) >0)
            @foreach($getAllDepo as $depoLadger)
           <?php $i++; ?>
          <tr>
           <td>{{$i}}</td>   
           <td>{{'Venture Supply Chain Pvt Ltd'}}</td>   
           <td> {{$depoLadger->AccType}}</td>
           <td>
           {{$depoLadger->OfficeName}} ~ {{$depoLadger->OfficeName}}
           </td>   
           <td> 
           {{$depoLadger->EmployeeCode}} ~ {{$depoLadger->EmployeeName}}
           </td>   
           
           <td>{{$depoLadger->AdviceNo}}</td>   
           <td>{{$depoLadger->Date}}</td>   
           <td>{{$depoLadger->TotalCount}}</td>   
           <td>{{$depoLadger->TotalDebit}}</td>   
         
          </tr>
          @endforeach   
          @endif   
       </tbody>
     </table>
                    </div>
                   </div>
                    <div class="dataTables_paginate paging_simple_numbers examinationList" id="customers2_paginate"> 
        <div id="pages" class="pagelist">
            <div class="text-center"> 
    
  @if(isset($getAllDepo) && count($getAllDepo) >0) {{  $getAllDepo->appends(Request::except('page'))->links() }} @endif
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
     $(function(){
      var d = new Date();
    m = d.getMonth()+1;
    y = d.getFullYear();
    day= d.getDay();
    
    date=y+'/'+m+'/'+day;
    console.log(date);
      $("#BillDate").datepicker({
         format:"dd-mm-yyyy",
         autoclose:true,
         value:date,
         todayHighlight:true
      });
       $("#MainRate").datepicker({
         format:"dd-mm-yyyy",
         autoclose:true,
         value:date,
         todayHighlight:true
      });
      

     })
  </script>
