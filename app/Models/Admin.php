<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Observers\AdminObserve;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    //
    use SoftDeletes,Notifiable;
   // const DELETED_AT = "delete_time";
    protected $primaryKey = "id";
    protected $table = "admin";
    //protected $connection = "mysql_2";
    protected $attributes = [
        'password' => "default"
        
    ];

    protected $casts = [

        //"delete_time" => "datetime",
        "desc" =>"array"
    ];
    
    public $timestamps = false;

    //白名单 允许哪些字段可以被批量赋值
    ///protected $fillable = ["name","password","sex"];
    //黑名单
    protected $guarded = [];


    // public function getRouteKeyName(){
    //    return 'password';
    // }

    public function resolveRouteBinding($value)
{
    return $this->where('name', $value)->first() ?? abort(404);
}

    public function test(){
       return  $this->fromDateTime($this->freshTimestampString());
    }

    public static function boot(){
         parent::boot();
        //  static::addGlobalScope("test",function($builder){
        //          $builder->whereNotNull("delete_time");
        //  });
         static::observe(AdminObserve::class);

    }

    public function getCreateTimeAttribute($value){
        
        return strtotime($value);

    }

    // public function setUpdateTimeAttribute($value){
        
    //     //$this->attributes['update_time'] = date('Y-m-d H:i:s',$value);
        

    // }

    public function setDeleteTimeAttribute(){
        $this->attributes['delete_time'] = time();
    }

    public function setCreateTimeAttribute($value){
         $this->attributes['create_time'] = date('Y-m-d H:i:s',$value);
    }

    public function setUpdateTimeAttribute($value){
        $this->attributes['update_time'] = date('Y-m-d H:i:s',$value);
    }

    public function scopeTest($query,$param){

         return $query->where("delete_time",$param);
    }

    public function address(){

        return $this->hasOne("App\Models\AdminAddress","admin_id","id");
    }

    public function addresses(){

        return $this->hasMany("App\Models\AdminAddress","admin_id","id");
    }


    public function roles(){

        return $this->belongsToMany("App\Models\Role","admin_role","admin_id","role_id");
    }

    protected $hidden = ["password"];
   // protected $visible = ["name","id"];

    public function getDeleteDateAttribute(){
        
        return date('Y-m-d H:i:s',$this->attributes['delete_time']);
           
    }

    //protected $appends = ["delete_date"];

}
