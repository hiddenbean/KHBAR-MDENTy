<table border=1>

@foreach($subjects as $subject)

<tr>
    <td> {{$subject->title}}</td>
    <td> {{$subject->description}}</td>
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
<a href="{{url('sujets/'.$subject->topic->id.'/détail/ajouter')}}" >ajouter</a>
