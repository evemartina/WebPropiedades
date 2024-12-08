<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyChangeLog extends Model{

    protected $table = 'property_change_log';

    public function property()    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
