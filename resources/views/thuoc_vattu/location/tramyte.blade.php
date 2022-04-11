@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">

<div class="container">
	<div class="card mt-3">
				<h5 class="card-header">Bản đồ</h5>
				<div id="map" >
					</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

				</div>
			</div>
		</div>
	<script type='text/javascript'
	src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

	 <script>
	  function GetMap()
			{
				var map = new Microsoft.Maps.Map('#map', {
					credentials: 'Aq57_I2YLhdHHLMVsa7FQzG2_6RrIHr9MopSdBQv0JvLfMidXvEaMmDJY-Uhyini',
					center: new Microsoft.Maps.Location(
                        @foreach($vitri as $vt)    
                    {{ $vt->vido  }},  {{ $vt->kinhdo  }}
                    @endforeach
                    ),
					mapTypeId: Microsoft.Maps.MapTypeId.Road,
					zoom: 15,
					//theme: new  Microsoft.Maps.Themes.BingTheme()
				});
				var icon = '';
                @foreach($vitri as $vt)
					var loc = new Microsoft.Maps.Location({{ $vt->vido  }}, {{ $vt->kinhdo  }});
					var pin = new Microsoft.Maps.Pushpin(loc, {
						title:'{{  $vt->tentyt  }}',
						subTitle:'{{ $vt->diachi  }}',
						icon : icon,

					});
					map.entities.push(pin);
					
				@endforeach
			}

			
    </script>
</div>    
</div>    
@endsection