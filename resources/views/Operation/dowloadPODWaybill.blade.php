@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">DOWNLOAD POD</li>
                    </ol>
                </div>
                <h4 class="page-title">DOWNLOAD POD</h4>
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
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">

                                            
                                            <div class="col-6 m-b-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="password">Search By<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select onchange="ChangeOption(this.value);" name="SearchType" id="SearchType" tabindex="1" class="form-control selectBox SearchType">
                                                <option value="">-- Select --</option>
                                                <option value="1">WAYBILL</option>
                                                <option value="2">CUSTOMER & BOOKING DATE</option>
                                                <option value="3">CUSTOMER & BILL NO</option>
                                                <option value="4">BOOKING OFFICE & BOOKING DATE</option>
                                                
                                             </select>
                                                </div>
                                            </div>
                                            </div>  
                                            
                                            <div class="col-6 m-b-1">
                                            
                                            </div>
                                            </div>
                                            <div class="row" id="getChanged">
                                            <div class="col-6 m-b-1">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="waybill_no">Waybill No<span
                                                class="error">*</span></label>
                                                    <div class="col-md-8">
                                                         <textarea rows="4" cols="20" tabindex="2" class="form-control waybill_no" name="waybill_no" id="waybill_no" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-6 m-b-1">
                                           
                                            </div>
                                            </div>
                                            <div class="row">

                                            <div class="col-6 m-b-1">
                                            <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="5" value="GO" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="GetTable()">
                                                
                                            </div>
                                            </div>
                                           </div>
                                         
                                        
                                             

                                        </div>
                                               
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                
            
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                        <div class="table-responsive a" id="GetTableFromInner">
                        </div>
                    </div>

               </div> <!-- end card-body -->     
                  
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
$(".selectBox").select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function GetTable()
  {
    var base_url = '{{url('')}}';
    var searchType=$('#SearchType').val();
    var waybill_no=$('#waybill_no').val();

    var CustomerName=$('#CustomerName').val();
    var bill_no=$('#bill_no').val();
    var booking_office=$('#booking_office').val();
    var DateFrom =$('#from_date').val();
    var DateTo =$('#to_date').val();
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/DownloadBulkPODShow',
           cache: false,
           data: {
            'searchType':searchType,'waybill_no':waybill_no,'CustomerName':CustomerName,
            'bill_no':bill_no,
            'booking_office':booking_office,
            'DateFrom':DateFrom,
            'DateTo':DateTo,
           }, 
            success: function(data) {
                if(data=="false"){

                }
                else{
                    $("#GetTableFromInner").html(data);
                }
            }
            });
  }

  function ChangeOption(getOption)
  {
      var innerHTML='';
    if(getOption==1){
        innerHTML =`
        <div class="col-6 m-b-1">
        <div class="row">
            <label class="col-md-3 col-form-label" for="waybill_no">Waybill No<span
        class="error">*</span></label>
            <div class="col-md-8">
                    <textarea rows="4" cols="20" tabindex="2" class="form-control waybill_no" name="waybill_no" id="waybill_no" ></textarea>
            </div>
        </div>
    </div>
        `;
    }
    else if(getOption==2){
          innerHTML =`
    <div class="col-6 m-b-1">
        <div class="row">
            <label class="col-md-3 col-form-label" for="CustomerName">Customer Name<span
        class="error">*</span></label>
            <div class="col-md-8">
            <select  name="CustomerName" id="CustomerName" tabindex="1" class="form-control selectBoxTwo CustomerName">
            <option value="">-- Select --</option>
            @foreach($Customer as $key)
            <option value="{{$key->id}}">{{$key->CustomerCode}} ~{{$key->CustomerName}}</option>
            @endforeach
            </select>
            </div>
        </div>
    </div>
    <div class="col-6 m-b-1">
    
    </div>
    <div class="col-6 m-b-1">
        <div class="row mb-1">   
            <label class="col-md-3 col-form-label" for="from_date">From Date<span
        class="error">*</span></label>
            <div class="col-md-3">
                    <input type="text" name="from_date" class="from_date form-control datepicker" id="from_date" tabindex="3">
            </div>
            <label class="col-md-2 col-form-label" for="to_date">To Date<span
        class="error">*</span></label>
            <div class="col-md-3">
                <input type="text" name="to_date" class="to_date form-control datepicker" id="to_date" tabindex="4">
            </div>
        </div>
    </div>
          `;
    }
    else if(getOption==3){
          innerHTML =`
    <div class="col-6 m-b-1">
        <div class="row">
            <label class="col-md-3 col-form-label" for="CustomerName">Customer Name<span
        class="error">*</span></label>
            <div class="col-md-8">
            <select  name="CustomerName" id="CustomerName" tabindex="1" class="form-control selectBoxTwo CustomerName">
            <option value="">-- Select --</option>
            @foreach($Customer as $key)
            <option value="{{$key->id}}">{{$key->CustomerCode}} ~{{$key->CustomerName}}</option>
            @endforeach
            </select>
                  
            </div>
        </div>
    </div>
    <div class="col-6 m-b-1">
    
    </div>
    <div class="col-6 m-b-1">
    <div class="row">
        <label class="col-md-3 col-form-label" for="bill_no">Bill No</label>
        <div class="col-md-8">
                <input type="text" name="bill_no" class="bill_no form-control" id="bill_no" tabindex="3">
        </div>
                
    </div>
    </div>
          `;
    }
    else if(getOption==4){
          innerHTML =`
    <div class="col-6 m-b-1">
        <div class="row">
            <label class="col-md-3 col-form-label" for="booking_office">Booking Office</label>
            <div class="col-md-8">
                   
            <select  name="booking_office" id="booking_office" tabindex="1" class="form-control selectBoxTwo booking_office">
            <option value="">-- Select --</option>
            @foreach($Office as $key)
            <option value="{{$key->id}}">{{$key->OfficeCode}} ~{{$key->OfficeName}}</option>
            @endforeach
            </select>
            </div>
        </div>
    </div>
    <div class="col-6 m-b-1">
    
    </div>
    <div class="col-6 m-b-1">
        <div class="row mb-1">   
            <label class="col-md-3 col-form-label" for="from_date">From Date<span
        class="error">*</span></label>
            <div class="col-md-3">
                    <input type="text" name="from_date" class="from_date form-control datepicker" id="from_date" tabindex="3">
            </div>
            <label class="col-md-2 col-form-label" for="to_date">To Date<span
        class="error">*</span></label>
            <div class="col-md-3">
                <input type="text" name="to_date" class="to_date form-control datepicker" id="to_date" tabindex="4">
            </div>
        </div>
    </div>
          `;
    }
    $("#getChanged").html(innerHTML);
    $(".selectBoxTwo").select2();
    $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  }

  function getChecked(){
    if($("#SelectAll").prop("checked")==true){
        $(".check").prop("checked",true);
    }
    else if($("#SelectAll").prop("checked")==false){
        $(".check").prop("checked",false);

    }
  }
  
</script>