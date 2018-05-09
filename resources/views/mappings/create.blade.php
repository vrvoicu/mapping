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

        <button type="button" onclick="clone('#create-form', '.field', true)"> + </button>
        <button type="button" onclick="removeClone('#create-form', '.field', true)"> - </button>

        <div class="form-group field">
            <label>Camp</label>
            <input class="form-control" type="text" name="field_name[]" />
        </div>

        <button type="submit">Salvare</button>

    </form>

    <script>
        function clone(container, element, isForm){
            var container = $(container);
            var element = $($(element)[0]);

            if(isForm) {
                var button = $('button[type="submit"]');
                button.remove();
            }

            console.log(element);

            var newElement = element.clone();

            container.append(newElement);

            if(isForm)
                container.append(button);
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

