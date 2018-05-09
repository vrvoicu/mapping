<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 06.05.2018
 * Time: 23:26
 */
?>

@extends('welcome')

@section('content')

    @include('errors')

    <form method="post" action="{{ route('clients.update', ['id' => $model->getKey()]) }}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Nume client</label>
            <input class="form-control" type="text" name="client_name" value="{{ $model->client_name }}"/>
        </div>

        {{--<div class="form-group">
            <label>Url</label>
            <input class="form-control" type="text" name="client_url" value="{{ $model->client_url }}"/>
        </div>--}}

        <button type="submit">Salvare</button>

    </form>

@endsection
