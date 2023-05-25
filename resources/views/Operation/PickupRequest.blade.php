@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">PICKUP REQUEST</li>
                    </ol>
                </div>
                <h4 class="page-title">PICKUP REQUEST</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div  class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Option<span
                                            class="error">*</span></label>
                                                <div class="col-md-5">
                                                <input onclick="cahngePage('ExcelOne');" type="radio" class="Option" name="Option" id="excel" tabindex="1" checked>
                                                <label for="excel">Excel</label>
                                            
                                             &nbsp;
                                                <input onclick="cahngePage('manualTwo');" type="radio" class="Option" id="manual" name="Option" tabindex="2" >
                                                <label for="manual">Manual</label>
                                                
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-2">
                                            </div>
                                             <div class="col-5">
                                            
                                            </div>

                                            <hr>
                                            <div class="row d-none" id="manualTwo">

                                            <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="    request_number">Request Number<span
                                            class="error">*</span></label>
                                                <div class="col-md-5">
                                                <input readonly type="text" name="request_number"class="form-control  request_number" id="request_number" tabindex="3">
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                             <div class="col-2">
                                            </div>


                                             <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="pickup_date">Pickup Date<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                                <input type="text" name="pickup_date" tabindex="4"
                                                    class="form-control pickup_date datepickerOne" id="pickup_date">
                                                <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                            </div>
                                            <label class="col-md-2 col-form-label" for="pickup_time">Time<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                                <input type="time" name="pickup_time" tabindex="5"
                                                    class="form-control pickup_time" id="pickup_time">
                                            </div>
                                            </div>
                                        </div>


                                             <div class="col-5">

                                                <div class="row">
                                                     <label class="col-md-4 col-form-label" for="sale_refere">Sale Reference<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <select onchange="getFocused();" name="sale_refere" tabindex="6"
                                                    class="form-control selectBox sale_refere" id="sale_refere">
                                                    <option value="">--Select--</option>
                                                    <option value="WEB">WEB</option>
                                                    <option value="EMAIL">EMAIL</option>
                                                    <option value="EMPLOYEE">EMPLOYEE</option>
                                                    

                                                     </select>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-2">
                                            </div>

                                            <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="reference_name">Reference Name<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="reference_name" tabindex="7"
                                                    class="form-control reference_name" id="reference_name" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                     
                                            
                                                <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="customer_name">Customer Name<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                  <select name="customer_name" tabindex="8"
                                                    class="form-control selectBox customer_name" id="customer_name">
                                                    <option value="">--Select--</option>
                                                    @foreach($customer as $key)
                                                    <option value="{{$key->id}}">{{$key->CustomerCode}} ~ {{$key->CustomerName}}</option>
                                                    @endforeach
                                                     </select>
    

                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-2">
                                            </div>

                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="bill_to">Bill To<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="bill_to" tabindex="9"
                                                    class="form-control bill_to" id="bill_to" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row back-color">
                                            <div class="col-6 text-center"><h4>Pickup Details</h4></div>
                                            <div class="col-6 text-center"><h4>Other Details</h4></div>
                                        </div>
                                    </div>

                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="store_name">Store/Warehouse Name<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="store_name" tabindex="10"
                                                    class="form-control store_name" id="store_name" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                            </div>

                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="pincode">Destination Pincode/City<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                            
                                                  <select name="pincode" tabindex="11"
                                                    class="form-control selectBox pincode" id="pincode">
                                                    <option value="">--Select--</option>
                                                    @foreach($destpincode as $key)
                                                    <option value="{{$key->id}}">{{$key->PinCode}}- {{$key->Code}} ~ {{$key->CityName}}</option>
                                                    @endforeach
                                                </select>
                                              

                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="warehouse_address">Warehouse Address<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="warehouse_address" tabindex="12"
                                                    class="form-control warehouse_address" id="warehouse_address" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                            </div>

                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="pieces">Pieces<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-2
                                                  ">
                                                <input type="text" name="pieces" tabindex="13"
                                                    class="form-control pieces" id="pieces" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                    

                                     <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="origin_pincode">Origin Pincode/City<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                  
                                                  <select name="origin_pincode" tabindex="14"
                                                    class="form-control selectBox origin_pincode" id="origin_pincode">
                                                    <option value="">--Select--</option>
                                                    @foreach($pincode as $key)
                                                    <option value="{{$key->id}}">{{$key->PinCode}}- {{$key->Code}} ~ {{$key->CityName}}</option>
                                                    @endforeach
                                                     </select>


                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-2">
                                            </div>

                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="weight">Weight (KG)<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-3">

                                                    <input type="text" name="weight" tabindex="15"
                                                    class="form-control weight" id="weight" onchange=""> 
                                                
                                                   
                                                    </div>
                                                 
                                        </div>
                                    </div>
                                   

                                    <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="contactPersonName">Contact Person Name<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="contactPersonName" tabindex="16"
                                                    class="form-control contactPersonName" id="contactPersonName" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-2">
                                            </div>
                                     <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="volumetric">Volumetric<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-2
                                                  ">
                                                <input readonly value="N" type="text" name="volumetric" tabindex="17"
                                                    class="form-control volumetric" id="valumetric" onchange="" placeholder="N">

                                            </div>
                                            <label class="col-md-4 col-form-label" for="volumetric_weight">Volumetric Weight<span
                                                    class="error">*</span></label>
                                                    <div class="col-md-2
                                                  ">
                                                <input type="text" name="volumetric_weight" tabindex="18"
                                                    class="form-control volumetric_weight" id="volumetric_weight" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                    
                                            
                                           
                                         <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="mobile_no">Mobile Number<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="text" name="mobile_no" tabindex="19"
                                                    class="form-control mobile_no" id="mobile_no" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-2">
                                            </div>


                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="content">Content<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                  
                                                  <select name="content" tabindex="20"
                                                    class="form-control selectBox content" id="content">
                                                    <option value="">--Select--</option>
                                                    @foreach($ContentsMaster as $key)
                                                    <option value="{{$key->id}}">{{$key->Contents}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-2">
                                            </div>




                                        <div class="col-5"></div>


                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="remark">Remarks<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <Textarea class="form-control remark"
                                                            placeholder="Remark"  tabindex="21"  name="remark" id="remark"></Textarea>

                                            </div>
                                        </div>
                                    </div>

                                    


                                     <div class="col-12 mb-1 mt-1">
                                                <div class="row text-end">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <div class="col-md-8">
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="22" value="Generate Request" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="PostPickupRequest()">
                                            <a href="{{url('PickupRequest')}}" tabindex="23" class="btn btn-primary">Refresh</a>
                                            </div>

                                            </div>
                                        </div>

                                         
                                         
                                         
                                             
                                        </div>
                                        </div>
                                        <div class="row" id="ExcelOne">
                                        <div class="col-5">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="mobile_no">Choose File<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8
                                                  ">
                                                <input type="file" name="mobile_no" tabindex="19"
                                                    class="form-control mobile_no" id="mobile_no" onchange="">

                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-6 mb-1 mt-1">
                                                <div class="row text-end">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <div class="col-md-8">
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="22" value="Upload" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="ImportFile()">
                                            <a href="{{url('PickupRequest')}}" tabindex="23" class="btn btn-primary">Refresh</a>
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
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                        <div class="row tabels">
                        </div>
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
$(".selectBox").select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          autoclose:true,
          todayHighlight:true
      });
    $("#pickup_date").val("{{date('d-m-Y')}}");

            

function getFocused(){ 
    $("#reference_name").val('');
    document.getElementById("reference_name").focus();
}



function PostPickupRequest()
 {
  
   if($('#pickup_date').val()=='')
   {
      alert('Please Enter Pickup Date');
      return false;
   }

   if($('#pickup_time').val()=='')
   {
      alert('Please Enter Pickup Time');
      return false;
   }
   
    if($('#sale_refere').val()=='')
    {
      alert('Please select Sale Refere');
      return false;
    }

    if($('#reference_name').val()=='')
    {
      alert('Please Enter Reperence Name');
      return false;
    }

    if($('#customer_name').val()=='')
    {
      alert('Please Enter Customer Name');
      return false;
    }
    if($('#bill_to').val()=='')
    {
      alert('Please Enter Bill To');
      return false;
    }
    if($('#store_name').val()=='')
    {
      alert('please Enter Store Name');
      return false;
    }

    if($('#pincode').val()=='')
    {
      alert('please Enter Pincode');
      return false;
    }

    if($('#warehouse_address').val()=='')
    {
      alert('please Enter Warehouse Address');
      return false;
    }

    var  request_number = $('#request_number').val();
    var pickup_date  = $('#pickup_date').val();
    var pickup_time = $('#pickup_time').val();
    var sale_refere = $('#sale_refere').val();
    var reference_name = $('#reference_name').val();
    var customer_name = $('#customer_name').val();
    var bill_to = $('#bill_to').val();
    var store_name = $('#store_name').val();
    var pincode = $('#pincode').val();
    var warehouse_address = $('#warehouse_address').val();
    var pieces = $('#pieces').val();
    var origin_pincode = $('#origin_pincode').val();
    var weight = $('#weight').val();
    var contactPersonName = $('#contactPersonName').val();
    var valumetric = $('#valumetric').val();
    var volumetric_weight = $('#volumetric_weight').val();
    var mobile_no = $('#mobile_no').val();
    var content = $('#content').val();
    var remark = $('#remark').val();
 
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PickupRequestPost',
       cache: false,
       data: {
            'request_number':request_number,
            'pickup_date':pickup_date,
            'sale_refere':sale_refere,'reference_name':reference_name ,
            'customer_name':customer_name,
            'bill_to':bill_to,
            'store_name':store_name,
            'pincode':pincode,
            'warehouse_address':warehouse_address,
            'pieces':pieces,
            'origin_pincode':origin_pincode,
            'weight':weight,
            'contactPersonName':contactPersonName,
            'valumetric':valumetric,
            'volumetric_weight':volumetric_weight,
            'mobile_no':mobile_no,
            'content':content,
            'remark':remark
       },
       success: function(data) {
        location.reload();
       }
     });
  }  

function cahngePage(idToShow){
    if(idToShow=='manualTwo'){ 
    $("#manualTwo").removeClass("d-none");
    $("#ExcelOne").addClass("d-none");
    }
    else{
        $("#manualTwo").addClass("d-none");
        $("#ExcelOne").removeClass("d-none");
    }
}
  


 
</script>