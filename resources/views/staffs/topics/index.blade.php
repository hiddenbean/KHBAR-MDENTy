<table border=1>

@foreach($topics as $topic)

<tr>
    <td> {{$topic->title}}</td>
    <td> {{$topic->description}}</td>
    <td> <a href="{{url('sujets/'.$topic->id.'/détail')}}" >Detail</a></td>
    <td> 
        <form action="{{url('sujets/'.$topic->id.'/supprimer')}}" method="POST">
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
<a href="{{url('sujets/ajouter')}}" >ajouter</a>
