<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\CompanySetup\PincodeMaster;
use DB;
class PinCodeMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return PincodeMaster::leftjoin("states","pincode_masters.State","states.id")
       ->leftjoin("cities","pincode_masters.State","cities.id")
       ->leftjoin("users","users.id","pincode_masters.Created_By")
       ->orderBy('pincode_masters.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query ->orWhere('pincode_masters.PinCode', 'like', '%' .  $this->keyword . '%');
        }
        })
        ->select(
        'pincode_masters.PinCode',
        'cities.CityName',
        'states.name',
        'pincode_masters.ARP',
        'pincode_masters.ODA',
         DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %H:%i") as CT'),
        'users.name'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Pin Code',
            'City Name',
            'State Name',
            'Reverse Pickup',
            'ODA',
            'Modified On',
            'Modified By'
        ];
    }

}