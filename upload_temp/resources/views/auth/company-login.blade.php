@extends('layouts.main')

@section('title', 'Firma Girişi')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Firma Girişi</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa fa-building me-2"></i>Firma Girişi</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="company">
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Firma E-posta Adresi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Beni Hatırla</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-sign-in me-2"></i>Firma Girişi
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Firma kaydınız yok mu? <a href="{{ route('company.register') }}">Firma Kaydı</a></p>
                        <p><a href="{{ route('jobseeker.login') }}">İş Arayan Girişi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection