@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>CART</h3>
			</div>
			<div class="content">
				@foreach($data as $v)
				<div class="cart-1 goods" gid={{$v->id}}> 
					<div class="row cart" cid={{$v->id}}>
						<div class="col s5">
							<h5>图片</h5>
						</div>
						<div class="col s7">
							<img src="{{$v->goods_pic}}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>姓名</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v->goods_name}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Quantity</h5>
						</div>
						<div class="col s7">
							<input value="1" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>价格</h5>
						</div>
						<div class="col s7">
							<h5>${{$v->goods_price}}</h5>
						</div>
					</div>
					<div class="row cart" cid="{{$v->id}}">
						<div class="col s5">
							<h5>Action</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				@endforeach
			</div>
			<div class="total">
				
				<div class="row">
					<div class="col s7">
						<h6>总价</h6>
					</div>
					<div class="col s5">
						<h6>${{$total}}</h6>
					</div>
				</div>
			</div>
				<button   class="btn button-default">结算</button>
		</div>
	</div>
	<script src="/jquery-3.3.1.js"></script>
	<script>
		//给结算一个点击事件
		$('.button-default').click(function(){
			// alert(1);
			// console.log($('.goods'))
			var gid="";  //顶一个空字符串

			//循环遍历去除id
			$('.goods').each(function(){
				gid += $(this).attr('gid');  //拼接多个id
				gid += ',';   //用逗号把多个id隔开
			})
			// console.log(gid);
			location.href='order?id='+gid;
		});
        
		//删除
		$('.fa-trash').click(function(){
			// console.log($('.cart'));
			var id=$(this).parents('.cart').attr('cid');
			alert(id);
		})
	</script>
@endsection	