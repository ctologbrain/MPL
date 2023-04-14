@include('layouts.appTwo')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
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
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Office<span
                                            class="error">*</span></label><br>
                                            <select  tabindex="1" class="form-control selectBox Office"
                                        name="Office" id="Office">
                                            <option value="">Select Office</option>
                                        @foreach($office as $officelist)
                                        <option value="{{$officelist->id}}">{{$officelist->OfficeCode}} ~ {{$officelist->OfficeName}}</option>
                                        @endforeach
                                        </select>
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                    <label for="example-select" class="form-label">Docket Type<span
                                            class="error">*</span></label>
                                         <select  tabindex="1" class="form-control selectBox DocketType"
                                        name="DocketType" id="DocketType" onchange="GetDocketSeries(this.value)">
                                            <option value="">Select Docket Type</option>
                                        @foreach($docketType as $docketTypelist)
                                        <option value="{{$docketTypelist->id}}">{{$docketTypelist->Title}}</option>
                                        @endforeach
                                        </select>
                                     <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-3">
                                <label for="example-select" class="form-label">Issue Date<span
                                            class="error">*</span></label><br>
                                <input type="text" tabindex="1" class="form-control datepickerOne IssueDate"
                                        name="IssueDate" id="IssueDate">
                                    <span class="error"></span>
                                </div>
                               
                                
                               <h4 class="header-title nav nav-tabs nav-bordered mb-1"></h4>
                               

                            <div class="mb-2 col-md-1">
                              </div>
                              
                              <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Quantity<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control Qty"
                                        name="Qty" id="Qty" readonly onblur="calculateSerTo()">
                                      
                                    <span class="error"></span>
                                </div>
                             <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Serial From<span
                                            class="error">*</span></label>
                                   
                                    <input type="text" tabindex="1" class="form-control serialFrom"
                                        name="serialFrom" id="serialFrom" readonly>
                                        <input type="hidden" tabindex="1"  class="form-control Did" name="Did" id="Did" onblur="calculateSerTo()">
                                 <span class="error"></span>
                                </div>

                             
                                <div class="mb-2 col-md-2">
                                    <label for="example-select" class="form-label">Serial To<span
                                            class="error">*</span></label>
                                    <input type="text" tabindex="1" class="form-control serialTo"
                                        name="serialTo" id="serialTo" readonly onblur="calculateSerTo()">
                                      
                                    <span class="error"></span>
                                </div>
                                <div class="mb-2 col-md-2">
                                <label for="example-select" class="form-label">Bal. Quantity</label><br>
                                <input type="text" tabindex="1" class="form-control BalQty"
                                        name="BalQty" id="BalQty" readonly onblur="calculateSerTo()">
                                    <span class="error"></span>
                                </div>
                               
                               
                                <div class="mb-2 col-md-2">
                                    <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3"
                                        id="btnSubmit" onclick="AddDocketSeriesDevis()">
                                    <a href="{{url('DocketSeriesAllocation')}}" class="btn btn-primary mt-3">Cancel</a>
                                </div>

                                <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
                                
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
                              <div id='loader' style='display: none;'>
                          <img src="{{url('assets/images/Loading_2.gif')}}" width='130px' height='130px' style="position: absolute;left: 423px;top: -222px;z-index: 9999999999;">
                             </div>
                                <table class="table table-bordered table-centered mb-1 mt-1">
                                    <thead>
                                        <tr>
                                             <th width="2%">SL#</th>
                                            <th width="2%">Select</th>
                                            <th width="10%">Serial From	</th>
                                            <th width="10%">Serial To</th>
                                            <th width="10%">Stock</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody class="tbodyclass">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
$('.datepickerOne').datepicker({
    dateFormat: 'yy-mm-dd'
});
$('.selectBox').select2();
function AddDocketSeriesDevis() {
     
   if ($('#Office').val() == '') {
           alert('please Enter Office');
           return false;
       }
       if ($('#DocketType').val() == '') {
           alert('please Enter Docket Type');
           return false;
       }
       if ($('#IssueDate').val() == '') {
           alert('please Enter Issue Date');
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

       var Qty = $('#Qty').val();
       var BalQty = $('#BalQty').val();
      
       if(parseInt(Qty) >= parseInt(BalQty))
       {
        alert('Please check balance QTY');
        return false;
       }
       var serialFrom = $('#serialFrom').val();
       var serialTo = $('#serialTo').val();
       var Did = $('#Did').val();
       var DocketType = $('#DocketType').val();
       var Office = $('#Office').val();
       var IssueDate = $('#IssueDate').val();
       $(".btnSubmit").attr("disabled", true);
      $("#loader").show(); 
       var base_url = '{{url('')}}';
       $.ajax({
           type: 'POST',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
           },
           url: base_url + '/AddEditDocketSeriesAll',
           cache: false,
           data: {
                'serialFrom': serialFrom,
                'Qty': Qty,
                'serialTo': serialTo,
                'Did':Did,
                'DocketType':DocketType,
                'Office':Office,
                'BalQty':BalQty,
                'IssueDate':IssueDate
            },
           success: function(data) {
              if(data=='true')
            {
                 alert(' Docket Allocate Successfully');
                location.reload();
            }
              
           }
       });
   }

function GetDocketSeries(DicketType)
{
    
   
    $("#loader").show(); 
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/GetDocketSeries',
        cache: false,
        data: {
            'id': DicketType
        },
        success: function(data) {
            $("#loader").hide();
           $('.tbodyclass').html(data);
           }
    });
}
function getActualSeares(id)
{
    $("#loader").show(); 
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/getActulaDocketSeries',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
            $("#loader").hide();
            const obj = JSON.parse(data);BalQty
           $('.serialFrom').val(obj.Sr_From);
           $('.BalQty').val(obj.balance);
           $('.Did').val(obj.sid);
           $('.Qty').val('')
           $('.Qty').attr('readonly', false);
           $('.serialTo').val('')
        
            
           
          }
    });
}
function calculateSerTo()
{
    if($('.serialFrom').val() !='')
    {
        var serialFrom=$('.serialFrom').val();
    }
    else
    {
        var serialFrom=0;    
    }
    if($('.Qty').val() !='')
    {
        var SeriesQty=$('.Qty').val();
    }
    else
    {
        var SeriesQty=0;    
    }
    if(SeriesQty !='')
    {
        var DQty=SeriesQty-1;
    }
    else
    {
        var DQty=0;    
    }
  
    var SrTo=parseInt(serialFrom)+parseInt(DQty);
    $('.serialTo').val(SrTo);
}
</script>