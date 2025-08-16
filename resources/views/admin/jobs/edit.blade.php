@extends('layouts.main')

@section('title', 'Admin - İş İlanı Düzenle')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>İş İlanı Düzenle</h2>
                <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-secondary">Geri Dön</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                                           {{ $job->is_active ? 'checked' : '' }} value="1">
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" 
                                           {{ $job->is_featured ? 'checked' : '' }} value="1">
                                    <label class="form-check-label" for="is_featured">
                                        Öne Çıkan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_urgent" id="is_urgent" 
                                           {{ $job->is_urgent ? 'checked' : '' }} value="1">
                                    <label class="form-check-label" for="is_urgent">
                                        Acil
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                                <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-secondary">İptal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection