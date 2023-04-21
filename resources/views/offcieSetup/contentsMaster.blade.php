@include('layouts.app')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">CONTENTS MASTER</h4>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card customer_oda_rate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="bdr-btm mb-1">
                                    <div class="row">
                                         
                                      
                                      
                                     
                                        

                                        <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-4 col-form-label" for="contents">Contents<span class="error">*</span></label>
                                                                  <div class="col-md-8">
                                                                <input type="text" name="contents" tabindex="1"
                                                                    class="form-control contents" id="contents" onchange="">
                                                                    <input type="hidden" name="Id" id="Id">
                                                                  </div>
                                                      
                                            
                                                    
                                            </div>
                                        </div>
                                         <div class="col-4">

                                            <div class="row">

                                                  
                                                            <label class="col-md-3 col-form-label" for="login_name">Mode<span class="error">*</span></label>
                                                                  <div class="col-md-4">
                                                                <select class="mode form-control" name="mode" id="mode" tabindex="2">
                                                                <option value="1">ALL</option>
                                                                <option value="2">AIR</option>
                                                                <option value="3">COURIER</option>
                                                                <option value="4">ROAD</option>
                                                                <option value="5">TRAIN</option>
                                                                </select>
                                                                  </div>
                                                                  
                                            </div>
                                        </div>

                                          <div class="col-4">

                                            <div class="row">

                                            </div>
                                        </div>


                                         <div class="col-4">

                                            <div class="row">

                                            </div>
                                        </div>

                                       
                                        


                                        <div class="col-4">

                                            <div class=" d-flex justify-content-center mt-1">

                                                  
                                                   
                                                           <input type="button" tabindex="4" value="Save"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="SaveDataContents();">
                                                          <a href="" tabindex="5"
                                                        class="btn btn-primary ml-1">Cancel</a>
                                                    
                                                     
                                            
                                                    
                                            </div>
                                        </div>

                                       
                                    </div>
                                </div>
                                </form>
                                <form method="get" action="{{url('ContentsMaster')}}">
                                    <div class="row">
                                        <div class="col-8">
                                             <div class="row">
                                                 <label class="col-md-2 col-form-label" for="customer_name">Search By Content<span class="error">*</span></label>
                                                                      <div class="col-md-4">
                                                                    <input value="{{request()->get('Content')}}" type="text" name="Content" tabindex="5"
                                                                        class="form-control Content" id="Content" onchange="">

                                                                      </div>
                                                                      <div class="col-md-2">
                                                                           <input type="submit" tabindex="6" value="Go"
                                                        class="btn btn-primary btnSubmit" id="btnSubmit"
                                                        onclick="">
                                                                      </div>
                                              </div>
                                        </div>
                                        <div class="col-3 text-end">
                                        </div>
                                        <div class="col-1">
                                            <div class="row">
                                                  <a href="#" class="btn btn-primary float-end" tabindex="7">Export</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
               
                        </div>
                    </div>
                     
                </div>
               
            </div>

                                      
                                         <table class="table-responsive table-bordered">
                                                <thead>
                                                    
                                                   
                                                    <tr class="main-title text-dark">
                                                        <th class="p-1">ACTION</th>
                                                        <th class="p-1">SL#</th>
                                                        <th class="p-1">Contents</th>
                                                        <th class="p-1">Mode</th>
                                                        <th class="p-1">Active</th>
                                                        <th class="p-1">Created By</th>
                                                        <th class="p-1">Created On</th>

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
                                                @foreach($contents as $key)
                                                <?php $i++;
                                                if($key->Active==1){
                                                    $Active ="YES";
                                                }
                                                else{
                                                     $Active ="NO";
                                                }

                                                if($key->Mode==1){
                                                    $Mode= 'ALL';
                                                }
                                                elseif($key->Mode==2){
                                                     $Mode= 'AIR';
                                                }
                                                elseif($key->Mode==3){
                                                     $Mode= 'COURIER';
                                                }
                                                elseif($key->Mode==4){
                                                     $Mode= 'ROAD';
                                                }
                                                elseif($key->Mode==5){
                                                     $Mode= 'TRAIN';
                                                }
                                                 ?>
                                                
                                                
                                                
                                              
                                                <tr>
                                                    <td class="p-1"> <a href="javascript:void(0)" onclick="getDetailsView('{{$key->id}}')">View</a>| <a href="javascript:void(0)" onclick="getDetailsEdit('{{$key->id}}')">Edit</a></td>
                                                    <td class="p-1">{{$i}} </td>
                                                    <td class="p-1">{{$key->Contents}} </td>
                                                    <td class="p-1">{{ $Mode}}</td>
                                                    <td class="p-1">{{$Active}}</td>
                                                    <td class="p-1">{{$key->userDatasDetails->name}}</td>
                                                    <td class="p-1">{{$key->Created_At}}</td>
                                                   
                                                </tr>
                                                @endforeach
                                               
                                               
                                               
                                              
                                            </tbody>
                                          </table> 

                                          <div class="col-md-12">
                                            <div class="d-flex d-flex justify-content-between">
                                             {{ $contents->appends(Request::except('page'))->links() }}

                                            </div>
                                         </div>
                                        
                            

</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    
    function getDetailsEdit(id)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ContentsMasterData',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
         const obj = JSON.parse(data);
        if(obj.status==1)
        {
            
            $('#Id').val(obj.datas.id);
            $('#contents').val(obj.datas.Contents);
            $('#mode').val(obj.datas.Mode).trigger('change');
             $('#contents').prop("readonly",false);
             $('#mode').prop("disabled",false);
             $(".btnSubmit").prop("disabled",false);
             return false;
        }
     
       }
     });
    }
   



    function getDetailsView(id)
{
    var base_url = '{{url('')}}';
   
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ContentsMasterData',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status==1)
        {
            
            $('#Id').val(obj.datas.id);
            $('#contents').val(obj.datas.Contents);
            $('#mode').val(obj.datas.Mode).trigger('change');
             $('#contents').prop("readonly",true);
             $('#mode').prop("disabled",true);
             $(".btnSubmit").prop("disabled",true);
            return false;
        }

       }
     });
}

function SaveDataContents()
{
    


     var Id =$('#Id').val();
    if($('#contents').val()=='')
    {
       alert('Please Enter Contents');
       return false; 
    }
    if($('#mode').val()=='')
    {
       alert('Please Enter Mode');
       return false; 
    }
    var contents=$('#contents').val();
    var mode=$('#mode').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ContentsMasterPost',
       cache: false,
       data: {
           'Id':Id,'contents':contents,'mode':mode
       },
       success: function(data) {
        alert(data);
        location.reload();
       }
     });
}

    </script>
             
    