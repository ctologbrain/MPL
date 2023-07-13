<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\Department;
use DB;
class DepartmentMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return Department::orderBy('id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("departments.DepartmentName" ,"like",'%'.$this->keyword.'%');
            $query->orWhere("departments.ShortName",'like','%'.$this->keyword.'%');
        }
        })
        ->select(
        'DepartmentName',
        'ShortName',
        'DepartmentHead',
        'DepartmentHeadEmail',
        'Is_Active')->get();
    }
    public function headings(): array
    {
        return [
            'Department Name',
            'Short Name',
            'Department Head',
            'Department Head Email',
            'Active'
        ];
    }

}