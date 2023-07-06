<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\CompanySetup\BankMaster;
use DB;
class BankMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
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
       return BankMaster::
       orderBy('id')
       ->where(function($query) {
        if($this->keyword!=""){
            $query ->Where('bank_masters.BankCode', 'like', '%' . $this->keyword . '%');
            $query ->orWhere('bank_masters.BankName', 'like', '%' . $this->keyword . '%');
        }
        })
        ->select(
        'BankCode',
        'BankName',
        'BranchName',
        'BranchAdd',
        'NameAsAccount',
        'AccountType',
        'AccountNo',
        'Active'
     //   DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %H:%i") as CT')
        )->get();
    }
    public function headings(): array
    {
        return [
            'Bank Code',
            'Bank Name',
            'Branch Name',
            'Branch Address',
            'Name As In Account',
            'Account Type',
            'Account No',
            'Is Active'
        ];
    }

}