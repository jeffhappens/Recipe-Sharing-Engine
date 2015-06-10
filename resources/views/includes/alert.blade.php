@if(Session::has('success'))
    <div class="alert alert-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-2x fa-check"></i> {{ Session::get('success') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-warning">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h3>Oops!</h3> --}}
                    <p><i class="fa fa-2x fa-exclamation"></i> {{ Session::get('error') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif