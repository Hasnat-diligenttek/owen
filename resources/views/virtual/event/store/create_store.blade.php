@extends('virtual.layouts.dashboard_header')
@section('virtual_dashboard_section')

<style>
    .dropzone {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-wrap: wrap;
    }
</style>
<main style="height: 80vh;" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div id="dropzone">
                    <form class="dropzone needsclick p-4 rounded-3" id="demo-upload" action="{{ url('save_event_store') }}" method="POST" enctype="multipart/form-data">
                        <h3>Create Pop-Up Store</h3>
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event_id }}">
                        <div class="mb-3 form-group w-100">
                            <label for="exampleInputEmail1" class="form-label">photo</label>
                            <input type="file" value="Choose File | Drag & Drop" readonly class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">

                            {{-- <input type="file" value="Choose File | Drag & Drop" readonly class="form-control dropzone-btn" name="image" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                        </div>
                        <div class="mb-3 form-group w-100">
                            <label for="exampleInputPassword1" class="form-label">Display Name</label>
                            <input type="text" class="form-control" name="display_name" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-group w-100">
                            <label for="exampleInputPassword1" class="form-label">Fundraising Goal</label>
                            <input type="text" class="form-control" name="goal_amount" id="exampleInputPassword1">
                        </div>
                        <div class="form-check mb-4 w-100">
                            <input type="checkbox" class="form-check-input" name="my_store" id="exampleCheck1" value="1">
                            <label class="form-check-label" for="exampleCheck1">My Store</label>
                        </div>
                        <button type="submit" class="blue-btn w-100">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

 {{-- <main>
    <form class="col-md-6 ml-5" action="{{ url('save_event_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event_id }}">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">phOTO</label>
          <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Display Name</label>
          <input type="text" class="form-control" name="display_name" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Fundraising Goal</label>
            <input type="text" class="form-control" name="goal_amount" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="my_store" id="exampleCheck1" value="1">
            <label class="form-check-label" for="exampleCheck1">My Store</label>
         </div>

        <button type="submit" class="btn btn-primary">Create</button>
      </form>



</main> --}}
@endsection
