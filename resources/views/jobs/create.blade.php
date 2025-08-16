@extends('layouts.main')

@section('title', 'Yeni İş İlanı Ver')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Yeni İş İlanı Ver</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Yeni İş İlanı Ver</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">İş Başlığı</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="company_name" class="form-label">Şirket Adı</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                               id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasyon</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="job_type" class="form-label">İş Türü</label>
                                <select class="form-select @error('job_type') is-invalid @enderror" 
                                        id="job_type" name="job_type" required>
                                    <option value="">Seçiniz</option>
                                    <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>Tam Zamanlı</option>
                                    <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>Yarı Zamanlı</option>
                                    <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Sözleşmeli</option>
                                </select>
                                @error('job_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="experience_level" class="form-label">Deneyim Seviyesi</label>
                                <select class="form-select @error('experience_level') is-invalid @enderror" 
                                        id="experience_level" name="experience_level" required>
                                    <option value="">Seçiniz</option>
                                    <option value="entry" {{ old('experience_level') == 'entry' ? 'selected' : '' }}>Başlangıç</option>
                                    <option value="mid" {{ old('experience_level') == 'mid' ? 'selected' : '' }}>Orta</option>
                                    <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>Üst</option>
                                </select>
                                @error('experience_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="salary_min" class="form-label">Min. Maaş (TL)</label>
                                <input type="number" class="form-control @error('salary_min') is-invalid @enderror" 
                                       id="salary_min" name="salary_min" value="{{ old('salary_min') }}">
                                @error('salary_min')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="salary_max" class="form-label">Max. Maaş (TL)</label>
                                <input type="number" class="form-control @error('salary_max') is-invalid @enderror" 
                                       id="salary_max" name="salary_max" value="{{ old('salary_max') }}">
                                @error('salary_max')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contact_email" class="form-label">İletişim E-postası</label>
                        <input type="email" class="form-control @error('contact_email') is-invalid @enderror" 
                               id="contact_email" name="contact_email" value="{{ old('contact_email') }}" required>
                        @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">İş Açıklaması</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="requirements" class="form-label">Gereksinimler</label>
                        <textarea class="form-control @error('requirements') is-invalid @enderror" 
                                  id="requirements" name="requirements" rows="3">{{ old('requirements') }}</textarea>
                        @error('requirements')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Geri Dön</a>
                        <button type="submit" class="btn btn-primary">İlanı Yayınla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection