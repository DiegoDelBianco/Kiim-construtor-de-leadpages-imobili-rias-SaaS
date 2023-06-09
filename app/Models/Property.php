<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'cod',
        'cep',
        'street',
        'number_street',
        'neighborhood',
        'neighborhood_related',
        'team_id',
        'mapsLati',
        'mapsLong',
        'city',
        'state',
        'zone',
        'property_type_id',
        'bedrooms',
        'suites',
        'm2',
        'm2built',
        'furnished',
        'bathrooms',
        'parking',
        'rent',
        'rent_price',
        'sale',
        'sale_price',
        'rent_iptu',
        'condominium_price',
        'its_condominium',
        'shared_house',
        'description',
        'building',
        'end_build',
        'exchange',
        'status',
        'pets',
    ];

    public function medias()
    {
        return $this->hasMany(PropertyMedia::class)->orderBy('order');
    }

    public function thumb()
    {
        return $this->belongsTo(PropertyMedia::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function thumb_src(){
        if($this->thumb){
            return $this->thumb->path200(TRUE);
        }else{
            return 'images/errors/imagem-no-avaliabler.webp';
        }
    }

    public function get_title(){
        $title = $this->title;
        if ($title == NULL) $title = "sem nome";
        return $title;
    }

    public function type(){

        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function property_link($domain){
        $title =  str_replace(" ", "_", $this->get_title());
        return $domain.'/imovel/'.$this->id.'/'.$title;
    }

    public function confirm_team(Team $team){

        return $this->team_id == $team->id;
    }


    public function items()
    {
        return $this->belongsToMany(PropertyItem::class, 'properties_has_items');
    }


    public function leadpages()
    {
        return $this->belongsToMany(LeadpageTemplate::class, 'properties_has_leadpages');
    }


    public function list_leadpages()
    {
        return $this->hasMany(PropertiesHasLeadpages::class);
    }
}
