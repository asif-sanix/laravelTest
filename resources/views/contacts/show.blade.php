@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table" style="background:#fff">
    <thead class="thead-light">
      <tr>
        <th>Full Name</th>
        <th>Mobile Number</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
         <tr>
          <td><a href="/companies/{{$contact->id}}"> {{ $contact->full_name }}</a> </td>
          <td><a href="/companies/{{$contact->id}}"> {{ $contact->mobile_no }}</a> </td>
          <td><a href="/companies/{{$contact->id}}"> {{ $contact->email }}</a> </td>
         </tr>
       @endforeach
      
    </tbody>
  </table>
 </div>
@endsection
