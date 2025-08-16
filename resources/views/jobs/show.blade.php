@extends('layouts.main')

@section('title', $job->title)

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>İş İlan Detayı</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- job_details_area -->
<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <h4>{{ $job->title }}</h4>
                                @if($job->company)
                                    <a href="{{ route('companies.show', $job->company) }}" class="company-link">
                                        <h5 class="text-primary">{{ $job->company->name }}</h5>
                                    </a>
                                @else
                                    <h5>{{ $job->company_name }}</h5>
                                @endif
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
                                @if($job->is_featured || $job->is_urgent)
                                    <div class="job_badges mt-2">
                                        @if($job->is_featured)
                                            <span class="badge bg-warning text-dark">
                                                <i class="fa fa-star"></i> Öne Çıkan
                                            </span>
                                        @endif
                                        @if($job->is_urgent)
                                            <span class="badge bg-danger">
                                                <i class="fa fa-exclamation"></i> Acil
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                @auth
                                    <button class="heart_mark {{ auth()->user()->hasFavorited($job) ? 'favorited' : '' }}" onclick="toggleFavorite({{ $job->id }})">
                                        <i class="ti-heart"></i>
                                    </button>
                                @else
                                    <a class="heart_mark" href="{{ route('login') }}"><i class="ti-heart"></i></a>
                                @endauth
                                <a href="{{ route('jobs.apply', $job) }}" class="boxed-btn3">Başvur</a>
                            </div>
                            <div class="date">
                                <p>İlan Tarihi: {{ $job->created_at->format('d M Y') }}</p>
                                @if($job->deadline)
                                    <p>Son Başvuru: {{ $job->deadline->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>İş Açıklaması</h4>
                        <p>{{ $job->description }}</p>
                    </div>
                    
                    @if($job->requirements)
                    <div class="single_wrap">
                        <h4>Gereksinimler</h4>
                        <p>{{ $job->requirements }}</p>
                    </div>
                    @endif
                    
                    @if($job->skills && count($job->skills) > 0)
                    <div class="single_wrap">
                        <h4>Gerekli Yetenekler</h4>
                        <div class="skills-tags">
                            @foreach($job->skills as $skill)
                                <span class="badge bg-light text-dark me-2 mb-2">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if($job->benefits && count($job->benefits) > 0)
                    <div class="single_wrap">
                        <h4>Yan Haklar</h4>
                        <ul>
                            @foreach($job->benefits as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>İş Özeti</h3>
                    </div>
                    <div class="summery_body">
                        <ul>
                            <li>Yayınlanma Tarihi: <span>{{ $job->created_at->format('d M Y') }}</span></li>
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
                            <li>Deneyim: <span>
                                @switch($job->experience_level)
                                    @case('entry') Başlangıç @break
                                    @case('mid') Orta @break
                                    @case('senior') Üst @break
                                @endswitch
                            </span></li>
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
                            <li>Son Başvuru: <span>{{ $job->deadline->format('d M Y') }}</span></li>
                            @endif
                            @if($job->category)
                            <li>Kategori: <span>{{ $job->category->name }}</span></li>
                            @endif
                            <li>Görüntülenme: <span>{{ $job->view_count }}</span></li>
                            <li>Başvuru Sayısı: <span>{{ $job->application_count }}</span></li>
                        </ul>
                        <div class="apply_btn">
                            <a href="{{ route('jobs.apply', $job) }}" class="boxed-btn3">Hemen Başvur</a>
                        </div>
                    </div>
                </div>
                
                <div class="share_wrap d-flex align-items-center">
                    <span>Paylaş:</span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFavorite(jobId) {
    fetch(`/jobs/${jobId}/favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        const heartButton = document.querySelector('.heart_mark');
        if (data.favorited) {
            heartButton.classList.add('favorited');
        } else {
            heartButton.classList.remove('favorited');
        }
    });
}
</script>
@endsection