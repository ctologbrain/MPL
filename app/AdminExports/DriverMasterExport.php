<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Vendor\DriverMaster;
use DB;
class DriverMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return DriverMaster::orderBy('driver_masters.id')
       ->Where(function ($query) { 
        if($this->keyword !='')
        {
           $query ->orWhere('DriverName', 'like', '%' . $this->keyword . '%');
         }
        })
        ->select(
        'DriverName',
        'VendorName',
        'License',
        'LicenseExp',
        'Address1',
        'Address2',
        'City',
        'Pincode', 'State', 'Phone')->get();
    }
    public function headings(): array
    {
        return [
            'Driver Name',
            'Vendor Name',
            'License No ',
            'License Exp Date',
            'Address1',
            'Address2',
            'City',
            'Pincode',
            'State',
            'Phone'
        ];
    }

}