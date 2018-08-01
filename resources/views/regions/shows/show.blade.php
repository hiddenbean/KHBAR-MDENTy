@foreach ($region->regionPoints as $points)
<tr>
    <td class="v-align-middle no-padding" width="5%">
    <i class="fa fa-map-marker"></i>
    </td>
    <td class="v-align-middle padding-5" class="show_point" width="85%">
        {{ $points->longitude }}
        {{ $points->latitude }},
    </td>
</tr>
@endforeach

            
    