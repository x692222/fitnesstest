<?php

namespace App\Models;

use App\Traits\ModelUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use ModelUuidTrait;

    /** @var string */
    protected $category_id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $sku;

    /** @var int */
    protected $price;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'sku', 'price',
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
        'category'
    ];

    protected $withCount = [
        'images'
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

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }

}
