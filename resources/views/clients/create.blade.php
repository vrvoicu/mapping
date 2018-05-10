<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 06.05.2018
 * Time: 23:08
 */
?>

@extends('welcome')

@section('content')

    @include('errors')

<form method="post" action="{{ route('clients.store') }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label>Nume client</label>
        <input class="form-control" type="text" name="client_name" />
    </div>

    {{--<div class="form-group">
        <label>Url</label>
        <input class="form-control" type="text" name="client_url" />
    </div>--}}

    <button type="submit">Salvare</button>

</form>

@endsection
