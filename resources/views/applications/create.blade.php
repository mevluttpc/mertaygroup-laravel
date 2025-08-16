@extends('layouts.main')

@section('title', $job->title . ' - Başvuru Yap')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>İş Başvurusu</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- apply_job_area -->
<div class="apply_job_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="apply_job_form white-bg">
                    <h4>{{ $job->title }} Pozisyonuna Başvur</h4>
                    <p class="text-muted mb-4">{{ $job->company_name }} - {{ $job->location }}</p>
                    
                    <form action="{{ route('applications.store', $job) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input_field">
                                    <label for="applicant_name">Ad Soyad *</label>
                                    <input type="text" id="applicant_name" name="applicant_name" 
                                           value="{{ old('applicant_name') }}" required
                                           class="@error('applicant_name') is-invalid @enderror">
                                    @error('applicant_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_field">
                                    <label for="applicant_email">E-posta *</label>
                                    <input type="email" id="applicant_email" name="applicant_email" 
                                           value="{{ old('applicant_email') }}" required
                                           class="@error('applicant_email') is-invalid @enderror">
                                    @error('applicant_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="input_field">
                            <label for="applicant_phone">Telefon</label>
                            <input type="tel" id="applicant_phone" name="applicant_phone" 
                                   value="{{ old('applicant_phone') }}"
                                   class="@error('applicant_phone') is-invalid @enderror">
                            @error('applicant_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="input_field">
                            <label for="cv">CV Yükle (PDF, DOC, DOCX - Max 5MB)</label>
                            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx"
                                   class="@error('cv') is-invalid @enderror">
                            @error('cv')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="input_field">
                            <label for="cover_letter">Ön Yazı</label>
                            <textarea id="cover_letter" name="cover_letter" rows="6" 
                                      placeholder="Neden bu pozisyon için uygun olduğunuzu açıklayın..."
                                      class="@error('cover_letter') is-invalid @enderror">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="submit_btn">
                            <button type="submit" class="boxed-btn3 w-100">Başvuruyu Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="job_summary white-bg">
                    <div class="summery_header">
                        <h3>İş Özeti</h3>
                    </div>
                    <div class="summery_body">
                        <ul>
                            <li>Pozisyon: <span>{{ $job->title }}</span></li>
                            <li>Şirket: <span>{{ $job->company_name }}</span></li>
                            <li>Lokasyon: <span>{{ $job->location }}</span></li>
                            <li>İş Türü: <span>
                                @switch($job->job_type)
                                    @case('full-time') Tam Zamanlı @break
                                    @case('part-time') Yarı Zamanlı @break
                                    @case('contract') Sözleşmeli @break
                                @endswitch
                            </span></li>
                            @if($job->work_type !== 'office')
                            <li>Çalışma Şekli: <span>
                                @switch($job->work_type)
                                    @case('remote') Uzaktan @break
                                    @case('hybrid') Hibrit @break
                                    @case('office') Ofis @break
                                @endswitch
                            </span></li>
                            @endif
                            @if($job->salary_min || $job->salary_max)
                            <li>Maaş: <span>
                                @if($job->salary_min && $job->salary_max)
                                    {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }} TL
                                @elseif($job->salary_min)
                                    {{ number_format($job->salary_min) }} TL+
                                @else
                                    {{ number_format($job->salary_max) }} TL'ye kadar
                                @endif
                            </span></li>
                            @endif
                            @if($job->deadline)
                            <li>Son Başvuru: <span>{{ $job->deadline->format('d.m.Y') }}</span></li>
                            @endif
                        </ul>
                        <div class="apply_btn">
                            <a href="{{ route('jobs.show', $job) }}" class="boxed-btn3 w-100">İlanı Görüntüle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection