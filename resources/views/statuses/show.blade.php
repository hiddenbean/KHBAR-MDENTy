<h1> selecsionner les Reasons</h1>
<form action="{{url('partners/'.$partner.'/status/créer')}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    <input name="partner_id" value="{{$partner}}" type="hidden">
    <table>
    @foreach($reasons as $reason)
        <tr>
            <td>
                <input type="checkbox" name="reasons[]" value="{{$reason->id}}">
            </td>
            <td>
                <h2> {{$reason->title}} </h2>
            </td>
        </tr>
    @endforeach
    </table>
    <input type="submit">
</form>