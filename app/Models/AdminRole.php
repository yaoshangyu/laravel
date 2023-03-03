<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AdminRole extends Pivot
{
    //
    protected $table = "admin_role";
}
