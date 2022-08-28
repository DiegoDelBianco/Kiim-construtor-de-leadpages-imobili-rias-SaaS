<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Property;
use App\Models\SiteTemplate;
use App\Models\TemplateVariable;
use App\Models\PropertiesHasLeadpages;
use App\Models\LeadpageTemplate;

class TemplateController extends Controller
{
    public function show(Team $team, SiteTemplate $template){

        if(!$team->verify_permission(2, 1)) return false;

        return view('configtemplate.show-templates')
            ->with([
                'team' => $team,
                'selected_template' => $template,
                'list_templates' => SiteTemplate::all(),
                'vars' => $template->get_template_vars($team->id),
            ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @param  App\Models\SiteTemplate $template
     * @return \Illuminate\Http\Response
     */
    public function config_store(Request $request, Team $team, SiteTemplate $template){


        if(!$team->verify_permission(2, 1)) return false;

        //pega lista de variaveis
        $variaveis = $template->get_template_vars($team->id);

        //inicia loop
        foreach ($variaveis as $variavel) {
            $name = $variavel->name;
            $value = $_POST["$name"];

            //verifica se já existe registro
            //caso exista atualiza
            if($template->exists_var($variavel->name)){
                $upVar = TemplateVariable::where([["name", "$name"], ["team_id", $team->id]])->first();
                
                $upVar->value = $value;
                $upVar->save();
            //caso não exista salva novo
            }else{
                $newVar = TemplateVariable::create(["name"=> "$name", "team_id"=> $team->id, "value"=> $value]);

            }
        }



        return redirect(route('dashboard.teams.template.show', [$team->id, $template->id]));
    }



    public function property_show(Team $team, Property $property, PropertiesHasLeadpages $leadpage){
        

        if(!$team->verify_permission(2, 2)) return false;

        return view('configtemplate.property-show-templates')
            ->with([
                'team' => $team,
                'property' => $property,
                'leadpage' => $leadpage,
                'selected_template' => $leadpage->leadpage_template,
                'list_templates' => LeadpageTemplate::all(),
                'vars' => $leadpage->leadpage_template->get_template_vars($leadpage),
            ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @param  App\Models\Property  $property
     * @param  App\Models\PropertiesHasLeadpages $leadpage
     * @return \Illuminate\Http\Response
     */
    public function property_config_store(Request $request, Team $team, Property $property, PropertiesHasLeadpages $leadpage){

        if(!$team->verify_permission(2, 2)) return false;

        //pega lista de variaveis
        $variaveis = $leadpage->leadpage_template->get_template_vars($leadpage);

        //inicia loop
        foreach ($variaveis as $variavel) {
            $name = $variavel->name;
            $value = $_POST["$name"];

            //verifica se já existe registro
            //caso exista atualiza
            if($leadpage->leadpage_template->exists_var($variavel->name)){
                $upVar = TemplateVariable::where([["name", 'pht'.$leadpage->id.'-'."$name"], ["team_id", $team->id]])->first();
                
                $upVar->value = $value;
                $upVar->save();
            //caso não exista salva novo
            }else{
                $newVar = TemplateVariable::create(["name"=> 'pht'.$leadpage->id.'-'."$name", "team_id"=> $team->id, "value"=> $value]);

            }
        }


        return redirect(route('dashboard.properties.template.show',[$team->id, $property->id, $leadpage->id]));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team  $team
     * @param  App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function property_store(Request  $request, Team  $team, Property  $property){


        if(!$team->verify_permission(2, 2)) return false;


        $template = PropertiesHasLeadpages::create(["property_id"=> $property->id, "leadpage_template_id"=> $request->leadpage_template_id]);

        return redirect(route('dashboard.properties.template.show',[$team->id, $property->id, $template->id]));

    }

}
