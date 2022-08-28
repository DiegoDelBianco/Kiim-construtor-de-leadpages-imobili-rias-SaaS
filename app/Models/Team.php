<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    /*
    ** $type é o tipo de permissão minima para a função: 1( ver), 2(ver e editar), 3(ver, editar e adicionar), 4(ver, editar, adicionar e excluir)
    ** $fun refencia sobre o que é a permissão:
    **      -1 dados da equipe
    **      -2 imóveis da equipe
    **      -3 analytics (equipe e imóveis)
    **      -4 membros da equipe
    **      -5 contratos e faturamento da equipe
    **      -6 parceiros da equipe
    */
    public function verify_permission($type, $fun){
        $ligacao = UsersHasTeams::where(['user_id' => Auth::user()->id, 'team_id' => $this->id])->first();

        //Caso seja o proprietario tem permissão total
        if($ligacao->team_owener) return TRUE;

        $permissao = $ligacao->permissions;

        return (substr($permissao, $fun-1, 1) >=  $type);
    }

    public function get_neighborhoods(){

        $neighborhoods = DB::select('SELECT DISTINCT(neighborhood) as name FROM properties WHERE team_id = :team_id AND neighborhood IS NOT NULL', ['team_id' => $this->id]);
        
        //$sql = " SELECT DISTINCT(pr.city) FROM property pr WHERE pr.city IS NOT null ";
 
        return $neighborhoods;
    }

    public function is_pro(){
        return false;
    }

}
