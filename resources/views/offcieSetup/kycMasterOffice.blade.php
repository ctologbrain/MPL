@include('layouts.app')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">KYC MASTER - OFFICE</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card drs_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                            <div class="col-6 mb-1">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label" for="office_name">Office Name<span
                                                class="error">*</span></label>
                                                    <div class="col-md-8">
                                                 
                                                 <select tabindex="1"  class="form-control office_name selectBox" name="office_name" id="office_name">
                                                    <option value="">--Select--</option>
                                                     @foreach($office as $key)
                                                     <option value="{{$key->id}}">{{$key->OfficeCode}}~{{$key->OfficeName}}</option>
                                                      @endforeach
                                                 </select>    
                                                    
                                                    <span class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="col-xl-12">
                                                  <table class="table-responsive table-bordered">
                                                    <thead>
                                                        <tr class="main-title text-dark">
                                                        
                                                            <th class="p-1 td2">Document Name</th>
                                                            <th class="p-1 td3">Document No</th>
                                                            <th class="p-1 td4">Date of Issue</th>
                                                            <th class="p-1 td5">Date of Expiry</th>
                                                            <th class="p-1 td6">Upload Document</th>
                                                            <th class="p-1 td7"></th>
                                                        </tr>
                                                         </thead> 
                                                         <tbody>
                                                        <tr>
                                                           
                                                            <td class="p-1">
                                                                <input type="text" name="document_name" tabindex="2" class="form-control document_name" id="document_name" onchange="">   
                                                            </td>
                                                            <td class="p-1">
                                                                <input type="text" name="document_no" tabindex="3" class="form-control document_no" id="document_no" onchange="">                  
                                                            </td>
                                                            <td class="p-1">
                                                                <input type="text"  name="date_of_issue" tabindex="4" class="form-control date_of_issue datepickerOne" id="date_of_issue">
                                                            </td>
                                                            <td class="p-1">
                                                                <input type="text"  name="date_of_expiry" tabindex="5" class="form-control date_of_expiry datepickerOne" id="date_of_expiry">
                                                            </td>
                                                            <td class="p-1 text-start">
                                                                <input type="file" name="file" id="file">
                                                            </td>
                                                            <td class="p-1">
                                                              
                                                                <input type="button" value="Save" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveKyc()" tabindex="6">
                                                            </td>
                                                        </tr>
                                                        <tr id="hidden">
                                                            <td colspan="7" class="p-1 text-center text-dark"></td>
                                                        </tr>
                                                        </tbody>
                                                         
                                                  </table> 
                                                  <div class="tabelData newtable"></div>
                                                </div>
                                            </div>
                                        </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
 
  

    function SaveKyc(){
        var base_url = '{{url('')}}';
            if($("#office_name").val()=='')
           {
              alert('Please Select  Office Name');
              return false;
           }
           if($("#document_name").val()=='')
           {
              alert('Please Enter  Document Name');
              return false
           }
           
            if($("#document_no").val()=='')
           {
              alert('Please Enter  Document No.');
              return false;
           }
           if($("#date_of_issue").val()=='')
           {
              alert('Please Enter Date Of Issue');
              return false;
           }
           if($("#date_of_expiry").val()=='')
           {
              alert('Please Enter Date Of Expiry');
              return false;
           }
          
           if($("#file")[0].files[0]==undefined)
           {
              alert('Please Choose File');
              return false;
           }
          
          
           var  office_name = $("#office_name").val();
           var document_name  = $("#document_name").val();
           var document_no  = $("#document_no").val();
           var date_of_issue  = $("#date_of_issue").val();
           var date_of_expiry  = $("#date_of_expiry").val();
           var file  = $("#file")[0].files[0];
           var formdata= new FormData();

        formdata.append('office_name',office_name);
        formdata.append('document_name',document_name);
        formdata.append('document_no',document_no);
        formdata.append('date_of_issue',date_of_issue);
        formdata.append('date_of_expiry',date_of_expiry);
        if(file !=undefined){
            formdata.append('file',file);
        }
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
            url: base_url + '/KycOfficePost',
            cache: false,
            contentType: false,
            processData: false,
            data:formdata,
            success: function(data) {
                alert(data);
                location.reload();
            }
            });
    }

    // function getDocketDetails(Docket)
    // {
   
    // var base_url = '{{url('')}}';
    // $.ajax({
    //    type: 'POST',
    //    headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/GetDocketWithDrsEntry',
    //    cache: false,
    //    data: {
    //        'Docket':Docket
    //    }, 
    //    success: function(data) {
        
    //     const obj = JSON.parse(data);
       
    //     if(obj.status=='true')
    //     {
    //        $('.displayPices').val(obj.docket.docket_product_details.Qty)
    //        $('.displayWeight').val(obj.docket.docket_product_details.Actual_Weight)
           

    //     }
    //     else{
    //         alert(obj.message);
    //         $('.Docket').val('');
    //         $('.displayPices').val('');
    //         $('.displayWeight').val('');
    //         $('.Docket').focus();
    //      }
       
        
    //    }
    //  });
    // }
    
</script>
   

    
