@extends('front_include.header')
@section('front_section')

{{-- <div id="leafly-embed-wrapper" style="height:2000px"><script id="leafly-embed-script" src="https://web-embedded-menu.leafly.com/loader.js" data-origin="https://web-embedded-menu.leafly.com" data-slug="ishen-tree" data-primary="#FFCD00" data-secondary="#2890DC" data-deals="#CE300A" ></script></div> --}}
<div class="card col-lg-6 offset-lg-3">
    <div class="card-header py-3">
        <h6 class="fw-semibold mb-0 small">
            Brochure Login
        </h6>
    </div>
    <div class="card-body">
        <form class="contact-form bg-transparent py-0" action="{{ url('profile_login') }}" method="POST">
            @csrf

            @if (Session::has('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

            <div class="mb-3">
                <label for="exampleInputLname" class="form-label">Email *</label>
                <input type="email" class="form-control" id="exampleInputLname" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="password">
            </div>

            <button type="submit" class="my-btn w-100 mb-3">Login</button>
            <small class="mt-3">Don't Have an Account ? <a href="{{url('signup/b')}}">Sign-Up</a> </small>
        </form>
    </div>
</div>

@endsection
