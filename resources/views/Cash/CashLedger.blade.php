@include('layouts.appOne')
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
                           <select class="form-control" name="depo">
                            <option value="">Select Depo</option>  
                            @foreach($depo as $depos) 
                           <option value="{{$depos->DepoId}}" @if(isset($post_value['depo']) && $post_value['depo']==$depos->DepoId){{'selected'}}@endif>{{$depos->DepoName}}</option>  
                            @endforeach
                           </select>
                          </div>   
                          <div class="mb-2 col-md-3">
                              
                                <select name="transMod" class="form-control" id="Mode" tabindex="4" placeholder="Transfer Mode">
                                <option  value="">Select Mode</option>
                                <option @if(isset($post_value['transMod']) && $post_value['transMod']==1){{'selected'}}@endif  value="1">Cash</option>
                                <option @if(isset($post_value['transMod']) && $post_value['transMod']==2){{'selected'}}@endif  value="2">Bank</option>
                                <option  @if(isset($post_value['transMod']) && $post_value['transMod']==3){{'selected'}}@endif value="3">Happy Card</option>
                             </select>
                              
                       </div>
                          
                          <div class="mb-2 col-md-3">
                          
                          <input type="text"  class="form-control BillDate datepicker" name="from" id="BillDate" placeholder="from date" value="<?php if(isset($post_value['from'])){echo $post_value['from']; }?>" autocomplete="off">
                          
                        </div>
                          <div class="mb-2 col-md-3">
                         <input type="text" id="MainRate" name="to" class="form-control datepicker" placeholder="to date" value="<?php if(isset($post_value['to'])){echo $post_value['to']; }?>" placeholder="To" autocomplete="off">
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
                     <div class="mb-2 col-md-4"><b>@if(isset($TotalVlaue->TotalDebit))Total Debit :{{$TotalVlaue->TotalDebit }}@endif</b>
                     </div>
                      <div class="mb-2 col-md-4"><b>@if(isset($TotalVlaue->TotalCredit)) Total Credit :{{$TotalVlaue->TotalCredit }}@endif</b>
                     </div>
                      <div class="mb-2 col-md-4"><b>@if(isset($TotalBalance->TotBalance)) Balance  :{{$TotalBalance->TotBalance}} @endif</b>
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
            <th width="9%">Activity Date</th>
            <th width="30%">Particulars</th>
            <th width="10%">Voucher Type</th>
            <th width="8%">Voucher No</th>
            <th width="8%">Debit</th>
            <th width="8%">Credit</th>
            <th width="8%">Balance</th>
            <th width="9%">Entry Date</th>
            <th width="15%">Transfer Mode</th>
           </tr>
         </thead>
        <tbody>
            <?php $i=0; ?>
          @foreach($getAllDepo as $depoLadger)
           <?php $i++; ?>
          <tr>
           <td>{{$i}}</td>   
           <td>{{$depoLadger->Date}}</td>   
           <td>
            @if($depoLadger->TYpe==2 )
            <b>{{$depoLadger->Title}}</b>
             @if($depoLadger->Title=="Expense Claim")

             <?php $Advice=DB::table('ImpTransactionDetails')
        ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
        ->select('ImpTransactionDetails.*','Dr1.Reason as DebitReason1')
        ->where('ImpTransactionDetails.AdviceNo',$depoLadger->AdviceNo)->get(); 
        
        ?>
             @foreach($Advice as $sdv)
            <br>
            <b>{{$sdv->DebitReason1}} :</b> {{$sdv->Debit}}
            <br>
            <b>Ref. Type: </b>{{$sdv->Reason}}
            <br><b>Ref No: </b>{{$sdv->Remark}}
            <br><b>Desc: </b>{{$sdv->ExpRemark}}
            <br><b>Vehicle No.: </b>{{$sdv->vehicle}}
            <br><b>Trip No.: </b>{{$sdv->Tripno}}
            
            @endforeach
            @else
            <br>
            
            <b>Desc : </b>{{$depoLadger->Remark}}
           
            @endif
          
            @else 
              <b>{{$depoLadger->Title}}</b>
            <br>
            <b>Desc: </b>{{$depoLadger->Remark}}
             
                @if($depoLadger->Title=="Cash Deposit at Self")
                <br>
                <b>Trip No. : </b>{{$depoLadger->Tripno}}
                <br>
                
                <b>Vehicle No. : </b>{{$depoLadger->vehicle}}   
                @endif
            @endif
           </td>   
           <td> 
            @if($depoLadger->TYpe==2)
            {{'Payment'}}
            @else
             {{'Receipt'}}
            @endif

           </td>   
           
           <td>{{$depoLadger->AdviceNo}}</td>   
           <td>{{$depoLadger->TotalDebit}}</td>   
           <td>{{$depoLadger->TotalCredit}}</td>   
           <td> <?php $bal=explode("-",$depoLadger->TotBalance);?>{{min($bal)}}</td>   
           <td>{{date("d-m-Y", strtotime($depoLadger->CreatedDate))}}</td>  
           <td>{{$depoLadger->PayMode}}</td> 
          </tr>
          @endforeach      
       </tbody>
     </table>
                    </div>
                   </div>
                       <div class="dataTables_paginate paging_simple_numbers examinationList" id="customers2_paginate"> 
        <div id="pages" class="pagelist">
            <div class="text-center"> 
   @if(!empty($getAllDepo)) 
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

       $('.datepicker').datepicker({
          dateFormat: 'yy-mm-dd'
            });
    function getVendorDetails(id)
    {

  
     var base_url = '{{url('')}}';
      $.ajax({
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
      },
      url: base_url + '/webadmin/VendorListById',
      cache: false,
      data: {
        'VendorId':id
      },
      success: function(data) {
    

      }
    });
 

    }
    function gatAllRate()
    {
         var Rate=$('#MainRate').val()
         var gstper=$('#gstper').val()
          $('.MingstPer').val(gstper)
          $('.Rate').val(Rate);
           var gst=$('.gstper').val();
        if($('.QTY').val() !='')
        {
             var rate= $('#MainRate').val();
             var Qty= $('.QTY').val();
             var amt=rate*Qty;
             var gst=(gstper*amt)/100;
             $('.Amount').val(amt);
             $('.total').val('');

             
        }
      
    } 
      function gatAllGst()
    {
         var Rate=$('#MainRate').val()
         var gstper=$('#gstper').val()
          $('.MingstPer').val(gstper)
          var gst=$('.gstper').val();
          if($('.QTY').val() !='')
          {
             var rate= $('#MainRate').val();
             var Qty= $('.QTY').val();
             var amt=rate*Qty;
             var gst=(gstper*amt)/100;
             $('.Amount').val(amt);
             $('.total').val('');

             
        }
      
    }
    function calculateAmount(Rate)
    {
       
        if($('.QTY').val() =='')
        {
            alert('Please Enter Diesel QTY');
            return false;
        }
        var Qty= $('.QTY').val();
        var MingstPer= $('.MingstPer').val();
      
        var amt=Rate*Qty;
        var gst=(MingstPer*amt)/100;
        $('.Amount').val(amt);
         var  finaltotal=parseFloat(gst)+parseFloat(amt);
        $('.total').val(finaltotal);

    }
    function AddBill()
    {
       
        if($('#BillNo').val() =='')
        {
           
            alert('Please Enter Bill No');
            return false;
        }if($('#BillDate').val() =='')
        {
           
            alert('Please Enter Bill Date');
            return false;
        }
        if($('#FillDate').val() =='')
        {
           
            alert('Please Enter Fill Date');
            return false;
        }
        if($('#Vehicle').val() =='')
        {
           
            alert('Please Enter Vehicle');
            return false;
        }
         if($('#BN').val() =='')
        {
           
            alert('Please Enter B N');
            return false;
        }
        if($('#QTY').val() =='')
        {
           
            alert('Please Enter QTY');
            return false;
        } 
        if($('#Rate').val() =='')
        {
            
            alert('Please Enter Rate');
            return false;
        }
         var Rate=$('.Rate').val();
         var MingstPer=$('#MingstPer').val();
         
         calculateAmount(Rate);
        if($('.Amount').val() =='')
        {

            alert('Please Enter Amount');
            return false;
        }

         var total=$('#total').val();
         var fillingDate=$('#FillDate').val();
         var Vehicle=$('#Vehicle').val();
         var BN=$('#BN').val();
         var QTY=$('#QTY').val();
         var BillNo=$('#BillNo').val();
          var BillDate= $('#BillDate').val();
          var Vendorid= 1;
        
         var Amount=$('#Amount').val();
         var base_url = '{{url('')}}';
              $.ajax({
              type: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
              },
              url: base_url + '/webadmin/PostVendorBilling',
              cache: false,
              data: {
                'fillingDate':fillingDate,'Vehicle':Vehicle,'BN':BN,'QTY':QTY,'Rate':Rate,'Amount':Amount,'BillNo':BillNo,'BillDate':BillDate,'Vendorid':Vendorid,'MingstPer':MingstPer,'total':total
              },
              success: function(data) {
                $('#trAdd').html(data);
              if(data)
              {
                $('#FillDate').val('');
                $('.Vehicle').val(null).trigger('change');
                $('#BN').val('');
                $('#QTY').val('');
                var rate= $('#MainRate').val();
                $('.Rate').val(rate);
                $('.total').val('');
                $('#Amount').val('');
                $('.BillNo').attr("disabled", true) 
                $('.BillDate').attr("disabled", true) 
              }
              else
              {
                alert('Somthing went to wrong');
                return false;
              }

              }
            });
        }
        function deletelane(id,vcid)
        {
              var base_url = '{{url('')}}';
              $.ajax({
              type: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
              },
              url: base_url + '/webadmin/deletelane',
              cache: false,
              data: {
                'id':id,'vcid':vcid
              },
              success: function(data) {
                $('#trAdd').html(data);
               }
            });
        }
        function addDiscount(id)
        {
           var base_url = '{{url('')}}';
              $.ajax({
              type: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
              },
              url: base_url + '/webadmin/AddDiescount',
              cache: false,
              data: {
                'id':id
              },
              success: function(data) {
               $('#DiscountModel').html(data);
               }
            });
        }
</script>