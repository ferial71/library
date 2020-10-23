<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates =['dob'];

    public function setDobAttribute($attribute)
    {
        $this->attributes['dob'] =Carbon::parse($attribute);
    }
}
