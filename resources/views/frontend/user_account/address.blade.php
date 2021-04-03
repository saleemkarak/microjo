@extends('frontend.layouts.master0')
@section('content')

    <div class="container emp-profile">

        <div class="row">
            @include('frontend.user_account.sidebar')

            <div class="col-12 col-md-8">
                <div class="">
                    <h3>العناوين التالية تسخدم في صفحة انتهاء عملية الشراء</h3>
                    <br>
                </div>
                <div class="row">

                    <div class="col-6 col-md-4 col-lg-6">

                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">عنوان الفواتير</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-primary float-right"> العنوان الرئيسي</span>
                                        {{ $user->address }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-info float-right">الدولة</span>
                                        {{ $user->country }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-warning float-right">المحافظة</span>
                                        {{ $user->city }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-success float-right">المنطقة</span>
                                        {{ $user->state }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-danger float-right">رمز بريدي او رقم هاتف</span>
                                        {{ $user->postcode }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editAddress">
                                        تعديل العنوان
                                    </button>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="editAddress" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">تعديل</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('billing.address', [$user->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $user->id }}">
                                                    <div class="form-group">

                                                        <label for="address">عنوان الفواتير {{ $user->address }}</label>
                                                        <textarea class="form-control" name="address"
                                                            id="address">{{ $user->address }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="country">الدولة</label>
                                                        <input value="{{ $user->country }}" type="text" name="country"
                                                            id="country" class="form-control" placeholder="Jordan"
                                                            aria-describedby="helpId">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="city">المحافظة</label>
                                                        <input value="{{ $user->city }}" type="text" name="city"
                                                            id="city" class="form-control" placeholder="Amman"
                                                            aria-describedby="helpId">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="state">المنطقة</label>
                                                        <input value="{{ $user->state }}" type="text" name="state"
                                                            id="country" class="form-control" placeholder="Jubaiha"
                                                            aria-describedby="helpId">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">رمز او رقم الهاتف</label>
                                                        <input value="{{ $user->postcode }}" type="number"
                                                            name="postcode" id="postcode" class="form-control"
                                                            placeholder="eg 888" aria-describedby="helpId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>

                            <!--- shipping -->

                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">عنوان الشحنة</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-primary float-right"> العنوان الرئيسي</span>
                                        {{ $user->saddress }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-info float-right">الدولة</span>
                                        {{ $user->scountry }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-warning float-right">المحافظة</span>
                                        {{ $user->scity }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-success float-right">المنطقة</span>
                                        {{ $user->sstate }}
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-danger float-right">رمز بريدي او رقم هاتف</span>
                                        {{ $user->spostcode }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editsAddress">
                                        تعديل العنوان
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="editsAddress" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">تعديل</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('shipping.address', [$user->id]) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">

                                                        <label for="saddress">عنوان الشحنة</label>
                                                        <textarea class="form-control" name="saddress"
                                                            id="saddress">{{ $user->saddress }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="scountry">الدولة</label>
                                                        <input value="{{ $user->scountry }}" type="text" name="scountry"
                                                            id="scountry" class="form-control" placeholder="Jordan"
                                                            aria-describedby="helpId">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="scity">المحافظة</label>
                                                        <input value="{{ $user->scity }}" type="text" name="scity"
                                                            id="scity" class="form-control" placeholder="Amman"
                                                            aria-describedby="helpId">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sstate">المنطقة</label>
                                                        <input value="{{ $user->sstate }}" type="text" name="sstate"
                                                            id="scountry" class="form-control" placeholder="Jubaiha"
                                                            aria-describedby="helpId">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="spostcode">رمز او رقم الهاتف</label>
                                                        <input value="{{ $user->spostcode }}" type="number"
                                                            name="spostcode" id="spostcode" class="form-control"
                                                            placeholder="eg 888" aria-describedby="helpId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>

                            <!--- shipping -->

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection
