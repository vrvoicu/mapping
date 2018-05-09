<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 06.05.2018
 * Time: 23:19
 */
?>
@if(count($errors) > 0)
    <div class="callout callout-danger">
        <h4><i class="fa fa-warning"></i>&nbsp;&nbsp;{{trans('app_labels.attention')}}</h4>
        <ul class="list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
