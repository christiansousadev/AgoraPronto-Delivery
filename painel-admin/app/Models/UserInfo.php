<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'vendor_id' => 'integer',
        'deliveryman_id' => 'integer',
        'admin_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'deliveryman_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function getFNameAttribute($value){

        if(is_string($value) &&  json_decode($value,true) !== null){

            return  json_decode($value,true)[0];
        }
        return $value;
    }


}
