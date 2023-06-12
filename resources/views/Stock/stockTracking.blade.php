@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">STOCK TRACKING</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label text-end" for="waybill_no">WAYBILL NO<span
                                            class="error">*</span></label>
                                                <div class="col-md-6">
                                                <input type="text" tabindex="1" class="form-control waybill_no" name="waybill_no" id="waybill_no" >
                                               
                                                <span class="error"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <button  onclick="EnterDocket();"  type="button" class="btn btn-primary">GO</button>
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

                </div> <!-- end card-body -->
                 <div class="tab-content">
                    <div class="tab-pane show active" id="input-types-preview">
                      
                        <div class="table-responsive a">
                                <table class="table table-bordered table-centered mb-1 mt-1 table-responsive">
                                <thead id="Head">
                                
                                </thead>
                                <tbody id="Body">
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>

<script type="text/javascript">
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function EnterDocket(Docket)
  {
    var base_url = '{{url('')}}';
  var Docket = $("#waybill_no").val();
        if($("#waybill_no").val()==""){
            alert("Please Enter Docket No");
            return false;
        }
          $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/StockTrackingPost',
           cache: false,
           data: {
           'Docket':Docket
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                var HEAD = `
                <tr class="main-title">
                <th style="min-width:100px;" class="p-1">SL#</th>
                <th style="min-width:130px;" class="p-1">Activity </th>
                <th style="min-width:150px;" class="p-1">Activity Date</th>
                 <th style="min-width:160px;" class="p-1">From Office</th>
                <th style="min-width:130px;" class="p-1">To Office</th>	
                <th style="min-width:160px;" class="p-1">Serial From</th>
                <th style="min-width:160px;" class="p-1">Serial To</th>
                <th style="min-width:160px;" class="p-1">Qty </th>
                 <th style="min-width:160px;" class="p-1">Entry Date </th>
                <th style="min-width:160px;" class="p-1">Entry By </th>
                </tr>
                `;
                if(obj.status=='true')
                {
                    var dateBookType = new Date(obj.dataIssue.created_at);
                  var DATE = ("0" +dateBookType.getDate()).slice(-2) + "-" + ("0" +(dateBookType.getMonth()+1)).slice(-2) + "-" + dateBookType.getFullYear()+' '+("0"+dateBookType.getHours()).slice(-2) + ":" + ("0"+dateBookType.getMinutes()).slice(-2);

                  var DateGanarate = new Date(obj.dataGenrate.created_at);
                  var DATEGan = ("0" +DateGanarate.getDate()).slice(-2) + "-" + ("0" +(DateGanarate.getMonth()+1)).slice(-2) + "-" + DateGanarate.getFullYear()+' '+("0"+DateGanarate.getHours()).slice(-2) + ":" + ("0"+DateGanarate.getMinutes()).slice(-2);
                  var DATEGanShort = ("0" +DateGanarate.getDate()).slice(-2) + "-" + ("0" +(DateGanarate.getMonth()+1)).slice(-2) + "-" + DateGanarate.getFullYear();

                  var dateISS= new Date(obj.dataIssue.IssueDate);
                  var DATEISSUE = ("0" +dateISS.getDate()).slice(-2) + "-" + ("0" +(dateISS.getMonth()+1)).slice(-2) + "-" + dateISS.getFullYear();
                var BODY = `<tr>
                    <td class="p-1" id=""> 1</td>
                    <td class="p-1" id="ActivityIssue">STOCK ISSUE </td> 
                    <td class="p-1" id="DateIssue">`+DATEISSUE+`</td>
                    <td class="p-1" id="offFromIssue"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"  title="`+obj.dataIssue.InitOfficeAdd+`">`+obj.dataIssue.InitOfficeCode+ `~`+obj.dataIssue.InitOfficeName+`</a></td> 
                    <td class="p-1" id="offToIssue"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"  title="`+obj.dataIssue.DestOfficeAdd+`"> `+obj.dataIssue.DestOfficeCode +`~`+obj.dataIssue.DestOfficeName+`</a></td>
                    <td class="p-1" id="SrFromIssue"> `+obj.dataIssue.Sr_From+`</td> 
                    <td class="p-1" id="SrToIssue"> `+obj.dataIssue.Sr_To+`</td>
                    <td class="p-1" id="QtyIssue"> `+obj.dataIssue.Qty+`</td> 
                    <td class="p-1" id="EntryDateIssue"> `+DATE+`</td>
                    <td class="p-1" id="EntryByIssue">`+obj.dataIssue.EmployeeName+`</td>   
                </tr>
                <tr>
                    <td class="p-1" id="">2 </td>
                    <td class="p-1" id="Activity"> DOCKET SERIES</td> 
                    <td class="p-1" id="Date"> `+DATEGanShort+`</td>
                    <td class="p-1" id="offFrom"><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"  title="`+obj.dataGenrate.OfficeAddress+`">`+obj.dataGenrate.OfficeCode +`~`+obj.dataGenrate.OfficeName+`</a></td> 
                    <td class="p-1" id="offTo">`+''+` </td>
                    <td class="p-1" id="SrFrom">`+obj.dataGenrate.Sr_From+` </td> 
                    <td class="p-1" id="SrTo">`+obj.dataGenrate.Sr_To+` </td>
                    <td class="p-1" id="Qty">`+obj.dataGenrate.Qty+` </td> 
                    <td class="p-1" id="EntryDate">`+DATEGan+` </td>
                    <td class="p-1" id="EntryBy">`+obj.dataGenrate.EmployeeName+` </td>   
                </tr>
                `;
                
              
                    $("#Head").html(HEAD);
                    $("#Body").html(BODY);
                    
                }
                else if(obj.status=='false'){
                    alert(obj.msg);
                    $("#Head").html('');
                    $("#Body").html('');
                }
                
                

            
            }
            });
  }

  $('[data-toggle="tooltip"]').tooltip();
</script>