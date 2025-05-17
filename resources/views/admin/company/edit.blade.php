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
                        <h4>Company Edit</h4>
                        <a href="{{ route('company.index') }}" class="btn btn-primary">Go back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Enter Company Name</label>
                                        <input type="text" name="name" id="name" value="{{ $company->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Enter Company Email</label>
                                        <input type="text" name="email" id="email" value="{{ $company->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Enter Company Phone</label>
                                        <input type="text" name="phone" id="phone" value="{{ $company->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="youtube" class="form-label">Enter Company youtube</label>
                                        <input type="url" name="youtube" id="youtube" value="{{ $company->youtube }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Enter Company facebook</label>
                                        <input type="url" name="facebook" id="facebook" value="{{ $company->facebook }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Enter Company instagram</label>
                                        <input type="url" name="instagram" id="instagram" value="{{ $company->instagram }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Enter Company Logo</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                        <img src="{{ asset('/images/'. $company->logo) }}" width="100px" alt="" class="shadow mt-2 rounded">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
