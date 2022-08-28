<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesHasItems extends Model
{
    use HasFactory;

    protected $table = 'properties_has_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'property_item_id',
    ];

    use HasFactory;



    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function property_item()
    {
        return $this->belongsTo(PropertyItem::class);
    }
}
