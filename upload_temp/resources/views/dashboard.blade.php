@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 40px;">
                    <h2 class="mb-3">Hoş Geldiniz, {{ Auth::user()->name }}!</h2>
                    <p class="lead text-muted">Hesabınızı yönetmek ve iş fırsatlarını keşfetmek için aşağıdaki seçenekleri kullanabilirsiniz.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 30px;">
                    <div class="mb-4">
                        <i class="fa fa-heart" style="font-size: 48px; color: #e74c3c;"></i>
                    </div>
                    <h5 class="card-title mb-3">Favori İlanlarım</h5>
                    <p class="card-text text-muted mb-4">Beğendiğiniz iş ilanlarını görüntüleyin ve takip edin</p>
                    <a href="{{ route('favorites.index') }}" class="btn btn-primary btn-lg">Görüntüle</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 30px;">
                    <div class="mb-4">
                        <i class="fa fa-user" style="font-size: 48px; color: #3498db;"></i>
                    </div>
                    <h5 class="card-title mb-3">Profil Ayarları</h5>
                    <p class="card-text text-muted mb-4">Kişisel bilgilerinizi ve hesap ayarlarınızı güncelleyin</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg">Düzenle</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 30px;">
                    <div class="mb-4">
                        <i class="fa fa-briefcase" style="font-size: 48px; color: #27ae60;"></i>
                    </div>
                    <h5 class="card-title mb-3">İş İlanları</h5>
                    <p class="card-text text-muted mb-4">Binlerce iş fırsatı arasından size uygun olanı bulun</p>
                    <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-lg">Görüntüle</a>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center" style="padding: 40px;">
                    <h4 class="mb-3">Hemen İş Aramaya Başlayın!</h4>
                    <p class="text-muted mb-4">Türkiye'nin en büyük iş platformunda hayalinizdeki işi bulun.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-lg">
                            <i class="fa fa-search me-2"></i>İş Ara
                        </a>
                        <a href="{{ route('companies.index') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fa fa-building me-2"></i>Şirketleri İncele
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
