@extends('layouts.main')

@section('title', 'Favori İlanlarım')

@section('content')
<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Favori İlanlarım</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- favorites_area -->
<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg" style="border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="mb-0">{{ $favorites->total() }} Favori İlan</h4>
                                <p class="text-muted mb-0">Beğendiğiniz iş ilanlarınız</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Yeni İlanlar Keşfet
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row">
                        @forelse($favorites as $favorite)
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="{{ route('jobs.show', $favorite->jobListing) }}">
                                            <h4>{{ $favorite->jobListing->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p><i class="fa fa-map-marker"></i> {{ $favorite->jobListing->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p><i class="fa fa-clock-o"></i> 
                                                    @switch($favorite->jobListing->job_type)
                                                        @case('full-time') Tam Zamanlı @break
                                                        @case('part-time') Yarı Zamanlı @break
                                                        @case('contract') Sözleşmeli @break
                                                    @endswitch
                                                </p>
                                            </div>
                                        </div>
                                        <div class="company_name">
                                            <p><span>{{ $favorite->jobListing->company_name }}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <button class="heart_mark favorited" onclick="toggleFavorite({{ $favorite->jobListing->id }})">
                                            <i class="ti-heart"></i>
                                        </button>
                                        <a href="{{ route('jobs.show', $favorite->jobListing) }}" class="boxed-btn3">Detaylar</a>
                                    </div>
                                    <div class="date">
                                        <p>Favoriye Eklendi: {{ $favorite->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="single_jobs white-bg text-center p-5">
                                <h4>Henüz favori ilanınız yok</h4>
                                <p>İş ilanlarını görüntüleyerek favorilerinize ekleyebilirsiniz.</p>
                                <a href="{{ route('jobs.index') }}" class="boxed-btn3">İş İlanlarını Görüntüle</a>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>

                @if($favorites->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination_wrap">
                            {{ $favorites->links() }}
                        </div>
                    </div>
                </div>
                @endif
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
        if (!data.favorited) {
            location.reload(); // Favoriden çıkarıldığında sayfayı yenile
        }
    });
}
</script>
@endsection