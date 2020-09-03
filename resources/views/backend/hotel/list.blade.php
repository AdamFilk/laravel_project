<x-backend>
   

    <div class="container-fluid mt--6">
      
      <div class="row" style="margin-top: 180px">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Available Hotels</h3>
                </div>
                <div class="col text-right tableIcon">
                 <a href="{{route('backside.hotel.create')}}" class="plusBtn" style="color: black;" >
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
                    <th>No</th>
                    <th scope="col">Hotel </th>
                    <th scope="col">Hotel Photo </th>
                    <th scope="col">Price</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($hotels as $hotel)
                  @php
                  $id=$hotel->id;
                  $name=$hotel->name;
                  $price=$hotel->price;
                  $photo=$hotel->photo;
                  $location = $hotel->location->name;
                  @endphp
                  <tr>
                    <td>{{$i++}}</td>
                    <td scope="col">{{$name}} </td>          
                    <td  scope="col"><img src="{{asset($photo)}}" alt="hotel photo" class="img-fluid w-50"> </td>          
                      <td>{{$price}}Ks</td>
                      <td>{{$location}}</td>
                      <td>
                      
                      <a href="{{route('backside.hotel.edit',$id)}}" class="table-icon linkIcon"><i class="icofont-settings-alt"></i></a>
                       <form action="{{route('backside.hotel.destroy',$id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure sir?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-none" type="submit"><i class="icofont-ui-delete"></i></button>
                                                </form>
                      </td>
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