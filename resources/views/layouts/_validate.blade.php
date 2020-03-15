@if ($errors->any())
<div class="alert alert-warning" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
	        <div class="alert alert-danger" role="alert">
	            <strong class="dripicons-warning mr-1">{{ $error }}</strong>
	        </div>
        @endforeach
    </ul>
</div>
@endif