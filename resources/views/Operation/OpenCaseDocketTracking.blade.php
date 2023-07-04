<style type="text/css">
.recieve_document h5{
  
        margin:0;
   
}
.modal-body{
    padding:0px;
    
}
.modal-lg, .modal-xl {
    max-width: 959px;
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
                                    <input readonly type="text" class="form-control case_no" id="case_no" name="case_no" tabindex="1" @if(isset($CaseDetails->Case_number)) disabled value="{{$CaseDetails->Case_number}}" @endif  >
                                    <input type="hidden" class="form-control CaseOpenId" id="CaseOpenId" name="CaseOpenId" tabindex="1" @if(isset($CaseDetails->id)) value="{{$CaseDetails->id}}" @endif  >
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
                                   <select class="form-control selectBox" name="case_status" style="width:100%;" tabindex="5" @if(isset($CaseDetails->id)) disabled @else  id="case_status" @endif  >
                                       <option value="OPEN" @if(isset($CaseDetails->Case_Status) && $CaseDetails->Case_Status =="OPEN") selected @endif>OPEN</option>
                                       <option value="Query" @if(isset($CaseDetails->Case_Status) && $CaseDetails->Case_Status =="Query") selected @endif>Query</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="case_open_office">Case Open For Office<span class="error">*</span></label>
                                <div class="col-md-7">
                                 
                                    <select class="form-control selectBox" name="case_open_office" id="case_open_office" tabindex="6" style="width:100%;" @if(isset($CaseDetails->id)) disabled @endif  >
                                    <option value="" >-Select--</option>
                                    @foreach($Office as $key)
                                       <option value="{{$key->id}}" @if(isset($CaseDetails->Case_Office) && $CaseDetails->Case_Office ==$key->id) selected @endif>{{$key->OfficeCode}} ~ {{$key->OfficeName}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="complaint_type">Complaint Type</label>
                                <div class="col-md-5">
                                   <select class="form-control selectBox" name="complaint_type" id="complaint_type" tabindex="7" style="width:100%;" @if(isset($CaseDetails->id)) disabled @endif >
                                    @foreach($ComplainType as $key)
                                       <option value="{{$key->ComplaintType}}" @if(isset($CaseDetails->Complaint_Type) && $CaseDetails->Case_Office ==$key->ComplaintType) selected @endif> {{$key->ComplaintType}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_type">Caller Type</label>
                                <div class="col-md-5">
                                    <select class="form-control selectBox" name="caller_type" id="caller_type" tabindex="8" style="width:100%;" @if(isset($CaseDetails->id)) disabled @endif >
                                       <option value="OFFICE"  @if(isset($CaseDetails->Caller_Type) && $CaseDetails->Caller_Type =="OFFICE") selected @endif  >OFFICE</option>
                                       <option value="FRANCHISE" @if(isset($CaseDetails->Caller_Type) && $CaseDetails->Caller_Type =="FRANCHISE") selected @endif  >FRANCHISE</option>
                                       <option value="CUSTOMER" @if(isset($CaseDetails->Caller_Type) && $CaseDetails->Caller_Type =="CUSTOMER") selected @endif  >CUSTOMER</option>
                                       <option value="CONSIGNEE" @if(isset($CaseDetails->Caller_Type) && $CaseDetails->Caller_Type =="CONSIGNEE") selected @endif  >CONSIGNEE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_name">Caller Name<span class="error">*</span></label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control caller_name" id="caller_name" name="caller_name" tabindex="9" @if(isset($CaseDetails->Caller_Name)) value="{{$CaseDetails->Caller_Name}}" readonly @endif  >
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="contact_no">Contact Number</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control contact_no" id="contact_no" name="contact_no" tabindex="10" @if(isset($CaseDetails->Contact_Number)) value="{{$CaseDetails->Contact_Number}}" readonly @endif  >
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="caller_city">Caller City</label>
                                <div class="col-md-7">
                               
                                    <select class="form-control selectBox caller_city" name="caller_city" id="caller_city" tabindex="11" style="width:100%;" @if(isset($CaseDetails->id)) disabled @endif >
                                    <option value="" >-Select--</option>
                                    @foreach($City as $key)
                                       <option value="{{$key->id}}"  @if(isset($CaseDetails->Caller_City) && $CaseDetails->Caller_City ==$key->id) selected @endif >{{$key->Code}} ~ {{$key->CityName}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="email">Email</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control email" id="email" name="email" tabindex="12" @if(isset($CaseDetails->Email)) value="{{$CaseDetails->Email}}" readonly @endif  >
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="remarks">Remarks<span class="error">*</span></label>
                                <div class="col-md-7">
                                   <textarea @if(isset($CaseDetails->Remark)) readonly @else  id="remarkks"  @endif   name="remarks" class="form-control remarks" rows="2" tabindex="13"> @if(isset($CaseDetails->Remark)) {{$CaseDetails->Remark}}  @endif  </textarea>
                                </div>
                            </div>
                        </div>
                    @if(isset($CaseDetails->id))
                        <div class="col-md-12 text-center mt-1">
                        <h5 class="main-title p-1">Case Closing Details</h5>
                       </div>
                       <div class="col-6 m-b-1 mt-1">
                            <div class="row">
                                <label class="col-md-5" for="case_status">Case Status</label>
                                <div class="col-md-5">
                                    <select class="form-control selectBox" name="case_status" id="case_status" tabindex="14">
                                       <option value="IN PROCESS">IN PROCESS</option>
                                       <option value="UNSOLVED"> UNSOLVED</option>
                                       <option value="QUERY"> QUERY</option>
                                       <option value="CLOSED"> CLOSED</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-b-1 mt-1">
                            <div class="row">
                                <label class="col-md-5" for="CaseClosingDate">Closing Date</label>
                                <div class="col-md-7">
                                    <input disabled type="text" value="{{date('d-m-Y')}}" class="form-control CaseClosingDate" id="CaseClosingDate" name="CaseClosingDate" tabindex="15">
                                </div>
                            </div>
                        </div>
                         <div class="col-6 m-b-1">
                            <div class="row">
                                <label class="col-md-5" for="remarkks">Remarks<span class="error">*</span></label>
                                <div class="col-md-7">
                                   <textarea class="form-control" rows="2" tabindex="16" name="remarkks" id="remarkks"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center mt-1">
                            <input onclick="caseSubmit();"  type="button" name="recieve" value="Save" class="btn btn-primary" tabindex="17">
                             <button  type="button" class="btn btn-primary" data-bs-dismiss="modal" tabindex="18">Close</button>
                        </div>
                        <div class="col-md-12 text-center mt-1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="main-title">
                                        <th class="p-1 text-center" style="min-width: 40px;">SL#</th>
                                        <th class="p-1 text-start" style="min-width: 100px;">Case Status</th>
                                        <th class="p-1 text-start" style="min-width: 130px;">Entry By</th>
                                        <th class="p-1 text-start" style="min-width: 100px;">Entry Date</th>
                                        <th class="p-1 text-start" style="min-width: 200px;">Remarks</th>
                                        <th class="p-1 text-start" style="min-width: 130px;">Last Location</th>
                                        <th class="p-1 text-start" style="min-width: 100px;">Last Status</th>
                                        <th class="p-1 text-start" style="min-width: 150px;">Last Status Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($allCase as $case)
                                    <tr>
                                        <td class="p-1 text-center">1</td>
                                        <td class="p-1 text-start">{{$case->Case_Status}}</td>
                                        <td class="p-1 text-start">@isset($case->EmployeeDetail->EmployeeName){{$case->EmployeeDetail->EmployeeName}} @endisset</td>
                                        <td class="p-1 text-start">{{date("d-m-Y",strtotime($case->Created_At))}}</td>
                                        <td class="p-1 text-start">{{$case->Remark}}</td>
                                        <td class="p-1 text-start">@isset($case->StatusDetail->EmployeeDetails->OfficeMasterParent->CityDetails->CityName) {{$case->StatusDetail->EmployeeDetails->OfficeMasterParent->CityDetails->CityName}} @endisset</td>
                                        <td class="p-1 text-start">@isset($case->StatusDetail->StatusDetails->title) {{$case->StatusDetail->StatusDetails->title}} @endisset</td>
                                        <td class="p-1 text-start">@isset($case->StatusDetail->BookDate) {{date("d-m-Y",strtotime($case->StatusDetail->BookDate))}} @endisset</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="col-md-12 text-center mt-1">
                            <input onclick="caseSubmit();" type="button" name="recieve" value="Save" class="btn btn-primary">
                             <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                        @endif
                        
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