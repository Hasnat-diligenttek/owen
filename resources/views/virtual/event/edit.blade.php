@extends('virtual.layouts.dashboard_header')
@section('virtual_dashboard_section')
<main>

    <section class="create_event pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 mx-auto">
                    <div class="image">
                        <img src="assets/images/onboarding-first.png" alt="" class="img-fluid">
                        <img src="assets/images/onboarding-second.png" alt="" class="img-fluid position-relative">
                    </div>
                </div>
                <div class="col-lg-5 me-auto pt-5">
                    <div class="event-form pt-5">
                        <form action="{{ url('update_event') }}" method="POST" class="event_form">
                            @csrf
                            <?php
                            use Illuminate\Support\Facades\Crypt;

                             $encrypted = Crypt::encryptString($event->id);
                            ?>
                            <input type="hidden" value="{{ $encrypted }}" name="id">
                            <div class="form-1">
                                <p class="steps text-uppercase">Steps 1 of 4</p>
                                <h3 class="fw-bold">Type in the name of your team</h3>
                                <p class="fs-5">The team will be displayed on each participant's <br> Pop-Up Store.</p>

                                <input type="text" name="name" id="name" value="{{ @$event->team_name }}" class="form-control mt-5" placeholder="Team Name">
                                <button type="button" class="blue-btn mt-4 v-hide">Next: Team Details <i class="fas fa-chevron-right ms-2"></i></button>
                            </div>
                            <div class="form-2" style="display: none;">
                                <p class="steps text-uppercase">Steps 2 of 4</p>
                                <h3 class="fw-bold">Tell us about your team</h3>
                                <p class="fs-5 mb-4">From sports to non profit organization Double good has helped raise over $100 million </p>
                                <input type="hidden" value="{{ @$event->org_cate }}" id="cate_type">
                                <div class="form-group after">
                                    <label for="organization_type">Organization Type</label>


                                    <select name="organization_type" id="organization_type" class="form-control">
                                        @foreach ($org as $orgz)
                                        @if (isset($event->org_type) && $orgz->id == $event->org_type || old('categorie_id') == $orgz->id)
                                             <option selected value="{{ $orgz->id }}">{{ $orgz->org_type_name }}</option>
                                        @else
                                             <option value="{{ $orgz->id }}">{{ $orgz->org_type_name }}</option>
                                        @endif
                                        @endforeach


                                    </select>
                                </div>
                                <div class="form-group after">
                                    <label for="arts_culture">Arts and culture</label>
                                    <select name="org_cate" id="arts_culture" class="form-control arts_culture">

                                    </select>
                                </div>
                                <div class="form-group after">
                                    <label for="school_organization">School or Organization name</label>
                                    <input type="text" name="org_name" value="{{ @$event->org_name }}" class="form-control" placeholder="School or Organization name">
                                </div>
                                <input type="number" name="zip" id="zip" value="" class="form-control mt-5 w-25 v-hide" placeholder="Zip Code">
                                <button type="button" class="blue-btn mt-4 ">Next: Fundraiser details<i class="fas fa-chevron-right ms-2"></i></button>
                            </div>
                            <div class="form-3" style="display: none;">
                                <p class="steps text-uppercase">Steps 3 of 4</p>
                                <h3 class="fw-bold mb-3">Select your team's four day fundraising window</h3>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ @$event->start_date }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="start_date">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ @$event->end_date }}">
                                </div>
                                <button type="button" class="blue-btn mt-4 v-hide">Next: Participants <i class="fas fa-chevron-right ms-2"></i></button>
                            </div>
                            <div class="form-4" style="display: none;">
                                <p class="steps text-uppercase">Steps 4 of 4</p>
                                <h3 class="fw-bold mb-5">How many members of your team will participate in the fundraiser</h3>

                                <div class="row mb-4">
                                    <?php
                                    $ranges = [
                                'just me','2-10','11-20','21-30','31-40','41-50','51-60','61-70'
                                ];
                                    ?>

                                    @foreach ($ranges as $item)


                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="{{ $item }}" name="members" id="input-checkbox-1" @if ($event->members==$item)
                                        checked
                                            @endif >
                                            <label class="input-checkbox-label" for="input-checkbox-1">{{ $item }}</label>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="2-10" name="members" id="input-checkbox-2">
                                            <label class="input-checkbox-label" for="input-checkbox-2">2 - 10</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="11-20" name="members" id="input-checkbox-3">
                                            <label class="input-checkbox-label" for="input-checkbox-3">11 - 20</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="21-30" name="members" id="input-checkbox-4">
                                            <label class="input-checkbox-label" for="input-checkbox-4">21 - 30</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="31-40" name="members" id="input-checkbox-5">
                                            <label class="input-checkbox-label" for="input-checkbox-5">31 - 40</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="41-50" name="members" id="input-checkbox-6">
                                            <label class="input-checkbox-label" for="input-checkbox-6">41 - 50</label>
                                        </div> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="51-60" name="members" id="input-checkbox-7">
                                            <label class="input-checkbox-label" for="input-checkbox-7">51 - 60</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ps-0 mb-3">
                                        <div class="input-checkbox">
                                            <input type="radio" value="61-70" name="members" id="input-checkbox-8">
                                            <label class="input-checkbox-label" for="input-checkbox-8">61 - 70</label>
                                        </div>
                                    </div> --}}
                                </div>
                                <button type="submit" class="blue-btn v-hide">Submit details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        const id =  $('#organization_type').val();
        const cate_id =  $('#cate_type').val();
        alert(cate_id)


             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                url: '{{ url('edit_get_org_type') }}', // Change this to your route URL
                method: 'POST',
                data: {id:id,cate_id:cate_id},
                success: function(data){
                        // console.log(data);
                            $('.arts_culture').html(data);

                    // for (let i = 0; i < data.length; i++) {

                    // var html = `<option value="${data[i].id}">${data[i].org_type_name}</option>`;
                    //   }

            }


            });
            });

</script>
@endsection
