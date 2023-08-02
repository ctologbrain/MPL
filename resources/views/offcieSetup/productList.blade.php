@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Office</a></li>
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
    <div class="row pl-pr mt-1">
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
                                                <label class="col-md-4 col-form-label text-end" for="password"> Product Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control projectName" name="projectName" id="projectName" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-3">
                                                <label class="col-md-4 col-form-label" for="password">Product Category<span
                                            class="error"></span></label>
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

                                            <div class=" col-md-6">
                                               <div class="row mb-1">
                                            <label for="example-select" class="col-md-4 col-form-label text-end d-flex align-items-center justify-content-end">Active <input tabindex="4" type="checkbox" id="ProductActive" name="ProductActive" value="1" class="ProductActive ml-1">
                                                <span class="error"></span></label>
                                                
                                                 <div class="col-md-8 text-end">
                                                <input type="button" tabindex="5" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="DepositeCashToHo()">
                                                <a href="{{url('ProductMaster')}}" tabindex="6" class="btn btn-primary">Cancel</a>
                                                <span class="error"></span>
                                                </div>
                                              </div>
                                            </div>
                                          
                                              

                                            
                                        
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
      <div class="row pl-pr mt-1">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="7">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="8">Search</button>
                           <input type="submit" name="submit" value="Download" class="btn btn-primary" tabindex="9">
                          </div> 
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
            <th width="2%" class="p-1">ACTION</th>
            <th width="2%" class="p-1">SL#</th>
            <th width="10%" class="p-1">Product Code</th>
            <th width="10%" class="p-1">Product Name</th>
            <th width="10%" class="p-1">Product Category</th>
            <th width="10%" class="p-1">Active</th>
         
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
            @foreach($product as $Por)
            <?php $i++; 
            if($Por->ProductActive){
                $active ='YES';
            }
            else{
                 $active ='No';
            }
            ?>
            <tr>
            <td class="p-1"><a href="javascript:void(0)" onclick="viewproduct('{{$Por->id}}')">View</a> | <a href="javascript:void(0)" onclick="Editproduct('{{$Por->id}}')">Edit</a></td>
            <td class="p-1">{{$i}}</td>
            <td class="p-1">{{$Por->ProductCode}}</td>
            <td class="p-1">{{$Por->ProductName}}</td>
            <td class="p-1">{{$Por->ProductCategory}}</td>
            <td class="p-1">{{$active}}</td>
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
          dateFormat: 'dd-mm-yy'
      });

 function DepositeCashToHo()
 {
  // $(".btnSubmit").attr("disabled", true);
   if($('#projectCode').val()=='')
   {
      alert('Please Enter Product Code');
      return false;
   }
   if($('#projectName').val()=='')
   {
      alert('Please Enter Product Name');
      return false;
   }
   
  
   var projectCode=$('#projectCode').val();
   var projectName=$('#projectName').val();
   var ProjectCategory=$('#ProjectCategory').val();
  var ProductActive =$('#ProductActive').val();
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
           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid,'ProductActive':ProductActive
       },
       success: function(data) {

          if(data=='false'){
                alert('Product Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
            }
            else{
                alert(data);
                location.reload();
            }
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
         if(obj.ProductActive){
            $('#ProductActive').prop('checked',true);
         }
         else{
            $('#ProductActive').prop('checked',false);
         }
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
         if(obj.ProductActive){
            $('#ProductActive').prop('checked',true);
         }
         else{
            $('#ProductActive').prop('checked',false);
         }
         $(".btnSubmit").attr("disabled", false);
      
       }
     });
  }
</script>