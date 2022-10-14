<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
//  Fillable example
//  protected $fillable = ['name', 'email', 'active'];

//  Guraded example
    protected $guarded = [];

    protected $attributes = [
        'active' => 1,
    ];

    public function getActiveAttribute($attribute)
    {
        return  $this->activeOptions()[$attribute];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function  scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function activeOptions()
    {
        return [
            '1' => 'active',
            '0' => 'inactive',
            '2' => 'in-progress'
        ];
    }
}
