@extends('layouts.main')

@section('title', 'Şirketler')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Şirketler</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- companies_area_start -->
<div class="top_companies_area">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-6">
                <div class="section_title">
                    <h3>{{ $companies->total() }} Şirket</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($companies as $company)
            <div class="col-lg-4 col-xl-3 col-md-6 mb-4">
                <div class="single_company">
                    <div class="thumb">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}">
                        @else
                            <img src="{{ asset('img/svg_icon/1.svg') }}" alt="{{ $company->name }}">
                        @endif
                    </div>
                    <a href="{{ route('companies.show', $company) }}">
                        <h3>{{ $company->name }}</h3>
                    </a>
                    <p><span>{{ $company->job_listings_count }}</span> Açık Pozisyon</p>
                    <div class="company-info mt-2">
                        <small class="text-muted">
                            <i class="fa fa-map-marker"></i> {{ $company->location }}
                            @if($company->industry)
                                | {{ $company->industry }}
                            @endif
                        </small>
                    </div>
                    @if($company->is_verified)
                        <span class="badge bg-success mt-2">
                            <i class="fa fa-check"></i> Doğrulanmış
                        </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
        @if($companies->hasPages())
        <div class="row">
            <div class="col-lg-12">
                <div class="pagination_wrap">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection