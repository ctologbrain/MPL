<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\CheckListMaster;
use DB;
class DriverChecklistExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return CheckListMaster::
       orderBy('check_list_masters.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("check_list_masters.DocumentName",'like','%'.$this->keyword.'%');
        }
        })
        ->select(
        "DocumentName",
        "Mandatory"
        )->get();
    }
    public function headings(): array
    {
        return [
            'Document Name',
            'Mandatory'
        ];
    }

}