@include('layouts.appTwo')
<style></style>
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
                            <div class="row pl-pr mt-1">
                            <div class="mb-2 col-md-1">
                                </div>
                                <div class="mb-2 col-md-4">
                                    <label for="example-select" class="form-label">Docket Type<span
                                            class="error">*</span></label>
                                    <select  tabindex="1" class="form-control selectBox DocketType"
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
                                        name="serialFrom" id="serialFrom" oninput="this.value = Math.abs(this.value)" onchange="CheckAvailableSerial(this.value)">
                                        <input type="hidden" tabindex="1" class="form-control Did" name="Did" id="Did">
                                 <span id="getLine" class="error  text-danger"></span>
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
                                    <input tabindex="1" type="checkbox" id="NDRReason" name="isActive" value="isActive"
                                        class="isActive">
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                </div>
                                <div class="mb-2 col-md-12 text-center mt-1">
                                    <input tabindex="1" type="button" value="Save" class="btn btn-primary btnSubmit"
                                        id="btnSubmit" onclick="AddDocketSeries()">
                                    <a tabindex="1" href="{{url('DocketSeriesMaster')}}" class="btn btn-primary">Cancel</a>
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
        <form action="" method="GET">
          @csrf
          @method('GET')
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row pl-pr">
                                <div class="mb-2 col-md-3">
                                <select  tabindex="1" class="form-control selectBox"
                                        name="DocketType" id="">
                                            <option value="">Select Docket Type</option>
                                        @foreach($docketType as $docketTypelist)
                                        <option value="{{$docketTypelist->id}}" @if(request()->get('DocketType') !='' && request()->get('DocketType')==$docketTypelist->id){{'selected'}}@endif>{{$docketTypelist->Title}}</option>
                                        @endforeach
                                        </select>
                                </div>
                                <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Serial From"  autocomplete="off">
                   </div>
                                <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>
                          </div> 
                                </div>
                                </form>
                                <div id='loader' style='display: none;'>
                <img src="{{url('assets/images/Loading_2.gif')}}" width='130px' height='130px' style="position: absolute;left: 423px;top: -222px;z-index: 9999999999;">
                   </div>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr class="main-title text-dark">
                                            <th width="2%" class="p-1">ACTION</th>
                                            <th width="2%" class="p-1">SL#</th>
                                            <th width="10%" class="p-1">Docket Type</th>
                                            <th width="10%" class="p-1">Serial From	</th>
                                            <th width="10%" class="p-1">Serial To</th>
                                            <th width="10%" class="p-1">Quantity</th>
                                            <th width="10%" class="p-1">Active</th>
                                            <th width="10%" class="p-1">Created By</th>
                                            <th width="10%" class="p-1">Created On</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $i=0; 
                                        $page=request()->get('page');
                                        if(isset($page) && $page>1){
                                            $page =$page-1;
                                        $i = intval($page*10);
                                        }
                                         else{
                                        $i=0;
                                        }
                                        ?>
                                      @foreach($DocketSeries as $Dsc)
                                      <?php $i++; ?>
                                      <tr>
                                        <td class="p-1"><a id="Act{{$Dsc->id}}" href="javascript:void(0)" onclick="ActiveSeries('{{$Dsc->id}}')">Active</a> |  <a href="javascript:void(0)" onclick="viewDocketSeries('{{$Dsc->id}}')">View</td>
                                        <td class="p-1">{{$i}}</td>
                                        <td class="p-1">@isset($Dsc->DocketTypeDetials->Code) {{$Dsc->DocketTypeDetials->Code}} ~{{$Dsc->DocketTypeDetials->Title}} @endisset </td>
                                        <td class="p-1">{{$Dsc->Sr_From}}</td>
                                        <td class="p-1">{{$Dsc->Sr_To}}</td>
                                        <td class="p-1">{{$Dsc->Qty}}</td>
                                        <td class="p-1">{{$Dsc->Status  }}</td>
                                        <td class="p-1" > @isset($Dsc->UserDetails->name){{$Dsc->UserDetails->name}} @endisset </td>
                                        <td class="p-1">@isset($Dsc->created_at) {{date("d-m-Y H:i:s",strtotime($Dsc->created_at))}} @endisset</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                {{ $DocketSeries->appends(Request::except('page'))->links() }}
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
    $(".selectBox").select2();
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
   
  
   $("#loader").show(); 
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
         beforeSend: function() {    
            isProcessing = true;
              $(".btnSubmit").attr("disabled", true);
            },
        success: function(data) {
          if(data=='false')
          {
            $("#loader").hide();
            alert('Given serial no alredy taken');
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
                $("#loader").hide();
                alert('Add Successfully');
                location.reload();
            }
           
        }
    });
          }
           
        }
    });
}

function viewDocketSeries(id) {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewDocketSearies',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            const obj = JSON.parse(data);
            $('.serialFrom').val(obj.Sr_From);
            $('.serialFrom').attr('readonly', true);
            $('.Qty').val(obj.Qty);
            $('.Qty').attr('readonly', true);
            $('.DocketType').val(obj.Docket_Type).trigger('change');
            $('.DocketType').attr('disabled', true);
            $('.serialTo').val(obj.Sr_To);
            $('.serialTo').attr('readonly', true);
            if (obj.Status == 'Yes') {
                $('.isActive').prop('checked', true);
            } else {
                $('.isActive').prop('checked', false);
            }
            $('.isActive').attr('disabled', true);
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

function CheckAvailableSerial(SeriesNo){ 
 var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/CheckDocketSeriesInsert',
        cache: false,
        data: {
            'serialFrom': SeriesNo,
            'serialTo': '',
         },
        success: function(data) {
          if(data=='false')
          { 
            $("#getLine").text("This Series alredy taken!");
          }
          else if(data=='true'){
            $("#getLine").text('');
          }
      }
  });
}

function ActiveSeries(Id){
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ActiveDocketSeries',
        cache: false,
        data: {
            'Id':Id
         },
        success: function(data) {
            const obj = JSON.parse(data);
            if( obj.status=="Yes"){
            $("#Act"+Id).text('Active');
            }
            else{
            $("#Act"+Id).text('DeActive');
            }
      }
  });
}

</script>