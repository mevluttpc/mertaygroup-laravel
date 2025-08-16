@extends('layouts.main')

@section('title', $company->name)

@section('content')
<!-- company_profile_area -->
<div class="company_profile_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="company_profile_info white-bg">
                    <div class="company_header d-flex align-items-center mb-4">
                        <div class="company_logo me-4">
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <img src="{{ asset('img/svg_icon/1.svg') }}" alt="{{ $company->name }}" style="width: 80px;">
                            @endif
                        </div>
                        <div class="company_details">
                            <h2>{{ $company->name }}</h2>
                            @if($company->is_verified)
                                <span class="badge bg-success">
                                    <i class="fa fa-check"></i> Doğrulanmış Şirket
                                </span>
                            @endif
                            <div class="company_meta mt-2">
                                <span><i class="fa fa-map-marker"></i> {{ $company->location }}</span>
                                @if($company->industry)
                                    <span class="ms-3"><i class="fa fa-industry"></i> {{ $company->industry }}</span>
                                @endif
                                @if($company->size)
                                    <span class="ms-3"><i class="fa fa-users"></i> {{ $company->size }} çalışan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($company->description)
                    <div class="company_description mb-4">
                        <h4>Şirket Hakkında</h4>
                        <p>{{ $company->description }}</p>
                    </div>
                    @endif

                    <div class="company_jobs">
                        <h4>Açık Pozisyonlar ({{ $company->jobListings->count() }})</h4>
                        @forelse($company->jobListings as $job)
                        <div class="single_jobs white-bg d-flex justify-content-between mb-3">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="{{ route('jobs.show', $job) }}">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p><i class="fa fa-clock-o"></i> 
                                                @switch($job->job_type)
                                                    @case('full-time') Tam Zamanlı @break
                                                    @case('part-time') Yarı Zamanlı @break
                                                    @case('contract') Sözleşmeli @break
                                                @endswitch
                                            </p>
                                        </div>
                                        @if($job->work_type !== 'office')
                                            <div class="location">
                                                <p><i class="fa fa-laptop"></i> 
                                                    @switch($job->work_type)
                                                        @case('remote') Uzaktan @break
                                                        @case('hybrid') Hibrit @break
                                                    @endswitch
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a href="{{ route('jobs.show', $job) }}" class="boxed-btn3">Detaylar</a>
                                </div>
                                <div class="date">
                                    <p>{{ $job->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted">Şu anda açık pozisyon bulunmuyor.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="company_sidebar white-bg">
                    <div class="company_contact">
                        <h4>İletişim Bilgileri</h4>
                        <ul class="list-unstyled">
                            @if($company->website)
                            <li class="mb-2">
                                <i class="fa fa-globe"></i>
                                <a href="{{ $company->website }}" target="_blank">Web Sitesi</a>
                            </li>
                            @endif
                            <li class="mb-2">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                            </li>
                            @if($company->phone)
                            <li class="mb-2">
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                            </li>
                            @endif
                            @if($company->address)
                            <li class="mb-2">
                                <i class="fa fa-map-marker"></i>
                                {{ $company->address }}
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                
                <div class="mt-3">
                    <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="fa fa-arrow-left"></i> Tüm Şirketler
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection