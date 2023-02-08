@include('layouts.app')
<style></style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title nav nav-tabs nav-bordered mb-3"></h4>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>Success - </strong> {{ session('status','') }}
                    </div>
                    @endif
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                            <div class="mb-2 col-md-1">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Docket Type<span
                                            class="error">*</span></label>
                                    <select  tabindex="1" class="form-control DocketType"
                                        name="DocketType" id="DocketType">
                                            <option value="">Select Docket Type</option>
                                        @foreach($docketType as $docketTypelist)
                                        <option value="{{$docketTypelist->id}}">{{$docketTypelist->Title}}</option>
                                        @endforeach
                                        </select>
                                     <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-4">
                               </div>
                               <h4 class="header-title nav nav-tabs nav-bordered mb-1"></h4>
                               

                            <div class="mb-2 col-md-1">
                              </div>
                             <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Serial From<span
                                            class="error">*</span></label>
                                   
                                    <input type="number" tabindex="1" min="0" class="form-control serialFrom"
                                        name="serialFrom" id="serialFrom" oninput="this.value = Math.abs(this.value)">
                                        <input type="hidden" tabindex="1" class="form-control Did" name="Did" id="Did">
                                 <span class="error"></span>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Quantity<span
                                            class="error">*</span></label>
                                    <input type="number" min="0" tabindex="1" class="form-control Qty"
                                        name="Qty" id="Qty" onblur="calculateSerTo(this.value)" oninput="this.value = Math.abs(this.value)">
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Serial To<span
                                            class="error">*</span></label>
                                    <input type="number" tabindex="1" min="0" class="form-control serialTo"
                                        name="serialTo" id="serialTo" readonly oninput="this.value = Math.abs(this.value)">
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-1">
                                <label for="example-select" class="form-label">Active</label><br>
                                    <input type="checkbox" id="NDRReason" name="isActive" value="isActive"
                                        class="isActive">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddDocketSeries()">
                                    <a href="{{url('Complaint')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>

                                <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
                                <form action="" method="GET">
                                    @csrf
                                    @method('GET')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="mb-2 col-md-3">
                                    <input type="text" class="form-control BillDate" name="search" placeholder="Search"
                                        autocomplete="off">
                                </div>
                                <div class="mb-2 col-md-3">
                                    <button type="button" name="submit" value="Search"
                                        class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                <div id='loader' style='display: none;'>
                <img src="{{url('assets/images/Loading_2.gif')}}" width='130px' height='130px' style="position: absolute;left: 423px;top: -222px;z-index: 9999999999;">
                   </div>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                            <th width="2%">ACTION</th>
                                            <th width="2%">SL#</th>
                                            <th width="10%">Docket Type</th>
                                            <th width="10%">Serial From	</th>
                                            <th width="10%">Serial To</th>
                                            <th width="10%">Quantity</th>
                                            <th width="10%">Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $i=0; ?>
                                      @foreach($DocketSeries as $Dsc)
                                      <?php $i++; ?>
                                      <tr>
                                        <td>View</td>
                                        <td>{{$i}}</td>
                                        <td>{{$Dsc->DocketTypeDetials->Title}}</td>
                                        <td>{{$Dsc->Sr_From}}</td>
                                        <td>{{$Dsc->Sr_To}}</td>
                                        <td>{{$Dsc->Qty}}</td>
                                        <td>{{$Dsc->Status  }}</td>

                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});

function AddDocketSeries() {
   
if ($('#DocketType').val() == '') {
        alert('please Enter Docket Type');
        return false;
    }
 
 if ($('#serialFrom').val() == '') {
        alert('please Enter Serial From');
        return false;
    }
    if ($('#Qty').val() == '') {
        alert('please Enter Qty');
        return false;
    }
    if ($('#serialTo').val() == '') {
        alert('please Enter Serial To');
        return false;
    }
    var serialFrom = $('#serialFrom').val();
    var Qty = $('#Qty').val();
    var serialTo = $('#serialTo').val();
    var isActive = $("input[name=isActive]:checked").val();
    var Did = $('#Did').val();
    var DocketType = $('#DocketType').val();
   
   //$(".btnSubmit").attr("disabled", true);
   //$("#loader").show(); 
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/CheckDocketSeriesInsert',
        cache: false,
        data: {
            'serialFrom': serialFrom,
            'Qty': Qty,
            'serialTo': serialTo,
            'isActive':isActive,
            'Did':Did,
            'DocketType':DocketType,
         },
        success: function(data) {
          if(data=='false')
          {
            alert('Given serial no alredy taken');
            $("#loader").hide();
            return false;
            
          }
          else{
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                url: base_url + '/AddDocketSeies',
                cache: false,
                data: {
                    'serialFrom': serialFrom,
                    'Qty': Qty,
                    'serialTo': serialTo,
                    'isActive':isActive,
                    'Did':Did,
                    'DocketType':DocketType,
                
        },
        success: function(data) {
            if(data=='true')
            {
                location.reload();
            }
           
        }
    });
          }
           
        }
    });
}

function ViewDocketType(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDocketType',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.TypeCode').val(obj.Code);
            $('.TypeCode').attr('readonly', true);
            $('.TypeName').val(obj.Title);
            $('.TypeName').attr('readonly', true);
            $('.Typecategory').val(obj.Cat_Id).trigger('change');
            $('.Typecategory').attr('disabled', true);
            $('.ItemPrice').val(obj.Rate);
            $('.ItemPrice').attr('readonly', true);
          }
    });
}

function EditDocketType(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDocketType',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.Did').val(obj.id);
            $('.TypeCode').val(obj.Code);
            $('.TypeCode').attr('readonly', false);
            $('.TypeName').val(obj.Title);
            $('.TypeName').attr('readonly', false);
            $('.Typecategory').val(obj.Cat_Id).trigger('change');
            $('.Typecategory').attr('disabled', false);
            $('.ItemPrice').val(obj.Rate);
            $('.ItemPrice').attr('readonly', false);
          }
    });

}
Did
calculateSerTo
function calculateSerTo(Qty)
{
    if($('.serialFrom').val() !='')
    {
        var serialFrom=$('.serialFrom').val();
    }
    else
    {
        var serialFrom=0;    
    }
    if(Qty !='')
    {
        var DQty=Qty-1;
    }
    else
    {
        var DQty=0;    
    }
  
    var SrTo=parseInt(serialFrom)+parseInt(DQty);
    $('.serialTo').val(SrTo);
}
</script>