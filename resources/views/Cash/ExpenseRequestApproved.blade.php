@include('layouts.appOne')
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
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
            <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
         </div>
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
                           <select class="form-control" name="depo">
                            <option value="">Select Depo</option>  
                            @foreach($getAllDepo as $depos) 
                           <option value="{{$depos->DepoId}}" @if(isset($post_value['depo']) && $post_value['depo']==$depos->DepoId){{'selected'}}@endif>{{$depos->DepoName}}</option>  
                            @endforeach
                           </select>
                          </div> 
                     
                            <div class="mb-2 col-md-3">
                               <select class="form-control" name="staust">
                                <option value="">Select Status</option>  
                               <option value="1" @if(isset($post_value['staust']) && 1==$post_value['staust']){{'selected'}}@endif>Pending</option>  
                               <option value="2" @if(isset($post_value['staust']) && 2==$post_value['staust']){{'selected'}}@endif>Approved</option> 
                               <option value="3" @if(isset($post_value['staust']) && 3==$post_value['staust']){{'selected'}}@endif>Rejected</option> 
                               </select>
                            </div> 
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepicker" name="from" id="BillDate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                          <div class="mb-1 col-md-3">
                         <input type="text" id="MainRate" name="to" class="form-control datepicker" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
                          </div> 

                            <div class="mb-1 col-md-12 text-end">
                           <input type="submit" name="submit" class="btn btn-primary">
                           <button type="submit" name="sumbit" value="Download" class="btn btn-primary">Download <i class="mdi mdi-download ms-1"></i></button>
                          </div> 
                          
                          
                     </div>
         <h4 class="header-title nav nav-tabs nav-bordered mb-3 sucess">  </h4>
         <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                  <div class="row">
                     
                      <div class="mb-2 col-md-4"><b>Total Request  :@isset($getAllRequest) {{count($getAllRequest)}} @endisset</b>
                     </div>
                    
                  </div>
              </div>
          </div>
             <div class="tab-pane show active" id="input-types-preview">
            <div class="table-responsive">
            <table class="table table-bordered table-centered mb-1 mt-1" style="overflow: auto;">
           <thead>
          <tr class="main-title">
            <th width="2%">SL#</th>
            <th style="min-width: 250px;">Company Name</th>
             <th style="min-width: 250px;">Particulars</th>
            <th style="min-width: 150px;">Claim Type</th>
            <th style="min-width: 150px;">Claim By</th>
            <th style="min-width: 150px;">Advice No.</th>
            <th style="min-width: 150px;">Advice Date</th>
            <th style="min-width: 150px;">Expense Amount</th>
            <th style="min-width: 150px;">Parent Expense</th>
            <th style="min-width: 150px;">Status</th>
            <th class="text-center" style="min-width: 40px;">Action</th>
           </tr>
         </thead>
        <tbody>
            <?php $i=0;  ?>
         @if(isset($getAllRequest) && count($getAllRequest) >0)
          @foreach($getAllRequest as $key)
            <?php $i++; ?>
          <tr>
           <td>{{$i}}</td>   
           <td>{{'VENTURE SUPPLY Pvt Ltd'}}</td>  
          <td>
            @if($key->TYpe==2 )
            <b>{{$key->Title}}</b>
             @if($key->Title=="Expense Claim")

             <?php $Advice=DB::table('ImpTransactionDetailsExp')
        ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetailsExp.Debit_Reason')
        ->select('ImpTransactionDetailsExp.*','Dr1.Reason as DebitReason1')
        ->where('ImpTransactionDetailsExp.AdviceNo',$key->AdviceNo)->get(); 
        
        ?>
             @foreach($Advice as $sdv)
            <br>
            <b>{{$sdv->DebitReason1}} :</b> {{$sdv->Debit}}
            <br>
            <b>Ref. Type: </b>{{$sdv->Reason}}
            <br><b>Ref No: </b>{{$sdv->Remark}}
            <br><b>Desc: </b>{{$sdv->ExpRemark}}
            <br><b>From: </b>{{$sdv->FromDate}}
            <br><b>To: </b>{{$sdv->ToDate}}
            <div class="border border-light border-bottum w-100"></div>
            @endforeach
            @else
            <br>
            
            <b>Desc : </b>{{$key->Remark}}
            <br>
           
            @endif
          
            @else 
              <b>{{$key->Title}}</b>
            <br>
            <b>Desc: </b>{{$key->Remark}}
            @endif
           </td>      
           <td>{{$key->AccType}}</td>   
           <td> {{$key->DepoName}}</td>
           <td>
           {{$key->AdviceNo}}
           </td>   
           <td>{{$key->Date}}</td>   
           <td>{{$key->TotDeb}}</td> 
            <td>{{$key->Parent}}</td>
               
           <td>@if($key->status=='1'){{'Pending'}}  @elseif($key->status=='3') {{'Rejected'}} @else {{'Approved'}}  @endif</td>  
            <td><div class="d-flex justify-content-around" >
                @if($key->status=='1') 
                <button type="button" id="a{{$i}}" class="btn btn-primary btnSubmit" onclick="Approved('{{$key->AdviceNo}}');"  >Approve</button>
                 <button type="button" id="b{{$i}}" class="btn btn-danger btnSubmit ms-2" onclick="Reject('{{$key->AdviceNo}}');"  >Reject</button>
                  @elseif($key->status=='3')
                   <button style="cursor:no-drop;" type="button" id="b1{{$i}}" class="btn btn-danger btnSubmit"  >Rejected</button>
                @else
                 <button style="cursor:no-drop;" type="button" id="a1{{$i}}" class="btn btn-success btnSubmit"  >Approved</button>
                @endif
                </div>
         	</td>
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
    @if(isset($getAllRequest) && count($getAllRequest) >0) {{$getAllRequest->appends(Request::except('page'))->links()}}  @endif    
 
         </div>
       
        </div> 
        </div>
               </div>
             </div>
         </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<input id="depo" type="hidden" name="Depo">
        		<div class="mb-2 col-md-12">
                  <label for="example-select" class="form-label">Remarks</label>
                  <input type="text" tabindex="6" class="form-control" name="RemarkHo" id="RemarkHo">
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-12">
                  <label for="example-select" class="form-label">Amount</label>
                  <input type="text" tabindex="6" class="form-control" name="AmountHo" id="AmountHo">
                  <span class="error"></span>
               </div>
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="feedBackHo();" class="btn btn-primary">Save changes</button>
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
      

     });
     function modelopen(depoId) {
     	$("#exampleModal").modal('show');
     	$("#depo").val(depoId);
     	$("#statusByHo").val();
     }

     function feedBackHo(){
     	var depoId=	$("#depo").val();
     	var RemarkHo=	$("#RemarkHo").val();
     	var AmountHo=$("#AmountHo").val();
     	var pageReq= "HO";
     	Approved(depoId,RemarkHo,AmountHo,pageReq);
     }

     function Approved(depoId,RemHo=null,AmHo=null,pageReq=null){
		     	if(confirm("Are you sure")){


		     	var base_url = '{{url('')}}';
		       $.ajax({
		       type: 'POST',
		       headers: {
		         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
		       },
		       url: base_url + '/webadmin/PostExpenseRequestApproved',
		       cache: false,
		       data: {
		         'depoId':depoId,'RemarkHo':RemHo,'AmountHo':AmHo,'pageReq':pageReq
		       },
		        beforeSend: function() {
		      var id= $(".btnSubmit").attr("id");
		      $("#a"+id).attr("disabled", true);
		    	},
		       success: function(data) {
		         location.reload();
		       }
		     });
		   }
     }

     function Reject(depoId){
        if(confirm("Are you sure")){
            var base_url = '{{url('')}}';
               $.ajax({
               type: 'POST',
               headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
               },
               url: base_url + '/webadmin/PostExpenseRequestRejected',
               cache: false,
               data: {
                 'depoId':depoId
               },
                beforeSend: function() {
              var id= $(".btnSubmit").attr("id");
              $("#b"+id).prop("disabled", true);
                },
               success: function(data) {
                 location.reload();
               }
             });
        }

     }
  </script>
