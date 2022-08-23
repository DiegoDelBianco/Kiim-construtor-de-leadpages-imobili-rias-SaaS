<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyMedia;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        return view('properties.list-property')->with(['team' => $team, 'properties' => $team->properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        return view('properties.create-property')
            ->with([
                'team' => $team, 
                'properties' => $team->properties,
                'property_types' => PropertyType::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Team  $team
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        /*
         *   FALTA VALIDAR PERMISSÕES DO USUÀRIO SOBRE A SITE
         */

        //Válida os dados do formulário
        $request->validate([
            'title' => ['nullable', 'string', 'min:0', 'max:255'],
            'cod' => ['nullable', 'string', 'min:0', 'max:255'],
            'cep' => ['required', 'string', 'min:0', 'max:255'],
            'street' => ['required', 'string', 'min:0', 'max:255'],
            'number_street' => ['nullable', 'string', 'min:0', 'max:255'],
            'neighborhood' => ['required', 'string', 'min:0', 'max:255'],
            'neighborhood_related' => ['nullable', 'string', 'min:0', 'max:255'],
            'mapsLati' => ['nullable', 'string', 'min:0', 'max:255'],
            'mapsLong' => ['nullable', 'string', 'min:0', 'max:255'],
            'city' => ['required', 'string', 'min:0', 'max:255'],
            'state' => ['required', 'string', 'min:0', 'max:255'],
            'zone' => ['nullable', 'string', 'min:0', 'max:255'],
            'property_type_id' => ['exists:property_types,id'],
            'bedrooms' => ['nullable', 'integer'],
            'suites' => ['nullable', 'integer'],
            'm2' => ['nullable', 'integer'],
            'm2built' => ['nullable', 'integer'],
            'furnished' => ['nullable', 'boolean'],
            'bathrooms' => ['nullable', 'integer'],
            'parking' => ['nullable', 'integer'],
            'rent' => ['nullable', 'boolean'],
            'rent_price' => ['nullable', 'string', 'min:0', 'max:255'],
            'sale' => ['nullable', 'boolean'],
            'sale_price' => ['nullable', 'string', 'min:0', 'max:255'],
            'rent_iptu' => ['nullable', 'string', 'min:0', 'max:255'],
            'condominium_price' => ['nullable', 'string', 'min:0', 'max:255'],
            'its_condominium' => ['nullable', 'boolean'],
            'shared_house' => ['nullable', 'boolean'],
            'description' => ['nullable', 'string', 'min:0', 'max:255'],
            'building' => ['nullable', 'boolean'],
            'end_build' => ['nullable', 'date', 'min:0', 'max:255'],
            'exchange' => ['nullable', 'boolean'],
            'status' => ['nullable', 'boolean'],
            'pets' => ['nullable', 'boolean'],
        ]);

        //Adiciona o imóvel
        $property = Property::create([
            'title' =>  $request->title,
            'cod' =>  $request->cod,
            'cep' =>  $request->cep,
            'street' =>  $request->street,
            'number_street' =>  $request->number_street,
            'neighborhood' =>  $request->neighborhood,
            'neighborhood_related' =>  $request->neighborhood_related,
            'team_id' =>  $team->id,
            //'mapsLati' =>  $request->mapsLati,
            //'mapsLong' =>  $request->mapsLong,
            'city' =>  $request->city,
            'state' =>  $request->state,
            'zone' =>  $request->zone,
            'property_type_id' =>  $request->property_type_id,
            'bedrooms' =>  $request->bedrooms,
            'suites' =>  $request->suites,
            'm2' =>  $request->m2,
            'm2built' =>  $request->m2built,
            'furnished' =>  $request->furnished,
            'bathrooms' =>  $request->bathrooms,
            'parking' =>  $request->parking,
            'rent' =>  $request->rent,
            'rent_price' =>  $request->rent_price,
            'sale' =>  $request->sale,
            'sale_price' =>  $request->sale_price,
            'rent_iptu' =>  $request->rent_iptu,
            'condominium_price' =>  $request->condominium_price,
            'its_condominium' =>  $request->its_condominium,
            'shared_house' =>  $request->shared_house,
            'description' =>  $request->description,
            'building' =>  $request->building,
            'end_build' =>  $request->end_build,
            'exchange' =>  $request->exchange,
            'status' =>  TRUE,
            'pets' =>  $request->pets,
        ]);


        return redirect(route('dashboard.properties.list', $team->id));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
     * @param  \App\Models\Team  $team
     * @param  \App\Models\Property  $property
     */
    public function media_index(Team $team, Property $property){
        return view('properties.list-media-property')
            ->with([
                'team' => $team, 
                'property' => $property,
                'medias' => $property->medias,
            ]);
    }



    /**
     * @param  \App\Models\Team  $team
     * @param  \App\Models\Property  $property
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function media_store(Request $request, Team $team, Property $property)
    {
        $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);


        $propertymedia = new PropertyMedia;

        $propertymedia->name = basename($_FILES['image']['name']);
        $propertymedia->property_id = $property->id;
        $propertymedia->format = 'webp';
        $propertymedia->save();


        $file = $_FILES['image']; 
        $propertymedia->storeImages($file);


        if(!$property->thumb){
            $property->thumb_id = $propertymedia->id;
            $property->save();
        }

        return redirect(route('dashboard.properties.media.list', [$team->id, $property->id]));

    }

    /**
     * @param  \App\Models\Team  $team
     * @param  \App\Models\Property  $property
     * @param  \App\Models\PropertyMedia  $media
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function media_thumb(Request $request, Team $team, Property $property, PropertyMedia  $media)
    {
        if($media->property_id == $property->id){
            $property->thumb_id = $media->id;
            $property->save();
        }

        return redirect(route('dashboard.properties.media.list', [$team->id, $property->id]));

    }

}
