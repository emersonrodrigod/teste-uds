<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function flavor() {
        return $this->belongsTo(Flavor::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function options() {
        return $this->belongsToMany(Option::class);
    }
}
