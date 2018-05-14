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

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Url</th>
                        <th>Asignare valori</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                    <tr>
                        <td><a href="{{ route('mappings.edit', ['id' => $model->getKey()]) }}"> {{ $model->mapping_name }} </a></td>
                        <td>{{ $model->mapping_url }}</td>
                        <td><a href="{{ route('mapping-fields-values.index', ['id' => $model->getKey()]) }}"> Valori </a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection