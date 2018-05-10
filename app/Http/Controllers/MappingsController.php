<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use App\Models\Mappings;
use Illuminate\Http\Request;

class MappingsController extends Controller
{
    //

    public function index(){

        $models = Mappings::all();

        return view('mappings.index', [
            'models' => $models
        ]);
    }

    public function create(){
        return view('mappings.create');
    }

    public function store(Request $request){

        $rules = [
            'mapping_name' => 'required',
            'mapping_url' => 'required',
        ];

        $this->validate($request, $rules);

        $model = Mappings::create($request->only([
            'mapping_name', 'mapping_url'
        ]));

        foreach ($request->input()['input_field_name'] as $fieldName)
            if(strlen($fieldName) > 0)
                Fields::create([
                    'mapping_id' => $model->getKey(),
                    'field_name' => $fieldName,
                    'field_type' => Fields::TYPE_INPUT
                ]);

        foreach ($request->input()['output_field_name'] as $fieldName)
            if(strlen($fieldName) > 0)
                Fields::create([
                    'mapping_id' => $model->getKey(),
                    'field_name' => $fieldName,
                    'field_type' => Fields::TYPE_OUTPUT
                ]);

    }
}
