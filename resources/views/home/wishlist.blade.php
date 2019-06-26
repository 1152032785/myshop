@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<div class="wishlist section">
		<div class="container">
			<div class="pages-head">
				<h3>WISHLIST</h3>
			</div>
			<div class="content">
				<div class="cart-1">
                
					<div class="row">
						<div class="col s5">
							<h5>Image</h5>
						</div>
						<div class="col s7">
							<img src="{{$res->goods_pic}}" alt="" w上idth="100" height="50">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Name</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$res->goods_name}}</a></h5>
						</div>
					</div>
					
					<div class="row">
						<div class="col s5">
							<h5>Price</h5>
						</div>
						<div class="col s7">
							<h5>${{$res->goods_price}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Action</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
					<div class="row">
						<div class="col 12">
							<!-- <button class="btn button-default">加入购物车</button> -->
							<a href="{{url('buyCart')}}?id={{$res->id}}" class="btn button-default">加入购物车</a>
						</div>
					</div>
                    
				</div>
		
				</div>
			</div>
		</div>
	</div>
	<!-- end wishlist -->

	<!-- loader -->

	<!-- end wishlist -->

	<!-- loader -->
	    <div id="fakeLoader"></div>
    <!-- end loader -->
@endsection	