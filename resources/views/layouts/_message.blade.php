@foreach(['success','danger','info','error'] as $t)
	@if(session()->has($t))
		<div class="alert alert-{{$t}}" role="alert">
			@if($t == 'sucess')
		    	<i class="dripicons-checkmark mr-2"></i>
		    @else
		    	<i class="dripicons-warning mr-2"></i>
		    @endif
		    <strong>{{session()->get($t)}}</strong> 
		</div>
	@endif
@endforeach

