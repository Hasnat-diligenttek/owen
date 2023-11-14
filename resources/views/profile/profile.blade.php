@extends('front_include.header')
@section('front_section')

<div class="container pt-5 my-5">
    <div class="row g-5">
        <div class="col-lg-4">
            <nav>
                <div class="nav nav-tabs mb-3 flex-column" id="nav-tab" role="tablist">
                    <a href="{{ url('dashboard') }}" class="nav-link text-center" type="button">Switch To Virtual Dashboard </a>

                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Account Info</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Your Orders</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-payments" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Info</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Address Info</button>
                    <a href="{{ url('b_logout') }}" class="nav-link text-center">Logout</a>
                </div>
            </nav>
        </div>
        <div class="col-lg-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-account" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h5 class="fw-semibold text-dark mb-4">Account Information
                    </h5>
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="fw-semibold mb-0 small">
                                CONTACT INFORMATION
                            </h6>
                            <a href="#editContact" data-bs-toggle="modal" class="small text-theme">EDIT</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light flex-column h-100 justify-content-center p-5 text-center text-break">
                                        <h6 class="fw-semibold">FULL NAME</h6>
                                        <p class="small mb-0">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light flex-column h-100 justify-content-center p-5 text-center text-break">
                                        <h6 class="fw-semibold">EMAIL</h6>
                                        <p class="small mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light flex-column h-100 justify-content-center p-5 text-center text-break">
                                        <h6 class="fw-semibold">COMPANY</h6>
                                        <p class="small mb-0">{{ Auth::user()->company }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="fw-semibold mb-0 small">
                                ADDRESS BOOK
                            </h6>
                            <a href="" class="small text-theme manage-address">MANAGE</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex bg-light flex-column h-100 justify-content-center p-5 text-break">
                                        <h6 class="fw-semibold mb-3">PRIMARY BILLING ADDRESS</h6>
                                        <p class="text-muted small mb-1">{{ @$primary_bill_address->reciever_name }}</p>
                                        <p class="text-muted small mb-1">{{ @$primary_bill_address->address }}</p>
                                        <p class="text-muted small mb-1">{{ @$primary_bill_address->city }}  </p>
                                        <p class="text-muted small mb-1">{{ @$primary_bill_address->country }}</p>
                                        <p class="text-muted small mb-1">Phone: {{ @$primary_bill_address->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex bg-light flex-column h-100 justify-content-center p-5 text-break">
                                        <h6 class="fw-semibold mb-3">PRIMARY SHIPPING ADDRESS
                                        </h6>
                                        <p class="text-muted small mb-1">{{ @$primary_ship_address->reciever_name }}</p>
                                        <p class="text-muted small mb-1">{{ @$primary_ship_address->address }}</p>
                                        <p class="text-muted small mb-1">{{ @$primary_ship_address->city }}  </p>
                                        <p class="text-muted small mb-1">{{ @$primary_ship_address->country }}</p>
                                        <p class="text-muted small mb-1">Phone: {{ @$primary_ship_address->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h5 class="fw-semibold text-dark mb-4">View and track your orders.
                    </h5>
                    <div class="card">
                        <table class="table mb-0">
                            <thead class="border-bottom">
                                <tr>
                                    <th scope="col">ORDER #</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">SHIP TO</th>
                                    <th scope="col">ORDER TOTAL
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $key => $item)

                                <tr>
                                    <td>{{ @$key+1 }}</td>
                                    <td>{{ @$item->created_at }}</td>
                                    <td>{{ @$item->appartment }}</td>
                                    <td>${{ @$item->total_price }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-payments" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h5 class="fw-semibold text-dark mb-4">Edit your payment information
                    </h5>
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="fw-semibold mb-0 small">
                                CREDIT CARD
                            </h6>
                        </div>
                        <form method="post" action="{{url('update_paymentinfo')}}">
                            @csrf    
                            <div class="card-body">
                                <form class="contact-form bg-transparent py-0">
                                    <div class="mb-3">
                                        <label for="cardType" class="form-label">CREDIT CARD TYPE *</label>
                                        <select name="type" class="form-select" id="cardType" aria-label="Default select example">
                                            <option selected>Visa</option>
                                            <option value="1" {{$payment_information->type == 1 ? 'selected' : ''}}>MasterCard</option>
                                            <option value="2" {{$payment_information->type == 2 ? 'selected' : ''}}>American Express</option>
                                            <option value="3" {{$payment_information->type == 3 ? 'selected' : ''}}>Discover</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputLname" class="form-label">NAME ON CARD *</label>
                                        <input value="{{$payment_information->card_name}}" name="card_name" type="text" class="form-control" id="exampleInputLname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">CREDIT CARD NUMBER *</label>
                                        <input value="{{$payment_information->card_number}}" name="card_number" type="number" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="exampleInputPassword1" class="form-label">EXPIRATION DATE *</label>
                                            <input value="{{$payment_information->exp_date}}" name="exp_date" type="date" class="form-control" id="exampleInputEmail1">

                                        </div>
                                    </div>
                                    <button type="submit" class="my-btn w-100">Save Changes</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h5 class="fw-semibold text-dark mb-4">Address information
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-5">
                                <div class="card-header py-3">
                                    <h6 class="fw-semibold mb-0 small">
                                        PRIMARY BILLING ADDRESS
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex bg-light flex-column h-100 justify-content-center p-5 text-break">
                                        <h6 class="fw-semibold mb-3">SYED MOHTASHIM
                                        </h6>
                                        <p class="text-muted small mb-1">foundation</p>
                                        <p class="text-muted small mb-1">usa</p>
                                        <p class="text-muted small mb-1">hyd, AK 99540
                                        </p>
                                        <p class="text-muted small mb-1">US</p>
                                        <p class="text-muted small mb-1">Phone: 657-220-6606
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <a href="#editAddress" data-bs-toggle="modal" class="small text-theme primary_address">EDIT</a> /
                                            <a href="#deleteAddress" data-bs-toggle="modal" class="small text-theme"> DELETE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-5">
                                <div class="card-header py-3">
                                    <h6 class="fw-semibold mb-0 small">
                                        PRIMARY SHIPING ADDRESS
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex bg-light flex-column h-100 justify-content-center p-5 text-break">
                                        <h6 class="fw-semibold mb-3">SYED MOHTASHIM
                                        </h6>
                                        <p class="text-muted small mb-1">foundation</p>
                                        <p class="text-muted small mb-1">usa</p>
                                        <p class="text-muted small mb-1">hyd, AK 99540
                                        </p>
                                        <p class="text-muted small mb-1">US</p>
                                        <p class="text-muted small mb-1">Phone: 657-220-6606
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <a href="#shipAddress" data-bs-toggle="modal" class="small text-theme edit_shiping" >EDIT</a> /
                                            <a href="#deleteAddress" data-bs-toggle="modal" class="small text-theme"> DELETE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header d-flex justify-content-between py-3">
                                    <h6 class="fw-semibold mb-0 small">
                                        PRIMARY BILLING ADDRESS
                                    </h6>
                                    <a href="#addAddress" data-bs-toggle="modal" class="small text-theme">ADD NEW ADDRESS</a>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex bg-light flex-column h-100 justify-content-center p-5 text-break">
                                        <p class="text-muted small">You have no additional addresses
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- editContact -->
<div class="modal fade" id="editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">EDIT CONTACT INFORMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form method="post" action="{{route('update_account')}}">
            @csrf        
            <div class="modal-body">
                <form class="contact-form bg-transparent py-0">
                    <div class="mb-3">
                        <label for="exampleInputFname" class="form-label">FIRST NAME *</label>
                        <input name="name" type="text" class="form-control" id="exampleInputFname" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLname" class="form-label">LAST NAME *</label>
                        <input name="lastname" type="text" class="form-control" id="exampleInputLname" value="{{ Auth::user()->lastname }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">EMAIL *</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ORGANIZATION *</label>
                        <input name="organization" type="text" class="form-control" id="exampleInputPasssword1" value="{{ Auth::user()->lastname }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NEW PASSWORD *</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPasssword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">CONFIRM PASSWORD *</label>
                        <input name="confirmed" type="password" class="form-control" id="exampleInputPasssword1">
                    </div>
                    <button type="submit" class="my-btn w-100">Save Changes</button>
                </form>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- editAddress -->
<div class="modal fade" id="editAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">EDIT PRIMARY ADDRESS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="contact-form bg-transparent py-0" action="{{ url('update_billing_address') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="0" id="type">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">FIRST NAME *</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputFname" value="{{ @$primary_bill_address->reciever_name }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">LAST NAME *</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputLname" value="{{ @$primary_bill_address->last_name }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ORGANIZATION *</label>
                        <input type="text" name="organization" class="form-control" id="exampleInputEmail1" value="{{ @$primary_bill_address->organization }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS *</label>
                        <input type="text" class="form-control" name="address" id="exampleInputPasssword1" value="{{ @$primary_bill_address->address }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS 2 (OPTIONAL)</label>
                        <input type="text" class="form-control" id="exampleInputPasssword1" value="{{ @$primary_bill_address->organization }}">
                    </div> --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">CITY *</label>
                            <input type="text" class="form-control" name="city" id="exampleInputFname" value="{{ @$primary_bill_address->city }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">STATE *</label>
                            <input type="text" class="form-control" name="state" id="exampleInputFname" value="{{ @$primary_bill_address->state }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">ZIP CODE *</label>
                            <input type="text" class="form-control" name="zip" id="exampleInputFname" value="{{ @$primary_bill_address->zip }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">COUNTRY *</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">DAYTIME PHONE *</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputFname" value="{{ @$primary_bill_address->phone }}">
                        </div>
                        {{-- <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">MOBILE PHONE</label>
                            <input type="text" class="form-control" id="exampleInputFname" value="{{ @$primary_bill_address->organization }}">
                        </div> --}}
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">MAKE THIS MY DEFAULT BILLING ADDRESS.</label>
                    </div>
                    <div class="mb-3 form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">MAKE THIS MY DEFAULT SHIPPING ADDRESS.</label>
                    </div>
                    <button type="submit" class="my-btn w-100">Save Address</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- shipAddress -->
<div class="modal fade" id="shipAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">EDIT SHIPPING ADDRESS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="contact-form bg-transparent py-0" action="{{ url('update_shipping_address') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="1" id="type">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">FIRST NAME *</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputFname" value="{{ @$primary_ship_address->reciever_name }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">LAST NAME *</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputLname" value="{{ @$primary_ship_address->last_name }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ORGANIZATION *</label>
                        <input type="text" name="organization" class="form-control" id="exampleInputEmail1" value="{{ @$primary_ship_address->organization }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS *</label>
                        <input type="text" class="form-control" name="address" id="exampleInputPasssword1" value="{{ @$primary_ship_address->address }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS 2 (OPTIONAL)</label>
                        <input type="text" class="form-control" id="exampleInputPasssword1">
                    </div> --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">CITY *</label>
                            <input type="text" class="form-control" name="city" id="exampleInputFname" value="{{ @$primary_ship_address->city }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">STATE *</label>
                            <input type="text" class="form-control" name="state" id="exampleInputFname" value="{{ @$primary_ship_address->state }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">ZIP CODE *</label>
                            <input type="text" class="form-control" name="zip" id="exampleInputFname" value="{{ @$primary_ship_address->zip_code }}">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">COUNTRY *</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">DAYTIME PHONE *</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputFname" value="{{ @$primary_ship_address->phone }}">
                        </div>
                        {{-- <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">MOBILE PHONE</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div> --}}
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">MAKE THIS MY DEFAULT BILLING ADDRESS.</label>
                    </div>
                    <div class="mb-3 form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">MAKE THIS MY DEFAULT SHIPPING ADDRESS.</label>
                    </div>
                    <button type="submit" class="my-btn w-100">Save Address</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- deleteAddress -->
<div class="modal fade" id="deleteAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">DELETE ADDRESS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="px-0 px-sm-5 text-center">THIS ADDRESS IS PRIMARY FOR BILLING AND SHIPPING. DELETE IT ANYWAY?
                </p>
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="my-btn w-100">Confirm</button>
                    <button class="my-btn w-100">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- addAddress -->
<div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">ADD ADDRESS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="contact-form bg-transparent py-0">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">FIRST NAME *</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">LAST NAME *</label>
                            <input type="text" class="form-control" id="exampleInputLname">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ORGANIZATION *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS *</label>
                        <input type="text" class="form-control" id="exampleInputPasssword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ADDRESS 2 (OPTIONAL)</label>
                        <input type="text" class="form-control" id="exampleInputPasssword1">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">CITY *</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">STATE *</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">ZIP CODE *</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">COUNTRY *</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputFname" class="form-label">DAYTIME PHONE *</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputLname" class="form-label">MOBILE PHONE</label>
                            <input type="text" class="form-control" id="exampleInputFname">
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">MAKE THIS MY DEFAULT BILLING ADDRESS.</label>
                    </div>
                    <div class="mb-3 form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">MAKE THIS MY DEFAULT SHIPPING ADDRESS.</label>
                    </div>
                    <button type="submit" class="my-btn w-100">Save Address</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
