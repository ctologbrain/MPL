<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentsMasterRequest;
use App\Http\Requests\UpdateContentsMasterRequest;
use App\Models\OfficeSetup\ContentsMaster;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\ContentMasterExport;
class ContentsMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $keyword =$req->Content;
        $contents = ContentsMaster::with('userDatasDetails')->where(function($query) use($keyword){
            if($keyword!=''){
                $query->where("Contents",'like','%'.$keyword.'%');
            }

        })->paginate(10); 
        if($req->submit=="Download"){
            return   Excel::download(new ContentMasterExport($keyword), 'ContentMasterExport.xlsx');
        }
        return view('offcieSetup.contentsMaster', [
            'title'=>'Contents Master',
            'contents'=>$contents]);
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
     * @param  \App\Http\Requests\StoreContentsMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentsMasterRequest $request)
    {
        //
        $check= ContentsMaster::where('Contents',$request->contents)->first();
        $UserId = Auth::id();
        if($request->Id){
            ContentsMaster::where('id',$request->Id)->update(['Contents'=>$request->contents,'Mode'=>$request->mode]);
            $var ="Edit Successfully";
        }
        else{
            if(empty($check)){
                ContentsMaster::insert(['Contents'=>$request->contents,'Mode'=>$request->mode,'Created_By'=>$UserId]);
                $var ="Add Successfully";
            }
            else{
                $var ="Contents Already Exist";
            }
        }
        echo $var;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\ContentsMaster  $contentsMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,ContentsMaster $contentsMaster)
    {
        //
        $data = ContentsMaster::where('id',$req->id)->first();
        echo json_encode(array("datas"=>$data,"status"=>1));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\ContentsMaster  $contentsMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentsMaster $contentsMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentsMasterRequest  $request
     * @param  \App\Models\OfficeSetup\ContentsMaster  $contentsMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentsMasterRequest $request, ContentsMaster $contentsMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\ContentsMaster  $contentsMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentsMaster $contentsMaster)
    {
        //
    }
}
