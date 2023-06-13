@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">DOCUMENT DISPATCH</h4>
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
                                                <label class="col-md-4 col-form-label" for="userName">Dispatch No</label>
                                                <div class="col-md-8">
                                                <input readonly type="text" tabindex="1" class="form-control dispatch_no" name="dispatch_no" id="dispatch_no" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password"> Dispatch Date<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control dispatch_date datepickerOne" name="dispatch_date" id="dispatch_date" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Destination Office<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select id="destination_office" tabindex="3" class="form-control selectBox destination_office" name="destination_office">
                                                <option value="">Select Category</option>
                                                @foreach($Office as $key) 
                                                <option value="{{$key->id}}"> {{$key->OfficeCode}} ~  {{$key->OfficeName}}</option>
                                                @endforeach
                                             </select>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Courier Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="4" class="form-control courier_no" name="courier_no" id="courier_no" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>

                                             <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">AWB No<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="5" class="form-control awb_no" name="awb_no" id="awb_no" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>

                                             <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Courier Charges</label>
                                                <div class="col-md-4">
                                                <input type="number" tabindex="6" class="form-control courier_chrg" name="courier_chrg" id="courier_chrg" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
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
      <div class="row">
                  
                    </form>
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="back-color">
            <th width="25%">Document Name<span class="error">*</span></th>
            <th width="25%">Remarks</th>
            <th width="25%">Select Document<span class="error">*</span></th>
            <th width="25%">Add</th>
           
            
         
           </tr>
         </thead>
         <tbody id="getAppend">
           
            <tr >
            <td class="text-center"> 
                <select id="document_name0" tabindex="7" class="form-control selectBox document_name" name="document_name0">
                    <option value="">Select Document</option>
                    @foreach($Document as $key) 
                    <option value="{{$key->id}}"> {{$key->DocumentCode}} ~  {{$key->DocumentName}}</option>
                    @endforeach
                </select>
            </td>
            <td class="text-center"><input type="text" class="form-control remark" name="remark0" id="remark0" tabindex="8"></td>
            <td class="text-center"><input type="file" class="file" id="file0" name="file0" tabindex="9"></td>
            <td class="text-center"><button onclick="AddMore();" type="button" class="btn btn-primary" tabindex="10">Add</button></td>
          
            
            </tr>
           <tr>
            <td colspan="4">
               <input type="button" tabindex="11" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="Submitdata()">
                <a href="{{url('DocumentDispatchs')}}" tabindex="12" class="btn btn-primary">Reset All</a>
            </td>
           </tr>
         </tbody>
        </table>
       
        
        </div> <!-- end col -->
      

    </div>
</div>

               

 <script>$('.selectBox').select2();</script>
<script type="text/javascript">

    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });

 function Submitdata()
 {
  
  if($('#dispatch_date').val()=='')
   {
      alert('please Enter Dispatch Date');
      return false;
   }
   if($('#destination_office').val()=='')
   {
      alert('please Enter Destination Office');
      return false;
   }
   if($('#courier_no').val()=='')
   {
      alert('please Enter Courier No');
      return false;
   }
   
    if($('#awb_no').val()=='')
   {
      alert('please Enter Docket Number');
      return false;
   }
   if($('#courier_chrg').val()=='')
   {
      alert('please Enter Courier Charge');
      return false;
   }

   if($('#document_name0').val()=='')
   {
      alert('please Enter Document Number');
      return false;
   }
   if($('#file0').val()=='')
   {
      alert('please Choose  File');
      return false;
   }

   
// remark0


   var allDoc =[];
   $(".document_name").each(function(i) {
    allDoc.push($(this).attr("id"));
    ++i;
   });

   var allfile =[];
   $(".file").each(function(i) {
    allfile.push($(this).attr("id"));
    ++i;
   });

   var allRemark =[];
   $(".remark").each(function(i) {
    allRemark.push($(this).attr("id"));
    ++i;
   });

for(var i=0; i < allDoc.length; i++){
    if($("#"+allDoc[i]).val()==""){
        alert('please Enter Document Name');
      return false;
    }

    if($("#"+allfile[i]).val()==""){
        alert('please Choose File');
         return false;
    }
}

   
   var dispatch_date=$('#dispatch_date').val();
   var destination_office=$('#destination_office').val();
   var courier_no=$('#courier_no').val();
   var awb_no=$('#awb_no').val();
   var courier_chrg=$('#courier_chrg').val();


   var courier_no=$('#courier_no').val();
  

 var form = new FormData();
 form.append("dispatch_date",dispatch_date);
 form.append("destination_office",destination_office);
 form.append("courier_no",courier_no);
 form.append("awb_no",awb_no);
 form.append("courier_chrg",courier_chrg);
 for(var i=0;  i < allDoc.length; i++){
    form.append("Documents["+i+"][DocumentName]", $("#"+allDoc[i]).val());
    form.append("Documents["+i+"][Remark]", $("#"+allRemark[i]).val());
    form.append("fileImage"+i, $("#"+allfile[i])[0].files[0]);
}

      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DocumentDispatchPost',
       cache: false,
       processData: false,
       contentType: false,
       data:form,
       success: function(data) {
           alert(data);
        location.reload();
       }
     });
  }  
  
  var i=0
  function AddMore(){
    ++i;
    var app = `
    <tr id="`+i+`">
    <td class="text-center"> 
        <select id="document_name`+i+`" tabindex="7" class="form-control selectBox document_name" name="document_name`+i+`">
            <option value="">Select Document</option>
            @foreach($Document as $key) 
            <option value="{{$key->id}}"> {{$key->DocumentCode}} ~  {{$key->DocumentName}}</option>
            @endforeach
        </select>
    </td>
    <td class="text-center"><input type="text" class="form-control remark" name="remark`+i+`" id="remark`+i+`" tabindex="8"></td>
    <td class="text-center"><input type="file" class="file" id="file`+i+`" name="file`+i+`" tabindex="9"></td>
    <td class="text-center"><button onclick="remove('`+i+`');" type="button" class="btn btn-primary" tabindex="10">Remove</button></td>
    
    
    </tr>
    `;
    $("#getAppend").append(app);
  }

  function remove(getId){
    $("#"+getId).remove();
  }
</script>