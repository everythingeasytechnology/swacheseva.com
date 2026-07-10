<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'secondary_email', 'password', 'phone', 'role', 'status', 'utr_code', 'payment_screenshot',
        'father_name', 'mother_name', 'date_birth', 'gender', 'marital_status', 'category', 'alt_phone', 'qualification',
        'village', 'post_office', 'tehsil', 'district', 'state', 'pincode',
        'shop_name', 'shop_address', 'shop_district', 'shop_state', 'shop_pincode',
        'bank_name', 'account_no', 'ifsc_code', 'holder_name',
        'aadhaar_no', 'pan_no', 'security_pin',
        'avatar', 'shop_photo', 'qualification_doc', 'aadhaar_front', 'aadhaar_back', 'pan_doc', 'passbook_doc',
        'declaration_signed'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'declaration_signed' => 'boolean',
            'date_birth' => 'date',
        ];
    }
}
