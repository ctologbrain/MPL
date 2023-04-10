@include('layouts.app')
<div class="generator-container allLists">
<div class="row">
   <div class="col-12">
      <div class="page-title-box main-title">
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
               <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
               <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
         </div>
         <h4 class="page-title">{{$title}}</h4>
      </div>
   </div>
</div>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
  
   <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
    <div class="tab-content">
         <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
            <div class="mb-2 col-md-2"></div>
            <div class="mb-2 col-md-4">
               <label for="example-select" class="form-label">Proof Code<span class="error">*</span></label>
                  <input type="text" tabindex="1" class="form-control ProofCode" name="ProofCode" id="ProofCode" >
                  <input type="hidden" tabindex="1" class="form-control Pci" name="Rid" id="Pci" >
                  <span class="error"></span>
                </div>
               <div class="mb-2 col-md-4">
                  <label for="example-select" class="form-label">Proof Name<span class="error">*</span></label>
                  <input type="text" tabindex="2" class="form-control ProofName" name="ProofName" id="ProofName" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-2"></div>
               <div class="mb-2 col-md-2"></div>
            <div class="mb-2 col-md-3">
               <label for="example-select" class="form-label">Proof Detail Require</label><br>
               <input type="checkbox" id="NDRReason" name="Pdr" value="Pdr" class="Pdr" tabindex="3">
                  <span class="error"></span>
                </div>
                <div class="mb-2 col-md-3">
               <label for="example-select" class="form-label">Active</label><br>
               <input type="checkbox" id="NDRReason" name="Active" value="Active" tabindex="4" class="Active">
                  <span class="error"></span>
                </div>
                <div class="mb-2 col-md-3">
               <label for="example-select" class="form-label">Default</label><br>
               <input type="checkbox" id="NDRReason" name="Default" value="Default" class="Default" tabindex="5">
                  <span class="error"></span>
                </div>
                 <div class="mb-2 col-md-2"></div>
              
               <div class="mb-2 col-md-2">
              </div>
                    
                <div class="mb-2 col-md-2">
                <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="AddDeliveryProof()" tabindex="6">
                  <a href="{{url('ViewDeliveryProof')}}" class="btn btn-primary mt-3" tabindex="7">Cancel</a>
               </div>
               </div>
               
              <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
               <form action="" method="GET">
          @csrf
          @method('GET')
          </div>
            </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="tab-content">
            <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
                  <div class="mb-2 col-md-3">
                   <input value="{{Request()->get('search')}}" type="text"  class="form-control BillDate" name="search"  placeholder="Search"  autocomplete="off" tabindex="8">
                   </div>
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="9">Search</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
           <tr>
            <th width="3%">ACTION</th>
            <th width="2%">SL#</th>
            <th width="8%">Proof Code</th>
            <th width="10%">Proof Name</th>
            <th width="10%">Detail Required</th>
            <th width="10%">Active</th>
            <th width="10%">Default</th>
           
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
            @foreach($DpMaster as $master)
             <?php $i++; ?>
            <tr>
            <td><a href="javascript:void(0)" onclick="viewDpmaster('{{$master->id}}')">View</a>/<a href="javascript:void(0)" onclick="EditDpmaster('{{$master->id}}')">Edit</a></td>
            <td>{{$i}}</td> 
            <td>{{$master->ProofCode}}</td>
            <td>{{$master->ProofName}}</td>
            <td>{{$master->Pdr}}</td>
            <td>{{$master->Active}}</td>
            <td>{{$master->Default}}</td>
          </tr>
            @endforeach
          
         </tbody>
        </table>
           </div>
         </div>
        {{ $DpMaster->appends(Request::except('page'))->links() }}
        
    </div>

</div>
 </div>
</div>
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });

 function AddDeliveryProof()
 {
   if($('#ProofCode').val()=='')
   {
      alert('please Enter Proofe Code');
      return false;
   }
   if($('#ProofName').val()=='')
   {
      alert('please Enter Proofe Name');
      return false;
   }
    var ProofCode=$('#ProofCode').val();
    var ProofName=$('#ProofName').val();
    var Pdr=$("input[name=Pdr]:checked").val();
    var Active=$("input[name=Active]:checked").val();
    var Default=$("input[name=Default]:checked").val();
    var Pci=$('#Pci').val();
    $(".btnSubmit").attr("disabled", true);
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddDeliveryProof',
       cache: false,
       data: {
           'ProofCode':ProofCode,'ProofName':ProofName,'Pdr':Pdr,'Active':Active,'Default':Default,'Pci':Pci
       },
       success: function(data) {
         alert(data);
        location.reload();
       }
     });
  }  
  function viewDpmaster(id)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewDpMaster',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
        
         const obj = JSON.parse(data);
         $('.ProofCode').val(obj.ProofCode);
         $('.ProofCode').attr('readonly', true);
         $('.ProofName').val(obj.ProofName);
         $('.ProofName').attr('readonly', true);
         if(obj.Pdr =='Yes')
         {
            $('.Pdr').prop('checked', true);
         }
         else
         {
            $('.Pdr').prop('checked', false);
         }
          $('.Pdr').attr('disabled', true);
          if(obj.Active =='Yes')
         {
            $('.Active').prop('checked', true);
         }
         else
         {
            $('.Active').prop('checked', false);
         }
          $('.Active').attr('disabled', true);
          if(obj.Default =='Yes')
         {
            $('.Default').prop('checked', true);
         }
         else
         {
            $('.Default').prop('checked', false);
         }
          $('.Default').attr('disabled', true);
           $(".btnSubmit").attr("disabled", true);
              $("html, body").animate({ scrollTop: 0 }, "fast");
      
       }
     });
  }
  function EditDpmaster(id)
  {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewDpMaster',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.Pci').val(obj.id);
        $('.ProofCode').val(obj.ProofCode);
         $('.ProofCode').attr('readonly', false);
         $('.ProofName').val(obj.ProofName);
         $('.ProofName').attr('readonly', false);
         if(obj.Pdr =='Yes')
         {
            $('.Pdr').prop('checked', true);
         }
         else
         {
            $('.Pdr').prop('checked', false);
         }
          $('.Pdr').attr('disabled', false);
          if(obj.Active =='Yes')
         {
            $('.Active').prop('checked', true);
         }
         else
         {
            $('.Active').prop('checked', false);
         }
          $('.Active').attr('disabled', false);
          if(obj.Default =='Yes')
         {
            $('.Default').prop('checked', true);
         }
         else
         {
            $('.Default').prop('checked', false);
         }
          $('.Default').attr('disabled', false);
        
         $(".btnSubmit").attr("disabled", false);
         $("html, body").animate({ scrollTop: 0 }, "fast");
      
       }
     });
        
      
      
  }
</script>