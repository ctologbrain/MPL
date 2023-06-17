@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   <input type="checkbox" name="archive_data" class="archive_data" id="archive_data"> From Archive Data
                </div>
                <h4 class="page-title">ORGANISATION CHART</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
   
     
<div class="row">
        <div class="col-xl-12">
            <div class="card organisation_chart_container">
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="d-flex">
                                            <div class="organisation_chart">
                                               
                                                  
                                             <?php $i=0; ?>
                                              @foreach($parentEmployee as $parent)
                                                <div class="part_3" style="margin-right:200px;">
                                                <h5 class="level-1 rectangle">@isset($parent->EmployeeCode) {{$parent->EmployeeCode}} @endisset</h5>
                                                <ol style=" display:flex;" class="p-2">
                                                
                                                 <?php $childName = isset($ChildrenEmployee[$i]->ParentsChild)? explode("-",$ChildrenEmployee[$i]->ParentsChild):[]; 
                                                 $ChildCode = isset($ChildrenEmployee[$i]->ChildCode)? explode("-",$ChildrenEmployee[$i]->ChildCode) :[];
                                                 $ChildOffice = isset($ChildrenEmployee[$i]->ChildOffice)? explode("-",$ChildrenEmployee[$i]->ChildOffice):[];
                                                 ?>
                                                 @if(!empty($childName))
                                                 @for($j=0; $j< count($childName); $j++)
                                                      <li class="m-2">
                                                          <h5 class="level-11 rectangle">@isset($childName[$j]) {{$childName[$j]}} @endisset
                                                          <br>
                                                          @isset($ChildOffice[$j]) ({{$ChildOffice[$j]}}) @endisset</h5>
                                                          
                                                      </li>
                                                  @endfor  
                                                  @endif   
                                                        </ol>
                                              
                                                </div>
                                                <?php $i++; ?>
                                                @endforeach


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
                        <div class="row tabels">
                        </div>
                    </div>
            
            </div> <!-- end card-->
            
                 
                
            </div>
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    
</script>
             
    