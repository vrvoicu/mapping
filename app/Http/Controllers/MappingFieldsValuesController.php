<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use App\Models\FieldsValues;
use App\Models\Mappings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MappingFieldsValuesController extends Controller
{
    //

    public function index($id){

        /*$models = DB::table('mappings AS m')
            ->join('fields AS f', 'f.mapping_id', '=', 'm.id')
            ->get();*/

        $fields = Fields::where('mapping_id', $id)->get();

        $groups = DB::table('fields_values')->select('group_id')->groupBy('group_id')->get();

        $models = DB::table('fields')
            ->join('fields_values', 'fields_values.field_id', '=', 'fields.id')
            ->where('fields.mapping_id', $id)
            ->get();

        return view('mapping-fields-values.index', [
            'headModels' => $fields,
            'models' => $models,
            'groups' => $groups,
        ]);
    }

    public function create($id){

        $models = Fields::where('mapping_id', $id)->get();

        return view('mapping-fields-values.create',[
            'models' => $models
        ]);

    }

    public function store(Request $request, $id){

        $params = $request->input();

        $models = Fields::where('mapping_id', $id)->get();

        $group_id = DB::table('fields_values')->select(DB::raw('MAX(group_id) AS group_id'))->where('mapping_id', $id)->first();
        $group_id = $group_id->group_id;

        if($group_id == null)
            $group_id = 1;
        else
            $group_id++;

        foreach ($models as $model)
            if(isset($params[$model->field_name]))
                FieldsValues::create([
                    'mapping_id' => $id,
                    'field_id' => $model->id,
                    'field_value' => $params[$model->field_name],
                    'group_id' => $group_id,
                ]);
            else
                FieldsValues::create([
                    'mapping_id' => $id,
                    'field_id' => $model->id,
                    'field_value' => null,
                    'group_id' => $group_id,
                ]);

        return redirect()->route('mapping-fields-values.index', ['id' => $id]);

    }
}
