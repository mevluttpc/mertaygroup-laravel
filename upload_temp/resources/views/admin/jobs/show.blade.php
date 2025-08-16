@extends('layouts.main')

@section('title', 'Admin - İş İlanı Detayı')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>İş İlanı Detayı</h2>
                <div>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Geri Dön</a>
                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-info" target="_blank">Önizle</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $job->title }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Şirket:</strong> {{ $job->company_name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Lokasyon:</strong> {{ $job->location }}
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>İş Türü:</strong> 
                                    @switch($job->job_type)
                                        @case('full-time') Tam Zamanlı @break
                                        @case('part-time') Yarı Zamanlı @break
                                        @case('contract') Sözleşmeli @break
                                    @endswitch
                                </div>
                                <div class="col-md-6">
                                    <strong>Deneyim:</strong>
                                    @switch($job->experience_level)
                                        @case('entry') Başlangıç @break
                                        @case('mid') Orta @break
                                        @case('senior') Üst @break
                                    @endswitch
                                </div>
                            </div>

                            @if($job->salary_min || $job->salary_max)
                            <div class="mb-3">
                                <strong>Maaş:</strong>
                                @if($job->salary_min && $job->salary_max)
                                    {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }} TL
                                @elseif($job->salary_min)
                                    {{ number_format($job->salary_min) }} TL+
                                @else
                                    {{ number_format($job->salary_max) }} TL'ye kadar
                                @endif
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong>Açıklama:</strong>
                                <p>{{ $job->description }}</p>
                            </div>

                            @if($job->requirements)
                            <div class="mb-3">
                                <strong>Gereksinimler:</strong>
                                <p>{{ $job->requirements }}</p>
                            </div>
                            @endif

                            <div class="mb-3">
                                <strong>İletişim E-posta:</strong> {{ $job->contact_email }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>İstatistikler</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Görüntülenme:</strong> {{ $job->view_count }}</p>
                            <p><strong>Başvuru Sayısı:</strong> {{ $job->application_count }}</p>
                            <p><strong>Durum:</strong> 
                                @if($job->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Pasif</span>
                                @endif
                            </p>
                            <p><strong>Oluşturulma:</strong> {{ $job->created_at->format('d.m.Y H:i') }}</p>
                            <p><strong>Güncellenme:</strong> {{ $job->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>İşlemler</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-warning w-100 mb-2">Düzenle</a>
                            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Emin misiniz?')">Sil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection