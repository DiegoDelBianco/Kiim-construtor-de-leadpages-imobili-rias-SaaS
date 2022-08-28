<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\SiteTemplate;
use App\Models\PropertiesHasLeadpages;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function home(){
        $urlParts = explode('.', $_SERVER['HTTP_HOST']);
        $team = Team::where('sub_domain',$urlParts['0'])->first();
        $template = $team->site_template;

        $template->get_template_vars($team->id);

        return view('templates.'.$template->name.'.home')
            ->with([
                'template' => $template, 
                'team' => $team, 
                'neighborhoods' => $team->get_neighborhoods(),
                'property_types' => PropertyType::all(),
            ]);
    }

    public function search(){
        $urlParts = explode('.', $_SERVER['HTTP_HOST']);
        $team = Team::where('sub_domain',$urlParts['0'])->first();
        $template = $team->site_template;


        if($_GET["status"]=='for-rent') $where[] = ["rent", "=", "1"];
        if($_GET["status"]=='for-sale') $where[] = ["sale", "=", "1"];
        if(isset($_GET["type"])) $where[] = ["property_type_id", $_GET["type"]];
        if(isset($_GET["neighborhood"])) $where[] = ["neighborhood", ">=", $_GET["neighborhood"]];
        if(isset($_GET["bedrooms"])) $where[] = ["bedrooms", ">=", $_GET["bedrooms"]];
        if(isset($_GET["min-price"]) AND $_GET["status"]=='for-rent') $where[] = ["rent_price", ">=", $_GET["min-price"]];
        if(isset($_GET["min-price"]) AND $_GET["status"]=='for-sale') $where[] = ["sale_price", ">=", $_GET["min-price"]];
        if(isset($_GET["max-price"]) AND $_GET["status"]=='for-rent') $where[] = ["rent_price", "<=", $_GET["max-price"]];
        if(isset($_GET["max-price"]) AND $_GET["status"]=='for-sale') $where[] = ["sale_price", "<=", $_GET["max-price"]];
        if(isset($_GET["garage"])) $where[] = ["parking", ">=", $_GET["garage"]];

        $properties = Property::where($where)->get();

        return view('templates.'.$template->name.'.search')
            ->with([
                'team' => $team, 
                'properties' => $properties, 
                'neighborhoods' => $team->get_neighborhoods(),
                'property_types' => PropertyType::all(),
                'get_status' => isset($_GET['status'])?$_GET['status']:NULL,
                'get_type' => isset($_GET['type'])?$_GET['type']:NULL,
                'get_neighborhood' => isset($_GET['neighborhood'])?$_GET['neighborhood']:NULL,
                'get_bedrooms' => isset($_GET['bedrooms'])?$_GET['bedrooms']:NULL,
                'get_min_price' => isset($_GET['min-price'])?$_GET['min-price']:NULL,
                'get_max_price' => isset($_GET['max-price'])?$_GET['max-price']:NULL,
                'get_garage' => isset($_GET['garage'])?$_GET['garage']:NULL,
            ]);
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



    /**
     *
     *
     * @param  \App\Models\PropertiesHasLeadpages  $leadpage
     */
    public function leadpage_imovel(PropertiesHasLeadpages $leadpage){
        
        $urlParts = explode('.', $_SERVER['HTTP_HOST']);
        $team = Team::where('sub_domain',$urlParts['0'])->first();
        $template = $leadpage->leadpage_template;
        $property = $leadpage->property;

        //Confirma se a propriedade é do site
        if(!$property->confirm_team($team)){
            return view('templates.'.$template->name.'.error-404');
        }

        $template->get_template_vars($leadpage);

        return view('templates_leadpage_property.'.$template->name.'.index')->with([
            'template' => $template, 
            'team' => $team, 
            'property' => $property, 
            'medias' => $property->medias,]);
    }

}
