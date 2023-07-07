<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\ComplaintType;
use DB;
class ComplainTypeExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return ComplaintType::leftjoin('users','users.id','complaint_types.Created_By')
       ->orderBy('complaint_types.id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("Contents",'like','%'.$this->keyword.'%');
        }
        })
        ->select(
        'ComplaintType',
        'CaseOpen',
        'users.name',
        DB::raw('DATE_FORMAT(complaint_types.created_at,"%d-%m-%Y %H:%i") as CT')
        )->get();
    }
    public function headings(): array
    {
        return [
            'Complaint Type',
            'Case Open',
            'Created By',
            'Created On',
        ];
    }

}