@extends('layouts.main')

@section('title', 'Admin - Başvurular')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Başvuru Yönetimi</h3>
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
                    <h2 class="mb-2">Başvuru Yönetimi</h2>
                    <p class="text-muted">Tüm iş başvurularını görüntüleyin ve yönetin</p>
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
                                    <th>Başvuran</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>İş İlanı</th>
                                    <th>Durum</th>
                                    <th>CV</th>
                                    <th>Tarih</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->applicant_name }}</td>
                                    <td>
                                        <a href="mailto:{{ $application->applicant_email }}">
                                            {{ $application->applicant_email }}
                                        </a>
                                    </td>
                                    <td>{{ $application->applicant_phone ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('jobs.show', $application->jobListing) }}" target="_blank">
                                            {{ $application->jobListing->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.applications.update', $application) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Bekliyor</option>
                                                <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>İncelendi</option>
                                                <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Kabul</option>
                                                <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Red</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        @if($application->cv_path)
                                            <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                CV İndir
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.applications.show', $application) }}" class="btn btn-sm btn-info">Detay</a>
                                            <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Henüz başvuru yok.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($applications->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection