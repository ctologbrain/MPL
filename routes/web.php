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
Route::POST('/getVendorDetailsForSearch', [App\Http\Controllers\Vendor\VendorMasterController::class, 'getVendorDetailsForSearch'])->name('getVendorDetailsForSearch');
Route::POST('/GetEmployeDetailsForSearch', [App\Http\Controllers\OfficeSetup\EmployeeController::class, 'GetEmployeDetailsForSearch'])->name('GetEmployeDetailsForSearch');





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
Route::POST('/GetDriverDetailsForSearch', [App\Http\Controllers\Vendor\DriverMasterController::class, 'GetDriverDetailsForSearch'])->name('GetDriverDetailsForSearch');

Route::get('/ViewVehicle', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'index'])->name('ViewVehicle');
Route::POST('/AddVehicle', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'store'])->name('AddVehicle');
Route::POST('/getVehicleDetails', [App\Http\Controllers\Vendor\VehicleMasterController::class, 'show'])->name('getVehicleDetails');

Route::get('/PickupScan', [App\Http\Controllers\Operation\PickupScanController::class, 'index'])->name('PickupScan');
Route::POST('/GetVendorVehicle', [App\Http\Controllers\Operation\PickupScanController::class, 'show'])->name('GetVendorVehicle');
Route::POST('/AddPickuSacn', [App\Http\Controllers\Operation\PickupScanController::class, 'store'])->name('AddPickuSacn');
Route::get('/PickupScanReport', [App\Http\Controllers\Operation\PickupScanController::class, 'PickupScanReport'])->name('PickupScanReport');
Route::get('/UserExport', [App\Http\Controllers\Operation\PickupScanController::class, 'UserExport'])->name('UserExport');
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
Route::POST('/CheckDocketIsAvalibleRTo', [App\Http\Controllers\Operation\CreditBookingController::class, 'CheckDocketIsAvalibleRTo'])->name('CheckDocketIsAvalibleRTo');
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

Route::POST('/EditRoute', [App\Http\Controllers\Operation\RouteMasterController::class, 'EditRoute'])->name('EditRoute');
Route::POST('/EditRoutePage', [App\Http\Controllers\Operation\RouteMasterController::class, 'EditRoutePage'])->name('EditRoutePage');

Route::POST('/ActiveRoute', [App\Http\Controllers\Operation\RouteMasterController::class, 'ActiveRoute'])->name('ActiveRoute');

Route::POST('/DeleteRoute', [App\Http\Controllers\Operation\RouteMasterController::class, 'DeleteRoute'])->name('DeleteRoute');
Route::POST('/ADDRoute', [App\Http\Controllers\Operation\RouteMasterController::class, 'ADDRoute'])->name('ADDRoute');


Route::POST('/getSourceAndDest', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'getSourceAndDest'])->name('getSourceAndDest');
Route::POST('/AddFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'store'])->name('AddFcm');
Route::POST('/CancelFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'CancelFcm'])->name('CancelFcm');
Route::POST('/CloseFcm', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'CloseFcm'])->name('CloseFcm');
Route::POST('/Print_FpmNo', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'Print_FpmNo'])->name('Print_FpmNo');
Route::GET('/print_fpm_Number/{id}', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'print_fpm_Number'])->name('print_fpm_Number/{id}');
Route::GET('/FpmReport', [App\Http\Controllers\Operation\VehicleTripSheetTransactionController::class, 'FpmReport'])->name('FpmReport');

Route::get('/VehicleGatepass', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'index'])->name('VehicleGatepass');
Route::POST('/getFcmDetails', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'getFcmDetails'])->name('getFcmDetails');
Route::POST('/getOffcieByCity', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'getOffcieByCity'])->name('getOffcieByCity');
Route::POST('/CheckDocketIsBooked', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'CheckDocketIsBooked'])->name('CheckDocketIsBooked');
Route::POST('/SubmitVehicleGatePass', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'store'])->name('SubmitVehicleGatePass');
Route::POST('/GatePassWithDocket', [App\Http\Controllers\Operation\GatePassWithDocketController::class, 'store'])->name('GatePassWithDocket');
Route::get('/print_gate_Number/{id}/{id1}/{id2}', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'print_gate_Number'])->name('print_gate_Number/{id}/{id1}/{id2}');
Route::get('/VehicleGatepassReport', [App\Http\Controllers\Operation\VehicleGatepassController::class, 'show'])->name('VehicleGatepassReport');

Route::get('/PartLoadMapping', [App\Http\Controllers\Operation\PartTruckLoadController::class, 'index'])->name('PartLoadMapping');
Route::POST('/PartTruckLoadSubmition', [App\Http\Controllers\Operation\PartTruckLoadController::class, 'store'])->name('PartTruckLoadSubmition');
Route::POST('/CheckDocketIsAvalibleForPartLoad', [App\Http\Controllers\Operation\PartTruckLoadController::class, 'CheckDocketIsAvalibleForPartLoad'])->name('CheckDocketIsAvalibleForPartLoad');

Route::get('/GateReceiving', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'index'])->name('GateReceiving');
Route::POST('/getGatePassDetails', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'getGatePassDetails'])->name('getGatePassDetails');
Route::POST('/GetDocketWithGatePass', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'GetDocketWithGatePass'])->name('GetDocketWithGatePass');
Route::POST('/SubmitVehicleGatePassRe', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'store'])->name('SubmitVehicleGatePassRe');



Route::get('/DRSEntry', [App\Http\Controllers\Operation\DRSEntryController::class, 'index'])->name('DRSEntry');
Route::POST('/SubmiDrsEntry', [App\Http\Controllers\Operation\DRSEntryController::class, 'store'])->name('SubmiDrsEntry');
Route::POST('/GetDocketWithDrsEntry', [App\Http\Controllers\Operation\DRSEntryController::class, 'GetDocketWithDrsEntry'])->name('GetDocketWithDrsEntry');
Route::POST('/deleteDocket', [App\Http\Controllers\Operation\DRSEntryController::class, 'destroy'])->name('deleteDocket');

Route::get('/DRSWiseUpdation', [App\Http\Controllers\Operation\DrsDeliveryController::class, 'index'])->name('DRSWiseUpdation');
Route::POST('/getDrsEntryNumber', [App\Http\Controllers\Operation\DrsDeliveryController::class, 'getDrsEntryNumber'])->name('getDrsEntryNumber');
Route::POST('/submitDrsDelivery', [App\Http\Controllers\Operation\DrsDeliveryController::class, 'store'])->name('submitDrsDelivery');

Route::get('/DRSEntryReport', [App\Http\Controllers\Operation\DRSEntryController::class, 'show'])->name('DRSEntryReport');
Route::get('/RegularDelivery', [App\Http\Controllers\Operation\RegularDeliveryController::class, 'index'])->name('RegularDelivery');
Route::POST('/GetDocketForDelivery', [App\Http\Controllers\Operation\RegularDeliveryController::class, 'GetDocketForDelivery'])->name('GetDocketForDelivery');
Route::POST('/submitRegularDocketDelivery', [App\Http\Controllers\Operation\RegularDeliveryController::class, 'store'])->name('submitRegularDocketDelivery');

Route::get('/RTOTransaction', [App\Http\Controllers\Operation\RTOController::class, 'index'])->name('RTOTransaction');
Route::POST('/getDocketDetailsForRTo', [App\Http\Controllers\Operation\RTOController::class, 'show'])->name('getDocketDetailsForRTo');
Route::POST('/SubmitRTO', [App\Http\Controllers\Operation\RTOController::class, 'store'])->name('SubmitRTO');

Route::get('/VehicleReplacement', [App\Http\Controllers\Operation\VehicleReplacementController::class, 'index'])->name('VehicleReplacement');
Route::POST('/getVehicleGateDetailsById', [App\Http\Controllers\Operation\VehicleReplacementController::class, 'getVehicleGateDetailsById'])->name('getVehicleGateDetailsById');
Route::POST('/SubmitVehicleReplacment', [App\Http\Controllers\Operation\VehicleReplacementController::class, 'store'])->name('SubmitVehicleReplacment');

Route::get('/ColoaderManifest', [App\Http\Controllers\Operation\ColoaderManifestController::class, 'index'])->name('ColoaderManifest');
Route::POST('/SubmitColoderManiFest', [App\Http\Controllers\Operation\ColoaderManifestController::class, 'store'])->name('SubmitColoderManiFest');
Route::POST('/CheckColoderDocket', [App\Http\Controllers\Operation\ColoaderDocketTransactionController::class, 'show'])->name('CheckColoderDocket');
 Route::POST('/CheckColoderGatePass', [App\Http\Controllers\Operation\ColoaderDocketTransactionController::class, 'CheckColoderGatePass'])->name('CheckColoderGatePass');
Route::POST('/SubmitColoderDocket', [App\Http\Controllers\Operation\ColoaderDocketTransactionController::class, 'store'])->name('SubmitColoderDocket');




Route::get('/StockSummaryReport', [App\Http\Controllers\MIS\StockSummaryReportController::class, 'index'])->name('StockSummaryReport');
Route::get('/StockSummaryDetails', [App\Http\Controllers\MIS\StockSummaryReportController::class, 'show'])->name('StockSummaryDetails');


Route::get('/CustomerTariff', [App\Http\Controllers\Account\CustomerTariffController::class, 'index'])->name('CustomerTariff');
Route::POST('/CusomerTafiffModel', [App\Http\Controllers\Account\CustomerTariffController::class, 'CusomerTafiffModel'])->name('CusomerTafiffModel');

Route::POST('/submitTarrifDataPost', [App\Http\Controllers\Account\CustomerTariffController::class, 'submitTarrifDataPost'])->name('submitTarrifDataPost');
Route::POST('/TarrifTypeAccoToS', [App\Http\Controllers\Account\CustomerTariffController::class, 'TarrifTypeAccoToS'])->name('TarrifTypeAccoToS');
Route::POST('/TarrifTypeAccoToD', [App\Http\Controllers\Account\CustomerTariffController::class, 'TarrifTypeAccoToD'])->name('TarrifTypeAccoToD');

Route::get('/CustomerInvoice', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'index'])->name('CustomerInvoice');
Route::POST('/GetDocketForInv', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'show'])->name('GetDocketForInv');
Route::POST('/SubmitInvoice', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'SubmitInvoice'])->name('SubmitInvoice');
Route::get('/CustomerInvoiceRegister', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'CustomerInvoiceRegister'])->name('CustomerInvoiceRegister');
Route::POST('/CancelInvoice', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'CancelInvoice'])->name('CancelInvoice');

Route::get('/SupplementaryBill', [App\Http\Controllers\Account\CustomerSupplementaryBillController::class, 'index'])->name('SupplementaryBill');
Route::POST('/CheckSupplyMantryInvoice', [App\Http\Controllers\Account\CustomerSupplementaryBillController::class, 'show'])->name('CheckSupplyMantryInvoice');
Route::POST('/CheckDocketInInvoice', [App\Http\Controllers\Account\CustomerSupplementaryBillController::class, 'CheckDocketInInvoice'])->name('CheckDocketInInvoice');
Route::POST('/submitSupplementryInvoice', [App\Http\Controllers\Account\CustomerSupplementaryBillController::class, 'store'])->name('submitSupplementryInvoice');

Route::get('/CustomerCreditNote', [App\Http\Controllers\Account\CreditNoteController::class, 'index'])->name('CustomerCreditNote');
Route::POST('/GetCustomerDetsilsCredit', [App\Http\Controllers\Account\CreditNoteController::class, 'GetCustomerDetsilsCredit'])->name('GetCustomerDetsilsCredit');
Route::POST('/CheckInvoiceCreditNode', [App\Http\Controllers\Account\CreditNoteController::class, 'CheckInvoiceCreditNode'])->name('CheckInvoiceCreditNode');
Route::POST('/SubmitCreditNode', [App\Http\Controllers\Account\CreditNoteController::class, 'store'])->name('SubmitCreditNode');
Route::POST('/CancelCreditNode', [App\Http\Controllers\Account\CreditNoteController::class, 'CancelCreditNode'])->name('CancelCreditNode');
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

Route::get('/GateReceivingReport', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'show'])->name('GateReceiving');

Route::get('/GatePassCanceled', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'GatePassCanceled'])->name('GatePassCanceled');
Route::POST('/GatePassCanceledPost', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'GatePassCanceledPost'])->name('GatePassCanceledPost');

Route::POST('/GatePassAllInfomation', [App\Http\Controllers\Operation\GatePassReceivingController::class, 'GatePassAllInfomation'])->name('GatePassAllInfomation');


Route::POST('/NoDelveryPost', [App\Http\Controllers\Operation\NoDelveryController::class, 'store'])->name('NoDelveryPost');
Route::get('/NoDelivery', [App\Http\Controllers\Operation\NoDelveryController::class, 'index'])->name('NoDelivery');
Route::POST('/CheckDocketNo', [App\Http\Controllers\Operation\NoDelveryController::class, 'CheckDocketNo'])->name('CheckDocketNo');

Route::get('/DeliveryOrderDelay', [App\Http\Controllers\Operation\NoDelveryController::class, 'DeliveryOrderDelay'])->name('DeliveryOrderDelay');
Route::POST('/DeliveryOrderDelayPost', [App\Http\Controllers\Operation\NoDelveryController::class, 'DeliveryOrderDelayPost'])->name('DeliveryOrderDelayPost');
//GatePassCanceled


Route::get('/UploadDocketImage', [App\Http\Controllers\Operation\UploadDocketController::class, 'index'])->name('UploadDocketImage');
Route::POST('/UploadDocketPost', [App\Http\Controllers\Operation\UploadDocketController::class, 'store'])->name('UploadDocketPost');


Route::get('/OffLoadEntry', [App\Http\Controllers\Operation\OffLoadEntryController::class, 'index'])->name('OffLoadEntry');

Route::POST('/OffLoadEntryPost', [App\Http\Controllers\Operation\OffLoadEntryController::class, 'store'])->name('OffLoadEntryPost');
Route::POST('/GetDocketOffLoadPost', [App\Http\Controllers\Operation\OffLoadEntryController::class, 'GetDocketOffLoadPost'])->name('GetDocketOffLoadPost');

Route::get('/MissingGatePassWithDocket', [App\Http\Controllers\Operation\MissingGatePassWithDocketController::class, 'index'])->name('MissingGatePassWithDocket');

Route::get('/MissingGatePassWithDocket', [App\Http\Controllers\Operation\MissingGatePassWithDocketController::class, 'index'])->name('MissingGatePassWithDocket');

Route::get('/GatePassTransfer', [App\Http\Controllers\Operation\GatePassTransferController::class, 'index'])->name('GatePassTransfer');
Route::get('/docketTracking', [App\Http\Controllers\Operation\DocketTrackingController::class, 'index'])->name('docketTracking');
Route::get('/fpmTracking', [App\Http\Controllers\Operation\FpmTrackingController::class, 'index'])->name('fpmTracking');
Route::POST('/fpmTrackingData', [App\Http\Controllers\Operation\FpmTrackingController::class, 'show'])->name('fpmTracking');

Route::get('/freightTracking', [App\Http\Controllers\Operation\FreightTrackingController::class, 'index'])->name('freightTracking');
Route::get('/TatCalculator', [App\Http\Controllers\Operation\TatCalculatorController::class, 'index'])->name('TatCalculator');

Route::get('/MultipleDocketTracking', [App\Http\Controllers\Operation\MultipleDocketTrackingController::class, 'index'])->name('MultipleDocketTracking');

Route::POST('/getGatePassWithDocInfo', [App\Http\Controllers\Operation\GatePassTransferController::class, 'getGatePassWithDocInfo'])->name('getGatePassWithDocInfo');
Route::POST('/getMutiDocketOnGate', [App\Http\Controllers\Operation\GatePassTransferController::class, 'getMutiDocketOnGate'])->name('getMutiDocketOnGate');

Route::POST('/submitGatepassTransfer', [App\Http\Controllers\Operation\GatePassTransferController::class, 'store'])->name('submitGatepassTransfer');

Route::POST('/submitGatepassTransfer', [App\Http\Controllers\Operation\GatePassTransferController::class, 'store'])->name('submitGatepassTransfer');

Route::get('/MissingGatePassWithDocketDownload', [App\Http\Controllers\Operation\MissingGatePassWithDocketController::class, 'MissingGatePassWithDocketDownload'])->name('MissingGatePassWithDocketDownload');

Route::get('/Topaycollection', [App\Http\Controllers\Operation\TopaycollectionController::class, 'index'])->name('Topaycollection');

Route::POST('/getDocketInformation', [App\Http\Controllers\Operation\TopaycollectionController::class, 'getDocketInformation'])->name('Topaycollection');
Route::POST('/TopaycollectionPost', [App\Http\Controllers\Operation\TopaycollectionController::class, 'store'])->name('TopaycollectionPost');

Route::get('/TopaycollectionReport', [App\Http\Controllers\Operation\TopaycollectionController::class, 'show'])->name('TopaycollectionReport');

Route::get('/EditDocketBooking', [App\Http\Controllers\Operation\EditDocketBookingController::class, 'index'])->name('EditDocketBooking');
Route::POST('/EditDocketBookingData', [App\Http\Controllers\Operation\EditDocketBookingController::class, 'show'])->name('EditDocketBookingData');
Route::POST('/PostEditDocketBooking', [App\Http\Controllers\Operation\EditDocketBookingController::class, 'store'])->name('PostEditDocketBooking');
Route::POST('/EditDocketInvoiceDetail', [App\Http\Controllers\Operation\EditDocketBookingController::class, 'EditDocketInvoiceDetail'])->name('EditDocketInvoiceDetail');

Route::POST('/DeleteDocketInvoiceDetail', [App\Http\Controllers\Operation\EditDocketBookingController::class, 'DeleteDocketInvoiceDetail'])->name('DeleteDocketInvoiceDetail');

Route::get('/EditPickupScan', [App\Http\Controllers\tooladmin\EditPickupScanController::class, 'index'])->name('EditPickupScan');
Route::POST('/EditPickupScanData', [App\Http\Controllers\tooladmin\EditPickupScanController::class, 'show'])->name('EditPickupScanData');

Route::POST('/PostEditPickupScan', [App\Http\Controllers\tooladmin\EditPickupScanController::class, 'store'])->name('PostEditPickupScanData');
Route::POST('/EditPickupScanPrint', [App\Http\Controllers\tooladmin\EditPickupScanController::class, 'EditPickupScanPrint'])->name('EditPickupScanPrint');

Route::get('/EditToPayCollection', [App\Http\Controllers\tooladmin\EditToPayCollectionController::class, 'index'])->name('EditToPayCollection');

Route::POST('/EditToPayCollectionData', [App\Http\Controllers\tooladmin\EditToPayCollectionController::class, 'show'])->name('EditToPayCollectionData');
Route::POST('/DocketDepositTransDataGet', [App\Http\Controllers\tooladmin\EditToPayCollectionController::class, 'DocketDepositTransDataGet'])->name('DocketDepositTransDataGet');

Route::POST('/EditToPayCollectionPost', [App\Http\Controllers\tooladmin\EditToPayCollectionController::class, 'store'])->name('EditToPayCollectionPost');

Route::POST('/GetCustomerDetailsForSearch', [App\Http\Controllers\Account\CustomerMasterController::class, 'GetCustomerDetailsForSearch'])->name('GetCustomerDetailsForSearch');

Route::POST('/GetOriginDetailsForSearch', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'GetOriginDetailsForSearch'])->name('GetOriginDetailsForSearch');

Route::POST('/GetDestDetailsForSearch', [App\Http\Controllers\CompanySetup\PincodeMasterController::class, 'GetDestDetailsForSearch'])->name('GetDestDetailsForSearch');

Route::POST('/GetConsinerDetailsForSearch', [App\Http\Controllers\Account\ConsignorMasterController::class, 'GetConsinerDetailsForSearch'])->name('GetConsinerDetailsForSearch');

Route::POST('/GetCityDetailsForSearch', [App\Http\Controllers\OfficeSetup\CityController::class, 'GetCityDetailsForSearch'])->name('GetCityDetailsForSearch');



Route::get('/CustomerOtherCharges', [App\Http\Controllers\Account\CustomerOtherChargesController::class, 'index'])->name('CustomerOtherCharges');

Route::POST('/CustomerOtherChargesPost', [App\Http\Controllers\Account\CustomerOtherChargesController::class, 'store'])->name('CustomerOtherChargesPost');
Route::POST('/OtherCustomerChargeData', [App\Http\Controllers\Account\CustomerOtherChargesController::class, 'show'])->name('OtherCustomerChargeData');
Route::POST('/getCustomerActive', [App\Http\Controllers\Account\CustomerOtherChargesController::class, 'getCustomerActive'])->name('getCustomerActive');

Route::POST('/getCustomerActive', [App\Http\Controllers\Account\CustomerOtherChargesController::class, 'getCustomerActive'])->name('getCustomerActive');

Route::get('/CustomerChargesMapWithCustomer', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'index'])->name('CustomerChargesMapWithCustomer');

Route::POST('/CustomerChargesMapWithCustomerData', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'show'])->name('CustomerChargesMapWithCustomerData');
Route::POST('/GetChargeAccCust', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'GetChargeAccCust'])->name('GetChargeAccCust');
Route::POST('/getSourceAndDestForCust', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'getSourceAndDestForCust'])->name('getSourceAndDestForCust');
Route::POST('/CustomerChargesMapWithCustomerPost', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'store'])->name('CustomerChargesMapWithCustomerPost');

Route::POST('/getCustomerDetailsData', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'getCustomerDetailsData'])->name('getCustomerDetailsData');

Route::POST('/getCustomerMapWithCustomerData', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'getCustomerMapWithCustomerData'])->name('getCustomerMapWithCustomerData');
Route::POST('/ViewOtherChargesDetails', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'ViewOtherChargesDetails'])->name('ViewOtherChargesDetails');

Route::get('/CustomerDocketOtherCharges', [App\Http\Controllers\Account\CustomerDocketOtherChargesController::class, 'index'])->name('CustomerDocketOtherCharges');
Route::POST('/CustomerDocketOtherChargesData', [App\Http\Controllers\Account\CustomerDocketOtherChargesController::class, 'store'])->name('CustomerDocketOtherChargesData');
Route::POST('/getDocketDetailForCharge', [App\Http\Controllers\Account\CustomerDocketOtherChargesController::class, 'show'])->name('getDocketDetailForCharge');

Route::POST('/getCustomerDetailsView', [App\Http\Controllers\Operation\CreditBookingController::class, 'getCustomerDetailsView'])->name('getCustomerDetailsView');

//
Route::get('/CustomerTariffReport', [App\Http\Controllers\Account\CustomerTariffController::class, 'CustomerTariffReport'])->name('CustomerTariffReport');

Route::get('/KycOfficeMaster', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'KycOfficeView'])->name('KycOfficeMaster');
Route::POST('/KycOfficePost', [App\Http\Controllers\OfficeSetup\OfficeMasterController::class, 'KycOfficePost'])->name('KycOfficePost');

Route::get('/KycVendorMaster', [App\Http\Controllers\Vendor\VendorMasterController::class, 'KycVendorView'])->name('KycVendorMaster');
Route::POST('/KycVendorPost', [App\Http\Controllers\Vendor\VendorMasterController::class, 'KycVendorPost'])->name('KycVendorPost');

Route::get('/StockTransfer', [App\Http\Controllers\Stock\StockTransferController::class, 'index'])->name('StockTransfer');
Route::POST('/StockTransferPost', [App\Http\Controllers\Stock\StockTransferController::class, 'store'])->name('StockTransferPost');

Route::POST('/GetDocketSeriesStock', [App\Http\Controllers\Stock\StockTransferController::class, 'GetDocketSeriesStock'])->name('GetDocketSeriesStock');

Route::POST('/getActulaDocketSeriesStock', [App\Http\Controllers\Stock\StockTransferController::class, 'getActulaDocketSeriesStock'])->name('getActulaDocketSeriesStock');

Route::get('/ContentsMaster', [App\Http\Controllers\OfficeSetup\ContentsMasterController::class, 'index'])->name('ContentsMaster');
Route::POST('/ContentsMasterPost', [App\Http\Controllers\OfficeSetup\ContentsMasterController::class, 'store'])->name('ContentsMasterPost');
Route::POST('/ContentsMasterData', [App\Http\Controllers\OfficeSetup\ContentsMasterController::class, 'show'])->name('ContentsMasterData');

Route::POST('/DeleteDocketType', [App\Http\Controllers\Stock\DocketTypeController::class, 'DeleteDocketType'])->name('DeleteDocketType');
Route::get('/OtherChargeMapReport', [App\Http\Controllers\Account\CustomerChargesMapWithCustomerController::class, 'OtherChargeMapReport'])->name('OtherChargeMapReport');

Route::get('/printInvoiceTex/{pre}/{con}/{id}/{supInv?}', [App\Http\Controllers\Account\CustomerInvoiceController::class, 'printInvoiceTex'])->name('printInvoiceTex');
Route::POST('/GetDocketInvoiceDetail', [App\Http\Controllers\Operation\DocketTrackingController::class, 'GetDocketInvoiceDetail'])->name('GetDocketInvoiceDetail');

Route::get('/UploadInvoice/', [App\Http\Controllers\Account\UploadInvoiceController::class, 'index'])->name('UploadInvoice');

Route::POST('/UploadInvoicePost/', [App\Http\Controllers\Account\UploadInvoiceController::class, 'store'])->name('UploadInvoicePost');
Route::POST('/UploadInvoiceData/', [App\Http\Controllers\Account\UploadInvoiceController::class, 'show'])->name('UploadInvoiceData');

Route::get('/CustomerDebitNote', [App\Http\Controllers\Account\DebitNoteController::class, 'index'])->name('CustomerDebitNote');
Route::POST('/GetAllCustDetails', [App\Http\Controllers\Account\DebitNoteController::class, 'show'])->name('GetAllCustDetails');
Route::POST('/GetAllInvoiceDetails', [App\Http\Controllers\Account\DebitNoteController::class, 'GetAllInvoiceDetails'])->name('GetAllInvoiceDetails');
Route::POST('/SubmitDebitNode', [App\Http\Controllers\Account\DebitNoteController::class, 'store'])->name('SubmitDebitNode');


Route::get('/PrintDRSEntry/{DrsNo}', [App\Http\Controllers\Operation\DRSEntryController::class, 'PrintDRSEntry'])->name('PrintDRSEntry');
Route::get('/PrintColoaderManifest', [App\Http\Controllers\Operation\ColoaderManifestController::class, 'PrintColoaderManifest'])->name('PrintColoaderManifest');


Route::get('/TopayCollectionReconciliation/', [App\Http\Controllers\Account\ReconCashAndToPayController::class, 'index'])->name('TopayCollectionReconciliation');
Route::post('/getTripReconsilation/', [App\Http\Controllers\Account\ReconCashAndToPayController::class, 'show'])->name('getTripReconsilation');
Route::post('/UpdateDocketRefrence/', [App\Http\Controllers\Account\ReconCashAndToPayController::class, 'store'])->name('UpdateDocketRefrence');

Route::get('/CODTransfer/', [App\Http\Controllers\Account\CodDepositeController::class, 'index'])->name('CODTransfer');
Route::POST('/GetDocketForCod/', [App\Http\Controllers\Account\CodDepositeController::class, 'show'])->name('GetDocketForCod');
Route::POST('/SubmitCodTranfer/', [App\Http\Controllers\Account\CodDepositeController::class, 'store'])->name('SubmitCodTranfer');

Route::get('/MoneyRecept/', [App\Http\Controllers\Account\MoneyReceiptController::class, 'index'])->name('MoneyRecept');
Route::post('/GetInvoiceToMoneyReceipt/', [App\Http\Controllers\Account\MoneyReceiptController::class, 'show'])->name('GetInvoiceToMoneyReceipt');
Route::post('/submitMoneyRecept/', [App\Http\Controllers\Account\MoneyReceiptController::class, 'store'])->name('submitMoneyRecept');

Route::get('/CustomerMasterLogIn', [App\Http\Controllers\Account\CustomerMasterLogInController::class, 'index'])->name('CustomerMasterLogIn');
Route::POST('/CustomerMasterLogInPost', [App\Http\Controllers\Account\CustomerMasterLogInController::class, 'store'])->name('CustomerMasterLogInPost');
Route::POST('/CustomerMasterLogInView', [App\Http\Controllers\Account\CustomerMasterLogInController::class, 'show'])->name('CustomerMasterLogInView');

Route::get('/DepositDocketReport', [App\Http\Controllers\Operation\TopaycollectionController::class, 'DepositDocketReport'])->name('DepositDocketReport');

Route::get('/NoDeliveryReport', [App\Http\Controllers\Operation\NoDelveryController::class, 'NoDeliveryReport'])->name('NoDeliveryReport');

Route::get('/DeliveryReport', [App\Http\Controllers\Operation\RegularDeliveryController::class, 'DeliveryReport'])->name('DeliveryReport');

Route::get('/DRSReportDetails/{DRSNO?}/{Pending?}', [App\Http\Controllers\Operation\DRSEntryController::class, 'DRSReportDetails'])->name('DRSReportDetails');

Route::get('/NDRReportDetails/{DRSNO}', [App\Http\Controllers\Operation\DRSEntryController::class, 'NDRReportDetails'])->name('NDRReportDetails');
Route::get('/RTOReportDetails/{DRSNO}', [App\Http\Controllers\Operation\DRSEntryController::class, 'RTOReportDetails'])->name('RTOReportDetails');
Route::get('/DELVReportDetails/{DRSNO}', [App\Http\Controllers\Operation\DRSEntryController::class, 'DELVReportDetails'])->name('DELVReportDetails');

Route::get('/DocketBookingCustomerWise', [App\Http\Controllers\Operation\DocketMasterController::class, 'DocketBookingCustomerWise'])->name('DocketBookingCustomerWise');

Route::get('/DocketHubStatusWise', [App\Http\Controllers\Operation\DocketMasterController::class, 'DocketHubStatusWise'])->name('DocketHubStatusWise');
Route::get('/DocketAtoZReport', [App\Http\Controllers\Operation\DocketMasterController::class, 'DocketAtoZReport'])->name('DocketAtoZReport');

Route::get('/BookinAZDetails/{origin}/{category}', [App\Http\Controllers\Operation\DocketMasterController::class, 'BookinAZDetails'])->name('BookinAZDetails');

Route::get('/BookinAZNONDELDetails/{origin}/{category}', [App\Http\Controllers\Operation\DocketMasterController::class, 'BookinAZNONDELDetails'])->name('BookinAZNONDELDetails');

Route::get('/BookinAZNDRDetails/{origin}/{category}', [App\Http\Controllers\Operation\DocketMasterController::class, 'BookinAZNDRDetails'])->name('BookinAZNDRDetails');

Route::get('/CustomerWiseVolumeReport', [App\Http\Controllers\Operation\DocketMasterController::class, 'CustomerWiseVolumeReport'])->name('CustomerWiseVolumeReport');





Route::get('/UploadSingleDocketImage', [App\Http\Controllers\Operation\UploadDocketController::class, 'UploadSingleDocketImage'])->name('UploadSingleDocketImage');
Route::POST('/UploadSingleDocketImageData', [App\Http\Controllers\Operation\UploadDocketController::class, 'UploadSingleDocketImageData'])->name('UploadSingleDocketImageData');
Route::POST('/UploadSingleDocketImagePost', [App\Http\Controllers\Operation\UploadDocketController::class, 'UploadSingleDocketImagePost'])->name('UploadSingleDocketImagePost');

Route::get('/CustomerCreditNoteReport', [App\Http\Controllers\Account\CreditNoteController::class, 'CustomerCreditNoteReport'])->name('CustomerCreditNoteReport');

Route::get('/DocketChargeDetailReport', [App\Http\Controllers\SalesReport\DocketChargeDetailReportController::class, 'index'])->name('DocketChargeDetailReport');

Route::get('/PendingCustomerChargeReport', [App\Http\Controllers\SalesReport\PendingChargeCustomerReportController::class, 'index'])->name('PendingCustomerChargeReport');

Route::get('/CustomerPendingBillGenerationReport', [App\Http\Controllers\SalesReport\CustomerPendingBillGenerationReportController::class, 'index'])->name('CustomerPendingBillGenerationReport');

Route::get('/VehicleAttandance', [App\Http\Controllers\Operation\VehicleAttandanceController::class, 'index'])->name('VehicleAttandance');
Route::POST('/VehicleAttandanceData', [App\Http\Controllers\Operation\VehicleAttandanceController::class, 'show'])->name('VehicleAttandanceData');
Route::POST('/VehicleAttandancePost', [App\Http\Controllers\Operation\VehicleAttandanceController::class, 'store'])->name('VehicleAttandancePost');
Route::get('/VehicleAttendenceReport', [App\Http\Controllers\Operation\VehicleAttandanceController::class, 'VehicleAttendenceReport'])->name('VehicleAttendenceReport');
Route::get('/PickupRequest', [App\Http\Controllers\Operation\PickupRequestController::class, 'index'])->name('PickupRequest');

Route::POST('/PickupRequestPost', [App\Http\Controllers\Operation\PickupRequestController::class, 'store'])->name('PickupRequestPost');
Route::get('/PickupRequestReport', [App\Http\Controllers\Operation\PickupRequestController::class, 'show'])->name('PickupRequestReport');

Route::get('/ShortDocketReport', [App\Http\Controllers\Reports\ShortDocketReportController::class, 'index'])->name('ShortDocketReport');

Route::get('/DelayConnectionReport', [App\Http\Controllers\Reports\DelayConnectionReportController::class, 'index'])->name('DelayConnectionReport');
Route::get('/DeliveryCharge', [App\Http\Controllers\Reports\DeliveryChargeController::class, 'index'])->name('DeliveryCharge');

Route::get('/DeliveryCostAnalysisReport', [App\Http\Controllers\Reports\DeliveryCostAnalysisReportController::class, 'index'])->name('DeliveryCostAnalysisReport');

Route::get('/SaleSummaryReport', [App\Http\Controllers\SalesReport\SaleSummaryReportController::class, 'index'])->name('SaleSummaryReport');
Route::get('/saleSummeryDetailed/{OffId}/{type}', [App\Http\Controllers\SalesReport\SaleSummaryReportController::class, 'saleSummeryDetailed'])->name('saleSummeryDetailed');

Route::get('/salesReport', [App\Http\Controllers\SalesReport\SalesReportController::class, 'index'])->name('salesReport');
Route::get('/VehicleUsageAnalysReport', [App\Http\Controllers\SalesReport\VehicleUsageAnalysReportController::class, 'index'])->name('VehicleUsageAnalysReport');

Route::POST('/VehicleUsageAnalysisInner', [App\Http\Controllers\SalesReport\VehicleUsageAnalysReportController::class, 'VehicleUsageAnalysisInner'])->name('VehicleUsageAnalysisInner');

Route::get('/VehicleUsageReport', [App\Http\Controllers\SalesReport\VehicleUsageReportController::class, 'index'])->name('VehicleUsageReport');

Route::POST('/VehicleUsageInner', [App\Http\Controllers\SalesReport\VehicleUsageReportController::class, 'VehicleUsageInner'])->name('VehicleUsageInner');

Route::get('/ExcessReceiving', [App\Http\Controllers\Operation\ExcessReceivingController::class, 'index'])->name('ExcessReceiving');

Route::POST('/ExcessReceivingpost', [App\Http\Controllers\Operation\ExcessReceivingController::class, 'store'])->name('ExcessReceivingpost');

Route::get('/ExcessReceivingReport', [App\Http\Controllers\Operation\ExcessReceivingController::class, 'show'])->name('ExcessReceivingReport');
Route::POST('/getExcessGatePassDetails', [App\Http\Controllers\Operation\ExcessReceivingController::class, 'getExcessGatePassDetails'])->name('getExcessGatePassDetails');


Route::get('/CustomerPerformanceAnalysis', [App\Http\Controllers\SalesReport\CustomerPerformanceAnalysisController::class, 'index'])->name('CustomerPerformanceAnalysis');
Route::get('/BookingCostAnalysis', [App\Http\Controllers\SalesReport\BookingCostAnalysisController::class, 'index'])->name('BookingCostAnalysis');

Route::get('/CancelInvoiceReport', [App\Http\Controllers\SalesReport\CancelInvoiceReportController::class, 'index'])->name('CancelInvoiceReport');

Route::get('/Forwarding', [App\Http\Controllers\Operation\ForwardingController::class, 'index'])->name('Forwarding');
Route::POST('/ForwardingPost', [App\Http\Controllers\Operation\ForwardingController::class, 'store'])->name('ForwardingPost');
Route::POST('/getDocketDetails', [App\Http\Controllers\Operation\ForwardingController::class, 'getDocketDetails'])->name('getDocketDetails');

Route::get('/ForwardingReport', [App\Http\Controllers\Operation\ForwardingController::class, 'show'])->name('ForwardingReport');
Route::get('/ForwardingDetailedReport/{Off}/{panding?}', [App\Http\Controllers\Operation\ForwardingController::class, 'ForwardingDetailedReport'])->name('ForwardingDetailedReport');
Route::get('/ForwardingDetailedNDRReport/{Off}', [App\Http\Controllers\Operation\ForwardingController::class, 'ForwardingDetailedNDRReport'])->name('ForwardingDetailedNDRReport');
Route::get('/ForwardingDetailedRTOReport/{Off}', [App\Http\Controllers\Operation\ForwardingController::class, 'ForwardingDetailedRTOReport'])->name('ForwardingDetailedRTOReport');
Route::get('/ForwardingDetailedDELIVEREDReport/{Off}', [App\Http\Controllers\Operation\ForwardingController::class, 'ForwardingDetailedDELIVEREDReport'])->name('ForwardingDetailedDELIVEREDReport');

Route::get('/SpotRateBooking', [App\Http\Controllers\Account\SpotRateBookingController::class, 'index'])->name('SpotRateBooking');
Route::POST('/SpotRateBookingPost', [App\Http\Controllers\Account\SpotRateBookingController::class, 'store'])->name('SpotRateBooking');
Route::POST('/SpotRateBookingCheck', [App\Http\Controllers\Account\SpotRateBookingController::class, 'SpotRateBookingCheck'])->name('SpotRateBookingCheck');
Route::POST('/CheckOriginOfCal', [App\Http\Controllers\Account\SpotRateBookingController::class, 'CheckOriginOfCal'])->name('CheckOriginOfCal');

Route::get('/GenerateSticker', [App\Http\Controllers\Operation\GenerateStickerController::class, 'index'])->name('GenerateSticker');
Route::POST('/CheckDocketForSticker', [App\Http\Controllers\Operation\GenerateStickerController::class, 'show'])->name('CheckDocketForSticker');
Route::POST('/GetConsigneeForCust', [App\Http\Controllers\Operation\GenerateStickerController::class, 'GetConsigneeForCust'])->name('GetConsigneeForCust');
Route::POST('/SubmitSticket', [App\Http\Controllers\Operation\GenerateStickerController::class, 'store'])->name('SubmitSticket');
Route::get('/print_sticker/{Docket}/{type}', [App\Http\Controllers\Operation\GenerateStickerController::class, 'print_sticker'])->name('print_sticker');
Route::POST('/DeleteSticker', [App\Http\Controllers\Operation\GenerateStickerController::class, 'destroy'])->name('DeleteSticker');

Route::get('/PendingPickupRequestDashboard', [App\Http\Controllers\Reports\PendingPickupRequestDashboardController::class, 'index'])->name('PendingPickupRequestDashboard');
Route::POST('/PendingPickupRequestPOST', [App\Http\Controllers\Reports\PendingPickupRequestDashboardController::class, 'show'])->name('PendingPickupRequestPOST');
Route::POST('/PendingPickupRequestSubmitPOST', [App\Http\Controllers\Reports\PendingPickupRequestDashboardController::class, 'store'])->name('PendingPickupRequestSubmitPOST');

Route::get('/StockTracking', [App\Http\Controllers\Stock\StockDocketTrackingController::class, 'index'])->name('StockTracking');
Route::POST('/StockTrackingPost', [App\Http\Controllers\Stock\StockDocketTrackingController::class, 'show'])->name('StockTrackingPost');

Route::POST('/MultipleDocketTrackingPost', [App\Http\Controllers\Operation\MultipleDocketTrackingController::class, 'show'])->name('MultipleDocketTrackingPost');
Route::POST('/DocketMultiTrackingModel', [App\Http\Controllers\Operation\MultipleDocketTrackingController::class, 'DocketMultiTrackingModel'])->name('DocketMultiTrackingModel');

Route::get('/DocumentMaster', [App\Http\Controllers\Operation\DocumentMasterController::class, 'index'])->name('DocumentMaster');
Route::POST('/DocumentMasterPost', [App\Http\Controllers\Operation\DocumentMasterController::class, 'store'])->name('DocumentMasterPost');
Route::POST('/DocumentMasterfatch', [App\Http\Controllers\Operation\DocumentMasterController::class, 'show'])->name('DocumentMasterfatch');
Route::get('/RoutePlanning_Org_Dest', [App\Http\Controllers\Operation\RoutePlanningController::class, 'index'])->name('RoutePlanning_Org_Dest');
Route::POST('/FindTotalDocketAndWeight', [App\Http\Controllers\Operation\RoutePlanningController::class, 'show'])->name('FindTotalDocketAndWeight');
Route::POST('/TotalDocketDetailsForRouteMap', [App\Http\Controllers\Operation\RoutePlanningController::class, 'TotalDocketDetailsForRouteMap'])->name('TotalDocketDetailsForRouteMap');
Route::get('/DocumentDispatchs', [App\Http\Controllers\Operation\DocumentDispatchController::class, 'index'])->name('DocumentDispatch');
Route::POST('/DocumentDispatchPost', [App\Http\Controllers\Operation\DocumentDispatchController::class, 'store'])->name('DocumentDispatchPost');
Route::get('/Documentreceived', [App\Http\Controllers\Operation\DocumentDispatchController::class, 'show'])->name('Documentreceived');
Route::POST('/DocumentreceivedPost', [App\Http\Controllers\Operation\DocumentDispatchController::class, 'DocumentreceivedPost'])->name('DocumentreceivedPost');

Route::POST('/DocumentreceivedSubmit', [App\Http\Controllers\Operation\DocumentDispatchController::class, 'DocumentreceivedSubmit'])->name('DocumentreceivedSubmit');

Route::get('/VehicleHireChallan', [App\Http\Controllers\Operation\VehicleHireChallanController::class, 'index'])->name('VehicleHireChallan');
Route::POST('/VehicleHireChallanShow', [App\Http\Controllers\Operation\VehicleHireChallanController::class, 'show'])->name('VehicleHireChallanShow');
Route::POST('/VehicleHireChallanPost', [App\Http\Controllers\Operation\VehicleHireChallanController::class, 'store'])->name('VehicleHireChallanPost');
Route::get('/VehicleHireChallanReport', [App\Http\Controllers\Operation\VehicleHireChallanController::class, 'vehicleHireChallanReport'])->name('vehicleHireChallanReport');

Route::get('/DownloadBulkPOD', [App\Http\Controllers\Operation\DownloadBulkPODController::class, 'index'])->name('DownloadBulkPOD');
Route::POST('/DownloadBulkPODShow', [App\Http\Controllers\Operation\DownloadBulkPODController::class, 'show'])->name('DownloadBulkPODShow');
Route::POST('/DownloadZipofPod', [App\Http\Controllers\Operation\DownloadBulkPODController::class, 'DownloadZipofPod'])->name('DownloadZipofPod');






Route::POST('webadmin/ExpenseClaimed', 'admin\CashManagment@ExpenseClaimed');


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