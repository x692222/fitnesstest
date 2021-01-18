<?php

namespace App\Models;

use App\Traits\ModelUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use ModelUuidTrait;

    /** @var string */
    protected $name;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [

    ];

    protected $with = [

    ];

    protected $withCount = [
        'products'
    ];

    /*
     * Accessors
     */

//    function getFullNameAttribute()
//    {
//        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
//    }

    /*
     * Mutators
     */

//    public function setFirstNameAttribute($value)
//    {
//        $this->attributes['first_name'] = ucwords($value);
//    }

    /*
     * Scopes
     */

    public function scopeApplySearch($query)
    {

    }

    /*
     * Relationships
     */

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
