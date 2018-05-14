<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 10.05.2018
 * Time: 04:16
 */
?>

@extends('welcome')

@section('content')

    @include('errors')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" onclick="window.location = '{{ route('mapping-fields-values.create', ['id' => $id]) }}'">Adaugare</button>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <table class="table">
                    <thead>
                    <tr>
                        @foreach($headModels as $model)
                            <th>{{ $model->field_name }}</th>
                            <th>Stergere</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <?php $group_id = 1 ?>
                    @foreach($groups as $group)
                        <?php $rows = $models->where('group_id', $group->group_id) ?>
                        <tr>
                            @foreach($rows as $row)
                                <td>{{ $row->field_value }}</td>
                            @endforeach
                            <td><a href="{{ route('') }}"> X </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
