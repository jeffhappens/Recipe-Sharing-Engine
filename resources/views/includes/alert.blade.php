@if(Session::has('success'))
<div class="alert alert-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Success!</h3>
                {{ Session::get('success') }}
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
                <h3>Oops!</h3>
                {{ Session::get('error') }}
            </div>
        </div>
    </div>
</div>
@endif