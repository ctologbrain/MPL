<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\NdrMaster;
use DB;
class NDRMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return NdrMaster::leftjoin('users','users.id','ndr_masters.CreatedBy')->orderBy('ndr_masters.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("ndr_masters.ReasonCode" ,"like",'%'.$this->keyword.'%');
        }
        })
        ->select(
        'ReasonCode',
        'ReasonDetail',
        'NDRReason',
        'MobileReason',
        'vrr',
        'RTOReason',
        'CustomerException',
        'ReversePickup',
        'InternalNDR',
        'OffloadReason',
        'users.name',
        'ndr_masters.created_at'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Reason Code',
            'Reason Detail',
            'NDR Reason',
            'Mobile Reason',
            'Vehicle Replacement',
            'Offload Reason',
            'RTO Reason',
            'Customer Exception',
            'Reverse Pickup',
            'Internal NDR',
            'Created By',
            'Created On'
        ];
    }

}