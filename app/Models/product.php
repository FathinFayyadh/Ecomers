<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded=[
        'created_at',
        'updated_at',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function roles(){
        return $this->belongsTo(Roles::class, 'roles_id', 'id');
    }
    

}
