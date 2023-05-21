<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $fillable = [
        'tenant_name',
        'tenant_nid',
        'father_name',
        'father_nid',
        'permanent_add',
        'police_station',
        'police_chowki',
        'contact_no',
        'father_contact_no',
        'emergency_contact_no',
        'institue',
        'institue_role',
        'duration',
        'redg_no',
        'living_before',
        'reletive_name',
        'image',
        'relative_phone',
        'is_active',
        'room_no',
        'security_ammount',
        'admission_date',
        'user_id ',
        'category_id',
        'mypackage_id'
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function mypackage()
    {
        return $this->belongsTo(Mypackage::class);
    } 
    public function rent()
    {
        return $this->hasMany(Rent::class);
    } 
    public function payment()
    {
        return $this->hasMany(Payment::class);
    } 
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
