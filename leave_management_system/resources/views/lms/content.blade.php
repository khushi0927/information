@extends('lms.layout')
@section('title-name')
Daily Tasks
@endsection
@section('content')

<!-- Main Content -->
<div class="main-content">

    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Leave Management</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#leaveModal">
            <i class="fa fa-plus"></i> Apply Leave
        </button>
    </div>

    <!-- Leave Table -->
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Leave Requests</h5>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                 @foreach($data as $row)   
                  <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->start_date}}</td>
                     <td>{{$row->end_date}}</td>
                      <td>{{$row->reason}}</td>
                       <td>{{$row->status}}</td>
                    <td><a href="{{ url('delete/'.$row->id) }}">
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete contact ?')"><span class="bi bi-trash"></button></a>
                        |
                       <a href="{{ url('edit/'.$row->id) }}"  class="btn btn-sm btn-outline-primary" onclick="return confirm('Are you sure to edit contact ?')"><span class="bi bi-pencil"></a>

                    </td>
                  </tr>
                  @endforeach                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
                </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection