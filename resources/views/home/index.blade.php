@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<div class="slider">
		
		<ul class="slides">
			<li>
				<img src="shop/img/1.jpg" alt="">
				<div class="caption slider-content  center-align">
					<h2>WELCOME TO MSTORE</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="shop/img/2.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>JACKETS BUSINESS</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="shop/img/3.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>FASHION SHOP</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
		</ul>

	</div>
	<!-- end slider -->

	<!-- features -->
	<div class="features section">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<h6>Free Shipping</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<h6>Money Back</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-0">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-lock"></i>
						</div>
						<h6>Secure Payment</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-support"></i>
						</div>
						<h6>24/7 Support</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features -->

	<!-- quote -->
	<div class="section quote">
		<div class="container">
			<form action="">
				<input type="text" name="find_name">
				<input type="submit" value="搜索">
			</form>
		</div>
	</div>
	<!-- end quote -->

	<!-- product -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4><a href="{{url('goodsList')}}">全部商品</a></h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>
			<div class="row">
				@foreach($data as $v)
				<div class="col s6">
					<div class="content">
						<img src="{{$v->goods_pic}}" alt="">
						<h6><a href="">{{$v->goods_name}}</a></h6>
						<div class="price">
							${{$v->goods_price}} <span>$28</span>
						</div>
						<!-- <button class="btn button-default">ADD TO CART</button> -->
						<a href="{{url('wish')}}?id={{$v->id}}" class="btn button-default">商品详情</a>
					</div>
				</div>
				@endforeach
			</div>
			<div class="pagination-product">
				<ul>
					{{$data->appends(['find_name'=>$name])->links()}}
				</ul>
			</div>
			<!-- <div class="pagination-product">
				<ul>
					<li class="active">1</li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<!-- end product -->

	<!-- promo -->
	
	<!-- end promo -->

	<!-- product -->

	<!-- end product -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	
	<!-- end loader -->
	<!-- {{$data->appends(['find_name'=>$name])->links()}} -->
	@endsection	