<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    //recuperation du contenu du Users
    protected $with = ['user'];

    //les champs qui ne sont pas gradess
    protected $fillable = ["content", "post_id", "user_id"];
    //les champs garde
    // protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
