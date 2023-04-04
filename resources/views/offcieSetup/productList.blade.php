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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Product Code<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="1" class="form-control projectCode" name="projectCode" id="projectCode" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password"> Product Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control projectName" name="projectName" id="projectName" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-3">
                                                <label class="col-md-4 col-form-label" for="password">Product Category<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select id="ProjectCategory" tabindex="3" class="form-control selectBox ProjectCategory">
                                                <option value="">Select Category</option>
                                                <option value="PTL">PTL</option>
                                                <option value="FTL">FTL</option>
                                                <option value="WAREHOUSE">WAREHOUSE</option>
                                             </select>
                                                </div>
                                            </div>
                                            </div>
                                          
                                               <div class="col-6 text-end">
                                            <div class="row mb-1">
                                             
                                                <div class="col-md-12 col-md-offset-3">
                                                <input type="button" tabindex="4" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="DepositeCashToHo()">
                                                <a href="{{url('ProductMaster')}}" tabindex="5" class="btn btn-primary">Cancel</a>
                                                <span class="error"></span>
                                                </div>
                                            </div>

                                            
                                        </div> <!-- end col -->
                                        </div>
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
<div class="card-body">
<div class="tab-content">
  <div class="tab-pane show active" id="input-types-preview">
      <div class="row">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="6">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="7">Submit</button>
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
            <th width="2%">ACTION</th>
            <th width="2%">SL#</th>
            <th width="10%">Product Code</th>
            <th width="10%">Product Name</th>
            <th width="10%">Product Category</th>
            
         
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($product as $Por)
            <?php $i++; ?>
            <tr>
            <td><a href="javascript:void(0)" onclick="viewproduct('{{$Por->id}}')">View</a> | <a href="javascript:void(0)" onclick="Editproduct('{{$Por->id}}')">Edit</a></td>
            <td>{{$i}}</td>
            <td>{{$Por->ProductCode}}</td>
            <td>{{$Por->ProductName}}</td>
            <td>{{$Por->ProductCategory}}</td>
            
            <tr>
            @endforeach
         </tbody>
        </table>
        <div class="d-flex d-flex justify-content-between">
        {!! $product->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>

               

 <script>$('.selectBox').select2();</script>
<script type="text/javascript">

    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });

 function DepositeCashToHo()
 {
  // $(".btnSubmit").attr("disabled", true);
   if($('#projectCode').val()=='')
   {
      alert('please Enter Product Code');
      return false;
   }
   if($('#projectName').val()=='')
   {
      alert('please Enter Product Name');
      return false;
   }
   
    if($('#ProjectCategory').val()=='')
   {
      alert('please select Product Category');
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
         $(".btnSubmit").attr("disabled", true);
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
         $(".btnSubmit").attr("disabled", false);
      
       }
     });
  }
</script>