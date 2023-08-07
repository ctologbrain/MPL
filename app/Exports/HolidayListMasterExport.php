<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ToolAdmin\HolidayListMaster;
use DB;
class HolidayListMasterExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
       
        
    }
    public function collection()
    {
       return HolidayListMaster::select('Holiday_List_Master.id','Holiday_List_Master.HolidayName','Holiday_List_Master.Is_Active' )
       ->get();
    }

    public function headings(): array
    {
        return [
            'SN',
            'Holiday Name',
            'Active'
         ];
    }
}