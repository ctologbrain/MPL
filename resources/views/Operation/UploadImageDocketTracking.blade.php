<style>
.main-title {
    background-color: #825d5d42;
    padding: 0px 10px;
    align-items: center;
    color: #000;
    
}
</style>
<div class="modal fade model-popup generate-container" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                       
                <div class="main-title">
                <h5 class="text-center">{{$title}}</h5>
                </div>
                       
                <div class="modal-body" style="padding:0px;">
                <div class="col-md-12">
            <div class="row">
            
                    <form>
                        <div id="basicwizard rto_container">
                            <div class="tab-content b-0 mb-0">
                               <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                 <div class="row">
                                    <div class="col-3 col-3-md">
                                    </div>
                                    <div class="col-7 col-7-md">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="Docket">Docket No.</label>
                                                    <div class="col-md-6">
                                                    <input class="form-control Docket" type="text" value="{{$docket}}"  placeholder="Docket No."  tabindex="1"  name="Docket" id="Docket"> 
                                                    <!-- onchange="GetInfoDocket(this.value);"   -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                 <div class="row mb-1">
                                                        <label class="col-md-4 col-form-label" for="physcial_pod">Physical POD Recieved</label>
                                                        <div class="col-md-8">
                                                           <input type="radio" name="submitTo" tabindex="2"
                                                                class="physcial_pod" id="physcial_pod" value="1" onclick="" checked>
                                                        </div>
                                                 </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                            <label class="col-md-4 col-form-label" for="submitToCustomer">Submit to Customer</label>
                                                            <div class="col-md-8">
                                                               <input type="radio" name="submitTo" tabindex="3"
                                                                    class="submitToCustomer" id="submitToCustomer" value="0" onclick="" >
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
                                                            placeholder="Remark"  tabindex="4"  name="remark" id="remark"></Textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="row">
                                                     <label class="col-md-3 col-form-label" for="Select">Select File</label>
                                                    <div class="col-md-6">
                                                    <input type="file" name="choose_file" id="choose_file" class="choose_file" tabindex="5" >
                                                        <label class="col-md-12 col-form-label text-danger" for="choose_file">* Allowed (JPEG ,PNG,JPG, JPACK) Format Only.</label>  
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-12 mt-1">
                                                    <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                    <input type="button" tabindex="6" value="Save Image" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="TriggerSubmit();">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-2 col-2-md">
                                    </div>
                                 </div> 
                                </div> 
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive a">
                        <table class="table table-bordered table-centered mb-1 mt-3 ">
                            <thead id="thead" class="main-title text-dark">
                            </thead>
                            <tbody id="appendRow">
                            </tbody>
                        </table>
                    </div>
                
            </div>
            </div>      

            
            <div class="modal-footer">
                <div class="col-12 text-center">
                <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
               
            </div>

            </div>
        </div>
    </div>
    <script>
  
          
        $('.selectBox').select2({
            dropdownParent: $('#routeOrderModel')
        });

        $('#routeOrderModel').modal('toggle');
       
        $('#routeOrderModel').on('shown.bs.modal', function(e) {
            $('.datepickerOne').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
                });
            $('.datepickerOne').css('z-index','1600');
            });
        

    </script>