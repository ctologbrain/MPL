<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\DeliveryProofMaster;
use DB;
class DeliveryProofMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return DeliveryProofMaster::leftjoin('users','users.id','delivery_proof_masters.Created_By')
       ->orderBy('id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query->where("delivery_proof_masters.ProofCode" ,"like",'%'.$this->keyword.'%');
            $query->orWhere("delivery_proof_masters.ProofName" ,"like",'%'.$this->keyword.'%');
        }
        })
        ->select(
        'ProofCode',
        'ProofName',
        'Pdr',
        'Active',
        'Default',
        'users.name',
        'users.created_at'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Proof Code',
            'Proof Name',
            'Detail Required',
            'Active',
            'Default',
            'Created By ',
            'Created On'
        ];
    }

}