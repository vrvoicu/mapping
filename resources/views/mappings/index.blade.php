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

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($models as $model)
    <tr>
        <td>{{ $model->mapping_name }}</td>
        <td>{{ $model->mapping_url }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection