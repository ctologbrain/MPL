<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\OfficeSetup\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\ProductExport;
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
            if($request->submit=="Download"){
                return   Excel::download(new ProductExport($keyword), ' ProductExport.xlsx');
            }
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
        if($request->ProjectCategory==''){
             $check= Product::where("ProductCode",$request->projectCode)->first();
        }
        else{
        $check= Product::where("ProductCode",$request->projectCode)->where("ProductCategory",$request->ProjectCategory)->first();
        }
       
            if(isset($request->Pid) && $request->Pid !='')
            {
                Product::where("id", $request->Pid)->update(['ProductCode' => $request->projectCode,'ProductName'=>$request->projectName,'ProductCategory'=>$request->ProjectCategory,'ProductActive'=>$request->ProductActive]);
                echo 'Edit Successfully';
            }
            else{
                if(empty($check)){
                Product::insert(
                    ['ProductCode' => $request->projectCode,'ProductName'=>$request->projectName,'ProductCategory'=>$request->ProjectCategory,'ProductActive'=>$request->ProductActive]
                );
                echo 'Add Successfully';
                }
                else{
                    echo 'false';
                }
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
