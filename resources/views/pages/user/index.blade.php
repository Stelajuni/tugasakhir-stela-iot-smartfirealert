@extends('layouts.dashboard')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between align-items-center">
        <div class="iq-header-title">
            <h4 class="card-title">Detail Kurir</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                aria-describedby="user-list-page-info">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th>Sunting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d M Y, H:i:s') }}</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a onclick="openEditModal('{{ $user->id }}')" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Edit" href="#">
                                        <i class="ri-pencil-line"></i></a>

                                    <a onclick="deleteUser('{{ $user->id }}')" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Delete" href="#">
                                        <i class="ri-delete-bin-line"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


