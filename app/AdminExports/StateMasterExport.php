<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\state;
use DB;
class StateMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
    //    return state::leftjoin("","states.country_id",".id")
    //    ->orderBy('states.id')
    //    ->where(function($query) {
    //     if($this->keyword!=""){
    //         $query->where("states.StateCode" ,"like",'%'.$this->keyword.'%');
    //         $query->orWhere("states.StateType" ,"like",'%'.$this->keyword.'%');
    //     }
    //     })
    //     ->select(
    //     'zone_masters.ZoneName',
    //     'states.name',
    //     'cities.Code',
    //     'cities.CityName',
    //     'cities.MetroCity', 
    //     'cities.AirportExists'
    //  //   DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %H:%i") as CT')
    //     )->get();
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