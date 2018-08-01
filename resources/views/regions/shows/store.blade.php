<p> 
    <i class="fa fa-map"></i> 
    <strong>{{ $name }}</strong>
</p>
<table class="table table-condensed table-left">
    <tbody id="table_points">
            
    </tbody>
</table> 

 <form action="regions/ajouter" method="post" id="form">
    @csrf
    <div class="hide">
        <input type="text" name="name" id="name_region" value="{{ $name }}" >
        <div id="region"></div>
    </div> 
    <button type="submit" class="btn btn-primary float-right m-t-10" >
        Terminer
    </button> 
</form>