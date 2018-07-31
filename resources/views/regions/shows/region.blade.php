<p> <i class="fa fa-map"></i> <strong>{{ $name }}</strong></p>
<table class="table table-condensed table-left">
    <tbody id="table_points">
            
    </tbody>
</table> 

 <form action="region/store-points" method="post" id="form" class="ajax">
    @csrf
    <input type="text" name="name" id="name_region" value="{{ $name }}" >
    <div id="region"></div>

    <button type="submit" class="btn btn-primary float-right m-t-10" >
        Terminer
    </button> 
</form>