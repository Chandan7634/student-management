
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Students </h3>
            <a href="{{ url('classes') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('classes') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class_name">Class Name</label>
                            <input type="text" name="class_name" id="class_name" class="form-control @error('class_name') {{ 'is-invalid' }} @enderror" value="{{ old('class_name') }}" placeholder="Enter class name">
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
                                <option value="">Select Party</option>
                                @foreach ($party as $p)
                                <option value="{{ $p->party_id }}">{{ ucfirst($p->party_name) }} </option>
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