<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use Illuminate\Validation\Rule;
use App\Models\TeamMedia;
use App\Models\UsersHasTeams;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.list-teams')->with(['teams' => Auth::user()->teams, 'list_teams' => Auth::user()->list_teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create-team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //Válida os dados do formulário
        $request->validate([
            'name' => ['required', 'string', 'min:0', 'max:255'],
            'sub_domain' => ['required', 'string', 'min:0', 'max:255', 'unique:teams'],
            'domain' => ['string', 'nullable', 'min:0', 'max:255'],
            //'properties_auto_title' => ['string', 'min:0', 'max:255'],
            'show_address' => ['required', 'boolean'],
            'cep' => ['required', 'string', 'min:9', 'max:9'],
            'street' => ['required', 'string', 'min:0', 'max:255'],
            'neighborhood' => ['required', 'string', 'min:0', 'max:255'],
            'city' => ['required', 'string', 'min:0', 'max:255'],
            'state' => ['required', 'string', 'min:2', 'max:2'],
            //'mapsLati' => ['string', 'min:0', 'max:255'],
            //'mapsLong' => ['string', 'min:0', 'max:255'],
            //'facebook' => ['string', 'min:0', 'max:255'],
            //'instagram' => ['string', 'min:0', 'max:255'],
            //'youtube' => ['string', 'min:0', 'max:255'],
            //'f_pixel' => ['string', 'min:0', 'max:255'],
            //'g_analytics' => ['string', 'min:0', 'max:255'],
            //'g_adwords' => ['string', 'min:0', 'max:255'],
            //'g_tags' => ['string', 'min:0', 'max:255'],
            'creci' => ['required', 'string', 'min:6', 'max:10'],
            'phone1' => ['string', 'nullable', 'min:0', 'max:20'],
            'phone2' => ['string', 'nullable', 'nullable', 'min:0', 'max:20'],
            'whatsapp' => ['string', 'nullable', 'min:0', 'max:255'],
            'email' => ['string', 'nullable', 'min:0', 'max:255'],
            //'status' => ['boolean'],
            //'visible' => ['boolean'],
            //'site_template_id' => ['exists:site_templates,id'],
            //'color1' => ['string', 'min:0', 'max:255'],
            //'color2' => ['string', 'min:0', 'max:255'],
            //'color3' => ['string', 'min:0', 'max:255'],
            //'color4' => ['string', 'min:0', 'max:255'],
            //'color5' => ['string', 'min:0', 'max:255'],
        ]);

        //Cria o site
        $team = Team::create([
            'name' => $request->name,
            'sub_domain' => $request->sub_domain,
            'domain' => $request->domain,
            //'properties_auto_title' => $request->properties_auto_title,
            'show_address' => $request->show_address,
            'cep' => $request->cep,
            'street' => $request->street,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            //'mapsLati' => $request->mapsLati,
            //'mapsLong' => $request->mapsLong,
            //'facebook' => $request->facebook,
            //'instagram' => $request->instagram,
            //'youtube' => $request->youtube,
            //'f_pixel' => $request->f_pixel,
            //'g_analytics' => $request->g_analytics,
            //'g_adwords' => $request->g_adwords,
            //'g_tags' => $request->g_tags,
            'creci' => $request->creci,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            //'status' => $request->status,
            //'visible' => $request->visible,
            'site_template_id' => '1',
            //'color1' => $request->color1,
            //'color2' => $request->color2,
            //'color3' => $request->color3,
            //'color4' => $request->color4,
            //'color5' => $request->color5,
        ]);

        //Associa o site ao usuário
        $userhasteam = UsersHasTeams::create([
            'user_id' => Auth::user()->id,
            'team_id' => $team->id,
            'permissions' => '444444',
            'type' => 'Proprietário',
            'team_owener' => '1',
        ]);

        return redirect(route('dashboard.teams.list'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team  $team)
    {
        if(!$team->verify_permission(2, 1)) return false;

        return view('teams.edit-team')->with(["team" => $team]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team  $team)
    {
        if(!$team->verify_permission(2, 1)) return false;


        //Válida os dados do formulário
        $request->validate([
            'name' => ['required', 'string', 'min:0', 'max:255'],
            'sub_domain' => ['required', 'string', 'min:0', 'max:255', Rule::unique('teams')->ignore($team->id)],
            'domain' => ['string', 'nullable', 'min:0', 'max:255'],
            'show_address' => ['required', 'boolean'],
            'cep' => ['required', 'string', 'min:9', 'max:9'],
            'street' => ['required', 'string', 'min:0', 'max:255'],
            'neighborhood' => ['required', 'string', 'min:0', 'max:255'],
            'city' => ['required', 'string', 'min:0', 'max:255'],
            'state' => ['required', 'string', 'min:2', 'max:2'],
            'creci' => ['required', 'string', 'min:6', 'max:10'],
            'phone1' => ['string', 'nullable', 'min:0', 'max:20'],
            'phone2' => ['string', 'nullable', 'nullable', 'min:0', 'max:20'],
            'whatsapp' => ['string', 'nullable', 'min:0', 'max:255'],
            'email' => ['string', 'nullable', 'min:0', 'max:255'],
        ]);

        //Cria o site
        $saved = $team->update($request->all());

        return redirect(route('dashboard.teams.list'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function logo_store(Request $request, Team $team){
        
        if(!$team->verify_permission(2, 1)) return false;

        $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);


        $teammedia = new TeamMedia;

        $teammedia->name = basename($_FILES['image']['name']);
        $teammedia->team_id = $team->id;
        $teammedia->type = "logo";
        $teammedia->format = 'webp';
        $teammedia->save();


        $file = $_FILES['image']; 
        $teammedia->storeLogo($file);

        $team->logo_id = $teammedia->id;
        $team->save();


        return redirect(route('dashboard.properties.list', [$team->id]));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function scripts_store(Request $request, Team $team){
        
        if(!$team->verify_permission(2, 1)) return false;

        //Válida os dados do formulário
        $request->validate([
            'f_pixel' => ['nullable', 'string', 'min:0', 'max:20'],
            'g_analytics' => ['nullable', 'string', 'min:0', 'max:20'],
            'g_adwords' => ['nullable', 'string', 'min:0', 'max:20'],
            'g_tags' => ['nullable', 'string', 'min:0', 'max:20'],
        ]);

        $team->f_pixel = $request->f_pixel;
        $team->g_analytics = $request->g_analytics;
        $team->g_adwords = $request->g_adwords;
        $team->g_tags = $request->g_tags;
        $team->save();

        return redirect(route('dashboard.properties.list', [$team->id]));

    }
}
