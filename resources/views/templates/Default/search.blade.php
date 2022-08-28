<!DOCTYPE html>
<html lang="pt-PT">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<title>{{ $team->name }}</title>
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />


		<link rel="stylesheet" id="real-estate-salient-Bitter-css" href="//fonts.googleapis.com/css?family=Bitter%3A400%2C400i%2C700&amp;ver=6.0.1" type="text/css" media="all">

		<script src="https://kit.fontawesome.com/3018d5f091.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/principal/jquery-3.6.0.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

		<link rel="canonical" href="{{ $team->get_domain() }}" />
		<link rel='shortlink' href='{{ $team->get_domain() }}' />
		<link rel="icon" href="{{asset($team->favicon_src())}}" />
		
		<link rel='stylesheet'  href='{{asset("templates/".$team->site_template->name."/css/style.css?v=".$team->site_template->version)}}' type='text/css' media='all' />
	</head>
	<body id="homepage-body">
		<header id="header-principal">
			<div class="container-fluid" id="topbar-hedar">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a href="{{$team->facebook}}" target="_blank" class="pr-2"><i class="fa-brands fa-facebook-f"></i></a>
							<a href="{{$team->instagram}}" target="_blank" class="pr-2"><i class="fa-brands fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						@if($team->logo)
							<img src="{{asset($team->logo_src())}}" alt="{{$team->name}}" title='{{$team->name}}'>
						@else
							<h1>{{$team->name}}</h1>
						@endif
					</div>
					<div class="navigational-menu col-md-8">
						<ul id="menu" class="navi">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-3548"><a href="#" aria-current="page">Inicial</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3696"><a href="/property">Imóveis</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3872"><a href="#">Sobre Nós</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3830"><a href="https://api.whatsapp.com/send?phone=551199999999">Contato</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>



		<div class="container-fluid home-two-search">
			<div class="row">
				<div class="container">
					<div class="home-two-search-content aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500" data-aos-once="true">
						<div data-options="{&quot;ajax_url&quot;:&quot;\/wp-admin\/admin-ajax.php&quot;,&quot;price_is_slider&quot;:&quot;false&quot;,&quot;enable_filter_location&quot;:&quot;0&quot;}" class="ere-search-properties clearfix ere-show-status-tab style-default color-dark ere-property-advanced-search clearfix tab color-dark ">
							<div class="form-search-wrap">
								<div class="form-search-inner">
									<div class="ere-search-content">
										<div data-href="#" class="search-properties-form">
											<div class="ere-search-status-tab">
												<input class="search-field" type="hidden" name="status" value="{{ ($get_status != NULL)?($get_status):'for-rent' }}" data-default-value="">
												<button type="button" data-value="for-rent" class="btn-status-filter {{ $get_status!=NULL?($get_status=='for-rent'? 'active':''):'active' }} ">Aluguel</button>
												<button type="button" data-value="for-sale" class="btn-status-filter {{ $get_status!=NULL?($get_status=='for-sale'? 'active':''):'' }}">Venda</button>
											</div>
											<div class="row">
												<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<select name="type" title="Property Types" class="search-field form-control" data-default-value="">
                               	 						<option value="">Tipo</option>
                               	 						@foreach($property_types as $type) 
                               	 							<option value="{{$type->id}}" {{ $get_type == $type->id ? "selected":"" }}>{{$type->name}}</option>
                               	 						@endforeach
													</select>
												</div><div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<select name="neighborhood" class="ere-property-neighborhood-ajax search-field form-control" title="Property Neighborhoods" data-selected="" data-default-value="">
														<option value="">Bairro</option>
														@foreach($neighborhoods as $neighborhood)
															<option value="{{$neighborhood->name}}" {{ $get_neighborhood == $neighborhood->name ? "selected":"" }}>{{$neighborhood->name}}</option>
														@endforeach
													</select>
												</div><div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<select name="bedrooms" title="Quartos do Imóvel" class="search-field form-control" data-default-value="">
														<option value="">Quartos</option>
														@for($i = 1; $i <=10; $i++)
														<option value="{{$i}}" {{ $get_bedrooms == $i ? "selected":"" }} >{{$i}}</option>
														@endfor
													</select>
												</div>    <div class="col-md-2 col-sm-3 col-xs-12 form-group">
													<select name="min-price" title="Preço Min" class="search-field form-control" data-default-value="">
														<option value="">
														Preço Min            </option>
														<option value="0" {{ $get_min_price == 0 ? "selected":"" }}>R$ 0</option>
														<option value="100" {{ $get_min_price == 100 ? "selected":"" }}>R$ 100</option>
														<option value="300" {{ $get_min_price == 300 ? "selected":"" }}>R$ 300</option>
														<option value="500" {{ $get_min_price == 500 ? "selected":"" }}>R$ 500</option>
														<option value="700" {{ $get_min_price == 700 ? "selected":"" }}>R$ 700</option>
														<option value="900" {{ $get_min_price == 900 ? "selected":"" }}>R$ 900</option>
														<option value="1100" {{ $get_min_price == 1100 ? "selected":"" }}>R$ 1.100</option>
														<option value="1300" {{ $get_min_price == 1300 ? "selected":"" }}>R$ 1.300</option>
														<option value="1500" {{ $get_min_price == 1500 ? "selected":"" }}>R$ 1.500</option>
														<option value="1700" {{ $get_min_price == 1700 ? "selected":"" }}>R$ 1.700</option>
														<option value="1900" {{ $get_min_price == 1900 ? "selected":"" }}>R$ 1.900</option>
													</select>
												</div>
												<div class="col-md-2 col-sm-3 col-xs-12 form-group">
													<select name="max-price" title="Preço Max" class="search-field form-control" data-default-value="">
														<option value="">Preço Max</option>
														<option value="200" {{ $get_max_price == 200 ? "selected":"" }}>R$ 200</option>
														<option value="400" {{ $get_max_price == 400 ? "selected":"" }}>R$ 400</option>
														<option value="600" {{ $get_max_price == 600 ? "selected":"" }}>R$ 600</option>
														<option value="800" {{ $get_max_price == 800 ? "selected":"" }}>R$ 800</option>
														<option value="1000" {{ $get_max_price == 1000 ? "selected":"" }}>R$ 1.000</option>
														<option value="1200" {{ $get_max_price == 1200 ? "selected":"" }}>R$ 1.200</option>
														<option value="1400" {{ $get_max_price == 1400 ? "selected":"" }}>R$ 1.400</option>
														<option value="1600" {{ $get_max_price == 1600 ? "selected":"" }}>R$ 1.600</option>
														<option value="1800" {{ $get_max_price == 1800 ? "selected":"" }}>R$ 1.800</option>
														<option value="2000" {{ $get_max_price == 2000 ? "selected":"" }}>R$ 2.000</option>
													</select>
												</div>
												<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<select name="garage" title="Property Garages" class="search-field form-control" data-default-value="">
														<option value="">Garagem</option>
														@for($i = 1; $i <=10; $i++)
														<option value="{{$i}}" {{ $get_garage == $i ? "selected":"" }} >{{$i}}</option>
														@endfor
													</select>
												</div>
												<div class="col-md-4 col-sm-6 col-xs-12 form-group submit-search-form pull-right">
													<button type="button" class="ere-advanced-search-btn"><i class="fa fa-search"></i>Buscar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>										
					</div>
				</div>
			</div>
		</div>


		<div class=" container mt-5">
			<div class="row">
				<div class="col-md-12 home-recent-title">
					<h2>Imóveis</h2>
					<p>Enontre o imóvel perfeito para você</p>
				</div>
			</div>
			<div class="row ere-property clearfix property-grid  col-gap-30 mb-5">
				@foreach($properties as $property)
				<div class="col-md-4 ere-item-wrap property-item mg-bottom-30 ere-property-featured">
					<div class="property-inner  pb-0">


						<div class="property-image">
							<a href="{{ asset($property->property_link($team->get_domain())) }}" title="{{ $property->get_title()}}">
								<img  src="{{asset($property->thumb_src())}}"  alt="{{ $property->get_title()}}" title="{{ $property->get_title()}}">
							</a>

							<div class="property-status">
								@if($property->rent)
									<p class="status-item">
										<span class="property-status-bg" style="background-color: #fb6a19">Aluguel<span class="property-arrow" style="border-left-color: #fb6a19; border-right-color: #fb6a19"></span></span>
									</p>
								@endif
								@if($property->sale)
									<p class="status-item">
										<span class="property-status-bg" style="background-color: #dd3333">Venda<span class="property-arrow" style="border-left-color: #dd3333; border-right-color: #dd3333"></span></span>
									</p>
								@endif
							</div>

						</div>


						<div class="property-item-content">
							<div class="property-heading">
								<h2 class="property-title">
									<a href="{{ asset($property->property_link($team->get_domain())) }}" title="{{ $property->get_title()}}">{{ $property->get_title()}}</a>
								</h2>
								<div class="property-price">
									@if($property->sale)
										<span>Venda R$ {{ $property->sale_price }}</span><br />
									@endif

									@if($property->rent)
										<span>Aluguel R$ {{ $property->rent_price }}<span class="property-price-postfix"> / Mês</span></span>
									@else
										<span></span><br />
									@endif

									@if(!$property->sale)
										<span></span><br /><br />
									@endif
								</div>
							</div>
							<div class="property-location" title="1911 Sunset Blvd Los Angeles, CA 90026">
								<i class="fa fa-map-marker"></i>
								<a target="_blank"><span>{{ $property->street }}, {{ $property->neighborhood }} - {{ $property->city }}, {{ $property->state }}</span></a>
							</div>
							<div class="property-element-inline">
								<div class="property-type-list">
									<i class="fa fa-tag"></i>
									<a href="#" title="{{ $property->type->name }}"><span>{{ $property->type->name }} </span></a>
								</div>
							</div>
							<div class="property-info">
								<div class="property-info-inner">
									<div class="property-area">
										<div class="property-area-inner property-info-item-tooltip" data-toggle="tooltip" title="" data-original-title="Tamanho">
											<span class="fa fa-arrows"></span>
											<span class="property-info-value">{{ $property->m2 }} m<sup>2</sup>		                                            </span>
										</div>
									</div>
									<div class="property-bedrooms">
										<div class="property-bedrooms-inner property-info-item-tooltip" data-toggle="tooltip" title="" data-original-title="3 Bedrooms">
											<span class="fa fa-hotel"></span>
											<span class="property-info-value">{{ $property->bedrooms }}</span>
										</div>
									</div>
									<div class="property-bathrooms">
										<div class="property-bathrooms-inner property-info-item-tooltip" data-toggle="tooltip" title="" data-original-title="2 Bathrooms">
											<span class="fa fa-bath"></span>
											<span class="property-info-value">{{ $property->bathrooms }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
				@endforeach
			</div>
		</div>







		<div class="footer container-fluid">
			<div class="container footer-content">
				<div class="row">
					<div class="col-md-4 footer-one">
						<div id="text-2" class="widget widget_text">
							<div class="wi-title clearfix">
								<h3 class="w-title">Sobre Nós</h3>
							</div>			
							<div class="textwidget">
								<div id="text-2" class="widget widget_text">
									<div class="textwidget">
										<p>

											@if($team->logo)
												<img style="max-width:100%" loading="lazy" class="custom-logo" src="{{asset($team->logo_src())}}" alt="{{ $team->name }}" >
												<br>Estamos a 5 anos no mercado ajudando nossos clientes a encontrar a casa dos seus sonhos, ou a alugar suas casas com segurança.
											@else
												{{$team->name}}
												<br>Estamos a 5 anos no mercado ajudando nossos clientes a encontrar a casa dos seus sonhos, ou a alugar suas casas com segurança.
											@endif
										</p>
									</div>
								</div>
							</div>
						</div>
						<div id="block-6" class="widget widget_block">
							<div class="wp-container-1 wp-block-group">
								<div class="wp-block-group__inner-container">

								</div>
							</div>
						</div>
						<div id="block-5" class="widget widget_block">
							<div class="wp-container-2 wp-block-group">
								<div class="wp-block-group__inner-container"></div>
							</div>
						</div>
						<div id="block-9" class="widget widget_block">
							<div class="wp-container-3 wp-block-group">
								<div class="wp-block-group__inner-container">

								</div>
							</div>
						</div>				</div>
						<div class="col-md-4 footer-two">
							<div id="nav_menu-3" class="widget widget_nav_menu">
								<div class="wi-title clearfix">
									<h3 class="w-title">Mapa do Site</h3>
								</div>
								<div class="menu-main-menu-container">
									<ul id="menu-main-menu" class="menu">
										<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-3548"><a href="#" aria-current="page">Inicial</a></li>
										<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3696"><a href="/property">Imóveis</a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3865"><a href="#">Pesquisar</a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3872"><a href="#">Sobre Nós</a></li>
										<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3830"><a href="https://api.whatsapp.com/send?phone=551199999999">Contato</a></li>
									</ul>
								</div>
							</div>				
						</div>

						<div class="col-md-4 footer-three">
							<div id="text-3" class="widget widget_text">
								<div class="wi-title clearfix">
									<h3 class="w-title">Contato</h3>
								</div>			
								<div class="textwidget">
									<p><strong>Endereço:</strong> Av. Loren Ipsum, 999 – Jd Loren – São Paulo SP<br>
										<strong>Creci:</strong> 99.9999<br>
										<strong>WhatsApp:</strong> (11) 9 9999-9999<br>
										<strong>Email:</strong> contato@imobiliaria.com.br<br>
									</p>
								</div>
							</div>				
						</div>
					<div class="col-md-12">
						<div class="footer-copyright">
							<p>Copyright  © 2022<a href="{{ $team->get_domain() }}">  {{$team->name}} </a>Desenvolvido com  <a href="https://kiim.com.br/" target="_blank" rel="nofollow">Kiim.com.br</a></p> 
						</div>

					</div>
				</div>
			</div>
		</div>







	    <!-- BRANDING DA KIIM PARA CLIENTES QUE NAO SAO PRO -->
	    @include('templates.nopro')










		<script>
			var url = '{{ $team->get_domain() }}';
		</script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('templates/'.$team->site_template->name.'/js/property-search.min.js?v='.$team->site_template->version)}}"></script>
	</body><!-- body -->
</html><!-- html -->