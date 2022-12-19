@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')
   <h1>{{$heading}}</h1>
   @foreach ($listings as $listing)
   {{-- component passed here x-componentname --}}
   {{-- prop also passed here,prop name given val --}}
   {{-- to bind val eg $listing use colon otherwise other strings no need for colon --}}
      {{-- <x-listing-card listing='hello'/> --}}
      <x-listing-card :listing='$listing'/>
   
   @endforeach
@endsection


