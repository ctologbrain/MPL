<style>
.main-title {
    background-color: #825d5d42;
    padding: 0px 10px;
    align-items: center;
    color: #000;
    
}
</style>
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
             <td class="p-1"> <input type="checkbox" class="form-data check" id="Check{{$i}}"  @if(isset($key->DocketNo)) value="{{$key->DocketNo}}" @endif></td>
             <td class="p-1"> @if(isset($key->DocketNo)) <a href="{{url('docketTracking?docket='.$key->DocketNo)}}">{{$key->DocketNo}}</a> @endif</td>
             <td class="p-1">  @if(isset($key->file))<a target="_blank" href="{{url($key->file)}}">View</a>  @endif</td>
             
           </tr>
           
           @endforeach
           
         </tbody>
        </table>