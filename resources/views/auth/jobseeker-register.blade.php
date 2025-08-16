@extends('layouts.main')

@section('title', 'İş Arayan Kaydı')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>İş Arayan Kaydı</h3>
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
                    <h4><i class="fa fa-user me-2"></i>İş Arayan Kaydı</h4>
                </div>
                <div class="card-body">
                    <!-- Google ile Kayıt -->
                    <div class="d-grid mb-4">
                        <a href="{{ route('google.login') }}" class="btn btn-google btn-lg">
                            <svg width="18" height="18" viewBox="0 0 24 24" class="me-2">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Google ile Kayıt Ol
                        </a>
                    </div>
                    
                    <div class="text-center mb-3">
                        <div class="divider-line">
                            <span class="divider-text">veya form ile</span>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="jobseeker">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta Adresi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">Doğum Tarihi</label>
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" 
                                           id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Cinsiyet</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Seçiniz</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Erkek</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Kadın</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Diğer</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="education_level" class="form-label">Eğitim Seviyesi</label>
                                    <select class="form-select @error('education_level') is-invalid @enderror" id="education_level" name="education_level">
                                        <option value="">Seçiniz</option>
                                        <option value="İlkokul" {{ old('education_level') == 'İlkokul' ? 'selected' : '' }}>İlkokul</option>
                                        <option value="Ortaokul" {{ old('education_level') == 'Ortaokul' ? 'selected' : '' }}>Ortaokul</option>
                                        <option value="Lise" {{ old('education_level') == 'Lise' ? 'selected' : '' }}>Lise</option>
                                        <option value="Ön Lisans" {{ old('education_level') == 'Ön Lisans' ? 'selected' : '' }}>Ön Lisans</option>
                                        <option value="Lisans" {{ old('education_level') == 'Lisans' ? 'selected' : '' }}>Lisans</option>
                                        <option value="Yüksek Lisans" {{ old('education_level') == 'Yüksek Lisans' ? 'selected' : '' }}>Yüksek Lisans</option>
                                        <option value="Doktora" {{ old('education_level') == 'Doktora' ? 'selected' : '' }}>Doktora</option>
                                    </select>
                                    @error('education_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="university" class="form-label">Üniversite</label>
                                    <input type="text" class="form-control @error('university') is-invalid @enderror" 
                                           id="university" name="university" value="{{ old('university') }}">
                                    @error('university')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Bölüm</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror" 
                                           id="department" name="department" value="{{ old('department') }}">
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="graduation_year" class="form-label">Mezuniyet Yılı</label>
                                    <input type="number" class="form-control @error('graduation_year') is-invalid @enderror" 
                                           id="graduation_year" name="graduation_year" value="{{ old('graduation_year') }}" min="1950" max="{{ date('Y') + 10 }}">
                                    @error('graduation_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="linkedin_url" class="form-label">LinkedIn Profili</label>
                                    <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror" 
                                           id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/...">
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="skills" class="form-label">Yetenekler</label>
                            <textarea class="form-control @error('skills') is-invalid @enderror" 
                                      id="skills" name="skills" rows="2" placeholder="Örn: JavaScript, PHP, MySQL, Photoshop">{{ old('skills') }}</textarea>
                            @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="experience_years" class="form-label">İş Deneyimi (Yıl)</label>
                            <select class="form-select @error('experience_years') is-invalid @enderror" id="experience_years" name="experience_years">
                                <option value="">Seçiniz</option>
                                <option value="0" {{ old('experience_years') == '0' ? 'selected' : '' }}>Yeni mezun</option>
                                <option value="1" {{ old('experience_years') == '1' ? 'selected' : '' }}>1 yıl</option>
                                <option value="2" {{ old('experience_years') == '2' ? 'selected' : '' }}>2 yıl</option>
                                <option value="3" {{ old('experience_years') == '3' ? 'selected' : '' }}>3 yıl</option>
                                <option value="4" {{ old('experience_years') == '4' ? 'selected' : '' }}>4 yıl</option>
                                <option value="5" {{ old('experience_years') == '5' ? 'selected' : '' }}>5 yıl</option>
                                <option value="6-10" {{ old('experience_years') == '6-10' ? 'selected' : '' }}>6-10 yıl</option>
                                <option value="10+" {{ old('experience_years') == '10+' ? 'selected' : '' }}>10+ yıl</option>
                            </select>
                            @error('experience_years')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label">Deneyim Detayı</label>
                            <textarea class="form-control @error('experience') is-invalid @enderror" 
                                      id="experience" name="experience" rows="3" placeholder="İş deneyimlerinizi, çalıştığınız şirketleri ve pozisyonları kısaca açıklayın">{{ old('experience') }}</textarea>
                            @error('experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Şifre</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Şifre Tekrar</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fa fa-user-plus me-2"></i>Kayıt Ol
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Zaten hesabınız var mı? <a href="{{ route('jobseeker.login') }}">İş Arayan Girişi</a></p>
                        <p><a href="{{ route('company.register') }}">Firma Kaydı</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection