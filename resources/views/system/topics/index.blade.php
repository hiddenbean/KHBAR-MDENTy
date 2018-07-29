@extends('layouts.app')

@section('body')
<div class="container">
<h1>{{$region->name}}</h1>
<form action="{{url('regions/'.$region->id.'/subject/ajouter')}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    <input type="hidden" name="region" value="{{$region->id}}">
    <ul>
        @foreach($topics as $topic)

        <li>
        <h2>{{$topic->title}}</h2>
            <ul>
            @foreach($topic->subjects as $subject)

            <li>

           
            <input type="checkbox" name="subjects[]" value="{{$subject->id}}"  @if($subject->regions()->where('region_id',$region->id)->first()) checked  @endif >
            {{$subject->title}}

            </li>
            @endforeach
            </ul>
        </li>

        @endforeach
    </ul>
    <button type="submit">Attach</button>
</form>
</div>
@endsection