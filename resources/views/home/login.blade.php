@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" action="{{url('home_do_login')}}" method="post">
					@csrf
						<div class="-field">
							<input type="text" class="validate" name="name" placeholder="USERNAME" required>
						</div>
						<div class="input-field">
							<input type="password" name="pwd" class="validate" placeholder="PASSWORD" required>
						</div>
						<a href="shop/"><h6>Forgot Password ?</h6></a>
						<button href="shop/" class="btn button-default">登录</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection	