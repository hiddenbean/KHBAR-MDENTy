
 

<table class="table table-condensed">
        <tbody>
            @if (isset($regions))
             
                @foreach ($regions as $region)
                    <tr>
                        <td class="v-align-middle no-padding" width="5%">
                            <i class="fa fa-map"></i>
                        </td>
                        <td class="v-align-middle padding-5" width="85%">
                            <strong><a href="regions/{{$region->id}}" class="text-black ajax">{{ $region->name }}</a></strong>
                        </td>
                    </tr> 
                    <tr id="container_show_region_{{$region->id}}">

                    </tr>
                @endforeach
            
             @endif 
        </tbody>
    </table>
<a href="region/create" class="ajax m-t-15 float-right">Ajouter une region</a>