<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'init_date',
        'end_date',
        'max_participants',
        'entry_price',
        'event_image',
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_events', 'event_id', 'user_id');
    }

    
    public function participants() {
        return $this->hasMany(UserEvent::class, 'event_id', 'id');
    }
}
