@extends('virtual.layouts.dashboard_header')
@section('virtual_dashboard_section')
<?php
$event_id = Illuminate\Support\Facades\Crypt::encryptString($event->id);
?>
<main>
    <div class="container">
        <div class="row mt-5">
            <a href="{{ url('dashboard') }}" class="cart-btn w-auto"> <i class="fas fa-arrow-left"></i> Fundraising Events</a>
            <a href="{{ url('create_store/'.$event_id) }}" class="cart-btn w-auto"> <i class="fas fa-arrow-left"></i> Set Pop-Up Store</a>

        </div>

    </div>

    <section class="event_detail mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-capitalize">{{ @$event->team_name }}</h4>
                    <p>Created by {{ @$event->org_name }}</p>
                </div>
                <div class="col-lg-6 text-end position-relative">
                    <a href="" class="dashboard-btn">Share event code: {{ @$event->code }}</a>
                    <button class="dashboard-btn fas fa-ellipsis mt-4 mt-lg-0" id="dropdown"></button>
                    <div class="custom-dropdown position-absolute">
                        <ul>
                            <li><a href="{{ url('edit_event/'.$event->id) }}" class=""><i class="fa-regular fa-pen-to-square me-2"></i> Edit Event</a></li>
                            <li><a href="{{ url('delete_event/'.$event->id) }}" class="text-danger"><i class="fa-regular fa-circle-xmark me-2"></i> Delete Event</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="event_info">
                <div class="row">

                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <p>Event starts in</p>
                        <h3 class="fw-semibold mb-5">

                 <?php
     $d =  new DateTime($event->end_date);
      $formattedDate = $d->format('Y-m-d h:m:s');
// Given date and time

$endDate = new DateTime($formattedDate);

// Get the current date and time
$currentDate = new DateTime();

// Calculate the difference between the current date and the end date
$interval = $currentDate->diff($endDate);

// Get the remaining days, hours, and minutes
$remainingDays = $interval->format('%a');
$remainingHours = $interval->format('%h');
$remainingMinutes = $interval->format('%i');

// Output the remaining time
echo "Remaining time: $remainingDays days, $remainingHours hours, and $remainingMinutes minutes.";


?>

                               </h3>

                        <h3 class="fw-semibold">Details</h3>
                        <hr class="mb-5" style="color: gray;">

                        <div class="d-flex gap-5 mb-4">
                            <p>Start date</p>
                            <strong>{{ @$event->start_date }}</strong>
                        </div>

                        <div class="d-flex gap-5 mb-4">
                            <p>End date</p>
                            <strong>{{ @$event->end_date }}</strong>
                        </div>

                        <div class="d-flex gap-5 mb-4">
                            <p>Category</p>
                            <strong>{{ @$event->org_type_name }}</strong>
                        </div>
                    </div>

                    <div class="col-lg-6 ms-auto">
                        <div class="d-flex justify-content-between mb-5">
                            <div class="">
                                <p>Event Total</p>
                                <h3 class="fw-semibold mb-0">$0</h3>
                            </div>
                            <div class="">
                                <p>Event Earnings</p>
                                <h3 class="fw-semibold mb-0">$0</h3>
                            </div>
                            <div class="">
                                <p>Number of supporters</p>
                                <h3 class="fw-semibold mb-0">$0</h3>
                            </div>
                        </div>
                        <h3 class="fw-semibold">Leaderboard</h3>
                        <hr class="mb-5" style="color: gray;">
                        <p>Nobody has joined this event share your event code to your participants</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-5">
                        <h3 class="fw-semibold">Payout</h3>
                        <hr class="mb-5" style="color: gray;">
                        <a href="#" class="dashboard-btn">How to add payout method</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
