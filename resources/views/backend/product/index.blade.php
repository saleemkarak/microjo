@extends('backend.layout.master')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fa fa-plus"></i> Add
                        Product</a>

                    <h3 class="content-header-title">Products List</h3>

                    <p class="float-right">Total Products : {{ \App\Models\Product::count() }}</p>
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
                                <div class="">
                                    <table class="table  table-responsive-md"
                                        style=" table-layout: fixed; word-wrap: break-word;" id="banner-dataTable"
                                        width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">S.N.</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Condition</th>
                                                <th scope="col">Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                            @php
                                                $photo = explode(',',$item->photo);
                                            @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    {{-- <td>{!! html_entity_decode($item->description) !!}</td> --}}
                                                    <td><img src="{{ $photo[0] }}" alt="banner image"
                                                            style="max-height:98px; max-width:128px;"></td>
                                                    <td>JD{{ number_format($item->price, 2) }}</td>
                                                    <td>{{ $item->discount }}%</td>
                                                    <td>{{ $item->size }}</td>

                                                    <td>
                                                        @if ($item->condition == 'new')
                                                            <span
                                                                class="badge badge-success">{{ $item->condition }}</span>
                                                        @elseif($item->condition == 'popular')
                                                            <span
                                                                class="badge badge-warning">{{ $item->condition }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-primary">{{ $item->condition }}</span>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="toggle" value="{{ $item->id }}"
                                                            {{ $item->status == 'active' ? 'checked' : '' }}
                                                            data-toggle="toggle" data-on="Active" data-off="InActive"
                                                            data-size="small" data-onstyle="success" data-offstyle="danger">

                                                    </td>
                                                    <td>
                                                        <a href="javascript::void(0);" data-toggle="modal"
                                                            data-target="#productID{{ $item->id }}" title="view"
                                                            data-placement="bottom"
                                                            class="btn btn-sm btn-outline-secondary float-left"> <i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ route('product.edit', $item->id) }}"
                                                            data-toggle="tooltip" title="edit" data-placement="bottom"
                                                            class="btn btn-sm btn-outline-warning float-left"> <i
                                                                class="fa fa-edit"></i></a>

                                                        <form class="float-left ml-2"
                                                            action="{{ route('product.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="" data-toggle="tooltip" title="delete"
                                                                data-id="{{ $item->id }}" data-placement="bottom"
                                                                class="dltBtn btn btn-sm btn-outline-danger"> <i
                                                                    class="fa fa-trash-o"></i></a>
                                                        </form>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="productID{{ $item->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            @php

                                                                $product = \App\Models\Product::where('id', $item->id)->first();
                                                            @endphp
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Product : {{ $product->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div>
                                                                                <img class="img-fluid"
                                                                                    src="{{ $product->photo }}"
                                                                                    alt="Card image cap" width="500"
                                                                                    height="150">
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Price :
                                                                                        {{ number_format($product->price, 2) }}
                                                                                        JD</h6>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Offer_Price :
                                                                                        {{ number_format($product->offer_price, 2) }}
                                                                                        JD</h6>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Discount :
                                                                                        {{ number_format($product->discount) }}
                                                                                        %</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Price :
                                                                                        {{ \App\Models\Category::where('id', $product->cat_id)->value('title') }}
                                                                                        JD</h6>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Offer_Price :
                                                                                        {{ number_format($product->offer_price, 2) }}
                                                                                        JD</h6>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle text-muted">
                                                                                        Discount :
                                                                                        {{ number_format($product->discount) }}
                                                                                        %</h6>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="card-title">{!! html_entity_decode($product->summary) !!}
                                                                            </h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p class="card-text">{!! html_entity_decode($product->description) !!}</p>
                                                                            <a href="#" class="card-link">Card link</a>
                                                                            <a href="#" class="card-link">Another link</a>
                                                                        </div>
                                                                        <div
                                                                            class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                                                            <span class="float-left">3 hours ago</span>
                                                                            <span class="float-right">
                                                                                <a href="#" class="card-link">Read More
                                                                                    <i class="la la-angle-right"></i>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
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
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            //alert(id);

            $.ajax({
                url: "{{ route('product.status') }}",
                type: "get",
                data: {

                    'mode': mode,
                    'id': id,

                },
                success: function(response) {

                    if (response.status) {
                        alert(response.msg);
                    } else {
                        alert('Please Try again');

                    }

                }
            })

        });

    </script>

@endsection
