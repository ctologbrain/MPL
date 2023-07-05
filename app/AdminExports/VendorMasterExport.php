<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Vendor\VendorMaster;
use DB;
class VendorMasterExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct(){
       // $this->keyword=$keyword;
      
    }
    public function collection()
    {
       return VendorMaster::leftjoin('office_masters','office_masters.id','vendor_masters.OfficeName')
       ->leftjoin('vendor_banks','vendor_banks.Vid','vendor_masters.id')
       ->leftjoin('vendor_details','vendor_details.Vid','vendor_masters.id')
       ->orderBy('vendor_details.id')
        ->select(DB::raw("CONCAT(office_masters.OfficeCode,'~',office_masters.OfficeName) as offf"),
       'ModeType',
       'VendorCode',
       'VendorName',
       'Identification',
       'NatureOfVendor',
       'FCM',
       'Gst',
        'CreditPeriod', 'TransportGroup', 'Password',
        'vendor_banks.BankName',
       'vendor_banks.BranchName','vendor_banks.BranchAddress' ,'vendor_banks.NameOfAccount'
       ,'vendor_banks.AccountType' ,'vendor_banks.AccountNo','vendor_banks.IfscCode'
       ,'vendor_details.Name'
       ,'vendor_details.Mobile' ,'vendor_details.Email'
       ,'vendor_details.Address1','vendor_details.Address2'
       ,'vendor_details.Pincode' ,'vendor_details.City'  ,'vendor_details.State'
      )->get();
    }
    public function headings(): array
    {
        return [
            'Office Name',
            'Mode Type',
            'Vendor Code',
            'Vendor Name',
            'Vendor Identification',
            'Nature Of Vendor',
            'FCM_RCM',
            'GST No',
            'Credit Period',
            'Transport Group',
            'RFQ Password',
            'Bank Name',
            'Branch Name ',
            'Branch Address',
            'Name as in Account',
            'Account Type',
            'Account No',
            'IFSC Code',
            'Contact Person',
            'Mobile',
            'Phone',
            'Email',
            'Address1',
            'Address2',
            'Pincode',
            'City',
            'State'
        ];
    }

}