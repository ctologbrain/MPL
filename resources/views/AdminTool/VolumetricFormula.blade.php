@include('layouts.appThree')
<style>
    #empTable_length
    {
        display:none !important;
    }
</style>
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard rto_container">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                    
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                 <label class="col-md-3 col-form-label" for="collection_date">Formula For<span
                                                                    class="error">*</span></label>
                                                                <div class="col-md-4">
                                                                <select tabindex="3" class="form-control selectBox formulafor text-start" name="formulafor" id="formulafor" onchange="chageCustomer(this.value);">
                                                                    <option value="1" selected>Office</option>
                                                                    <option value="2">Customer</option>
                                                                       </select>
                                                                       <input type="hidden" id="Vid" class="Vid">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1" id="checkoffice">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="collection_type">Office Name</label>
                                                                    <div class="col-md-4">
                                                                      <select tabindex="3" class="form-control selectBox office text-start" name="office" id="office">
                                                                                    <option value="">--select--</option>
                                                                                     @foreach($office as $officemaster)
                                                                                     <option value="{{$officemaster->id}}">{{$officemaster->OfficeName}}</option>
                                                                                     @endforeach
                                                                                 </select>
                                                                             <span class="error"></span>
                                                                          
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1 d-none" id="checkCutomer">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="collection_type">Customer</label>
                                                                    <div class="col-md-4">
                                                                      <select tabindex="3" class="form-control selectBox customer text-start" name="customer" id="customer">
                                                                                    <option value="">--select--</option>
                                                                                     @foreach($cust as $customer)
                                                                                     <option value="{{$customer->id}}">{{$customer->CustomerCode}} ~ {{$customer->CustomerName}}</option>
                                                                                     @endforeach
                                                                                 </select>
                                                                             <span class="error"></span>
                                                                          
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="collection_type">Mode</label>
                                                                    <div class="col-md-4">
                                                                      <select tabindex="3" class="form-control selectBox mode text-start" name="mode" id="mode">
                                                                                    <option value="">--select--</option>
                                                                                    <option value="1">AIR</option>
                                                                                    <option value="2">COURIER</option>
                                                                                    <option value="3">ROAD</option>
                                                                                    <option value="4">TRAIN</option>
                                                                                    
                                                                                 </select>
                                                                             <span class="error"></span>
                                                                      </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="collection_type">Volumetric/CFT</label>
                                                                    <div class="col-md-4">
                                                                        <select tabindex="3" class="form-control selectBox valumetric text-start" name="valumetric" id="valumetric">
                                                                        <option value="">--select--</option>
                                                                        <option value="VOLUMETRIC">VOLUMETRIC</option>
    		                                                             <option value="CFT">CFT</option>
                                                                        </select>
                                                                             <span class="error"></span>
                                                                     </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="collection_amount">Measurement<span
                                                                    class="error">*</span></label>
                                                                <div class="col-md-4">
                                                                <select tabindex="3" class="form-control selectBox measurment text-start" name="measurment" id="measurment">
                                                                        <option value="">--select--</option>
                                                                        <option selected="selected" value="INCH">INCH</option>
    	                                                                 <option value="CENTIMETER">CENTIMETER</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 m-b-1">
                                                            <div id="bank_Booktwo"  class="row">
                                                                <label class="col-md-3 col-form-label" for="bank_name">CFT Formula<span class="error">*</span> </label>
                                                                <div class="col-md-8 d-flex align-items-center">
                                                                    <span style="width: 1242px;font-size: 13px;font-weight: 600;">( ( Length x Breadth x Height ) /</span>
                                                                <input type="text" class="form-control devideBy" id="devideBy">
                                                                
                                                                
                                                                <span style="font-weight: 600;font-size: 13px;padding-left: 5px;padding-right: 5px;">*</span>
                                                                <input type="text" class="form-control multipleBy" id="multipleBy">
                                                                <span style="font-weight: 600;font-size: 13px;padding-left: 5px;padding-right: 5px;">)</span>
                                                                
                                                                </div>
                                                            
                                                             </div>
                                                            </div>
                                                      
                                                    </div>

                                                </div>
                                            </div>

                                           
                                            <div class="col-4"></div>
                                            <div class="col-12 mt-1 text-center">
                                                <input type="button" name="save" id="save" class="btn btn-primary" Value="Save" onclick="submitVolumeartic()">
                                                <button type="button" class="btn btn-primary" onclick="">Cancel</button>
                                            </div>
                                            <div class="col-12 mt-1">
                                                        <div class="row">
                                                            <div class="col-7 m-b-1">
                                                                    <div class="row">
                                                                        <label class="col-md-4 col-form-label" for="name">Search By Office Code OR Name</label>
                                                                        <div class="col-md-6 d-flex align-items-center">
                                                                            <input type="text" name="Search" id="searchkey" class="form-control" style="margin-right: 5px;">
                                                                             
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-5 m-b-1 text-end">
                                                                <button type="button" class="btn btn-primary" onclick="">Export</button>
                                                            </div>
                                                        </div>
                                            </div>
                                            <hr>
                                               
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                    </form>
                <div class="table-responsive a">
                    <table id='empTable' border="1" style='border-collapse: collapse;' class="table table-bordered table-striped table-actions">

                        <thead class="tabelDesign">
                           <tr class="main-title">
                            <th class="p-1" style="min-width: 140px;">ACTION</th>
                            <th class="p-1" style="min-width: 63px;">SL#	</th>
                            <th class="p-1" style="min-width: 150px;">Formula For</th>
                            <th class="p-1" style="min-width: 150px;">Office Code</th>
                            <th class="p-1" style="min-width: 150px;">Office Name</th>
                            <th class="p-1" style="min-width: 150px;">Mode Type</th>
                            <th class="p-1" style="min-width: 150px;">Volumetric/CFT</th>
                            <th class="p-1" style="min-width: 150px;">Measurement	</th>
                            <th class="p-1" style="min-width: 150px;">Divide By</th>
                            <th class="p-1" style="min-width: 150px;">Multiply By</th>
                            </tr>
                        </thead>
                   </table>
                </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
function chageCustomer(type)
{
    if(type==1)
    {
      $('#checkCutomer').addClass('d-none');  
      $('#checkoffice').removeClass('d-none'); 
      $('.customer').val('').trigger('change');
      $('.tabelDesign').html('<tr><th width=18%>ACTION<th>SL#<th>Formula For<th>Office Code<th>Office Name<th>Mode Type<th>Volumetric/CFT<th>Measurement<th>Divide By<th>Multiply By</th></tr>')
      
    }
    if(type==2)
    {
      $('#checkCutomer').removeClass('d-none');  
      $('#checkoffice').addClass('d-none'); 
      $('.office').val('').trigger('change');
      $('.tabelDesign').html('<tr><th width=18%>ACTION<th>SL#<th>Formula For<th>Customer Code<th>Customer Name<th>Mode Type<th>Volumetric/CFT<th>Measurement<th>Divide By<th>Multiply By</th></tr>')
    }
    
}
function submitVolumeartic(){
    if($('#formulafor').val()=='')
    {
     alert('please Select Formula For');
     return false;   
    }
    if($('#formulafor').val() !='' && $('#formulafor').val()==1 && $('#office').val()=='')
    {
     alert('please Select Office');
     return false;   
    }
    if($('#formulafor').val() !='' && $('#formulafor').val()==2 && $('#customer').val()=='')
    {
     alert('please Select Customer');
     return false;   
    }
    if($('#mode').val()=='')
    {
     alert('please Select Mode');
     return false;   
    }
    if($('#valumetric').val()=='')
    {
     alert('please Select valumetric');
     return false;   
    }
    if($('#measurment').val()=='')
    {
     alert('please Select Measurment');
     return false;   
    }
    if($('#devideBy').val()=='')
    {
     alert('please Enter Devide By');
     return false;   
    }
    if($('#multipleBy').val()=='')
    {
     alert('please Enter multiple By');
     return false;   
    }
    var formulafor = $('#formulafor').val();
    var office = $('#office').val();
    var customer = $('#customer').val();
    var mode = $('#mode').val();
    var valumetric = $('#valumetric').val();
    var measurment = $('#measurment').val();
    var devideBy = $('#devideBy').val();
    var multipleBy = $('#multipleBy').val();
    var Vid = $('#Vid').val();
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/PostValuematric',
       cache: false,
       data: {
           'formulafor':formulafor,'office':office,'customer':customer,'mode':mode,'valumetric':valumetric,'measurment':measurment,'devideBy':devideBy,'multipleBy':multipleBy,'Vid':Vid
       }, 
       success: function(data) {
           alert('Add Sucessfully');
           location.reload();
        
    }
});

}    
$(function () {
      var bsae_usr='{{url('')}}';
      var image='https://erp.vscpl.in/images/Loading_2.gif';
      var table = $('#empTable').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        language: {
         processing: "<img src='"+image+"'>",
     // "info": "Showing _START_ to _END_ of _TOTAL_ Drivers",
      "info": "Total Record :  _TOTAL_ ",
      },   processing: true,
        serverSide: true,
       "searching": false,
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
         ajax: {
          url: bsae_usr+"/getValuemetriByAjax",
          data: function (d) {
			   var option_all = $(".location option:selected").map(function () {
			      return $(this).val();
			    }).get().join(',');
                d.searchkey = $('#searchkey').val(),
                d.formulafor = $('#formulafor').val()
             }

        },
         columns: [
            { data: 'action', name: 'action' },
            { data: 'sr', name: 'sr' },
            { data: 'formulaFor', name: 'formulaFor' },
            { data: 'CustomerCode', name: 'CustomerCode' },
             { data: 'CustomerName', name: 'CustomerName' },
            { data: 'ModeType', name: 'ModeType' },
            { data: 'Volumatric', name: 'Volumatric' },
            { data: 'Measurment', name: 'Measurment' },
            { data: 'DevideBy', name: 'DevideBy' },
            { data: 'MultiplyBy', name: 'MultiplyBy' },
        ]
    });
   
    $('.formulafor').change(function(){
      table.draw();
     });
     $('#searchkey').keyup(function(){
         table.draw();
     });
    });   

function viewVolume(id,type)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewVolumetric',
       cache: false,
       data: {
           'id':id,'type':type
       }, 
       success: function(data) {
        var obj=JSON.parse(data);
        $('.Vid').val('');
        $('.formulafor').val(obj.FromulaFor).trigger('change');
        $('.formulafor').attr('disabled', true);
        if(obj.FromulaFor==1)
        {
        $('.office').val(obj.OfficeId).trigger('change')  
        $('.office').attr('disabled', true);
        }
        if(obj.FromulaFor==2)
        {
        $('.customer').val(obj.CustId).trigger('change')  
        $('.customer').attr('disabled', true);
        }
       
        $('.mode').val(obj.Mode).trigger('change')  
        $('.mode').attr('disabled', true);
        $('.valumetric').val(obj.Volumetric).trigger('change')  
        $('.valumetric').attr('disabled', true);
        $('.measurment').val(obj.Measurement).trigger('change')  
        $('.measurment').attr('disabled', true);
        $('.devideBy').val(obj.DevideBy);  
        $('.devideBy').attr('readonly', true);
        $('.multipleBy').val(obj.MultipleBy);
        $('.multipleBy').attr('readonly', true);
    }
});
}
function EditVolume(id,type)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewVolumetric',
       cache: false,
       data: {
           'id':id,'type':type
       }, 
       success: function(data) {
        var obj=JSON.parse(data);
        $('.Vid').val(obj.id);
        $('.formulafor').val(obj.FromulaFor).trigger('change');
        $('.formulafor').attr('disabled', false);
        $('.office').val(obj.OfficeId).trigger('change')  
        $('.office').attr('disabled', false);
        $('.mode').val(obj.Mode).trigger('change')  
        $('.mode').attr('disabled', false);
        $('.valumetric').val(obj.Volumetric).trigger('change')  
        $('.valumetric').attr('disabled', false);
        $('.measurment').val(obj.Measurement).trigger('change')  
        $('.measurment').attr('disabled', false);
        $('.devideBy').val(obj.DevideBy);  
        $('.devideBy').attr('readonly', false);
        $('.multipleBy').val(obj.MultipleBy);
        $('.multipleBy').attr('readonly', false);
    }
});
}
function deleteVolume(id,type)
{
    var base_url = '{{url('')}}';
    $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DeleteVolumetric',
       cache: false,
       data: {
           'id':id,'type':type
       }, 
       success: function(data) {
       alert('Delete Sucessfully');
       location.reload();

    }
});
}
</script>