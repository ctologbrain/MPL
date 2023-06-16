<style type="text/css">
.recieve_document h5{
  
        margin:0;
   
}
.modal-body{
    padding:0px;
}
</style>
<div class="modal fade model-popup recieve_document" id="routeOrderModel"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                    <div class="modal-body">
                    <h5 class="text-center" style="background-color: #825d5d42;padding:6px 10px;color:#000; ">CASE OPEN</h5>
                    <div class="row p-1 mt-2">
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_no">Case Number</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control case_no" id="case_no" name="case_no" tabindex="1" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="docket_no">Docket Number</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control docket_no" id="docket_no" name="docket_no" tabindex="2" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_by">Case Open By</label>
                                <div class="col-md-7">
                                    <select class="form-control selectBox" name="case_open_by" id="case_open_by" tabindex="5" disabled>
                                       <option value="1">VISHAL - VISHAL</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_date">Case Open date</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control case_open_date" id="case_open_date" name="case_open_date" tabindex="4" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_status">Case Status</label>
                                <div class="col-md-5">
                                   <select class="form-control selectBox" name="case_status" id="case_status" tabindex="5">
                                       <option value="1">Open</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_office">Case Open For Office<span class="error">*</span></label>
                                <div class="col-md-7">
                                    <select class="form-control selectBox" name="case_open_office" id="case_open_office" tabindex="6">
                                       <option value="1">HO ~ HO-DELHI</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="complaint_type">Complaint Type</label>
                                <div class="col-md-5">
                                   <select class="form-control selectBox" name="complaint_type" id="complaint_type" tabindex="7">
                                       <option value="1">HO ~ HO-DELHI</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_type">Caller Type</label>
                                <div class="col-md-5">
                                    <select class="form-control selectBox" name="caller_type" id="caller_type" tabindex="8">
                                       <option value="1">Offices</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_name">Caller Name<span class="error">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control caller_name" id="caller_name" name="caller_name" tabindex="9">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="contact_no">Contact Number</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control contact_no" id="contact_no" name="contact_no" tabindex="10">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_city">Caller City</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control caller_city" id="caller_city" name="caller_city" tabindex="11">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="email">Email</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control email" id="email" name="email" tabindex="12">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="remarks">Remarks<span class="error">*</span></label>
                                <div class="col-md-7">
                                   <textarea class="form-control" rows="2" tabindex="13"></textarea>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-12 text-center mt-1">
                            <input type="button" name="recieve" value="Save" class="btn btn-primary">
                             <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6">
                        </div>
                        
                    </div>
                   

            </div>
        </div>
    </div>
    <script>
        $('.selectBox').select2();
        $('#routeOrderModel').modal('toggle');

    </script>