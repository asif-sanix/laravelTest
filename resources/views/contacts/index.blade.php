@extends('layouts.app')

@section('content')
<div class="container">
<div class="card   ">
  <div class="card-header bg-primary text-white">Companies <a class="float-right btn btn-primary" href="/companies/create">Add Company</a></div>
  <div class="card-body">
    <ul class="list-group">
       @foreach ($contacts as $contact)
         <li class="list-group-item"><a href="/companies/{{$contact->id}}"> {{ $contact->full_name }}</a> {{ $contact->mobile_no }} </li>
       @endforeach
   </ul>


  </div>
</div>
</div>
@endsection