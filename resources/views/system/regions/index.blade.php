@extends('layouts.app')

@section('body')
<div class="container">
<table border=1>

@foreach($partner->regions as $region)

<tr>
    <td> {{$region->id}}</td>
    <td> {{$region->name}}</td>
    <td> <a href="{{url('regions/'.$region->id.'/afichier')}}" >Detail</a></td>
</tr>
@endforeach
</table>
<a href="{{url('regions/ajouter')}}" >ajouter</a>
</div>
@endsection