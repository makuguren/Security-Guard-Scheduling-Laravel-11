@extends('app')

@section('content')
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Security Guards</div>

            <div class="ms-auto">
                <div class="btn-group">
                    <div class="col">
                        <a href="{{ route('guards.create') }}" class="btn btn-warning px-3"><i class="lni lni-user"></i>
                            Add Guard</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Guards Table</h5>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                                name="search-sharp"></ion-icon></div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guards as $guard)
                                <tr>
                                    <td>{{ $guard->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <h6 class="mb-1">{{ $guard->first_name }} {{ $guard->last_name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $guard->address }}</td>
                                    <td>{{ $guard->contact_no }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('guards.edit', $guard->id) }}" class="text-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Edit Guard"
                                                aria-label="Edit">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                            <a href="{{ route('guards.delete', $guard->id) }}" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                                aria-label="Delete" onclick="return confirm('Are you sure to delete this Data?')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
