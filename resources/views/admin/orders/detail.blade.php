@extends('admin.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>
                        <h2><a class="" href="{{route('products.index')}}">Order Details</a></h2>
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                            Inbox
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                            Book
                                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                            Picture
                                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                            File Disabled
                                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-6">
               <div class="card">
                   <div class="card-body">
                       <h2 class="text-center">Order Information</h2>
                       <p>Order Code :  {{$order->id}}</p>
                       <p>Note : {{$order->note}}</p>
                       <p>Status :  <span class="badge {{$order->statusBadge()}} ">
                                              {{$order->status()}}
                                        </span></p>
                   </div>
               </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Thông tin khách hàng</h2>
                        <p>Họ và tên : {{$order->customer->name}}</p>
                        <p>Email : {{$order->customer->email}}</p>
                        <p>Số điện thoại : {{$order->customer->phone}}</p>
                        <p>Địa chỉ giao hàng : {{$order->customer->address}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-relative row justify-content-center">
            <div class="col-sm-3">
                <a href="{{route('orders.index',$order->status)}}" class="btn btn-secondary form-control">Back</a>
            </div>
            <div class="col-sm-3">
                <a href="{{route('orders.print',$order->id)}}" class="btn btn-success form-control">Print</a>
            </div>
            <div class="col-sm-3">
                <a href="{{route('orders.confirmed',$order->id)}}" class="btn btn-primary form-control">Confirmed</a>
            </div>
            <div class="col-sm-3">
                <a href="{{route('orders.cancel',$order->id)}}" class="btn btn-danger form-control">Cancel</a>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title text-center">Infomation Order</h5>
                        <table class="mb-0 table table-bordered" id="table-product">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>PriceEach</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img width="100px" src="{{asset($item->images[0]->getNameImage())}}" alt=""></td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>{{$item->pivot->quantity}}</td>
                                    <td>{{$item->price}} $</td>
                                    <td>
                                        {{$item->pivot->total}} $
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">Total Order: {{$total}} $</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<div class="modal fade bd-example-modal-lg" id="modal-description" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure delete this products</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="valueDelete" type="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div
@section('js')
    <script>
        $(document).ready(function () {
            $('#table-product').DataTable();
            $('body').on('click', '.showDescription', function () {
                let html = $(this).attr('data-id')
                // let html = $('#description' + id).html();
                $('.modal-body').html(html);
                $('#modal-description').modal('show');
            })
            $('body').on('click','.deleteProduct',function (){
                let link = $(this).val();
                $('#valueDelete').attr('href',link);
                $('#modalDelete').modal('show');
            });
        })
    </script>
@endsection
