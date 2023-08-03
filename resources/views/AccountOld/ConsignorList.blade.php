@include('layouts.appThree')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Customer Name	<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                  <select name="CustomerName" tabindex="1" class="form-control CustomerName selectBox" id="CustomerName">
                                                   <option value="">--Select--</option>
                                                   @foreach($Cust as $customer)
                                                   <option value="{{$customer->id}}">{{$customer->CustomerCode}} ~ {{$customer->CustomerName}}</option>
                                                   @endforeach
                                                  
                                                  </select>
                                                  <input type="hidden" name="Cid"  class="form-control Cid" id="Cid">	
                                                </div>
                                            </div>
                                            </div>
                                           
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Service Type</label>
                                                <div class="col-md-7">
                                                  <input type="text" name="ServiceType" tabindex="2" class="form-control ServiceType" id="ServiceType">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Pickup Charges Amount</label>
                                                <div class="col-md-7">
                                                <input type="text" name="PickupChargesAmount" tabindex="3" class="form-control PickupChargesAmount" id="PickupChargesAmount">	
                                                </div>
                                            </div>
                                           </div>
                                           
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Pickup Charge Applicable</label>
                                                <div class="col-md-7">
                                                <input type="checkbox" name="PickupChargeApplicable" tabindex="31" class="PickupChargeApplicable" id="PickupChargeApplicable">	
                                                 </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">Consignor Name<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="ConsignorName" tabindex="7" class="form-control ConsignorName" id="ConsignorName">
                                                
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">GST No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="GSTNo" tabindex="8" class="form-control GSTNo" id="GSTNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="userName">PAN No</label>
                                                <div class="col-md-7">
                                                <input type="text" name="PANNo" tabindex="8" class="form-control PANNo" id="PANNo">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address 1	<span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="Address1" tabindex="8" class="form-control Address1" id="Address1">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Address 2	</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Address2" tabindex="8" class="form-control Address2" id="Address2">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">City <span  class="error">*</span></label>
                                                <div class="col-md-7">
                                                <input type="text" name="City" tabindex="8" class="form-control City" id="City">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Phone</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Phone" tabindex="8" class="form-control Phone" id="Phone">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Mobile</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Mobile" tabindex="8" class="form-control Mobile" id="Mobile">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-5 col-form-label" for="password">Email</label>
                                                <div class="col-md-7">
                                                <input type="text" name="Email" tabindex="8" class="form-control Email" id="Email">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-md-6">
                                           <div class="row">
                                           <label class="col-md-5 col-form-label" for="password"></label>
                                           
                                               <div class="col-md-7">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddConsignor()">
                                               <a href="{{url('CustomerPickupLocationMaster')}}" class="btn btn-primary">Cancel</a>
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
      <div class="row">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
          <th style="min-width:130px;">ACTION</th>
          <th style="min-width:20px;">SL#</th>
          <th style="min-width:130px;">Customer Name</th>
          <th style="min-width:130px;">Consignor Name</th>
          <th style="min-width:130px;">Service Type	</th>
          <th style="min-width:180px;">Pickup Charge Applicable	</th>
          <th style="min-width:170px;">Pickup Charges</th>
          <th style="min-width:130px;">GST No</th>
          <th style="min-width:130px;">PAN No</th>
          <th style="min-width:130px;">Address1</th>
          <th style="min-width:130px;">Address2</th>
          <th style="min-width:130px;">City Name</th>
          <th style="min-width:130px;">Phone</th>
          <th style="min-width:160px;">Mobile</th>
          <th style="min-width:130px;">Email ID	</th>
          
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($Consignor as $cons)
            <?php $i++; ?>
            <tr>
                <td><a href="javascript:void(0)" onclick="viewConsignor('{{$cons->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditConsignor('{{$cons->id}}')">Edit </a></td>
                <td>{{$i}}</td>
                <td>{{$cons->CustAddress->CustomerCode}} ~ {{$cons->CustAddress->CustomerName}}</td>
                <td>{{$cons->ConsignorName}}</td>
                <td>{{$cons->ServiceType}}</td>
                <td>{{$cons->PickupCharge}}</td>
                <td>{{$cons->PickupChargesAmount}}</td>
                <td>{{$cons->GSTNo}}</td>
                <td>{{$cons->PANNo}}</td>
                <td>{{$cons->Address1}}</td>
                <td>{{$cons->Address2}}</td>
                <td>{{$cons->City}}</td>
                <td>{{$cons->Phone}}</td>
                <td>{{$cons->Mobile}}</td>
                <td>{{$cons->Email}}</td>
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
       url: base_url + '/AddConsignor',
       cache: false,
       data: {
           'Cid':Cid,'CustomerName':CustomerName,'ServiceType':ServiceType,'ConsignorName':ConsignorName,'PickupChargesAmount':PickupChargesAmount,'GSTNo':GSTNo,'PANNo':PANNo,'Address1':Address1,'Address2':Address2,'City':City,'Phone':Phone,'Mobile':Mobile,'Email':Email,'PickupChargeApplicable':PickupChargeApplicable
             },
             
           success: function(data) {
          location.reload();
       }
     });
  }
  function viewConsignor(id) 
  {
    
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/viewConsignor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.CustomerName').val(obj.CustId).trigger('change');
     $('.CustomerName').attr('disabled', true);
     $('.ServiceType').val(obj.ServiceType);
     $('.ServiceType').attr('readonly', true);
     $('.PickupChargesAmount').val(obj.PickupChargesAmount);
     $('.PickupChargesAmount').attr('readonly', true);
     $('.ConsignorName').val(obj.ConsignorName);
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
  function EditConsignor(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/viewConsignor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.Cid').val(obj.id);
     $('.CustomerName').val(obj.CustId).trigger('change');
     $('.CustomerName').attr('disabled', false);
     $('.ServiceType').val(obj.ServiceType);
     $('.ServiceType').attr('readonly', false);
     $('.PickupChargesAmount').val(obj.PickupChargesAmount);
     $('.PickupChargesAmount').attr('readonly', false);
     $('.ConsignorName').val(obj.ConsignorName);
     $('.ConsignorName').attr('readonly', false);
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