<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\designation;
use DB;
class DesignationMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword){
        $this->keyword=$keyword;
      
    }
    public function collection()
    {
       return designation::leftjoin("designations as Destt","designations.Parent_Id","Destt.id")->orderBy('designations.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("designations.DesignationName" ,"like",'%'.$this->keyword.'%');
        }
        })
        ->select(
        'Destt.DesignationName as DesignName',
        'designations.DesignationName',
        'designations.ShortName','designations.Is_Active')->get();
    }
    public function headings(): array
    {
        return [
            'Parent Designation',
            'Designation Name ',
            'Short Name',
            'Active'
        ];
    }

}