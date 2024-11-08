@extends('layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Name : <strong> {{ $data->class_name }}  </h4>
            <h4 class="mb-2">School : <strong> {{ $data->party->party_name }}  </h4>
        </div>
    </div>
@endsection