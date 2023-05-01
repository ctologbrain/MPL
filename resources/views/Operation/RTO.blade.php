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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard rto_container">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                             <div class="row mb-1">
                                            <label class="col-md-3 col-form-label text-start" for="userName">Destination Office<span
                                                class="error">*</span></label>
                                                <div class="col-md-6">
                                                  <select tabindex="1" class="form-control selectBox destination_office text-start" name="destination_office" id="destination_office">
                                                            <option value="">--select--</option>
                                                             @foreach($office as $officeList)
                                                             <option value="{{$officeList->id}}">{{$officeList->OfficeCode}} ~ {{$officeList->OfficeName}}</option>
                                                             @endforeach
                                                         </select>
                                                     <span class="error"></span>
                                                </div>
                                                <div class="col-md-3"></div>
                                         </div>
                                        </div>
                                        <hr>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="  userName">Docket Number
                                                                <span
                                                                class="error">*</span></label>
                                                                <div class="col-md-9 text-start">
                                                                   <input type="text" tabindex="2" class="form-control docket_no" name="docket_no" id="docket_no">
                                                               </div>
                                                                  
                                                               <span class="error"></span>
                                                            </div>
                                                            <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="  userName">Refrence Number
                                                                <span
                                                                class="error">*</span></label>
                                                                <div class="col-md-9 text-start">
                                                                   <input type="text" tabindex="2" class="form-control ref_docket_no" name="ref_docket_no" id="ref_docket_no" onchange="getDocketDetails(this.value)">
                                                               </div>
                                                                  
                                                               <span class="error"></span>
                                                            </div>
                                                               </div>
                                                            <div class="col-12">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="Pieces">Pieces</label>
                                                                <div class="col-md-9">
                                                               
                                                               
                                                                  <input type="text" tabindex="3" class="form-control pieces" name="pieces" id="pieces" onchange="">
                                                                       <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                         <div class="row">
                                                             <label class="col-md-3 col-form-label" for="Weight">Weight</label>
                                                            <div class="col-md-9">
                                                           
                                                           
                                                              <input type="text" tabindex="4" class="form-control weight" name="weight" id="weight" onchange="">
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                        
                                                       
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="rto_date">RTO Date</label>
                                                                <div class="col-md-9">
                                                               
                                                               
                                                                   <input type="text" tabindex="6" class="form-control rto_date  datepickerOne" name="rto_date" id="rto_date" onchange="">
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" > 
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="rto_reason">RTO Reason</label>
                                                            <div class="col-md-9">
                                                           
                                                           <select tabindex="5" class="form-control selectBox rto_date text-start rto_reason" name="rto_date" id="rto_reason" onchange="">  <option value="">--select--</option>@foreach($rtoRes as $res) <option value="{{$res->id}}">{{$res->ReasonCode}}~{{$res->ReasonDetail}}</option> 
                                                           @endforeach </select>
                                                                         <span class="error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="remarks">Remarks</label>
                                                            <div class="col-md-9">
                                                           
                                                           
                                                              
                                                             <Textarea class="form-control remark"
                                                                    placeholder="Remark"  tabindex="7"  name="remark" id="remark"></Textarea>
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                      
                                                    <div class="col-12 mt-1">
                                                        <div class="row">
                                                             <label class="col-md-3 col-form-label" for="Select">Select File</label>
                                                            <div class="col-md-9">
                                                           
                                                           
                                                              
                                                            <input type="file" name="fileaimge" id="fileaimge" class="choose_file" tabindex="8">
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>  
                     
                   
                                                       
                                                   
                                               
                                                     <div class="col-12">
                                                        <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                        <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                        <input type="button" tabindex="10" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubmitGatePass()">
                                                            <a href="{{url('RTOTransaction')}}" tabindex="10" class="btn btn-primary mt-3">Cancel</a>
                                                     </div>
                                                </div>
                                              
                                                    
                                            </div>

                                           
                                            
                                            <div class="col-5 ml-20">
                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table">
                                                            <tbody><tr>
                                                                <td align="left" class="lblMediumBold possition customer_name1" nowrap="nowrap">Customer Name
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="customer_name"></span>
                                                                </td>
                                                                <td align="left" class="load_type1">
                                                                    Load Type
                                                                </td>
                                                                <td align="left">
                                                                    <span id="load_type"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                 <td align="left" class="lblMediumBold possition sector1" nowrap="nowrap">Sector
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="sector"></span>
                                                                </td>
                                                                <td align="left" class="booking_date1">
                                                                   Booking Date
                                                                </td>
                                                                <td align="left">
                                                                    <span id="booking_date"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition pieces1" nowrap="nowrap">Pieces
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="piecesDisplay"></span>
                                                                </td>
                                                                <td align="left" class="weight1">
                                                                   Weight
                                                                </td>
                                                                <td align="left">
                                                                    <span id="weightdisplay"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition ndr_date" nowrap="nowrap">NDR Date
                                                                </td>
                                                                <td align="left"> 
                                                                    <span id="ndr_date"></span>
                                                                </td>
                                                                <td align="left" class="booking_type">
                                                                   Booking Type
                                                                </td>
                                                                <td align="left">
                                                                    <span id="booking_type"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition">NDR Reason
                                                                </td>
                                                                <td align="left" class="ndr_reason" colspan="3">
                                                                    <span id="ndr_reason"></span>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>

                                                                <td align="left" class="lblMediumBold possition">NDR Remarks
                                                                </td>
                                                                <td align="left" class="ndr_remarks possition" colspan="3">
                                                                    <span id="ndr_remarks"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                          
                                                            
                                                        </tbody>
                                                </table>
                                            </div> 
                                            <div class="tabels ml-1" ></div> 

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
          format: 'dd-mm-yyyy',
          autoclose:true,
          todayHighlight: true
      });

  function getDocketDetails(Docket)
  {
    if($('#destination_office').val()=='')
    {
       alert('Please select office');
       $('.ref_docket_no').val('');
       $('.ref_docket_no').focus();
       return flase;
    }
    var destination_office=$('#destination_office').val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getDocketDetailsForRTo',
       cache: false,
       data: {
           'Docket':Docket,'destination_office':destination_office
       }, 
       success: function(data) {
             const obj = JSON.parse(data);
             if(obj.status=='false')
               {
                   alert(obj.message);
                   $('.ref_docket_no').val('');
                   $('.ref_docket_no').focus();
                   return false;
               }
               else{
                  
                 $('#customer_name').text(obj.records.CustomerName);
                 $('#load_type').text('');
                 $('#sector').text();
                 $('#booking_date').text(obj.records.Booking_Date);
                 $('#piecesDisplay').text(obj.records.Qty);
                 $('#weightdisplay').text(obj.records.Actual_Weight);
                 $('#ndr_date').text(obj.records.NDR_Date);
                 $('#booking_type').text(obj.records.BookingType);
                 $('#ndr_reason').text(obj.records.ReasonDetail);
               }
       }
     });
  }

  function SubmitGatePass(){
        
          base_url = '{{url('')}}';
          
           if($("#destination_office").val()=='')
           {
              alert('please select  office');
              return false;
           }
           
            if($("#docket_no").val()=='')
           {
              alert('please Enter Docket');
              return false;
           }
           if($("#ref_docket_no").val()=='')
           {
              alert('please Enter Refrence  Docket');
              return false;
           }
           if($("#pieces").val()=='')
           {
              alert('please Enter Pieces');
              return false;
           }
           if($("#weight").val()=='')
           {
              alert('please Enter Weight');
              return false;
           }
           if($("#rto_date").val()=='')
           {
              alert('please Enter RTO Date');
              return false;
           }
           if($(".rto_reason").val()=='')
           {
              alert('please Select RTO Reason ');
              return false;
           }
           if($("#remark").val()=='')
           {
              alert('please Enter Remark');
              return false;
           }
          
           
           var destination_office = $("#destination_office").val();
           var docket_no  = $("#docket_no").val();
           var pieces  = $("#pieces").val();
           var weight  = $("#weight").val();
           var rto_date  = $("#rto_date").val();
           var rto_reason  = $(".rto_reason").val();
           var remark  = $("#remark").val();
           var ref_docket_no  = $("#ref_docket_no").val();
           var formData = new FormData();
         if ($('#fileaimge')[0].files.length > 0) 
         {
         for (var i = 0; i < $('#fileaimge')[0].files.length; i++)
          formData.append('file', $('#fileaimge')[0].files[i]);
         }
     
        
          formData.append('destination_office',destination_office);
          formData.append('docket_no',docket_no);
          formData.append('ref_docket_no',ref_docket_no);
          formData.append('pieces',pieces);
          formData.append('weight',weight);
          formData.append('rto_date',rto_date);
          formData.append('rto_reason',rto_reason);
          formData.append('remark',remark);
       

           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/SubmitRTO',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            location.reload();
             
               
            
            }
            });
    }
   

    
function getDocumantDetails(id)
{
   if(id==1)
   {
    $('#addClass').removeClass('checkclass');
    $('#showClass').addClass('checkclass');
   }
   else if(id==2)
   {
    $('#addClass').addClass('checkclass');
    $('#showClass').removeClass('checkclass');
   }
   else{
    $('#addClass').removeClass('checkclass');
    $('#showClass').addClass('checkclass');
   }
}

 //     function DepositeCashToHo()
 // {
 //  // $(".btnSubmit").attr("disabled", true);
 //   if($('#projectCode').val()=='')
 //   {
 //      alert('please Enter project Code');
 //      return false;
 //   }
 //   if($('#projectName').val()=='')
 //   {
 //      alert('please Enter project Name');
 //      return false;
 //   }
   
 //    if($('#ProjectCategory').val()=='')
 //   {
 //      alert('please select Project Category');
 //      return false;
 //   }
 //   var projectCode=$('#projectCode').val();
 //   var projectName=$('#projectName').val();
 //   var ProjectCategory=$('#ProjectCategory').val();
 //   var Pid=$('#Pid').val();
 
 //      var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/AddProduct',
 //       cache: false,
 //       data: {
 //           'projectCode':projectCode,'projectName':projectName,'ProjectCategory':ProjectCategory,'Pid':Pid
 //       },
 //       success: function(data) {
 //        location.reload();
 //       }
 //     });
 //  }  
 //  function viewproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', true);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', true);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', true);
      
 //       }
 //     });
 //  }
 //  function Editproduct(productId)
 //  {
 //   var base_url = '{{url('')}}';
 //       $.ajax({
 //       type: 'POST',
 //       headers: {
 //         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
 //       },
 //       url: base_url + '/ViewProduct',
 //       cache: false,
 //       data: {
 //           'productId':productId
 //       },
 //       success: function(data) {
 //         const obj = JSON.parse(data);
 //         $('.Pid').val(obj.id);
 //         $('.projectCode').val(obj.ProductCode);
 //         $('.projectCode').attr('readonly', false);
 //         $('.projectName').val(obj.ProductName);
 //         $('.projectName').attr('readonly', false);
 //         $('.ProjectCategory').val(obj.ProductCategory).trigger('change');
 //         $('.ProjectCategory').attr('disabled', false);
        
      
 //       }
 //     });
 //  }
</script>