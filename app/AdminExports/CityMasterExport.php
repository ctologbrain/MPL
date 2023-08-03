<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\city;
use DB;
class CityMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return city::leftjoin("zone_masters","cities.ZoneName","zone_masters.id")
       ->leftjoin("states","cities.stateId","states.id")
       ->orderBy('cities.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query ->Where('cities.Code', 'like', '%' . $this->keyword . '%');
            $query ->orWhere('cities.CityName', 'like', '%' . $this->keyword . '%');
        }
        })
        ->select(
        'zone_masters.ZoneName',
        'states.name',
        'cities.Code',
        'cities.CityName',
        'cities.MetroCity', 
        'cities.AirportExists'
     //   DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %H:%i") as CT')
        )->get();
    }
    public function headings(): array
    {
        return [
            'Zone Name',
            'State Name',
            'City Code',
            'City Name',
            'Metro City',
            'Airport Exists'
        ];
    }

}