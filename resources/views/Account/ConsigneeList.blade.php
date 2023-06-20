@include('layouts.appThree')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
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

                                                <label class="col-md-5 col-form-label" for="userName">Consigner Name	<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                  <select name="CustomerName" tabindex="1" class="form-control CustomerName selectBox" id="CustomerName">
                                                   <option value="">--Select--</option>
                                                   @foreach($Consnr as $customer)
                                                   <option value="{{$customer->id}}">{{$customer->ConsignorName}}</option>

                                                   @endforeach
                                                  
                                                  </select>
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid">	
                                                </div>
                                            </div>
                                            </div>
                                           
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Service Type</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="ServiceType" tabindex="2" class="form-control ServiceType" id="ServiceType">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Delivery Charges</label>
                                                <div class="col-md-7">
                                                <input type="text" name="PickupChargesAmount" tabindex="3" class="form-control PickupChargesAmount" id="PickupChargesAmount">	
                                                </div>
                                            </div>
                                           </div>
                                           
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Delivery Charge Applicable</label>
                                                <div class="col-md-7">
                                                <input type="checkbox" name="PickupChargeApplicable" tabindex="4" class="PickupChargeApplicable" id="PickupChargeApplicable">	
                                                 </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Consignee Name<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="ConsignorName" tabindex="5" class="form-control ConsignorName" id="ConsignorName">
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">GST No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="GSTNo" tabindex="6" class="form-control GSTNo" id="GSTNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">PAN No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="PANNo" tabindex="7" class="form-control PANNo" id="PANNo">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address 1	<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="Address1" tabindex="8" class="form-control Address1" id="Address1">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address 2	</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Address2" tabindex="9" class="form-control Address2" id="Address2">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">City <span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="City" tabindex="10" class="form-control City" id="City">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Phone</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Phone" tabindex="11" class="form-control Phone" id="Phone">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Mobile</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Mobile" tabindex="12" class="form-control Mobile" id="Mobile">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Email</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Email" tabindex="13" class="form-control Email" id="Email">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-md-6 mt-1 text-end">
                                           <div class="row">
                                           <label class="col-md-5 col-form-label" for="password"></label>
                                           
                                               <div class="col-md-7">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddConsignor()" tabindex="14">
                                               <a href="{{url('CustomerDropLocationMaster')}}" class="btn btn-primary" tabindex="15">Cancel</a>
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
      <div class="row mt-1">
                  <div class="mb-1 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="16">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="17">Submit</button>
                          </div> 
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title text-dark">
          <th style="min-width:130px;" class="p-1">ACTION</th>
          <th style="min-width:20px;" class="p-1">SL#</th>
          <th style="min-width:130px;" class="p-1"> Consigner Name</th>
          <th style="min-width:130px;" class="p-1">Consignee Name</th>
          <th style="min-width:130px;" class="p-1">Service Type	</th>
          <th style="min-width:200px;" class="p-1">Delivery Charge Applicable</th>
          <th style="min-width:170px;" class="p-1">Delivery Charges</th>
          <th style="min-width:130px;" class="p-1">GST No</th>
          <th style="min-width:130px;" class="p-1">PAN No</th>
          <th style="min-width:130px;" class="p-1">Address1</th>
          <th style="min-width:130px;" class="p-1">Address2</th>
          <th style="min-width:130px;" class="p-1">City Name</th>
          <th style="min-width:130px;" class="p-1">Phone</th>
          <th style="min-width:160px;" class="p-1">Mobile</th>
          <th style="min-width:130px;" class="p-1">Email ID	</th>
          
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($Consignor as $cons)
            <?php $i++; ?>
            <tr>
                <td class="p-1"><a href="javascript:void(0)" onclick="viewConsignee('{{$cons->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditConsignee('{{$cons->id}}')">Edit </a></td>
                <td class="p-1">{{$i}}</td>
                <td class="p-1">{{$cons->CustAddress->ConsignorName}}</td>
                <td class="p-1">{{$cons->ConsigneeName}}</td>
                <td class="p-1">{{$cons->ServiceType}}</td>
                <td class="p-1">{{$cons->PickupCharge}}</td>
                <td class="p-1">{{$cons->PickupChargesAmount}}</td>
                <td class="p-1">{{$cons->GSTNo}}</td>
                <td class="p-1">{{$cons->PANNo}}</td>
                <td class="p-1">{{$cons->Address1}}</td>
                <td class="p-1">{{$cons->Address2}}</td>
                <td class="p-1">{{$cons->City}}</td>
                <td class="p-1">{{$cons->Phone}}</td>
                <td class="p-1">{{$cons->Mobile}}</td>
                <td class="p-1">{{$cons->Email}}</td>
           </tr>
            @endforeach
            
          
        </tbody>
        </table>
       </div>
</form>
        <div class="d-flex d-flex justify-content-between">
        {{ $Consignor->appends(Request::except('page'))->links() }}
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