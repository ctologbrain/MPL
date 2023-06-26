@include('layouts.appFour')
<style type="text/css">
.primary-bg{
  background-color:#888888;
  padding-top: 5px;
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
                        <li class="breadcrumb-item active">3PL VENDOR TARIFF</li>
                    </ol>
                </div>
                <h4 class="page-title">3PL VENDOR TARIFF</h4>
                 <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="" id="subForm">
    @csrf
        <div class="row pl-pr mt-1">
            <div class="col-xl-12">
                <div class="card customer_tariff_container">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row bdr-btm primary-bg">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="vendor_name" style="color: #fff;">Vendor Name</label>
                                                <div class="col-md-5">
                                                    <input type="text" name="vendor_name" tabindex="1" class="form-control vendor_name" id="vendor_name">
                                                    <input type="hidden" id="MasterId" class="MasterId">
                                                </div>
                                                <div class="col-md-4">
                                                        <select name="vendor_name" tabindex="2"
                                                        class="form-control vendor_name selectBox" id="vendor_name">
                                                            <option value="">--select--</option>
                                                            <option value="">LATEST</option>
                                                            <option value="">WITH HISTORY</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-1 mb-1">
                                               <a href="#" class="header-btn" tabindex="3">Export</a>
                                               <a href="#" class="header-btn" tabindex="4">Missing Customer</a>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mt-1 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="vendor_name">Vendor Name<span class="error">*</span></label>
                                                <div class="col-8">
                                               <select name="vendor_name" class="form-control vendor_name" id="vendor_name" tabindex="5">
                                                   <option value="">--Select</option>
                                                @foreach($customer as $cust)   
                                                <option value="{{$cust->id}}">{{$cust->CustomerCode}}~{{$cust->CustomerName}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-1 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="wef_date">W. E. F. Date<span
                                                        class="error">*</span></label>
                                                      <div class="col-md-4">
                                                    <input type="text" name="wef_date" tabindex="6"
                                                        class="form-control wef_date datepickerOne" id="wef_date" onchange="" autocomplete="off">
                                                      </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="origin_type">Origin Type</label>
                                                <div class="col-md-4">
                                                  <select name="vendor_name" tabindex="7"
                                                        class="form-control origin_type selectBox" id="origin_type" name="origin_type" onchange="GetSourceDest(this.value)">
                                                            <option value="">--select--</option>
                                                             @foreach($TariffType as $ttype)
                                                             <option value="{{$ttype->Id}}">{{$ttype->Origin}}-{{$ttype->Desitination}}</option>
                                                             @endforeach
                                                            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="origin_name"> Origin Name</label>
                                                      <div class="col-md-8">
                                                    <select name="vendor_name" tabindex="7"
                                                        class="form-control origin_name selectBox" id="origin_name" name="origin_name" onchange="GetSourceDest(this.value)">
                                                            <option value="">--select--</option>
                                                             <option value="1"></option>
                                                             
                                                            
                                                    </select>
                                                      </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="destination_type">Destination Type</label>
                                                <div class="col-md-4">
                                                  <select name="destination_type" tabindex="9"
                                                        class="form-control destination_type selectBox" id="origin_type" name="destination_type" onchange="GetSourceDest(this.value)">
                                                            <option value="">--select--</option>
                                                             @foreach($TariffType as $ttype)
                                                             <option value="{{$ttype->Id}}">{{$ttype->Origin}}-{{$ttype->Desitination}}</option>
                                                             @endforeach
                                                            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="destination_name"> Destination Name</label>
                                                     
                                                     <div class="col-md-8">
                                                    <select name="destination_name" tabindex="10"
                                                        class="form-control destination_name selectBox" id="destination_name" name="destination_name" onchange="GetSourceDest(this.value)">
                                                            <option value="">--select--</option>
                                                             <option value="1"></option>
                                                             
                                                            
                                                    </select>
                                                      </div>
                                                     
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="mode_name"> Mode Name</label>
                                                      <div class="col-md-8">
                                                     <select name="mode_name" tabindex="11"
                                                        class="form-control mode_name" id="mode_name">
                                                     <option value="">--select--</option>
                                                     <option value="1">AIR</option>
                                                     <option value="2">ROAD</option>
                                                     <option value="3">TRAIN</option>
                                                     <option value="4">COURIER</option>
                                                    </select>
                                                      </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="mode_name"> Product Name</label>
                                                      <div class="col-md-8">
                                                     <select name="product" class="form-control product" id="product" tabindex="12">
                                                            <option value="">--select--</option>
                                                            @foreach($Product as $pro)
                                                            <option value="{{$pro->id}}">{{$pro->ProductCode}}~{{$pro->ProductName}}</option>
                                                            @endforeach
                                                        </select>
                                                      </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                           
                            <th class="p-1 text-end" style="min-width: 420px;">Rate Type</th>
                            <th class="p-1 text-center" style="min-width: 150px;">Weight/Box Slabs</th>
                            <th class="p-1 text-center" style="min-width: 50px;">1<span class="error">*</span></th>
                            <th class="p-1 text-center" style="min-width: 50px;">2</th>
                            <th class="p-1 text-center" style="min-width: 50px;">3</th>
                            <th class="p-1 text-center" style="min-width: 50px;">4</th>
                            <th class="p-1 text-center" style="min-width: 50px;">5</th>
                            
                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            
                            <td class="p-1"> 
                              <div class="row">
                              <div class="col-4">
                              </div>
                              <div class="col-4">
                              </div>
                                <div class="col-4">
                                    <select name="RateType" tabindex="13" class="form-control RateType" id="RateType">
                                    <option value="">--select--</option> 
                                    <option value="1">PER KG</option>
                                      <option value="2">PER BOXS</option>
                                    </select> 
                                </div>
                              </div>
                            </td>
                           <td class="p-1">Weight(Kg) / Box  </td>
                           <td class="p-1">
                            <input type="text"  name="Amount" tabindex="14" class="form-control Amount" id="Amount" > 
                          </td>
                            <td class="p-1">
                              <input type="text"  name="Amount" tabindex="15" class="form-control Amount" id="Amount" > 
                            </td>
                            <td class="p-1">
                              <input type="text"  name="Amount" tabindex="16" class="form-control Amount" id="Amount" > 
                            </td>
                            <td class="p-1">
                              <input type="text"  name="Amount" tabindex="17" class="form-control Amount" id="Amount" > 
                            </td>
                            <td class="p-1">
                              <input type="text"  name="Amount" tabindex="18" class="form-control Amount" id="Amount" > 
                            </td>
                          </tr>
                          <tr>
                            <td class="p-1 text-start" colspan="7">
                               
                                <input type="button" tabindex="19" value="Process"
                                class="btn btn-primary btnSubmit" id="btnSubmit"
                                                    onclick="addTouchPoint()">
                                <input type="button" value="Reset" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="RefreshDocket()" tabindex="20">
                                <span class="pl-1"><b>Note: Use, for multiple selection. Like XXXX, YYYY</b></span>
                          
                            </td>
                          </tr>
                        
                        </tbody>
                  </table> 
                  
            </div> 
        </div> 
    </form>
    <div class="modal fade model-popup" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title text-center" id="exampleModalLabel">Add Slab</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                        <div class="modal-body">
                             <table class="table table-bordered table-centered mb-0">
                               <thead>
                                    <tr>
                                   <th>ENTER QTY(kg)</th>
                                   <th>Rate </th>
                                 </tr>
                               </thead>
                               <tbody id="coverTochPoints">
                                    <tr>
                         
                                    </tr>
                               </tbody>
                              </table>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" onclick="CaculateSlab()" tabindex="21">Save</button>
                              </div>

                        </div>
                    </div>
                </div>
    </div>
</div>

<script>
    $('select').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          language: 'es' ,
          autoclose:true,
         todayHighlight: true,
          startDate: new Date(),
       });
    function CaculateSlab()
    {
        var formData = new FormData();
     if($('#customer_name').val()=='')
     {
        alert('Enter Customer Name');
        return false; 
     }
     if($('#wef_date').val()=='')
     {
        alert('Enter Date');
        return false; 
     }
     if($('#tarrif_type').val()=='')
     {
        alert('Select Tarrif Type');
        return false; 
     }
     
     if($('#origin_name').val()=='')
     {
        alert('Select Origin Name');
        return false; 
     }
     if($('#destination_name').val()=='')
     {
        alert('Select Destination Name');
        return false; 
     }  
     if($('#mode_name').val()=='')
     {
        alert('Select Mode');
        return false; 
     }  
     if($('#product').val()=='')
     {
        alert('Select Product');
        return false; 
     } 
     if($('#delivery_type').val()=='')
     {
        alert('Select Delivery Type');
        return false; 
     } 
     if($('#RateType').val()=='')
     {
        alert('Select Rate');
        return false; 
     } 
     if($('#tat').val()=='')
     {
        alert('Enter TAT');
        return false; 
     } 
     if($('#Amount').val()=='')
     {
        alert('Enter Amount');
        return false; 
     } 
     if($('#weight_slab').val()=='')
     {
        alert('Select Slab');
        return false; 
     }
     var customer_name = $('#customer_name').val();
     var wef_date = $('#wef_date').val();
     var tarrif_type = $('#tarrif_type').val();
     var origin_name = $('#origin_name').val();
     var destination_name = $('#destination_name').val();
     var mode_name = $('#mode_name').val();
     var product = $('#product').val();
     var delivery_type = $('#delivery_type').val();
     var RateType = $('#RateType').val();
     var tat = $('#tat').val();
     var Amount = $('#Amount').val();
     var weight_slab = $('#weight_slab').val();
     var MasterId = $('#MasterId').val();
     var CustTarrifRate = [];
     var CustTarrifQty =[];
     var a=1;
      for(var i=0;  i < $(".CustTarrifQty").length; i++){
        var a=a+i;
        formData.append("Multi["+i+"][CustTarrifQty]",$("#Qty"+i).val());
        formData.append("Multi["+i+"][CustTarrifRate]",$("#Tarr"+i).val());
    }
   formData.append("customer_name",customer_name);
   formData.append("MasterId",MasterId);
   formData.append("wef_date",wef_date);
   formData.append("tarrif_type",tarrif_type);
   formData.append("originname",origin_name);
   formData.append("destination_name",destination_name);
   formData.append("mode_name",mode_name);
   formData.append("Product_Type",product);
   formData.append("Delivery_Type",delivery_type);
   formData.append("TAT",tat);
   formData.append("Min_Amount",Amount);
   formData.append("RateType",RateType);
   var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CusomerTafiffModel',
       data: formData,
        cache: false,
        contentType:false,
        processData:false,
       success: function(data) {
        const obj = JSON.parse(data);   
        $('.custDataAddd').html(obj.table);   
        $('.MasterId').val(obj.lastId)
        $('#exampleModal').modal('hide'); 
        $('.customer_name').attr('disabled', true);  
        $('.wef_date').attr('readonly', true);  
        $('.tarrif_type').attr('disabled', true);  
        $('.origin_name').attr('disabled', true);  
        $('.destination_name').attr('disabled', true);  
        $('.product').attr('disabled', true);  
        $('.mode_name').attr('disabled', true); 
        $('.delivery_type').val('').trigger('change');
        $('.RateType').val('').trigger('change');
        $('.tat').val('');
        $('.Amount').val('');
        $('.weight_slab').val('').trigger('change'); 
       
     
       }
     });  
    
    }
    function RefreshDocket()
    {
        location.reload();
    }
    function GetSourceDest(ttype)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/TarrifTypeAccoToS',
       cache: false,
       data: {
           'ttype':ttype
       },
       success: function(data) {
        $('.origin_name').html(data);
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/TarrifTypeAccoToD',
       cache: false,
       data: {
           'ttype':ttype
       },
       success: function(data) {
        $('.destination_name').html(data);
        
       
     
       }
     }); 
       
     
       }
     }); 
    }
    
    function addTouchPoint() {
     if($('#customer_name').val()=='')
     {
        alert('Select customer');
        return false; 
     }
     if($('#wef_date').val()=='')
     {
        alert('Enter Date');
        return false; 
     }
     if($('#tarrif_type').val()=='')
     {
        alert('Select Tarrif Type');
        return false; 
     }
     
     if($('#origin_name').val()=='')
     {
        alert('Select Origin Name');
        return false; 
     }
     if($('#destination_name').val()=='')
     {
        alert('Select Destination Name');
        return false; 
     }  
     if($('#mode_name').val()=='')
     {
        alert('Select Mode');
        return false; 
     }  
     if($('#product').val()=='')
     {
        alert('Select Product');
        return false; 
     } 
     if($('#delivery_type').val()=='')
     {
        alert('Select Delivery Type');
        return false; 
     } 
     if($('#RateType').val()=='')
     {
        alert('Select Rate');
        return false; 
     } 
     if($('#tat').val()=='')
     {
        alert('Enter TAT');
        return false; 
     } 
     if($('#Amount').val()=='')
     {
        alert('Enter Amount');
        return false; 
     } 
     if($('#weight_slab').val()=='')
     {
        alert('Select Slab');
        return false; 
     }
     var runType=$('#RateType').val();
     var weight_slab=$('#weight_slab').val();
     $('#coverTochPoints').html('');
     for(var i=0; i < weight_slab; i++)
    {
       $('#coverTochPoints').append('<tr><td><input  type="text" class="form-control  CustTarrifQty" name="CustTarrifQty['+i+'][rate]" id="Qty'+i+'"></td><td><input tyep="text" class="form-control  CustTarrifRate" name="CustTarrifRate['+i+'][Amount]" id="Tarr'+i+'"></td></tr>') 
    }
    $('#exampleModal').modal('toggle');
    $('.selectBox').select2();
}



    
   
    </script>
             
    