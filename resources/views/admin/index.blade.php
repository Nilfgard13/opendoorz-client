<x-layout_login>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to <i>Opendoorz Rotator System</i></h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app
                    views.
                </p>

                {{-- <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p> --}}

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.</small>
                </p>

            </div>

            <div class="col-md-6">
                <div class="ibox-content">
                    <h1 class="logo-name">ORS</h1>
                    <form class="m-t" role="form" action="/login" method="POST">
                        @csrf

                        {{-- Menampilkan error message --}}
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        {{-- Input email tanpa old value --}}
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                required="">
                        </div>

                        {{-- Input password --}}
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                required="">
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        

                    </form>

                    <p class="m-t">
                        <small>Inspinia web app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>

        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <footer class="text-center py-3">
                    <p>&copy; {{ date('Y') }} Opendoorz Real Estate. All rights reserved.</p>
                </footer>

            </div>

        </div>
    </div>
    <div class="col-md-6 text-right">
        <small>© 2014-2015</small>
    </div>

</x-layout_login>

<img src="" alt="">