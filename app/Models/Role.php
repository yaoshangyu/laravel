<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
     
    protected $table = "role";
    public function admin(){

        return $this->belongsToMany("App\Models\Admin","admin_role","role_id","admin_id")
        //->as("user_role")
        //->wherePivot("id",4)
        ->using("App\Models\AdminRole")
        ->withPivot("admin_id","role_id","id");
        
    }

}
