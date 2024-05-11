@extends('app')

@section('content')
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Guards</div>

            <div class="ms-auto">
                <div class="btn-group">
                    <div class="col">
                        <a href="{{ route('guards.index') }}" class="btn btn-warning px-3"><i class="lni lni-exit"></i>
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Create Guards</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('guards.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label class="form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="text" name="last_name" class="form-control">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Addess:</label>
                        <input type="text" name="address" class="form-control">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact No:</label>
                        <input type="text" name="contact_no" class="form-control">
                        @error('contact_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning px-3"><i class="lni lni-save"></i>
                            Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
