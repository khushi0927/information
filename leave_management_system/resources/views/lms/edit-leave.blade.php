@extends('lms.layout')
@section('title-name')
::Edit Leave
@endsection

@section('content')

<!-- Main Content -->
<div class="col-lg-7 col-md-9 p-4">

    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Edit Leave</h5>
    </div>


    <!-- Form Card -->

 <!-- display success message -->
     @if(session('success'))
     <div class="alert alert-success text-center text-dark">
        {{session('success')}}
        <ul>
           @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @endif

       <!-- pass validation -->
  @if ($errors->any())
<div class="alert alert-danger">        
<ul>
@foreach ($errors->all() as $errors)
<li>{{ $errors }}</li>
@endforeach
</ul>
</div>
@endif


    <div class="card card-custom">
        <div class="card-body">

            <form action="{{ url('update/'.$data->id) }}" method="POST">
                @csrf
    

                <div class="row g-3">

                    <!-- Employee Name -->
                    <div class="col-md-6">
                        <label class="form-label">Employee Name</label>
                        <input type="text" class="form-control" 
                               name="employee_name"
                               value="{{ $data->employee_name }}">
                    </div>

                    <!-- Leave Type -->
                    <div class="col-md-6">
                        <label class="form-label">Leave Type</label>
                        <select class="form-select" name="type">
                            <option value="Sick" 
                                {{ $data->type == 'Sick' ? 'selected' : '' }}>
                                Sick
                            </option>
                            <option value="Casual" 
                                {{ $data->type == 'Casual' ? 'selected' : '' }}>
                                Casual
                            </option>
                            <option value="Vacation" 
                                {{ $data->type == 'Vacation' ? 'selected' : '' }}>
                                Vacation
                            </option>
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div class="col-md-6">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control" 
                               name="start_date"
                               value="{{ $data->start_date }}">
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control" 
                               name="end_date"
                               value="{{ $data->end_date }}">
                    </div>

                    <!-- Reason -->
                    <div class="col-12">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" 
                                  name="reason" rows="3">{{ $data->reason }}</textarea>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="Pending" 
                                {{ $data->status == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="Approved" 
                                {{ $data->status == 'Approved' ? 'selected' : '' }}>
                                Approved
                            </option>
                            <option value="Rejected" 
                                {{ $data->status == 'Rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary px-4">
                            Update Leave
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>

@endsection
