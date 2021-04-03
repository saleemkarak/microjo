@extends('backend.layout.master')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">

      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <a href="{{route('brand.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fa fa-plus"></i> Add Brand</a>

          <h3 class="content-header-title">Brands List</h3>

          <p class="float-right">Total Brands : {{\App\Models\Brand::count()}}</p>
        </div>

      </div>
      <div class="content-body">


<!-- Table head options start -->
<div class="row">
    <div class="col-lg-12">
        @include('backend.layout.notification')
    </div>
  <div class="col-12">
      <div class="card">

          <div class="card-content collapse show">

              <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">                      <thead class="thead-dark">
                          <tr>
                              <th scope="col">S.N.</th>
                              <th scope="col">Title</th>

                              <th scope="col">Photo</th>
                              <th scope="col">Status</th>
                              <th >Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($brands as $item)
                          <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$item->title}}</td>

                              <td><img src="{{$item->photo}}" alt="brand image" style="max-height:98px; max-width:128px;"></td>


                              <td>
                                <input type="checkbox" name="toggle" value="{{$item->id}}" {{$item->status=='active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="InActive" data-size="small" data-onstyle="success" data-offstyle="danger">

                              </td>
                                <td>
                                <a href="{{route('brand.edit',$item->id)}}" data-toggle="tooltip" title="edit" data-placement="bottom" class="btn btn-sm btn-outline-warning float-left"> <i class="fa fa-edit"></i></a>
                                <form class="float-left ml-2" action="{{route('brand.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"> <i class="fa fa-trash-o"></i></a>
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
<!-- Table head options end -->


      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                     form.submit();
                  } else {
                      swal("Your data is safe!");
                  }
              });
        })
    })
</script>

<script>
    $('input[name=toggle]').change(function () {
        var mode = $(this).prop('checked');
        var id = $(this).val();
       //alert(id);

    $.ajax({
        url:"{{route('brand.status')}}",
   type: "get",
     data:{

        'mode':mode,
        'id':id,

         },
        success:function(response){

            if(response.status){
                alert(response.msg);
            }
            else{
                alert('Please Try again');
            }

        }
    })

    });


</script>

@endsection
