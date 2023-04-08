<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\OfficeSetup\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        //$request->filled('search')
      
            $product = Product::orderBy('id')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("products.ProductCode" ,"like",'%'.$keyword.'%');
                    $query->orWhere("products.ProductName" ,"like",'%'.$keyword.'%');
                }
            })->paginate(10);  
        
           return view('offcieSetup.productList', [
             'product' => $product,
            'title'=>'PRODUCT MASTER',
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $check= Product::where("ProductCode",$request->projectCode)->first();
       if(empty($check)){
            if(isset($request->Pid) && $request->Pid !='')
            {
                Product::where("id", $request->Pid)->update(['ProductCode' => $request->projectCode,'ProductName'=>$request->projectName,'ProductCategory'=>$request->ProjectCategory]);
            }
            else{
                Product::insert(
                    ['ProductCode' => $request->projectCode,'ProductName'=>$request->projectName,'ProductCategory'=>$request->ProjectCategory]
                );
            }
        }
        else{
        echo 'false';
       }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $products = Product::where('id',$request->productId)->first();  
           return json_encode($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\OfficeSetup\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
