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
                        <h4>Categories Details</h4>

                        <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if($category->status == true)
                                            <div class="badge badge-success">Active</div>
                                            @else
                                            <div class="badge badge-danger">InActive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
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
    </section>
</x-app-layout>
