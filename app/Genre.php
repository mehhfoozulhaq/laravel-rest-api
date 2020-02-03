<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name', 'active'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function scopeActive($query) {
        return $query->whereActive(1);
    }

    // public function getActiveAttribute($value)
    // {
    //     return $value == 1 ? 'Active' : 'Inactive';
    // }
}
