@extends('layouts.main')

@section('title', 'Firma Yönetimi')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Firma Yönetimi</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Firma Kayıtları ({{ $companies->total() }})</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firma Adı</th>
                                    <th>Yetkili</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                        <strong>{{ $company->company_name ?: 'Belirtilmemiş' }}</strong>
                                        @if($company->address)
                                            <br><small class="text-muted">{{ Str::limit($company->address, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->phone ?: '-' }}</td>
                                    <td>{{ $company->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        @if($company->is_approved)
                                            <span class="badge bg-success">Onaylı</span>
                                        @else
                                            <span class="badge bg-warning">Bekliyor</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($company->is_approved)
                                            <form method="POST" action="{{ route('admin.companies.reject', $company) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Firmayı reddetmek istediğinizden emin misiniz?')">
                                                    Reddet
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.companies.approve', $company) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Onayla
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.companies.reject', $company) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Firmayı reddetmek istediğinizden emin misiniz?')">
                                                    Reddet
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Henüz firma kaydı bulunmuyor</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($companies->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $companies->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection