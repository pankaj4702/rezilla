<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','porperty_name','area','message','property_type', 'bedroom', 'property_status', 'property_source','configuration','category','bathroom','property_location','price','pin_code','images','post_user',
    ];
}
