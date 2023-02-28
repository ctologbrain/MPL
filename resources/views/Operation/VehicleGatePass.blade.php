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
    box-shadow: 0 0px 5px rgba(0, 0, 0, 0.5);
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
                        <li class="breadcrumb-item active">Gate Pass</li>
                    </ol>
                </div>
                <h4 class="page-title">Gate Pass</h4>
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
                                     <div class="col-6">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="option">option<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                   
                                                   <input type="radio" name="with_fpm" tabindex="3"
                                                        class="with_fpm" id="with_fpm" value="" readonly> With FPM
                                                        <input type="radio" name="without_FPM" tabindex="4"
                                                        class="without_FPM" id="without_FPM" value="" readonly> Without FPM
                                                <input type="hidden" name="id" tabindex="4"
                                                class="form-control" id="id" value="" readonly>
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">FPM NUMBER<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                   
                                                   <input type="text" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                        <input type="hidden" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                </div>
                                              
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="fpm_date">Type<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                 <select name="type" tabindex="2"
                                                    class="form-control selectBox type" id="type">
                                                    <option value="">--select--</option>
                                                   
                                                    <option value="1">PTL/FTL/Local</option>
                                                    
                                                </select>
                                                <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                        </div>
                                            
                                           
                                               

                                           
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">GP Time_Stamp<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                        </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">Placement Time_Stamp<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                 <input type="text" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                <input type="hidden" name="Cid" class="form-control Cid" id="Cid">
                                        </div>
                                            
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="route">Route<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                               <select name="route" tabindex="3"
                                                    class="form-control selectBox route" id="route">
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
                                            <label class="col-md-4 col-form-label" for="vendor_name">Vendor Name</label>
                                            <div class="col-8">
                                                <input type="text" name="vendor_name" tabindex="7"
                                                    class="form-control vendor_name" id="vendor_name" onchange="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vehicle_name">Vechile Name<span
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

                                            <label class="col-md-4 col-form-label" for="driver_name">Driver Name</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="driver_name" tabindex="8"
                                                    class="form-control driver_name " id="driver_name" readonly> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="mob_no">Mobile No</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="mob_no" tabindex="8"
                                                    class="form-control mob_no" id="mob_no" readonly> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="dev_id">Device Id</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="dev_id" tabindex="8"
                                                    class="form-control dev_id" id="dev_id" readonly> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="sprvisor_name">Supervisor Name</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="sprvisor_name" tabindex="8"
                                                    class="form-control sprvisor_name" id="sprvisor_name" readonly> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-4 col-form-label" for="seal_number">Seal Number</label>
                                            <div class="col-md-8">
                                                <input type="number" step="0.1" name="seal_number" tabindex="8"
                                                    class="form-control seal_number" id="seal_number" readonly> 

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
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="start_km">Start Km<span class="error">*</span></label>
                                            <div class="col-md-8">
                                              <input type="number" step="0.1" name="start_km" tabindex="8"
                                                    class="form-control start_km" id="start_km" readonly>   
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            <label class="col-md-4 col-form-label" for="vehicle_teriff">Vehicle Teriff<span class="error">*</span></label>
                                            <div class="col-md-8">
                                              <input type="number" step="0.1" name="vehicle_teriff" tabindex="8"
                                                    class="form-control vehicle_teriff" id="vehicle_teriff" readonly>   
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            
                                            <label class="col-md-4 col-form-label" for="adv_driver">Adv. to Driver<span class="error">*</span></label>
                                            <div class="col-md-8">
                                              <input type="number" step="0.1" name="vehicle_teriff" tabindex="8"
                                                    class="form-control adv_driver" id="adv_driver" readonly>   
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                   <div class="col-12 total-text">
                                        <div class="row">
                                           <div class="col-6">
                                                <h4>Total Distance: Total Travel Time:</h4>
                                            </div>
                                            <div class="col-6 text-end">
                                               <input id="genrate_gate" type="button" class="btn btn-primary" value="Generate Gate Pass" onclick=";" >  
                                            </div>
                                            
                                        </div>
                                    </div>
                                  
                                   
                                   

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
                <div class="col-xl-12">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td1">Destination Office</th>
                            <th class="p-1 td2">Docket No<span class="error">*</span></th>
                            <th class="p-1 td3">Pieces</th>
                            <th class="p-1 td4">Weight</th>
                            <th class="p-1 td5">Pieces</th>
                            <th class="p-1 td6">Weight</th>
                            <th class="p-1 td7"></th>
                            <th class="p-1 td8"></th>

                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            <td class="p-1"> <select name="destination_office" tabindex="30" class="form-control destination_office" id="destination_office">
                          <option value="1"></option>
                           
                        </select> </td>
                            <td class="p-1"><input type="text" step="0.1" name="docket_number" tabindex="8"
                                                    class="form-control docket_number" id="docket_number" readonly>   </td>
                            <td class="p-1"><input type="text" step="0.1" name="pieces" tabindex="8"
                                                    class="form-control pieces" id="pieces" readonly>   </td>

                            <td class="p-1"><input type="text" step="0.1" name="weight" tabindex="8"
                                                    class="form-control weight" id="weight" readonly></td>
                            <td class="p-1"></td>
                            <td class="p-1"></td>
                            <td class="p-1"><input id="save" type="button" class="btn btn-primary" value="Save" onclick="" ></td>
                            <td class="p-1 td8">
                                
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">Gatepass No.:<span
                                                        class="error">*</span></label>
                                                <div class="col-md-5">
                                                   
                                                   <input type="text" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                        <input type="hidden" name="fpm_number" tabindex="3"
                                                        class="form-control fpm_number" id="fpm_number" value="" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="print" type="button" class="btn btn-primary" value="print" onclick="" >
                                                </div>
                                             </div>
                                   
                            </td>
                        </tr>
                        <tr class="main-title">
                            <td colspan="8" class="p-1 text-center text-dark">Record Not Available...</td>
                        </tr>
                        </tbody>
                         
                  </table> 


                </div> 
           </div>     
                
                 
                       
            
       </div>
    </div>
</form>
</div>
                <!-- Button trigger modal -->


<!-- Modal -->

    