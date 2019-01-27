@extends('admin_template')

@section('content')
	<script src="{{ asset ("bower_components/jquery/dist/jquery.min.js") }}"></script>
	<script src="{{ asset ("bower_components/raphael/raphael.min.js") }}"></script>
	<script src="{{ asset ("bower_components/morris.js/morris.min.js") }}"></script>
	<div class='row'>
	    <div class="page">
	      <div class="container">
		       <label class="label label-success">Bar Chart</label>
      			<div id="bar-chart" ></div>
		      	<script type="text/javascript">
		      		var data = [
					      { y: 'positive', a: {{$view_data['pos_count']}}},
					      { y: 'negative', a: {{$view_data['neg_count']}}},
					    ],
					    config = {
					      data: data,
					      xkey: 'y',
					      ykeys: ['a'],
					      labels: ['Count'],
					      fillOpacity: 0.6,
					      hideHover: 'auto',
					      behaveLikeLine: true,
					      resize: false,
					      pointFillColors:['#ffffff'],
					      pointStrokeColors: ['black'],
					      lineColors:['gray','red']
					  };
					config.element = 'bar-chart';
					Morris.Bar(config);
		      	</script>
	      </div>
	    </div>	
	</div>	


@endsection
    			