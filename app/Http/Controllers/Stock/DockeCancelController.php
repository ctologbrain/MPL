<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Stock;
use App\Http\Requests\StoreDockeCancelRequest;
use App\Http\Requests\UpdateDockeCancelRequest;
use App\Models\Stock\DockeCancel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock\DocketSeriesDevision;
use App\Models\Stock\DocketSeriesMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\Stock\DocketType;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Stock\DocketStatus;
class DockeCancelController extends Controller
{
    function __construct()
	{
		
    $this->off=new OfficeMaster();
    $this->status=new DocketStatus();
    $this->allo=new DocketAllocation();
		

	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('Stock.DocketCancel', [
            'title'=>'DOCKET CANCEL',
         ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDockeCancelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDockeCancelRequest $request)
    {
              $file=$request->file;
               if($file !='')
                {
                $destinationPath = 'CancelDocketAtte';
                $new_file_name = date('ymdHis').$file->getClientOriginalName();
                $moved = $file->move($destinationPath,$new_file_name);
               
                }
        $code=rand(1111,9999);
        $lastId=DockeCancel::insertGetId(['code' => $code,'Reason'=>$request->Reason,'file'=>$moved]);
        $docket=explode(',',$request->docket);
        foreach($docket as $cancelDochet)
        {
            DocketAllocation::where("Docket_No", $cancelDochet)->update(['Status' =>1,'Remark'=>$request->Reason,'CancelId'=>$lastId]);
        }
        
         echo 'Docket Cancel Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DockeCancel  $dockeCancel
     * @return \Illuminate\Http\Response
     */
    public function show(DockeCancel $dockeCancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DockeCancel  $dockeCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(DockeCancel $dockeCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDockeCancelRequest  $request
     * @param  \App\Models\Stock\DockeCancel  $dockeCancel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDockeCancelRequest $request, DockeCancel $dockeCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DockeCancel  $dockeCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DockeCancel $dockeCancel)
    {
        //
    }
    public function DocketReport(Request $request)
    {
            if($request->get('offfcie') !='')
            {
             $offfcie=$request->get('offfcie');
            }
            else{
                $offfcie='';
            }
            if($request->get('DocketStatus') !='')
            {
             $DocketStatus=$request->get('DocketStatus');
            }
            else{
              $DocketStatus='';
            }

            if($request->get('formDate') !='')
            {
             $date['formDate']=$request->get('formDate') ;
            }
            else{
              $date['formDate']='';
            }
            if($request->get('todate') !='')
            {
             $date['todate']=$request->get('todate') ;
            }
            else{
              $date['todate']='';
            }
            if($request->get('DocketNo')){
                $DocketNo= $request->get('DocketNo');
            }
            else{
                 $DocketNo= '';
            }
            \DB::enableQueryLog();
            // $docket=DocketAllocation::with('OffciceDetails','StatusDetails','DocketSeriesDeatils','OffciceDetailsParentDetauls')
            $docket=DocketAllocation::
             leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
             ->leftjoin('docke_cancels','docke_cancels.id','=','docket_allocations.CancelId')
             ->leftJoin('docket_series_devisions', function($join)
             {
             $join->on('docket_series_devisions.Series_ID', '=', 'docket_allocations.Series_ID');
             $join->on('docket_series_devisions.Branch_ID', '=', 'docket_allocations.Branch_ID');
             })
          
            ->leftjoin('office_masters as Offcie3','Offcie3.id','=','office_masters.ParentOffice')
            ->leftjoin('docket_statuses','docket_statuses.status','=','docket_allocations.Status')
            ->select('docket_allocations.*','office_masters.OfficeName','office_masters.OfficeCode','Offcie3.OfficeName as ParentOfficeName','Offcie3.OfficeCode as ParentOffcieCode','docket_statuses.title','docket_series_devisions.IssueDate','docke_cancels.file')
            ->Where(function ($query) use($offfcie){ 
                 if($offfcie !='')
                {
                    $query ->orWhere('docket_allocations.Branch_ID',$offfcie);
                }
             })
             ->Where(function ($query) use($DocketStatus){ 
                if($DocketStatus !='')
               {
                   $query ->Where('docket_allocations.Status',$DocketStatus);
               }
            })
             ->Where(function ($query) use($date){ 
                if(isset($date['formDate']) && $date['formDate'] !='' && isset($date['todate']))
               {
                   $query ->WhereBetween('docket_allocations.BookDate',[$date['formDate'],$date['todate']]);
               }
            })
              ->Where(function ($query) use($DocketNo){ 
                if($DocketNo !='')
               {
                   $query ->Where('docket_allocations.Docket_No',$DocketNo);
               }
            })
                ->groupBy("docket_allocations.Docket_No")
            ->orderBy('docket_allocations.Docket_No')->paginate(10);
          
           // dd(\DB::getQueryLog());
        $docketStatus=DocketStatus::get();
        $OfficeMaster=OfficeMaster::get();
        return view('Stock.DocketReport', [
            'title'=>'DOCKET REPORT',
            'docketStatus'=>$docketStatus,
            'docket'=>$docket,
            'OfficeMaster'=>$OfficeMaster
            
        ]);
    }
}
