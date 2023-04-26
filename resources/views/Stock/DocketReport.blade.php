@include('layouts.appTwo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row">
                     <div class="mb-2 col-md-2">
                        <input  value="{{request()->get('DocketNo')}}" type="text" name="DocketNo" class="form-control " placeholder="Docket No.">
                    </div>
                  <div class="mb-2 col-md-2">
                  <select name="offfcie" id="offfcie" class="form-control selectBox">
                    <option value="">Select Office</option>
                    @foreach($OfficeMaster as $office)
                    <option value="{{$office->id}}" @if(request()->get('offfcie') !='' && request()->get('offfcie')==$office->id){{'selected'}}@endif>{{$office->OfficeCode}} ~ {{$office->OfficeName}}</option>
                    @endforeach
                   </select>
                   </div>
                   <div class="mb-2 col-md-2">
                   <select name="DocketStatus" id="DocketStatus" class="form-control selectBox">
                    <option value="">Select Status</option>
                    @foreach($docketStatus as $status)
                    <option value="{{$status->status}}" @if(request()->get('DocketStatus') !='' && request()->get('DocketStatus')==$status->status){{'selected'}}@endif>{{$status->title}}</option>
                    @endforeach
                   </select>
                   </div>
                   <div class="mb-2 col-md-2">
                   <input value="{{request()->get('formDate')}}" type="text" name="formDate" class="form-control datepickerOne" placeholder="From Date" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input  value="{{request()->get('todate')}}" type="text" name="todate" class="form-control datepickerOne" placeholder="To Date" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-2">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            
            <th width="2%">SL#</th>
            <th width="5%">Docket</th>
            <th width="10%">Parent Office</th>
            <th width="10%">Branch Office</th>
            <th width="10%">Issue Date</th>
            <th width="8%">Book Date</th>	
            <th width="8%">Status</th>	
            <th width="10%">Remark</th>	
            <th width="10%">Attachment</th>	
            	
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; 
            $page=request()->get('page');
            if(isset($page) && $page>1){
                $page =$page-1;
            $i = intval($page*10);
            }
             else{
            $i=0;
            }
            ?>
            @foreach($docket as $docketList)
            <?php $i++; ?>
            <tr>
             <td>{{$i}}</td>
             <td>{{$docketList->Docket_No}}</td>
             <td>{{$docketList->ParentOffcieCode}} ~ {{$docketList->ParentOfficeName}}</td>
             <td>{{$docketList->OfficeCode}} ~ {{$docketList->OfficeName}}</td>
             <td>{{$docketList->IssueDate}}</td>
             <td>{{$docketList->BookDate}}</td>
             <td>{{$docketList->title}}
             
             </td>
             <td>{{$docketList->Remark}}</td>
             <td> @if(isset($docketList->file))
              <br>
              <a href="{{url($docketList->file)}}" target="_blank">Download </a>
              @endif</td>
           </tr>
           @endforeach
           
         </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {!! $docket->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      });
    $(".datepickerOne").val('{{date("Y-m-d")}}');

$(".selectBox").select2();
 function DepositeCashToHo()
 {
  // $(".btnSubmit").attr("disabled", true);
   if($('#projectCode').val()=='')
   {
      alert('please Enter project Code');
      return false;
   }
   if($('#projectName').val()=='')
   {
      alert('please Enter project Name');
      return false;
   }
   
    if($('#ProjectCategory').val()=='')
   {
      alert('please select Project Category');
      return false;
   }
   var projectCode=$('#projectCode').val();
   var projectName=$('#projectName').val();
   var ProjectCategory=$('#ProjectCategory').val();
   var Pid=$('#Pid').val();
 
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddProduct',
       cache: false,
       data: {
           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid
       },
       success: function(data) {
        location.reload();
       }
     });
  }  
  function viewproduct(productId)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewProduct',
       cache: false,
       data: {
           'productId':productId
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.projectCode').val(obj.ProductCode);
         $('.projectCode').attr('readonly', true);
         $('.projectName').val(obj.ProductName);
         $('.projectName').attr('readonly', true);
         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
         $('.ProjectCategory').attr('disabled', true);
      
       }
     });
  }
  function Editproduct(productId)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewProduct',
       cache: false,
       data: {
           'productId':productId
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.Pid').val(obj.id);
         $('.projectCode').val(obj.ProductCode);
         $('.projectCode').attr('readonly', false);
         $('.projectName').val(obj.ProductName);
         $('.projectName').attr('readonly', false);
         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
         $('.ProjectCategory').attr('disabled', false);
        
      
       }
     });
  }
</script>