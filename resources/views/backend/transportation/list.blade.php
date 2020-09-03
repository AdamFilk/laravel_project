<x-backend>
    <div class="container-fluid mt--6">
      
      <div class="row" style="margin-top: 180px">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Available Transportation</h3>
                </div>
                <div class="col text-right tableIcon">
                 <a href="{{route('backside.transportation.create')}}" class="plusBtn" style="color: black;" >
                  <i class="icofont-plus-circle"></i>
                </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Type </th>
                    <th scope="col">Name </th>
                    <th scope="col">Price</th>
                    <th scope="col"> Photo </th>
                    <th scope="col"> Location</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp

                    @foreach($transportations as $transportation)

                    @php

                        $id = $transportation->id;
                        $type = $transportation->type;
                        $name = $transportation->name;
                        $price = $transportation->price;
                        $photo = $transportation->photo;
                        $location = $transportation->location->name;



                    @endphp
                  <tr>
                    <th scope="col"> {{$i++}} </th>
                     <th scope="col">{{$type}} </th>  
                    <th scope="col">{{$name}} </th> 
                    <th scope="col">{{$price}}Ks</th> 
                    <th scope="col">{{$location}}Ks</th>         
                    <th scope="col"><img src="{{asset($photo)}}" class="img-fluid" style="width: 70px;" alt="transportation photo"> </th> 
                    
                    <th>
                     <a href="{{route('backside.transportation.edit',$id)}}" class="table-icon linkIcon"><i class="icofont-settings-alt"></i></a>
                      <form action="{{ route('backside.transportation.destroy',$id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-outline-none" type="submit"> 
                         <i class="icofont-ui-delete"></i>
                        </button>

                      </form>
                    </th>          
                   
                  </tr>  
                  @endforeach      
                          
                </tbody>
              </table>
            </div>
          </div>

          </div>
        </div>
       
  </div>
</x-backend>     