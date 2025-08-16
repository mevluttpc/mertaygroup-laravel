@extends('layouts.main')

@section('title', 'Firma Kaydı')

@section('content')
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Firma Kaydı</h3>
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
                    <h4><i class="fa fa-building me-2"></i>Firma Kaydı</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="company">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Firma Adı</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                                           id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Yetkili Kişi</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Firma E-posta</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_number" class="form-label">Vergi Numarası</label>
                                    <input type="text" class="form-control @error('tax_number') is-invalid @enderror" 
                                           id="tax_number" name="tax_number" value="{{ old('tax_number') }}">
                                    @error('tax_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sector" class="form-label">Sektör</label>
                                    <select class="form-select @error('sector') is-invalid @enderror" id="sector" name="sector">
                                        <option value="">Seçiniz</option>
                                        <option value="Bilgi Teknolojileri" {{ old('sector') == 'Bilgi Teknolojileri' ? 'selected' : '' }}>Bilgi Teknolojileri</option>
                                        <option value="Finans" {{ old('sector') == 'Finans' ? 'selected' : '' }}>Finans</option>
                                        <option value="Sağlık" {{ old('sector') == 'Sağlık' ? 'selected' : '' }}>Sağlık</option>
                                        <option value="Eğitim" {{ old('sector') == 'Eğitim' ? 'selected' : '' }}>Eğitim</option>
                                        <option value="İnşaat" {{ old('sector') == 'İnşaat' ? 'selected' : '' }}>İnşaat</option>
                                        <option value="Turizm" {{ old('sector') == 'Turizm' ? 'selected' : '' }}>Turizm</option>
                                        <option value="Otomotiv" {{ old('sector') == 'Otomotiv' ? 'selected' : '' }}>Otomotiv</option>
                                        <option value="Tekstil" {{ old('sector') == 'Tekstil' ? 'selected' : '' }}>Tekstil</option>
                                        <option value="Gıda" {{ old('sector') == 'Gıda' ? 'selected' : '' }}>Gıda</option>
                                        <option value="Diğer" {{ old('sector') == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                                    </select>
                                    @error('sector')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employee_count" class="form-label">Çalışan Sayısı</label>
                                    <select class="form-select @error('employee_count') is-invalid @enderror" id="employee_count" name="employee_count">
                                        <option value="">Seçiniz</option>
                                        <option value="1" {{ old('employee_count') == '1' ? 'selected' : '' }}>1-10</option>
                                        <option value="2" {{ old('employee_count') == '2' ? 'selected' : '' }}>11-50</option>
                                        <option value="3" {{ old('employee_count') == '3' ? 'selected' : '' }}>51-100</option>
                                        <option value="4" {{ old('employee_count') == '4' ? 'selected' : '' }}>101-500</option>
                                        <option value="5" {{ old('employee_count') == '5' ? 'selected' : '' }}>500+</option>
                                    </select>
                                    @error('employee_count')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="founded_year" class="form-label">Kuruluş Yılı</label>
                                    <input type="number" class="form-control @error('founded_year') is-invalid @enderror" 
                                           id="founded_year" name="founded_year" value="{{ old('founded_year') }}" min="1900" max="{{ date('Y') }}">
                                    @error('founded_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                   id="website" name="website" value="{{ old('website') }}" placeholder="https://www.sirketiniz.com">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Firma Adresi</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="2" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="company_description" class="form-label">Firma Hakkında</label>
                            <textarea class="form-control @error('company_description') is-invalid @enderror" 
                                      id="company_description" name="company_description" rows="4" placeholder="Firmanızı kısaca tanıtın">{{ old('company_description') }}</textarea>
                            @error('company_description')
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
                                <i class="fa fa-building me-2"></i>Firma Kaydı Oluştur
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Zaten firma kaydınız var mı? <a href="{{ route('company.login') }}">Firma Girişi</a></p>
                        <p><a href="{{ route('jobseeker.register') }}">İş Arayan Kaydı</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection