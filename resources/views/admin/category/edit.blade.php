<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><i class="far fa-file"></i>
                                Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Create</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <h4>Category Create</h4>
                        <a href="{{ route('category.index') }}" class="btn btn-primary">Go back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Enter Category Title</label>
                                        <input type="text" name="title" id="title" value="{{ $category->title }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="meta_keywords" class="form-label">Enter Meta Keywords</label>
                                        <textarea name="meta_keywords" id="meta_keywords"
                                            class="form-control">{{ $category->meta_keywords }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Enter Meta Description</label>
                                        <textarea name="meta_description" id="meta_description"
                                            class="form-control">{{ $category->meta_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
