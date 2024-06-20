@extends('layouts.user.app')

@section('title')
	Detail Ruangan - {{ $data->name }}
@endsection

@section('meta-link')
	<link href="{{ asset('/css/slick.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/slick-theme.css') }}" rel="stylesheet" />
	<style>
		/* .scrollable-images {
						width: 100%;
						overflow-x: auto;
						white-space: warp;
					} */
		.scrollable-images img {
			width: 200px;
			height: auto;
			display: inline-block;
			margin-right: 10px;
		}
	</style>
@endsection

@section('content')
	<div class="container-fluid mb-9 pl-9 pr-9">
		<div class="row mt-5">
			<div class="col-12">
				<div class="row">
					<div class="col-md-8">
						<div class="m-4">
							<div class="scrollable-images m-4">
								<img alt="{{ $data->picture_1 }}" class="pl-2 pr-2" id="{{ $data->picture_1 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_1) }}">
								@if ($data->picture_2)
									<img alt="{{ $data->picture_2 }}" class="pl-2 pr-2" id="{{ $data->picture_2 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_2) }}">
								@endif
								@if ($data->picture_3)
									<img alt="{{ $data->picture_3 }}" class="pl-2 pr-2" id="{{ $data->picture_3 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_3) }}">
								@endif
								@if ($data->picture_4)
									<img alt="{{ $data->picture_4 }}" class="pl-2 pr-2" id="{{ $data->picture_4 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_4) }}">
								@endif
								@if ($data->picture_5)
									<img alt="{{ $data->picture_5 }}" class="pl-2 pr-2" id="{{ $data->picture_5 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_5) }}">
								@endif
								@if ($data->picture_6)
									<img alt="{{ $data->picture_6 }}" class="pl-2 pr-2" id="{{ $data->picture_6 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_6) }}">
								@endif
								@if ($data->picture_7)
									<img alt="{{ $data->picture_7 }}" class="pl-2 pr-2" id="{{ $data->picture_7 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_7) }}">
								@endif
								@if ($data->picture_8)
									<img alt="{{ $data->picture_8 }}" class="pl-2 pr-2" id="{{ $data->picture_8 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_8) }}">
								@endif
								@if ($data->picture_9)
									<img alt="{{ $data->picture_9 }}" class="pl-2 pr-2" id="{{ $data->picture_9 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_9) }}">
								@endif
								@if ($data->picture_10)
									<img alt="{{ $data->picture_10 }}" class="pl-2 pr-2" id="{{ $data->picture_10 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_10) }}">
								@endif
							</div>
						</div>

						{{-- <div class="gallery-container" id="lightgallery">
							<a data-lg-size="640-360" href="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_1) }}">
								<img alt="{{ $data->picture_1 }}" class="gallery-item" id="{{ $data->picture_1 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_1) }}">
							</a>
							<a data-lg-size="640-360" href="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_2) }}">
								<img alt="{{ $data->picture_2 }}" class="gallery-item" id="{{ $data->picture_2 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_2) }}">
							</a>
						</div> --}}

						{{-- <div class="gallery-container" id="animated-thumbnails-gallery">
							<a class="gallery-item" data-lg-size="1600-1067" data-src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@tobbes_rd' >Tobias Rademacher </a></h4><p> Location - <a href='https://unsplash.com/s/photos/puezgruppe%2C-wolkenstein-in-gr%C3%B6den%2C-s%C3%BCdtirol%2C-italien'>Puezgruppe, Wolkenstein in Gröden, Südtirol, Italien</a>layers of blue.</p>">
								<img alt="layers of blue." class="img-responsive" src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it2" data-src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@therawhunter' >Massimiliano Morosinotto </a></h4><p> Location - <a href='https://unsplash.com/s/photos/tre-cime-di-lavaredo%2C-italia'>Tre Cime di Lavaredo, Italia</a>This is the Way</p>" data-tweet-text="lightGallery slide  2">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1605973029521-8154da591bd7?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@thesaboo' >Sascha Bosshard </a></h4><p> Location - <a href='https://unsplash.com/s/photos/pizol%2C-mels%2C-schweiz'>Pizol, Mels, Schweiz</a></p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1605973029521-8154da591bd7?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2398" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1526281216101-e55f00f0db7a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@yusufevli' >Yusuf Evli </a></h4><p> Foggy Road</p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1526281216101-e55f00f0db7a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1418065460487-3e41a6c84dc5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@flovayn' >Jay Mantri</a></h4><p>  Misty shroud over a forest</p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1418065460487-3e41a6c84dc5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1505820013142-f86a3439c5b2?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@flovayn' >Florian van Duyn</a></h4><p>Location - <a href='Bled, Slovenia'>Bled, Slovenia</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1505820013142-f86a3439c5b2?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1126" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1477322524744-0eece9e79640?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@juanster' >Juan Davila</a></h4><p>Location - <a href='Bled, Slovenia'>Bled, Slovenia</a> Wooded lake island </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1477322524744-0eece9e79640?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1063" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@davidmarcu' >David Marcu</a></h4><p>Location - <a href='https://unsplash.com/s/photos/ciuca%C8%99-peak%2C-romania'>Ciucaș Peak, Romania</a> Alone in the unspoilt wilderness </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1585338447937-7082f8fc763d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@whoisbenjamin' >whoisbenjamin</a></h4><p>Location - <a href='https://unsplash.com/s/photos/ciuca%C8%99-peak%2C-romania'>Snowdonia National Park, Blaenau Ffestiniog, UK</a>A swan on a calm misty lake in the mountains of Snowdonia, North Wales. <a href='https://unsplash.com/photos/9V6EkAoTWJM'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1585338447937-7082f8fc763d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1144" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1476842384041-a57a4f124e2e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@aaronburden' >Aaron Burden</a></h4><p>Location - <a href='https://unsplash.com/s/photos/grayling%2C-michigan%2C-united-states'>Grayling, Michigan, United States</a> Colorful trees near a lake. <a href='https://unsplash.com/photos/00QWN1J0g48'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1476842384041-a57a4f124e2e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1465311530779-5241f5a29892?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@kalenemsley' >Kalen Emsley</a></h4><p>Location - <a href='https://unsplash.com/s/photos/yukon-territory%2C-canada'>Yukon Territory, Canada</a> No captions. <a href='https://unsplash.com/photos/eHpYD4U5830'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1465311530779-5241f5a29892?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1461301214746-1e109215d6d3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@kace' >Kace Rodriguez</a></h4><p>Location - <a href='https://unsplash.com/s/photos/pfeiffer-beach%2C-united-states'>Pfeiffer Beach, United States</a> Pfeiffer Beach at Dusk. <a href='https://unsplash.com/photos/eHpYD4U5830'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1461301214746-1e109215d6d3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1610448721566-47369c768e70?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@patwhelen' >Pat Whelen</a></h4><p>Location - <a href='https://unsplash.com/s/photos/portsea-vic%2C-australia'>Portsea VIC, Australia</a> No caption <a href='https://unsplash.com/photos/EKLXDQ-dDRg'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1610448721566-47369c768e70?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@derekthomson' >Derek Thomson</a></h4><p>Location - <a href='https://unsplash.com/s/photos/mcway-falls%2C-united-states'>McWay Falls, United States</a> No caption <a href='https://unsplash.com/photos/TWoL-QCZubY'>Link</a> </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1539678050869-2b97c7c359fd?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@michaljaneck' >Michal Janek</a></h4><p>Location - <a href='https://unsplash.com/s/photos/big-sur%2C-united-states'>Big Sur, United States</a> Coast  </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1539678050869-2b97c7c359fd?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2400" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1446630073557-fca43d580fbe?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@papillon' >Iris Papillon</a></h4><p>Location - <a href='https://unsplash.com/s/photos/big-sur%2C-united-states'>Big Sur, United States</a> Big Sur drive  </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1446630073557-fca43d580fbe?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1065" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1596370743446-6a7ef43a36f9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@piyushh_dubeyy' >piyush dubey</a></h4><p>Published on August 2, 2020</p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1596370743446-6a7ef43a36f9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-2134" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1464852045489-bccb7d17fe39?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@fynn_it' >fynn</a></h4><p>Location - <a href='https://unsplash.com/s/photos/big-sur%2C-united-states'>Big Sur, United States</a> Wasserauen, Appenzell Innerrhoden, Schweiz  </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1464852045489-bccb7d17fe39?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1060" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@danielleone' >Daniel Leone</a></h4><p>Location - <a href='https://unsplash.com/s/photos/poon-hill%2C-ghode-pani%2C-nepal'>Poon Hill, Ghode Pani, Nepal</a> Taken from the top of Poon Hill before sun rise </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1037" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1510011560141-62c7e8fc7908?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@bboba' >Boba Jovanovic</a></h4><p>Location - <a href='https://unsplash.com/s/photos/bay-of-kotor'>Bay of Kotor</a> Boka kotorska bay </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1510011560141-62c7e8fc7908?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-899" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1586276393635-5ecd8a851acc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@svsdesigns' >Surendra Vikram Singh</a></h4><p>Location - <a href='https://unsplash.com/s/photos/lachung%2C-sikkim%2C-india'>Lachung, Sikkim, India</a> Cloud covered mountain </p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1586276393635-5ecd8a851acc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1600-1067" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1471931452361-f5ff1faa15ad?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2252&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@camadams' >Cam Adams</a></h4><p>Location - <a href='https://unsplash.com/s/photos/banff%2C-canada'>Banff, Canada</a> Lake along jagged mountains</p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1471931452361-f5ff1faa15ad?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
							<a class="gallery-item" data-lg-size="1536-2304" data-pinterest-text="Pin it3" data-src="https://images.unsplash.com/photo-1508766206392-8bd5cf550d1c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1536&q=80" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@rea_le' >Andrea Ledda</a></h4><p>Location - <a href='https://unsplash.com/s/photos/lago-goillet%2C-italy'>Lago Goillet, Italy</a>  Goillet Lake at 2561 meters above Breuil-Cervinia</p>" data-tweet-text="lightGallery slide  4">
								<img class="img-responsive" src="https://images.unsplash.com/photo-1508766206392-8bd5cf550d1c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80" />
							</a>
						</div> --}}
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-8">
						<h3>Deskripsi</h3>
						<p class="text-justify" id="deskripsiHotel">
							{{ $data->description }}
						</p>
					</div>
					<div class="col-md-4 pl-5">
						<div class="detail-hotel">
							<h2 id="namaHotel">{{ $data->name }}</h2>
							<p><strong>Lokasi :</strong> <span id="lokasi"> {{ $data->address }} </span></p>
							<p><strong>Email :</strong> <span id="email"> {{ $data->owner_email }} </span></p>
							<p><strong>Telepon :</strong>
								<span id="phone">
									@isset($data->owner_phone)
										{{ $data->owner_phone }}
									@else
										<b>Login Untuk Melihat Nomor Telepon!</b>
									@endisset
								</span>
							</p>
							<p><strong>Harga per Hari :</strong> <span id="harga">Rp. {{ number_format($data->price, 0, ',', '.') }}</span></p>
							@if (Auth::check())
								<button class="btn btn-primary btn-block" data-bs-target="#bookingModal" data-bs-toggle="modal" id="bookingButton" onclick="getAllBookingDate()" style="display: none;" type="button">
									Sewa Sekarang
								</button>
								<button class="btn btn-primary btn-block" data-bs-target="#checkoutModal" data-bs-toggle="modal" id="checkoutButton" onclick="getOwnerBank()" style="display: none;" type="button">
									Checkout Sekarang
								</button>
								<button class="btn btn-primary btn-block" data-bs-target="#confirmationModal" data-bs-toggle="modal" id="bookedButton" onclick="confirmationData()" style="display: none;" type="button">
									Menunggu Konfirmasi
								</button>
								<button class="btn btn-primary btn-block disabled" id="bookButton" style="display: none;" type="button">
									Telah Disewa
								</button>
							@else
								<button class="btn btn-primary btn-block" data-bs-target="#bookingModal" data-bs-toggle="modal" id="bookingButton" onclick="getAllBookingDate()" style="display: none;" type="button">
									Sewa Sekarang
								</button>
							@endif
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col">
						<h3>Fasilitas</h3>
						<ul class="" id="fasilitiesRoom">
							@php
								$facility = explode(',', $data->facilities);
							@endphp
							@foreach ($facility as $item)
								<li>{{ $item }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="bookingModalLabel" class="modal fade" id="bookingModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="bookingModalLabel">Form Penyewaan</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="bookingData">
					@csrf
					<div class="modal-body">
						<div class="row">
							@if (Auth::check())
							@else
								<div class="col">
									<div class="form-group">
										<label class="form-control-label" for="nameTenant">Nama Penyewa<span class="text-danger"> *</span></label>
										<input class="form-control" id="nameTenant" name="tenant_name" placeholder="Masukkan Nama" required="required" type="name" value="">
									</div>
									<div class="form-group">
										<label class="form-control-label" for="emailTenant">Email<span class="text-danger"> *</span></label>
										<input class="form-control" id="emailTenant" name="tenant_email" placeholder="Masukkan Email" required="required" type="email" value="">
									</div>
									<div class="form-group">
										<label class="form-control-label" for="phoneTenant">No Telp<span class="text-danger"> *</span></label>
										<input class="form-control" id="phoneTenant" name="tenant_phone" placeholder="Masukkan Telepon" required="required" type="number" value="">
									</div>
									<div class="form-group">
										<label class="form-control-label" for="passwordTenant">Password<span class="text-danger"> *</span></label>
										<input class="form-control" id="passwordTenant" name="tenant_password" placeholder="Masukkan Password" required="required" type="password" value="">
									</div>
									<div class="form-group">
										<label class="form-control-label" for="repasswordTenant">Masukkan Ulang Password<span class="text-danger"> *</span></label>
										<input class="form-control" id="repasswordTenant" name="tenant_repassword" placeholder="Ulangi Password" required="required" type="password" value="">
									</div>
								</div>
							@endif
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="bookingDate">Tanggal Booking<span class="text-danger"> *</span></label>
									<input class="form-control" id="bookingDate" name="booking_date" placeholder="6/6/2026" required="required" type="date" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="bookingInfoDate">Tanggal Yang Sudah Booking<span class="text-danger"> *</span></label>
									<ul class="booking-dates" id="bookingDates"></ul>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
						<button class="btn btn-primary" type="submit">Bayar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="checkoutModalLabel" class="modal fade" id="checkoutModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="checkoutModalLabel">Checkout Booking</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="checkoutData">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col">
								Nama Owner: <span class="font-weight-bold" id="ownerNameForBank"></span><br>
								Nama Bank: <span class="font-weight-bold" id="ownerForBankName"></span><br>
								Nomor Rekening: <span class="font-weight-bold" id="ownerForBankNumber"></span><br>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="imageTransfer">Upload Bukti Transfer <span class="text-danger">*</span></label>
									<input accept="image/jpeg, image/png" class="form-control" data-size="5120" id="imageTransfer" name="transfer_image" onchange="validateUpload(this)" required="required" type="file">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
						<button class="btn btn-primary" type="submit">Kirim Bukti Pembayaran</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="confirmationModalLabel" class="modal fade" id="confirmationModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Booking</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="confirmationData">
					@csrf
					<div class="modal-body">
						<div class="row text-center" id="awaitConfirmation">
							<div class="col text-center">
								<i class="fas fa-hourglass-half fa-5x text-warning mb-3"></i>
								<p class="font-weight-bold">Sedang menunggu konfirmasi dari admin. Harap tunggu.</p>
							</div>
						</div>
						<div class="row text-center" id="statusConfirmed">
							<div class="col text-center">
								<i class="fas fa-check-circle fa-5x text-success mb-3"></i>
								<p class="font-weight-bold">Booking Anda telah terverifikasi oleh admin.</p>
							</div>
						</div>
						<div class="row text-center" id="statusUnconfirmed">
							<div class="col text-center">
								<i class="fas fa-times-circle fa-5x text-danger mb-3"></i>
								<p class="font-weight-bold">Booking Anda tidak terverifikasi oleh admin.</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('/js/slick.js') }}"></script>
	<script type="text/javascript">
		$('.scrollable-images').slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1
		});

		// lightGallery(document.getElementById('lightgallery'), {
		// 	thumbnail: true,
		// });

		// $("#animated-thumbnails-gallery")
		// 	.justifiedGallery({
		// 		captions: false,
		// 		lastRow: "hide",
		// 		rowHeight: 180,
		// 		margins: 5
		// 	})
		// 	.on("jg.complete", function() {
		// 		window.lightGallery(
		// 			document.getElementById("animated-thumbnails-gallery"), {
		// 				autoplayFirstVideo: false,
		// 				pager: false,
		// 				galleryId: "nature",
		// 				plugins: [lgZoom, lgThumbnail],
		// 				mobileSettings: {
		// 					controls: false,
		// 					showCloseIcon: false,
		// 					download: false,
		// 					rotate: false
		// 				}
		// 			}
		// 		);
		// 	});

		var loginCheck = false;
		var idRoom = parseInt("{{ $data->id }}");
		var tempImageData = null;
		var transactionNumber = {!! $dataBooking && $dataBooking->code ? "'" . $dataBooking->code . "'" : "''" !!};
		var statusOrder = {!! $dataBooking && $dataBooking->status_order ? '' . $dataBooking->status_order . '' : 0 !!};
		var statusTransaction = {!! $dataBooking && $dataBooking->status_transaction ? '' . $dataBooking->status_transaction . '' : 0 !!};
		var confirmationStatus = false;
		var intervalId;

		var modalBooking = $('#bookingModal');
		var modalCheckout = $('#checkoutModal');
		var modalConfirmation = $('#confirmationModal');

		$('#awaitConfirmation').show();
		$('#statusConfirmed').hide();
		$('#statusUnconfirmed').hide();

		$('#bookingButton').show();
		$('#checkoutButton').hide();
		$('#bookedButton').hide();
		$('#bookButton').hide();

		async function blurPasswordTenant(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid').val('');
				password.removeClass('is-valid').addClass('is-invalid');
				modalBooking.modal('hide');
				const result = await alertNotification('Password Tidak Sama!', 'Mohon isikan password yang sama!', 'warning');
				if (result.isConfirmed) {
					modalBooking.modal('show');
				}
			}
		}

		async function keyUpPasswordTenant(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid');
				password.removeClass('is-valid').addClass('is-invalid');
			}
		}

		async function checkAuth() {
			showLoadingNotification();
			try {
				getOwnerBank();
				var url = '{{ route('check-login') }}';
				const response = await axios.get(url);
				if (response.data.authenticated === true) {
					loginCheck = true;
				}
				hideLoadingNotification();
				if ((loginCheck === true || loginCheck === false) && statusOrder === 0 && statusTransaction === 0) {
					$('#bookingButton').show();
				}
				if (loginCheck === true && statusOrder === 1 && statusTransaction === 0) {
					$('#bookingButton').hide();
					$('#checkoutButton').show();
					modalCheckout.modal('show');
				}
				if (loginCheck === true && statusOrder === 2 && statusTransaction === 0) {
					modalConfirmation.modal('show');
					$('#bookingButton').hide();
					$('#checkoutButton').hide();
					$('#bookedButton').show();
					confirmationStatus = true;
					confirmationData();
					intervalId = setInterval(confirmationData, 1000);
				}
				if (loginCheck === true && statusOrder === 3 && statusTransaction === 1) {
					$('#bookingButton').hide();
					$('#bookButton').show();
				}
				if (loginCheck === true && statusOrder === 3 && statusTransaction === 2) {
					$('#bookingButton').show();
					$('#bookButton').hide();
				}
			} catch (error) {
				hideLoadingNotification();
				loginCheck = false;
			}
		}

		$(document).ready(function() {
			checkAuth();
			if (confirmationStatus === true || modalConfirmation.hasClass('show')) {
				confirmationData();
				setInterval(confirmationData, 1000);
			}
			$('#repasswordTenant').on('blur', async function() {
				blurPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			}).on('keyup', async function() {
				keyUpPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			});
			$('#passwordTenant').on('keyup', async function() {
				keyUpPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			});
		});

		document.getElementById('bookingData').addEventListener('submit', async function(e) {
			e.preventDefault();
			const bookingData = {};
			bookingData['tenant_name'] = (document.getElementById('nameTenant') || {}).value || null;
			bookingData['tenant_email'] = (document.getElementById('emailTenant') || {}).value || null;
			bookingData['tenant_phone'] = (document.getElementById('phoneTenant') || {}).value || null;
			bookingData['tenant_password'] = (document.getElementById('passwordTenant') || {}).value || null;
			bookingData['booking_date'] = (document.getElementById('bookingDate') || {}).value || null;
			modalBooking.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Data Akun dapat diubah dilain waktu. Namun untuk booking ulang, data tanggal tidak dapat diganti.', 'info')
			if (!result.isConfirmed) {
				modalBooking.modal('show');
			} else {
				showLoadingNotification();
				try {
					var url = null;
					if (loginCheck === false) {
						var url = '{{ route('orderBuildingWithoutLogin:user', ['id' => ':id']) }}';
						url = url.replace(':id', idRoom);
					} else {
						var url = '{{ route('orderBuilding:user', ['id' => ':id']) }}';
						url = url.replace(':id', idRoom);
					}
					var urlRedirect = '{{ route('buildingDetailPage:user', ['id' => ':id']) }}';
					urlRedirect = urlRedirect.replace(':id', idRoom);
					const response = await axios.post(url, {
						data: bookingData,
						headers: headers,
						processData: false,
						contentType: false,
						enctype: 'multipart/form-data'
					});
					if (response.data.status === 200) {
						const successBooking = await alertNotification('Booking Berhasil!', 'Mohon kirim bukti pembayaran transfer!', 'success');
						if (successBooking.isConfirmed) {
							transactionNumber = response.data.data.code;
							if (loginCheck === true) {
								modalCheckout.modal('show');
								$('#bookingButton').hide();
								$('#checkoutButton').show();
							} else {
								$('#bookingButton').hide();
								$('#checkoutButton').show();
								window.location.href = urlRedirect;
							}
						}
					} else {
						const failedBooking = await alertNotification('Booking Gagal!', response.data.detail_message, 'warning');
						if (failedBooking.isConfirmed) {
							modalBooking.modal('show');
						}
					}
					hideLoadingNotification();
				} catch (error) {
					hideLoadingNotification();
					const failedBooking = await alertNotification('Server Error!', 'Mohon ulangi pengisian data akun dan tanggal booking!', 'warning');
					if (failedBooking.isConfirmed) {
						modalBooking.modal('show');
					}
				}
			}
		});

		document.getElementById('checkoutData').addEventListener('submit', async function(e) {
			e.preventDefault();
			const paymentData = new FormData();
			paymentData.append('transfer_image', document.getElementById('imageTransfer').files[0]);
			paymentData.append('transaction_number', transactionNumber);
			modalCheckout.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Bukti Transfer tidak dapat diunggah ulang. Anda dapat menggunggahnya ulang setelah status verifikasi dari Admin.', 'info');
			if (!result.isConfirmed) {
				modalCheckout.modal('show');
			} else {
				showLoadingNotification();
				try {
					var url = '{{ route('paymentBuilding:user', ['id' => ':id']) }}';
					url = url.replace(':id', idRoom);
					const response = await axios.post(url, paymentData, {
						headers: headers,
						processData: false,
						contentType: false,
						enctype: 'multipart/form-data'
					});
					if (response.data.status === 200) {
						const successCheckout = await alertNotification('Unggah Bukti Transfer Berhasil!', 'Mohon tunggu konfirmasi pembayaran dari Admin.', 'success');
						if (successCheckout.isConfirmed) {
							modalConfirmation.modal('show');
							$('#checkoutButton').hide();
							$('#bookedButton').show();
							confirmationStatus = true;
							confirmationData();
							intervalId = setInterval(confirmationData, 1000);
						}
					} else {
						const failedCheckout = await alertNotification('Unggah Bukti Transfer Gagal!', response.data.detail_message, 'warning');
						if (failedCheckout.isConfirmed) {
							modalCheckout.modal('show');
						}
					}
					hideLoadingNotification();
				} catch (error) {
					hideLoadingNotification();
					const failedCheckout = await alertNotification('Server Error!', 'Mohon ulangi upload bukti transfer!', 'warning');
					if (failedCheckout.isConfirmed) {
						modalCheckout.modal('show');
					}
				}
			}
		});

		async function confirmationData() {
			// showLoadingToast();
			if (confirmationStatus === true) {
				try {
					const transactionData = {};
					transactionData['transaction_number'] = transactionNumber;
					var url = '{{ route('confirmationBuilding:user', ['id' => ':id']) }}';
					url = url.replace(':id', idRoom);
					const response = await axios.post(url, {
						data: transactionData,
						headers: headers,
						processData: false,
						contentType: false,
						enctype: 'multipart/form-data'
					});
					if (response.data.status === 200) {
						if (response.data.data.status_order === 3 && response.data.data.status_payment === 1) {
							$('#awaitConfirmation').hide();
							$('#statusConfirmed').show();
							$('#statusUnconfirmed').hide();
							clearInterval(intervalId);
						} else if (response.data.data.status_order === 0 && response.data.data.status_payment === 2) {
							$('#awaitConfirmation').hide();
							$('#statusConfirmed').hide();
							$('#statusUnconfirmed').show();
							clearInterval(intervalId);
						} else if (response.data.data.status_order === 0 && response.data.data.status_payment === 0) {
							$('#awaitConfirmation').hide();
							$('#statusConfirmed').hide();
							$('#statusUnconfirmed').show();
							clearInterval(intervalId);
						} else {
							$('#awaitConfirmation').show();
							$('#statusConfirmed').hide();
							$('#statusUnconfirmed').hide();
						}
					} else {
						modalConfirmation.modal('hide');
						const failedCheckout = await alertNotification('Server Error!', response.data.detail_message, 'warning');
						if (failedCheckout.isConfirmed) {
							modalConfirmation.modal('show');
						}
					}
					// hideLoadingToast();
				} catch (error) {
					// hideLoadingToast();
					const failedCheckout = await alertNotification('Server Error!', 'Server sedang dalam perbaikan!', 'warning');
					if (failedCheckout.isConfirmed) {
						modalConfirmation.modal('show');
					}
				}
			}
		}

		async function getAllBookingDate() {
			showLoadingNotification();
			try {
				var url = '';
				if (loginCheck) {
					url = "{{ route('getBookingDate:user', ['id' => ':id']) }}";
				} else {
					url = "{{ route('getBookingDateNoLogin:user', ['id' => ':id']) }}";
				}

				url = url.replace(':id', idRoom);
				const response = await axios.get(url, {
					headers: headers,
					processData: false,
					contentType: false,
				});
				if (response.data.status === 200 && response.data.data) {
					const bookingDatesElement = document.getElementById('bookingDates');
					bookingDatesElement.innerHTML = '';
					response.data.data.forEach(dates => {
						const date = new Date(dates.date);
						const options = {
							day: 'numeric',
							month: 'long',
							year: 'numeric'
						};
						const formattedDate = date.toLocaleDateString('id-ID', options);
						const li = document.createElement('li');
						li.textContent = formattedDate;
						bookingDatesElement.appendChild(li);
					});
				}
				hideLoadingNotification();
			} catch (error) {
				hideLoadingNotification();
				const failedCheckout = await alertNotification('Server Error!', 'Server sedang dalam perbaikan!', 'warning');
				if (failedCheckout.isConfirmed) {}
			}
		}

		async function getOwnerBank() {
			showLoadingNotification();
			try {
				var url = '';
				if (loginCheck) {
					url = "{{ route('getBankNumberOwner:user', ['id' => ':id']) }}";
				} else {
					url = "{{ route('getBankNumberOwnerNoLogin:user', ['id' => ':id']) }}";
				}
				url = url.replace(':id', idRoom);
				const response = await axios.get(url, {
					headers: headers,
					processData: false,
					contentType: false,
				});
				if (response.data.status === 200 && response.data.data) {
					document.getElementById('ownerNameForBank').innerHTML = response.data.data.owner_name;
					document.getElementById('ownerForBankName').innerHTML = response.data.data.owner_bank_name ? response.data.data.owner_bank_name : 'Belum ada nama bank';
					document.getElementById('ownerForBankNumber').innerHTML = response.data.data.owner_bank_number ? response.data.data.owner_bank_number : 'Belum ada nomor rekening';
				}
				hideLoadingNotification();
			} catch (error) {
				hideLoadingNotification();
				const failedCheckout = await alertNotification('Server Error!', 'Server sedang dalam perbaikan!', 'warning');
				if (failedCheckout.isConfirmed) {}
			}
		}

		function validateUpload(input) {
			checkFileFormat(input);
			checkMinResolution(input, 640, 360);
		}
	</script>
@endsection
