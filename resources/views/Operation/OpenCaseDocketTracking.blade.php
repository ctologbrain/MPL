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
                                    <input type="text" class="form-control docket_no" id="docket_no" name="docket_no" tabindex="2" value="{{$docket}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_by">Case Open By</label>
                                <div class="col-md-7">
                                    <select class="form-control selectBox" name="case_open_by" id="case_open_by" tabindex="5" style="width:100%;">
                                      
                                       @foreach($employee as $key)
                                        <option value="{{$key->id}}" @if(isset($UserId) && $UserId==$key->user_id) {{'selected'}} @else {{'disabled'}} @endif >{{$key->EmployeeCode}} ~ {{$key->EmployeeName}}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_date">Case Open date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control case_open_date" id="case_open_date" name="case_open_date" tabindex="4" value="{{date('d-m-Y')}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_status">Case Status</label>
                                <div class="col-md-5">
                                   <select class="form-control selectBox" name="case_status" id="case_status" style="width:100%;" tabindex="5">
                                       <option value="1">Open</option>
                                       <option value="2">Close</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_office">Case Open For Office<span class="error">*</span></label>
                                <div class="col-md-7">
                                    <option value="" >-Select--</option>
                                    <select class="form-control selectBox" name="case_open_office" id="case_open_office" tabindex="6" style="width:100%;">
                                    @foreach($Office as $key)
                                       <option value="{{$key->id}}" >{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="complaint_type">Complaint Type</label>
                                <div class="col-md-5">
                                   <select class="form-control selectBox" name="complaint_type" id="complaint_type" tabindex="7" style="width:100%;">
                                       <option value="BOX SHORT">BOX SHORT</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_type">Caller Type</label>
                                <div class="col-md-5">
                                    <select class="form-control selectBox" name="caller_type" id="caller_type" tabindex="8" style="width:100%;">
                                       <option value="OFFICE">OFFICE</option>
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
                               
                                    <select class="form-control selectBox caller_city" name="caller_city" id="caller_city" tabindex="11" style="width:100%;">
                                    <option value="" >-Select--</option>
                                    @foreach($City as $key)
                                       <option value="{{$key->id}}" >{{$key->Code}} ~ {{$key->CityName}}</option>
                                    @endforeach
                                   </select>
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
                                   <textarea name="remarks" id="remarkks" class="form-control remarks" rows="2" tabindex="13"></textarea>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-12 text-center mt-1">
                            <input onclick="caseSubmit();" type="button" name="recieve" value="Save" class="btn btn-primary">
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