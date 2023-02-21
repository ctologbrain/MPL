<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    public function EmpPer()
    {
        return $this->hasMany(\App\Models\OfficeSetup\empPermanentContactInformation::class, 'id');
    }

    public function EmpPerDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\empPermanentContactInformation::class, 'id');
    }
    public function EmpPersonal()
    {
        return $this->hasMany(\App\Models\OfficeSetup\empPersonalInformation::class, 'id');
    }

    public function EmpPersonalDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\empPersonalInformation::class, 'id');
    }
    public function EmpPresent()
    {
        return $this->hasMany(\App\Models\OfficeSetup\empPresentContactInformation::class, 'id');
    }

    public function EmpPresentDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\empPresentContactInformation::class, 'id');
    }
    public function OfficeMaster()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'OfficeName');
    }

    public function OfficeMasterParent()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'OfficeName');
    }
    public function DeptMaster()
    {
        return $this->hasMany(\App\Models\OfficeSetup\Department::class, 'DepartmentName');
    }

    public function DeptMasterDet()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\Department::class, 'DepartmentName');
    }
    public function designation()
    {
        return $this->hasMany(\App\Models\OfficeSetup\designation::class, 'DesignationName');
    }

    public function designationDet()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\designation::class, 'DesignationName');
    }
    public function User()
    {
        return $this->hasMany(\App\Models\User::class, 'user_id');
    }

    public function UserDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function Role()
    {
        return $this->hasMany(\App\Models\Role\RoleMaster::class, 'id');
    }

    public function RoleDetails()
    {
        return $this->belongsTo(\App\Models\Role\RoleMaster::class, 'id');
    }
}
