<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('article.index') }}"><i class="far fa-file"></i>
                                Article</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Index</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <h4>Add Article</h4>
                        <a href="{{ route('article.create') }}" class="btn btn-primary">Add New Article</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $key => $article)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->slug }}</td>
                                            <td>
                                                @if ($article->image)
                                                    <img alt="image" src="{{ asset('/article/' . $article->image) }}"
                                                        width="80px" height="60px" class="object-cover">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($article->status == 'approved')
                                                    <div class="badge badge-success">Approved</div>
                                                @elseif ($article->status == 'pending')
                                                    <div class="badge badge-warning">Pending</div>
                                                @else
                                                    <div class="badge badge-danger">Rejected</div>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('article.destroy', $article->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('article.edit', $article->id) }}"
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
