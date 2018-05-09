<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use App\Models\Mappings;
use Illuminate\Http\Request;

class MappingsController extends Controller
{
    //

    public function index(){
        return view('mappings.index');
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

        foreach ($request->input()['field_name'] as $fieldName)
            if(strlen($fieldName) > 0)
                Fields::create([
                    'mapping_id' => $model->getKey(),
                    'field_name' => $fieldName,
                ]);

    }
}
