<?php

namespace App\Models\Cash;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Pagination\Paginator;

class CashManager extends Model
{
	public function getTotalExpAndCash($depo)
	{
		return  DB::table('ImpTransactionDetails')
		->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		  ->select(DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'),'office_masters.OfficeName' ,'office_masters.OfficeCode')
		  ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		  ->groupBy('ImpTransactionDetails.DipoId')
		  ->get();
	}
	public function SumExpAndCash($depo)
	{
		return  DB::table('ImpTransactionDetails')
		 ->select(DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'))
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		  ->first();
	}
	public function getTotalExpAndCashById($depo)
	{
		return  DB::table('ImpTransactionDetails')
		 ->select(DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'))
		 ->where('ImpTransactionDetails.DipoId',$depo)
		  ->first();
	}
	public function GetAllDipo()
	{
		return DB::table('DepoMaster')->get();
	}
public function GetAllDebitReason()
{
	return DB::table('DebitReason')->where('DebitReason.Type',1)->get();
}
public function getLastId()
{
	return  DB::table('ImpTransactionDetailsExp')->select('id')->orderBy('id','DESC')->first();
}
public function GetAdviceDetails($advNo)
{
	return  DB::table('ImpTransactionDetails')
    ->leftjoin('DepoMaster','DepoMaster.DepoId','=','ImpTransactionDetails.DipoId')
    ->select('ImpTransactionDetails.*','DepoMaster.DepoName',DB::raw('SUM(ImpTransactionDetails.Debit) AS SumTotalTAmt'))
	->where('AdviceNo',$advNo)->groupBy('ImpTransactionDetails.AdviceNo')->first();
}
public function GetAdviceDetailsInner($advNo)
{
	return  DB::table('ImpTransactionDetails')
    ->leftjoin('DepoMaster','DepoMaster.DepoId','=','ImpTransactionDetails.DipoId')
    ->select('ImpTransactionDetails.*','DepoMaster.DepoName')
	->where('AdviceNo',$advNo)->get();
}
public function getAllImpDetails($depo,$date,$transMod)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	        
	         ->select('ImpBank.BankName','office_masters.OfficeName','office_masters.OfficeCode','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.Title','office_masters.id as OFID',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'), DB::raw('GROUP_CONCAT(ImpTransactionDetails.Balance SEPARATOR "-") as TotBalance')
	         	,DB::raw('(CASE WHEN ImpTransactionDetails.PaymentMode = "1" THEN "Cash" WHEN ImpTransactionDetails.PaymentMode = "2" THEN "Bank" WHEN ImpTransactionDetails.PaymentMode = "3" THEN "Happy Card" ELSE "" END ) AS PayMode'), 'ImpTransactionDetails.Tripno','ImpTransactionDetails.vehicle')
	         	
			//->orderBy('ImpTransactionDetails.Date','ASC')
			->orderBy('ImpTransactionDetails.id','ASC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          })
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          })
		 ->groupBy('AdviceNo')
		
		 ->paginate(10);
}
public function getTotalImpDetails($depo,$date,$adviceNo='')
{

       return DB::table('ImpTransactionDetails')
        ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->select(DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'))
		 ->orderBy('ImpTransactionDetails.id','DESC')

		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
                   })
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          		})
		  ->Where(function ($query) use($adviceNo){ 
		 	if($adviceNo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.AdviceNo',$adviceNo);	
		 	}
	              })
		->where('ImpTransactionDetails.TYpe',2)
              ->where('ImpTransactionDetails.Title','Expense Claim')
		->first();
}

public function getTotalCashLedger($depo,$date,$transMod){
	return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 
	         ->select(DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'),
	  		'ImpTransactionDetails.Balance as TotBalance')
			->orderBy('ImpTransactionDetails.Date','ASC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          	})
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          		})
	->first();
}
public function getTotalBalance($depo,$date,$transMod){
	return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 
	         ->select('ImpTransactionDetails.Balance as TotBalance')
			
			->orderBy('ImpTransactionDetails.id','DESC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          	})
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          		})
	->first();
}

public function CashpaymentRegister($depo,$date)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('employees','employees.user_id','ImpTransactionDetails.CreatedBy')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 
		->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
		->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
							->select('ImpBank.BankName','office_masters.OfficeCode','office_masters.OfficeName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('COUNT(ImpTransactionDetails.id) AS TotalCount'),'ImpTransactionDetails.AccType',
							'employees.EmployeeName','employees.EmployeeCode')
		  ->where('ImpTransactionDetails.TYpe',2)
		  ->where('ImpTransactionDetails.Title','=','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		  ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		 ->groupBy('ImpTransactionDetails.AdviceNo')
		->paginate(10);
}
public function ExpenseRegister($depo,$date,$adviceNo)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('employees','employees.user_id','ImpTransactionDetails.CreatedBy')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
			->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
			->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
              ->select('ImpBank.BankName','office_masters.OfficeCode','office_masters.OfficeName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.AccType','ImpTransactionDetails.Parent',
								'ImpTransactionDetails.FromDate','ImpTransactionDetails.ToDate','ImpTransactionDetails.ExpRemark','ImpTransactionDetails.AdviceNo',
								'employees.EmployeeName','employees.EmployeeCode')
		   ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		   ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		   ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !=''  && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          	       })
		    ->Where(function ($query) use($adviceNo){ 
		 	if($adviceNo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.AdviceNo',$adviceNo);	
		 	}
	              })
		 
		->paginate(10);
}
public function HeadWiseRegisterNew($dr,$date,$depo)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
			->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
			->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
              ->select('ImpBank.BankName','office_masters.OfficeCode','office_masters.OfficeName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image' ,'ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('COUNT(ImpTransactionDetails.id) AS TotalCount'),'ImpTransactionDetails.AccType')
		  ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		   ->Where(function ($query) use($dr){ 
			  if($dr!=''){
			  	$query->where('Dr1.Id',$dr);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->groupBy('ImpTransactionDetails.Debit_Reason')
		 
		->paginate(10);
}
	public function getLastCredit($depo)
	{
	  return DB::table('ImpTransactionDetails')->select('Balance')->where('DipoId',$depo)->orderBy('id','DESC')->first();	
	}

	public function HeadWiseRegisterDetailed($id,$depo){
		return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
			->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
			->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
              ->select('ImpBank.BankName','office_masters.OfficeCode','office_masters.OfficeName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.Debit AS TotalDebit','ImpTransactionDetails.id AS TotalCount','ImpTransactionDetails.AccType','ImpTransactionDetails.FromDate','ImpTransactionDetails.ToDate','ImpTransactionDetails.Parent')
		  ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		  ->where('ImpTransactionDetails.Debit_Reason',$id)
		  ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		  ->get();
	}

	public function getTotalHeadWiseRegister($dr , $date,$depo){
		return DB::table('ImpTransactionDetails')
		 ->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetails.DipoId')
		
		  ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		   ->Where(function ($query) use($dr){ 
			  if($dr!=''){
			  	$query->where('ImpTransactionDetails.Debit_Reason',$dr);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		  
		 
		->sum('Debit');
	}

//---------------------------------Exposts-----------------------------//

	public function getAllImpDetailsDownload($depo,$date,$transMod)
	{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 ->leftjoin('TripPlanSchedule','TripPlanSchedule.ID','ImpTransactionDetails.Trip_ID')
		 ->leftjoin('Vehicle','Vehicle.VehicleID','TripPlanSchedule.VehicleId')
	         ->leftjoin('RouteMaster','RouteMaster.RouteId','TripPlanSchedule.RouteId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	         ->leftjoin('Driver','Driver.DriverID','ImpTransactionDetails.DriverID')
	         ->select('ImpBank.BankName','DepoMaster.DepoName','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Vehicle.VNumer','RouteMaster.RouteCode','TripPlanSchedule.TripSheet','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','Driver.DName','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.Title',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'),
	         	DB::raw('GROUP_CONCAT(ImpTransactionDetails.Balance SEPARATOR "-") as TotBalance'),DB::raw('(CASE WHEN ImpTransactionDetails.PaymentMode = "1" THEN "Cash" WHEN ImpTransactionDetails.PaymentMode = "2" THEN "Bank" WHEN ImpTransactionDetails.PaymentMode = "3" THEN "Happy Card" ELSE "" END ) AS PayMode'), 'ImpTransactionDetails.Tripno','ImpTransactionDetails.vehicle'
	         	)
			//->orderBy('ImpTransactionDetails.Date','ASC')
			->orderBy('ImpTransactionDetails.id','ASC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          })
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          })
		 ->groupBy('AdviceNo')
		
		 ->get();
}

 public function CashpaymentRegisterDownload($depo,$date){
 	 return DB::table('ImpTransactionDetails')
		 ->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 ->leftjoin('TripPlanSchedule','TripPlanSchedule.ID','ImpTransactionDetails.Trip_ID')
		 ->leftjoin('Vehicle','Vehicle.VehicleID','TripPlanSchedule.VehicleId')
	         ->leftjoin('RouteMaster','RouteMaster.RouteId','TripPlanSchedule.RouteId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	         ->leftjoin('Driver','Driver.DriverID','ImpTransactionDetails.DriverID')
              ->select('ImpBank.BankName','DepoMaster.DepoName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Vehicle.VNumer','RouteMaster.RouteCode','TripPlanSchedule.TripSheet','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','Driver.DName','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('COUNT(ImpTransactionDetails.id) AS TotalCount'),'ImpTransactionDetails.AccType')
		  ->where('ImpTransactionDetails.TYpe',2)
		  ->where('ImpTransactionDetails.Title','=','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		  ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		 ->groupBy('ImpTransactionDetails.AdviceNo')
		->paginate(10);
 }


 public function ExpenseRegisterDownload($depo,$date,$adviceNo)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 ->leftjoin('TripPlanSchedule','TripPlanSchedule.ID','ImpTransactionDetails.Trip_ID')
		 ->leftjoin('Vehicle','Vehicle.VehicleID','TripPlanSchedule.VehicleId')
	         ->leftjoin('RouteMaster','RouteMaster.RouteId','TripPlanSchedule.RouteId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	         ->leftjoin('Driver','Driver.DriverID','ImpTransactionDetails.DriverID')
              ->select('ImpBank.BankName','DepoMaster.DepoName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Vehicle.VNumer','RouteMaster.RouteCode','TripPlanSchedule.TripSheet','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','Driver.DName','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.AccType','ImpTransactionDetails.Parent',
              	'ImpTransactionDetails.FromDate','ImpTransactionDetails.ToDate','ImpTransactionDetails.ExpRemark','ImpTransactionDetails.AdviceNo')
		   ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		   ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		   ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !=''  && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
         		 })
		   ->Where(function ($query) use($adviceNo){ 
		 	if($adviceNo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.AdviceNo',$adviceNo);	
		 	}
	              })
		 
		->get();
}


public function HeadWiseRegisterNewDownload($dr,$date,$depo)
{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 ->leftjoin('TripPlanSchedule','TripPlanSchedule.ID','ImpTransactionDetails.Trip_ID')
		 ->leftjoin('Vehicle','Vehicle.VehicleID','TripPlanSchedule.VehicleId')
	         ->leftjoin('RouteMaster','RouteMaster.RouteId','TripPlanSchedule.RouteId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	         ->leftjoin('Driver','Driver.DriverID','ImpTransactionDetails.DriverID')
              ->select('ImpBank.BankName','DepoMaster.DepoName','ImpTransactionDetails.Debit','ImpTransactionDetails.Creadit','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Vehicle.VNumer','RouteMaster.RouteCode','TripPlanSchedule.TripSheet','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','Driver.DName','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('COUNT(ImpTransactionDetails.id) AS TotalCount'),'ImpTransactionDetails.AccType')
		  ->where('ImpTransactionDetails.TYpe',2)
		   ->where('ImpTransactionDetails.Title','Expense Claim')
		  ->where('ImpTransactionDetails.AdviceNo','!=',NULL)
		   ->Where(function ($query) use($dr){ 
			  if($dr!=''){
			  	$query->where('Dr1.Id',$dr);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->where('ImpTransactionDetails.DipoId',$depo);	
		 	}
	              })
		   ->groupBy('ImpTransactionDetails.Debit_Reason')
		 
		->get();
}


	public function CashRequestListing($depo,$date,$status)
	{
		return DB::table("CashRequest")
		->leftjoin("DepoMaster","CashRequest.DepoId","DepoMaster.DepoId")
		->Where(function ($query) use($depo){ 
			  if($depo!=''){
			  	$query->where('CashRequest.DepoId',$depo);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('CashRequest.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($status){ 
			  if($status!=''){
			  	$query->where('CashRequest.status',$status);
			  	if($status==1){
			  		$query->orwhere('CashRequest.statusByHo',3);
			  	}
			  	else{
			  		$query->orwhere('CashRequest.statusByHo',4);
			  	}
			  }
	               })
		->orderBy("CashRequest.id","DESC")
		->paginate(10);
	}


	public function ExpenseRequestListing($depo,$date,$status){

		return DB::table("ImpTransactionDetailsExp")
		->leftjoin('office_masters','office_masters.id','ImpTransactionDetailsExp.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetailsExp.BankId')
		 
			->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetailsExp.Debit_Reason')
			->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetailsExp.Credit_Reason')
		
	         ->select('ImpBank.BankName','office_masters.OfficeCode','office_masters.OfficeName','ImpTransactionDetailsExp.Debit','ImpTransactionDetailsExp.Creadit','ImpTransactionDetailsExp.Date','ImpTransactionDetailsExp.Reason','ImpTransactionDetailsExp.Remark','ImpTransactionDetailsExp.TYpe','ImpTransactionDetailsExp.id','ImpTransactionDetailsExp.Debit_Reason','ImpTransactionDetailsExp.Trip_ID','ImpTransactionDetailsExp.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetailsExp.Bill_Image','ImpTransactionDetailsExp.CreatedDate','ImpTransactionDetailsExp.AccType','ImpTransactionDetailsExp.Parent',
              	'ImpTransactionDetailsExp.FromDate','ImpTransactionDetailsExp.ToDate','ImpTransactionDetailsExp.ExpRemark','ImpTransactionDetailsExp.AdviceNo','ImpTransactionDetailsExp.status','ImpTransactionDetailsExp.Title',
              	DB::raw('SUM(ImpTransactionDetailsExp.Debit) AS TotDeb'))
	         ->where('ImpTransactionDetailsExp.TYpe',2)
		   ->where('ImpTransactionDetailsExp.Title','Expense Claim')
		  ->where('ImpTransactionDetailsExp.AdviceNo','!=',NULL)
		  // ->where('ImpTransactionDetailsExp.DipoId',$depo)
		->Where(function ($query) use($depo){ 
			  if($depo!=''){
			  	$query->where('ImpTransactionDetailsExp.DipoId',$depo);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetailsExp.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($status){ 
			  if($status!=''){
			  	$query->where('ImpTransactionDetailsExp.status',$status);
			  }
	               })
		->orderBy("ImpTransactionDetailsExp.id","DESC")
		->groupBy('ImpTransactionDetailsExp.AdviceNo')
		->paginate(10);
	}

	public function getExpenseRequestApprove($AdviceNo){
		return DB::table("ImpTransactionDetailsExp")
		->where('ImpTransactionDetailsExp.AdviceNo',$AdviceNo)
		->get();
	}

	public function getDepoName($depo){
		return DB::table("DepoMaster")
		->where('DepoMaster.DepoId',$depo)
		->first();
	}

	public function issetAdviceNo($AdviceNo){
		return DB::table("ImpTransactionDetailsExp")
		->where('ImpTransactionDetailsExp.AdviceNo',$AdviceNo)
		->count('id');
	}

	public function CashRequestListingDownload($depo,$date,$status){
		return DB::table("CashRequest")
		->leftjoin("DepoMaster","CashRequest.DepoId","DepoMaster.DepoId")
		->Where(function ($query) use($depo){ 
			  if($depo!=''){
			  	$query->where('CashRequest.DepoId',$depo);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('CashRequest.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($status){ 
			  if($status!=''){
			  	$query->where('CashRequest.status',$status);
			  	if($status==1){
			  		$query->orwhere('CashRequest.statusByHo',3);
			  	}
			  	else{
			  		$query->orwhere('CashRequest.statusByHo',4);
			  	}
			  }
	               })
		->orderBy("CashRequest.id","DESC")
		->get();
	}

	public function ExpenseRequestListingDownload($depo,$date,$status){

		return DB::table("ImpTransactionDetailsExp")
		->leftjoin('DepoMaster','DepoMaster.DepoId','ImpTransactionDetailsExp.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetailsExp.BankId')
		 ->leftjoin('TripPlanSchedule','TripPlanSchedule.ID','ImpTransactionDetailsExp.Trip_ID')
		 ->leftjoin('Vehicle','Vehicle.VehicleID','TripPlanSchedule.VehicleId')
	         ->leftjoin('RouteMaster','RouteMaster.RouteId','TripPlanSchedule.RouteId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetailsExp.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetailsExp.Credit_Reason')
	         ->leftjoin('Driver','Driver.DriverID','ImpTransactionDetailsExp.DriverID')
	         ->select('ImpBank.BankName','DepoMaster.DepoName','ImpTransactionDetailsExp.Debit','ImpTransactionDetailsExp.Creadit','ImpTransactionDetailsExp.Date','ImpTransactionDetailsExp.Reason','ImpTransactionDetailsExp.Remark','ImpTransactionDetailsExp.TYpe','ImpTransactionDetailsExp.id','ImpTransactionDetailsExp.Debit_Reason','ImpTransactionDetailsExp.Trip_ID','ImpTransactionDetailsExp.Credit_Reason','Vehicle.VNumer','RouteMaster.RouteCode','TripPlanSchedule.TripSheet','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetailsExp.Bill_Image','Driver.DName','ImpTransactionDetailsExp.AdviceNo','ImpTransactionDetailsExp.CreatedDate','ImpTransactionDetailsExp.AccType','ImpTransactionDetailsExp.Parent',
              	'ImpTransactionDetailsExp.FromDate','ImpTransactionDetailsExp.ToDate','ImpTransactionDetailsExp.ExpRemark','ImpTransactionDetailsExp.AdviceNo','ImpTransactionDetailsExp.status','ImpTransactionDetailsExp.Title',
              	DB::raw('SUM(ImpTransactionDetailsExp.Debit) AS TotDeb'))
	         ->where('ImpTransactionDetailsExp.TYpe',2)
		   ->where('ImpTransactionDetailsExp.Title','Expense Claim')
		  ->where('ImpTransactionDetailsExp.AdviceNo','!=',NULL)
		  ->where('ImpTransactionDetailsExp.DipoId',$depo)
		->Where(function ($query) use($depo){ 
			  if($depo!=''){
			  	$query->where('ImpTransactionDetailsExp.DipoId',$depo);
			  }
	               })
			->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='' )
		 	{
		 	 $query->whereBetween('ImpTransactionDetailsExp.Date',[$date['formDate'], $date['ToDate']]);
		 	}
                    })
			->Where(function ($query) use($status){ 
			  if($status!=''){
			  	$query->where('ImpTransactionDetailsExp.status',$status);
			  }
	               })
		->orderBy("ImpTransactionDetailsExp.id","DESC")
		->groupBy('ImpTransactionDetailsExp.AdviceNo')
		->get();
	}


	public function getAllImpDetailsOffice($depo,$date,$transMod)
	{

       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
		 
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	        
	         ->select('ImpBank.BankName','office_masters.OfficeName','office_masters.OfficeCode','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.Title','office_masters.id as OFID',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'), DB::raw('GROUP_CONCAT(ImpTransactionDetails.Balance SEPARATOR "-") as TotBalance')
						 ,DB::raw('(CASE WHEN ImpTransactionDetails.PaymentMode = "1" THEN "Cash" WHEN ImpTransactionDetails.PaymentMode = "2" THEN "Bank" WHEN ImpTransactionDetails.PaymentMode = "3" THEN "Happy Card" ELSE "" END ) AS PayMode'), 'ImpTransactionDetails.Tripno','ImpTransactionDetails.vehicle'
						 )
	         	
			//->orderBy('ImpTransactionDetails.Date','ASC')
			->orderBy('ImpTransactionDetails.id','ASC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          })
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          })
		 ->groupBy('ImpTransactionDetails.DipoId')
		
		 ->paginate(10);
	}



	public function getAllImpDetailsHO($depo,$date,$transMod)
	{
       return DB::table('ImpTransactionDetails')
		 ->leftjoin('office_masters','office_masters.id','ImpTransactionDetails.DipoId')
		 ->leftjoin('ImpBank','ImpBank.id','ImpTransactionDetails.BankId')
	         ->leftjoin('DebitReason as Dr1','Dr1.Id','ImpTransactionDetails.Debit_Reason')
	         ->leftjoin('DebitReason as Dr2','Dr2.Id','ImpTransactionDetails.Credit_Reason')
	        
	         ->select('ImpBank.BankName','office_masters.OfficeName','office_masters.OfficeCode','ImpTransactionDetails.Date','ImpTransactionDetails.Reason','ImpTransactionDetails.Remark','ImpTransactionDetails.TYpe','ImpTransactionDetails.id','ImpTransactionDetails.Debit_Reason','ImpTransactionDetails.Trip_ID','ImpTransactionDetails.Credit_Reason','Dr1.Reason as DebitReason','Dr2.Reason as CreditReason','ImpTransactionDetails.Bill_Image','ImpTransactionDetails.AdviceNo','ImpTransactionDetails.CreatedDate','ImpTransactionDetails.Title','office_masters.id as OFID',DB::raw('SUM(ImpTransactionDetails.Debit) AS TotalDebit'),DB::raw('SUM(ImpTransactionDetails.Creadit) AS TotalCredit'), DB::raw('GROUP_CONCAT(ImpTransactionDetails.Balance SEPARATOR "-") as TotBalance')
	         	,DB::raw('(CASE WHEN ImpTransactionDetails.PaymentMode = "1" THEN "Cash" WHEN ImpTransactionDetails.PaymentMode = "2" THEN "Bank" WHEN ImpTransactionDetails.PaymentMode = "3" THEN "Happy Card" ELSE "" END ) AS PayMode'), 'ImpTransactionDetails.Tripno','ImpTransactionDetails.vehicle' ,'office_masters.id as OID')
	         	
			//->orderBy('ImpTransactionDetails.Date','ASC')
			->orderBy('ImpTransactionDetails.id','ASC')
		 ->Where(function ($query) use($depo){ 
		 	if($depo !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.DipoId',$depo);	
		 	}
         
          })
		  ->Where(function ($query) use($date){ 
		 	if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['ToDate']) && $date['ToDate'] !='')
		 	{
		 	 $query->whereBetween('ImpTransactionDetails.Date',[$date['formDate'], $date['ToDate']]);
		 	}
         
          })
		  ->Where(function ($query) use($transMod){ 
		 	if($transMod !='')
		 	{
		 	 $query->orwhere('ImpTransactionDetails.PaymentMode',$transMod);	
		 	}
         
          })
		 ->groupBy('AdviceNo')
		 ->get();
	}

	
}