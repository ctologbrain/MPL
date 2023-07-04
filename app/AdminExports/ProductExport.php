<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\Product;
use DB;
class ProductExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword) {
       
        $this->keyword=$keyword;
      
        
    }
    public function collection()
    {
       return Product::orderBy('id')->where(function($query){
        if($this->keyword!=""){
            $query->where("products.ProductCode" ,"like",'%'.$this->keyword.'%');
            $query->orWhere("products.ProductName" ,"like",'%'.$this->keyword.'%');
        }
        })
        ->select("ProductCode","ProductName","ProductCategory",
        DB::raw("(CASE  WHEN ProductActive=0 THEN 'No' ELSE 'YES' END) as stts"))
       ->get();
    }
    public function headings(): array
    {
        return [
            'Product Code',
            'Product Name',
            'Product Category',
            'Active'
        ];
    }

}