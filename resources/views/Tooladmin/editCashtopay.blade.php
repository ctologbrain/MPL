@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">CASH - TOPAY COLLECTION</h4>
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
                        <div id="basicwizard rto_container">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="  userName">Docket Number
                                                                <span
                                                                class="error">*</span></label>
                                                                <div class="col-md-4 text-start">
                                                                   <input type="text" tabindex="1" class="form-control docket_no" name="docket_no" id="docket_no" onchange="getPickupDetails(this.value)">
                                                               </div>
                                                               <span class="error"></span>
                                            </div>
                                        </div>
                                            <div class="col-6 tpay_collection">
                                                <div class="row">
                                                    
                                                    <div class="back-color col-12">
                                                        <h4>Collection Details</h4>
                                                    </div>
                                                    <div class="col-12">
                                                         <div class="row">
                                                             <label class="col-md-3 col-form-label" for="collection_date">Collection Date<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-5">
                                                              <input type="text" tabindex="2" class="form-control datepickerOne" name="collection_date" id="collection_date" onchange="">
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="collection_type">Collection Type</label>
                                                                <div class="col-md-4">
                                                                  <select tabindex="3" class="form-control selectBox collection_type text-start" name="collection_type" id="collection_type" onchange="payTypeone(this.value);">
                                                                                <option value="">--select--</option>
                                                                                <option value="CASH">CASH</option>
                                                                                <option value="CHECK">CHECK</option>
                                                                                 <option value="NEFT">NEFT</option>
                                                                                
                                                                             </select>
                                                                         <span class="error"></span>
                                                                       <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" > 
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="collection_amount">Collection Amount<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-9">
                                                            <input type="text" tabindex="4" class="form-control collection_amount" name="collection_amount" id="collection_amount" onchange="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="col-12">
                                                        <div id="bank_Booktwo"  class="row">
                                                            <label class="col-md-3 col-form-label" for="bank_name">Bank Name</label>
                                                            <div class="col-md-9">
                                                           
                                                            <select tabindex="3" class="form-control selectBox bank_name text-start" name="bank_name" id="bank_name" onchange="">
                                                            <option value="">--select--</option>
                                                            @foreach( $bank as $key)
                                                            <option value="{{$key->id}}">{{$key->BankCode}}~{{$key->BankName}}</option>
                                                            @endforeach
                                                            </select>
                                                            </div>
                                                        
                                                         </div>
                                                      </div>
                                                     <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="collection_remarks">Collection Remarks</label>
                                                            <div class="col-md-9">
                                                           
                                                           
                                                              
                                                             <Textarea class="form-control collection_remarks"
                                                                    placeholder="Collection Remark"  tabindex="6"  name="collection_remarks" id="collection_remarks"></Textarea>
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" > 
                                                            </div>
                                                        </div>
                                                     </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row tpay_collection">
                                                    <div class="back-color col-12">
                                                        <h4>Deposite Details</h4>
                                                    </div>
                                                     <div class="col-12">
                                                         <div class="row">
                                                             <label class="col-md-4 col-form-label" for="deposite_date">Deposite Date<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-6">
                                                           
                                                           
                                                              <input type="text" tabindex="7" class="form-control datepickerOne" name="deposite_date" id="deposite_date" onchange="">
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label" for="deposite_at">Deposite At</label>
                                                                <div class="col-md-4">
                                                                  <select tabindex="8" class="form-control selectBox deposite_at text-start" name="deposite_at" id="deposite_at" onchange="payType(this.value);">
                                                                                <option value="">--select--</option>
                                                                                <option value="HO BANK">HO BANK</option>
                                                                                <option value="HO CASH">HO CASH</option>
                                                                                <option value="BRANCH">BRANCH</option>
                                                                             </select>
                                                                         <span class="error"></span>
                                                                       <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" > 
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label" for="deposite_amount">Deposite Amount<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-8">
                                                            <input type="text" tabindex="9" class="form-control deposite_amount" name="deposite_amount" id="deposite_amount" onchange="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="col-12">
                                                        <div id="bank_Book" class="row">
                                                            <label class="col-md-4 col-form-label" for="depositeInBank">Deposite In Bank<span
                                                                class="error">*</span></label>
                                                            <div  class="col-md-8">
                                                           <select tabindex="3" class="form-control selectBox depositeInBank text-start" name="depositeInBank" id="depositeInBank" onchange="">
                                                            <option value="">--select--</option>
                                                            @foreach( $bank as $key)
                                                            <option value="{{$key->id}}">{{$key->BankCode}}~{{$key->BankName}}</option>
                                                            @endforeach
                                                        </select>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div id="account_numberbox" class="row">
                                                            <label class="col-md-4 col-form-label" for="depositeAccNo">Deposite Account Number<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-8">
                                                            <input type="text" tabindex="11" class="form-control depositeAccNo" name="depositeAccNo" id="depositeAccNo" onchange="">
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >  
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label" for="deposite_remarks">Deposite Remarks</label>
                                                            <div class="col-md-8">
                                                             <Textarea class="form-control deposite_remarks"
                                                                    placeholder="deposite_remark"  tabindex="12"  name="deposite_remarks" id="deposite_remarks"></Textarea>
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                     <div class="col-12 mb-1 mt-1 text-end">
                                                        <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                                        <input type="hidden" name="docket_id" class="docket_id" id="docket_id">
                                                        <input type="button" tabindex="14" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="SubmitTopayCollection();">
                                                            <a href="javascript:void(0);" tabindex="15" class="btn btn-primary" onclick="canceled();">Cancel</a>
                                                     </div>
                                                </div>
                                              </div>
                                                    
                                            </div>

                                    </div>
                                               
                                        
                                </div>
                           </div>
                        </div>
                           
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });

function getPickupDetails(docketNo){
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/EditToPayCollectionData',
       cache: false,
       data: {
           'docketNo':docketNo
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.states==1){
         $('#docket_id').val(obj.datas.Docket_Id);
         $("#docket_no").val();
         $("#collection_date").val(obj.datas.Date);
          $("#collection_type").val(obj.datas.Type).trigger('change');
         $("#collection_amount").val(obj.datas.Amt);
          $("#bank_name").val(obj.datas.Bank).trigger('change');
        $("#collection_remarks").val(obj.datas.Remark);

        }
        else{
            alert('No Details Found');
              $("#docket_no").val('');
            $("#docket_no").focus();
            $('#docket_id').val('');
         $("#collection_date").val('');
          $("#collection_type").val('').trigger('change');
         $("#collection_amount").val('');
          $("#bank_name").val('').trigger('change');
        $("#collection_remarks").val('');
        }
    }
});

    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DocketDepositTransDataGet',
       cache: false,
       data: {
           'docketNo':docketNo
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.states==1)
        { 
        $("#deposite_date").val(obj.datas.Date);
        $("#deposite_at").val(obj.datas.DepositAt).trigger('change');
        $("#deposite_amount").val(obj.datas.Amt);
        $("#depositeInBank").val(obj.datas.Bank).trigger('change');
        $("#depositeAccNo").val(obj.datas.Account_Number);
           $("#deposite_remarks").val(obj.datas.Remark); 
           $("#BRANCH").val(obj.datas.Branch).trigger('change');
        }
        else{
            
            $("#deposite_date").val('');
        $("#deposite_at").val('').trigger('change');
        $("#deposite_amount").val('');
        $("#depositeInBank").val('').trigger('change');
        $("#depositeAccNo").val('');
           $("#deposite_remarks").val(''); 
           $("#BRANCH").val('').trigger('change');
        }
    }
});

}    
    function payType(values){
        if(values=="HO CASH"){
            $("#bank_name").val('');
             $("#bank_Book").css('display','none');
             $("#account_numberbox").css('display','none');
        }
        else if(values =="HO BANK"){
            $("#bank_name").val();
            $("#bank_Book").css('display','flex');
            $("#account_numberbox").css('display','flex');
            var body = `
            <label class="col-md-4 col-form-label" for="depositeInBank">Deposite In Bank<span class="error">*</span></label>
                <div  class="col-md-8">
            <select tabindex="3" class="form-control selectBox depositeInBank text-start" name="depositeInBank" id="depositeInBank" onchange="">
                <option value="">--select--</option>
            @foreach( $bank as $key)
            <option value="{{$key->id}}">{{$key->BankCode}}~{{$key->BankName}}</option>
            @endforeach
            </select>                                               
                </div>
            `;
            $("#bank_Book").html(body);
        }
        else if(values =="BRANCH"){
            var body = `
            <label class="col-md-4 col-form-label" for="BRANCH">Branch<span class="error">*</span></label>
                <div class="col-md-8">        
                <select tabindex="3" class="form-control selectBox BRANCH text-start" name="BRANCH" id="BRANCH">
                <option value="">--select--</option>
                @foreach($office as $key) 
                <option @if($key->id==1) selected @else disabled @endif value="{{$key->id}}">{{$key->OfficeCode}}~{{$key->OfficeName}}</option>    
                @endforeach      
                 </select>                         
                                                                 
                </div>
            `;
            $("#bank_Book").html(body);
            $("#bank_Book").css('display','flex');
             $("#account_numberbox").css('display','none');
        }
    }
    function payTypeone(values){
        if(values=="CASH"){
            $("#bank_name").val('');
             $("#bank_Booktwo").css('display','none');
        }
        else if(values =="CHECK"){
            $("#bank_name").val();
            $("#bank_Booktwo").css('display','flex');
        }
        else if(values =="NEFT"){
             $("#bank_Booktwo").css('display','flex');
        }
    }
  function getDocketDetails(Docket)
  {

    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getDocketInformation',
       cache: false,
       data: {
           'Docket':Docket
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='true')
        { 
            $('#book_date').text(obj.bodyInfo.Booking_Date);
             if(obj.bodyInfo.customer_details!=null){
            $('#customer_name').text(obj.bodyInfo.customer_details.CustomerCode+'-'+obj.bodyInfo.customer_details.CustomerName);
            }
            if(obj.bodyInfo.bookign_type_details!=null){
            $('#booking_type').text(obj.bodyInfo.bookign_type_details.BookingType);
            }
            if(obj.bodyInfo.pincode_details.city_details!=null){
             $('#origin_city').text(obj.bodyInfo.pincode_details.city_details.CityName);
            }
            if(obj.bodyInfo.dest_pincode_details.city_details!=null){
            $('#destination_city').text(obj.bodyInfo.dest_pincode_details.city_details.CityName);
            }
            if(obj.bodyInfo.docket_product_details!=null){
            $('#pieces').text(obj.bodyInfo.docket_product_details.Qty);
             $('#charge_wt').text(obj.bodyInfo.docket_product_details.Charged_Weight);
            }
            $('#topay_amount').text('');
            $('#collected_amount').text('');
            $('#balance_amount').text('');
            $('#docket_id').val(obj.bodyInfo.id);

        }
        else{
        alert('Docket not found');
            $('.docket_no').val('');
            $('.docket_no').focus();
            $('#book_date').text('');
            $('#customer_name').text('');
            $('#booking_type').text('');
             $('#origin_city').text('');
            $('#destination_city').text('');
            $('#pieces').text('');
             $('#charge_wt').text('');
            $('#topay_amount').text('');
            $('#collected_amount').text('');
            $('#balance_amount').text('');
             $('#docket_id').val('');
        return false;
        }
       }
     });
  }

  function SubmitTopayCollection(){
        
        var base_url = '{{url('')}}';
        if($("#docket_no").val()=='')
           {
              alert('please Enter Docket Number');
              return false;
           }
           if($("#collection_date").val()=='')
           {
              alert('please Enter Collection Date');
              return false;
           }
           
            if($("#collection_type").val()=='')
           {
              alert('please Select Collection type');
              return false;
           }
           if($("#collection_amount").val()=='')
           {
              alert('please Enter Collection Amount');
              return false;
           }
           if($("#bank_name").val()=='' && $("#collection_type").val()!='CASH')
           {
              alert('please Enter Bank Name');
              return false;
           }
           if($("#collection_remarks").val()=='')
           {
              alert('please Enter Collection Remarks');
              return false;
           }



           if($("#deposite_date").val()=='')
           {
              alert('please Enter Deposite Date ');
              return false;
           }
           if($("#deposite_at").val()=='')
           {
              alert('please Enter Deposite AT');
              return false;
           }
            if($("#deposite_amount").val()=='')
           {
              alert('please Enter Deposite Amount');
              return false;
           }

            if($("#depositeInBank").val()=='' && $("#deposite_at").val()=='HO BANK')
           {
              alert('please Enter Deposite InBank');
              return false;
           }
             if($("#depositeAccNo").val()==''  && $("#deposite_at").val()=='HO BANK')
           {
              alert('please Enter Deposite Acc NO.');
              return false;
           }
             if($("#deposite_remarks").val()=='')
           {
              alert('please Enter Deposite Remarks');
              return false;
           }

            // if ($('#choose_file')[0].files.length == 0) 
            // {
            //     alert('please Choose File');
            //   return false;
            // }
          
           var docketId = $('#docket_id').val();
           var docket_no = $("#docket_no").val();
           var collection_date  = $("#collection_date").val();
           var collection_type  = $("#collection_type").val();
           var collection_amount  = $("#collection_amount").val();
           var bank_name  = $("#bank_name").val();
           var collection_remarks  = $("#collection_remarks").val();

           var deposite_date  = $("#deposite_date").val();
           var deposite_at  = $("#deposite_at").val();
            var deposite_amount  = $("#deposite_amount").val();
           var depositeInBank  = $("#depositeInBank").val();
           var depositeAccNo  = $("#depositeAccNo").val();
           var deposite_remarks  = $("#deposite_remarks").val();
           var BRANCH = $("#BRANCH").val();
           var formData = new FormData();
         // if ($('#choose_file')[0].files.length > 0) 
         // {
         // for (var i = 0; i < $('#choose_file')[0].files.length; i++)
         //  formData.append('file', $('#choose_file')[0].files[i]);
         // }
        
          formData.append('docket_no',docket_no);
          formData.append('collection_date',collection_date);
          formData.append('collection_type',collection_type);
          formData.append('collection_amount',collection_amount);
          formData.append('bank_name',bank_name);
          formData.append('collection_remarks',collection_remarks);
          formData.append('deposite_date',deposite_date);
          formData.append('deposite_at',deposite_at);
          formData.append('deposite_amount',deposite_amount);
          formData.append('depositeInBank',depositeInBank);
          formData.append('depositeAccNo',depositeAccNo);
          formData.append('deposite_remarks',deposite_remarks);
          formData.append('docketId',docketId);
          formData.append('BRANCH',BRANCH);
       

           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/EditToPayCollectionPost',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            const obj = JSON.parse(data);
          
               if(obj.status=='true')
               {
                canceled();
                return false;
               }
               
            
            }
            });
    }

    function canceled(){
        $('.docket_no').focus();
                $("#docket_no").val('');
                $("#collection_date").val('');
                $("#collection_type").val('');
                $("#collection_amount").val('');
                 $("#bank_name").val('');
                $("#collection_remarks").val('');
                 $("#deposite_date").val('');
                $("#deposite_at").val('');
                $("#deposite_amount").val('');
                $("#depositeInBank").val('');
                $("#depositeAccNo").val('');
                $("#deposite_remarks").val('');

                 $('#book_date').text('');
                 $('#customer_name').text('');
                 $('#booking_type').text('');
                $('#origin_city').text('');
                 $('#destination_city').text('');
                 $('#pieces').text('');
                $('#charge_wt').text('');
                 $('#topay_amount')
                 $('#collected_amount').text('');
                 $('#balance_amount').text('');
                 $('#docket_id').text('');
                 $("#choose_file").val('');
    }
   

    


 
</script>