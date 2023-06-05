  <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
  <style type="text/css">
    
th{
   min-width:130px;
}
 .cn{
   min-width:230px;
}
 .sn{
   min-width:10px;
}

  </style>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
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
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
                <form action="" method="post" name="list_form" id="list_form">
               {{ csrf_field() }}
               <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                    @if(Session::get("id")->Last_Name=='6')
                            <div class="mb-2 col-md-3">
                           <select class="form-control" name="depo">
                            <option value="">Select Depo</option>  
                            @foreach($depo as $depos) 
                           <option value="{{$depos->DepoId}}" @if(isset($post_value['depo']) && $post_value['depo']==$depos->DepoId){{'selected'}}@endif>{{$depos->DepoName}}</option>  
                            @endforeach
                           </select>
                          </div> 
                          @endif
                           <div class="mb-2 col-md-3">
                         <input type="text" id="advice" name="advice" class="form-control datepicker" placeholder="Advice No." value="<?php if(isset($post_value['advice'])){echo $post_value['advice']; }?>" placeholder="To" autocomplete="off">
                          </div> 
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepicker" name="from" id="BillDate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                          <div class="mb-2 col-md-3">
                         <input type="text" id="MainRate" name="to" class="form-control datepicker" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
                          </div> 
                          <div class="mb-2 col-md-3 d-flex justify-content around">
                           <div>
                               <input name="view" class="form-check-input" type="radio" value="summary" id="flexCheckDefault" >
                             <label class="form-check-label" for="flexCheckDefault">
                               Summary
                             </label>
                           </div>
                          
                             <div class="ms-2">
                           <input name="view" class="form-check-input" type="radio" value="detail" id="flexCheckDefault" checked>
                             <label class="form-check-label" for="flexCheckDefault">
                               Detail
                             </label>
                          </div>
                          </div>
                          

                            <div class="mb-2 col-md-3">
                           <input type="submit" name="submit" class="btn btn-primary">
                          </div> 
                          
                          <div class="mb-2 col-md-3">
                              <button type="submit" name="sumbit" value="DownloadDetail" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></button>
                         </div>
                         <div class="mb-2 col-md-3">
                           <a  href="{{url('/webadmin/ExpenseRegister')}}"  class="btn btn-primary" role="button">Back</a>
                          </div>
                   </div>
         <h4 class="header-title nav nav-tabs nav-bordered mb-3 sucess">  </h4>
         <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                     
                      <div class="mb-2 col-md-4"><b>Total Expense  :@isset($TotalVlaue->TotalDebit)  {{$TotalVlaue->TotalDebit}} @endisset </b>
                     </div>
                    
                  </div>
              </div>
          </div>
             <div class="tab-pane show active" id="input-types-preview">
            <div class="row" style="overflow-x:auto;">
            <table class="table table-bordered table-centered mb-1 mt-1" style="overflow-x:auto;">
           <thead>
          <tr>
            <th class="sn" width="2%">SL#</th>
            <th width="40%">Document</th>
            <th class="cn" width="100%">Company Name</th>
            <th width="30%">Claim Type</th>
            <th width="10%">Claim By</th>
             <th width="30%">Advice No.</th>
            <th width="30%">Advice Date</th>
            <th width="30%">Expense Amount</th>

            <th width="30%">Parent Expense</th>
             <th width="30%">Expense Type</th>
            <th width="30%">From Date</th>
            <th width="30%">To Date</th>
            <th width="30%">Reference No.</th>
            <th width="30%">Reference Type</th>
             <th width="30%">Remark</th>
           

           </tr>
         </thead>
        <tbody>
         @if(isset($getAllDepo) && count($getAllDepo) >0)
            <?php $i=0; ?>

          @foreach($getAllDepo as $depoLadger)
           <?php $i++; ?>
          <tr>
           <td>{{$i}}</td>   
          
           <td>
             @if($depoLadger->Bill_Image)
            <a href="{{url('/'.$depoLadger->Bill_Image)}}" target="_blank" class="btn btn-primary " role="button">View</a>
            @else
            <a href="javascript:void(0);" class="btn btn-primary " role="button">View</a>
            @endif
           </td>   
           <td >{{'Venture Supply Chain Pvt Ltd'}}</td>   
           <td width="30%"> {{$depoLadger->AccType}}</td>
           <td width="30%">
           {{$depoLadger->DepoName}}
           </td>   
        <td width="30%">{{$depoLadger->AdviceNo}}</td>
           <td width="30%">{{$depoLadger->Date}}</td>   
           <td width="30%">{{$depoLadger->Debit}}</td>  

           <td width="30%">{{$depoLadger->Parent}}</td> 
           <td width="30%">{{$depoLadger->DebitReason}}</td>
           <td width="30%">{{$depoLadger->FromDate}}</td>
           <td width="30%">{{$depoLadger->ToDate}}</td>
           <td width="30%">{{$depoLadger->Reason}}</td>
           <td width="30%">{{$depoLadger->Remark}}</td>
          <td width="30%">{{$depoLadger->ExpRemark}}</td>
           
           
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
    @if(isset($getAllDepo) && count($getAllDepo) >0)
 {{ $getAllDepo->appends(Request::except('page'))->links() }}
 @endif
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
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script type="text/javascript">
     $(function(){
      $("#BillDate").datepicker({
         format: 'yyyy-mm-dd',
         autoclose:true
      });
      $("#MainRate").datepicker({
         format: 'yyyy-mm-dd',
         autoclose:true
      });
           
      setTimeout(function(){
         $(".alert").removeClass('show');
      },2000);

     });
  </script>
