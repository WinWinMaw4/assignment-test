<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="">
       <div class="container-fluid p-0">
          <div class="d-flex w-100 flex-row justify-content-start position-relative px-0">
              <aside class="bd-slider d-none d-lg-block">
                  @include('layouts.sidenav')
              </aside>

           <main class="container-fluid">
               <div class="row h-100">
                   <div class="col-6 col-md-4 col-lg-2 col-xl-2 p-0 position-sticky top-0">
{{--                                             @include('layouts.sidenav')--}}
                   </div>
                   <div class="col-12 col-lg-10 bg-white p-0">
                       <div class="min-h-screen vh-100 py-3">
                           @yield('content')
                       </div>
                   </div>
               </div>
           </main>
          </div>
       </div>

<script>
    let delBtn = document.getElementsByClassName('del-btn');
    for(let i=0; i<= delBtn.length ; i++){
        delBtn[i].addEventListener('click',function (){
            event.preventDefault();
            formId = this.getAttribute('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#56923f',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })

    }
</script>
{{--session status--}}
       @if(session('status'))
           <script>
               const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true,
                   didOpen: (toast) => {
                       toast.addEventListener('mouseenter', Swal.stopTimer)
                       toast.addEventListener('mouseleave', Swal.resumeTimer)
                   }
               })

               Toast.fire({
                   icon: 'success',
                   title: '{{session('status')}}'
               })
           </script>
       @endif

       @stack('scripts')

    </body>
</html>

