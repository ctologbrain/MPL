@include('layouts.appTwo')
<style>
label {
    font-size: 8.5pt !important;
    font-weight: 900;
    color: #444040
}
.consignorSelection
{
    display:none !important;
}
body{
    min-height: 844px !important;
}
.allLists{
    box-shadow: 0 2px 5px rgba(0, 0, 0, 1.0);
}
.generator-container .form-control{
    margin-bottom: 0px;
}
</style>
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
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-end">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">FPM NUMBER<span
                                                        class="error">*</span></label>
                                                <div class="col-md-5">
                                                   
                                                   <input type="text" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                        <input type="hidden" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <input id="print" type="button" class="btn btn-primary" value="print" onclick="" >
                                                </div>
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="fpm_date">FPM Date<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                                <input type="text" name="fpm_date" tabindex="1"
                                                    class="form-control fpm_date datepickerOne" id="fpm_date">
                                                <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                            </div>
                                            <label class="col-md-2 col-form-label" for="trip_type">Trip Type<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                                <select name="trip_type" tabindex="2"
                                                    class="form-control selectBox trip_type" id="trip_type">
                                                    <option value="">--select--</option>
                                                   @foreach($TripType as $TripType)
                                                    <option value="{{$TripType->id}}">{{$TripType->TripType}}</option>
                                                    @endforeach
                                                    
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="route">Route<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="route" tabindex="3"
                                                    class="form-control selectBox route" id="TripType">
                                                    <option value="">--select--</option>
                                                   
                                                    <option value="1"></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="origin">Origin<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                <input type="text" name="origin" tabindex="4"
                                                    class="form-control origin" id="origin" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="destination">Destination<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                <input type="text" name="destination" tabindex="5"
                                                    class="form-control destination" id="destination" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_name">Vehicle Name<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="vehicle_name" tabindex="6"
                                                    class="form-control selectBox vehicle_name" id="vehicle_name">
                                                    <option value="">--select--</option>
                                                   
                                                    <option value="1">Self Vechile</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_type">Vehicle Type<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="vehicle_type" tabindex="4"
                                                    class="form-control selectBox vehicle_type" id="vehicle_type">
                                                    <option value="">--select--</option>
                                                   
                                                    <option value="1">Self Vechile</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vendor_name">Vendor Name</label>
                                            <div class="col-8">
                                                <input type="text" name="vendor_name" tabindex="7"
                                                    class="form-control vendor_name" id="vendor_name" onchange="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="driver_name">Driver Name</label>
                                            <div class="col-md-7">
                                                <input type="number" step="0.1" name="driver_name" tabindex="8"
                                                    class="form-control driver_name " id="driver_name" readonly> 

                                            </div>
                                            <div class="col-md-1">
                                                <input type="button" step="0.1" name="plus" tabindex="9"
                                                    class="form-control" id="" value="+" readonly> 
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_model">Vehicle Model</label>
                                            <div class="col-md-8">
                                                 <select name="vehicle_model" tabindex="9"
                                                    class="form-control selectBox vehicle_model" id="vehicle_model">
                                                    <option value="">--select--</option>
                                                   
                                                    <option value="1">19 FEET CLOSE BODY</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vec_report_date">Vehicle Reporting Date</label>
                                            <div class="col-md-6">
                                                <input type="text" name="vec_report_date" tabindex="10"
                                                    class="form-control vec_report_date datepickerOne" id="vec_report_date">

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vec_load_date">Vehicle Loaded Date<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                  <input type="text" name="vec_load_date" tabindex="11"
                                                    class="form-control vec_load_date datepickerOne" id="vec_load_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="weight">Weight<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                              <input type="text" name="weight" tabindex="12"
                                                    class="form-control weight" id="weight">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="remark">Remark<span class="error">*</span></label>
                                            <div class="col-md-8">
                                                <Textarea class="form-control remark"
                                                    placeholder="Remark"  tabindex="14"  name="remark" id="remark"></Textarea>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="col-12 total-text">
                                        <div class="row">
                                            <h4>Total Distance: Total Transit Days:</h4>
                                        </div>
                                    </div>
                                  
                                   
                                   <div class="col-12">
                                        <div class="row">
                                            <div class="bdr-btm-top">
                                                  <input id="prevSubmit" type="button" class="btn btn-primary" value="Save & Print" onclick=";" > 
                                                  &nbsp;
                                                  <input id="prevSubmit" type="button" class="btn btn-primary" value="Restet" onclick="" >         
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
            <div class="row" >
                <div class="col-xl-12">
                   <div class="main-title-cancel">CANCEL DETAILS</div>
                            <div id="basicwizard">
                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane active cancel-container show" id="basictab1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12" id="ConsignorOne" >
                                                <div class="row">
                                                    <label clas $('.selectBox').select2();"col-md-2">
                                                     <input type="text" class="fpm_number" name="fpm_number" id="fpm_number">
                                                    </div>
                                                    <label class="col-md-1 col-form-label" for="cancel_remark">Cancel Remark<span class="error">*</span></label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="cancel_remark" name="cancel_remark" id="cancel_remark">
                                                  </div>
                                                  <label class="col-md-2 col-form-label" for="amount_vendor">Amount Paid to Vendor<span class="error">*</span></label>
                                                  <div class="col-md-2" >
                                                     <input  type="text" class="amount_vendor" name="amount_vendor" id="amount_vendor"> 
                                                  </div>
                                                   <div class="col-md-2" >
                                                     <input id="cancelFPM" type="button" class="btn btn-primary" value="Cancel FPM" onclick=";" > 
                                                  </div>
                                                </div>
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>


                </div> 
                   
                <div class="col-xl-12">
                   <div class="main-title-cancel">CLOSER DETAILS</div>
                            <div id="basicwizard">
                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane active show cancel-container" id="basictab1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="fpm_number">FPM Number<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                     <input type="text" class="form-control" name="Afpm_number" id="fpm_number fpm_number">
                                                    </div>
                                                   
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                     <label class="col-md-4 col-form-label" for="closer_remark">Closer Remark<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control closer_remark" name="closer_remark" id="closer_remark">
                                                  </div>
                                                  
                                                 
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                     <label class="col-md-4 col-form-label" for="close_date">Closer Date<span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control datepickerOne" name="close_date" id="close_date">
                                                  </div>
                                                  
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                      <label class="col-md-4 col-form-label" for="end_meter_reading">End Meter Reading<span class="error">*</span></label>
                                                  <div class="col-md-8">
                                                     <input type="text" class="form-control" name="end_meter_reading" id="end_meter_reading">
                                                  </div>
                                                  
                                                  
                                                </div>
                                            </div>

                                            <div class="col-md-12" >
                                                     <input id="closeFPM" type="button" class="btn btn-primary" value="Close FPM" onclick=";" > 
                                                  </div>
                                            
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>


                </div> 
                 
                       
            </div>
    </div>
                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Volumetric Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered  table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Measurement</th>
                                                    <th>Length<span class="error">*</span></th>
                                                    <th>Width<span class="error">*</span></th>
                                                    <th>Height<span class="error">*</span></th>
                                                    <th>Quantity<span class="error">*</span></th>
                                                    <th>Actual Weight  (Per Piece)<span class="error">*</span></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="table-user">
                                                    <select name="PackingMethod" tabindex="30" class="form-control PackingMethod" id="PackingMethod">
                                                          <option value="1">INCH</option>
                                                           
                                                        </select> 
                                                       
                                                    </td>
                                                    <td> 
                                                       
                                                    <input type="number" step="0.1" name="lenght"  class="form-control lenght" id="lenght">
                                                        </td>
                                                    <td> <input type="number" step="0.1" name="width"  class="form-control width" id="width"> </td>
                                                    <td>
                                                        <input type="number" step="0.1" name="height"  class="form-control height" id="height">
                                                    </td>
                                                    <td>
                                                        <input type="number"  step="0.1" name="qty"  class="form-control qty" id="qty">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.1" name=""  class="form-control VloumeActualWeight" id="VloumeActualWeight">
                                                    </td>
                                                    
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6"> 
                                                        <p></p>  
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    
                                                   
                                                </tr>
                                            </tfoot>
                                           
                                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="">Save</button>
      </div>
    </div>
  </div>
</div>
   <script>
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    </script>
    