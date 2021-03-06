<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="">
            <img width="100%" src="{{asset('front-end/images/logo.png')}}" alt="">
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{\Illuminate\Support\Facades\Auth::user()->image ? 'https://storagecase3.s3.amazonaws.com/'.Auth::user()->image: "https://theme.hstatic.net/1000344185/1000478812/14/icon_avatar.png?v=380" }}" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('admin.info')}}" tabindex="0" class="dropdown-item">Change Infomation</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('admin.avatar')}}" tabindex="0" class="dropdown-item">Change Avatar</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('admin.password')}}" tabindex="0" class="dropdown-item">Change Password</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('auth.logout')}}" tabindex="0" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3">
                            <div class="widget-heading">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </div>
                            <div class="widget-subheading">
                                {{\Illuminate\Support\Facades\Auth::user()->role->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
