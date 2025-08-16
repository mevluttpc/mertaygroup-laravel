@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Admin Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 30px;">
                    <h2 class="mb-2">Yönetim Paneli</h2>
                    <p class="text-muted">Sistem istatistikleri ve yönetim araçları</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white text-center" style="padding: 30px;">
                    <i class="fa fa-briefcase fa-3x mb-3"></i>
                    <h3 class="mb-2">{{ $stats['total_jobs'] }}</h3>
                    <p class="mb-0">Toplam İş İlanı</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body text-white text-center" style="padding: 30px;">
                    <i class="fa fa-check-circle fa-3x mb-3"></i>
                    <h3 class="mb-2">{{ $stats['active_jobs'] }}</h3>
                    <p class="mb-0">Aktif İlanlar</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body text-white text-center" style="padding: 30px;">
                    <i class="fa fa-building fa-3x mb-3"></i>
                    <h3 class="mb-2">{{ $stats['total_companies'] }}</h3>
                    <p class="mb-0">Şirket Sayısı</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <div class="card-body text-white text-center" style="padding: 30px;">
                    <i class="fa fa-clock-o fa-3x mb-3"></i>
                    <h3 class="mb-2">{{ $stats['pending_applications'] }}</h3>
                    <p class="mb-0">Bekleyen Başvuru</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body" style="padding: 30px;">
                    <h4 class="mb-4">Hızlı İşlemler</h4>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-primary btn-lg w-100">
                                <i class="fa fa-briefcase fa-2x mb-2 d-block"></i>
                                İş İlanlarını Yönet
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-success btn-lg w-100">
                                <i class="fa fa-users fa-2x mb-2 d-block"></i>
                                Başvuruları Yönet
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-info btn-lg w-100">
                                <i class="fa fa-building fa-2x mb-2 d-block"></i>
                                Firma Yönetimi
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('jobs.index') }}" class="btn btn-outline-warning btn-lg w-100">
                                <i class="fa fa-eye fa-2x mb-2 d-block"></i>
                                Siteyi Görüntüle
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center" style="padding: 20px;">
                    <h5 class="mb-0">Son İş İlanları</h5>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-sm btn-primary">Tümünü Gör</a>
                </div>
                <div class="card-body" style="padding: 20px;">
                    @foreach($recent_jobs as $job)
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div>
                            <h6 class="mb-1">{{ $job->title }}</h6>
                            <small class="text-muted">{{ $job->company_name }}</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">{{ $job->created_at->format('d.m.Y') }}</small>
                            @if($job->is_active)
                                <br><span class="badge bg-success">Aktif</span>
                            @else
                                <br><span class="badge bg-secondary">Pasif</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center" style="padding: 20px;">
                    <h5 class="mb-0">Son Başvurular</h5>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-primary">Tümünü Gör</a>
                </div>
                <div class="card-body" style="padding: 20px;">
                    @foreach($recent_applications as $application)
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div>
                            <h6 class="mb-1">{{ $application->applicant_name }}</h6>
                            <small class="text-muted">{{ $application->jobListing->title }}</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">{{ $application->created_at->format('d.m.Y') }}</small>
                            <br>
                            @switch($application->status)
                                @case('pending')
                                    <span class="badge bg-warning">Bekliyor</span>
                                    @break
                                @case('accepted')
                                    <span class="badge bg-success">Kabul</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger">Red</span>
                                    @break
                                @default
                                    <span class="badge bg-info">{{ $application->status }}</span>
                            @endswitch
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection