<table border=1>
   <tr>
       <td>Company Name</td>
       <td>Aprouve</td>
       <td>status</td>
   </tr>
 @foreach($partners as $partner)
 <tr>
    <td>{{$partner->company_name}}</td>
    <td>
        <!-- {{$partner->statues->last()}} -->
        @if($partner->statues->last()!=null && $partner->statues->last()->is_approved ==1)
         Is Approved
         @else
         Is Not Approved
         @endif
    </td>
    <td>
 
    @if(!isset($partner->statues->last()->is_approved) || $partner->statues->last()->is_approved ==0)
        <a href="{{url('partners/'.$partner->id.'/status')}}">Approver</a>
    @else

        <a href="{{url('partners/'.$partner->id.'/status')}}">Désapprouver</a>
    @endif

       
     </td>
 </tr>
 @endforeach
</table>