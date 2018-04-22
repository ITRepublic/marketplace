{{-- display error messages --}}
@if($errors->any())
	<div class="alert alert-danger">
		<ul style="list-style: none;">
	    @foreach($errors->all() as $error)
	    	<li>{{ $error }}</li>
	    @endforeach
	    </ul>
    </div>
@endif
		
{{-- display success message --}}
@if(session()->has('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
@endif