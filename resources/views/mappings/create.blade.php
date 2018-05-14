<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 06.05.2018
 * Time: 23:29
 */
?>

@extends('welcome')

@section('content')

    @include('errors')

    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <form id="create-form" method="post" action="{{ route('mappings.store') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nume mapare</label>
                        <input class="form-control" type="text" name="mapping_name" />
                    </div>

                    <div class="form-group">
                        <label>Url</label>
                        <input class="form-control" type="text" name="mapping_url" />
                    </div>

                    <div id="input-container">
                        <button type="button" onclick="clone('#input-container', '.input-field')"> + </button>
                        <button type="button" onclick="removeClone('#input-container', '.input-field')"> - </button>

                        <div class="form-group input-field">
                            <label>Camp folosit in mapare</label>
                            <input class="form-control" type="text" name="input_field_name[]" />
                        </div>
                    </div>

                    <div id="output-container">
                        <button type="button" onclick="clone('#output-container', '.output-field', true)"> + </button>
                        <button type="button" onclick="removeClone('#output-container', '.output-field', true)"> - </button>


                        <div class="form-group output-field">
                            <label>Camp rezultat din mapare</label>
                            <input class="form-control" type="text" name="output_field_name[]" />
                        </div>
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

