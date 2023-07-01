<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Stock\DocketSeriesMaster;

use DB;
class StockTrackingExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($fpmId) {
        $this->fpmId = $fpmId;
     
        
 }
    public function collection()
    {
        return ;
        
    }
    public function headings(): array
    {
        return [
            'Activity',
            'Activity Date',
            'From Office',
            'To Office',
            'Serial From',
            'Serial To',
            'Qty',
            'Entry Date',
            'Entry By'
         ];
    }

}