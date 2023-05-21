<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'package_price',
        'package_description',
        'user_id '
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
