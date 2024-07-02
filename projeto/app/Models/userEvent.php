<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class userEvent extends Model
{
    use HasFactory;

    protected $table = 'user_events';

    protected $fillable = [
        'user_id', 'event_id',
    ];

    public function participants() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
