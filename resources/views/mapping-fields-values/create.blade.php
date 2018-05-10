<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 10.05.2018
 * Time: 04:17
 */
?>

@extends('welcome')

@section('content')

    @include('errors')

    <form method="post" action="{{ route('mapping-fields-values.store', ['id' => request()->route()->parameters()['id']]) }}">

        {{ csrf_field() }}

        @foreach($models as $model)

            <div class="form-group">
                <label>{{ $model->field_name }}</label>
                <input class="form-control" type="text" name="{{ $model->field_name }}" />
            </div>

        @endforeach

        {{--<div class="form-group">
            <label>Url</label>
            <input class="form-control" type="text" name="client_url" />
        </div>--}}

        <button type="submit">Salvare</button>

    </form>

@endsection
