<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_ammount',
        'payment_mode',
        'for_month',
        'is_pending_payment',
        'payment_description',
        'payment_date',
        'tenant_id',
        'rent_id',
        'user_id '
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }
    

}
