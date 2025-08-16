@extends('layouts.main')

@section('title', 'Admin - Başvuru Detayı')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Başvuru Detayı</h2>
                <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Geri Dön</a>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Başvuran Bilgileri</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Ad Soyad:</strong> {{ $application->applicant_name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>E-posta:</strong> 
                                    <a href="mailto:{{ $application->applicant_email }}">{{ $application->applicant_email }}</a>
                                </div>
                            </div>
                            
                            @if($application->applicant_phone)
                            <div class="mb-3">
                                <strong>Telefon:</strong> {{ $application->applicant_phone }}
                            </div>
                            @endif

                            @if($application->cover_letter)
                            <div class="mb-3">
                                <strong>Ön Yazı:</strong>
                                <p class="border p-3 bg-light">{{ $application->cover_letter }}</p>
                            </div>
                            @endif

                            @if($application->cv_path)
                            <div class="mb-3">
                                <strong>CV:</strong>
                                <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="btn btn-primary">
                                    <i class="fa fa-download"></i> CV'yi İndir
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>İş İlanı Bilgileri</h5>
                        </div>
                        <div class="card-body">
                            <h6><a href="{{ route('jobs.show', $application->jobListing) }}" target="_blank">{{ $application->jobListing->title }}</a></h6>
                            <p><strong>Şirket:</strong> {{ $application->jobListing->company_name }}</p>
                            <p><strong>Lokasyon:</strong> {{ $application->jobListing->location }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Başvuru Durumu</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.applications.update', $application) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum:</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Bekliyor</option>
                                        <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>İncelendi</option>
                                        <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Kabul Edildi</option>
                                        <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Durumu Güncelle</button>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Başvuru Bilgileri</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Başvuru Tarihi:</strong><br>{{ $application->created_at->format('d.m.Y H:i') }}</p>
                            <p><strong>Son Güncelleme:</strong><br>{{ $application->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>İşlemler</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.applications.destroy', $application) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Bu başvuruyu silmek istediğinizden emin misiniz?')">
                                    Başvuruyu Sil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection