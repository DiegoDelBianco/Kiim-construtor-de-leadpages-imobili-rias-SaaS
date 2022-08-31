<!DOCTYPE html>
<html lang="pt-PT">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<title>{{ $template->var_value_or_default('title') }}</title>

		<link rel="stylesheet" id="real-estate-salient-Bitter-css" href="//fonts.googleapis.com/css?family=Bitter%3A400%2C400i%2C700&amp;ver=6.0.1" type="text/css" media="all">


		
		@if($team->g_analytics != NULL)
		<!-- Google tag (gtag.js) Google analytics 4 (ID DA MÉTRICA) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={{ $team->g_analytics }}"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  //gtag('config', 'G-DJPR55H038');
		  gtag('config', '{{ $team->g_analytics }}');
		</script>
		@endif





		@if($team->f_pixel != NULL)
			<!-- Meta Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			//fbq('init', '474621610933685');
			fbq('init', '{{ $team->f_pixel }}');
			fbq('track', 'PageView');
			</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id={{ $team->f_pixel }}&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Meta Pixel Code -->
		@endif


		<script src="https://kit.fontawesome.com/3018d5f091.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/principal/jquery-3.6.0.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

		<link rel="canonical" href="{{ $team->get_domain() }}" />
		<link rel='shortlink' href='{{ $team->get_domain() }}' />
	
		<link rel="icon" href="{{asset($team->favicon_src())}}" />

		<link rel='stylesheet'  href='{{asset("templates_leadpage_property/".$team->site_template->name."/css/style.css?v=".$team->site_template->version)}}' type='text/css' media='all' />
	</head>
	<body style="background-image:url({{asset($property->thumb->path1200x675(1))}})" style="background-image: url({{asset("templates_leadpage_property/".$team->site_template->name."/images/bk1.jpg")  }})">
		<div id="bodyfilter"></div>
		@if($team->logo)
			<img id="logo-p" src="{{ asset($team->logo_src()) }}" alt="">
		@endif

		<div style="background-image:url({{asset($property->thumb->path1200x675(1))}})" id="photo-p">
		</div>

		<div id="content-principal">
			<div id="social-h">
				@if($team->facebook != NULL)
				<a href="{{ $team->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
				@endif
				@if($team->instagram != NULL)
				<a href="{{ $team->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
				@endif
				@if($team->youtube != NULL)
				<a href="{{ $team->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
				@endif
				@if($team->whatsapp != NULL)
				<a href="{{ $team->whatsapp }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
				@endif
			</div>
			<h1>{{ $template->var_value_or_default('title')  }}</h1>
			@if($property->sale)

			<div class="price" id="price-sale">
				<span class="price-type">Venda: </span><span class="pricers">R$ </span><span> {{ number_format($property->sale_price, 2, ',', '.') }} </span>
			</div>

			@endif
			@if($property->rent)

			<div class="price" id="price-sale">
				<span class="price-type">Aluguel: </span><span class="pricers">R$ </span><span class="priceval"> {{ number_format($property->rent_price, 2, ',', '.') }} </span> <span class="pricefre">/ Mês</span>
			</div>

			@endif
			<hr>
			<p id="desc">

				@if($property->street != "")
				{{ $property->street }},  <br>
				@endif

				@if($property->neighborhood != "")
				{{ $property->neighborhood }},
				@endif

				@if($property->city != "")
				{{ $property->city }}
				@endif
			</p>
			@if($template->var_value_or_default('desc') != "")
            <p id="desc2">{{ $template->var_value_or_default('desc')  }}</p>
            @endif

			<div id="detals">
				<span class="detal">
					{{ $property->bedrooms+0 }} <i class="fa-solid fa-bed"></i>
				</span>
				<span class="detal">
					{{ $property->bathrooms+0 }} <i class="fa-solid fa-bath"></i>
				</span>
				<span class="detal">
					{{ $property->m2+0 }} m<sup>2</sup> <i class="fa-solid fa-arrows-up-down-left-right"></i>
				</span>
			</div>

			<div id="items">
				@foreach($property->items as $item)
					<span title="{{$item->name}} " alt="{{$item->name}}" class="item"><i class=" {{ $item->awesome_class_icon }} " title="{{$item->name}} " alt="{{$item->name}} "></i> </span>
				@endforeach
			</div>
			<div class="cta">
				<a href="{{ $team->whatsapp }}" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> {{ $template->var_value_or_default('cta')  }}</a>
			</div>
			<!--div class="cta">
				<a href="#" class="btn btn-secondary"><i class="fa-solid fa-arrow-up-right-from-square"></i> Mais Imóveis</a>
			</div-->
		</div>


		<div id="footer"> {{ $team->name }} © 2022  | Creci: <b> {{$team->creci}} </b> </div>


	    <!-- MENSAGEM PARA ACEITAR COOKIES -->
	    @include('templates.cookies')

		<!--div class="container-fluid" id="container-principal" style="background-image:url({{asset($property->thumb->path1200x675(1))}})">
			<div class="container text-center" id="wrap-info">
				<div class="row">
					<div class="col-md-12">
						<h1>{{ $template->var_value_or_default('title')  }}</h1>
					</div>
					div.col-md-12
				</div>	
			</div>
		</div-->


        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>		

        <script>
				if(($(document).height() / $(document).width()) < 1){
					$('body').addClass("horizontal");
				}else{
					$('body').addClass("vertical");
				}
        </script>

	</body>
</html>