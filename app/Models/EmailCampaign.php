<?php 
// app/Models/EmailCampaign.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    protected $fillable = ['subject', 'content', 'user_id'];

    public function shopOwner()
    {
        return $this->belongsTo(ShopOwner::class);
    }
}
