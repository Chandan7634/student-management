
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Class </h3>
            <a href="{{ url('classes') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('classes/'.$data['class']->class_id) }} " method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class_name">Class Name</label>
                            <input type="text" name="class_name" id="class_name" value="{{ $data['class']->class_name }}" class="form-control @error('class_name') {{ 'is-invalid' }} @enderror" placeholder="Enter student name">
                            <small>
                                @error('class_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="party_id">Party</label>
                            <select name="party_id" class="form-select @error('party_id') {{ 'is-invalid' }} @enderror" id="">
                                @foreach ($data['party'] as $p)
                                <option @if ($data['class']->party_id == $p->party_id) {{'selected'}}  @endif value="{{ $p->party_id }}">{{ ucfirst($p->party_name) }} </option>
                                @endforeach
                            </select>
                            <small>
                                @error('party_id')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <input type="submit"  class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection