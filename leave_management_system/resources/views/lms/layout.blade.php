<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Management System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- custom css -->
     <link rel="stylesheet" href="{{ asset('lms/css/style.css') }}">
</head>

<body>

             @if(session('success'))
     <div class="alert alert-success text-center text-dark">
        {{session('success')}}
        <ul>
            @foreach($errors->all as $errors)
            <li>{{$errors}}</li>
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

<!-- Sidebar -->
<div class="sidebar p-3">
    <h4 class="text-white mb-4">Leave System</h4>
    <a href="/"><i class="fa fa-home me-2"></i> Dashboard</a>
    <a href="#"><i class="fa fa-calendar me-2"></i> Leave Requests</a>
    <a href="#"><i class="fa fa-users me-2"></i> Employees</a>
    <a href="#"><i class="fa fa-cog me-2"></i> Settings</a>
</div>

<!-- content here -->
 @yield('content')


<!-- Leave Modal -->
<div class="modal fade" id="leaveModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Apply Leave</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">


                <form method="post" action="{{ url('store') }}">
                    @csrf
                    <!-- Employee Name -->
                    <div class="mb-3">
                        <label class="form-label">Employee Name</label>
                        <input type="text" class="form-control" name="employee_name">
                    </div>

                    <!-- Leave Type -->
                    <div class="mb-3">
                        <label class="form-label">Leave Type</label>
                        <select class="form-select" name="type">
                            <option value="Sick">Sick</option>
                            <option value="Casual">Casual</option>
                            <option value="Vacation">Vacation</option>
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>

                    <!-- End Date -->
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>

                    <!-- Reason -->
                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" name="reason"></textarea>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Submit Leave
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
