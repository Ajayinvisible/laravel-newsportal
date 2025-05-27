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
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <h4>Article Update</h4>
                        <a href="{{ route('article.index') }}" class="btn btn-primary">Go back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.update', $article->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 border-bottom mb-4">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="pending"
                                                        {{ $article->status == 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="approved"
                                                        {{ $article->status == 'approved' ? 'selected' : '' }}>Approved
                                                    </option>
                                                    <option value="rejected"
                                                        {{ $article->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="categories" class="form-label">Select Category</label>
                                        <select name="categories[]" id="categories" class="form-control select2"
                                            multiple="multiple">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $article->categories->contains($category->id) ? 'selected' : '' }}>
                                                    {{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Enter Article Title</label>
                                        <input type="text" name="title" id="title" value={{ $article->title }}
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Enter Content</label>
                                        <textarea name="content" id="content" class="form-control summernote">{{ $article->content }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="meta_keywords" class="form-label">Enter Meta Keywords</label>
                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ $article->meta_keywords }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Enter Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control">{{ $article->meta_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        <img src="{{ asset('article/' . $article->image) }}" alt=""
                                            class="mt-3 rounded" width="300px" height="200px">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
