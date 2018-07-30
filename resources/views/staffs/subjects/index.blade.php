@extends('layouts.app')

@section('body')
<div class="container">

<table border=1>

@foreach($topic->subjects as $subject)

<tr>
    <td> {{$subject->title}}</td>
    <td> {{$subject->description}}</td>
    <td> <a href="{{url('sujets/'.$subject->topic->id.'/détail/'.$subject->id.'/modifier')}}" >modifer</a></td>
    <td> 
        <form action="{{url('sujets/'.$subject->topic->id.'/détail/'.$subject->id.'/supprimer')}}" method="POST">
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
<a href="{{url('sujets/'.$topic->id.'/détail/ajouter')}}" >ajouter</a>
</div>
@endsection