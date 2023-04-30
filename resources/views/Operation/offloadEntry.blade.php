@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">Offload Entry</h4>
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
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="  userName">Docket Number
                                                                <span
                                                                class="error">*</span></label>
                                                                <div class="col-md-9 text-start">
                                                                   <input type="text" tabindex="1" class="form-control docket_no" name="docket_no" id="docket_no" onchange="getDocketDetails(this.value)">
                                                               </div>
                                                                  
                                                               <span class="error"></span>
                                                            </div>
                                                            
                                                    </div>
                                                   
                                                       
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="offload_date">Offload Date<span
                                                                class="error">*</span></label>
                                                                <div class="col-md-5">
                                                               
                                                               
                                                                   <input type="text" tabindex="2" class="form-control offload_date  datepickerOne" name="offload_date" id="offload_date" >
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" > 
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="offload_reason">Offload Reason<span
                                                                class="error">*</span></label>
                                                            <div class="col-md-9">
                                                           
                                                           <select tabindex="3" class="form-control selectBox offload_reason text-start" name="offload_reason" id="offload_reason" >
                                                        <option value="">--select--</option>
                                                        @foreach($offloadreason as $key)
                                                        <option value="{{$key->id}}">{{$key->ReasonDetail}}</option>
                                                        @endforeach
                                                        </select>
                                                        <span class="error"></span>
                                                        <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                               
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                       
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="remarks">Remarks</label>
                                                            <div class="col-md-9">
                                                           
                                                           
                                                              
                                                             <Textarea class="form-control remark"
                                                                    placeholder="Remark"  tabindex="4"  name="remark" id="remark"></Textarea>
                                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >    
                                                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                 
                                                       
                                                   
                                               
                                                     <div class="col-12">
                                                        <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                        <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                        <input type="button" tabindex="10" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubmitOffload()">
                                                            <a href="{{url('OffLoadEntry')}}" tabindex="10" class="btn btn-primary mt-3">Cancel</a>
                                                     </div>
                                                </div>
                                              
                                                    
                                            </div>

                                           
                                            
                                            <div class="col-5 ml-20">
                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table">
                                                            <tbody>
                                                                <tr>
                                                                <td align="left" class="td21 possition customer_name" nowrap="nowrap">Customer Name:
                                                                </td>
                                                                <td align="left" class="td22"> 
                                                                    <span id="customer"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                            <tr>
                                                               
                                                                <td align="left" class="load_type">
                                                                    Load Type:
                                                                </td>
                                                                <td align="left">
                                                                    <span id="load"></span>
                                                                </td>
                                                            </tr>
                                                           
                                                            
                                                        </tbody>
                                                </table>
                                            </div> 
                                            <div class="main-title mt-1 p-1">
                                              
                            <div class="text-center text-dark">Record Not Available...</div>
                       
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
          format: 'yyyy-mm-dd',
          autoclose:true,
          todayHighlight: true
      });
    $(".datepickerOne").val('{{date("Y-m-d")}}');
  
  function  getDocketDetails(Docket) {
      
      var base_url = '{{url('')}}';
    $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/GetDocketOffLoadPost',
           cache: false,
            data: {'Docket':Docket},
            success: function(data) {
            const obj = JSON.parse(data);
            if(obj.success==1)
            { 
                $('#customer').text(obj.bodyPart['CCode']+'~'+obj.bodyPart['CName']);
                if( obj.bodyPart['load']==1){
                    $('#load').text('BOX');
                }
                else if(obj.bodyPart['load']==2){
                    $('#load').text('BUBBLE WRAP');
                }
                else if(obj.bodyPart['load']==3){
                    $('#load').text('WOODEN');
                }
                else if(obj.bodyPart['load']==4){
                    $('#load').text('POLYBAGS');
                }
                else if(obj.bodyPart['load']==5){
                    $('#load').text('CARDD-BOARD');
                }

                
               
                return false;
            }
            else{
                  alert('Docket No. Not Found');
                  $('#docket_no').val('');
                $('#docket_no').focus();
                $('#customer').text('');
                $('#load').text('');
            }
        }
            });
            }
  

  function SubmitOffload(){ 
        var base_url = '{{url('')}}';
        if($("#docket_no").val()=='')
           {
              alert('please Enter Docket No');
              return false;
           }
           if($("#offload_date").val()=='')
           {
              alert('please Enter Offload Date');
              return false;
           }
           
            if($("#offload_reason").val()=='')
           {
              alert('please Select Offload Reason');
              return false;
           }
           if($("#remark").val()=='')
           {
              alert('please Enter Remark');
              return false;
           }
           
           var docket_no  = $("#docket_no").val();
           var offload_date  = $("#offload_date").val();
           var offload_reason  = $("#offload_reason").val();
           var remark  = $("#remark").val();
           var formData = new FormData();
         
          formData.append('docket_no',docket_no);
          formData.append('offload_date',offload_date);
          formData.append('offload_reason',offload_reason);
          formData.append('remark',remark);
          
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/OffLoadEntryPost',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            const obj = JSON.parse(data);
            if(obj.success==1)
            {
                alert('Successfully Submit');
                $('#docket_no').val('');
                $('#offload_date').val('');
                $('#offload_reason').val('');
                $('#remark').val('');
               
                return false;
            }
             
            }
            });
    }
   

    

</script>