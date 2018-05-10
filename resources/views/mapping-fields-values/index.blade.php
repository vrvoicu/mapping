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

    <table class="table">
        <thead>
        <tr>
        @foreach($headModels as $model)
            <th>{{ $model->field_name }}</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
