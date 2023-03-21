@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">UPLAOD BULK DOCKET IMAGE</h4>
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
                                  <div class="col-6 col-6-md">
                                    <div class="row">
                                      

                                        <div class="col-12">
                                             <div class="row mb-1">
                                                    <label class="col-md-3 col-form-label" for="physcial_pod">Physical POD Recieved</label>
                                                    <div class="col-md-8">
                                                       
                                                       <input type="radio" name="submitTo" tabindex="1"
                                                            class="physcial_pod" id="physcial_pod" value="1" onclick="" checked>
                                                           
                                                       
                                                    </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <div class="row">
                                               
                                                        <label class="col-md-3 col-form-label" for="submitToCustomer">Submit to Customer</label>
                                                        <div class="col-md-8">
                                                           
                                                           <input type="radio" name="submitTo" tabindex="2"
                                                                class="submitToCustomer" id="submitToCustomer" value="1" onclick="" >
                                                               
                                                        <input type="hidden" name="id"
                                                        class="form-control id" id="id" value="" readonly>
                                                        </div>
                                                </div>
                                        </div>  
                                                       
                                        <div class="col-12">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="remarks">Remarks</label>
                                                <div class="col-md-6">
                                               
                                               
                                                  
                                                 <Textarea class="form-control remark"
                                                        placeholder="Remark"  tabindex="3"  name="remark" id="remark"></Textarea>
                                                         
                                                      
                                                </div>
                                            </div>
                                        </div>
                                                        
                                          
                                        <div class="col-12 mt-1">
                                            <div class="row">
                                                 <label class="col-md-3 col-form-label" for="Select">Select File</label>
                                                <div class="col-md-6">
                                               
                                               
                                                  
                                                <input type="file" name="choose_file" id="choose_file" class="choose_file" tabindex="4" multiple >
                                                    <label class="col-md-12 col-form-label text-danger" for="choose_file">* Allowed (JPEG ,PNG,JPG, JPACK) Format Only.</label>  
                                                </div>
                                            </div>
                                        </div> 
                                               
                                         <div class="col-12">
                                                <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                
                                                <input type="button" tabindex="5" value="Save Image" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="TriggerSubmit();">
                                                
                                        </div>

                                    </div>
                                 </div>
                                              
                                                    
                               </div>  

                        </div>      
                    
                           
                           
                    </form>
                    <div class="table-responsive a">
                    <table class="table table-bordered table-centered mb-1 mt-3 ">
                        <thead id="thead">
                            
                        </thead>
                        <tbody id="appendRow">
                        </tbody>
                    </table>
                    </div>
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

function TriggerSubmit() {
    console.log($('#choose_file')[0].files);
   
    var formdata = new FormData();
    var remark = $("#remark").val();
    var submitTo = $("input[name=submitTo]").val();
    if ($('#choose_file')[0].files.length > 0) 
    {
      for (var i = 0; i < $('#choose_file')[0].files.length; i++)
       formdata.append('file[]', $('#choose_file')[0].files[i]);
    }

    if(submitTo==''){
        alert("please Choose check");
        return false;
    }

    if(remark==''){
        alert("please Enter Remark");
        return false;
    }

     if ($('#choose_file')[0].files.length == 0) {
        alert("please Choose Docket Image File");
        return false;
     }
        formdata.append('remark',remark);
        formdata.append('submitTo',submitTo);
        

    var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/UploadDocketPost',
           cache: false,
           processData:false,
           contentType:false,
           data:formdata,
            success: function(data) {
                var obj = JSON.parse(data);
                var head =`<th>Docket No</th>
                            <th>Status</th>`;
                 $("#thead").html(head);
                 $("#appendRow").html(obj.body);
            }
        });

   
}
 
  
 

 
</script>