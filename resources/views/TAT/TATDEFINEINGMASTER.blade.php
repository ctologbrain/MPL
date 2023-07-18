@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   <button class="btn btn-primary">Export</button>
                   <button class="btn btn-primary">Missing Group</button>
                </div>
                <h4 class="page-title">TAT DEFINEING MASTER</h4>
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
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6 m-b-1">
                                            <div class="row">

                                                <label class="col-md-2 col-form-label" for="origin_grp"> Origin Group	<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select name="origin_grp" tabindex="1" class="form-control origin_grp selectBox" id="origin_grp">
                                                   <option value="">--Select--</option>
                                                 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">
                                        </div>
                                        
                                        <div class="col-6 m-b-1">
                                            <div class="row">

                                                <label class="col-md-2 col-form-label" for="mode_name">Mode Name </label>
                                                <div class="col-md-8">
                                                  <select name="mode_name" tabindex="2" class="form-control mode_name selectBox" id="mode_name">
                                                   <option value="STATE">--Select--</option>
                                                  
                                                  </select>
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid"> 
                                                </div>
                                            </div>
                                        </div>

                                           <div class="col-6 mb-1">
                                            <div class="row">

                                                <label class="col-md-2 col-form-label" for="product_name">Product Name </label>
                                                <div class="col-md-8">
                                                 <input type="text" name="product_name" class="form-control product_name" id="product_name" tabindex="3">
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid"> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                          
                                        <div class="col-md-12 text-start m-b-1">
                                           <div class="row">
                                          
                                               <div class="col-md-12">
                                                 <input type="button" value="Process" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="" tabindex="4">
                                            <input type="button" value="Reset" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="" tabindex="5">
                                              <span style="font-weight: 700;padding-left: 10px;">Note:</span> Use , for multiple selection. Like XXXX, YYYY
                                            </div>
                                            </div>
                                           </div>
                                         
                                          </div>
                                          </div>
                                        </div> <!-- end col -->
                                        
                                   </div>
                           </div>
                   </div>
                           
          
                              
           
     <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
<div class="card-body">
<div class="tab-content">
  <div class="tab-pane show active" id="input-types-preview">
      <div class="row align-items-center">
                  
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
         
          <th style="min-width:20px;" class="p-1 text-center">SL#</th>
          <th style="min-width:200px;" class="p-1 text-center"> Mode</th>
          <th style="min-width:400px;" class="p-1 text-center">Product</th>
          <th style="min-width:400px;" class="p-1 text-center">Destination Group</th>
          <th style="min-width:20px;" class="p-1 text-center">Days</th>
          
          
           </tr>
         </thead>
         <tbody>
           
            <tr>
               
                <td class="p-1 text-center">1</td>
                <td class="p-1 text-center">AIR</td>
                <td class="p-1 text-center">DOOR TO DOOR</td>
                <td class="p-1 text-center"><a href="#" style="text-decoration: underline;">BHIWANDI</a></td>
                <td class="p-1 text-center">
                  <input type="text" name="days" class="days form-control" id="days" tabindex="6">
                </td>
               
           </tr>
           
            
          
        </tbody>
        </table>
       </div>
</form>
        <div class="d-flex d-flex justify-content-between">
       
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
 <script>$('.selectBox').select2();</script>
<script>
  function AddConsignor()
  {
     if($('#CustomerName').val()=='')
     {
        alert('Please Enter  Customer Name');
        return false;
     }
     if($('#ConsignorName').val()=='')
     {
        alert('Please Enter Consignor Name');
        return false;
     }
     if($('#Address1').val()=='')
     {
        alert('Please Enter Address 1');
        return false;
     }
     if($('#City').val()=='')
     {
        alert('Please Enter City');
        return false;
     }

     
     var CustomerName=$('#CustomerName').val();
     var Cid=$('#Cid').val();
     var ServiceType=$('#ServiceType').val();
     var ConsignorName=$('#ConsignorName').val();
     var PickupChargesAmount=$('#PickupChargesAmount').val();
     var GSTNo=$('#GSTNo').val();
     var PANNo=$('#PANNo').val();
     var Address1=$('#Address1').val();
     var Address2=$('#Address2').val();
     var City=$('#City').val();
     var Phone=$('#Phone').val();
     var Mobile=$('#Mobile').val();
     var Email=$('#Email').val();
     var PickupChargeApplicable = $("input[name=PickupChargeApplicable]:checked").val();
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddConsignee',
       cache: false,
       data: {
           'Cid':Cid,'CustomerName':CustomerName,'ServiceType':ServiceType,'ConsignorName':ConsignorName,'PickupChargesAmount':PickupChargesAmount,'GSTNo':GSTNo,'PANNo':PANNo,'Address1':Address1,'Address2':Address2,'City':City,'Phone':Phone,'Mobile':Mobile,'Email':Email,'PickupChargeApplicable':PickupChargeApplicable
             },
             
           success: function(data) {
          location.reload();
       }
     });
  }
  function viewConsignee(id) 
  {
    
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/viewConsignee',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);

     $('.CustomerName').val(obj.ConsrId).trigger('change');
     $('.CustomerName').attr('disabled', true);
     $('.ServiceType').val(obj.ServiceType);
     $('.ServiceType').attr('readonly', true);
     $('.PickupChargesAmount').val(obj.PickupChargesAmount);
     $('.PickupChargesAmount').attr('readonly', true);

     $('.ConsignorName').val(obj.ConsigneeName);

    

     $('.ConsignorName').attr('readonly', true);
     $('.GSTNo').val(obj.GSTNo);
     $('.GSTNo').attr('readonly', true);
     $('.PANNo').val(obj.PANNo);
     $('.PANNo').attr('readonly', true);
     $('.Address1').val(obj.Address1);
     $('.Address1').attr('readonly', true);
     $('.Address2').val(obj.Address2);
     $('.Address2').attr('readonly', true);
     $('.City').val(obj.City);
     $('.City').attr('readonly', true);
     $('.Phone').val(obj.Phone);
     $('.Phone').attr('readonly', true);
     $('.Mobile').val(obj.Mobile);
     $('.Mobile').attr('readonly', true);
     $('.Email').val(obj.Email);
     $('.Email').attr('readonly', true);
     if (obj.PickupCharge == 'Yes') {
        $('.PickupChargeApplicable').prop('checked', true);
        } else {
            $('.PickupChargeApplicable').prop('checked', false);
        }
        $('.PickupChargeApplicable').attr('disabled', true);
      

    
    }
    });
  }
  function EditConsignee(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/viewConsignee',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.Cid').val(obj.id);
     $('.CustomerName').val(obj.ConsrId).trigger('change');
     $('.CustomerName').attr('disabled', false);
    
     $('.ServiceType').val(obj.ServiceType);
     $('.ServiceType').attr('readonly', false);
     $('.PickupChargesAmount').val(obj.PickupChargesAmount);
     $('.PickupChargesAmount').attr('readonly', false);

     

     $('.ConsignorName').attr('readonly', false);
     $('.ConsignorName').val(obj.ConsigneeName);

    

     
     $('.GSTNo').val(obj.GSTNo);
     $('.GSTNo').attr('readonly', false);
     $('.PANNo').val(obj.PANNo);
     $('.PANNo').attr('readonly', false);
     $('.Address1').val(obj.Address1);
     $('.Address1').attr('readonly', false);
     $('.Address2').val(obj.Address2);
     $('.Address2').attr('readonly', false);
     $('.City').val(obj.City);
     $('.City').attr('readonly', false);
     $('.Phone').val(obj.Phone);
     $('.Phone').attr('readonly', false);
     $('.Mobile').val(obj.Mobile);
     $('.Mobile').attr('readonly', false);
     $('.Email').val(obj.Email);
     $('.Email').attr('readonly', false);
     if (obj.PickupCharge == 'Yes') {
        $('.PickupChargeApplicable').prop('checked', true);
        } else {
            $('.PickupChargeApplicable').prop('checked', false);
        }
        $('.PickupChargeApplicable').attr('disabled', false);
      

    
    }
    });
  } 
</script>