<x-backend>
  @php

  $id = $location->id;
  $name = $location->name;
  $price = $location->price;
  $photo = $location->photo;
  $nature = $location->nature;
  


  @endphp

 <div class="main-content" id="panel">
   

    <div class="container-fluid mt--6">
      
      <div class="row" style="margin-top: 80px">
        
      </div>
       
      </div>
      <!-- Footer -->
      <div class="main-content" id="panel">
   

    <div class="container-fluid mt--6">
      
      <div class="row" style="margin-top: 180px">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">New Locations</h3>
                </div>
                <div class="col text-right tableIcon">
                 <a href="{{route('backside.location.index')}}" class="plusBtn" style="color: black;" >
                  <i class="icofont-home"></i>
                </a>
                </div>
              </div>
            </div>
           <form action="{{ route('backside.location.update',$id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="oldphoto" value="{{$photo}}">

            <div class="row">      
             <div style="padding-left: 40px;">
              <label for="name_id">Name:</label>
              <input name="name" class="form-control" type="text" style="display: inline-block;" id="name_id" name="name" value="{{$name}}">  
              <div class="text-danger form-control-feedback">

                {{$errors->first('name')}}


              </div>  
            </div>            
          </div>

           <div class="row">      
           <div style="padding-left: 40px;">
              <label for="price">Price:</label>
               <input name="price" class="form-control" type="text" style="display: inline-block;" id="price_id" name="price" value="{{$price}}">    
           </div>            
          </div>
          <br>
          <div class="form-group row">
            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
            <div class="col-sm-10">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                  <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>

                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                  <img src="{{asset($photo)}}" class="img-fluid" style="width: 70px;">

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                 <input type="file" id="photo_id" name="photo">

               </div>

             </div>
             <div class="text-danger form-control-feedback">

              {{$errors->first('photo')}}


            </div>

          </div>
        </div>
          <div class="col-sm-10">
          <select class="form-control" name="natureid">

            <option>
              Choose One
            </option>

            @foreach($natures as $nature)
            <option value="{{$nature->id}}" 
              @if($location->natureid == $nature->id)
               {{'selected'}} 
               @endif >
              {{$nature->name}}
            </option>
            @endforeach

          </select>
          <div class="text-danger form-control-feedback">

            {{$errors->first('natureid')}}


          </div>
        </div>

       

         

          <button type="submit" class="btn-success py-2" style="border: none;">Edit</button>
          </form>
          </div>
        </div>
       
      </div>
      <!-- Footer -->
      
    </div>
  </div>
    </div>
</x-backend>