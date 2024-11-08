@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Party Details </h3>
        </div>
        <div class="card-body">
            <h4 class="mb-2">Party Name : <strong> {{ $party->party_name }}  </h4>
            <h4 class="mb-2">Email : <strong> {{ $party->email }}  </h4>
            <h4 class="mb-2">Phone : <strong> {{ $party->phone }}  </h4>
            <h4 class="mb-2">Address : <strong> {{ $party->address }}  </h4>
            <h4 class="mb-2">City : <strong> {{ $party->city }}  </h4>
            <h4 class="mb-2">District : <strong> {{ $party->district }}  </h4>
            <h4 class="mb-2">State : <strong> {{ $party->state }}  </h4>
            <h4 class="mb-2">GST : <strong> {{ $party->GST }}  </h4>
        </div>
    </div>
@endsection