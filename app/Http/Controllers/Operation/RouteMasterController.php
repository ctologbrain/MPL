<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRouteMasterRequest;
use App\Http\Requests\UpdateRouteMasterRequest;
use App\Models\Operation\RouteMaster;
use App\Models\OfficeSetup\city;
use App\Models\Operation\TouchPoints;
use DB;
class RouteMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::get();
        $route=RouteMaster::with('StatrtPointDetails','EndPointDetails')
       ->paginate(10);
   
       return view('Operation.RouteMaster', [
            'title'=>'ROUTE MASTER',
            'city'=>$city,
            'route'=>$route
         
        ]);
    }
    public function ViewRoute(Request $request)
    {
        $route=RouteMaster::with('StatrtPointDetails','EndPointDetails')->where('route_masters.id',$request->routeId)->first();
        $touchPoint=TouchPoints::
       leftJoin('cities', 'cities.id', '=', 'touch_points.CityId')
       ->select('touch_points.RouteOrder','touch_points.Time as Time','cities.CityName','cities.Code')
       ->where('touch_points.RouteId',$request->routeId)->get();
       return view('Operation.TouchPointModel', [
        'route'=>$route,
        'touchPoint'=>$touchPoint
     
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
     * @param  \App\Http\Requests\StoreRouteMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteMasterRequest $request)
    {
        if(isset($request->hiddenid)){
            RouteMaster::where("id",$request->hiddenid)->update(['RouteName' =>$request->RouteName,'Source'=>$request->StartPoint,'Destination'=>$request->endpoint,'TransitDays'=>$request->TransitDays ,'CreatedBy'=>3]);
            
            TouchPoints::where("RouteId",$request->hiddenid)->delete();
        }
        else{
         $routeId=RouteMaster::insertGetId(
             ['RouteName' =>$request->RouteName,'Source'=>$request->StartPoint,'Destination'=>$request->endpoint,'TransitDays'=>$request->TransitDays ,'CreatedBy'=>3]
         );
        }
         foreach($request->TouchPoint as $touch)
         {
            if(isset($touch['Touch']))
            {
                if(isset($request->hiddenid)){
                    TouchPoints::insert(
                        ['RouteId' =>$request->hiddenid,'CityId'=>$touch['Touch'],'RouteOrder'=>$touch['order'],'Time'=>$touch['Time']]
                         );
                }
                else{
                TouchPoints::insert(
                    ['RouteId' =>$routeId,'CityId'=>$touch['Touch'],'RouteOrder'=>$touch['order'],'Time'=>$touch['Time']]
                );
                }
            }
         }
         $request->session()->flash('status', 'Route Added Successfully');
         return redirect('RouteMaster'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RouteMaster  $routeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(RouteMaster $routeMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RouteMaster  $routeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(RouteMaster $routeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRouteMasterRequest  $request
     * @param  \App\Models\Operation\RouteMaster  $routeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRouteMasterRequest $request, RouteMaster $routeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RouteMaster  $routeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(RouteMaster $routeMaster)
    {
        //
    }

   public function  EditRoute(Request $request){
    $routeDetails=RouteMaster::where("id",$request->routeId)->first();
    echo json_encode(array("success"=>1,"data"=>$routeDetails));

   }
    public function  ActiveRoute(Request $request){
         $status=RouteMaster::where("id",$request->routeId)->first()->status;
        if($request->active=="Active"){
            $status = 1;
        }
        else if($request->active=="Deactive"){
             $status = 0;
        }
        RouteMaster::where("id",$request->routeId)->update(["status"=>$status]);
        echo json_encode(array("success"=>1,"status"=>$status));
    }
}
