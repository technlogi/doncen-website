@extends('admin.layout.auth')

<!-- Main Content -->
@section('content')
<body class="bg-dark"> 
  <div class="container col-md-5 col-md-offset-2">
    <div class="card card-login  mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
      
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail Address">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
       </div>
    </div>
  </div>
</body>
@endsection
