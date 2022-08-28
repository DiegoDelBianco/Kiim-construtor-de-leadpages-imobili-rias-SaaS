<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesHasLeadpages extends Model
{
    use HasFactory;


    protected $fillable = [
        'property_id',
        'leadpage_template_id',
    ];



    protected $table = 'properties_has_leadpages';

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function leadpage_template()
    {
        return $this->belongsTo(LeadpageTemplate::class, 'leadpage_template_id');
    }

    public function get_url()
    {
        ///lpage/imovel/{leadpage}
        $domain = $this->property->team->get_domain();
        //print_r($domain);
        return $domain."/lpage/imovel/".$this->id;
    }
}
