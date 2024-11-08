<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Student</title>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <meta name="description" content="" />
      
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
      <style>
         .alert-success{
            width: 700px;
            margin-top: 11px;
         }
         small{
            color: #ff0000a3;
         }
         .card-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
         }
         .page-wrapper .page-wrapper {
            margin-left: 176px;
         }
      </style>
   </head>
   <body>
      <div class="page-wrapper">


         <div class="page-wrapper">
            <div class="main-content">
               <div class="row">
                  <div class="row justify-content-center">
    <div class="col-6">
         <div class="card">
        <div class="card-header">
            <h3>Login @if(session('flash_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('flash_message') }}</strong> 
                            <button type="button" class="close" id="closeMsg" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif </h3>
        </div>
        <div class="card-body">
            <form action=" {{ url('login') }} " method="POST">
                @csrf
                @method('POST')
                <div class="mb-2">
                  <label for="email">Email</label>
                <input type="email" name="email" class="form-control  @error('email') {{ 'is-invalid' }} @enderror" placeholder="Enter email">
                <small>
                     @error('email')
                        {{ $message }}
                     @enderror
                  </small>
                </div>
               <div class="mb-2">
                   <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror" placeholder="Enter password">
                <small>
                     @error('password')
                        {{ $message }}
                     @enderror
                  </small>
               </div>
                <input type="submit" value="Submit" class="btn btn-primary" id="">
            </form>
        </div>
 </div>
    </div>
</div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

   </body>
</html>
