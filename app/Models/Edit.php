<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Edit extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

   
    protected $hidden = [
        'password',
       
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
