@include('layouts.appThree')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
           
        </div>
        <div class="container">
            <nav class="navbar navbar-light bg-light">
              <form class="form-inline ml-1">
                <button id="defaultOpen" class="btn btn-outline-success" type="button" onclick="homePage()">Customer Other Charge</button>
                <button class="btn btn-outline-success" type="button" onclick="newsPage()">Vendor Other Charge</button>
              </form>
            </nav>
        
        </div>
         
    </div>
   
<div id="Home" >
<form method="POST" action=""  >

    <div class="row">
        <div class="col-xl-12">
            <div class="card customer_oda_rate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="mb-1">
                                    
                                    <div class="row">
                                        <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="customer_name">Charge Action</label>
                                                                  <div class="col-md-8">
                                                               <select class="form-control chrg_actions selectBox" id="chrg_actions" name="chrg_actions" tabindex="1">
                                                                <option value="1">ADDITION</option>
                                                                <option value="2">DEDUCATION</option>
                                                                   
                                                               </select>
                                                               <input type="hidden" name="chrg_id" id="chrg_id" >
                                                                  </div>
                                                      
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                            </div>
                                        </div>

                                        <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="chrg_name">Charge Name<span class="error">*</span></label>
                                                                  <div class="col-md-8">
                                                               <input type="name" name="chrg_name" class="chrg_name form-control" id="chrg_name" tabindex="2">

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                            </div>
                                        </div>

                                        <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="chrg_type">Charge Type</label>
                                                                  <div class="col-md-8">
                                                              <select class="form-control chrg_type selectBox" id="chrg_type" name="chrg_type" tabindex="3">
                                                                <option value="2">%</option>
                                                                <option value="1">Amount</option>
                                                                   
                                                               </select>

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                  <label class="col-md-2 col-form-label" for="chrg_name">Charges<span class="error">*</span></label>
                                                                  <div class="col-md-4">
                                                               <input type="name" name="charges" class="charges form-control" id="charges" tabindex="4">

                                                                  </div>

                                            </div>
                                        </div>

                                        <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="range_type">Range Type</label>
                                                                  <div class="col-md-8">
                                                              <select class="form-control range_type selectBox" id="range_type" name="range_type" tabindex="5">
                                                                @foreach($ChargesRange as $key)
                                                                <option value="{{$key->Id}}">{{$key->Title}}</option>
                                                                @endforeach
                                                                
                                                                   
                                                               </select>

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                  <label class="col-md-2 col-form-label" for="range_from">Range From<span class="error">*</span></label>
                                                                  <div class="col-md-4">
                                                               <input type="name" name="range_from" class="range_from form-control" id="range_from" tabindex="4">

                                                                  </div>
                                                                  <label class="col-md-2 col-form-label" for="range_to">Range To<span class="error">*</span></label>
                                                                  <div class="col-md-4">
                                                               <input type="name" name="range_to" class="range_to form-control" id="range_to" tabindex="4">

                                                                  </div>
                                                                 
                                            </div>
                                        </div>
                                        <div class="col-8">

                                            <div class="row mb-1">

                                                   <label class="col-md-3 col-form-label" for="mode"></label>
                                                    <div class="col-md-9 text-end">
                                                           <input type="button" tabindex="4" value="Save"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="SubmitCustomerCharge();">
                                                          <a href="" tabindex="5"
                                                        class="btn btn-primary">Cancel</a>
                                                    </div>
                                                     
                                            
                                                    
                                            </div>
                                        </div>

                                        <hr>

                                       
                                    </div>
                                </div>
                                
                                   
                               
                            </div>
               
                     </div>
                 </div>
                     
                </div>
               
            </div>

                                      
         <table class="table-responsive table-bordered">
                                                <thead>
                                                    
                                                   
                                                    <tr class="main-title text-dark">
                                                        <th class="p-1">SL#</th>
                                                        <th class="p-1">ACTION</th>
                                                        <th class="p-1">Charge Action</th>
                                                        <th class="p-1">Charge Name</th>
                                                        <th class="p-1">Charge Type</th>
                                                        <th class="p-1">Charges</th>
                                                        <th class="p-1">Range Type</th>
                                                        <th class="p-1">Range From</th>
                                                        <th class="p-1">Range To</th>
                                                        <th class="p-1">Active</th>
                                                        <th class="p-1">Created By</th>
                                                        <th class="p-1">Created On</th>

                                                    </tr>
                                       
                                               </thead> 
                                             <tbody>
                                                <?php $i=0; ?>
                                                @if(!empty($OtherCharges))
                                                @foreach($OtherCharges as $key)
                                                <?php $i++; 
                                                if($key->Action==1){
                                                $action= 'Addition';
                                                }
                                                else{
                                                $action= 'Deduction';
                                                }

                                                if($key->Type==1){
                                                    $type='Amount';
                                                }
                                                else{
                                                    $type='%';
                                                }
                                                if($key->is_active){
                                                    $status='YES';
                                                    $btn='Deactivate';
                                                }
                                                else{
                                                    $status='NO';
                                                    $btn='Activate';
                                                }
                                                ?>
                                                <tr>
                                                    <td class="p-1">{{$i}} </td>
                                                    <td class="p-1"> <a onclick="getCustomerChargeDetailsView('{{$key->Id}}');"  href="javascript:void(0);">View</a> | <a onclick="getCustomerChargeDetails('{{$key->Id}}');"  href="javascript:void(0);"> Edit</a> | <a id="BTN{{$i}}" onclick="getActive('{{$key->Id}}','{{$i}}');"  href="javascript:void(0);">{{$btn}}</a></td>
                                                    <td class="p-1">{{$action}} </td>
                                                    <td class="p-1">{{$key->Title}}</td>
                                                    <td class="p-1">{{$type}}</td>
                                                    <td class="p-1">{{$key->Amount}}</td>
                                                    <td class="p-1">@isset($key->ChargeTypeDeatils->Title) {{$key->ChargeTypeDeatils->Title}} @endisset</td>
                                                    <td class="p-1">{{$key->Range_From}}</td>
                                                    <td class="p-1">{{$key->Range_To}}</td>
                                                    <td id="BTNRes{{$i}}" class="p-1">{{$status}}</td>
                                                    <td class="p-1">@isset($key->UserDetails->name){{$key->UserDetails->name}} @endisset</td>
                                                    <td class="p-1">{{$key->Created_At}}</td>
                                                   
                                                </tr>
                                               @endforeach
                                                @endif
                                               
                                               
                                              
                                            </tbody>
         </table> 

      <div class="col-md-12">
        <div class="d-flex d-flex justify-content-between">
          @if(!empty($OtherCharges))  {{$OtherCharges->appends(Request::except('page'))->links()}} @endif
         

        </div>
     </div>
     </div>
     </div>
                                        
                            
</form>
</div>

<div id="News" >
<form method="POST" action="">

    <div class="row"  >
        <div class="col-xl-12">
            <div class="card customer_oda_rate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="mb-1">
                                    
                                    <div class="row">
                                         
                                      
                                      
                                     
                                        

                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="customer_name">Charge Action</label>
                                                                  <div class="col-md-8">
                                                               <select class="form-control chrg_actions selectBox" id="chrg_actions" name="chrg_actions" tabindex="1">
                                                                <option value="1">ADDITION</option>
                                                                <option value="1">EDUCATION</option>
                                                                   
                                                               </select>

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="vendor_identifivcation">Vendor Identification<span class="error">*</span></label>
                                                                  <div class="col-md-8">
                                                               <select class="form-control charges_on_weight selectBox" id="charges_on_weight" name="charges_on_weight" tabindex="5">
                                                                <option value="1">3PL</option>
                                                                <option value="1">AIRLINE</option>
                                                                <option value="1">COMPUTER VENDOR</option>
                                                                <option value="1">COURIER VENDOR</option>
                                                                <option value="1">FIX ASSEST PURCHASE</option>
                                                                <option value="1">HIRING</option>
                                                                <option value="1">LINEHAUL VEHICLE VENDOR</option>
                                                                <option value="1">OFFICE VENDOR</option>
                                                                <option value="1">OTHER VENDOR</option>
                                                                <option value="1">OWNER</option>
                                                                <option value="1">PICKUP/DELIVERY VEHICLE VENDOR</option>
                                                                <option value="1">PRINTING & STATIONARY</option>
                                                                <option value="1">REPAIR & MAINTENANCE</option>
                                                                <option value="1">SELF</option>
                                                                <option value="1">TRANSPORTER</option>


                                                                   
                                                               </select>

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="chrg_name">Charge Name</label>
                                                                  <div class="col-md-8">
                                                              <input type="name" name="chrg_name" class="chrg_name form-control" id="chrg_name" tabindex="2">

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                  

                                            </div>
                                        </div>

                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="charges_on_weight">Charges On Weight</label>
                                                                  <div class="col-md-8">
                                                              <select class="form-control charges_on_weight selectBox" id="charges_on_weight" name="charges_on_weight" tabindex="5">
                                                                <option value="1">--Select----</option>
                                                                <option value="1">GROSS OR VOLUME</option>
                                                                <option value="1">M-AWB</option>
                                                                <option value="1">ACTUAL</option>
                                                               
                                                               </select>

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>

                                        <div class="col-4">
                                        </div>

                                        <div class="col-6">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="from_weight">From Weight</label>
                                                                  <div class="col-md-3">
                                                             <input type="text" name="from_weight" class="from_weight form-control" id="from_weight">

                                                                  </div>
                                                                  <label class="col-md-2 col-form-label" for="to_weight">To Weight</label>
                                                                  <div class="col-md-3">
                                                             <input type="text" name="to_weight" class="to_weight form-control" id="to_weight">

                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                        
                                        


                                        <div class="col-8">

                                            <div class="row mb-1">

                                                   <label class="col-md-3 col-form-label" for="mode"></label>
                                                    <div class="col-md-9 text-end">
                                                           <input type="button" tabindex="4" value="Save"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="">
                                                          <a href="" tabindex="5"
                                                        class="btn btn-primary">Cancel</a>
                                                    </div>
                                                     
                                            
                                                    
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row ">
                                                <div class="main-title text-dark p-1 fw-bold text-center">Record Not Availbale.....</div>
                                            </div>
                                        </div>


                                       
                                    </div>
                                </div>
                                
                                   
                               
                            </div>
               
                        </div>
                    </div>
                     
                </div>
               
            </div>
        </div>
     </div>
                                  
</form>
</div>
</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
 function homePage() {
 
  document.getElementById('Home').style.display = "flex";
  document.getElementById('News').style.display = "none";
  
}


 function newsPage() {
 
  document.getElementById('News').style.display = "flex";
  document.getElementById('Home').style.display = "none";

  
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    
    
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    function gitFcmNumber(value)
    {
     
     if(value==1)
      { 
        $('.fpm_number').attr('disabled', false);
      }
     else{
       
         $('.fpm_number').attr('disabled', true);
     }
    }


    function getCustomerChargeDetailsView(ID)
    {
        var base_url = '{{url('')}}';
        var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/OtherCustomerChargeData',
       cache: false,
       data: {
           'ID':ID
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
           
             
            $('#chrg_name').val(obj.datas.Title);
            $('#chrg_type').val(obj.datas.Type).trigger('change');
            $('#charges').val(obj.datas.Amount);
            $('#range_type').val(obj.datas.Range_Type).trigger('change');
            $('#range_from').val(obj.datas.Range_From);
            $('#range_to').val(obj.datas.Range_To);
            $('#chrg_actions').val(obj.datas.Action).trigger('change');
            $(".btnSubmit").attr("disabled", true);
             $('.chrg_name').prop("readonly",true);
             $('.chrg_type').prop("disabled",true);
             $('.charges').prop("readonly",true);
             $('.range_type').prop("disabled",true);
             $('.range_from').prop("readonly",true);
             $('#range_to').prop("readonly",true);
             $('#chrg_actions').prop("disabled",true);
            
        }
        else{
           $('.chrg_id').val('');
            $('.chrg_name').focus();
            $('.chrg_type').val('');
            $('.charges').val('');
            $('.range_type').val('');
            $('.range_from').val('');
            $('#range_to').val('');
            $('#chrg_actions').val('');
            return false;
           
        }

       }
     });
    }
    // function getSourceAndDest(routeId)
    // {
    //     var base_url = '{{url('')}}';
    //    $.ajax({
    //    type: 'POST',
    //    headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getSourceAndDest',
    //    cache: false,
    //    data: {
    //        'routeId':routeId
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
    //       $('.origin').val(obj.statrt_point_details.CityName);
    //       $('.origin').attr('readonly', true);
    //       $('.destination').val(obj.end_point_details.CityName);
    //       $('.destination').attr('readonly', true);
    //       $.ajax({
    //      type: 'POST',
    //      headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getOffcieByCity',
    //    cache: false,
    //    data: {
    //        'EndPoint':obj.Destination
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
         
         
    //    }
    //  });
    //    }
    //  });
    // }

    function getCustomerChargeDetails(ID)
{
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/OtherCustomerChargeData',
       cache: false,
       data: {
           'ID':ID
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
           
             $('#chrg_id').val(obj.datas.Id);
            $('#chrg_name').val(obj.datas.Title);
            $('#chrg_type').val(obj.datas.Type).trigger('change');
            $('#charges').val(obj.datas.Amount);
            $('#range_type').val(obj.datas.Range_Type).trigger('change');
            $('#range_from').val(obj.datas.Range_From);
            $('#range_to').val(obj.datas.Range_To);
            $('#chrg_actions').val(obj.datas.Action).trigger('change');
            $(".btnSubmit").attr("disabled", false);
             $('.chrg_name').prop("readonly",false);
             $('.chrg_type').prop("disabled",false);
             $('.charges').prop("readonly",false);
             $('.range_type').prop("disabled",false);
             $('.range_from').prop("readonly",false);
             $('#range_to').prop("readonly",false);
             $('#chrg_actions').prop("disabled",false);
            
            
        }
        else{
           $('.chrg_id').val('');
            $('.chrg_name').focus();
            $('.chrg_type').val('');
            $('.charges').val('');
            $('.range_type').val('');
            $('.range_from').val('');
            $('#range_to').val('');
            $('#chrg_actions').val('');
            return false;
           
        }

       }
     });
}
function SubmitCustomerCharge()
{
    
    if($('#chrg_actions').val()=='')
    {
        alert('Please Select Action');
        return false;
    }
    if($('#chrg_name').val()=='')
    {
        alert('Please Enter  Charge Name');
        return false;
    }
    if($('#chrg_type option:selected').val()=='')
    {
        alert('Please Select Charge Type');
        return false;
    }
    if($('#charges').val()=='')
    {
        alert('Please Selelct Charges');
        return false;
    }
    if($('#range_type option:selected').val()=='')
    {
        alert('Please Selelct Range Type');
        return false;
    }
    if($('#range_from').val()=='')
    {
        alert('Please Enter Range From');
        return false;
    }
    if($('#range_to').val()=='')
    {
        alert('Please Enter Range To');
        return false;
    }

    var chrg_id=$('#chrg_id').val();
    
    var chrg_name = $("#chrg_name").val();
    var chrg_type=$('#chrg_type option:selected').val();
    var charges=$('#charges').val();
    var range_type=$('#range_type option:selected').val();
    var range_from=$('#range_from').val();
    var range_to=$('#range_to').val();
    var chrg_actions=$('#chrg_actions').val();

    
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CustomerOtherChargesPost',
       cache: false,
       data: {
           'chrg_name':chrg_name,'chrg_type':chrg_type,'charges':charges,'range_type':range_type,'range_from':range_from,'range_to':range_to,'chrg_actions':chrg_actions,'ID':chrg_id
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        alert(data);
            $('.chrg_id').val('');
            $('.chrg_name').focus();
            $('.chrg_type').val('');
            $('.charges').val('');
            $('.range_type').val('');
            $('.range_from').val('');
            $('#range_to').val('');
            $('#chrg_actions').val('');
            location.reload();
            return false;
            
       }
     });

}

function getActive(ID,idBtn){

var base_url = '{{url('')}}';
var btn= $('#BTN'+idBtn).text();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCustomerActive',
       cache: false,
       data: {
         'ID':ID, 'btn':btn
       }, 
       success: function(data) {
         const obj = JSON.parse(data);
        if(obj.Status==1)
        {
            if(btn=="Activate"){
            $('#BTN'+idBtn).text('Deactivate');
            $('#BTNRes'+idBtn).text('YES');
            }
            else if(btn=="Deactivate"){
                 $('#BTN'+idBtn).text('Activate');
                 $('#BTNRes'+idBtn).text('NO');
            }
        }
}
});

}



    </script>
             
    