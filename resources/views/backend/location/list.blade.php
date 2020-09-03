<x-backend>
  <!-- main body -->
  <div class="main-content" id="panel">
   

    <div class="container-fluid mt--6">
      
      <div class="row" style="margin-top: 180px">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Locations</h3>
                </div>
                <div class="col text-right tableIcon">
                 <a href="{{route('backside.location.create')}}" class="plusBtn" style="color: black;" >
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
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nature</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @php $i=1; @endphp

                    @foreach($locations as $location)

                    @php

                        $id = $location->id;
                        $name = $location->name;
                        $price = $location->price;
                        $photo = $location->photo;
                        $natureid= $location->natureid;
                        $nature = $location->nature->name;
                        
                       

                    @endphp
                  <tr>
                    <th scope="row">
                      {{$i++}}
                    </th>
                    <th scope="row">
                      {{$name}}
                    </th>
                    <td>
                      {{$price}}
                    </td>
                     <td>
                      <img src="{{asset($photo)}}" class="img-fluid" style="width: 70px;" alt="hotel photo">
                    </td>
                    <td>
                      {{$nature}}
                    </td>
                    
                   
                    <td>
                      <a href="{{route('backside.location.edit',$id)}}" class="table-icon linkIcon"><i class="icofont-settings-alt"></i></a>
                      <form action="{{ route('backside.location.destroy',$id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-outline-none" type="submit"> 
                         <i class="icofont-ui-delete"></i>
                        </button>

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
      <!-- Footer -->
      
    </div>
  </div>
    </div>
  </div>
</x-backend>