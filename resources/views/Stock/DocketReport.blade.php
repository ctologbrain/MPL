@include('layouts.appTwo')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
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
    <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row pl-pr mt-1">
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
                   <input @if(request()->get('formDate')!='')  value="{{request()->get('formDate')}}"  @endif type="text" name="formDate" class="form-control datepickerOne" placeholder="From Date" autocomplete="off">
                   </div>
                   <div class="mb-2 col-md-2">
                   <input @if(request()->get('todate')!='')    value="{{request()->get('todate')}}"  @endif type="text" name="todate" class="form-control datepickerOne" placeholder="To Date" autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-2">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary">
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            
            <th width="2%" class="p-1">SL#</th>
            <th width="5%" class="p-1">Docket</th>
            <th width="10%" class="p-1">Parent Office</th>
            <th width="10%" class="p-1">Branch Office</th>
            <th width="10%" class="p-1">Issue Date</th>
            <th width="8%" class="p-1">Book Date</th>	
            <th width="8%" class="p-1">Status</th>	
            <th width="10%" class="p-1">Remark</th>	
            <th width="10%" class="p-1">Attachment</th>	
            	
            
         
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
             <td class="p-1">{{$i}}</td>
             <td class="p-1">{{$docketList->Docket_No}}</td>
             <td class="p-1">{{$docketList->ParentOffcieCode}} ~ {{$docketList->ParentOfficeName}}</td>
             <td class="p-1">{{$docketList->OfficeCode}} ~ {{$docketList->OfficeName}}</td>
             <td class="p-1">@if(isset($docketList->IssueDate)) {{date("d-m-Y",strtotime($docketList->IssueDate))}} @endif</td>
             <td class="p-1">@if(isset($docketList->BookDate)) {{date("d-m-Y",strtotime($docketList->BookDate))}} @endif</td>
             <td class="p-1">{{$docketList->title}}
             
             </td>
             <td class="p-1">{{$docketList->Remark}}</td>
             <td class="p-1"> @if(isset($docketList->file))
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
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
      });
    

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