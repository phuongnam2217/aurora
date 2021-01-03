@extends('admin.master')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Analytics Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in
                            elements and components.
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
                        <div tabindex="-1" role="menu" aria-hidden="true"
                             class="dropdown-menu dropdown-menu-right">
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
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom"  style="flex-direction: column">
                    <div class="text-white">
                        <h2>Order</h2>
                    </div>
                    <div class="widget-content-wrapper text-white w-100" style="flex-direction: column">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Total Orders Of Day : </div>
                            <div class="widget-numbers"> {{$orderOfDay->count()}}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Total Orders Of Month : </div>
                            <div class="widget-numbers"> {{$orderOfMonth->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile"  style="flex-direction: column">
                    <div class="text-white">
                        <h2>Products</h2>
                    </div>
                    <div class="widget-content-wrapper text-white w-100" style="flex-direction: column">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Products : </div>
                            <div class="widget-numbers"> {{$products->count()}}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Product is out of stock : </div>
                            <div class="widget-numbers"> {{$productsOver->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early"  style="flex-direction: column">
                    <div class="text-white">
                        <h2>Customers</h2>
                    </div>
                    <div class="widget-content-wrapper text-white w-100" style="flex-direction: column">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Total Customers : </div>
                            <div class="widget-numbers"> {{$customers->count()}}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="widget-heading">Total New Customers Of Day  : </div>
                            <div class="widget-numbers">{{$customersOfDay->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
