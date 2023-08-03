@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">SPOT RATE BOOKING</li>
                    </ol>
                </div>
                <h4 class="page-title">SPOT RATE BOOKING</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="booking_branch">Booking Branch<span
                                                 class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select  tabindex="1" class="form-control selectBox booking_branch" name="booking_branch" id="booking_branch" value="">
                                                <option value="">--Select--</option>
                                                @foreach($office as $key)
                                                <option value="{{$key->id}}">{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                                @endforeach
                                               </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="docketNo">Docket Number<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                 <input onchange="docketCheck(this.value);" type="text" tabindex="2" class="form-control docketNo" name="docketNo" id="docketNo" >
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="rate_for">Rate For</label>
                                                <div class="col-md-8">
                                                     <select onchange="getSelectType(this.value);" tabindex="3" class="form-control selectBox rate_for" name="rate_for" id="rate_for" value="">
                                                <option value="1">CUSTOMER</option>
                                                <option value="2">VENDOR</option>
                                               </select>    
                                               </div>
                                            </div>
                                        </div>
                                        <div id="CustomerContainer" class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="customer_name">Customer Name<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                               
                                                 <select  tabindex="4" class="form-control customer_name selectBox" name="customer_name" id="customer_name">
                                                <option value="">--select--</option>
                                                @foreach($customer as $key)
                                                <option value="{{$key->id}}">{{$key->CustomerCode}} ~ {{$key->CustomerName}}</option>
                                                @endforeach
                                                </select>   
                                                </div>
                                            </div>
                                        </div>  
                                        <div id="vendorContainer" class="col-5 m-b-1" style="display: none;">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label " for="vendor_name">Vendor Name<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                
                                                 <select tabindex="5"  class="form-control vendor_name selectBox" name="vendor_name" id="vendor_name">
                                                <option value="">--select--</option>
                                                @foreach($vendor as $key)
                                                <option value="{{$key->id}}">{{$key->VendorCode}} ~ {{$key->VendorName}}</option>
                                                @endforeach
                                                </select>    
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="origin">Origin<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="6" class="form-control origin selectBox" name="origin" id="origin" value="">
                                                <option value="">--select--</option>
                                                @foreach($origin as $key)
                                                <option value="{{$key->id}}">{{$key->Code}} ~ {{$key->CityName}}</option>
                                                @endforeach
                                                </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="destination">Destination<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="7" class="form-control destination selectBox" name="destination" id="destination" value="">
                                                <option value="">--select--</option>
                                                @foreach($origin as $key)
                                                <option value="{{$key->id}}">{{$key->Code}} ~ {{$key->CityName}}</option>
                                                @endforeach
                                                </select>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="valid_up_to">Valid Up To<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="8" class="form-control valid_up_to datepickerOne" name="valid_up_to" id="valid_up_to" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="time">Time</label>
                                                <div class="col-md-8">
                                                <input type="time" tabindex="9" class="form-control time" name="time" id="time" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="pieces">Pieces<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="10" class="form-control pieces" name="pieces" id="pieces" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="weight">Weight<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="11" class="form-control weight" name="weight" id="weight" value="">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-5 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="password">Remark</label>
                                                <div class="col-md-8">
                                                <textarea rows="3" tabindex="12" class="form-control remark" name="remark" id="remark" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-5 m-b-1">
                                            
                                            <table class="table-bordered">
                                                <thead>
                                                    <tr class="main-title">
                                                        <th colspan="2" class="p-1">Tariff Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="p-1 text-end" style="min-width: 150px;">GST %</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-4">
                                                             <input value="18" type="number" name="gst" class="form-control gst" id="gst" tabindex="13">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-1 text-end" style="min-width: 150px;">Rate</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-4">
                                                             <input type="text" name="number" class="form-control rate" id="rate" tabindex="14">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-1 text-end" style="min-width: 150px;">Recieved Amount</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input onchange="Calculate(this.value);" type="number" name="recieved_amt" class="form-control recieved_amt" id="recieved_amt" tabindex="15">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-1 text-end" style="min-width: 150px;">Freight</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input readonly type="text" name="freight" class="form-control freight" id="freight" tabindex="16">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-1 text-end" style="min-width: 150px;">Taxanle Amount</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input readonly type="text" name="taxable_amt" class="form-control taxable_amt" id="taxable_amt" tabindex="17">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr> 
                                                        <td class="p-1 text-end" style="min-width: 150px;">IGST</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input readonly type="text" name="igst" class="form-control igst" id="igst" tabindex="18">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr> 
                                                        <td class="p-1 text-end" style="min-width: 150px;">CGST</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input readonly type="text" name="cgst" class="form-control cgst" id="cgst" tabindex="19">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr> 
                                                        <td class="p-1 text-end" style="min-width: 150px;">SGST</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-7">
                                                             <input readonly type="text" name="sgst" class="form-control sgst" id="sgst" tabindex="20">
                                                             </div>
                                                         </td>
                                                    </tr>
                                                    <tr> 
                                                        <td class="p-1 text-end" style="min-width: 150px;">Total Amount</td>
                                                         <td class="p-1" style="min-width: 300px;">
                                                            <div class="col-md-10">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                 <input readonly type="text" name="total_amt" class="form-control total_amt" id="total_amt" tabindex="21">
                                                                </div>
                                                                <div class="col-md-3">
                                                                 <input onclick="SubmitSpotBooking();" type="button" value="Save"   tabindex="22" class="btn btn-primary btnSubmit">
                                                                </div>
                                                                </div>
                                                             </div>
                                                         </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
      $("#valid_up_to").val("{{date('d-m-Y')}}");
      function getSelectType(val){
            if(val=='1'){
                $("#CustomerContainer").css('display',"block");
                $("#vendorContainer").css('display',"none");
                $("#vendor_name").val('').trigger('change');
            }
            else{
                $("#customer_name").val('').trigger('change');
                $("#CustomerContainer").css('display',"none");
                $("#vendorContainer").css('display',"block");
            }
      }

    function SubmitSpotBooking(){
        var base_url = '{{url('')}}';
        if($("#booking_branch").val()=='')
           {
              alert('Please Select Booking Branch');
              return false;
           }
           
           
            if($("#docketNo").val()=='')
           {
              alert('Please Enter Docket No');
              return false;
           }


            if($("#rate_for").val()=='')
           {
              alert('Please Select Rate For');
              return false;
              if($("#rate_for").val()=='1'){
                if($("#customer_name").val()=='')
                {
                    alert('Please Select Customer Name');
                    return false;
                }
              }
              else{
                if($("#vendor_name").val()=='')
                {
                    alert('Please Select Vendor Name');
                    return false;
                }
              }
           }
          
           if($("#origin").val()=='')
           {
              alert('Please Select Origin');
              return false;
           }

            if($("#destination").val()=='')
            {
               alert('Please Select Destination');
                return false;
            }
               if($("#valid_up_to").val()=='')
               {
                  alert('Please Enter valid up to');
                  return false;
               }
               if($("#time").val()=='')
               {
                  alert('Please Select Time');
                  return false;
               }
               if($("#pieces").val()=='')
               {
                  alert('Please Enter pieces');
                  return false;
               }

            if($("#weight").val()=='')
           {
              alert('Please Enter weight');
              return false;
           }
           if($("#total_amt").val()=='')
           {
              alert('Please Enter Total Amount');
              return false;
           }
           
          
           var  booking_branch = $("#booking_branch").val();
           var docketNo  = $("#docketNo").val();
           var rate_for  = $("#rate_for").val();
           var customer_name  = $("#customer_name").val();
           var vendor_name  = $("#vendor_name").val();
           var origin  = $("#origin").val();
           var destination  = $("#destination").val();
           var valid_up_to  = $("#valid_up_to").val();
           var time  = $("#time").val();
           var pieces  = $("#pieces").val();
           var weight  = $("#weight").val();
           var remark  = $("#remark").val();
           var gst  = $("#gst").val();
           var rate  = $("#rate").val();
           var recieved_amt  = $("#recieved_amt").val();
           var freight  = $("#freight").val();
           var taxable_amt  = $("#taxable_amt").val();
           var igst  = $("#igst").val();
           var cgst  = $("#cgst").val();
           var sgst  = $("#sgst").val();
           var total_amt  = $("#total_amt").val();

           
           $(".btnSubmit").attr("disabled", true);
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/SpotRateBookingPost',
           cache: false,
           data: {
            'booking_branch':booking_branch,
            'docketNo':docketNo,
            'rate_for':rate_for,
            'customer_name':customer_name,
            'vendor_name':vendor_name,
            'origin':origin,
            'destination':destination,
            'valid_up_to':valid_up_to,
            'time':time,
            'pieces':pieces,
            'weight':weight,
            'remark':remark,
            'gst':gst,
            'rate':rate,
            'recieved_amt':recieved_amt,
            'freight':freight,
            'taxable_amt':taxable_amt,
            'igst':igst,
            'cgst':cgst,
            'sgst':sgst,
            'total_amt':total_amt  
       }, 
            success: function(data) {
                alert(data);
                location.reload();
            }
            });
      
    }
function docketCheck(Docket){
    var base_url = '{{url('')}}';
    $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/SpotRateBookingCheck',
           cache: false,
           data: {
               'Docket':Docket
           },
           success: function(data){
               var obj = JSON.parse(data);
               if(obj.status=='false'){
                 alert("docket Not Found");
               }
            }
    });
}
function Calculate(datas){
           if($("#origin").val()=='')
           {
              alert('Please Select Origin');
              $('.recieved_amt').val('');
              $('.recieved_amt').focus(); 
              return false;
           }
             if($("#destination").val()=='')
            {
                $('.recieved_amt').val('');
                $('.recieved_amt').focus(); 
               alert('Please Select Destination');
                return false;
            }
            var base_url = '{{url('')}}';
            var origin = $("#origin").val();
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                url: base_url + '/CheckOriginOfCal',
                cache: false,
                data: {
                    'origin':origin
                },
                success: function(data){
                   
                      if(data==1){
                        var gst=  parseInt($("#gst").val());
                        var rate =  parseInt($("#rate").val());
                        var recvAmount = parseFloat(datas);
                        var check =(recvAmount*gst)/(100+gst);
                        var totalCheck=(recvAmount-check).toFixed(2);
                        var GetGST = ((totalCheck*gst)/100).toFixed(2);
                        var calculationResult = (recvAmount-GetGST);
                        $("#freight").val(totalCheck);
                        $("#taxable_amt").val(calculationResult);
                        $("#igst").val();
                        $("#cgst").val(GetGST/2);
                        $("#sgst").val(GetGST/2);
                        $("#total_amt").val(recvAmount);
                      }
                      else if(data==2)
                      {
                        var gst=  parseInt($("#gst").val());
                        var rate =  parseInt($("#rate").val());
                        var recvAmount = parseFloat(datas);
                        var check =(recvAmount*gst)/(100+gst);
                        var totalCheck=(recvAmount-check).toFixed(2);
                        var GetGST = ((totalCheck*gst)/100).toFixed(2);
                        var calculationResult = (recvAmount-GetGST);
                        $("#freight").val(totalCheck);
                        $("#taxable_amt").val(calculationResult);
                        $("#igst").val(GetGST);
                        $("#cgst").val(0);
                        $("#sgst").val(0);
                        $("#total_amt").val(recvAmount);
                      }
                      else
                      {
                         alert('No data found');
                         return false;
                      }
                    }
            });
            
}
</script>