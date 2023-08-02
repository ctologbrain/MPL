<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Pagination\Paginator;

class common extends Model
{
    
	/* get All rows*/ 
     public function getAllRows($table)
    {
        $result = DB::table($table)->where('is_admin', '=', 2)->orderBy('user_id', 'DESC')->get();

        return $result;
    }
    
    /* get single row*/
    public function getSingleRow($table,$dataarray)
    {
    	$result = DB::table($table)->where($dataarray)->first();
    	return $result;
    }
    
    /* insert */

    public function update_data($table,$dataarray,$id)
    {
            $result = DB::table($table)
            ->where($id)
            ->update($dataarray);
        return $result;
    }

    public function insert($table,$dataarray)
    {

     
         DB::commit();
        $result = DB::table($table)->insert($dataarray);
        $id = DB::getPdo()->lastInsertId();
        return $id;
          DB::rollBack();
    }
    public function insertInvoice($table,$dataarray)
    {
         DB::commit();
        $result = DB::table($table)->insert($dataarray);
        $id = DB::getPdo()->lastInsertId();
        return $id;
          DB::rollBack();
    }

    public function update_dat(a$table,$dataarray,$id)
    {
            $result = DB::table($table)
            ->where($id)
            ->update($dataarray);
        return $result;
    }

    public function delete_data($table,$id)
    {
        $result = DB::table($table)->where($id)->delete();
        return $result;
    }

    public function changeStatus($table,$id,$status){
         $result = DB::table($table)
            ->where($id)
            ->update($status);

        return $result;
    }
    public function getUserData($where)
    {
           DB::enableQueryLog();
        $sql = "select * from admin where 1 ##WHERE## AND is_admin=2";
       $query = str_replace("##WHERE##", $where, $sql);
       
        $result = DB::select($query);
        $query = DB::getQueryLog();
                   $lastQuery = end($query);
                   print_r($lastQuery);
          $result = new Paginator($result,2,0);         
        return $result;
                
    }

     public function page($where)
    {
           
          DB::enableQueryLog();
          $result = DB::table('admin')
          ->where('username','like','%' . $where . '%')
          ->where('is_admin',2)
          ->where('is_delete',1)
          ->paginate(3);
          /* $query = DB::getQueryLog();
           $lastQuery = end($query);
           print_r($lastQuery);*/
           return $result;
    }
    public function   getAllRecords($table)
    {
        $result = DB::table($table)->where('is_delete',1)->get();
        return $result;
    }

    public function   getAllCommonRecords($table)
    {
        $result = DB::table($table)->where('is_active',1)->where('is_delete',1)->get();
        return $result;
    }

    public function   gethairstyle()
    {
        $result = DB::table('hair_style')->where('is_active',1)->get();
        return $result;
    }

    public function getdashboardinfo()
    {
      
      $result = DB::select("SELECT (SELECT COUNT(DISTINCT(jobcardNo)) FROM IssueRequest WHERE is_request=0) as pendingRequest, 
      (SELECT COUNT(DISTINCT(jobcardNo)) FROM IssueRequest WHERE is_request=1) as ACCEPTRequest,
      (SELECT COUNT(DISTINCT(JobCardNo)) FROM InspectionDetail WHERE IsAssigned!='') as AssignedJob");
      return $result[0];
  
    }
    public function uploadImages($images,$folderpath){

    $imgData = [];
    if(!empty($images) && is_array($images) && !empty($folderpath))
    {
      foreach ($images as $file) {
       $filename = basename($file->store("public/$folderpath/"));
      
        array_push($imgData,$filename);
      }
    }elseif(!empty($images) && !is_array($images) && !empty($folderpath))
    {
      $filename = basename($file->store($folderpath));
      array_push($imgData,$filename);
    }else{
      die('Something went wrong');
    }
    return $imgData;
    }

    

}
