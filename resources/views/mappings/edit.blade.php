<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 06.05.2018
 * Time: 23:29
 */

use App\Models\Fields;

?>

@extends('welcome')

@section('content')

    @include('errors')

    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <form id="create-form" method="post" action="{{ route('mappings.update', ['id' => $model->getKey()]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Nume mapare</label>
                        <input class="form-control" type="text" name="mapping_name" value="{{ $model->mapping_name }}" />
                    </div>

                    <div class="form-group">
                        <label>Url</label>
                        <input class="form-control" type="text" name="mapping_url" value="{{ $model->mapping_url }}" />
                    </div>

                    <div id="input-container">
                        <button type="button" onclick="clone('#input-container', '.input-field')"> + </button>
                        <button type="button" onclick="removeClone('#input-container', '.input-field')"> - </button>

                        @foreach($fields->where('field_type', Fields::TYPE_INPUT) as $field)
                            <div class="form-group input-field">
                                <label>Camp folosit in mapare</label>
                                <input class="form-control" type="text" name="input_field_name[]" value="{{ $field->field_name }}"/>
                            </div>
                        @endforeach

                        @if(sizeof($fields) == 0)
                            <div class="form-group input-field">
                                <label>Camp folosit in mapare</label>
                                <input class="form-control" type="text" name="input_field_name[]"/>
                            </div>
                        @endif
                    </div>

                    <div id="output-container">
                        <button type="button" onclick="clone('#output-container', '.output-field', true)"> + </button>
                        <button type="button" onclick="removeClone('#output-container', '.output-field', true)"> - </button>

                        @foreach($fields->where('field_type', Fields::TYPE_OUTPUT) as $field)
                            <div class="form-group output-field">
                                <label>Camp rezultat din mapare</label>
                                <input class="form-control" type="text" name="output_field_name[]" value="{{ $field->field_name }}"/>
                            </div>
                        @endforeach

                        @if(sizeof($fields) == 0)
                            <div class="form-group output-field">
                                <label>Camp rezultat din mapare</label>
                                <input class="form-control" type="text" name="output_field_name[]"/>
                            </div>
                        @endif
                    </div>

                    <button type="submit">Salvare</button>

                </form>

            </div>
        </div>
    </div>

    <script>
        function clone(container, element){
            var container = $(container);
            var element = $($(element)[0]);

            var newElement = element.clone();

            container.append(newElement);
        }

        function removeClone(container, element){
            var container = $(container);
            var elements = $(element);

            if(elements.length == 1)
                return;

            var element = $(elements[elements.length -1]);

            element.remove();
        }
    </script>

@endsection
