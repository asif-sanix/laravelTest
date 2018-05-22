@extends('layouts.app')

@section('content')
<div class="container">
<div class="card   ">
  <div class="card-header bg-primary text-white"><span class="float-left btn btn-primary">Contacts </span> <a class="float-right btn btn-primary" href="/contacts/create">Add Contact</a></div>
  <div class="card-body">
    <ul class="list-group">
       @foreach ($contacts as $contact)
         <li class="list-group-item"><div class="d-table"> <span class="d-table-cell text-left"><a href="/companies/{{$contact->id}}"> {{ $contact->full_name }}</a></span> <span class="d-table-cell text-center"> {{ $contact->mobile_no }} </span> <span class="d-table-cell text-center"> {{ $contact->contact_email }} </span> <span class="d-table-cell text-right"> Edit /  
         	<a href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Company? {{$contact->id}}');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>
              <form id="delete-form" action="{{ route('contacts.destroy',[$contact->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form> </span> </div> </li>
       @endforeach
   </ul>


  </div>
</div>
</div>
@endsection