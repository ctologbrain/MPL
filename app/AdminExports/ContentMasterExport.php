<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\ContentsMaster;
use DB;
class ContentMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return ContentsMaster::leftjoin('users','users.id','Content_Master.Created_By')
       ->orderBy('Content_Master.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("Contents",'like','%'.$this->keyword.'%');
        }
        })
        ->select(
        'Contents',
        DB::raw("(CASE WHEN Mode=1 THEN 'ALL'   WHEN Mode=2 THEN 'AIR' 
        WHEN Mode=3 THEN 'COURIER'  WHEN Mode=4 THEN 'ROAD'  WHEN Mode=5 THEN 'TRAIN' END ) as md "),
        DB::raw("(CASE WHEN Active=1 THEN 'YES' ELSE  'NO' END) as ActiveStatus"),
        'users.name',
        'users.Created_At'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Contents',
            'Mode',
            'Active',
            'Created By',
            'Created On',
        ];
    }

}