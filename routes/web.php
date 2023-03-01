<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(isset(Auth::user()->Role))
    {
        $role = Auth::user()->Role;
        $project=DB::table('role_with_project_masters')
        ->join('project_masters','project_masters.id','=','role_with_project_masters.ProjectId')
        ->select('project_masters.*')
        ->where('roleId',$role)
       ->get();
        $dataarray['Project']=$project;
    }
    else{
        $dataarray['Project']=[];
    }
    
   
    return view('welcome',$dataarray);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ProductMaster', [App\Http\Controllers\OfficeSetup\ProductController::class, 'index'])->name('ProductMaster');
Route::POST('/AddProduct', [App\Http\Controllers\OfficeSetup\ProductController::class, 'store'])->name('AddProduct');
Route::POST('/ViewProduct', [App\Http\Controllers\OfficeSetup\ProductController::class, 'show'])->name('ViewProduct');
Route::get('/CheckList', [App\Http\Controllers\OfficeSetup\CheckListMasterController::class, 'index'])->name('CheckList');
Route::POST('/AddCheckList', [App\Http\Controllers\OfficeSetup\CheckListMasterController::class, 'store'])->name('AddCheckList');
Route::POST('/ViewCheckList', [App\Http\Controllers\OfficeSetup\CheckListMasterController::class, 'show'])->name('ViewCheckList');
Route::get('/OfficeType', [App\Http\Controllers\OfficeSetup\OfficeTypeMasterController::class, 'index'])->name('OfficeType');
Route::POST('/AddOfficeType', [App\Http\Controllers\OfficeSetup\OfficeTypeMasterController::class, 'store'])->name('AddOfficeType');
Route::POST('/ViewOfficeType', [App\Http\Controllers\OfficeSetup\OfficeTypeMasterController::class, 'show'])->name('ViewOfficeType');

Route::get('/ViewOfficeMaster', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'index'])->name('ViewOfficeMaster');
Route::POST('/getCity', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'getCity'])->name('getCity');
Route::POST('/AddOffcie', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'store'])->name('AddOffcie');
Route::POST('/ViewOffice', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'show'])->name('ViewOffice');
Route::POST('/getPinCode', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'getPinCode'])->name('getPinCode');

Route::get('/AddDesign', [App\Http\Controllers\OfficeSetup\DesignationController::class, 'index'])->name('AddDesign');
Route::POST('/AddDesignation', [App\Http\Controllers\OfficeSetup\DesignationController::class, 'store'])->name('AddDesignation');
Route::POST('/ViewDesignation', [App\Http\Controllers\OfficeSetup\DesignationController::class, 'show'])->name('ViewDesignation');

Route::get('/ViewDept', [App\Http\Controllers\OfficeSetup\DepartmentController::class, 'index'])->name('ViewDept');
Route::POST('/AddDept', [App\Http\Controllers\OfficeSetup\DepartmentController::class, 'store'])->name('AddDept');
Route::POST('/ViewDepartment', [App\Http\Controllers\OfficeSetup\DepartmentController::class, 'show'])->name('ViewDepartment');

Route::get('/EmployeeMaster', [App\Http\Controllers\OfficeSetup\EmployeeController::class, 'index'])->name('EmployeeMaster');
Route::POST('/AddEmployee', [App\Http\Controllers\OfficeSetup\EmployeeController::class, 'store'])->name('AddEmployee');
Route::POST('/ViewEmployee', [App\Http\Controllers\OfficeSetup\EmployeeController::class, 'show'])->name('ViewEmployee');

Route::get('/Complaint', [App\Http\Controllers\OfficeSetup\ComplaintTypeController::class, 'index'])->name('Complaint');
Route::POST('/AddComplaintType', [App\Http\Controllers\OfficeSetup\ComplaintTypeController::class, 'store'])->name('AddComplaintType');
Route::POST('/ViewComple', [App\Http\Controllers\OfficeSetup\ComplaintTypeController::class, 'show'])->name('ViewComple');

Route::get('/NDRMaster', [App\Http\Controllers\OfficeSetup\NdrMasterController::class, 'index'])->name('NDRMaster');
Route::POST('/AddNDR', [App\Http\Controllers\OfficeSetup\NdrMasterController::class, 'store'])->name('AddNDR');
Route::POST('/ViewNDR', [App\Http\Controllers\OfficeSetup\NdrMasterController::class, 'show'])->name('ViewNDR');

Route::get('/ViewDeliveryProof', [App\Http\Controllers\OfficeSetup\DeliveryProofMasterController::class, 'index'])->name('ViewDeliveryProof');
Route::POST('/AddDeliveryProof', [App\Http\Controllers\OfficeSetup\DeliveryProofMasterController::class, 'store'])->name('AddDeliveryProof');
Route::POST('/ViewDpMaster', [App\Http\Controllers\OfficeSetup\DeliveryProofMasterController::class, 'show'])->name('ViewDpMaster');

Route::get('/ViewCountry', [App\Http\Controllers\CompanySetup\CountryMasterController::class, 'index'])->name('ViewCountry');
Route::POST('/AddCountry', [App\Http\Controllers\CompanySetup\CountryMasterController::class, 'store'])->name('AddCountry');
Route::POST('/EditCountry', [App\Http\Controllers\CompanySetup\CountryMasterController::class, 'show'])->name('EditCountry');

Route::get('/StateList', [App\Http\Controllers\OfficeSetup\StateController::class, 'index'])->name('StateList');
Route::POST('/AddState', [App\Http\Controllers\OfficeSetup\StateController::class, 'store'])->name('AddState');
Route::POST('/ViewState', [App\Http\Controllers\OfficeSetup\StateController::class, 'show'])->name('ViewState');

Route::get('/ZoneList', [App\Http\Controllers\CompanySetup\ZoneMasterController::class, 'index'])->name('ZoneList');
Route::POST('/AddZone', [App\Http\Controllers\CompanySetup\ZoneMasterController::class, 'store'])->name('AddZone');
Route::POST('/ViewZone', [App\Http\Controllers\CompanySetup\ZoneMasterController::class, 'show'])->name('ViewZone');

Route::get('/CityMaster', [App\Http\Controllers\OfficeSetup\CityController::class, 'index'])->name('CityMaster');
Route::POST('/AddCity', [App\Http\Controllers\OfficeSetup\CityController::class, 'store'])->name('AddCity');
Route::POST('/ViewCity', [App\Http\Controllers\OfficeSetup\CityController::class, 'show'])->name('ViewCity');

Route::get('/ViewPinCode', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'index'])->name('ViewPinCode');
Route::POST('/getCityForState', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'getCityForState'])->name('getCityForState');
Route::POST('/AddEditPinCode', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'store'])->name('AddEditPinCode');
Route::POST('/PincodeDetails', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'show'])->name('PincodeDetails');

Route::get('/BankMaster', [App\Http\Controllers\CompanySetup\BankMasterController::class, 'index'])->name('BankMaster');
Route::POST('/AddEditBank', [App\Http\Controllers\CompanySetup\BankMasterController::class, 'store'])->name('AddEditBank');
Route::POST('/ViewBank', [App\Http\Controllers\CompanySetup\BankMasterController::class, 'show'])->name('ViewBank');

Route::get('/OperationDashboard', [App\Http\Controllers\Stock\DocketTypeController::class, 'OperationDashboard'])->name('OperationDashboard');
Route::get('/DocketType', [App\Http\Controllers\Stock\DocketTypeController::class, 'index'])->name('DocketType');
Route::Post('/AddDocketType', [App\Http\Controllers\Stock\DocketTypeController::class, 'store'])->name('AddDocketType');
Route::Post('/ViewDocketType', [App\Http\Controllers\Stock\DocketTypeController::class, 'show'])->name('ViewDocketType');

Route::get('/DocketSeriesMaster', [App\Http\Controllers\Stock\DocketSeriesMasterController::class, 'index'])->name('DocketSeriesMaster');
Route::POST('/AddDocketSeies', [App\Http\Controllers\Stock\DocketSeriesMasterController::class, 'store'])->name('AddDocketSeies');
Route::POST('/CheckDocketSeriesInsert', [App\Http\Controllers\Stock\DocketSeriesMasterController::class, 'CheckDocketSeriesInsert'])->name('CheckDocketSeriesInsert');
Route::POST('/ViewDocketSearies', [App\Http\Controllers\Stock\DocketSeriesMasterController::class, 'show'])->name('ViewDocketSearies');
Route::get('/DocketSeriesAllocation', [App\Http\Controllers\Stock\DocketSeriesAllocationController::class, 'index'])->name('DocketSeriesAllocation');
Route::POST('/GetDocketSeries', [App\Http\Controllers\Stock\DocketSeriesAllocationController::class, 'GetDocketSeries'])->name('GetDocketSeries');
Route::POST('/getActulaDocketSeries', [App\Http\Controllers\Stock\DocketSeriesAllocationController::class, 'getActulaDocketSeries'])->name('getActulaDocketSeries');
Route::POST('/AddEditDocketSeriesAll', [App\Http\Controllers\Stock\DocketSeriesAllocationController::class, 'store'])->name('AddEditDocketSeriesAll');

Route::get('/DocketCancel', [App\Http\Controllers\Stock\DockeCancelController::class, 'index'])->name('DocketCancel');
Route::POST('/CancelDocketStattus', [App\Http\Controllers\Stock\DockeCancelController::class, 'store'])->name('CancelDocketStattus');
Route::get('/DocketReport', [App\Http\Controllers\Stock\DockeCancelController::class, 'DocketReport'])->name('DocketReport');

Route::get('/VendorMaster', [App\Http\Controllers\Vendor\VendorMasterController::class, 'index'])->name('VendorMaster');
Route::POST('/AddVendor', [App\Http\Controllers\Vendor\VendorMasterController::class, 'store'])->name('AddVendor');
Route::POST('/ViewVendor', [App\Http\Controllers\Vendor\VendorMasterController::class, 'show'])->name('ViewVendor');

Route::get('/VehicleType', [App\Http\Controllers\Vendor\VehicleTypeController::class, 'index'])->name('VehicleType');
Route::POST('/AddVehicleType', [App\Http\Controllers\Vendor\VehicleTypeController::class, 'store'])->name('AddVehicleType');
Route::POST('/ViewVehicleType', [App\Http\Controllers\Vendor\VehicleTypeController::class, 'show'])->name('ViewVehicleType');

Route::get('/ViewDriver', [App\Http\Controllers\Vendor\DriverMasterController::class, 'index'])->name('ViewDriver');
Route::POST('/AddDriver', [App\Http\Controllers\Vendor\DriverMasterController::class, 'store'])->name('AddDriver');
Route::POST('/ViewDriverDetatils', [App\Http\Controllers\Vendor\DriverMasterController::class, 'show'])->name('ViewDriverDetatils');

Route::get('/ViewVehicle', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'index'])->name('ViewVehicle');
Route::POST('/AddVehicle', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'store'])->name('AddVehicle');
Route::POST('/getVehicleDetails', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'show'])->name('getVehicleDetails');

Route::get('/PickupScan', [App\Http\Controllers\Operation\PickupScanController::class, 'index'])->name('PickupScan');
Route::POST('/GetVendorVehicle', [App\Http\Controllers\Operation\PickupScanController::class, 'show'])->name('GetVendorVehicle');
Route::POST('/AddPickuSacn', [App\Http\Controllers\Operation\PickupScanController::class, 'store'])->name('AddPickuSacn');
Route::get('/PickupScanReport', [App\Http\Controllers\Operation\PickupScanController::class, 'PickupScanReport'])->name('PickupScanReport');
Route::POST('/submitPickupSacn', [App\Http\Controllers\Operation\PickupScanController::class, 'submitPickupSacn'])->name('submitPickupSacn');
//Route::get('/PickupScanReport', [App\Http\Controllers\Operation\PickupScanAndDocketController::class, 'index'])->name('PickupScanReport');
Route::get('/RoleMasterList', [App\Http\Controllers\Role\RoleMasterController::class, 'index'])->name('RoleMasterList');
Route::POST('/AddRole', [App\Http\Controllers\Role\RoleMasterController::class, 'store'])->name('AddRole');
Route::POST('/ViewRoles', [App\Http\Controllers\Role\RoleMasterController::class, 'show'])->name('ViewRoles');

Route::get('/AddProject', [App\Http\Controllers\Project\ProjectMasterController::class, 'index'])->name('AddProject');
Route::POST('/PostProject', [App\Http\Controllers\Project\ProjectMasterController::class, 'store'])->name('PostProject');
Route::POST('/ViewProject', [App\Http\Controllers\Project\ProjectMasterController::class, 'show'])->name('ViewProject');

Route::get('/AddParentManu', [App\Http\Controllers\Role\ParentManuController::class, 'index'])->name('AddParentManu');
Route::POST('/PostParentMenu', [App\Http\Controllers\Role\ParentManuController::class, 'Store'])->name('PostParentMenu');
Route::POST('/ViewParentMenu', [App\Http\Controllers\Role\ParentManuController::class, 'show'])->name('ViewParentMenu');

Route::get('/AddMainMenu', [App\Http\Controllers\Role\MainManuController::class, 'index'])->name('AddMainMenu');
Route::POST('/PostMainMenu', [App\Http\Controllers\Role\MainManuController::class, 'Store'])->name('PostMainMenu');
Route::POST('/ViewMainMenu', [App\Http\Controllers\Role\MainManuController::class, 'show'])->name('ViewMainMenu');

Route::get('/PermissionMaster', [App\Http\Controllers\Role\RoleWisePermissionController::class, 'index'])->name('PermissionMaster');
Route::POST('/ViewRolePermission', [App\Http\Controllers\Role\RoleWisePermissionController::class, 'show'])->name('ViewRolePermission');

Route::POST('/AddRoleAndProject', [App\Http\Controllers\Role\RoleWithProjectMasterController::class, 'Store'])->name('AddRoleAndProject');
Route::POST('/AddRoleAndMenu', [App\Http\Controllers\Role\RoleWithProjectMasterController::class, 'index'])->name('AddRoleAndMenu');

Route::get('/AccountDashboard', [App\Http\Controllers\Account\AccountMasterController::class, 'index'])->name('AccountDashboard');
Route::get('/CustomerMaster', [App\Http\Controllers\Account\CustomerMasterController::class, 'index'])->name('CustomerMaster');
Route::POST('/AddCustomer', [App\Http\Controllers\Account\CustomerMasterController::class, 'Store'])->name('AddCustomer');
Route::POST('/ViewCustomer', [App\Http\Controllers\Account\CustomerMasterController::class, 'show'])->name('ViewCustomer');

Route::get('/CustomerPickupLocationMaster', [App\Http\Controllers\Account\ConsignorMasterController::class, 'index'])->name('CustomerPickupLocationMaster');
Route::POST('/AddConsignor', [App\Http\Controllers\Account\ConsignorMasterController::class, 'Store'])->name('AddConsignor');
Route::POST('/viewConsignor', [App\Http\Controllers\Account\ConsignorMasterController::class, 'show'])->name('viewConsignor');

Route::get('/CustomerDropLocationMaster', [App\Http\Controllers\Account\ConsigneeController::class, 'index'])->name('CustomerDropLocationMaster');
Route::POST('/AddConsignee', [App\Http\Controllers\Account\ConsigneeController::class, 'Store'])->name('AddConsignee');
Route::POST('/viewConsignee', [App\Http\Controllers\Account\ConsigneeController::class, 'show'])->name('viewConsignee');

Route::get('/CreditBooking', [App\Http\Controllers\Operation\CreditBookingController::class, 'index'])->name('CreditBooking');
Route::POST('/getConsignor', [App\Http\Controllers\Operation\CreditBookingController::class, 'getConsignor'])->name('getConsignor');
Route::POST('/getConsignorDetsils', [App\Http\Controllers\Operation\CreditBookingController::class, 'getConsignorDetsils'])->name('getConsignorDetsils');
Route::POST('/CheckDocketIsAvalible', [App\Http\Controllers\Operation\CreditBookingController::class, 'CheckDocketIsAvalible'])->name('CheckDocketIsAvalible');
Route::POST('/postSubmitCreditBoocking', [App\Http\Controllers\Operation\CreditBookingController::class, 'store'])->name('postSubmitCreditBoocking');


Route::get('/CashBooking', [App\Http\Controllers\Operation\CashBookingController::class, 'index'])->name('CashBooking');
Route::get('/docketbookingReport', [App\Http\Controllers\Operation\DocketMasterController::class, 'index'])->name('docketbookingReport');
Route::POST('/postSubmitCashBoocking', [App\Http\Controllers\Operation\CashBookingController::class, 'store'])->name('postSubmitCashBoocking');
Route::POST('/getStateUsingOrigin', [App\Http\Controllers\Operation\CashBookingController::class, 'getStateUsingOrigin'])->name('getStateUsingOrigin');
Route::POST('/getGstPerCustomer', [App\Http\Controllers\Operation\CashBookingController::class, 'getGstPerCustomer'])->name('getGstPerCustomer');

Route::get('/VehicleTripSheetTransaction', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'index'])->name('VehicleTripSheetTransaction');
Route::get('/RouteMaster', [App\Http\Controllers\Operation\RouteMasterController::class, 'index'])->name('RouteMaster');
Route::POST('/AddRouteMaster', [App\Http\Controllers\Operation\RouteMasterController::class, 'store'])->name('AddRouteMaster');
Route::POST('/ViewRoute', [App\Http\Controllers\Operation\RouteMasterController::class, 'ViewRoute'])->name('ViewRoute');

Route::POST('/getSourceAndDest', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'getSourceAndDest'])->name('getSourceAndDest');
Route::POST('/AddFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'store'])->name('AddFcm');
Route::POST('/CancelFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'CancelFcm'])->name('CancelFcm');
Route::POST('/CloseFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'CloseFcm'])->name('CloseFcm');
Route::POST('/Print_FpmNo', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'Print_FpmNo'])->name('Print_FpmNo');
Route::GET('/print_fpm_Number/{id}', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'print_fpm_Number'])->name('print_fpm_Number/{id}');

Route::get('/VehicleGatepass', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'index'])->name('VehicleGatepass');
Route::POST('/getFcmDetails', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'getFcmDetails'])->name('getFcmDetails');
Route::POST('/getOffcieByCity', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'getOffcieByCity'])->name('getOffcieByCity');
Route::POST('/CheckDocketIsBooked', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'CheckDocketIsBooked'])->name('CheckDocketIsBooked');
Route::POST('/SubmitVehicleGatePass', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'store'])->name('SubmitVehicleGatePass');
Route::POST('/GatePassWithDocket', [App\Http\Controllers\Operation\GatePassWithDocketController::class, 'store'])->name('GatePassWithDocket');

// -----------------------------Cash Managment-------------------------------
Route::get('/CashDashboard', [App\Http\Controllers\Cash\CashManagment::class, 'CashDashboard'])->name('CashDashboard');
Route::get('/CashDepositHo', [App\Http\Controllers\Cash\CashManagment::class, 'CashDepositHo'])->name('CashDepositHo');
Route::POST('/GetFormDepoAmount', [App\Http\Controllers\Cash\CashManagment::class, 'GetFormDepoAmount'])->name('GetFormDepoAmount');
Route::POST('/PostCashDepostHO', [App\Http\Controllers\Cash\CashManagment::class, 'PostCashDepostHO'])->name('PostCashDepostHO');

Route::get('/ExpenseClaimed', [App\Http\Controllers\Cash\CashManagment::class, 'ExpenseClaimed'])->name('PostCashDepostHO');
Route::POST('/ExpenseClaimed', [App\Http\Controllers\Cash\CashManagment::class, 'ExpenseClaimed'])->name('PostCashDepostHO');
Route::get('/AdvancePayout', [App\Http\Controllers\Cash\CashManagment::class, 'AdvancePayout'])->name('AdvancePayout');
Route::POST('/PostAdvancePayout', [App\Http\Controllers\Cash\CashManagment::class, 'PostAdvancePayout'])->name('PostAdvancePayout');

Route::get('/ExpenseRequestApproved', [App\Http\Controllers\Cash\CashManagment::class, 'ExpenseRequestApproved'])->name('ExpenseRequestApproved');
Route::POST('/ExpenseRequestApproved', [App\Http\Controllers\Cash\CashManagment::class, 'ExpenseRequestApproved'])->name('ExpenseRequestApproved');




Route::POST('webadmin/ExpenseClaimed', 'admin\CashManagment@ExpenseClaimed');

Route::Post('webadmin/CashDashboard', 'admin\CashManagment@CashDashboard');
Route::get('webadmin/DownloadCash', 'admin\CashManagment@DownloadCash');
Route::get('webadmin/CashTransfer', 'admin\CashManagment@CashTransfer');

Route::POST('webadmin/PostCashEntry', 'admin\CashManagment@PostCashEntry');




Route::get('webadmin/AdvancePayout', 'admin\CashManagment@AdvancePayout');
Route::get('webadmin/ExpenseClaimed', 'admin\CashManagment@ExpenseClaimed');
Route::get('webadmin/ExpenseClaimedEdit', 'admin\CashManagment@ExpenseClaimedEdit');
Route::POST('webadmin/ExpenseClaimedEdit', 'admin\CashManagment@ExpenseClaimedEdit');
Route::POST('webadmin/GetAdviceDetails', 'admin\CashManagment@GetAdviceDetails');
Route::POST('webadmin/GetAdviceDetailsInner', 'admin\CashManagment@GetAdviceDetailsInner');
Route::POST('webadmin/DeleteLaneImapress', 'admin\CashManagment@DeleteLaneImapress');
Route::get('webadmin/ExpenseCancle', 'admin\CashManagment@ExpenseCancle');
Route::POST('webadmin/CancleAdvice', 'admin\CashManagment@CancleAdvice');
Route::get('webadmin/CashLedger', 'admin\CashManagment@CashLedger');
Route::POST('webadmin/CashLedger', 'admin\CashManagment@CashLedger');
Route::get('webadmin/CashPaymentRegister', 'admin\CashManagment@CashPaymentRegister');
Route::POST('webadmin/CashPaymentRegister', 'admin\CashManagment@CashPaymentRegister');
Route::get('webadmin/ExpenseRegister', 'admin\CashManagment@ExpenseRegister');
Route::POST('webadmin/ExpenseRegister', 'admin\CashManagment@ExpenseRegister');

Route::get('webadmin/HeadWiseRegisterNew', 'admin\CashManagment@HeadWiseRegisterNew');
Route::POST('webadmin/HeadWiseRegisterNew', 'admin\CashManagment@HeadWiseRegisterNew');
Route::POST('webadmin/HeadWiseRegisterModel','admin\CashManagment@HeadWiseRegisterModel');

Route::get('webadmin/ExpenseRegisterDetails', 'admin\CashManagment@ExpenseRegisterDetails');
Route::POST('webadmin/ExpenseRegisterDetails', 'admin\CashManagment@ExpenseRegisterDetails');
Route::get('webadmin/downloadHeadWiseRegisterDetails/{id}', 'admin\CashManagment@downloadHeadWiseRegisterDetails');

Route::get('webadmin/CashRequest', 'admin\CashManagment@CashRequest');
Route::get('webadmin/CashRequestApproved', 'admin\CashManagment@CashRequestApproved');
Route::POST('webadmin/CashRequestApproved', 'admin\CashManagment@CashRequestApproved');
Route::POST('webadmin/PostCashRequest', 'admin\CashManagment@PostCashRequest');
Route::POST('webadmin/PostCashRequestApproved', 'admin\CashManagment@PostCashRequestApproved');


Route::get('webadmin/ExpenseRequest', 'admin\CashManagment@ExpenseRequest');

Route::POST('webadmin/PostExpenseRequest', 'admin\CashManagment@PostExpenseRequest');
Route::POST('webadmin/PostExpenseRequestApproved', 'admin\CashManagment@PostExpenseRequestApproved');
Route::POST('webadmin/PostExpenseRequestRejected', 'admin\CashManagment@PostExpenseRequestRejected');