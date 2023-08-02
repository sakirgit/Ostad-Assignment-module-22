<?php 

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
