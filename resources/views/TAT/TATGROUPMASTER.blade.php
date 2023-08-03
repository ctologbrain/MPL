@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Billing</a></li>
                        <li class="breadcrumb-item active">TAT GROUP MASTER</li>
                    </ol>
                </div>
                <h4 class="page-title">TAT GROUP MASTER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            
            <form action="" method="GET">
                @csrf
                @method('GET')
                <div class="card">
              <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                    <div class="row mt-1 align-items-center">
                                <label class="mb-1 col-md-1">Search</label>
                                <div class="mb-1 col-md-4">
                                 <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="1">
                                 </div>
                                 
                                <div class="mb-1 col-md-3">
                                         <button type="submit" name="submit" value="Go" class="btn btn-primary" tabindex="2">Go</button>
                                         <button type="submit" name="submit" value="Go" class="btn btn-primary" tabindex="3">Add New</button>
                                </div> 
                                <div class="mb-1 col-md-4 text-end">
                                         <a href="#" style="text-decoration: underline;" tabindex="4">Export</a>
                                </div> 
                                  </form>
                          <div class="table-responsive a">
                             <table class="table table-bordered table-centered mb-1 mt-1">
                         <thead>
                        <tr class="main-title text-dark">
                        <th style="min-width:80px;" class="p-1 text-center">ACTION</th>
                        <th style="min-width:20px;" class="p-1 text-center">SL#</th>
                        <th style="min-width:430px;" class="p-1 text-start"> Tat Groups Name</th>
                        <th style="min-width:40px;" class="p-1 text-end">Total City</th>
                         </tr>
                       </thead>
                       <tbody>
                          <?php $i=0; $Consignor=[]; ?>
                          @foreach($Consignor as $cons)
                          <?php $i++; ?>
                          <tr>
                              <td class="p-1 text-center"><a href="javascript:void(0)" onclick="">View  </a>
                                  /
                                  <a href="javascript:void(0)" onclick="EditConsignee('{{$cons->id}}')">Edit  </a>
                              </td>
                              <td class="p-1 text-center">1</td>
                              <td class="p-1 text-start">BHIWANDI</td>
                              <td class="p-1 text-end">1</td>
                             
                             
                         </tr>
                          @endforeach
                          
                        
                      </tbody>
                      </table>
                     </div>
            </form>
              <div class="d-flex d-flex justify-content-between">
              
              </div>
        
        </div> <!-- end col -->
      

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