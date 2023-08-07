<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ToolAdmin\TrainingDocument;
use DB;
class TrainingDocExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
       
        
    }
    public function collection()
    {
       return TrainingDocument::select('Training_Doc.id','Training_Doc.Process_Name','Training_Doc.Description',
       'Training_Doc.Document_Name','Training_Doc.Access_Role' , 'Training_Doc.Is_Active' )
       ->get();
    }

    public function headings(): array
    {
        return [
            'SN',
            'Process Name',
            'Description',
            'Document Name',
            'Access Role',
            'Active'
         ];
    }
}