@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<h1>Welcome: {{ Auth::user()->name }}</h1>

        	 <a href="#">Add Contact</a>
        </div>
    </div>
</div>
@endsection