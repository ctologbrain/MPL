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
                                    <div class="row mt-1">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Type<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select name="type" id="type" tabindex="1" class="form-control selectBox type">
                                                    <option value="">--select--</option>
                                                    <option value="1">DRS</option>
                                                    <option value="2">LOCAL GATEPASS</option>
                                                     </select>
                                                     <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4   col-form-label" for="  userName">Office Name<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="office_name" id="office_name" class="form-control selectBox office_name" tabindex="2">
                                                        <option value="">Select Office</option>
                                                        @foreach($office as $key)
                                                        <option value="{{$key->id}}">{{$key->OfficeCode}} ~{{$key->OfficeName}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4   col-form-label" for="  userName">Docket Number
                                                    <span
                                                    class="error">*</span></label>
                                                <div class="col-md-8">
                                                   <input type="text" tabindex="3" class="form-control docket_no" name="docket_no" id="docket_no" onchange="getDocketDetails(this.value)">
                                                   <span class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">Initial Boxes<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="4" class="form-control actual_box" name="actual_box" id="actual_box" >
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">To Be Loaded Boxes<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="5" class="form-control to_be_loaded_box" name="to_be_loaded_box" id="to_be_loaded_box" >
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">Initial Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="6" class="form-control actual_weight" name="actual_weight" id="actual_weight" >
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">To Be Loaded Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="7" class="form-control to_be_loaded_weight" name="to_be_loaded_weight" id="to_be_loaded_weight" >
                                                   <input type="hidden"  class="form-control Pid" name="Pid" id="Pid" >
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">Charge Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="8" class="form-control Charge_weight" name="Charge_weight" id="Charge_weight">
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">Volumetric<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="9" class="form-control Volumetric" value="N" name="Volumetric" id="Volumetric" onchange="checkVolumetric(this.value);">
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="row">
                                            <label class="col-md-4 col-form-label" for="password">Volumetric Weight<span
                                             class="error">*</span></label>
                                            <div class="col-md-8">
                                             <input type="text" tabindex="10" class="form-control VolumetricWeight" name="Volumetric_weight" id="Volumetric_weight" readonly>
                                            </div>
                                         </div>
                                        </div>
                                        <div class="col-12 text-end mt-1 mb-1">
                                            <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input onclick="DataSubmit();" type="button" tabindex="11" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="">
                                                <a href="" tabindex="12" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>  
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

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
                                                        <input type="number" step="0.1" name="VloumeActualWeight"  class="form-control VloumeActualWeight" id="VloumeActualWeight">
                                                    </td>
                                                    
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6"> 
                                                        <p>Customer Inch Formula : ((Length * Width * Height) / 1728.00) * 6.00</p>
                                                        <p>Customer Centimeter Formula : Formula not define !</p>  
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    
                                                   
                                                </tr>
                                            </tfoot>
                                           
                                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="calculateVolume()">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      });
      $('.selectBox').select2();
    function DataSubmit(){
       var  office_name = $("#office_name").val();
            var docket_no = $("#docket_no").val();
            var actual_box = $("#actual_box").val();
            var to_be_loaded_box = $("#to_be_loaded_box").val();
            var actual_weight = $("#actual_weight").val();
            var to_be_loaded_weight = $("#to_be_loaded_weight").val();
            var type = $("#type").val();
            if(office_name==""){
                alert("please Enter  Office Name");
                return false;
                
            }
            if(docket_no==""){
                alert("please Enter Docket No");
                return false;
                
            }
            if(actual_box==""){
                alert("please Enter Actual Box");
                return false;
                
            }
            if(to_be_loaded_box==""){
                alert("please Enter to be loaded box");
                return false;
                
            }
            if(actual_weight==""){
                alert("please Enter Actual Weight");
                return false;
                
            }
            if(to_be_loaded_weight==""){
                alert("please Enter to be loaded weight");
                return false;
                
            }
            if(actual_box <= 0){
                alert("please check Qty Initial Boxes");
                return false;
                
            }
            // if(type==""){
            //     alert("please Enter type");
            //     return false;
                
            // }
            var base="{{url('PartTruckLoadSubmition')}}";
            $.ajax({
                url:base,
                method:"POST",
                data:{
                    'office_name':office_name,
                    'docket_no' :docket_no,
                    'actual_box' :actual_box,
                    'to_be_loaded_box' :to_be_loaded_box,
                    'actual_weight' :actual_weight,
                    'to_be_loaded_weight' :to_be_loaded_weight,
                    'type' :type
                },
                 headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },
                    cache:false,
                    success:function(data){
                        location.reload();
                    }
            });
    }
 function getDocketDetails(Docket)
 {
    if($('#type').val()=='')
    {
     alert('Please select Type');
    
     $('.docket_no').val('');
     $('.office_name').focus();
     return false;
    }
    if($('#office_name').val()=='')
    {
     alert('Please select office');
    
     $('.docket_no').val('');
     $('.office_name').focus();
     return false;
    }
    var office_name=$('#office_name').val();
    var type=$('.type').val();
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsAvalibleForPartLoad',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':office_name,'type':type
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.docket_no').val('');
            $('.docket_no').focus();
            $('.actual_box').val('');
            $('.actual_weight').val('');
            return false;
        }
        else{
            $('.actual_box').val(obj.Pices);
            $('.actual_weight').val(obj.ActualW);
        }

       }
     });
}
function checkVolumetric(value)
{
    if(value=='Y')
    {
    $('#exampleModal').modal('toggle');
    }
   
}
function calculateVolume()
{
  
   
   if($('#lenght').val()=='')
   {
    alert('Please Enter Lenght');
    return false;
   }
   if($('#lenght').val()=='')
   {
    alert('Please Enter Lenght');
    return false;
   }
   if($('#height').val()=='')
   {
    alert('Please Enter height');
    return false;
   }
   if($('#qty').val()=='')
   {
    alert('Please Enter Qty');
    return false;
   }
    var lenght= $('#lenght').val()
    var width= $('#width').val();
    var height=$('#height').val();
    var qty=$('#qty').val();
    var volu=((lenght*width*height)/1728)*6;
    var TotalValue=(volu.toFixed(2));
    $('.VolumetricWeight').val(TotalValue);
    $('#exampleModal').modal('hide')
}
</script>