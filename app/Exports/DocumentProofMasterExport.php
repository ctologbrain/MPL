<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ToolAdmin\DocumentProofMaster;
use DB;
class DocumentProofMasterExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
       
        
    }
    public function collection()
    {
       return DocumentProofMaster::
       select('documentkycmaster.id','documentkycmaster.document','documentkycmaster.Is_Active' )
       ->get();
    }

    public function headings(): array
    {
        return [
            'SN',
            'Document Proof Name',
            'Active'
         ];
    }
}