
@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Party </h3>
            <a href="{{ url('parties') }}" class="btn btn-sm btn-primary"> Back</a>
        </div>
        <div class="card-body">
            <form action=" {{ url('parties') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="student_name">Party Name</label>
                            <input type="text" name="party_name" id="party_name" class="form-control @error('party_name') {{ 'is-invalid' }} @enderror" value="{{ old('party_name') }}" placeholder="Enter student name">
                            <small>
                                @error('party_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" value="{{ old('email') }}" placeholder="Enter email name">
                            <small>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control @error('phone') {{ 'is-invalid' }} @enderror" value="{{ old('phone') }}" placeholder="Enter phone">
                            <small>
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') {{ 'is-invalid' }} @enderror" value="{{ old('address') }}" placeholder="Enter address">
                        <small>
                            @error('address')
                                {{ $message }}
                            @enderror
                        </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control @error('city') {{ 'is-invalid' }} @enderror" value="{{ old('city') }}" placeholder="Enter city">
                            <small>
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="district">District</label>
                            <input type="text" name="district" id="district" class="form-control @error('district') {{ 'is-invalid' }} @enderror" value="{{ old('district') }}" placeholder="Enter district">
                            <small>
                                @error('district')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control @error('state') {{ 'is-invalid' }} @enderror" value="{{ old('state') }}" placeholder="Enter state">
                            <small>
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="GST">GST</label>
                            <input type="text" name="GST" id="GST" class="form-control @error('GST') {{ 'is-invalid' }} @enderror" value="{{ old('GST') }}" placeholder="Enter GST">
                            <small>
                                @error('GST')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror" value="{{ old('password') }}" placeholder="Enter password">
                            <small>
                                @error('password')
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