<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ $SETTING->app_name }} | {{$pageInfo['name']}}</title>
      @include('admin.layouts.components.stylesheets')
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
            <a href="{{ url(route('admin.login')) }}"><b>{{ $SETTING->app_name }}</b></a>
         </div>
         <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form action="{{url('admin/postLogin')}}" method="post">
                  @csrf
                  @if($errors->has('invalid_credential'))
                     <div class="text-danger text-center mb-1 text-sm">{{ $errors->first('invalid_credential') }}</div>
                  @endif                   
                  <div class="input-group">
                     <input type="email" class="form-control" name="email" placeholder="Email">                     
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>              
                  </div>
                  @if($errors->has('email'))
                     <div class="text-danger text-sm">{{ $errors->first('email') }}</div>
                  @endif          
                  <div class="mb-3"></div>
                  <div class="input-group">
                     <input type="password" class="form-control" name="password" placeholder="Password" >
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>                    
                  </div>
                  @if($errors->has('password'))
                     <div class="text-danger text-sm">{{ $errors->first('password') }}</div>
                  @endif  
                  <div class="mb-3"></div>                 
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember">
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <!-- /.col -->
                  </div>
               </form>
               <p class="mb-1">
                  <a href="#">I forgot my password</a>
               </p>
            </div>
            <!-- /.login-card-body -->
         </div>
      </div>
      <!-- /.login-box -->
      @include('admin.layouts.components.scripts')
   </body>
</html>