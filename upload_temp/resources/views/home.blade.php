@extends('layouts.main')

@section('title', 'MertayGroup İş İlanları - Türkiye\'nin En Büyük İş Platformu')

@section('content')
<!-- hero_search_area_start -->
<div class="hero_search_area">
    <div class="container">
        <div class="hero_content text-center">
            <h1 class="hero_title">Hayalinizdeki İşi Bulun</h1>
            <p class="hero_subtitle">{{ $totalJobs }}+ aktif iş ilanı arasından size en uygun olanı keşfedin</p>
        </div>
        
        <div class="hero_search_form">
            <div class="search_form_wrapper">
                <div class="row g-0">
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="search_input_group">
                            <i class="fa fa-search search_icon"></i>
                            <input type="text" placeholder="İş pozisyonu, şirket adı..." class="search_input" id="job_search">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="search_input_group location_group">
                            <button type="button" class="location_detect_btn" onclick="getCurrentLocation()" title="Konumumu Bul">
                                <i class="fa fa-crosshairs"></i>
                                <span>Konum</span>
                            </button>
                            <input type="text" placeholder="Şehir, ilçe..." class="search_input location_input" id="location_input" autocomplete="off">
                            <div class="location_suggestions" id="location_suggestions"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <button type="button" onclick="searchJobs()" class="search_btn">
                            <i class="fa fa-search"></i>
                            <span>İş Ara</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero_search_area_end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Türkiye'nin En Büyük İş Platformu</h5>
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Kariyerinizi İleriye Taşıyın</h3>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">MertayGroup ile profesyonel kariyerinizde yeni fırsatları keşfedin</p>
                        <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                            <a href="{{ route('jobs.index') }}" class="boxed-btn3">Hemen Başvur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        <img src="{{ asset('img/banner/illustration.png') }}" alt="">
    </div>
</div>
<!-- slider_area_end -->
        </div>
    </div>
</div>

<!-- popular_catagory_area_start -->
<div class="popular_catagory_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-40">
                    <h3>Popüler Kategoriler</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs.index') }}"><h4>Tasarım & Kreatif</h4></a>
                    <p><span>{{ $categories['design'] ?? 0 }}</span> Açık Pozisyon</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs.index') }}"><h4>Pazarlama</h4></a>
                    <p><span>{{ $categories['marketing'] ?? 0 }}</span> Açık Pozisyon</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs.index') }}"><h4>Yazılım & Teknoloji</h4></a>
                    <p><span>{{ $categories['software'] ?? 0 }}</span> Açık Pozisyon</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs.index') }}"><h4>Satış & Müşteri Hizmetleri</h4></a>
                    <p><span>{{ $categories['sales'] ?? 0 }}</span> Açık Pozisyon</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_catagory_area_end -->

<!-- job_listing_area_start -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Son İş İlanları</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="{{ route('jobs.index') }}" class="boxed-btn4">Tüm İlanları Gör</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                @foreach($recentJobs as $job)
                <div class="col-lg-12 col-md-12">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="{{ route('jobs.show', $job) }}"><h4>{{ $job->title }}</h4></a>
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
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <a class="heart_mark" href="#"><i class="ti-heart"></i></a>
                                <a href="{{ route('jobs.show', $job) }}" class="boxed-btn3">Detaylar</a>
                            </div>
                            <div class="date">
                                <p>İlan Tarihi: {{ $job->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end -->

<!-- job_searcing_wrap -->
<div class="job_searcing_wrap overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>İş mi Arıyorsunuz?</h3>
                    <p>Binlerce iş fırsatı arasından size en uygun olanı bulun</p>
                    <a href="{{ route('jobs.index') }}" class="boxed-btn3">İş İlanlarını İncele</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="searching_text">
                    <h3>Uzman mı Arıyorsunuz?</h3>
                    <p>Nitelikli adaylar arasından işinize en uygun olanı seçin</p>
                    <a href="{{ route('jobs.create') }}" class="boxed-btn3">İş İlanı Verin</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_searcing_wrap end -->

<script>
const turkishLocations = [
    'Adana', 'Seyhan', 'Yüreğir', 'Çukurova', 'Sarıçam', 'Aladağ', 'Ceyhan', 'Feke', 'İmamoğlu', 'Karaisali', 'Karataş', 'Kozan', 'Pozantı', 'Saimbeyli', 'Tufanbeyli', 'Yumurtalik',
    'Adıyaman', 'Merkez', 'Besni', 'Çelikhan', 'Gerger', 'Gölbaşı', 'Kahta', 'Samsat', 'Sincik', 'Tut',
    'Afyonkarahisar', 'Merkez', 'Bolvadin', 'Dinar', 'Emirdağ', 'Sandıklı', 'Sinanpaşa', 'Sultandağı', 'Suhut', 'Başmakçı', 'Bayat', 'Çay', 'Çobanlar', 'Dazkiri', 'Evciler', 'Hocalar', 'İhsaniye', 'İscehisar', 'Kızılören',
    'Ağrı', 'Merkez', 'Diyadin', 'Doğubayazıt', 'Eleskirt', 'Hamur', 'Patnos', 'Taşlıçay', 'Tutak',
    'Aksaray', 'Merkez', 'Ağaçören', 'Eskil', 'Gülağaç', 'Güzelyurt', 'Ortakoy', 'Sarıyahsi',
    'Amasya', 'Merkez', 'Göynücek', 'Gümüşhacıköy', 'Hamamozü', 'Merzifon', 'Suluova', 'Taşova',
    'Ankara', 'Çankaya', 'Keçiören', 'Mamak', 'Sincan', 'Yenimahalle', 'Altındağ', 'Etimesgut', 'Gölbaşı', 'Pursaklar', 'Akyurt', 'Ayas', 'Bala', 'Beypazarı', 'Çamlıdere', 'Çubuk', 'Elmadağ', 'Evren', 'Güdül', 'Haymana', 'Kalecik', 'Kazan', 'Kızılcahamam', 'Nallihan', 'Polatlı', 'Şereflikochisar',
    'Antalya', 'Kepez', 'Muratpaşa', 'Konyaaltı', 'Aksu', 'Döşemealtı', 'Akseki', 'Alanya', 'Demre', 'Elmali', 'Finike', 'Gazipaşa', 'Gündoğmuş', 'İbradi', 'Kaş', 'Kemer', 'Korkuteli', 'Kumluca', 'Manavgat', 'Serik',
    'Ardahan', 'Merkez', 'Çıldır', 'Damal', 'Göle', 'Hanak', 'Posof',
    'Artvin', 'Merkez', 'Ardanuç', 'Arhavi', 'Borçka', 'Hopa', 'Murgul', 'Savşat', 'Yusufeli',
    'Aydın', 'Efeler', 'Nazilli', 'Söke', 'Kuşadası', 'Didim', 'Bozdogan', 'Buharkent', 'Çine', 'Germencik', 'İncirliova', 'Karacasu', 'Karpuzlu', 'Koçarlı', 'Sultanhisar', 'Yenipazar',
    'Balıkesir', 'Merkez', 'Ayvalık', 'Bandırma', 'Edremit', 'Gönen', 'Havran', 'Susurluk', 'Balya', 'Bigadiç', 'Burhaniye', 'Dursunbey', 'Erdek', 'İvrindi', 'Kepsut', 'Manyas', 'Marmara', 'Savaştepe', 'Sındırgı',
    'Bartın', 'Merkez', 'Amasra', 'Kurucasile', 'Ulus',
    'Batman', 'Merkez', 'Besiri', 'Gerçüş', 'Hasankeyf', 'Kozluk', 'Sason',
    'Bayburt', 'Merkez', 'Aydıntepe', 'Demirozü',
    'Bilecik', 'Merkez', 'Bozüyük', 'Gölpazarı', 'İnhisar', 'Osmaneli', 'Pazaryeri', 'Soğut', 'Yenipazar',
    'Bingöl', 'Merkez', 'Adaklı', 'Genç', 'Karliova', 'Kiğı', 'Solhan', 'Yayladere', 'Yedisu',
    'Bitlis', 'Merkez', 'Adilcevaz', 'Ahlat', 'Güroymak', 'Hizan', 'Mutki', 'Tatvan',
    'Bolu', 'Merkez', 'Dörtdivan', 'Gerede', 'Goynük', 'Kıbrıscık', 'Mengen', 'Mudurnu', 'Seben', 'Yeniçağa',
    'Burdur', 'Merkez', 'Ağlasun', 'Altınyayla', 'Bucak', 'Çavdır', 'Çeltikçi', 'Gölhisar', 'Karamanlı', 'Kemer', 'Tefenni', 'Yeşilova',
    'Bursa', 'Osmangazi', 'Nilüfer', 'Yıldırım', 'Gürsu', 'Kestel', 'Büyükorhan', 'Gemlik', 'Harmancik', 'İnegöl', 'İznik', 'Karacabey', 'Keles', 'Mudanya', 'Mustafakemalpaşa', 'Orhaneli', 'Orhangazi', 'Yenişehir',
    'Çanakkale', 'Merkez', 'Biga', 'Gelibolu', 'Lapseki', 'Ayvalık', 'Bayramıç', 'Bozcaada', 'Can', 'Eceabat', 'Ezine', 'Gökçeada', 'Yenice',
    'Çankırı', 'Merkez', 'Atkaracalar', 'Bayramören', 'Çerkes', 'Eldivan', 'İlgaz', 'Kızılırmak', 'Korgun', 'Kurşunlu', 'Orta', 'Sabanozu', 'Yapraklı',
    'Çorum', 'Merkez', 'Alaca', 'Bayat', 'Boğazkale', 'Dodurga', 'İskilip', 'Kargı', 'Laçin', 'Mecitözü', 'Oğuzlar', 'Ortakoy', 'Osmancık', 'Sungurlu', 'Uğurludag',
    'Denizli', 'Merkezefendi', 'Pamukkale', 'Acıpayam', 'Babadağ', 'Baklan', 'Bekilli', 'Beyağaç', 'Bozkurt', 'Buldan', 'Çal', 'Çameli', 'Çardak', 'Çivril', 'Güney', 'Honaz', 'Kale', 'Sarayköy', 'Serinhisar', 'Tavas',
    'Diyarbakır', 'Bağlar', 'Kayapınar', 'Sur', 'Yenişehir', 'Bismil', 'Çermik', 'Çınar', 'Çüngüş', 'Dicle', 'Eğil', 'Ergani', 'Hani', 'Hazro', 'Kocaköy', 'Kulp', 'Lice', 'Silvan',
    'Düzce', 'Merkez', 'Akakoca', 'Cumayeri', 'Çilimli', 'Gölyaka', 'Gümüşova', 'Kaynaşlı', 'Yığılca',
    'Edirne', 'Merkez', 'Enez', 'Havsa', 'İpsala', 'Kesan', 'Lalapasa', 'Meriç', 'Suloğlu', 'Uzunköprü',
    'Elazığ', 'Merkez', 'Ağın', 'Alacakaya', 'Arıcak', 'Baskıl', 'Karakocan', 'Keban', 'Kovancılar', 'Maden', 'Palu', 'Sivrice',
    'Erzincan', 'Merkez', 'Çayırlı', 'İliç', 'Kemah', 'Kemaliye', 'Otlukbeli', 'Refahiye', 'Tercan', 'Uzumlu',
    'Erzurum', 'Aziziye', 'Palandoken', 'Yakutiye', 'Askale', 'Çat', 'Hinis', 'Horasan', 'İspir', 'Karacoban', 'Karayazı', 'Köprüköy', 'Narman', 'Oltu', 'Olur', 'Pasinler', 'Pazaryolu', 'Şenkaya', 'Tekman', 'Tortum', 'Uzundere',
    'Eskişehir', 'Odunpazarı', 'Tepebaşı', 'Alpu', 'Beylikova', 'Çifteler', 'Günnüköy', 'Han', 'İnönü', 'Mahmudiye', 'Mihalgazi', 'Mihalıccık', 'Sarıcakaya', 'Seyitgazi', 'Sivrihisar',
    'Gaziantep', 'Şahinbey', 'Şehitkamil', 'Araban', 'İslahiye', 'Karkamış', 'Nizip', 'Nurdağı', 'Oğuzeli', 'Yavuzeli',
    'Giresun', 'Merkez', 'Alucra', 'Bulancak', 'Çamoluk', 'Çanakçı', 'Dereli', 'Doğankent', 'Espiye', 'Eynesil', 'Görele', 'Güçe', 'Keşap', 'Piraziz', 'Sebinkarahisar', 'Tirebolu', 'Yağlıdere',
    'Gümüşhane', 'Merkez', 'Kelkit', 'Köse', 'Kurtun', 'Şiran', 'Torul',
    'Hakkâri', 'Merkez', 'Çukurca', 'Derecik', 'Şemdinli', 'Yüksekova',
    'Hatay', 'Antakya', 'Defne', 'Arsuz', 'Dortyol', 'Erzin', 'Hassa', 'İskenderun', 'Kırıkhan', 'Kumlu', 'Payas', 'Reyhanlı', 'Samandağ', 'Yayladağı', 'Altınözü', 'Belen',
    'Iğdır', 'Merkez', 'Aralık', 'Karakoyunlu', 'Tuzluca',
    'Isparta', 'Merkez', 'Aksu', 'Atabey', 'Eğirdir', 'Gelendost', 'Gönen', 'Keciborü', 'Şenirkent', 'Sütçüler', 'Şarkıkaraagac', 'Uluborlu', 'Yalvaç', 'Yenisarbademli',
    'İstanbul', 'Adalar', 'Arnavutköy', 'Ataşehir', 'Avcılar', 'Bağcılar', 'Bahçelievler', 'Bakırköy', 'Başakşehir', 'Bayrampaşa', 'Beşiktaş', 'Beykoz', 'Beylikdüzü', 'Beyoğlu', 'Büyükçekmece', 'Catalca', 'Çekmeköy', 'Esenler', 'Esenyurt', 'Eyüpsultan', 'Fatih', 'Gaziosmanpaşa', 'Güngören', 'Kadıköy', 'Kağıthane', 'Kartal', 'Küçükçekmece', 'Maltepe', 'Pendik', 'Sancaktepe', 'Sarıyer', 'Silivri', 'Sultanbeyli', 'Sultangazi', 'Şile', 'Şişli', 'Tuzla', 'Ümraniye', 'Üsküdar', 'Zeytinburnu',
    'İzmir', 'Balçova', 'Bayraklı', 'Bornova', 'Buca', 'Çiğli', 'Gaziemir', 'Güzelbağçe', 'Karabaglar', 'Karşıyaka', 'Konak', 'Narlidere', 'Aliaga', 'Bayındır', 'Bergama', 'Beydag', 'Çeşme', 'Dikili', 'Foça', 'Karaburun', 'Kemalpasa', 'Kınık', 'Kiraz', 'Menderes', 'Menemen', 'Ödemiş', 'Seferihisar', 'Selçuk', 'Tire', 'Torbalı', 'Urla',
    'Kahramanmaraş', 'Dulkadiroğlu', 'OnikiŞubat', 'Afşin', 'Andırın', 'Çağlayancerit', 'Ekinözü', 'Elbistan', 'Göksun', 'Nurhak', 'Pazarcık', 'Türkoğlu',
    'Karabük', 'Merkez', 'Eflani', 'Eskipazar', 'Ovacık', 'Safranbolu', 'Yenice',
    'Karaman', 'Merkez', 'Ayrancı', 'Başyayla', 'Ermenek', 'Kazımkarabekir', 'Sarıveliler',
    'Kars', 'Merkez', 'Akyaka', 'Arpaçay', 'Digor', 'Kağızman', 'Sarıkamış', 'Selim', 'Susuz',
    'Kastamonu', 'Merkez', 'Abana', 'Ağlıasma', 'Araç', 'Azdavay', 'Bozkurt', 'Cide', 'Catalzeytin', 'Devrekani', 'Doğanyurt', 'Hanonu', 'İhsangazi', 'İnebolu', 'Küre', 'Pınarbaşı', 'Seydiler', 'Taşköprü', 'Tosya',
    'Kayseri', 'Kocasinan', 'Melikgazi', 'Talas', 'Akkışla', 'Bunyan', 'Develi', 'Felahiye', 'Hacılar', 'İncesu', 'Özvatan', 'Pınarbaşı', 'Sarıoğlan', 'Sarız', 'Tomarza', 'Yahyalı', 'Yeşilhisar',
    'Kırıkkale', 'Merkez', 'Bahşili', 'Balışeyh', 'Çelebi', 'Delice', 'Karakeçili', 'Keskin', 'Sulakyurt', 'Yahsihan',
    'Kırklareli', 'Merkez', 'Babaeski', 'Demirköy', 'Kofcaz', 'Lüleburgaz', 'Pehlivanköy', 'Pınarhisar', 'Vize',
    'Kırşehir', 'Merkez', 'Akçakent', 'Akpınar', 'Boztepe', 'Çiçekdağı', 'Kaman', 'Muçur',
    'Kilis', 'Merkez', 'Elbeyli', 'Musabeyli', 'Polateli',
    'Kocaeli', 'İzmit', 'Başisköy', 'Çayırova', 'Darıca', 'Derince', 'Dilovasi', 'Gebze', 'Gölcük', 'Kandıra', 'Karamursel', 'Kartepe', 'Körfez',
    'Konya', 'Karatay', 'Meram', 'Selçuklu', 'Ahirli', 'Akören', 'Akşehir', 'Altınekin', 'Beyşehir', 'Bozkır', 'Cihanbeyli', 'Çeltik', 'Çumra', 'Derbent', 'Derebucak', 'Doğanhisar', 'Emirgazi', 'Ereğli', 'Güneysinir', 'Hadim', 'Halkapinar', 'Hüyük', 'İlgin', 'Kadınhanı', 'Karapınar', 'Kulu', 'Sarayonu', 'Seydisehir', 'Taşkent', 'Tuzlukcu', 'Yalihüyük', 'Yunak',
    'Kütahya', 'Merkez', 'Altıntaş', 'Aslanapa', 'Çavdarhisar', 'Domaniç', 'Dumlupınar', 'Emet', 'Gediz', 'Hisarçık', 'Pazarlar', 'Simav', 'Şaphane', 'Tavşanlı',
    'Malatya', 'Battalgazi', 'Yeşilyurt', 'Akçadağ', 'Arapgir', 'Arguvan', 'Darende', 'Doğanşehir', 'Doğanyol', 'Hekimhan', 'Kale', 'Kuluncak', 'Pütürge', 'Yazihan',
    'Manisa', 'Merkez', 'Akhisar', 'Alaşehir', 'Demirci', 'Gölmarmara', 'Gördes', 'Kırkağaç', 'Köprübaşı', 'Kula', 'Salihli', 'Sarıgöl', 'Saruhanlı', 'Selendi', 'Soma', 'Turgutlu', 'Ahmetli',
    'Mardin', 'Artuklu', 'Dargeçit', 'Derik', 'Kızıltepe', 'Mazidağı', 'Midyat', 'Nusaybin', 'Ömerli', 'Savur', 'Yeşilli',
    'Mersin', 'Akdeniz', 'Mezitli', 'Toroslar', 'Yenişehir', 'Anamur', 'Aydıncık', 'Bozyazı', 'Çamlıyayla', 'Erdemli', 'Gülnar', 'Mut', 'Silifke', 'Tarsus',
    'Muğla', 'Menteşe', 'Bodrum', 'Dalaman', 'Datça', 'Fethiye', 'Kavaklıdere', 'Köyceğiz', 'Marmaris', 'Milas', 'Ortaca', 'Seydikemer', 'Ula', 'Yatagan',
    'Muş', 'Merkez', 'Bulanık', 'Hasköy', 'Korkut', 'Malazgirt', 'Varto',
    'Nevşehir', 'Merkez', 'Acıgöl', 'Avanos', 'Derinkuyu', 'Gülşehir', 'Hacıbektaş', 'Kozaklı', 'Ürgüp',
    'Niğde', 'Merkez', 'Altunhisar', 'Bor', 'Çamardı', 'Çiftlik', 'Ulukışla',
    'Ordu', 'Altınordu', 'Akkuş', 'Aybastı', 'Çamaş', 'Çatalpınar', 'Çay', 'Gölköy', 'Gülyali', 'Gürgentepe', 'İkizce', 'Kabaduz', 'Kabataş', 'Korgan', 'Kumru', 'Mesudiye', 'Persembe', 'Piraziz', 'Ulubey', 'Ünye',
    'Osmaniye', 'Merkez', 'Bahçe', 'Düzici', 'Hasanbeyli', 'Kadirli', 'Sümbaş', 'Toprakkale',
    'Rize', 'Merkez', 'Ardeşen', 'Çamlihemsin', 'Çayeli', 'Derepazarı', 'Fındıklı', 'Güneysu', 'Hemsin', 'İkizdere', 'İyidere', 'Kalkandere', 'Pazar',
    'Sakarya', 'Adapazarı', 'Arifiye', 'Erenler', 'Serdivan', 'Akyazı', 'Ferizli', 'Geyve', 'Hendek', 'Karapürçek', 'Karasu', 'Kaynarca', 'Kocaali', 'Pamukova', 'Sapanca', 'Soğutlu', 'Taraklı',
    'Samsun', 'Atakum', 'Canik', 'İlkadım', 'Tekkeköy', 'Alaçam', 'Asarçık', 'Ayvacık', 'Bafra', 'Çarşamba', 'Havza', 'Kavak', 'Ladik', 'Ondokuzmayıs', 'Salipazarı', 'Terme', 'Vezirköprü', 'Yakakent',
    'Siirt', 'Merkez', 'Aydınlar', 'Baykan', 'Eruh', 'Kurtalan', 'Pervari', 'Sirvan',
    'Sinop', 'Merkez', 'Ayancık', 'Boyabat', 'Dikmen', 'Duragan', 'Erfelek', 'Gerze', 'Saraydüzü', 'Türkeli',
    'Sivas', 'Merkez', 'Akıncılar', 'Altınyayla', 'Divriği', 'Doğansar', 'Gemerek', 'Gölova', 'Hafik', 'İmranlı', 'Kangal', 'Koyulhisar', 'Süşehri', 'Şarkışla', 'Ulaş', 'Yıldızeli', 'Zara', 'Gürün',
    'Şanlıurfa', 'Eyyubiye', 'Haliliye', 'Karakopru', 'Akcakale', 'Birecik', 'Bozova', 'Ceylanpınar', 'Halfeti', 'Harran', 'Hilvan', 'Siverek', 'Suruç', 'Viranşehir',
    'Şırnak', 'Merkez', 'Beytuşşebap', 'Cizre', 'Güçlükonak', 'İdil', 'Silopi', 'Uludere',
    'Tekirdağ', 'Süleymanpaşa', 'Çerkezköy', 'Çorlu', 'Ergene', 'Hayrabolu', 'Kapaklı', 'Malkara', 'Marmaraereğlisi', 'Muratlı', 'Saray', 'Şarköy',
    'Tokat', 'Merkez', 'Almus', 'Artova', 'Başçiftlik', 'Erbaa', 'Niksar', 'Pazar', 'Reşadiye', 'Sulusaray', 'Turhal', 'Yeşilyurt', 'Zile',
    'Trabzon', 'Ortahisar', 'Akçaabat', 'Araklı', 'Arsin', 'Beşikdüzü', 'Çaykara', 'Dernekpazarı', 'Düzköy', 'Hayrat', 'Köprübaşı', 'Maçka', 'Of', 'Sürmene', 'Salpazarı', 'Tonya', 'Vakıfkebir', 'Yomra',
    'Tunceli', 'Merkez', 'Cemiskezek', 'Hozat', 'Mazgirt', 'Nazimiye', 'Ovacık', 'Pertek', 'Pulumur',
    'Uşak', 'Merkez', 'Banaz', 'Eşme', 'Karahalı', 'Sivaslı', 'Ulubey',
    'Van', 'İpekyolu', 'Tuşba', 'Bahçesaray', 'Başkale', 'Çaldıran', 'Çatak', 'Edremit', 'Ercis', 'Gevaş', 'Gürpinar', 'Muradiye', 'Özalp', 'Saray',
    'Yalova', 'Merkez', 'Altınova', 'Armutlu', 'Çınarcık', 'Çiftlikköy', 'Termal',
    'Yozgat', 'Merkez', 'Akdağmadeni', 'Boğazliyan', 'Çandır', 'Çayıralan', 'Çekerek', 'Kadışehri', 'Sarıkaya', 'Saraykent', 'Sorgun', 'Şefaatli', 'Yenifakılı', 'Yerköy',
    'Zonguldak', 'Merkez', 'Alaplı', 'Çaycuma', 'Devrek', 'Ereğli', 'Gökcesu', 'Kilimli', 'Kozlu'
];

let locationTimeout;

function initLocationSearch() {
    const locationInput = document.getElementById('location_input');
    const suggestionsDiv = document.getElementById('location_suggestions');
    
    locationInput.addEventListener('input', function() {
        clearTimeout(locationTimeout);
        const query = this.value.trim();
        
        if (query.length < 2) {
            suggestionsDiv.style.display = 'none';
            return;
        }
        
        locationTimeout = setTimeout(() => {
            showLocationSuggestions(query, suggestionsDiv);
        }, 300);
    });
    
    locationInput.addEventListener('blur', function() {
        setTimeout(() => {
            suggestionsDiv.style.display = 'none';
        }, 200);
    });
}

function showLocationSuggestions(query, suggestionsDiv) {
    const filtered = turkishLocations.filter(location => 
        location.toLowerCase().includes(query.toLowerCase())
    ).slice(0, 10);
    
    if (filtered.length === 0) {
        suggestionsDiv.style.display = 'none';
        return;
    }
    
    suggestionsDiv.innerHTML = filtered.map(location => 
        `<div class="suggestion-item" onclick="selectLocation('${location}')">
            <i class="fa fa-map-marker"></i> ${location}
        </div>`
    ).join('');
    
    suggestionsDiv.style.display = 'block';
}

function selectLocation(location) {
    document.getElementById('location_input').value = location;
    document.getElementById('location_suggestions').style.display = 'none';
}

function getCurrentLocation() {
    const locationBtn = document.querySelector('.location_detect_btn');
    const locationInput = document.getElementById('location_input');
    
    if (!navigator.geolocation) {
        alert('Tarayıcınız konum algılamayı desteklemiyor.');
        return;
    }
    
    locationBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i><span>Yükleniyor</span>';
    locationBtn.disabled = true;
    
    navigator.geolocation.getCurrentPosition(
        function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            
            // Reverse geocoding ile şehir adını al
            fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lng}&localityLanguage=tr`)
                .then(response => response.json())
                .then(data => {
                    const city = data.city || data.locality || data.principalSubdivision;
                    if (city) {
                        locationInput.value = city;
                    } else {
                        locationInput.value = 'Konum bulunamadı';
                    }
                })
                .catch(() => {
                    locationInput.value = 'Konum alınamadı';
                })
                .finally(() => {
                    locationBtn.innerHTML = '<i class="fa fa-crosshairs"></i><span>Konum</span>';
                    locationBtn.disabled = false;
                });
        },
        function(error) {
            let errorMsg = 'Konum alınamadı';
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    errorMsg = 'Konum izni reddedildi';
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMsg = 'Konum bilgisi mevcut değil';
                    break;
                case error.TIMEOUT:
                    errorMsg = 'Konum alma zaman aşımı';
                    break;
            }
            alert(errorMsg);
            locationBtn.innerHTML = '<i class="fa fa-crosshairs"></i><span>Konum</span>';
            locationBtn.disabled = false;
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 300000
        }
    );
}

function searchJobs() {
    const keyword = document.getElementById('job_search').value;
    const location = document.getElementById('location_input').value;
    
    let searchUrl = '{{ route("jobs.index") }}?';
    const params = [];
    
    if (keyword) params.push('search=' + encodeURIComponent(keyword));
    if (location) params.push('location=' + encodeURIComponent(location));
    
    if (params.length > 0) {
        searchUrl += params.join('&');
    }
    
    window.location.href = searchUrl;
}

// Sayfa yüklendiğinde konum arama özelliğini başlat
document.addEventListener('DOMContentLoaded', function() {
    initLocationSearch();
});
</script>
@endsection