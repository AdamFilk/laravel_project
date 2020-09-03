<x-backend>
  <form action="{{route('backside.hotel.update',$hotel->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="oldPhoto" value="{{$hotel->photo}}">
    <input type="hidden" name="id" value={{$hotel->id}}>
    <div class="main-content" id="panel">


      <div class="container-fluid mt--6">

        <div class="row" style="margin-top: 180px">
          <div class="col-xl-8">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">New Hotels</h3>
                  </div>
                  <div class="col text-right tableIcon">
                   <a href="{{route('backside.hotel.index')}}" class="plusBtn" style="color: black;" >
                    <i class="icofont-home"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">      
             <div style="padding-left: 40px;">
              <label for="firstName">Name:</label>
              <input name="name" class="form-control" type="text" style="display: inline-block;" value="{{$hotel->name}}"> 
              <div class="text-danger form-control-feedback">
                {{$errors->first('name')}}
              </div> 
            </div>            
          </div>

          <div class="row">      
           <div style="padding-left: 40px;">
            <label for="price">Price:</label>
            <input name="price" class="form-control" type="text" style="display: inline-block;" value="{{$hotel->price}}"> <div class="text-danger form-control-feedback">
              {{$errors->first('price')}}
            </div>    
          </div>            
        </div>
        <br>
        <div class="row">      
         <div class="form-group row"style="padding-left: 40px;">
          <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
          <div class="col-sm-10">
           <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="oldphoto-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="oldphoto" aria-selected="true">Old Profile</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="newphoto-tab" data-toggle="tab" href="#newphoto" role="tab" aria-controls="newphoto" aria-selected="false">New Profile</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="oldphoto-tab">
              <img src="{{asset($hotel->photo)}}" class="img-fluid w-25">

            </div>
            <div class="tab-pane fade" id="newphoto" role="tabpanel" aria-labelledby="newphoto-tab">
              <input type="file" name="photo" class="form-control-file pt-2">
            </div>
            <div class="text-danger form-control-feedback">
             {{$errors->first('photo')}}
           </div>
         </div>   
       </div> 

       <div class="form-group row">
        <label>Location:</label> 
        <div class="col-sm-10">
          <select class="form-control" name="locationid">

            <option>
              Choose One
            </option>

            @foreach($locations as $location)
            <option value="{{$location->id}}" 
              @if($hotel->locationid == $location->id)
               {{'selected'}} 
               @endif >
              {{$location->name}}
            </option>
            @endforeach

          </select>
          <div class="text-danger form-control-feedback">

            {{$errors->first('hotelid')}}


          </div>
        </div>

      </div>           
      <button type="submit" class="btn btn-success mx-3 my-5">Edit</button>

    </div>



  </div>
</div>
</div>
</div>
</div>

</form>
</x-backend>    