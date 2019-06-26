
@extends('layouts.home')

@section('title', '商品注册')

@section('content')
<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>注册</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12" action="{{url('home_do_register')}}" method="post">
					@csrf
						<div class="input-field">
							<input type="text" class="validate" name="name" placeholder="姓名" required>
						</div>
					
						<div class="input-field">
							<input type="password" name="pwd" placeholder="密码" class="validate" required>
						</div>
						<button class="btn button-default">注册</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection	