<!DOCTYPE html>
<html lang="pt-PT">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<title>{{ $team->name }}</title>
		<meta name='robots' content='noindex, nofollow' />
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />


		<link rel="stylesheet" id="real-estate-salient-Bitter-css" href="//fonts.googleapis.com/css?family=Bitter%3A400%2C400i%2C700&amp;ver=6.0.1" type="text/css" media="all">

		<script src="https://kit.fontawesome.com/3018d5f091.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/principal/jquery-3.6.0.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<!--link rel='stylesheet' id='owl.carousel-css'  href='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/packages/owl-carousel/assets/owl.carousel.min.css?ver=2.3.4' type='text/css' media='all' />
		<link rel='stylesheet' id='light-gallery-css'  href='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/packages/light-gallery/css/lightgallery.min.css?ver=1.2.18' type='text/css' media='all' />
		<link rel='stylesheet' id='ere_main-css'  href='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/css/main.min.css?ver=3.9.0' type='text/css' media='all' />
		<link rel='stylesheet' id='bootstrap-css'  href='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/packages/bootstrap/css/bootstrap.min.css?ver=3.4.1' type='text/css' media='all' />
		<link rel='stylesheet' id='bootstrap-css-css'  href='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/css/bootstrap.min.css?ver=6.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='font-awesome-css-css'  href='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/css/fontawesomeall.min.css?ver=6.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='flexslider-css'  href='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/css/flexslider.css?ver=6.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='slicknav-css'  href='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/css/slicknav.css?ver=6.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='real-estate-salient-Bitter-css'  href='//fonts.googleapis.com/css?family=Bitter%3A400%2C400i%2C700&#038;ver=6.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='real-estate-salient-style-css'  href='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/style.css?ver=6.0.1' type='text/css' media='all' />
		<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-includes/js/jquery/jquery.min.js?ver=3.6.0' id='jquery-core-js'></script>
		<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
		<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/js/jquery.flexslider.js?ver=6.0.1' id='flexslider-js'></script>
		<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/themes/real-estate-salient/js/custom.js?ver=6.0.1' id='real-estate-salient-custom-js'></script>
		<link rel="https://api.w.org/" href="https://demo017.delbianco.emp.br/wp-json/" /><link rel="alternate" type="application/json" href="https://demo017.delbianco.emp.br/wp-json/wp/v2/pages/3665" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://demo017.delbianco.emp.br/xmlrpc.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://demo017.delbianco.emp.br/wp-includes/wlwmanifest.xml" /> 
		<meta name="generator" content="WordPress 6.0.1" /-->
		<link rel="canonical" href="{{ $team->get_domain() }}" />
		<link rel='shortlink' href='{{ $team->get_domain() }}' />
		<!-- Custom Logo: hide header text >
		<style id="custom-logo-css" type="text/css">
			.site-title, .site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style-->
		<!--link rel="alternate" type="application/json+oembed" href="https://demo017.delbianco.emp.br/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo017.delbianco.emp.br%2F" />
		<link rel="alternate" type="text/xml+oembed" href="https://demo017.delbianco.emp.br/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo017.delbianco.emp.br%2F&#038;format=xml" />
		<noscript><style>.vce-row-container .vcv-lozad {display: none}</style></noscript><meta name="generator" content="Powered by Visual Composer Website Builder - fast and easy-to-use drag and drop visual editor for WordPress."/-->
		<link rel="icon" href="{{asset($team->favicon_src())}}" />
		<!--link rel="icon" href="https://demo017.delbianco.emp.br/wp-content/uploads/2022/05/cropped-robruel-thumb-192x192.jpg" sizes="192x192" />
		<link rel="apple-touch-icon" href="https://demo017.delbianco.emp.br/wp-content/uploads/2022/05/cropped-robruel-thumb-180x180.jpg" />
		<meta name="msapplication-TileImage" content="https://demo017.delbianco.emp.br/wp-content/uploads/2022/05/cropped-robruel-thumb-270x270.jpg" /-->

		<link rel='stylesheet'  href='{{asset("templates/".$team->site_template->name."/css/style.css?v=".$team->site_template->version)}}' type='text/css' media='all' />


		<link rel="stylesheet" href="https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/packages/owl-carousel/assets/owl.carousel.min.css?ver=2.3.4">



	</head>
	<body id="property-body" class="single-property">
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
						<a href="{{ URL('/') }}">
						@if($team->logo)
							<img src="{{asset($team->logo_src())}}" alt="{{$team->name}}" title='{{$team->name}}'>
						@else
							<h1>{{$team->name}}</h1>
						@endif
					</div>
					</a>
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





		<div class="content-area container">
			




























			<div class="single-index col-md-9 clearfix pt-5" id="content">
				<div id="container">
					<div id="content" role="main">        
						<link rel="stylesheet" id="ere_single-property-css" href="https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/css/single-property.min.css?ver=3.9.0" type="text/css" media="all">
						<div id="property-771" class="ere-property-wrap single-property-area content-single-property post-771 property type-property status-publish has-post-thumbnail hentry property-type-house property-status-for-rent property-feature-air-conditioning property-feature-electric-range property-feature-fire-alarm property-feature-marble-floors property-feature-microwave property-feature-swimming-pool property-feature-tv-cable property-feature-washer property-feature-wifi property-state-california property-city-los-angeles property-neighborhood-echo-park">
							

							<!-------- PROPERTY HEADER  -------------->
							<div class="mb-0 single-property-element property-info-header property-info-action">
								<div class="property-main-info">
									<div class="property-heading">
										<h2> {{$property->get_title()}} </h2>
										@if($property->rent)
											<div class="property-info-block-inline">
												<div>
													<span class="property-price">R$ {{$property->rent_price}}<span class="property-price-postfix"> / Mês</span></span>
													<div class="property-status"><span class="" style="background-color: #32b5f8">Aluguel</span></div>
												</div>

												@if(!$property->sale)
													<div class="property-location" title="{{ $property->street }}, {{ $property->neighborhood }} - {{ $property->city }}, {{ $property->state }} ">
														<i class="fa fa-map-marker"></i>
														<a target="_blank"><span>{{ $property->neighborhood }} - {{ $property->city }}, {{ $property->state }}</span></a>
													</div>
												@endif
											</div>
										@endif
										@if($property->sale)
											<div class="property-info-block-inline">
												<div>
													<span class="property-price">R$ {{$property->sale_price}}<span class="property-price-postfix"></span></span>
													<div class="property-status"><span class="" style="background-color: #32b5f8">Venda</span></div>
												</div>

												<div class="property-location" title="{{ $property->street }}, {{ $property->neighborhood }} - {{ $property->city }}, {{ $property->state }} ">
													<i class="fa fa-map-marker"></i>
													<a target="_blank"><span>{{ $property->neighborhood }} - {{ $property->city }}, {{ $property->state }}</span></a>
												</div>
											</div>
										@endif
									</div>
								</div>
								<div class="property-info">
									<div class="property-id">
										<span class="fa fa-barcode"></span>
										@if($property->cod != "")
										<div class="content-property-info">
											<p class="property-info-value">{{$property->cod}} </p>
											<p class="property-info-title">Cód do Imóvel</p>
										</div>
										@endif
									</div>
									<div class="property-area">
										<span class="fa fa-arrows"></span>
										<div class="content-property-info">
											<p class="property-info-value">{{$property->m2+0}} <span>m<sup>2</sup></span></p>
											<p class="property-info-title">Tamanho</p>
										</div>
									</div>
									<div class="property-bedrooms">
										<span class="fa fa-hotel"></span>
										<div class="content-property-info">
											<p class="property-info-value">{{$property->bedrooms+0}} </p>
											<p class="property-info-title">Quartos</p>
										</div>
									</div>
									<div class="property-bathrooms">
										<span class="fa fa-bath"></span>
										<div class="content-property-info">
											<p class="property-info-value">{{$property->bathrooms+0}}</p>
											<p class="property-info-title">Banheiros</p>
										</div>
									</div>
								</div>
								<!--div class="property-action">
									<div class="property-action-inner clearfix">
										<div class="social-share">
											<div class="social-share-hover">
												<i class="fa fa-share-alt" aria-hidden="true"></i>
												<div class="social-share-list">
													<div class="list-social-icon clearfix">
														<a target="_blank" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fdemo017.delbianco.emp.br%2Fproperty%2Fsingle-house-los-angeles%2F">
															<i class="fa fa-facebook"></i>
														</a>

														<a href="javascript: window.open('http://twitter.com/share?text=Single+House+Near%2C+Los+Angeles&amp;url=https%3A%2F%2Fdemo017.delbianco.emp.br%2Fproperty%2Fsingle-house-los-angeles%2F','_blank', 'width=900, height=450')">
															<i class="fa fa-twitter"></i>
														</a>

														<a href="javascript: window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fdemo017.delbianco.emp.br%2Fproperty%2Fsingle-house-los-angeles%2F&amp;title=Single+House+Near%2C+Los+Angeles','_blank', 'width=500, height=450')">
															<i class="fa fa-linkedin"></i>
														</a>


														<a target="_blank" href="https://wa.me/?text=https%3A%2F%2Fdemo017.delbianco.emp.br%2Fproperty%2Fsingle-house-los-angeles%2F"><i class="fa fa-whatsapp"></i></a>
													</div>
												</div>
											</div>
										</div>			
										<a href="javascript:void(0)" id="property-print" data-ajax-url="/wp-admin/admin-ajax.php" data-toggle="tooltip" data-original-title="Print" data-property-id="771"><i class="fa fa-print"></i></a>
									</div>
								</div -->
							</div> 
							<!-------- FECHA PROPERTY HEADER  -------------->






							<!--------    GALERIA    --------->   
							<div class="single-property-element property-gallery-wrap">
								<div class="ere-property-element">
									<div class="single-property-image-main owl-carousel manual ere-carousel-manual">

										@foreach($medias as $image)
											<div class="property-gallery-item ere-light-gallery">
												<img src="{{asset($image->path1200x675(TRUE))}}" alt="{{$property->get_title()}}" title="{{$property->get_title()}}">
												<a data-thumb-src="{{asset($image->path400x225(TRUE))}}" 
													data-gallery-id="ere_gallery-1678970013" 
													data-rel="ere_light_gallery" 
													href="{{asset($image->path1200x675(TRUE))}}" 
													class="zoomGallery">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										@endforeach

										<!--div class="property-gallery-item ere-light-gallery">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/02/property-17.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
											<a data-thumb-src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/02/property-17.jpg" data-gallery-id="ere_gallery-1678970013" data-rel="ere_light_gallery" href="https://demo017.delbianco.emp.br/wp-content/uploads/2017/02/property-17.jpg" class="zoomGallery">
												<i class="fa fa-expand"></i>
											</a>
										</div>
										<div class="property-gallery-item ere-light-gallery">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-44.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
											<a data-thumb-src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-44.jpg" data-gallery-id="ere_gallery-1678970013" data-rel="ere_light_gallery" href="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-44.jpg" class="zoomGallery">
												<i class="fa fa-expand"></i>
											</a>
										</div>
										<div class="property-gallery-item ere-light-gallery">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-06.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
											<a data-thumb-src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-06.jpg" data-gallery-id="ere_gallery-1678970013" data-rel="ere_light_gallery" href="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-06.jpg" class="zoomGallery">
												<i class="fa fa-expand"></i>
											</a>
										</div>
										<div class="property-gallery-item ere-light-gallery">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-11.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
											<a data-thumb-src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-11.jpg" data-gallery-id="ere_gallery-1678970013" data-rel="ere_light_gallery" href="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-11.jpg"
											class="zoomGallery"><i
											class="fa fa-expand"></i></a>
										</div>
										<div class="property-gallery-item ere-light-gallery">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-01-1.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
											<a data-thumb-src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-01-1.jpg" data-gallery-id="ere_gallery-1678970013" data-rel="ere_light_gallery" href="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-01-1.jpg" class="zoomGallery">
												<i class="fa fa-expand"></i>
											</a>
										</div-->
									</div>
									<div class="single-property-image-thumb owl-carousel manual ere-carousel-manual">



										@foreach($medias as $image)

											<div class="property-gallery-item">
												<img src="{{asset($image->path400x225(TRUE))}}" 
													alt="{{$property->get_title()}}" 
													title="{{$property->get_title()}}">
											</div>
										@endforeach
										<!--div class="property-gallery-item">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/02/property-17.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
										</div>
										<div class="property-gallery-item">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-44.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
										</div>
										<div class="property-gallery-item">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-06.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
										</div>
										<div class="property-gallery-item">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-11.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
										</div>
										<div class="property-gallery-item">
											<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/property-01-1.jpg" alt="Single House Near, Los Angeles" title="Single House Near, Los Angeles">
										</div-->
									</div>
								</div>
							</div>

							<!-------- FECHA GALERIA  -------------->







							<!-------- DESCRICAO  -------------->
							@if($property->description != "")
							<div class="single-property-element property-description">
								<div class="ere-heading-style2">
									<h2>Descrição</h2>
								</div>
								<div class="ere-property-element">
									<p>{{ $property->description }}</p>
								</div>
							</div>
							@endif
							<!-------- FECHA DESCRICAO  -------------->





							<!-------- ENDEREÇO  -------------->
							<div class="single-property-element property-location">
								<div class="ere-heading-style2">
									<h2>Endereço</h2>
								</div>
								<div class="ere-property-element">
									<div class="property-address">
										<strong>Endereço:</strong>
										<span>{{$property->street}} </span>
									</div>
									<ul class="list-2-col">
										<li>
											<strong>Estado</strong>
											<span>{{$property->state}}</span>
										</li>
										<li>
											<strong>Cidade</strong>
											<span>{{$property->city}}</span>
										</li>
										<li>
											<strong>Bairro:</strong>
											<span>{{$property->neighborhood}}</span>
										</li>
									</ul>
									<!--a class="open-on-google-maps" target="_blank" href="http://maps.google.com/?q=1911%20Sunset%20Blvd%20Los%20Angeles,%20CA%2090026">Ver no Google Maps <i class="fa fa-map-marker"></i></a-->
								</div>
							</div>
							<!-------- FECHA ENDEREÇO  -------------->








							<!-------- TABS DE INFORMACOES  -------------->
							<div class="single-property-element property-info-tabs property-tab">
								<div class="ere-property-element">
									<!-- Header --->
									<ul id="ere-features-tabs" class="nav nav-tabs hidden-xs">
										<li class="active">
											<a data-toggle="tab" href="#ere-overview">Geral</a>
										</li>
										<!--li>
											<a data-toggle="tab" href="#ere-features">Destaques</a>
										</li>
										<li>
											<a data-toggle="tab" href="#ere-video">Video</a>
										</li>
										<li>
											<a data-toggle="tab" href="#ere-virtual_tour_360">Virtual Tour</a>
										</li-->
									</ul>
									<!-- Fecha Header --->

									<div class="panel-group visible-xs" id="ere-features-tabs-accordion"></div>

									<div class="tab-content hidden-xs">

										<!-- Tab Geral -->
										<div id="ere-overview" class="tab-pane fade in active show">
											<ul class="list-2-col ere-property-list">
												@if($property->cod != "")
												<li>
													<strong>Cod do Imóvel</strong>
													<span>{{$property->cod}}</span>
												</li>
												@endif
												@if($property->rent)
												<li>
													<strong>Preço do Aluguel</strong>
													<span class="ere-property-price">
														R$ {{$property->rent_price}}                                     
														<span class="property-price-postfix"> / Mês</span>
													</span>
												</li>
												@endif
												@if($property->sale)
												<li>
													<strong>Preço para Venda</strong>
													<span class="ere-property-price">
														R$ {{$property->sale_price}}                                     
														<span class="property-price-postfix"> / Mês</span>
													</span>
												</li>
												@endif
												<li>
													<strong>Tipo de Imóvel</strong>
													<span>{{$property->type->name}}</span>
												</li>
												<li>
													<strong>Quartos</strong>
													<span>{{$property->bedrooms+0}}</span>
												</li>
												<li>
													<strong>Banheiros</strong>
													<span>{{$property->bathrooms+0}}</span>
												</li>
												<li>
													<strong>Terreno</strong>

													<span>{{$property->m2+0}} m<sup>2</sup></span>
												</li>
												<li>
													<strong>Area de construção</strong>
													<span>{{$property->m2built+0}} m<sup>2</sup></span>
												</li>


												<li>
													<strong>Garagens</strong>
													<span>{{$property->parking+0}}</span>
												</li>

											</ul>
										</div>
										<!-- Fecha Tab Geral -->


										<!-- Tab Destaques -->
										<div id="ere-features" class="tab-pane fade">
											<div class="row">
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/air-conditioning/" class="feature-checked"><i class="fa fa-check-square-o"></i> Air Conditioning</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/electric-range/" class="feature-checked"><i class="fa fa-check-square-o"></i> Electric Range</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/fire-alarm/" class="feature-checked"><i class="fa fa-check-square-o"></i> Fire Alarm</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/marble-floors/" class="feature-checked"><i class="fa fa-check-square-o"></i> Marble Floors</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/microwave/" class="feature-checked"><i class="fa fa-check-square-o"></i> Microwave</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/swimming-pool/" class="feature-checked"><i class="fa fa-check-square-o"></i> Swimming Pool</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/tv-cable/" class="feature-checked"><i class="fa fa-check-square-o"></i> TV Cable</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/washer/" class="feature-checked"><i class="fa fa-check-square-o"></i> Washer</a>
												</div>
												<div class="col-md-3 col-xs-6 col-mb-12 property-feature-wrap">
													<a href="https://demo017.delbianco.emp.br/property-feature/wifi/" class="feature-checked"><i class="fa fa-check-square-o"></i> WiFi</a>
												</div>
											</div>                
										</div>
										<!-- Fecha Tab Destaques -->


										<!-- Tab Video -->
										<div id="ere-video" class="tab-pane fade">
											<div class="video video-has-thumb">
												<div class="entry-thumb-wrap">
													<div class="entry-thumbnail property-video ere-light-gallery">
														<img class="img-responsive" src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/02/property-17.jpg" width="870" height="420" alt="Single House Near, Los Angeles">
														<a class="ere-view-video" data-src="https://www.youtube.com/watch?v=iuc9R-3lge8"><i class="fa fa-play-circle-o"></i></a>
													</div>
												</div>
											</div>
										</div>
										<!-- Fecha Tab Video -->


										<!-- Tuor Virual -->
										<div id="ere-virtual_tour_360" class="tab-pane fade">
											<iframe width="100%" height="500" src="https://my.matterport.com/show/?m=wWcGxjuUuSb&amp;utm_source=hit-content-embed" frameborder="0" allowfullscreen="" allowvr=""></iframe>                
										</div>
										<!-- Fecha Tuor Virutal -->

									</div>
								</div>

								<!-- Script Tabs -->
								<script type="text/javascript">
									jQuery(document).ready(function ($) {
										$('#ere-features-tabs').tabCollapse();
									});
								</script>
								<!-- Fecha Script Tabs -->

							</div>
							<!-------- FECHA TABS DE INFORMACOES  -------------->










							<!-------- GOOGLE MAPS  -------------->
							<!--div class="single-property-element property-google-map-directions ere-google-map-directions">
								<div class="ere-heading-style2">
									<h2>Mapa</h2>
								</div>
								<div class="ere-property-element">
									<div id="map-6304059eaa21b" class="ere-google-map-direction" style="position: relative; overflow: hidden;">
										<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
											<div class="gm-err-container">
												<div class="gm-err-content">
													<div class="gm-err-icon">
														<img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;">
													</div>
													<div class="gm-err-title">Ups! Algo correu mal.</div>
													<div class="gm-err-message">Esta página não carregou corretamente o Google Maps. Consulte a Consola de JavaScript para obter detalhes técnicos.</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ere-directions">
										<input id="directions-input" class="controls pac-target-input gm-err-autocomplete" type="text" placeholder="Ups! Algo correu mal." autocomplete="off" disabled="" style="background-image: url(&quot;https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png&quot;);">
										<button type="button" id="get-direction"><i class="fa fa-search"></i></button>
										<p id="total"></p>
									</div>
								</div>
							</div-->
							<!-------- FECHA GOOGLE MAPS  -------------->







							<!-------- SCRIPT GOOGLE MAPS  -------------->
							<script>
								/*
								jQuery(document).ready(function () {
									var bounds = new google.maps.LatLngBounds();
									var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
									var isDraggable = w > 1024 ? true : false;
									var mapOptions = {
										mapTypeId: 'roadmap',
										draggable: isDraggable,
										scrollwheel: false
									};
									var map = new google.maps.Map(document.getElementById("map-6304059eaa21b"), mapOptions);

									var infoWindow = new google.maps.InfoWindow(), marker, i;
									var property_position = new google.maps.LatLng(34.0782758, -118.26147880000002);
									bounds.extend(property_position);
									marker = new google.maps.Marker({
										position: property_position,
										map: map,
										title: 'Single House Near, Los Angeles',
										animation: google.maps.Animation.DROP,
										icon: 'https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/images/map-marker-icon.png'
									});
									google.maps.event.addListener(marker, 'click', (function (marker) {
										return function () {
											infoWindow.setContent('<h6>' + 'Single House Near, Los Angeles' + '</h6>');
											infoWindow.open(map, marker);
										}
									})(marker));
									map.fitBounds(bounds);
									var google_map_style = ere_property_map_vars.google_map_style;
									if (google_map_style !== '') {
										var styles = JSON.parse(google_map_style);
										map.setOptions({styles: styles});
									}
									var boundsListener = google.maps.event.addListener((map), 'idle', function (event) {
										this.setZoom(12);
										google.maps.event.removeListener(boundsListener);
									});

									var directionsService = new google.maps.DirectionsService;
									var directionsDisplay = new google.maps.DirectionsRenderer;
									directionsDisplay.setMap(map);

									directionsDisplay.addListener('directions_changed', function () {
										ereGetTotalDistance(directionsDisplay.getDirections());
									});

									var ere_get_directions = function () {
										ereDisplayRoute(directionsService, directionsDisplay, marker);
									};

									document.getElementById('get-direction').addEventListener('click', ere_get_directions);

									var autocomplete = new google.maps.places.Autocomplete(document.getElementById('directions-input'));
									autocomplete.bindTo('bounds', map);

									function ereDisplayRoute(directionsService, directionsDisplay, marker) {
										directionsService.route({
											origin: property_position,
											destination: document.getElementById('directions-input').value,
											travelMode: 'DRIVING'
										}, function (response, status) {
											if (status === google.maps.DirectionsStatus.OK) {
												marker.setVisible(false);
												directionsDisplay.setDirections(response);
											}
										});
									}

									function ereGetTotalDistance(result) {
										var total = 0;
										var unit = "metre";
										var myroute = result.routes[0];
										for (var i = 0; i < myroute.legs.length; i++) {
											total += myroute.legs[i].distance.value;
										}
										unit = "no";
										document.getElementById('total').style.display = 'inline-block';
										if (unit == "kilometre") {
											total = total / 1000;
											document.getElementById('total').innerHTML = 'Distance: ' + total + ' km';
										}
										else if (unit == "mile") {
											total = total * 0.000621371;
											document.getElementById('total').innerHTML = 'Distance: ' + total + ' mi';
										}
										else {
											document.getElementById('total').innerHTML = 'Distance: ' + total + ' m';
										}
									}
								});
								*/
							</script>
							<!-------- FECHA SCRIPT GOOGLE MAPS  -------------->











							<!-------- FORMULARIO DE CONTATO  -------------->
							<!--div class="single-property-element property-contact-agent">
								<div class="ere-heading-style2">
									<h2>Contato</h2>
								</div>
								<div class="ere-property-element">
									<div class="agent-info row">
										<div class="agent-avatar col-md-6 col-sm-12 col-xs-12">
											<a title="Abody Swedey" href="https://demo017.delbianco.emp.br/agent/abody-swedey/">
												<img src="https://demo017.delbianco.emp.br/wp-content/uploads/2017/01/abodyswede.png" onerror="this.src = 'https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/images/profile-avatar.png';" alt="Abody Swedey" title="Abody Swedey">
											</a>
										</div>
										<div class="agent-content col-md-6 col-sm-12 col-xs-12">
											<div class="agent-heading">
												<h4><a title="Abody Swedey" href="https://demo017.delbianco.emp.br/agent/abody-swedey/">Abody Swedey</a></h4>
												<span>Corretor</span>
											</div>
											<div class="agent-social">
												<a title="Facebook" href="http://g5plus.net">
													<i class="fa fa-facebook"></i>
												</a>
												<a title="Twitter" href="http://g5plus.net">
													<i class="fa fa-twitter"></i>
												</a>
												<a title="Skype" href="skype:g5plus?chat">
													<i class="fa fa-skype"></i>
												</a>
												<a title="Linkedin" href="http://g5plus.net">
													<i class="fa fa-linkedin"></i>
												</a>
											</div>
											<div class="agent-info-contact">
												<div class="agent-address">
													<i class="fa fa-map-marker"></i>
													<span>Property Agent</span>
												</div>
												<div class="agent-mobile">
													<i class="fa fa-phone"></i>
													<span>400 500 6000</span>
												</div>
												<div class="agent-email">
													<i class="fa fa-envelope"></i>
													<span>abodyswedey@gmail.com</span>
												</div>
												<div class="agent-website">
													<i class="fa fa-link"></i>
													<a href="http://g5plus.net">http://g5plus.net</a>
												</div>
											</div>
											<a class="btn btn-primary" href="https://demo017.delbianco.emp.br/property/?agent_id=486" title="Abody Swedey">Outro Imóveis</a>
										</div>
									</div>
									<div class="contact-agent">
										<form action="#" method="POST" id="contact-agent-form" class="row">
											<input type="hidden" name="target_email" value="abodyswedey@gmail.com">
											<input type="hidden" name="property_url" value="https://demo017.delbianco.emp.br/property/single-house-los-angeles/">
											<div class="col-sm-4">
												<div class="form-group">
													<input class="form-control" name="sender_name" type="text" placeholder="Nome Completo *">
													<div class="hidden name-error form-error">Please enter your Name!</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input class="form-control" name="sender_phone" type="text" placeholder="Número/WhatsApp *">
													<div class="hidden phone-error form-error">Please enter your Phone!</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input class="form-control" name="sender_email" type="email" placeholder="E-mail *">
													<div class="hidden email-error form-error" data-not-valid="Your Email address is not Valid!" data-error="Please enter your Email!">Please enter your Email!</div>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<textarea class="form-control" name="sender_msg" rows="4" placeholder="Message *">Olá, Eu me interessei pelo Imóvel [Single House Near, Los Angeles]</textarea>
													<div class="hidden message-error form-error">Please enter your Message!</div>
												</div>
											</div>
											<div class="col-sm-6">
											</div>
											<div class="col-sm-6 text-right">
												<input type="hidden" id="ere_security_contact_agent" name="ere_security_contact_agent" value="df49564fe0">
												<input type="hidden" name="_wp_http_referer" value="/property/single-house-los-angeles/">						
												<input type="hidden" name="action" id="contact_agent_with_property_url_action" value="ere_contact_agent_ajax">
												<button type="submit" class="agent-contact-btn btn">Enviar</button>
												<div class="form-messages"></div>
											</div>
										</form>
									</div>
								</div>
							</div-->
							<!-------- FECHA FORMULARIO DE CONTATO  -------------->








							<!-------- RODAPE DE ENDERÇO  -------------->
							<!--div class="single-property-element property-info-footer">
								<div class="ere-property-element">
									<span class="property-date">
										<i class="fa fa-calendar"></i> Fevereiro 2, 2017
									</span>
									<span class="property-views-count">
										<i class="fa fa-eye"></i> 2.197 Visualizações	        
									</span>
								</div>
							</div-->	
							<!-------- FECHA RODAPE DE ENDERÇO  -------------->





						</div>    
					</div>
				</div>
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

















        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('templates/'.$team->site_template->name.'/js/property-search.min.js?v='.$team->site_template->version)}}"></script>
<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/js/ere-main.min.js?ver=3.9.0' id='ere_main-js'></script>
		<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/packages/owl-carousel/owl.carousel.min.js?ver=2.3.4' id='owl.carousel-js'></script>
<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/js/ere-carousel.min.js?ver=3.9.0' id='ere_owl_carousel-js'></script>
<script type='text/javascript' src='https://demo017.delbianco.emp.br/wp-content/plugins/essential-real-estate/public/assets/js/property/ere-single-property.min.js?ver=3.9.0' id='ere_single-property-js'></script>
	</body><!-- body -->
</html><!-- html -->