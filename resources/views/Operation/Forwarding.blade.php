@include('layouts.appTwo')

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
                <h4 class="page-title">3PL FORWARDING</h4>
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
                                        <div class="col-4">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="forwarding_date"><b>Forwarding Date</b><span
                                                 class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text" tabindex="1" class="form-control datepickerOne forwarding_date" name="scanDate" id="forwarding_date" >
                                                <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="customer_name"><b>Customer Name:</b></label>
                                                <div class="col-md-7" id="customer_name">
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row">
                                                <label class="col-md-7 col-form-label" for="product_name"><b>Product Name:</b></label>
                                                <div class="col-md-5" id="product_name">
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="ewaybill_no"><b>eWaybill Number:</b></label>
                                                <div class="col-md-7" id="ewaybill_no">
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="docketNo"><b>Docket Number</b><span
                                                class="error">*</span></label>
                                                <div class="col-md-6">
                                                 <input onchange="EnterDocket(this.value);" type="text" tabindex="2" class="form-control  docketNo" name="docketNo" id="docketNo" >
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-5">
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="forwarding_no"><b>Forwarding Numebr</b><span
                                                class="error">*</span></label>
                                                <div class="col-md-6">
                                                    <input readonly type="text" tabindex="3" class="form-control  forwarding_no" name="forwarding_no" id="forwarding_no" >
                                               </div>
                                            </div>
                                        </div>
                                         <div class="col-5">
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="forwarding_vendor_name"><b>Forwarding Vendor Name</b><span
                                                class="error">*</span></label>
                                                <div class="col-md-7">
                                                   
                                                    <select  tabindex="4" class="form-control selectBox  forwarding_vendor_name" name="forwarding_vendor_name" id="forwarding_vendor_name">
                                                        <option value="">--Select--</option>
                                                        @foreach($vendor as $key)
                                                        <option value="{{$key->id}}">{{$key->VendorCode}} ~ {{$key->VendorName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="forwarding_weight"><b>Forwarding Weight</b><span
                                                class="error">*</span></label>
                                                <div class="col-md-5">
                                                <input type="text" tabindex="5" class="form-control  forwarding_weight" name="forwarding_weight" id="forwarding_weight" >
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-5"></div>
                                        <div class="col-12 text-center mb-1">
                                           
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="6" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="submitForwarding();">
                                                <a href="{{url('Forwarding')}}" tabindex="7" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>
                                
                            
                                  
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane show active" id="input-types-preview">
                      <div class="row tabels">
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
<div style="display:none;">
<iframe id="printf" name="printf"></iframe>
</div>
<script src="{{url('public/js/custome.js')}}"></script>
<script type="text/javascript">
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
           todayHighlight: true,
      });
  var base_url = '{{url('')}}';
  $("#forwarding_date").val('{{date("d-m-Y")}}');

  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
   
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getDocketDetails',
           cache: false,
           data: {
           'Docket':Docket
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.Status=='true')
                {  $('#customer_name').text(obj.datas.customer_details.CustomerCode+''+obj.datas.customer_details.CustomerName);
                    $('#product_name').text(obj.datas.docket_product_details.docket_prodduct_details.Title);
                    var collect =[];
                    var i =0;
                    $.each(obj.datas.docket_many_invoice_details, function(i){
                        collect.push(obj.datas.docket_many_invoice_details[i].EWB_No);
                        ++i;
                    });
                    console.log(collect);
                    var TotalEway = collect.join(",");
                    $('#ewaybill_no').text(TotalEway);
                }
                else if(obj.Status=='error'){
                    alert("Docket is Unused or Booked");
                }
                else{
                    $("#docketNo").val('');
                    $("#docketNo").focus();
                    alert("Docket Not Found");
                }
                
            }
            });
  }

    function submitForwarding(){
        var base_url = '{{url('')}}';
        if($("#forwarding_date").val()=='')
           {
              alert('Please Enter Forwarding Date');
              return false;
           }
          
            if($("#docketNo").val()=='')
           {
              alert('Please Enter Docket No');
              return false;
           }


            if($("#forwarding_vendor_name").val()=='')
           {
              alert('Please Select Forwarding Vendor Name');
              return false;
           }
            if($("#forwarding_weight").val()=='')
           {
              alert('Please Select Forwarding weight');
              return false;
           }
        
           var  forwarding_date = $("#forwarding_date").val();
           var docketNo  = $("#docketNo").val();
           var forwarding_vendor_name  = $("#forwarding_vendor_name").val();
           var forwarding_weight  = $("#forwarding_weight").val();
           $(".btnSubmit").attr("disabled", true);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/ForwardingPost',
           cache: false,
           data: {
            'forwarding_date':forwarding_date,
            'docketNo':docketNo,
            'forwarding_vendor_name':forwarding_vendor_name,
            'forwarding_weight':forwarding_weight
       }, 
            success: function(data) {
                alert(data);
                location.reload();
                $('.pickupNumber').val(obj.data);
            }
            });
       
    }

</script>