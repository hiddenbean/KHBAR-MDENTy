@extends('layouts.app')

@section('body')
<div class="container">
<h1>{{$region->name}}</h1>

<br>
<table border=1>

@foreach($region->subjects as $subject)

<tr>
    <td> {{$subject->title}}</td>
    <td> {{$subject->description}}</td>
    <td> 
        <form action="{{url('regions/'.$region->id.'/subject/'.$subject->id.'/supprimer')}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <button type="submit" class="btn btn-primary">
            supprimer
        </button>
    </form>
    </td>
</tr>
@endforeach
</table>
<a href="{{url('regions/'.$region->id.'/subject/ajouter')}}" >ajouter des des sujects</a>

</div>
@endsection