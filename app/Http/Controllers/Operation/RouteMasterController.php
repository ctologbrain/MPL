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
        
         $routeId=RouteMaster::insertGetId(
             ['RouteName' =>$request->RouteName,'Source'=>$request->StartPoint,'Destination'=>$request->endpoint,'TransitDays'=>$request->TransitDays ,'CreatedBy'=>3]
         );
         foreach($request->TouchPoint as $touch)
         {
            if(isset($touch['Touch']))
            {
                TouchPoints::insert(
                    ['RouteId' =>$routeId,'CityId'=>$touch['Touch'],'RouteOrder'=>$touch['order'],'Time'=>$touch['Time']]
                );
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
}
