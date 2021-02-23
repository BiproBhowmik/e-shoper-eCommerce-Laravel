@extends('layouts/frontend/main')

@section('fcontent')


<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
						<input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password">
						<span>
							<input id="remember_me" type="checkbox" class="form-checkbox" name="remember"> 
							Keep me signed in
						</span>
						<div class="flex items-center justify-end mt-4">
							@if (Route::has('password.request'))
						</a>
						<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
							{{ __('Forgot your password?') }}
						</a>
						@endif

						<button type="submit" class="btn btn-default">Login</button>
					</div>
				</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2>New User Signup!</h2>
				<form method="POST" action="{{ route('register') }}">
					@csrf
					<input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
					<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required>
					<input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" placeholder="Phone Number" required>
					<input id="address" class="block mt-1 w-full" type="address" name="address" :value="old('address')" placeholder="Full Address" required>
					
					<input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password">
					<input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
					<button type="submit" class="btn btn-default">Signup</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>
</div>
</section>


@endsection