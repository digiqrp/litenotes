<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $fillable = [];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
