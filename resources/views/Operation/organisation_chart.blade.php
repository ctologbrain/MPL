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
                                               
                                                  <!-- <div class="part_1"> 
                                                    <h5 class="level-1 rectangle">MLPL0014</h5>
                                                    <h5 class="level-11 rectangle">RINKU VISKARMA(BHOPAL)</h5>
                                                  </div>
                                            

                                                <div class="part_2">
                                                        <h5 class="level-1 rectangle">MLPL0024</h5>
                                                        <h5 class="level-11 rectangle">MANGAL GUPTA(RAIPUR)</h5>
                                                </div> -->
                                             <?php $i=0; ?>
                                              @foreach($parentEmployee as $parent)
                                                <div class="part_3" style="margin-right:200px;">
                                                <h5 class="level-1 rectangle">@isset($parent->EmployeeCode) {{$parent->EmployeeCode}} @endisset</h5>
                                                <ol style=" display:flex;" class="p-2">
                                                
                                                 <?php $childName = explode("-",$ChildrenEmployee[$i]->ParentsChild); 
                                                 $ChildCode = explode("-",$ChildrenEmployee[$i]->ChildCode);
                                                 $ChildOffice = explode("-",$ChildrenEmployee[$i]->ChildOffice);
                                                 ?>
                                                 @if(!empty($childName))
                                                 @for($j=0; $j< count($childName); $j++)
                                                      <li class="m-2">
                                                          <h5 class="level-11 rectangle"> @isset($childName[$j]) {{$childName[$j]}} @endisset @isset($ChildOffice[$j]) ({{$ChildOffice[$j]}}) @endisset</h5>
                                                          
                                                      </li>
                                                  @endfor  
                                                  @endif   
                                                        </ol>
                                              
                                                </div>
                                                <?php $i++; ?>
                                                @endforeach


                                                <!-- <div class="part_4" class="ms-3">
                                                <h5 class="level-1 rectangle">MLPL0024</h5>
                                                <ol style=" display:flex;" class="p-2">
                                                      <li class="m-2">
                                                          <h5 class="level-11 rectangle">BRIJINDER SINGH(RAJPURA)</h5>
                                                          
                                                        </li>
                                                         <li class="m-2">
                                                          <h5 class="level-11 rectangle">MOHAMMAD ASSHI(LUCKNOW)</h5>
                                                          
                                                       </li>
                                                            <li class="m-2">
                                                          <h5 class="level-11 rectangle">RAHUL MISHRA(KANPUR)</h5>
                                                          
                                                        </li> 
                                                        </ol>
                                              
                                                </div> -->


                                                 <!-- <div class="part_4">

                                                  <ol class="level-4-wrapper">
                                                    <li>
                                                       <h5 class="level-2 rectangle">MLPL055</h5>
                                                      <ol class="level-4-wrapper">
                                                        <li>
                                                          <h5 class="level-4 rectangle">RNAJEET KUMAR(RANGPURI-DELHI)</h5>
                                                          <ol class="">
                                                        <li>
                                                          <h5 class="level-5 rectangle">URVINDER SINGH(GHAZIABAD)</h5>
                                                          
                                                        </li>
                                                    </ol>
                                                          
                                                        </li>
                                                      
                                                         <li>
                                                          <h5 class="level-4 rectangle">PANKAJ KUMAR(MAHIPALPUR BRANCH)</h5>
                                                          
                                                        </li>
                                                      </ol> 
                                                    </li>
                                                  </ol>
                                                  </div>  -->
                                                 
                                                  
                                                
                                                


                                                <!-- <div class="part_1 ml-1"> 
                                                    <h5 class="level-1 rectangle">MLPL0632</h5>
                                                    <h5 class="level-11 rectangle">UMESH PAL(NASHIK)</h5>
                                                  </div>    -->
                                                  <!-- <div class="part_1 ml-1"> 
                                                    <h5 class="level-1 rectangle">MPL0012</h5>

                                                    <h5 class="level-12 rectangle">VIKAS KUMAR(PATNA)</h5>
                                                    <ol class="level-6-wrapper">
                                                       
                                                        <li>
                                                          <h5 class="level-6 rectangle">ROHIT KUMAR(PATNA)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">RUPESH(PATNA)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">DHREEJ KUMAR(PATNA)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">VISHAL KUMAR(GHAZIABAD)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">AMERENDRA KUMAR(PATNA)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">HIMASHU KUMAR JHA(GHAZIABAD)</h5>
                                                          
                                                        </li>
                                                         <li>
                                                          <h5 class="level-6 rectangle">SHAILENDRA KUMAR(GHAZIABAD)</h5>
                                                          
                                                        </li>

                                                    </ol>
                                                  </div>    -->

                                                    <!-- <div class="part_2">
                                                        <h5 class="level-1 rectangle">MPL0110</h5>
                                                        <h5 class="level-11 rectangle">VIKRAM SHARMA(BANGULURU)</h5>
                                                </div> -->
                                                <!-- <div class="part_2">
                                                        <h5 class="level-1 rectangle">MLP0140</h5>
                                                        <h5 class="level-11 rectangle">JOY DAS GUPTA(KOLKATA)</h5>
                                                </div>
                                                <div class="part_2">
                                                        <h5 class="level-1 rectangle">MLPL0168</h5>
                                                        <h5 class="level-11 rectangle">ABHIJEET SHARMA(HYDRABAD)</h5>
                                                </div>

                                                 <div class="part_2">
                                                        <h5 class="level-1 rectangle">MPL0206</h5>
                                                        <h5 class="level-11 rectangle">RAJEEV(BANGULURU)</h5>
                                                </div>  

                                                <div class="part_1 ml-2"> 
                                                    <h5 class="level-1 rectangle">MPL00227</h5>

                                                     <ol class="level-7-wrapper">
                                                       
                                                        <li>
                                                          <h5 class="level-9 rectangle">KALPANA BISHT(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class=""></h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class=""></h5>
                                                          
                                                        </li>
                                                          <li>
                                                          <h5 class="level-8 rectangle">ROHIT KALRA(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>

                                                          <h5 class=""></h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class=""></h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class=""></h5>
                                                          
                                                        </li>
                                                         <li>
                                                          <h5 class="level-9 rectangle">ZIAUDIN(HO - DELHI)</h5>
                                                          
                                                        </li>

                                                    </ol>
                                                    <ol class="level-8-wrapper">
                                                       
                                                        <li>
                                                          <h5 class="level-6 rectangle">MUSKAN SHARMA(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">BHARTI NAGPAL(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">SOUMYA(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">SUMAN SINGHAL(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">JITESH KUMAR JHA(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">DIPANWITA SINHA(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                         <li>
                                                          <h5 class="level-6 rectangle">SHAHNAJ KHATOON(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">PANKAJ SHAW(HO - DELHI)</h5>
                                                          
                                                        </li>
                                                        <li>
                                                          <h5 class="level-6 rectangle">ROHIT SAMAL(HO - DELHI)</h5>
                                                          
                                                        </li>

                                                    </ol>
                                                  </div>   

                                                   <div class="part_2">
                                                        <h5 class="level-1 rectangle">MLP0286</h5>
                                                        <h5 class="level-11 rectangle">PRIYANSHU YADAV(BHOPAL)</h5>
                                                </div>
                                                <div class="part_2">
                                                        <h5 class="level-1 rectangle">MLPL0370</h5>
                                                        <h5 class="level-11 rectangle">RAGHVENDRA(BHIWANDI)</h5>
                                                </div>

                                                 <div class="part_4">

                                                
                                                       <h5 class="level-2 rectangle">MPL0784</h5>
                                                      <ol class="level-10-wrapper">
                                                        <li>
                                                          <h5 class="level-10 rectangle">RAKESH KUMAR JHA(HYDRABAD)</h5>
                                                         </li>
                                                        <li>
                                                          <h5 class="level-10 rectangle">SHUBHAM PANDEY(HYDRABAD)</h5>
                                                          
                                                        </li>

                                                    
                                                     </ol>
                                                  </div> 


                                                  <div class="part_4">

                                                
                                                       <h5 class="level-2 rectangle">MPL0873</h5>
                                                      <ol class="level-1_1-wrapper">
                                                        <li>
                                                          <h5 class="level-1_1 rectangle">SHAHRUKH KHAN(JAIPUR)</h5>
                                                         </li>
                                                        <li>
                                                          <h5 class="level-1_1 rectangle">RAVI(FARIDABAD)</h5>
                                                          
                                                        </li>
                                                         </li>
                                                        <li>
                                                          <h5 class="level-1_1 rectangle">ROSHNI MOURYA(VARANASI)</h5>
                                                          
                                                        </li>
                                                         </li>
                                                        <li>
                                                          <h5 class="level-1_1 rectangle">GAURAV YADAV(BILASPUR HARYANA)</h5>
                                                          
                                                        </li>
                                                         </li>
                                                        <li>
                                                          <h5 class="level-1_1 rectangle">AMIT KUMAR(BILASPUR HARYANA)</h5>
                                                          
                                                        </li>

                                                    
                                                     </ol>
                                                  </div>  -->




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
             
    