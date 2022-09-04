<div class="bg-dark min-vh-100 px-2 shadow-lg ">
    {{--admin logo--}}
    <div class="admin-logo d-flex flex-column justify-content-center align-items-center py-4 mb-2">
        <span class="rounded rounded-circle bg-warning py-1 d-flex justify-content-center align-items-center" style="width: 50px;height: 50px">
            <img src="{{asset('adminlogo.svg')}}" alt="" class="img-fluid">
        </span>
        <span class="text-white fw-bold fs-3">Admin Panel</span>
    </div>

    {{-- Entry Menu --}}
    <div class="my-2">
        <a class="w-100 btn d-flex justify-content-between align-items-center text-white" data-bs-toggle="collapse" href="#entry" style="background-color: rgba(90,100,117,0.79);" >
            <sapn>
                <i class="bi bi-pencil-square me-2"></i>Entry
            </sapn>
            <i class="bi bi-caret-down-fill"></i>
        </a>
        <div class="collapse my-1 {{request()->routeIs('products.index') ? 'show':''}} " id="entry">
            <a class="w-100 btn btn-light d-flex justify-content-between align-items-center text-black bg-white" href="{{route('products.index')}}" >
                <span class="ps-2">
                    <i class="bi bi-caret-right-fill me-2"></i>Products
                </span>
            </a>
        </div>
    </div>

    {{--<div class="" id="">--}}
    {{--    <div class="card card-body bg-success">--}}
    {{--        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.--}}
    {{--    </div>--}}
    {{--</div>--}}

    <div class="position-absolute bottom-0 d-flex justify-content-center align-items-center w-100 px-2" style="margin-left: -.5rem">
        <form action="{{route('logout')}}" id="logout" method="post" class="w-100">
            @csrf
            <x-button class="btn-lg btn-outline-danger w-100 mb-3 logout" >
                {{ __('LOG OUT') }}
            </x-button>
        </form>
    </div>

</div>

