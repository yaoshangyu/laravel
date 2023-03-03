<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAddress extends Model
{
    //
    protected $table = "admin_address";
    public $timestamps = false;
     public function user(){

        return $this->belongsTo("App\Models\Admin","admin_id","id");
                    
     }

}
