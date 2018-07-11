<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
    </head>
    <body>
		
		@php
        	//Instantiate an empty menu
			$menu = [];

			//Choose what menu to show
			$menuToShow = 'admin';

			//Get all menu as single array list
			foreach (config('menu') as $key => $value) {
			    if ((isset($value[$menuToShow]) && !empty($value[$menuToShow]))) {

			        foreach ($value[$menuToShow] as $menu_item) {
			            $menu[] = $menu_item;
			        }

			    }

			}

			//Convert menu array to collection
			$menu = collect($menu);

		@endphp

    	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				
			<ul class="nav navbar-nav" role="tablist">
				<li class=""><a class="text-capitalize text-bold" href="{{ url('/') }}">
					<span class="show-xs"><i class="fa fa-tachometer fa-lg"></i>&nbsp;</span>
				Home</a></li>

				@foreach( $menu->where('parent',null)->unique('name')->sortBy('rank') as $key => $top_menu )

						@if( $menu->where('parent',$top_menu['name'])->count() > 0 )
							<li class="">
								<a href="#" class="text-capitalize text-bold" data-toggle="dropdown">
									<span class="show-xs"><i class="fa {{ $top_menu['icon'] }} fa-lg"></i>&nbsp;</span>
									{{ $top_menu['label'] }} <span class="fa fa-caret-down"></span></a>
									<ul class="dropdown-menu animated fadeInUp animated-fast">
										@foreach( $menu->where('parent',$top_menu['name'])->sortBy('rank') as $children )
											@if( !$loop->first )
												<li role="separator" class="divider"></li>
											@endif
												<li><a href="@if( $children['route-name'] == "" )#!@else {{ route( $children['route-name'] ) }} @endif">{{ $children['label'] }}</a></li>
										@endforeach
									</ul>
								</li>
						@else
							<li class="">
								<a class="text-capitalize text-bold" href="@if( $top_menu['route-name'] == "" )#!@else {{ route( $top_menu['route-name'] ) }} @endif">
									<span class="show-xs"><i class="{{ $top_menu['icon'] }} fa-lg"></i>&nbsp;</span>
								{{ $top_menu['label'] }}</a></li>
						@endif

				@endforeach

			</ul>

		</nav>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif


            <div class="content">

                @yield('content')

            </div>
        </div>
    </body>
</html>
