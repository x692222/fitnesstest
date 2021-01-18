<?php

namespace App\Models;

use App\Traits\ModelUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;
    use ModelUuidTrait;

    /** @var string */
    protected $product_id;

    /** @var string */
    protected $path;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'name', 'path',
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

}
