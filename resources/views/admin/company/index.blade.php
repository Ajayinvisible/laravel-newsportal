<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('company.index') }}"><i class="far fa-file"></i>
                                Company</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Index</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <h4>Company Details</h4>
                        @if(!$company)
                        <a href="{{ route('company.create') }}" class="btn btn-primary">Add New</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Logo</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($company)

                                    <tr>
                                        <td> 1 </td>
                                        <td>{{ $company->name }}</td>
                                        <td>
                                            @if ($company->logo)
                                            <img alt="image" src="{{ asset('/images/'. $company->logo) }}" width="35">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $company->email }}
                                        </td>

                                        <td>{{ $company->phone }}</td>
                                        <td>
                                            <form action="{{ route('company.destroy', $company->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('company.edit', $company->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @else
                                    <p class="text-danger">No Record Found</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
