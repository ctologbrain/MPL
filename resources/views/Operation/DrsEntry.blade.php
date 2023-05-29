@include('layouts.appTwo')

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
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                      
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Delivery Office<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                               
                                                 <select tabindex="1" class="form-control selectBox deliveryOffice" name="deliveryOffice" id="deliveryOffice">
                                                    <option value="">--select--</option>
                                                    @foreach($offcie as $officelist)
                                                    <option value="{{$officelist->id}}">{{$officelist->OfficeCode}} ~ {{$officelist->OfficeName}}</option>
                                                    @endforeach
                                                 </select>
                                                 <input type="hidden" id="DrsId" class="DrsId">
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Delivery Date<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="2" class="form-control datepickerOne deliveryDate" name="deliveryDate" id="deliveryDate" >
                                            
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Delivery Boy<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="3" class="form-control selectBox DeliveryBoy" name="DeliveryBoy" id="DeliveryBoy">
                                                    <option value="">--select--</option>
                                                    @foreach($employee as $emp)
                                                    <option value="{{$emp->id}}">{{$emp->EmployeeCode}} ~ {{$emp->EmployeeName}}</option>
                                                    @endforeach
                                                 </select>
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle Type</label>
                                                <div class="col-md-8">
                                                
                                                <select tabindex="4" class="form-control selectBox VehicleType" name="VehicleType" id="VehicleType" onchange="fieldsEnable(this.value);">
                                                    <option value="">--select--</option>
                                                    <option value="1">SELF</option>
                                                    <option selected="selected" value="2">VENDOR</option>
                                                    <option value="3">MARKET VEHICLE</option>
                                                    <option value="4">VEHICLE RFQ</option>
                                                 </select>
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                           
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">RFQ Number</label>
                                                <div class="col-md-8">
                                                <input readonly type="text" tabindex="5" class="form-control  RFQNumber" name="RFQNumber" id="RFQNumber" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Market Hire Amount</label>
                                                <div class="col-md-8">
                                                <input readonly type="text" tabindex="6" class="form-control  MarketHireAmount" name="MarketHireAmount" id="MarketHireAmount" >
                                               
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Vehicle No<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select tabindex="7" class="form-control selectBox VehicleNo" name="VehicleNo" id="VehicleNo">
                                                    <option value="">--select--</option>
                                                    @foreach($VehicleMaster as $VMaster)
                                                    <option value="{{$VMaster->id}}">{{$VMaster->VehicleNo}}</option>
                                                    @endforeach
                                                 
                                                 </select>
                                            
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Opening Km.</label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="8" class="form-control  OpeningKm" name="OpeningKm" id="OpeningKm">
                                                 <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Driver Name</label>
                                                <div class="col-md-8">
                                             
                                                <input type="text" tabindex="9" class="form-control  DriverName" name="DriverName" id="DriverName">       
                                                
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                           
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Mobile Number</label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="10" class="form-control  MobileNumber" name="MobileNumber" id="MobileNumber">
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Loading Supervisor Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="11" class="form-control  supervisorName" name="supervisorName" id="supervisorName" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="table-responsive">
                                                      <table class=" table-bordered">
                                                            <thead>
                                                            <tr class="main-title text-dark">
                                                                <th class="p-1" style="min-width: 20px;">Docket No<span class="error">*</span></th>
                                                                <th class="p-1" style="min-width: 20px;">Pieces</th>
                                                                <th class="p-1" style="min-width: 20px;">Weight</th>
                                                                <th class="p-1" style="min-width: 90px;">Balance Pieces</th>
                                                                <th class="p-1" style="min-width: 100px;">Balance Weight</th>
                                                                <th class="p-1" style="min-width: 50px;"></th>
                                                                <th class="p-1" style="min-width: 340px;"></th>
                                                            </tr>
                                                             </thead> 
                                                             <tbody>
                                                            <tr>
                                                                <td class="p-1">
                                                                    <input type="text" name="Docket" tabindex="12" class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value);">   
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" step="0.1" name="pieces" tabindex="13" class="form-control displayPices" id="displayPices">
                                                                    <input type="hidden" step="0.1" name="actQtyAdd" tabindex="13" class="form-control actQtyAdd" id="actQtyAdd">
                                                                    <input type="hidden" step="0.1" name="partWeight" tabindex="13" class="form-control partWeight" id="partWeight">
                                                                </td>
                                                                <td class="p-1">
                                                                    <input type="text" step="0.1" name="weight" tabindex="14" class="form-control displayWeight" id="displayWeight">
                                                                    <input type="hidden" step="0.1" name="weight" tabindex="15" class="form-control weight" id="weight" readonly="">
                                                                </td>
                                                                <td class="p-1"><span id="partpices"></span><input type="hidden" class="partpicesValue"></td>
                                                                <td class="p-1"><span id="partWidth"></span><input type="hidden" class="partWeightValue"></td>
                                                                <td class="p-1">
                                                                    <input type="button" value="save" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveDsrEntry()" tabindex="16">
                                                                </td>
                                                                <td class="p-1 td8">
                                                                                 <div class="row">
                                                                                    <label class="col-md-4 col-form-label" for="fpm_number">DRS  No.:<span class="error">*</span></label>
                                                                                    <div class="col-md-5">
                                                                                       <input type="text" name="drs_number"  class="form-control drs_number" id="drs_number" tabindex="17">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <input id="print" type="button" class="btn btn-primary" value="print" onclick="printgatePass()" tabindex="18">
                                                                                    </div>
                                                                                 </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="main-title" id="hidden">
                                                                <td colspan="8" class="p-1 text-center text-dark">Record Not Available...</td>
                                                            </tr>
                                                            </tbody>
                                                      </table> 
                                                      <div class="tabelData newtable"></div>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                        </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'dd-mm-yyyy',
          autoclose:true,
          todayHighlight: true
      });
    $(".datepickerOne").val('{{date("d-m-Y")}}');
  

    function SaveDsrEntry(){
        var base_url = '{{url('')}}';
        if($("#deliveryOffice").val()=='')
           {
              alert('please select delivery Office');
              return false;
           }
           if($("#deliveryDate").val()=='')
           {
              alert('please Enter  delivery date');
              return false
           }
           
            if($("#DeliveryBoy").val()=='')
           {
              alert('please select Delivery Boy');
              return false;
           }
        //    if($("#VehicleType").val()=='')
        //    {
        //       alert('please select Vehicle No');
        //       return false;
        //    }
           if($("#VehicleNo").val()=='')
           {
              alert('please Enter Supervisor Name');
              return false;
           }
        //    if($("#OpeningKm").val()=='')
        //    {
        //       alert('please Enter Opening Km');
        //       return false;
        //    }
          
        //    if($("#DriverName").val()=='')
        //    {
        //       alert('please Enter Driver Name');
        //       return false;
        //    }
           if($("#supervisorName").val()=='')
           {
              alert('please Enter supervisor Name');
              return false;
           }
           if($("#Docket").val()=='')
           {
              alert('please Enter Docket');
              return false;
           }
           var  deliveryOffice = $("#deliveryOffice").val();
           var deliveryDate  = $("#deliveryDate").val();
           var DeliveryBoy  = $("#DeliveryBoy").val();
           var VehicleType  = $("#VehicleType").val();
           var VehicleNo  = $("#VehicleNo").val();
           var OpeningKm  = $("#OpeningKm").val();
           var RFQNumber  = $("#RFQNumber").val();
           var MarketHireAmount  = $("#MarketHireAmount").val();
           var DriverName  = $("#DriverName").val();
           var MobileNumber  = $("#MobileNumber").val();
           var supervisorName  = $("#supervisorName").val();
           var Docket  = $("#Docket").val();
           var pieces  = $("#displayPices").val();
           var weight  = $("#displayWeight").val();
           var DrsId  = $("#DrsId").val();
           var ppPart  = $(".partpicesValue").val();
           var ppWeight  = $(".partWeightValue").val();
           var KKWeight  = $("#actQtyAdd").val();
           var SSWeight  = $("#partWeight").val();
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
            url: base_url + '/SubmiDrsEntry',
           cache: false,
           data:{
                    'deliveryOffice':deliveryOffice,
                    'deliveryDate' :deliveryDate,
                    'DeliveryBoy' :DeliveryBoy,
                    'VehicleType' :VehicleType,
                    'VehicleNo' :VehicleNo,
                    'OpeningKm' :OpeningKm,
                    'RFQNumber' :RFQNumber,
                    'MarketHireAmount' :MarketHireAmount,
                    'DriverName' :DriverName,
                    'MobileNumber' :MobileNumber,
                    'supervisorName' :supervisorName,
                    'Docket':Docket,
                    'pieces':pieces,
                    'weight':weight,
                    'DrsId':DrsId,
                    'ppPart':ppPart,
                    'ppWeight':ppWeight,
                    'KKWeight':KKWeight,
                    'SSWeight':SSWeight
                },
            success: function(data) {
                const obj = JSON.parse(data);
                $('.DrsId').val(obj.id);
                $('.drs_number').val(obj.Drs);
                $('#hidden').addClass('checkclass');
                $('.tabelData').html(obj.html);
                $('.Docket').val('');
                $('.displayPices').val('');
                $('.displayWeight').val('');
                $('#partpices').text('');
                $('#partWidth').text('');
                $('.partpicesValue').val('');
                $('.partWeightValue').val('');
                $(".actQtyAdd").val('');
                $(".partWeight").val('');
                $('.Docket').focus();
            
            }
            });
    }
    function getDocketDetails(Docket)
    {
   var DrsId=$('.DrsId').val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetDocketWithDrsEntry',
       cache: false,
       data: {
           'Docket':Docket,'DrsId':DrsId
       }, 
       success: function(data) {
        
        const obj = JSON.parse(data);
       
        if(obj.status=='true')
        {
           $('.displayPices').val(obj.docket.docket_product_details.Qty);
           $('.displayWeight').val(obj.docket.docket_product_details.Actual_Weight);
           if(obj.DockPartPiece.PartQty!=null){
               var Quentity = obj.DockPartPiece.PartQty;
              
              
            }
           else{
              Quentity=0;
            
           }
           var newQuentity = parseInt(obj.partTrucLoad);
           if(obj.DockPartPiece.PartWeight!=null){
               var WEIGHT = obj.DockPartPiece.PartWeight;
           }
           else{
            WEIGHT=0;
           }
            var balQty = parseInt(obj.docket.docket_product_details.Qty)-parseInt(Quentity);
            var balWeight = parseInt(obj.docket.docket_product_details.Actual_Weight)-parseInt(WEIGHT);
           $('#partpices').text(balQty);
           $('#partWidth').text(balWeight);
           $('.partpicesValue').val(balQty);
           $('.partWeightValue').val(balWeight);
           $('.actQtyAdd').val(newQuentity);
           $('.partWeight').val(obj.partTrucLoadpartWeight);
           

           

           


        }
        else{
            alert(obj.message);
            $('.Docket').val('');
            $('.displayPices').val('');
            $('.displayWeight').val('');
            $('.Docket').focus();
            $('#partpices').text('');
           $('#partWidth').text('');
           $('.partpicesValue').val('');
           $('.partWeightValue').val('');
         }
       
        
       }
     });
    }
    function deleteDocket(id,dsrid)
    {
       var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/deleteDocket',
       cache: false,
       data: {
           'id':id,'dsrid':dsrid
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
       $('.newtable').html(obj.html);
     }
     }); 
    }

    function  printgatePass(){
        var DRSNO = $("#drs_number").val();
        if(DRSNO==''){
            alert("Please Enter DRS Entry No")
        }
        else{
            location.href="{{url('')}}"+"/PrintDRSEntry/"+DRSNO;
        }

    }
    function fieldsEnable(values){
    if(values==4){
        $(".RFQNumber").prop("readonly",false);
    }
    else{
        $(".RFQNumber").prop("readonly",true);
    }
    if(values==3){
        $(".MarketHireAmount").prop("readonly",false);
    
    }
    else{
        $(".MarketHireAmount").prop("readonly",true);
    }
    }
</script>
   

    
