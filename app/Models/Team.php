<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sub_domain',
        'domain',
        'properties_auto_title',
        'show_address',
        'cep',
        'street',
        'neighborhood',
        'city',
        'state',
        'mapsLati',
        'mapsLong',
        'facebook',
        'instagram',
        'youtube',
        'f_pixel',
        'g_analytics',
        'g_adwords',
        'g_tags',
        'creci',
        'phone1',
        'phone2',
        'whatsapp',
        'email',
        'status',
        'visible',
        'site_template_id',
        'color1',
        'color2',
        'color3',
        'color4',
        'color5',
    ];

    public function site_template()
    {
        return $this->belongsTo(SiteTemplate::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }



    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_teams');
    }


    public function list_users()
    {
        return $this->hasMany(UsersHasTeams::class);
    }

    public function logo()
    {
        return $this->belongsTo(TeamMedia::class, 'logo_id');
    }


    public function favicon()
    {
        return $this->belongsTo(TeamMedia::class, 'favicon_id');
    }


    public function logo_src(){
        if($this->logo){
            return $this->logo->pathLogo150(TRUE);
        }else{
            return 'images/errors/imagem-no-avaliable.webp';
        }
    }


    public function favicon_src(){
        if($this->favicon){
            return $this->favicon->path(TRUE);
        }elseif($this->logo){
            return $this->logo->pathLogo16(TRUE);
        }else{
            return 'images/errors/imagem-no-avaliable.webp';
        }
    }

    public function get_domain(){

        $domain = $this->domain==NULL? 
                    str_replace('<sub>', $this->sub_domain, config('app.sub')):
                    $this->domain;
        return $domain;
    }

}
