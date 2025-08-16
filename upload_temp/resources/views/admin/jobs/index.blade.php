@extends('layouts.main')

@section('title', 'Admin - İş İlanları')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>İş İlanları Yönetimi</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-2">İş İlanları Yönetimi</h2>
                    <p class="text-muted">Tüm iş ilanlarını görüntüleyin ve yönetin</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left me-2"></i>Dashboard'a Dön
                </a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body" style="padding: 30px;">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Başlık</th>
                                    <th>Şirket</th>
                                    <th>Lokasyon</th>
                                    <th>Durum</th>
                                    <th>Görüntülenme</th>
                                    <th>Başvuru</th>
                                    <th>Tarih</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>
                                        <a href="{{ route('jobs.show', $job) }}" target="_blank">
                                            {{ $job->title }}
                                        </a>
                                        @if($job->is_featured)
                                            <span class="badge bg-warning text-dark">Öne Çıkan</span>
                                        @endif
                                        @if($job->is_urgent)
                                            <span class="badge bg-danger">Acil</span>
                                        @endif
                                    </td>
                                    <td>{{ $job->company_name }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>
                                        @if($job->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Pasif</span>
                                        @endif
                                    </td>
                                    <td>{{ $job->view_count }}</td>
                                    <td>{{ $job->application_count }}</td>
                                    <td>{{ $job->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-sm btn-info">Görüntüle</a>
                                            <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Henüz iş ilanı yok.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($jobs->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $jobs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection