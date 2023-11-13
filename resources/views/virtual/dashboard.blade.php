@extends('virtual.layouts.dashboard_header')
@section('virtual_dashboard_section')

<main class="dashboard">
        <section class="dashboard-main">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-6">
                        <h1>Fundraising</h2>
                    </div>
                    <div class="col-6 text-end">
                        <h3><a href="{{ url('my-account') }}" class="dashboard-btn text-white"> Shop Now </a></h3>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12" >
                        <h3 class="mb-3 ">Join Event</h3>
                    </div>
                </div>

                <div class="row mb-5">
                    @if (count($all_event)<=2)
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="event-box create">
                            <div class="info">
                                <h6 class="mb-4">Join an Event</h6>
                                <a href="#"  class="dashboard-btn join_event_modal text-white">Join Now</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach ($join_event as $item)
                    <?php
                    $event_id = Illuminate\Support\Facades\Crypt::encryptString($item->id);
                    ?>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <a href="{{ url('event_detail/'.@$event_id) }}">
                        {{-- <a href="{{ url('edit_item/'.@$item->id) }}"> --}}

                            <div class="event-box">
                                <div class="info">
                                    <h6>{{ @$item->team_name }}</h6>
                                    <p class="time"><i class="fa-regular fa-calendar"></i> {{ @$item->start_date }} - {{ @$item->start_date }} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-3">My Events</h3>
                    </div>
                </div>
                <div class="row mb-5">
                    @if (count($all_event)<=2)
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="event-box create">
                            <div class="info">
                                <h6 class="mb-4">schedule a fundraiser for your team</h6>
                                <a href="{{ url('create_event') }}" class="dashboard-btn text-white">Organize an event +</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach ($all_event as $event)
                     <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <a href="{{ url('dashboard/'.@$event->code) }}">
                        {{-- <a href="{{ url('edit_event/'.@$event->id) }}"> --}}

                            <div class="event-box">
                                <div class="info">
                                    <h6>{{ @$event->team_name }}</h6>
                                    <p class="time"><i class="fa-regular fa-calendar"></i> {{ @$item->start_date }} - {{ @$item->start_date }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-3">Finger Tips</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 mb-4 mb-lg-0">
                        <div class="fingertips-box">
                            <div class="image">
                                <img src="assets/images/charity-4.jpg.png" alt="" class="img-fluid">
                            </div>
                            <div class="info">
                                <h6>Tour a pop up store</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
