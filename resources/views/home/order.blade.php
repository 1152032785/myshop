@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<div class="checkout pages section">
		<div class="container">
			<div class="pages-head">
				<h3>CHECKOUT</h3>
			</div>
			<div class="checkout-content">
				<div class="row">
					<div class="col s12">
						<ul class="collapsible" data-collapsible="accordion">
							<li>
								<div class="collapsible-header active"><h5>1 - Checkout Method</h5></div>
								<div class="collapsible-body">
									<h6>Checkout as a Guest or Register</h6>
									<form action="#" class="checkout-radio">
										<p>
											<input type="radio" class="with-gap" id="guest-checkout" name="group1">
											<label for="guest-checkout"><span>Guest Checkout</span></label>
										</p>
										<p>
											<input type="radio" class="with-gap" id="register" name="group1">
											<label for="register"><span>Register</span></label>
										</p>
									</form>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis sunt</p>
									<a href="" class="btn button-default">CONTINUE</a>
									<div class="checkout-login">
										<div class="row">
											<form class="col s12">
												<h6>Login</h6>
												<p>Lorem ipsum dolor sit amet.</p>
												<div class="input-field">
													<h5>Username/Email</h5>
													<input type="text" class="validate" required>
												</div>
												<div class="input-field">
													<h5>Password</h5>
													<input type="password" class="validate" required>
												</div>
												<a href=""><h6>Forgot Password ?</h6></a>
												<a href="" class="btn button-default">LOGIN</a>
											</form>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>2 - Billing Information</h5></div>
								<div class="collapsible-body">
									<div class="billing-information">
										<form action="#">
											<div class="input-field">
												<h5>Name*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Email*</h5>
												<input type="email" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Company Name</h5>
												<input type="text" class="validate">
											</div>
											<div class="input-field">
												<h5>Address*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Town/City*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>State/Country*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Portalcode/ZIP*</h5>
												<input type="number" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Phone*</h5>
												<input type="number" class="validate" required>
											</div>
											<a href="" class="btn button-default">CONTINUE</a>
										</form>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>3 - Shipping Information</h5></div>
								<div class="collapsible-body">
									<div class="shipping-information">
										<form action="#">
											<div class="input-field">
												<h5>Name*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Email*</h5>
												<input type="email" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Company Name</h5>
												<input type="text" class="validate">
											</div>
											<div class="input-field">
												<h5>Address*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Town/City*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>State/Country*</h5>
												<input type="text" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Portalcode/ZIP*</h5>
												<input type="number" class="validate" required>
											</div>
											<div class="input-field">
												<h5>Phone*</h5>
												<input type="number" class="validate" required>
											</div>
											<a href="" class="btn button-default">CONTINUE</a>
										</form>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>4 - Payment Mode</h5></div>
								<div class="collapsible-body">
									<div class="payment-mode">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur provident repellat</p>
										<form action="#" class="checkout-radio">
												<div class="input-field">
													<input type="radio" class="with-gap" id="bank-transfer" name="group1">
													<label for="bank-transfer"><span>Bank Transfer</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="cash-on-delivery" name="group1">
													<label for="cash-on-delivery"><span>Cash on Delivery</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="online-payments" name="group1">
													<label for="online-payments"><span>Online Payments</span></label>
												</div>
	
											<a href="" class="btn button-default">CONTINUE</a>
										</form>
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>5 - Order Review</h5></div>
								<div class="collapsible-body">
									<div class="order-review">
										<div class="row">
                                            @foreach($res as $v)
											<div class="col s12">
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>图片</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<img src="{{$v->goods_pic}}" alt="">
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>商品名称</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<a href="">{{$v->goods_name}}</a>
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>Quantity</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<input type="text" value="1">
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>sahng</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>${{$v->goods_price}}</span>
														</div>
													</div>
												</div>
												
											</div>
                                            @endforeach
										</div>
									</div>
									<div class="order-review final-price">
										<div class="row">
											<div class="col s12">
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>Sub Total</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>$26.00</span>
														</div>
													</div>
												</div>
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>Flat Shipping Rate:</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>$5.00</span>
														</div>
													</div>
												</div>
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>Total</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>$31.00</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a href="{{url('pay')}}?id={{$res[0]->oid}}" class="btn button-default button-fullwidth">CONTINUE</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection	