<h1>{{$partner->company_name}}</h1>
<br>

Partner Infos 
<br>
        @if(($partner->statues->last()!=null) && $partner->statues->last()->is_approved ==1)
         Is Approved
         @else
         Is Not Approved
         @endif

<br><BR>

    <form action="{{url('partners/'.$partner->id.'/status/approuver')}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <button type="submit" class="btn btn-primary">
            Approve
        </button>
    </form>
        
<a href="{{url('partners/'.$partner->id.'/status/non-approuvé')}}" > not Approve </a>
