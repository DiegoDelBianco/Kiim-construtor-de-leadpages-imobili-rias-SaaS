<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Property;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $urlParts = explode('.', $_SERVER['HTTP_HOST']);
        $team = Team::where('sub_domain',$urlParts['0'])->first();
        $template = $team->site_template;
        return view('templates.'.$template->name.'.home')->with(['team' => $team]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show_property(Property $property){

        // Pega Site
        $urlParts = explode('.', $_SERVER['HTTP_HOST']);
        $team = Team::where('sub_domain',$urlParts['0']) -> first();

        // Pega template
        $template = $team->site_template;

        //Confirma se a propriedade é do site
        if(!$property->confirm_team($team)){
            return view('templates.'.$template->name.'.error-404');
        }

        return view('templates.'.$template->name.'.property')->with([
            'team' => $team, 
            'property' => $property, 
            'medias' => $property->medias,]);
    }
    public function list_property(){

    }

}
