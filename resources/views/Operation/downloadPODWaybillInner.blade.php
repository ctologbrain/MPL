<style>
.main-title {
    background-color: #825d5d42;
    padding: 0px 10px;
    align-items: center;
    color: #000;
    
}
</style>
<div class="row pl-pr">
<div class="col-4">
                                            </div>
                                            <div class="col-4">
                                            </div>
                                             <div class="col-4 m-b-1 text-end">
                                                    <input type="button" tabindex="5" value="Download" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="genratePod()">
                                            </div>
                                            </div>
                                          
<table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr class="main-title">
            
            <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Select All <input onclick="getChecked();" type="checkbox" class="form-data SelectAll" id="SelectAll"> </th>
            <th style="min-width:150px;" class="p-1">Docket No.</th>
            <th style="min-width:160px;" class="p-1">View</th>
           
           
          
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
            @foreach($DocketRecordImage as $key)
           
             <?php 
             $i++; ?>
            
            <tr>
             <td class="p-1">{{$i}}</td>

             <td class="p-1"> <input type="checkbox" class="form-data check" id="Check{{$i}}" name="docketImage"  @if(isset($key->Docket_No)) value="{{$key->Docket_No}}" @endif></td>
             <td class="p-1"> @if(isset($key->Docket_No)) <a href="{{url('docketTracking?docket='.$key->Docket_No)}}">{{$key->Docket_No}}</a> @endif</td>
             

             <td class="p-1">  @if(isset($key->file))<a target="_blank" href="{{url($key->file)}}">View</a>  @endif</td>
             
           </tr>
           
           @endforeach
           
         </tbody>
        </table>
        <script>
          function genratePod()
          {
            var checkboxValues = [];
      $('input[name=docketImage]:checked').map(function() {
            checkboxValues.push($(this).val());
      });
      if(checkboxValues.length==0)
      {
        alert('please Select Any Checkbox');
        return false;
      }
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/DownloadZipofPod',
       cache: false,
       data: {
           'checkboxValues':checkboxValues
       },
       success: function(data) {
         if(data=='false')
         {
           alert('some eroor');
           return false;
         }
         else
         {
          alert('Sucessfully download');
          //window.open(data,'_blank');
         }
       
       }
       
     });
          }
        </script>