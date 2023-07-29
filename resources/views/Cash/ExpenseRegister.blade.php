@include('layouts.appOne')
<div class="generator-container allLists">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box main-title">
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Froms</a></li>
                  <li class="breadcrumb-item active">{{$title}}</li>
               </ol>
            </div>
            <h4 class="page-title">{{$title}}</h4>

         </div>
         @if (session('status'))
           <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
           <strong>Message - </strong>  {{session('status','')}}
          </div>
          @endif
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
                         <input type="text" id="advice" name="advice" class="form-control datepickerOne" placeholder="Advice No." value="<?php if(isset($post_value['advice'])){echo $post_value['advice']; }?>" placeholder="To" autocomplete="off">
                          </div> 
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepickerOne" name="from" id="BillDate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                       
                          <div class="mb-2 col-md-3">
                         <input type="text" id="MainRate" name="to" class="form-control datepickerOne" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
                          </div> 

                          <div class="mb-2 col-md-3 d-flex justify-content around">
                           <div>
                               <input name="view" class="form-check-input" type="radio" value="summary" id="flexCheckDefault" checked>
                             <label class="form-check-label" for="flexCheckDefault">
                               Summary
                             </label>
                           </div>
                          
                             <div class="ms-2">
                           <input name="view" class="form-check-input" type="radio" value="detail" id="flexCheckDefault" >
                             <label class="form-check-label" for="flexCheckDefault">
                               Detail
                             </label>
                          </div>
                          </div>

                            <div class="mb-2 col-md-3 d-flex">
                           <input type="submit" name="submit" class="btn btn-primary" style="margin-right: 5px;">
                         
                              <button type="submit" name="sumbit" value="Download" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></button>
                         </div>
                         
                   </div>
         <h4 class="header-title nav nav-tabs nav-bordered mb-3 sucess">  </h4>
         <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                     
                      <div class="mb-2 col-md-4"><b>Total Expense  :@isset($TotalVlaue->TotalDebit) {{$TotalVlaue->TotalDebit}} @endisset</b>
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
            <th style="min-width: 100px;">Company Name</th>
            <th style="min-width: 50px;">Claim Type</th>
            <th style="min-width: 50px;">Claim By</th>
            <th style="min-width: 80px;">Advice Date</th>
            <th style="min-width: 40px;">Expense Amount</th>
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
            {{$depoLadger->OfficeCode}} ~ {{$depoLadger->OfficeName}}
           </td>   
        
           <td>{{$depoLadger->Date}}</td>   
           <td>{{$depoLadger->Debit}}</td>   
         
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
    
 @if(isset($getAllDepo) && count($getAllDepo) >0) {{ $getAllDepo->appends(Request::except('page'))->links() }} @endif
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
      $("#BillDate").datepicker({
         format: 'dd-mm-yyyy',
         autoclose:true,
         todayHighlight:true
      });
      $("#MainRate").datepicker({
         format: 'dd-mm-yyyy',
         autoclose:true,
         todayHighlight:true
      });
      
      setTimeout(function(){
         $(".alert").removeClass('show');
      },2000);
     });
  </script>
