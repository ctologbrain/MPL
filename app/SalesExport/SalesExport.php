<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\SalesReport\salesReport;
use DB;
class SalesExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        DB::raw('(CASE WHEN AccountType=1 THEN "CURRENT" ELSE "SAVING" END) as types'),
        'AccountNo',
        DB::raw('(CASE WHEN Active=1 THEN "YES" ELSE "NO" END) as status')
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