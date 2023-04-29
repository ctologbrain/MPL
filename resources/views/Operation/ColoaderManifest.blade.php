@include('layouts.appTwo')
<style>
  .thHide 
  {
     display:none !important; 
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
                <h4 class="page-title">COLOADER MANIFEST</h4>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card gatepass_container">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                     
                                    
                                   
                                    <div class="col-6">
                                        <div class="row">
                                             <label class="col-md-3 col-form-label" for="manifest_date">Manifest Dates<span
                                                    class="error">*</span></label>
                                            <div class="col-md-3">
                                                <input type="text" name="manifest_date" tabindex="1" class="form-control manifest_date datepickerOne" id="manifest_date">
                                                <input type="hidden" name="ManiFestid" tabindex="1" class="form-control ManiFestid" id="ManiFestid">
                                            </div>
                                           <label class="col-md-2 col-form-label" for="manifest_date">Time<span
                                                    class="error">*</span></label>
                                             <div class="col-md-2">
                                                <input type="time" name="manifestTime" tabindex="2" class="form-control manifestTime" id="manifestTime">
                                           </div>
                                            <label class="col-md-2 col-form-label fs-15">(24:00hrs Format)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                       
                                    </div>
                                   
                                    
                                   
                                   
                                    
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="origin_office">Origin Office<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                                   <select name="origin_office" tabindex="3"
                                                    class="form-control origin_office selectBox" id="origin_office">
                                                    <option value="">--select</option>
                                                    @foreach($OfficeMaster as $off)
                                                  <option value="{{$off->id}}">{{$off->OfficeCode}}~{{$off->OfficeName}}</option>
                                                  @endforeach
                                                  </select>
                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="destination_office">Destination Office<span
                                                    class="error">*</span></label>
                                                  <div class="col-md-8">
                                             
                                                    <select name="destination_office" tabindex="4"
                                                    class="form-control destination_office selectBox" id="destination_office">
                                                    <option value="">--select</option>
                                                    @foreach($OfficeMaster as $off)
                                                  <option value="{{$off->id}}">{{$off->OfficeCode}}~{{$off->OfficeName}}</option>
                                                  @endforeach
                                                  </select>
                                                  </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-3 col-form-label" for="vendor_name">Vendor Name<span class="error">*</span></label>
                                            <div class="col-8">
                                            <select name="vendor_name" tabindex="5"
                                                    class="form-control vendor_name selectBox" id="vendor_name">
                                                        <option value="">--select--</option>
                                                        @foreach($Vendor as $vendmaster)
                                                        <option value="{{$vendmaster->id}}">{{$vendmaster->VendorCode}}~{{$vendmaster->VendorName}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vendor_docket_no">Vendor Docket Number<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                               
                                              <input type="text" name="vendor_docket_no" tabindex="6"
                                                    class="form-control vendor_docket_no" id="vendor_docket_no" onchange="">
                                            </div>
                                        </div>
                                    </div>
                                     
                                  
                                    
                                   
                                    <div class="col-6">
                                        <div class="row">

                                            <label class="col-md-3 col-form-label" for="vendor_wt">Vendor Weight<span class="error">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text"  name="vendor_wt" tabindex="7"
                                                    class="form-control vendor_wt" id="vendor_wt"> 

                                            </div>
                                            
                                           
                                            
                                        </div>
                                    </div>

                                   

                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="remark">Remark</label>
                                            <div class="col-md-8">
                                                <Textarea class="form-control remark"
                                                    placeholder="Remark"  tabindex="8"  name="remark" id="remark"></Textarea>
                                            </div>
                                        </div>
                                   </div>
                                  
                                    
                                   
                                   
                                   <div class="col-12 total-text">
                                        <div class="row">
                                           <div class="col-6">
                                                <h4>Total Distance:  Total Travel Time:</h4>
                                            </div>
                                            <div class="col-6 text-end">

                                               
                                              
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
                            <th class="p-1 td1">Docket/Gatepass<span class="error">*</span></th>
                            <th class="p-1 td2">Number<span class="error">*</span></th>
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
                            <td class="p-1"> 
                                <select name="destination_office" tabindex="10" class="form-control destination_office" id="destination_office">
                               <option value="1">Docket</option>
                              
                               <option value="2">Gatepass</option>
                               
                           
                        </select> </td>
                            <td class="p-1"><input type="text" name="Docket" tabindex="11"
                                                    class="form-control Docket" id="Docket" onchange="getDocketDetails(this.value)">  
                                                    <input type="hidden" name="DocketId" class="form-control DocketId" id="DocketId">  
                                                </td>
                            <td class="p-1"><input type="text" step="0.1" name="pieces" tabindex="12"
                                                    class="form-control displayPices" id="displayPices" readonly> 
                                               
                                </td>

                            <td class="p-1"><input type="text" step="0.1" name="weight" tabindex="13"
                                                    class="form-control displayWeight" id="displayWeight" readonly>
                                                   
                                                
                                                </td>
                            <td class="p-1"><span id="partpices"></span></td>
                            <td class="p-1"><span id="partWidth"></span></td>
                            <td class="p-1">
                              
                                <input type="button" value="save" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveColoaderManifest()" tabindex="29">
                            </td>
                            <td class="p-1 td8">
                                
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">Manifest No.:<span
                                                        class="error">*</span></label>
                                                <div class="col-md-3">
                                                   
                                                   <input type="text" name="Mani_pass_number" tabindex="14"
                                                        class="form-control Mani_pass_number" id="Mani_pass_number" >
                                                       
                                                </div>
                                                <div class="col-md-5">
                                                    <input id="print" type="button" class="btn btn-primary" value="Print Manifest" onclick="printgatePass()" tabindex="15">
                                                </div>
                                             </div>
                                   
                            </td>
                        </tr>
                        <tr class="main-title" id="hidden">
                            <td colspan="8" class="p-1 text-center text-dark">Record Not Available...</td>
                        </tr>
                        </tbody>
                         
                  </table> 
                  <div class="tabelData"></div>
              </div> 
           </div>     
        </div>
    </div>
</form>
</div>

<script>
   
    $('.selectBox').select2();
    $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
   
 
function SaveColoaderManifest()
{
   
    if($('#manifest_date').val()=='')
    {
        alert('Please Enter manifest date');
        return false;
    }
    if($('#manifestTime').val()=='')
    {
        alert('Please Enter manifest time');
        return false;
    }
    if($('#origin_office').val()=='')
    {
        alert('Please Select origin office');
        return false;
    }
    if($('#destination_office').val()=='')
    {
        alert('Please Select destination office');
        return false;
    }
    if($('#vendor_name').val()=='')
    {
        alert('Please Select vendor name');
        return false;
    }
    if($('#vendor_docket_no').val()=='')
    {
        alert('Please Enter vendor docket no');
        return false;
    }
    if($('#vendor_wt').val()=='')
    {
        alert('Please Enter vendor weight');
        return false;
    }
    if($('#remark').val()=='')
    {
        alert('Please Enter Remark');
        return false;
    }
    if($('#Docket').val()=='')
    {
        alert('Please Enter Docket');
        return false;
    }
    if($('#displayPices').val()=='')
    {
        alert('Please Enter Pices');
        return false;
    }
    if($('#displayWeight').val()=='')
    {
        alert('Please Enter Weight');
        return false;
    }
    
    var manifest_date = $('#manifest_date').val();
    var manifestTime=$('#manifestTime').val();
    var origin_office=$('#origin_office').val();
    var destination_office=$('#destination_office').val();
    var vendor_name=$('#vendor_name').val();
    var vendor_docket_no=$('#vendor_docket_no').val();
    var vendor_wt=$('#vendor_wt').val();
    var remark=$('#remark').val();
    var Docket=$('#Docket').val();
    var displayPices=$('#displayPices').val();
    var displayWeight=$('#displayWeight').val();
    var ManiFestid=$('#ManiFestid').val();
    var ManiFestName=$('.Mani_pass_number').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitColoderManiFest',
       cache: false,
       data: {
           'manifest_date':manifest_date,'ManiFestName':ManiFestName,'manifestTime':manifestTime,'origin_office':origin_office,'destination_office':destination_office,'vendor_name':vendor_name,'vendor_docket_no':vendor_docket_no,'vendor_wt':vendor_wt,'remark':remark,'ManiFestid':ManiFestid
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.ManiFestid').val(obj.maniFestId)
        $('.Mani_pass_number').val(obj.maniFest)
        var DocketId= $('#DocketId').val();
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitColoderDocket',
       cache: false,
       data: {
           'ManiFestid':obj.maniFestId,'ManiFestName':obj.maniFest,'DocketId':DocketId,'Docket':Docket,'displayPices':displayPices,'displayWeight':displayWeight
       },
       success: function(datas) {
         if(data !='')
        {
        const objs = JSON.parse(datas);
        $('.ManiFestid').val(objs.Manifest_Id)
        $('.Mani_pass_number').val(objs.ManiFestName)
        $('#hidden').addClass('thHide')
        $('.tabelData').html(objs.datas);
        $('.Docket').val('');
        $('.displayPices').val('');
        $('.displayWeight').val('');
        $('.Docket').focus();
        }

       }
     });
     1007
       }
     });

}
function getDocketDetails(docketId)
{
   
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckColoderDocket',
       cache: false,
       data: {
           'docketId':docketId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message);
        }
        else
        {
         $('.DocketId').val(obj.DocketId);
         $('.displayPices').val(obj.Qty);
         $('.displayWeight').val(obj.Weight);
        }
       
       }
     });
}
function printgatePass()
{
    if($('#gate_pass_number').val()=='')
    {
        alert('Please Enter GatePass Number');
        return false;
    }
    var base_url = '{{url('')}}';
    var gatePass=$('#gate_pass_number').val();
    location.href = base_url+"/print_gate_Number/"+gatePass;
  
}
    </script>
             
    