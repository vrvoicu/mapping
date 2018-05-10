<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use App\Models\Mappings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function apply(Request $request, $id){
        $mapping = Mappings::find($id);

        $fields = Fields::where('mapping_id', $id)->get();

        $groups = DB::table('fields_values')->select('group_id')->groupBy('group_id')->get();

        $models = DB::table('fields')
            ->join('fields_values', 'fields_values.field_id', '=', 'fields.id')
            ->where('fields.mapping_id', $id)
            ->get();

        $data = $this->getDataFromUrl($mapping->mapping_url);
        $data = json_decode($data, true);

//        dd($data);

        foreach ($data as $dataKey => $dataRow) {

            foreach ($fields as $field)
                if ($field->field_type == Fields::TYPE_INPUT  && !isset($dataRow[$field->field_name]))
                    throw new \Exception('test');

            $fieldsValuesMatches = [];
            foreach ($groups as $group) {
                $fieldsValues = $models->where('group_id', $group->group_id);

                $fieldsValuesMatches[$group->group_id] = 0;
                foreach ($fieldsValues as $fieldValue)
                    if ($fieldValue->field_type == Fields::TYPE_INPUT && $dataRow[$fieldValue->field_name] == $fieldValue->field_value)
                        $fieldsValuesMatches[$group->group_id]++;

            }

            $keyValue = $this->getMaxKeyValue($fieldsValuesMatches);
            $fieldsValues = $models->where('group_id', $keyValue['key']);

            foreach ($fieldsValues as $fieldValue)
                if ($fieldValue->field_type == Fields::TYPE_OUTPUT)
                    $dataRow[$fieldValue->field_name] = $fieldValue->field_value;

        }

    }

    function getMaxKeyValue($array){
        $max = max($array);
        foreach ($array as $key => $value)
            if($value == $max)
                return ['key' => $key, 'value' => $value];
        return null;
    }


    function getDataFromUrl($url){
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $output;
    }
}
