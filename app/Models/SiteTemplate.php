<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTemplate extends Model
{
    use HasFactory;

    public $template_vars;
    public $tem_id;
    public $undefined_vars;


    public function exists_var($var_name){
        return !isset($this->undefined_vars["$var_name"]);
    }

    public function get_var_value($team_id, $var_name){
        $variable = TemplateVariable::where([['team_id', $team_id], ['name', $var_name]])->first();
        if($variable){
            return $variable->value;
        }else{
            $this->undefined_vars["$var_name"] = TRUE;
            return 'Undefined';
        }
    }

    public function var_value_or_default($var_name , $default = 'Undefined'){
        $team_id = $this->team_id;
        $value = $this->get_var_value($team_id, $var_name);
        $value = ($value == 'Undefined' ? ($default == 'Undefined'? $this->template_vars["$var_name"]->value : $default): $value);
        return $value;
    }

    public function get_template_vars($team_id){

        $this->team_id = $team_id;
 
        // Transformando arquivo XML em Objeto
        $xml_dir = '../../resources/views/templates/'.$this->name.'/vars.xml';
        $xml = simplexml_load_file((resource_path('views/templates/'.$this->name.'/vars.xml')));
         
        //return $xml->var;
        $vars = array();

        // Percorre todos os registros de vendas
        foreach($xml->var as $variable){
            $name = $variable->name;
            $type = $variable->type;
            $label = $variable->label;
            $value = $this->var_value_or_default($variable->name, $variable->default);
            
            $vars["$name"] = (object)[
                'name' => $name, 
                'type' => $type, 
                'label' => $label, 
                'value' => $value];
        }

        $this->template_vars = $vars;

        return (object)$vars;
    }
}
