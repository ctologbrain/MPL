<?php
namespace App\Http\Controllers\Cash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use DB;
use Session;
use App\Models\Cash\CashManager;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\common;
use Auth;
class CashManagment extends Controller
{
	public $imp;
	function __construct()
	{
		
    $this->cash=new CashManager();
    $this->cmm=new common();
		

	}
  public function CashDashboard(Request $req)
  {
   
      $depo='';
     $ExpDetail=$this->cash->getTotalExpAndCash($depo); 
     $CashList=$this->cash->SumExpAndCash($depo); 
     return view('Cash.Impdashboard', [
      'title'=>'Cash Dashbaord',
      'ExpDetail'=>$ExpDetail,
      'CashList'=>$CashList
      
  ]);
    //  $vars['title'] ='Balance Details';
    //  $vars['contentView'] ='admin/CashManagment/Impdashboard';
    //  return view('admin/inner_template1',$vars);
    
  }
  public function DownloadCash(Request $req)
  {
    if(Session::get("id")->Last_Name=='6'){
        $depo='';
        }
        else{
          $depo=Session::get("id")->Last_Name;
        }
          $timestamp = date('Y-m-d');
          $filename = 'CashSheet' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                   <tr bgcolor="#97b8d4">
                   <th width="10%">Office Name</th>
                   <th width="10%">Expensses</th>
                   <th width="10%">In Hand</th>
                   <th width="10%">Budget</th>';
                   $download=$this->cash->getTotalExpAndCash($depo);        
                   foreach ($download as $key => $value) 
                   {
                    $total=$value->TotalCredit-$value->TotalDebit;
                      echo '<tr>'; 
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo   '<td>'.$value->TotalDebit.'</td>';
                      echo   '<td>'.$total.'</td>';
                      echo   '<td>'.$value->Budget.'</td>';
                      echo  '</tr>';

                    }
                    echo   '</tbody>
                          </table>';
                         exit();      

  }
  public function CashTransfer(Request $req)
  {
   $UserId = Auth::id();
  $Office = OfficeMaster::get();
  $HOAmount =$this->cash->getTotalExpAndCashById(1);
  $depoId = employee::leftjoin("office_masters","office_masters.id","employees.OfficeName")->Select('office_masters.id as OID','office_masters.OfficeName','office_masters.OfficeCode')->where("employees.user_id", $UserId)->first();
  $logDepo =$this->cash->getTotalExpAndCashById($depoId->OID);
     return view('Cash.CashTransfer',[
      'title'=>'CASH TRANSFER',
       'depoId' => $depoId->OID ,
       'HOAmount' => $HOAmount,
       'getAllDepo' => $Office,
       'logDepo'=> $logDepo->TotalCredit-$logDepo->TotalDebit
     ]);
  }
  public function GetFormDepoAmount(Request $req)
  {
    $depoCash=$this->cash->getTotalExpAndCashById($req->FDepoId); 
     if(isset($depoCash->TotalCredit))
     {
      echo $total=$depoCash->TotalCredit-$depoCash->TotalDebit;
     }
     else
     {
      echo $total=0;
     }
  }
  public function PostCashEntry(Request $req)
  {
    
     $responseArray   = array();
     $value = Session::get('id');
       $getLastCreditToDepo=$this->cash->getLastCredit($req->ToDepoId);
     if(isset($getLastCreditToDepo->Balance))
     {
      $balance1=$getLastCreditToDepo->Balance;
     }
     else
     {
      $balance1=0;
     }
     $depoName=$this->cash->getDepoName($req->formDepo);
     $ToDepoArray=array(
     'DipoId'=>$req->ToDepoId,
     'Creadit'=>$req->Amount,
     'Date'=>date("Y-m-d",strtotime($req->Tdate)),
     'TYpe'=>1,
     'Remark'=>$req->Remark,
     'CreatedBy'=>$value->User_ID,
     'PaymentMode'=>$req->Mode,
     'Title'=>'Cash Received From '.$depoName->DepoName,
     'AdviceNo'=>rand(11111,99999),
      'Balance'=>$balance1+$req->Amount,
    );
     $this->cmm->insert('ImpTransactionDetails',$ToDepoArray);
     $getLastCreditFromDepo=$this->cash->getLastCredit($req->formDepo);
     if(isset($getLastCreditFromDepo->Balance))
     {
      $balance=$getLastCreditFromDepo->Balance;
     }
     else
     {
      $balance=0;
     }
     $FromDepoArray=array(
     'DipoId'=>$req->formDepo,
     'Debit'=>$req->Amount,
     'Date'=>$req->Tdate,
     'TYpe'=>2,
     'Remark'=>$req->Remark,
     'CreatedBy'=>$value->User_ID,
     'PaymentMode'=>$req->Mode,
     'Title'=>'Cash Transfer To HO',
     'AdviceNo'=>rand(11111,99999),
     'Balance'=>$balance-$req->Amount,
    );
      $this->cmm->insert('ImpTransactionDetails',$FromDepoArray);
      $req->session()->flash('status', 'Amount Added Successfully');
      echo json_encode($responseArray);
     
  }
  public function CashDepositHo(Request $req)
  {
    $UserId = Auth::id();
    $getAllDepo= OfficeMaster::get();
    $depoId = employee::leftjoin("office_masters","office_masters.id","employees.OfficeName")->Select('office_masters.id as OID','office_masters.OfficeName','office_masters.OfficeCode')->where("employees.user_id", $UserId)->first();
    $logDepo =$this->cash->getTotalExpAndCashById($depoId);
    $HOAmount=$logDepo->TotalCredit-$logDepo->TotalDebit;
   
    return view('Cash.CashDepositHo', [
     'title'=>'Cash Dashbaord',
     'getAllDepo'=>$getAllDepo,
     'HOAmount'=>$HOAmount,
      'depoId'=>$depoId->OID
    ]);
   }
  public function PostCashDepostHO(Request $req)
  {
     $getLastCreditDepo=$this->cash->getLastCredit($req->ToDepoId);
     if(isset($getLastCreditDepo->Balance))
     {
      $balance=$getLastCreditDepo->Balance;
     }
     else
     {
      $balance=0;
     }
     $responseArray   = array();
     $UserId=Auth::id();
    
     $ToDepoArray=array(
     'DipoId'=>$req->ToDepoId,
     'Creadit'=>$req->Amount,
     'Date'=>date("Y-m-d",strtotime($req->Tdate)),
     'TYpe'=>1,
     'CreatedBy'=>$UserId,
     'AdviceNo'=>rand(11111,99999),
     'Title'=>'Cash Deposit at Self',
     'Balance'=>$balance+$req->Amount,
     'Remark'=>$req->Remark,
      'Tripno'=>$req->Tripno,
      'vehicle'=>$req->Vehicle
      ); 
     $this->cmm->insert('ImpTransactionDetails',$ToDepoArray);
      $req->session()->flash('status', 'Amount Added Successfully');
      echo json_encode($responseArray);
  }
  public function AdvancePayout(Request $req)
  {
     $vars['title'] =' Advance Payout';
     $getAllDepo = OfficeMaster::get();
     
      $HOAmount =$this->cash->getTotalExpAndCashById(1);
      $logDepo =$this->cash->getTotalExpAndCashById(1);
      return view('Cash.AdvancePayout', [
       'title'=>'Advance Payout',
       'getAllDepo'=>$getAllDepo,
       'HOAmount'=>$HOAmount,
       'depoId'=>'',
        'logDepo'=>$logDepo->TotalCredit-$logDepo->TotalDebit
     ]);
  }
  public function PostAdvancePayout(Request $req)
  {
     $getLastCreditFromDepo=$this->cash->getLastCredit($req->FromDepoid);
     if(isset($getLastCreditFromDepo->Balance))
     {
      $balance=$getLastCreditFromDepo->Balance;
     }
     else
     {
      $balance=0;
     }
      $depoName=$this->cash->getDepoName($req->ToDepo);
     $responseArray   = array();
     $UserId=Auth::id();
     $ToDepoArray=array(
     'DipoId'=>$req->FromDepoid,
     'Debit'=>$req->Amount,
     'Date'=>date("Y-m-d",strtotime($req->Tdate)),
     'TYpe'=>2,
     'Remark'=>$req->Remark,
     'CreatedBy'=>$UserId,
     'AccType'=>$req->AccType,
     'PaymentMode'=>$req->Mode,
     'Title'=>'Cash Transfer To '.$depoName->DepoName,
     'Balance'=>$balance-$req->Amount,
     'AdviceNo'=>rand(22222,99999),
    );
     $this->cmm->insert('ImpTransactionDetails',$ToDepoArray);
      $getLastCreditToDepo=$this->cash->getLastCredit($req->ToDepo);
     if(isset($getLastCreditToDepo->Balance))
     {
      $balance1=$getLastCreditToDepo->Balance;
     }
     else
     {
      $balance1=0;
     }
     
     $FromDepoArray=array(
     'DipoId'=>$req->ToDepo,
     'Creadit'=>$req->Amount,
     'Date'=>$req->Tdate,
     'TYpe'=>1,
     'Remark'=>$req->Remark,
     'AccType'=>$req->AccType,
     'CreatedBy'=>$UserId,
     'PaymentMode'=>$req->Mode,
     'Title'=>'Cash Received From HO',
     'AdviceNo'=>rand(22222,99999),
     'Balance'=>$balance1+$req->Amount,
    );
      $this->cmm->insert('ImpTransactionDetails',$FromDepoArray);
      $req->session()->flash('status', 'Amount Added Successfully');
      echo json_encode($responseArray);
  }
  public function ExpenseClaimed(Request $req)
  { $UserId=Auth::id();
    $depoId=employee::leftjoin("office_masters","office_masters.id","employees.OfficeName")->Select('office_masters.id as OID','office_masters.OfficeName','office_masters.OfficeCode')->where("employees.user_id", $UserId)->first();
     $logDepo =$this->cash->getTotalExpAndCashById($depoId);
     $Last =$this->cash->getLastId();
      if(isset($Last->id)){
        $advicNO = 'ADVI000'.intval($Last->id+1);
      
     }
     else{
      $advicNO = 'ADVI001';
     }
     return view('Cash.ExpenseClaimed', [
      'title'=>'Expense Claimed',
      'getAllDepo'=>OfficeMaster::get(),
      'DebitResion'=>$this->cash->GetAllDebitReason(),
       'HOAmount'=>$this->cash->getTotalExpAndCashById(1),
       'depoId'=> $depoId,
       'logDepo'=>$logDepo->TotalCredit-$logDepo->TotalDebit,
      'Last'=>  $advicNO

     ]);
  }

  public function ExpenseClaimedPOST(Request $req)
  { 
 
    
     $isExist=$this->cash->issetAdviceNo($req->AdviceNo);
     if(!empty($isExist)){
       $AdviceNo = 'ADVI00'.intval($req->AdviceNo+2);
     }
     else{
      $AdviceNo = $req->AdviceNo;
     }
       $UserId=Auth::id(); 
      foreach($req->Expenses as $value)
      {
        $getLastCreditFromDepo=$this->cash->getLastCredit($req->OffcieName);
        if(isset($getLastCreditFromDepo->Balance))
        {
         $balance=$getLastCreditFromDepo->Balance;
         
        }
        else
        {
         $balance=0;
        }
        $ToDepoArray=array(
        'DipoId'=>$req->OffcieName,
        'AdviceNo'=>$AdviceNo,
        'Debit'=>$value['amount'],
        'Date'=>date("Y-m-d",strtotime($req->Advicedate)),
        'TYpe'=>2,
        'Remark'=>$value['REfrenceName'],
        'ExpRemark'=>$req->Reamrk,
        'Parent'=>$value['Parent'],
        'FromDate'=>date("Y-m-d",strtotime($value['FromDate'])),
        'ToDate'=>date("Y-m-d",strtotime($value['ToDate'])),
        'CreatedBy'=>$UserId,
        'AccType'=>$req->ClaimType,
        'Debit_Reason'=>$value['Exp'],
        'Reason'=>$value['REfrenceType'],
        'Title'=>'Expense Claim',
        'Balance'=>$balance-$value['amount'],
        'vehicle'=>$req->Vehicle,
         'Tripno'=>$req->Tripno
       ); 
      
        $file=$req->file('Image2');
         if(isset($file) && $file !='')
         {
             $image = $file;
             $filePath = public_path('BillS');
             $nexten= $image->getClientOriginalName();
             $Cfiles = pathinfo($nexten, PATHINFO_EXTENSION);
            
           if($Cfiles=='jpeg' || $Cfiles=='jpg'|| $Cfiles=='png' || $Cfiles=='JPEG' || $Cfiles=='JPG'|| $Cfiles=='PNG')
             {
                $input['imagename'] = $nexten;
                $img = Image::make($image->path());
                $img->resize(400, 400, function ($const) {
                 $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);
               $ToDepoArray['Bill_Image']='public/BillS/'.$input['imagename'];
            
            
             }
             else
             {
                $destinationPath = 'public/BillS/';
                 $new_file_name = $value->getClientOriginalName();
                 $moved = $value->move($destinationPath,$new_file_name);
                $ToDepoArray['Bill_Image']=$moved;
            
            
              }
          
          }
         $this->cmm->insert('ImpTransactionDetailsExp',$ToDepoArray);
     
      } 
      echo json_encode(array('Status'=>'Amount Added Successfully'));
     
    //  }
    //  else{
    //  echo json_encode(array('Status'=>'Amount Added Successfully'));
      //  $req->session()->flash('status', 'Advice No already exist Please Refrash page');

    //}
    

  }





  public function ExpenseClaimedEdit(Request $req)
  {
     if($req->_token)
     {

       $session = Session::get('id');
       $condition = array('AdviceNo' =>$req->AdviceNo);
       $this->cmm->delete_data('ImpTransactionDetails',$condition);
       foreach($req->Expenses as $value)
       {
         $ToDepoArray=array(
         'DipoId'=>$req->OffcieName,
         'AdviceNo'=>$req->AdviceNo,
         'Debit'=>$value['amount'],
         'Date'=>$req->Advicedate,
         'TYpe'=>2,
         'Remark'=>$value['REfrenceName'],
         'Parent'=>$value['Parent'],
         'FromDate'=>$value['FromDate'],
         'ToDate'=>$value['ToDate'],
         'Remark'=>$value['REfrenceName'],
         'CreatedBy'=>$session->User_ID,
         'AccType'=>$req->ClaimType,
         'Debit_Reason'=>$value['Exp'],
         'Reason'=>$value['REfrenceType'],
         'Title'=>'Expense Claim',
         'Balance'=>$value['balance']
        );
         $file=$req->file('Image2');
          if(isset($file) && $file !='')
          {
              $image = $file;
              $filePath = public_path('BillS');
              $nexten= $image->getClientOriginalName();
              $Cfiles = pathinfo($nexten, PATHINFO_EXTENSION);
             
            if($Cfiles=='jpeg' || $Cfiles=='jpg'|| $Cfiles=='png' || $Cfiles=='JPEG' || $Cfiles=='JPG'|| $Cfiles=='PNG')
              {
                 $input['imagename'] = $nexten;
                 $img = Image::make($image->path());
                 $img->resize(400, 400, function ($const) {
                  $const->aspectRatio();
                 })->save($filePath.'/'.$input['imagename']);
                $ToDepoArray['Bill_Image']='public/BillS/'.$input['imagename'];
             
             
              }
              else
              {
                 $destinationPath = 'public/BillS/';
                  $new_file_name = $value->getClientOriginalName();
                  $moved = $value->move($destinationPath,$new_file_name);
                 $ToDepoArray['Bill_Image']=$moved;
             
             
               }
           
           }
           if(isset($value['amount']) && $value['amount'] !='')
           {
             $this->cmm->insert('ImpTransactionDetails',$ToDepoArray);
           }
         
       
       }
        $req->session()->flash('status', 'Amount Added Successfully');
         return redirect('webadmin/ExpenseClaimedEdit/');
     }
      
     $vars['title'] =' Expense Claimed Edit';
     $vars['getAllDepo'] =$this->cash->GetAllDipo();
     $vars['DebitResion'] =$this->cash->GetAllDebitReason();
     $vars['HOAmount'] =$this->cash->getTotalExpAndCashById(6);
     $vars['Last'] =$this->cash->getLastId();
     $vars['contentView'] ='admin/CashManagment/ExpenseClaimedEdit';
     return view('admin/inner_template1',$vars);
  }
  public function GetAdviceDetails(Request $req)
  {
    $Advice=$this->cash->GetAdviceDetails($req->AdviceNo);
     if(isset($Advice->AdviceNo) && $Advice->AdviceNo !='')
     {
        echo json_encode($Advice);
     }
     else
     {
      return 'false';
     }
  }
  public function GetAdviceDetailsInner(Request $req)
  {
    $vars['getAllDepo'] =$this->cash->GetAllDipo();
    $vars['DebitResion'] =$this->cash->GetAllDebitReason();
    $vars['HOAmount'] =$this->cash->getTotalExpAndCashById(6);
    $vars['Last'] =$this->cash->getLastId();
    $vars['Adv']=$req->AdviceNo;
    $vars['AdviceDet']=$this->cash->GetAdviceDetails($req->AdviceNo);
    $vars['InnerAdvice']=$this->cash->GetAdviceDetailsInner($req->AdviceNo);
    return view('admin/CashManagment/ExpenseClaimedEditInner',$vars);
  }
  public function DeleteLaneImapress(Request $req)
  {
      $condition = array('id' =>$req->id);
      $this->cmm->delete_data('ImpTransactionDetails',$condition);
  }
  public function ExpenseCancle(Request $req)
  {
    $vars['title'] =' Expense Cancle';
    $vars['getAllDepo'] =$this->cash->GetAllDipo();
    $vars['DebitResion'] =$this->cash->GetAllDebitReason();
    $vars['HOAmount'] =$this->cash->getTotalExpAndCashById(6);
    $vars['Last'] =$this->cash->getLastId();
    $vars['Adv']=$req->AdviceNo;
    $vars['InnerAdvice']=$this->cash->GetAdviceDetailsInner($req->AdviceNo);
    $vars['contentView'] ='admin/CashManagment/ExpenseCancle';
    return view('admin/inner_template1',$vars);
    
  }
  public function CancleAdvice(Request $req)
  {
           $responseArray   = array();
             $arrayupdate=array(
              'ExpStatus'=>2,
                );
             $condition=array('AdviceNo'=>$req->AdviceNo);
             $this->cmm->update_data('ImpTransactionDetails',$arrayupdate,$condition);
           $req->session()->flash('status', 'Advice No Canclled Successfully');
           echo json_encode($responseArray);
  }
  public function CashLedger(Request $req)
  { 
    $post_value = $req->input();
  
        $depo='';
    $date=[];
  $transMod='';
    if($req->depo)
    {
      $depo.=$req->depo;
    }
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
     if($req->transMod)
    {
      $transMod .=$req->transMod;
    }
    $vars['depo'] =$this->cash->GetAllDipo();
    $vars['title'] =' Imprest Ladger';
    if(isset($req->from) && $req->from !='' && $req->to !='')
    {
    $vars['getAllDepo'] =$this->cash->GetAllImpDetails($depo,$date,$transMod); 
    $vars['TotalVlaue'] =$this->cash->getTotalCashLedger($depo,$date,$transMod);
    $vars['TotalBalance'] =$this->cash->getTotalBalance($depo,$date,$transMod);
      if($req->sumbit=='Download')
      {
        $datas  =$this->cash->getAllImpDetailsDownload($depo,$date,$transMod);
        $this->downloadCashLedger($datas);
      }
    }
    else
    {
     $vars['getAllDepo'] =[];
    $vars['TotalVlaue'] =[];
    }
    

 
    return view('Cash.CashLedger', [
      'title'=>'Cash Dashbaord',
    ])->with($vars);
  
  }
  public function downloadCashLedger($datas){
    $timestamp = date('Y-m-d');
          $filename = 'ImprestLadger' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th width="9%">Activity Date</th>
                    <th width="30%">Particulars</th>
                    <th width="10%">Voucher Type</th>
                    <th width="8%">Voucher No</th>
                    <th width="8%">Debit</th>
                    <th width="8%">Credit</th>
                    <th width="8%">Balance</th>
                    <th width="9%">Entry Date</th>
                    <th width="9%">Transfer Mode</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo '<td>';
                      if($value->TYpe==2){
                      echo '<b>'.$value->Title.'</b>';
                        if($value->Title=="Expense Claim"){
                            $Advice=DB::table('ImpTransactionDetails')
                            ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
                            ->select('ImpTransactionDetails.*','Dr1.Reason as DebitReason1')
                            ->where('ImpTransactionDetails.AdviceNo',$value->AdviceNo)->get();
                            foreach($Advice as $sdv){
                              echo '</br><b>'.$sdv->DebitReason1.': </b>'.$sdv->Debit;
                              echo '<br><b> Ref. Type: </b>'.$sdv->Reason;
                              echo '<br><b>Ref No: </b>'.$sdv->Remark;
                              echo '<br><b>Desc: </b>'.$sdv->ExpRemark;
                              echo ' <br><b>Vehicle No.: </b>'.$sdv->vehicle;
                              echo '<br><b>Trip No.: </b>'.$sdv->Tripno ;
                            }
                        }
                        else{
                          echo '<b>'.'Desc : '.'</b>'.$value->Remark.'</br>';
                        }
                      }
                      else{
                       echo   '<b>'.$value->Title.'</b>
                              </br>
                              <b>Desc: </b>'.$value->Remark;
                                if($value->Title=="Cash Deposit at Self"){
                                 echo '<br>
                                  <b>Trip No. : </b>'.$value->Tripno;
                                 echo '<br>
                                  
                                  <b>Vehicle No. : </b>'.$value->vehicle; 
                                  }
                      }
                      echo '</td><td>';
                      if($value->TYpe==2){
                        echo 'Payment';
                      }
                      else{
                       echo 'Receipt';
                      }
                      echo '</td>';
                      echo   '<td>'.$value->AdviceNo.'</td>';
                      echo   '<td>'.$value->TotalDebit.'</td>';
                      echo   '<td>'.$value->TotalCredit.'</td>';
                      $bal=explode("-",$value->TotBalance);
                      echo   '<td>'.min($bal).'</td>';
                      echo   '<td>'.date("d-m-Y", strtotime($value->CreatedDate)).'</td>';
                     echo ' <td>'.$value->PayMode.'</td> ';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }

  public function CashPaymentRegister(Request $req)
  {
    
   
    $post_value = $req->input();
    
        $depo='';
    $date=[];
  
    if($req->depo)
    {
      $depo.=$req->depo;
    }
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
    $vars['depo'] =$this->cash->GetAllDipo();
    $vars['title'] =' Cash Payment Register';
    if(isset($req->from) && isset($req->to) &&  $req->from!='' && $req->to!=''){
      $vars['getAllDepo'] =$this->cash->CashpaymentRegister($depo,$date);
      $vars['TotalVlaue'] =$this->cash->getTotalImpDetails($depo,$date); 
      $vars['post_value'] =$post_value;
      if($req->sumbit=='Download')
      {
        $datas =$this->cash->CashpaymentRegisterDownload($depo,$date);
        $this->downloadCashRegisert($datas);
      }
    }
    else{
    $vars['getAllDepo'] =[];
    $vars['TotalVlaue'] =[];
    
    }
    
    
    $vars['post_value'] =$post_value;
     return view('Cash.CashPaymentRegister', [
      'title'=>'Cash Dashbaord',
    ])->with($vars);
  }
  public function downloadCashRegisert($datas)
  {
    
    $timestamp = date('Y-m-d');
          $filename = 'CashPaymentRegister' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                   <tr>
                    <th width="2%">SL#</th>
                    <th width="9%">Company Name</th>
                    <th width="8%">Claim Type</th>
                    <th width="10%">Office Name</th>
                    <th width="8%">Employee Name</th>
                    <th width="8%">Advice No</th>
                    <th width="8%">Advice Date</th>
                    <th width="9%">Total No Of Expense</th>
                    <th width="9%">Expense Amount</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'Venture Supply Chain Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->AccType.'</td>';
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo   '<td></td>';
                      echo   '<td>'.$value->AdviceNo.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo   '<td>'.$value->TotalCount.'</td>';
                      echo   '<td>'.$value->TotalDebit.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit();    

    
  }
  public function ExpenseRegister(Request $req)
  {
     $post_value = $req->input();
     $depo='';
     $date=[];
     $adviceNo='';
    if($req->depo)
    {
      $depo.=$req->depo;
    }
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
    if($req->advice){
      $adviceNo .= $req->advice;
    }
    $vars['depo'] =$this->cash->GetAllDipo();
    $vars['title'] =' Expense Register';
    if(isset($req->from) && isset($req->to) &&  $req->from!='' && $req->to!=''){
    $check =$vars['getAllDepo']=$this->cash->ExpenseRegister($depo,$date,$adviceNo);
   if(count($check)==0){ 
      $req->session()->flash('status','Record Not Found');
      redirect('/webadmin/ExpenseRegister');
    }
    else{
      $req->session()->flash('status','');
    }
    $vars['TotalVlaue'] =$this->cash->getTotalImpDetails($depo,$date,$adviceNo);
    if($req->sumbit=='Download')
      {
         $datas =$this->cash->ExpenseRegisterDownload($depo,$date,$adviceNo);
        $this->downloadExpenseRegisert($datas);
       
      }
       if($req->sumbit=='DownloadDetail')
      {
        $datas =$this->cash->ExpenseRegisterDownload($depo,$date,$adviceNo);
        $this->downloadExpenseRegisertDetailed($datas);

      }
    }
    else{
      $vars['getAllDepo'] =[];
      $vars['TotalVlaue'] =[];
    } 

    $vars['post_value'] =$post_value;
    return view('Cash.ExpenseRegister', [
      'title'=>'Cash Dashbaord',
    ])->with($vars);
   
    if($req->view=='summary'){
      return view('Cash.ExpenseRegister', [
        'title'=>'Cash Dashbaord',
      ])->with($vars);
       
    }
    elseif($req->view=='detail'){
      return view('Cash.ExpenseRegisterDetails', [
        'title'=>'Cash Dashbaord',
      ])->with($vars);
      
    }
    
   
  }
    public function downloadExpenseRegisert($datas){

      $timestamp = date('Y-m-d');
          $filename = 'ExpenseRegisert' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th style="min-width: 100px;">Company Name</th>
                    <th style="min-width: 50px;">Claim Type</th>
                    <th style="min-width: 50px;">Claim By</th>
                    <th style="min-width: 80px;">Advice Date</th>
                    <th style="min-width: 40px;">Expense Amount</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'Venture Supply Chain Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->AccType.'</td>';
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo   '<td>'.$value->Debit.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 

    }

  public function HeadWiseRegisterNew(Request $req)
  {
  $post_value = $req->input();
  if(Session::get("id")->Last_Name=='6'){
        $depo='';
        }
        else{
          $depo=Session::get("id")->Last_Name;
        }
     $debit_res='';
     $date=[];
  
    if($req->debit_res)
    {
      $debit_res.=$req->debit_res;
    }
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
    $vars['debitR'] =$this->cash->GetAllDebitReason();
    $vars['title'] =' Head Wise Register ';
    $vars['getAllDepo'] =$this->cash->HeadWiseRegisterNew($debit_res,$date,$depo);
    $vars['TotalVlaue'] =$this->cash->getTotalHeadWiseRegister($debit_res,$date,$depo);
    if($req->sumbit=='Download')
      {
         $datas =$this->cash->HeadWiseRegisterNewDownload($debit_res,$date,$depo);
        $this->downloadHeadWiseRegister($datas);

      }
    $vars['post_value'] =$post_value;
    $vars['contentView'] ='admin/CashManagment/HeadWiseRegisterNew';
    return view('admin/inner_template1',$vars);
  }
  public function downloadHeadWiseRegister($datas){
    $timestamp = date('Y-m-d');
          $filename = 'HeadWiseRegister' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                     <th width="8%">Expense Account</th>
                     <th width="8%">Self</th>
                     <th width="9%">Grand Total</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'Venture Supply Chain Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->DebitReason.'</td>';
                      echo   '<td>'.$value->TotalDebit.'</td>';
                      echo   '<td>'.$value->TotalDebit.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }


  public function HeadWiseRegisterModel(Request $req){
      if(Session::get("id")->Last_Name=='6'){
        $depo='';
        }
        else{
          $depo=Session::get("id")->Last_Name;
        }
   $vars["DetailsData"]= $datas=$this->cash->HeadWiseRegisterDetailed($req->id,$depo);
   $vars["formDate"]= $req->formDate;
   $vars["ToDate"]= $req->ToDate;
   $vars["dr"]=$req->id;
   return view('admin/CashManagment/HeadWiseRegisterModel',$vars);
  }
  public function downloadHeadWiseRegisterDetails($id){
     if(Session::get("id")->Last_Name=='6'){
        $depo='';
        }
        else{
          $depo=Session::get("id")->Last_Name;
        }

    $datas= $datas=$this->cash->HeadWiseRegisterDetailed($id,$depo);
      $timestamp = date('Y-m-d');
          $filename = 'HeadWiseRegisterDetails' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th style="min-width:150px;"> Company Name</th>
                     <th style="min-width:130px;"> Claim Type</th>
                    <th style="min-width:130px;"> Office Name</th>
                     <th style="min-width:150px;"> Parent Expense</th>
                    <th style="min-width:150px;">Expense Account</th>
                    <th style="min-width:130px;">Advice Date</th>
                    <th style="min-width:160px;">Advice Number</th>
                    <th style="min-width:130px;">From Date</th>
                    <th style="min-width:130px;">To Date</th>
                    <th style="min-width:130px;">Reference No.</th>
                    <th style="min-width:150px;">Reference Type</th>
                    <th style="min-width:130px;">Amount</th> 
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'Venture Supply Chain Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->AccType.'</td>';
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo   '<td>'.$value->Parent.'</td>';
                      echo   '<td>'.$value->DebitReason.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo   '<td>'.$value->AdviceNo.'</td>';
                      echo   '<td>'.$value->FromDate.'</td>';
                      echo   '<td>'.$value->ToDate.'</td>';
                      echo   '<td>'.$value->Remark.'</td>';
                      echo   '<td>'.$value->Reason.'</td>';
                      echo   '<td>'.$value->Debit.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }

  public function ExpenseRegisterDetails(Request $req)
  {
     $post_value = $req->input();
      if(Session::get("id")->Last_Name=='6'){
        $depo='';
        }
        else{
          $depo=Session::get("id")->Last_Name;
        }
     $date=[];
  
    if($req->depo)
    {
      $depo.=$req->depo;
    }
    
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
    $adviceNo='';
    if($req->advice){
      $adviceNo .= $req->advice;
    }
    
    $depoReq=$req->get('depoSelected');
    if(isset($depoReq) && $req->get('depoSelected') && $depo==''){
       $depo =$depoReq; 
      $val= $post_value= array('depo'=>$depoReq);
      
    }
    $vars['post_value'] =$post_value;
    $vars['depo'] =$this->cash->GetAllDipo();
    $vars['title'] =' Expense Register';
    $vars['getAllDepo']=$this->cash->ExpenseRegister($depo,$date,$adviceNo);

    $vars['TotalVlaue'] =$this->cash->getTotalImpDetails($depo,$date,$adviceNo);
    if($req->sumbit=='Download')
      {
        $datas =$this->cash->ExpenseRegisterDownload($depo,$date,$adviceNo);
        $this->downloadExpenseRegisertDetailed($datas);

      }
    if(count($vars['getAllDepo'])==0 ){ 
      Session::flash('status','Record Not Found');
      redirect(url('/webadmin/ExpenseRegister'));
    }
    
    $vars['contentView'] ='admin/CashManagment/ExpenseRegisterDetails';
    return view('admin/inner_template1',$vars);
  }

  public function downloadExpenseRegisertDetailed($datas){

    $timestamp = date('Y-m-d');
          $filename = 'ExpenseRegisertDetailed' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th style="min-width: 100px;">Company Name</th>
                    <th style="min-width: 50px;">Claim Type</th>
                    <th style="min-width: 50px;">Claim By</th>
                    <th style="min-width: 80px;">Advice No.</th>
                    <th style="min-width: 80px;">Advice Date</th>
                    <th style="min-width: 40px;">Expense Amount</th>
                     <th width="30%">Parent Expense</th>
                     <th width="30%">Expense Type</th>
                      <th style="min-width: 80px;">From Date</th>
                      <th style="min-width: 80px;">To Date</th>
                      <th style="min-width: 80px;">Reference No.</th>
                      <th style="min-width: 80px;">Reference Type</th>
                       <th style="min-width: 80px;">Remark</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'Venture Supply Chain Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->AccType.'</td>';
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo ' <td width="30%">'.$value->AdviceNo.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo   '<td>'.$value->Debit.'</td>';
                       echo   '<td>'.$value->Parent.'</td>';
                       echo   '<td>'.$value->DebitReason.'</td>';
                        echo   '<td>'.$value->FromDate.'</td>';
                        echo   '<td>'.$value->ToDate.'</td>';
                        echo   '<td>'.$value->Reason.'</td>';
                        echo   '<td>'.$value->Remark.'</td>';
                        echo   '<td>'.$value->ExpRemark.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }

  public function CashRequest(){
    $vars['title'] ='Cash Request';
    $vars['depoId'] = $depoId= Session::get("id")->Last_Name;

     $vars['getAllDepo'] =$this->cash->GetAllDipo();
      $vars['HOAmount'] =$this->cash->getTotalExpAndCashById(6);
    $vars['contentView'] ='admin/CashManagment/CashRequest';
    return view('admin/inner_template1',$vars);
  }
  public function PostCashRequest(Request $req){ 
    $responseArray=array();
    $depoId= Session::get("id")->Last_Name;
    if(csrf_token()){
      $postData= array('DepoId'=>$depoId,
        'RequestTo'=>'6',
        'Amount'=>$req->Amount,
        'Remark'=>$req->Remark,
        'Date'=>$req->Tdate,
        'status'=>1,
        'CreatedBy'=>Session::get('id')->User_ID,
        'statusByHo'=>3
      ); 
     $conseq= $this->cmm->insert('CashRequest',$postData); 
      $req->session()->flash('status', 'Request Sent Successfully');
      echo json_encode($responseArray);
    }
  }

  public function CashRequestApproved(Request $req){
     
      $vars['title'] ='Cash Request Approve';
    $vars['post_value'] =  $post_value = $req->input();
    if(Session::get("id")->Last_Name=='6'){
        $depo='';
    }
    else{
      $depo=Session::get("id")->Last_Name;
      
    }
     
     $date=[];
    $status ='';
    if($req->depo)
    {
      $depo.=$req->depo;
    }
    if($req->from)
    {
      $date['formDate']=$req->from;
    }
     if($req->to)
    {
      $date['ToDate']=$req->to;
    }
    if($req->staust){
        $status .=$req->staust;
    }
    if($req->sumbit=='Download'){
      $datas =$this->cash->CashRequestListingDownload($depo,$date,$status);
      $this->downloadCashRequestApproved($datas);
    }
    
     $vars['getAllRequest'] =  $this->cash->CashRequestListing($depo,$date,$status);
      $vars['getAllDepo'] =$this->cash->GetAllDipo();
      $vars['contentView'] ='admin/CashManagment/CashRequestApproved';
      return view('admin/inner_template1',$vars);
  }
  public function PostCashRequestApproved(Request $req){  
        $responseArray=array();
      if(csrf_token()){
        
        $condition=array('id'=>$req->depoId);
        $postData= array(
          'status'=>2,
          'UpdatedBy'=>Session::get('id')->User_ID,
          'RemarkHo'=>$req->RemarkHo,
          'AmountHo'=>$req->AmountHo
        ); 
        if($req->AmountHo==''){
          unset($postData['AmountHo']);
        }

        if($req->RemarkHo==''){
          unset($postData['RemarkHo']);
        }

        if($req->pageReq=='HO'){
          $postData['statusByHo']=4;
        }
        
      $this->cmm->update_data('CashRequest',$postData,$condition);
      
      $req->session()->flash('status', 'Request Approved Successfully');
      echo json_encode($responseArray);
    }
        
      
  }
  public function downloadCashRequestApproved($datas){
      $timestamp = date('Y-m-d');
          $filename = 'CashRequestApproved' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th style="min-width: 100px;">Depo Name</th>
                    <th style="min-width: 50px;">Request Date</th>
                    <th style="min-width: 50px;">Amount</th>
                    <th style="min-width: 80px;">Depo Remark</th>
                    <th style="min-width: 80px;">Ho Remark</th>
                    <th style="min-width: 80px;">Ho Amount</th>
                    <th style="min-width: 40px;">Approved By Manager</th>
                    <th style="min-width: 40px;">Approved By Ho</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.$value->DepoName.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                      echo ' <td width="30%">'.$value->Amount.'</td>';
                      echo   '<td>'.$value->Remark.'</td>';
                      echo   '<td>'.$value->RemarkHo.'</td>';
                       echo   '<td>'.$value->AmountHo.'</td>';
                      if($value->status=='1'){ 
                        echo   '<td>'.'Pending'.'</td>'; 
                      } else { 
                        echo   '<td>'.'Approved'.'</td>';  
                      }  

                      if($value->statusByHo=='3'){ 
                        echo   '<td>'.'Pending'.'</td>'; 
                      } else { 
                        echo   '<td>'.'Approved'.'</td>';  
                      } 
                      
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }






  public function ExpenseRequestApproved(Request $req){
      
        $vars['title'] ='Expense Request Approve';
      $vars['post_value'] =  $post_value = $req->input();
      
       $date=[];
      $status='';
      if($req->depo)
      {
        $depo =$req->depo;
      }
      if($req->from)
      {
        $date['formDate']=$req->from;
      }
       if($req->to)
      {
        $date['ToDate']=$req->to;
      }
      if($req->staust){
        $status .=$req->staust;
      }
      if($req->sumbit=='Download'){
      $datas =$this->cash->ExpenseRequestListingDownload($depo,$date,$status);
      $this->downloadExpenseRequestApproved($datas);
    }
         $depo='';
    
        // $vars['contentView'] ='admin/CashManagment/ExpenseRequestApproved';
        // return view('admin/inner_template1',$vars);
        return view('Cash.ExpenseRequestApproved', [
          'title'=>'Expense Request Approve',
          'getAllDepo'=>$this->cash->GetAllDipo(),
          'getAllRequest'=> $this->cash->ExpenseRequestListing($depo,$date,$status),
          'depoId'=>'',
           
        ]);
    }

    public function PostExpenseRequestApproved(Request $req){  
        $responseArray=array();
      if(csrf_token()){
        
        $condition=array('AdviceNo'=>$req->depoId);
        $postData= array(
          'status'=>2,
          'UpdatedBy'=>Session::get('id')->User_ID,
          'updatedAt'=>date('Y-m-d h:i:s')
        ); 
        $this->cmm->update_data('ImpTransactionDetailsExp',$postData,$condition);
      $wholeDetail= $this->cash->getExpenseRequestApprove($req->depoId); 
      $i=0;
      foreach($wholeDetail as $key){
        $getLastCreditFromDepo=$this->cash->getLastCredit($wholeDetail[$i]->DipoId);
         if(isset($getLastCreditFromDepo->Balance))
         {
          $balance=$getLastCreditFromDepo->Balance;
          
         }
         else
         {
          $balance=0;
         }
       $ToDepoArray=array(
         'DipoId'=>$wholeDetail[$i]->DipoId,
         'AdviceNo'=>$wholeDetail[$i]->AdviceNo,
         'Debit'=>$wholeDetail[$i]->Debit,
         'Date'=>$wholeDetail[$i]->Date,
         'TYpe'=>$wholeDetail[$i]->TYpe,
         'Remark'=>$wholeDetail[$i]->Remark,
         'ExpRemark'=>$wholeDetail[$i]->ExpRemark,
         'Parent'=>$wholeDetail[$i]->Parent,
         'FromDate'=>$wholeDetail[$i]->FromDate,
         'ToDate'=>$wholeDetail[$i]->ToDate,
         'CreatedBy'=>$wholeDetail[$i]->CreatedBy,
         'AccType'=>$wholeDetail[$i]->AccType,
         'Debit_Reason'=>$wholeDetail[$i]->Debit_Reason,
         'Reason'=>$wholeDetail[$i]->Reason,
         'Title'=> $wholeDetail[$i]->Title,
         'Balance'=>$balance-$wholeDetail[$i]->Debit,
         'Bill_Image'=>$wholeDetail[$i]->Bill_Image,
         'vehicle'=>$wholeDetail[$i]->vehicle,
          'Tripno'=>$wholeDetail[$i]->Tripno
        );
       $i++;
       $this->cmm->insert('ImpTransactionDetails',$ToDepoArray);
     }
      

      
      $req->session()->flash('status', 'Request Approved Successfully');
      echo json_encode($responseArray);
    }
        
      
  }

   public function PostExpenseRequestRejected(Request $req){ 
     $responseArray=array();
      if(csrf_token()){
        
        $condition=array('AdviceNo'=>$req->depoId);
        $postData= array(
          'status'=>3,
          'UpdatedBy'=>Session::get('id')->User_ID,
          'updatedAt'=>date('Y-m-d h:i:s')
        ); 
        $this->cmm->update_data('ImpTransactionDetailsExp',$postData,$condition);
          $req->session()->flash('status', 'Request Approved Successfully');
      echo json_encode($responseArray);
      }
   }

  public function downloadExpenseRequestApproved($datas){
        $timestamp = date('Y-m-d');
          $filename = 'ExpenseRequestApproved' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                  <thead>
                  <tr>
                    <th width="2%">SL#</th>
                    <th style="min-width: 250px;">Company Name</th>
                    <th style="min-width: 250px;">Particlars</th>
                    <th style="min-width: 150px;">Claim Type</th>
                    <th style="min-width: 150px;">Claim By</th>
                    <th style="min-width: 150px;">Advice No.</th>
                    <th style="min-width: 150px;">Advice Date</th>
                    <th style="min-width: 150px;">Expense Amount</th>
                    <th style="min-width: 150px;">Parent Expense</th>
                    <th style="min-width: 150px;">Status</th>
                   </tr>';    
                   $i=1;    
                   foreach ($datas as $key => $value) 
                   {
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.'VENTURE SUPPLY Pvt Ltd'.'</td>';
                      echo   '<td>'.$value->AccType.'</td><td>';

        if($value->TYpe==2 ){
         echo   '<b>'.$value->Title.'</b>';
             if($value->Title=="Expense Claim"){

                  $Advice=DB::table('ImpTransactionDetailsExp')
            ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetailsExp.Debit_Reason')
            ->select('ImpTransactionDetailsExp.*','Dr1.Reason as DebitReason1')
            ->where('ImpTransactionDetailsExp.AdviceNo',$value->AdviceNo)->get(); 
               foreach($Advice as $sdv){
              echo'<br>';
              echo '<b>'.$sdv->DebitReason1.' :</b>'.$sdv->Debit;
              echo '<br>';
              echo '<b>Ref. Type: </b>'.$sdv->Reason;
              echo '<br><b>Ref No: </b>'.$sdv->Remark;
              echo '<br><b>Desc: </b>'.$sdv->ExpRemark;
              echo '<br><b>From: </b>'.$sdv->FromDate;
              echo '<br><b>To: </b>'.$sdv->ToDate;
              echo '<div class="border border-light border-bottum w-100"></div>';
              }
            }
            else{
            echo '<br>';//
            echo '<b>Desc : </b>'.$value->Remark;
            echo '<br>';
           }   
        }else {
              echo '<b>'.$value->Title.'</b>';
              echo '<br>';
              echo '<b>Desc: </b>'.$value->Remark;
        }
                      echo '</td> <td width="30%">'.$value->DepoName.'</td>';
                      echo   '<td>'.$value->AdviceNo.'</td>';
                      echo   '<td>'.$value->Date.'</td>';
                       echo   '<td>'.$value->TotDeb.'</td>';
                       echo   '<td>'.$value->Parent.'</td>';
                      if($value->status=='1'){ 
                        echo   '<td>'.'Pending'.'</td>'; 
                      } elseif($value->status=='3') { 
                        echo   '<td>'.'Rejected'.'</td>';  
                      }
                      else{
                        echo   '<td>'.'Approved'.'</td>';  
                      }    
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
  }


}