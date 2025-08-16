<!doctype html>
<html class="no-js" lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'MertayGroup İş İlanları - Türkiye\'nin En Büyük İş Platformu')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome CDN for Google icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Temel düzeltmeler */
        .logo img, .footer_logo img {
            max-width: 120px !important;
            height: auto !important;
        }

        /* Header butonları */
        .auth-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            min-width: 100px;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .login-btn {
            color: #fff;
            border-color: #007bff;
            background: #007bff;
            box-shadow: 0 2px 8px rgba(0,123,255,0.3);
        }

        .login-btn:hover {
            background: #0056b3;
            border-color: #0056b3;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,123,255,0.4);
        }

        .register-btn {
            background: #28a745;
            color: white;
            border-color: #28a745;
            box-shadow: 0 2px 8px rgba(40,167,69,0.3);
        }

        .register-btn:hover {
            background: #218838;
            border-color: #218838;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(40,167,69,0.4);
        }

        .job-btn {
            background: #fd7e14;
            color: white;
            border-color: #fd7e14;
            box-shadow: 0 2px 8px rgba(253,126,20,0.3);
        }

        .job-btn:hover {
            background: #e63946;
            border-color: #e63946;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(253,126,20,0.4);
        }

        /* Nice Select Scroll */
        .nice-select .list {
            max-height: 200px !important;
            overflow-y: auto !important;
        }

        /* Font iyileştirmeleri */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-weight: 400;
            line-height: 1.6;
            color: #333;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            line-height: 1.3;
            color: #2c3e50;
        }

        .bradcam_text h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            letter-spacing: -0.5px;
        }

        .slider_text h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.8rem;
            letter-spacing: -0.8px;
            line-height: 1.2;
        }

        .slider_text h5 {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .jobs_conetent h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.3rem;
            color: #2c3e50;
        }

        .single_catagory h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .card-header h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
        }

        .section_title h3,
        .section_title h2 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }

        .btn, .boxed-btn3 {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .auth-btn {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        .form-label {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-control, .form-select {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }

        .sidebar-menu li a {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }

        .footer_widget h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .company_name p {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }

        .links_locat p {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            font-size: 0.9rem;
        }

        .salary p {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        /* Header buton hover efektleri */
        .header-btn:hover {
            background: #5a32a3 !important;
            border-color: #5a32a3 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 12px rgba(111,66,193,0.4) !important;
            color: white !important;
        }

        /* Genel text alignment */
        .bradcam_text {
            text-align: center;
            padding-top: 40px;
        }

        .section_title,
        .section_title h3,
        .section_title h2 {
            text-align: center;
        }

        .card-header {
            text-align: center;
        }

        .single_jobs .jobs_conetent h4 {
            text-align: left;
        }

        .single_jobs .jobs_right {
            text-align: center;
        }

        .job_filter .form_inner h3 {
            text-align: center;
        }

        .recent_joblist h4 {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 25px;
            padding: 10px 0;
        }

        .footer_widget h3 {
            text-align: left;
        }

        .copy_right {
            text-align: center;
        }

        .slider_text {
            text-align: center;
        }

        .single_catagory {
            text-align: center;
        }

        .searching_text {
            text-align: center;
        }

        .single_counter {
            text-align: center;
        }

        .single_company {
            text-align: center;
        }

        /* Mobil için nice select */
        @media (max-width: 768px) {
            .nice-select {
                height: 45px;
                line-height: 43px;
                font-size: 14px;
            }

            .nice-select .list {
                max-height: 150px !important;
            }
        }

        /* Mobil Responsive İyileştirmeleri */
        @media (max-width: 768px) {
            .auth-btn {
                padding: 6px 12px;
                font-size: 12px;
                min-width: 80px;
            }

            /* Header mobil */
            .header-area {
                padding: 8px 0;
                background: #fff;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .logo img {
                max-height: 40px !important;
            }

            /* Mobil menü butonları */
            .phone_num {
                display: none !important;
            }

            .d-none.d-lg-block {
                display: none !important;
            }

            .mobile-auth {
                display: none !important;
            }

            /* Sidebar Menü */
            .mobile-sidebar {
                position: fixed;
                top: 0;
                right: -300px;
                width: 280px;
                height: 100vh;
                background: #fff;
                box-shadow: -2px 0 10px rgba(0,0,0,0.1);
                z-index: 9999;
                transition: right 0.3s ease;
                overflow-y: auto;
            }

            .mobile-sidebar.active {
                right: 0;
            }

            .sidebar-header {
                padding: 20px;
                background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
                color: #fff;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .sidebar-header h4 {
                margin: 0;
                font-weight: 600;
            }

            .sidebar-close {
                background: none;
                border: none;
                color: #fff;
                font-size: 20px;
                cursor: pointer;
            }

            .sidebar-menu {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .sidebar-menu li {
                border-bottom: 1px solid #f0f0f0;
            }

            .sidebar-menu li a {
                display: flex;
                align-items: center;
                padding: 15px 20px;
                color: #333;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .sidebar-menu li a i {
                margin-right: 10px;
                width: 20px;
                color: #007bff;
            }

            .sidebar-menu li a:hover {
                background: #f8f9fa;
                color: #007bff;
                padding-left: 25px;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 9998;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .mobile-menu-btn {
                display: block;
                background: #007bff;
                color: #fff;
                border: none;
                padding: 8px 12px;
                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
                position: fixed;
                top: 15px;
                right: 15px;
                z-index: 10000;
            }

            .slicknav_menu {
                display: none !important;
            }
        }

        /* Desktop için sidebar */
        .mobile-menu-btn {
            display: block;
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            position: fixed;
            top: 20px;
            right: 15px;
            z-index: 10000;
            box-shadow: 0 2px 10px rgba(0,123,255,0.3);
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,123,255,0.4);
        }

        /* Desktop sidebar */
        .mobile-sidebar {
            position: fixed;
            top: 0;
            right: -320px;
            width: 300px;
            height: 100vh;
            background: #fff;
            box-shadow: -2px 0 15px rgba(0,0,0,0.1);
            z-index: 9999;
            transition: right 0.3s ease;
            overflow-y: auto;
        }

        .mobile-sidebar.active {
            right: 0;
        }

        .sidebar-header {
            padding: 25px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 20px;
        }

        .sidebar-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .sidebar-close:hover {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-menu {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 18px 25px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .sidebar-menu li a i {
            margin-right: 12px;
            width: 22px;
            color: #007bff;
            font-size: 16px;
        }

        .sidebar-menu li a:hover {
            background: #f8f9fa;
            color: #007bff;
            padding-left: 30px;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                padding: 8px 12px;
                font-size: 16px;
                top: 15px;
                right: 15px;
            }

            .mobile-sidebar {
                width: 280px;
                right: -300px;
            }

            .sidebar-header {
                padding: 20px;
            }

            .sidebar-header h4 {
                font-size: 18px;
            }

            .sidebar-menu li a {
                padding: 15px 20px;
                font-size: 14px;
            }

            .slicknav_nav a {
                padding: 15px 20px !important;
                color: #333 !important;
                font-weight: 500 !important;
                border-bottom: 1px solid #f0f0f0 !important;
                transition: all 0.3s ease !important;
            }

            .slicknav_nav a:hover {
                background: #f8f9fa !important;
                color: #007bff !important;
                padding-left: 25px !important;
            }

            .slicknav_nav li:last-child a {
                border-bottom: none !important;
            }

            .mobile-auth .auth-btn {
                flex: 1;
                text-align: center;
                padding: 8px 12px;
                font-size: 11px;
                font-weight: 600;
                box-shadow: 0 3px 10px rgba(0,0,0,0.2) !important;
            }

            .mobile-auth .login-btn {
                background: #007bff !important;
                color: white !important;
            }

            .mobile-auth .register-btn {
                background: #28a745 !important;
                color: white !important;
            }

            .mobile-auth .job-btn {
                background: #fd7e14 !important;
                color: white !important;
            }

            /* Ana sayfa arama */
            .catagory_area {
                padding: 30px 0 !important;
            }

            .cat_search {
                background: #fff;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                margin-top: -30px;
                position: relative;
                z-index: 10;
            }

            .cat_search .col-lg-3,
            .cat_search .col-lg-2 {
                margin-bottom: 15px;
            }

            .single_input {
                margin-bottom: 0;
            }

            .single_input select,
            .single_input input {
                height: 50px;
                font-size: 15px;
                border: 2px solid #e9ecef;
                border-radius: 10px;
                padding: 0 15px;
                transition: all 0.3s ease;
            }

            .single_input select:focus,
            .single_input input:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
            }

            .job_btn .boxed-btn3 {
                height: 50px;
                border-radius: 10px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            /* İş ilanları */
            .single_jobs {
                padding: 20px !important;
                margin-bottom: 20px;
                border-radius: 15px !important;
                box-shadow: 0 3px 15px rgba(0,0,0,0.08) !important;
                border: 1px solid #f0f0f0 !important;
            }

            .jobs_left {
                width: 100%;
                margin-bottom: 15px;
            }

            .jobs_left .thumb {
                width: 50px;
                height: 50px;
                border-radius: 10px;
                overflow: hidden;
            }

            .jobs_conetent {
                margin-left: 15px;
            }

            .jobs_conetent h4 {
                font-size: 18px;
                margin-bottom: 10px;
                color: #333;
                font-weight: 600;
            }

            .links_locat {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 5px;
            }

            .links_locat .location {
                margin-right: 0 !important;
            }

            .links_locat .location p {
                font-size: 13px;
                color: #666;
                margin: 0;
            }

            .company_name p {
                font-size: 14px;
                color: #007bff;
                font-weight: 500;
                margin: 5px 0;
            }

            .salary p {
                font-size: 16px;
                color: #28a745;
                font-weight: 600;
                margin: 5px 0;
            }

            .jobs_right {
                width: 100%;
                text-align: center;
                margin-top: 0;
            }

            .apply_now {
                justify-content: center;
                gap: 15px;
                margin-bottom: 10px;
            }

            .apply_now .boxed-btn3 {
                padding: 10px 25px;
                font-size: 14px;
                border-radius: 25px;
            }

            .date p {
                font-size: 12px;
                color: #999;
                margin: 0;
            }

            /* Kartlar */
            .card {
                margin-bottom: 20px;
                border: none;
                border-radius: 15px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }

            .card-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #fff;
                border-radius: 15px 15px 0 0 !important;
                padding: 20px;
                border: none;
            }

            .card-header h4 {
                margin: 0;
                font-weight: 600;
            }

            .card-body {
                padding: 25px !important;
            }

            /* Butonlar */
            .btn {
                border-radius: 8px;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .btn-lg {
                padding: 12px 25px;
                font-size: 15px;
                border-radius: 25px;
            }

            .btn-primary {
                background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
                border: none;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,123,255,0.4);
            }

            .boxed-btn3 {
                padding: 12px 25px;
                font-size: 14px;
                border-radius: 25px;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .boxed-btn3:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }

            /* Form elemanları */
            .form-control,
            .form-select {
                padding: 15px 20px;
                font-size: 15px;
                border: 2px solid #e9ecef;
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
            }

            .form-label {
                font-weight: 600;
                color: #333;
                margin-bottom: 8px;
            }

            /* Breadcrumb */
            .bradcam_area {
                padding: 60px 0 40px 0;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                position: relative;
                z-index: 1;
            }

            .bradcam_text {
                text-align: center;
            }

            .bradcam_text h3 {
                font-size: 28px;
                color: #fff;
                font-weight: 700;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                margin: 0;
            }

            /* Slider */
            .slider_area {
                padding: 80px 0 60px 0;
            }

            .slider_text {
                text-align: center !important;
                padding: 0 15px;
            }

            /* Mobil font iyileştirmeleri */
            .bradcam_text h3 {
                font-size: 2rem !important;
                letter-spacing: -0.3px !important;
            }

            .slider_text h3 {
                font-size: 2.2rem !important;
                letter-spacing: -0.5px !important;
            }

            .slider_text h5 {
                font-size: 1rem !important;
            }

            .jobs_conetent h4 {
                font-size: 1.1rem !important;
            }

            .section_title h3,
            .section_title h2 {
                font-size: 1.8rem !important;
            }

            .single_catagory h4 {
                font-size: 1.1rem !important;
            }

            .card-header h4 {
                font-size: 1.2rem !important;
            }

            /* Mobil text alignment */
            .bradcam_text {
                text-align: center !important;
            }

            .card-header {
                text-align: center !important;
            }

            .section_title,
            .section_title h3,
            .section_title h2 {
                text-align: center !important;
            }

            .job_filter .form_inner h3 {
                text-align: center !important;
            }

            .recent_joblist h4 {
                text-align: center !important;
                margin-top: 25px !important;
                margin-bottom: 20px !important;
            }

            .serch_cat {
                justify-content: center !important;
            }

            /* Mobil form düzeltmeleri */
            .form-select, .form-control {
                font-size: 14px !important;
                padding: 8px 12px !important;
            }

            .form-select option {
                font-size: 14px !important;
                padding: 5px !important;
                white-space: nowrap !important;
                overflow: hidden !important;
                text-overflow: ellipsis !important;
            }

            .col-md-6 {
                margin-bottom: 10px !important;
            }

            .mb-3 {
                margin-bottom: 15px !important;
            }

            .form-label {
                font-size: 13px !important;
                font-weight: 600 !important;
                margin-bottom: 5px !important;
            }

            .slider_text h5 {
                font-size: 16px;
                color: #007bff;
                font-weight: 600;
                margin-bottom: 15px;
            }

            .slider_text h3 {
                font-size: 32px;
                color: #333;
                font-weight: 700;
                margin-bottom: 20px;
                line-height: 1.2;
            }

            .slider_text p {
                font-size: 16px;
                color: #666;
                margin-bottom: 30px;
                line-height: 1.6;
            }

            .sldier_btn .boxed-btn3 {
                padding: 15px 30px;
                font-size: 16px;
                border-radius: 30px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
        }

        /* Google OAuth Buton Stilleri */
        .btn-google {
            background: #fff;
            border: 2px solid #dadce0;
            color: #3c4043;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .btn-google:hover {
            background: #f8f9fa;
            border-color: #dadce0;
            color: #3c4043;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transform: translateY(-1px);
        }

        .btn-google:focus {
            background: #f8f9fa;
            border-color: #4285f4;
            color: #3c4043;
            box-shadow: 0 0 0 0.2rem rgba(66,133,244,0.25);
        }

        .divider-line {
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .divider-line::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .divider-text {
            background: #fff;
            padding: 0 15px;
            color: #6c757d;
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Hero Search Area Stilleri */
        .hero_search_area {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0 60px 0;
            position: relative;
            overflow: hidden;
        }

        .hero_search_area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero_content {
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
        }

        .hero_title {
            font-size: 3.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            font-family: 'Poppins', sans-serif;
        }

        .hero_subtitle {
            font-size: 1.2rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0;
            font-weight: 400;
        }

        .hero_search_form {
            position: relative;
            z-index: 2;
        }

        .search_form_wrapper {
            background: #fff;
            border-radius: 15px;
            padding: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 1000px;
            margin: 0 auto;
        }

        .search_input_group {
            position: relative;
            height: 60px;
            border-right: 1px solid #e9ecef;
        }

        .search_input_group:last-child {
            border-right: none;
        }

        .search_icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 16px;
            z-index: 3;
        }

        .search_input, .search_select {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            padding: 0 20px 0 50px;
            font-size: 15px;
            color: #333;
            background: transparent;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .search_input:focus, .search_select:focus {
            background: #f8f9fa;
        }

        .search_input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .search_btn {
            width: 100%;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .search_btn:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        }

        .search_btn i {
            font-size: 18px;
        }

        /* Konum Özellikleri */
        .location_group {
            position: relative;
            display: flex;
        }

        .location_detect_btn {
            background: #667eea;
            border: none;
            color: #fff;
            padding: 0 15px;
            border-radius: 8px 0 0 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
            min-width: 80px;
            justify-content: center;
        }

        .location_detect_btn:hover {
            background: #5a67d8;
        }

        .location_detect_btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .location_input {
            border-radius: 0 8px 8px 0 !important;
            border-left: 1px solid #e9ecef !important;
            padding-left: 15px !important;
        }

        .location_suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #e9ecef;
            border-top: none;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 10;
            display: none;
            max-height: 200px;
            overflow-y: auto;
        }

        .suggestion-item {
            padding: 12px 20px;
            cursor: pointer;
            border-bottom: 1px solid #f8f9fa;
            transition: all 0.2s ease;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .suggestion-item:hover {
            background: #f8f9fa;
            color: #667eea;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item i {
            color: #667eea;
            font-size: 12px;
        }

        /* Mobil Responsive */
        @media (max-width: 768px) {
            .hero_search_area {
                padding: 60px 0 40px 0;
            }

            .hero_title {
                font-size: 2.5rem;
            }

            .hero_subtitle {
                font-size: 1rem;
            }

            .search_form_wrapper {
                padding: 15px;
                border-radius: 20px;
            }

            .search_input_group {
                height: 50px;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                margin-bottom: 10px;
            }

            .search_input_group:last-child {
                border-bottom: none;
                margin-bottom: 0;
            }

            .search_input, .search_select {
                height: 50px;
                padding: 0 15px 0 45px;
                font-size: 14px;
            }

            .search_icon {
                left: 15px;
                font-size: 14px;
            }

            .search_btn {
                height: 50px;
                font-size: 15px;
                margin-top: 10px;
            }
        }

        /* Mobil Alt Menü */
        .mobile-bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 1px solid #e9ecef;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: none;
            padding: 8px 0;
        }

        .mobile-bottom-nav .nav-item {
            flex: 1;
            text-align: center;
        }

        .mobile-bottom-nav .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 6px 4px;
            text-decoration: none;
            color: #666;
            font-size: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-bottom-nav .nav-link i {
            font-size: 16px;
            margin-bottom: 2px;
        }

        .mobile-bottom-nav .nav-link:hover,
        .mobile-bottom-nav .nav-link.active {
            color: #007bff;
        }

        .mobile-bottom-nav .nav-link.primary {
            color: #007bff;
        }

        .mobile-bottom-nav .nav-link.success {
            color: #28a745;
        }

        .mobile-bottom-nav .nav-link.warning {
            color: #fd7e14;
        }

        .mobile-bottom-nav .nav-link.info {
            color: #17a2b8;
        }

        @media (max-width: 768px) {
            .mobile-bottom-nav {
                display: flex;
            }

            body {
                padding-bottom: 60px;
            }
        }

        @media (max-width: 576px) {
            /* Çok küçük ekranlar */
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .single_jobs {
                flex-direction: column;
                text-align: center;
            }

            .jobs_left {
                margin-bottom: 15px;
            }

            .d-flex.gap-3 {
                flex-direction: column;
                gap: 10px !important;
            }

            .auth-btn {
                width: 100%;
                justify-content: center;
            }

            /* Slider text */
            .slider_text h3 {
                font-size: 24px;
            }

            .slider_text h5 {
                font-size: 14px;
            }

            /* Kategoriler */
            .popular_catagory_area {
                padding: 50px 0;
            }

            .single_catagory {
                margin-bottom: 25px;
                text-align: center;
                background: #fff;
                padding: 25px 15px;
                border-radius: 15px;
                box-shadow: 0 3px 15px rgba(0,0,0,0.08);
                border: 1px solid #f0f0f0;
                transition: all 0.3s ease;
            }

            .single_catagory:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            }

            .single_catagory h4 {
                font-size: 18px;
                color: #333;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .single_catagory p {
                font-size: 14px;
                color: #666;
                margin: 0;
            }

            .single_catagory p span {
                color: #007bff;
                font-weight: 600;
            }
        }
    </style>
</head>
<body>
    <!-- header-start -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('img/logo.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                                            <li><a href="{{ route('jobs.index') }}">İş İlanları</a></li>
                                            <li><a href="{{ route('companies.index') }}">Şirketler</a></li>
                                            @auth
                                                <li><a href="{{ route('favorites.index') }}">Favorilerim</a></li>
                                            @endauth
                                            <li><a href="#">İletişim</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <div class="auth-buttons d-flex align-items-center" style="gap: 8px; margin-right: 80px;">
                                            @if(auth()->check() && auth()->user()->email === 'admin@mertaygroup.com')
                                                <a href="{{ route('admin.dashboard') }}" class="header-btn" style="padding: 8px 16px; font-size: 12px; width: 90px; height: 36px; border-radius: 4px; background: #6f42c1; color: white; border: 2px solid #6f42c1; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0 2px 8px rgba(111,66,193,0.3); transition: all 0.3s ease;">
                                                    <i class="fa fa-cog me-1"></i>
                                                    <span>Admin</span>
                                                </a>
                                            @else
                                                <a href="{{ route('jobseeker.login') }}" class="header-btn" style="padding: 8px 16px; font-size: 12px; width: 90px; height: 36px; border-radius: 4px; background: #6f42c1; color: white; border: 2px solid #6f42c1; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0 2px 8px rgba(111,66,193,0.3); transition: all 0.3s ease;">
                                                    <i class="fa fa-user me-1"></i>
                                                    <span>İş Arayan</span>
                                                </a>
                                                <a href="{{ route('company.login') }}" class="header-btn" style="padding: 8px 16px; font-size: 12px; width: 90px; height: 36px; border-radius: 4px; background: #6f42c1; color: white; border: 2px solid #6f42c1; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0 2px 8px rgba(111,66,193,0.3); transition: all 0.3s ease;">
                                                    <i class="fa fa-building me-1"></i>
                                                    <span>Firma</span>
                                                </a>
                                            @endif
                                            <a href="{{ route('jobs.create') }}" class="header-btn" style="padding: 8px 16px; font-size: 12px; width: 90px; height: 36px; border-radius: 4px; background: #6f42c1; color: white; border: 2px solid #6f42c1; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0 2px 8px rgba(111,66,193,0.3); transition: all 0.3s ease;">
                                                <i class="fa fa-briefcase me-1"></i>
                                                <span>İlan Ver</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-none d-lg-block">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- Menü Butonu -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Mobil Sidebar -->
    <div class="sidebar-overlay" onclick="closeSidebar()"></div>
    <div class="mobile-sidebar" id="mobileSidebar">
        <div class="sidebar-header">
            <h4>Menü</h4>
            <button class="sidebar-close" onclick="closeSidebar()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Ana Sayfa</a></li>
            <li><a href="{{ route('jobs.index') }}"><i class="fa fa-search"></i> İş İlanları</a></li>
            <li><a href="{{ route('companies.index') }}"><i class="fa fa-building"></i> Şirketler</a></li>
            @auth
                @if(auth()->user()->email === 'admin@mertaygroup.com')
                    <li><a href="{{ route('admin.dashboard') }}" style="color: #dc3545;"><i class="fa fa-cog"></i> Admin Paneli</a></li>
                @endif
                <li><a href="{{ route('favorites.index') }}"><i class="fa fa-heart"></i> Favorilerim</a></li>
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                <li><a href="{{ route('profile.edit') }}"><i class="fa fa-user"></i> Profil</a></li>
            @else
                <li><a href="{{ route('jobseeker.login') }}"><i class="fa fa-user"></i> İş Arayan Girişi</a></li>
                <li><a href="{{ route('company.login') }}"><i class="fa fa-building"></i> Firma Girişi</a></li>
                <li><a href="{{ route('jobseeker.register') }}"><i class="fa fa-user-plus"></i> İş Arayan Kayıt</a></li>
                <li><a href="{{ route('company.register') }}"><i class="fa fa-building-o"></i> Firma Kayıt</a></li>
            @endauth
            <li><a href="{{ route('jobs.create') }}"><i class="fa fa-plus-circle"></i> İş İlanı Ver</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> İletişim</a></li>
        </ul>
    </div>

    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @yield('content')

    <!-- Mobil Alt Menü -->
    <div class="mobile-bottom-nav">
        <div class="nav-item">
            <a href="{{ route('jobs.index') }}" class="nav-link primary">
                <i class="fa fa-search"></i>
                <span>İş Ara</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('jobseeker.login') }}" class="nav-link success">
                <i class="fa fa-user"></i>
                <span>İş Arayan</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('jobs.create') }}" class="nav-link warning">
                <i class="fa fa-plus-circle"></i>
                <span>İlan Yayınla</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('company.login') }}" class="nav-link info">
                <i class="fa fa-building"></i>
                <span>Firma</span>
            </a>
        </div>
    </div>

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('img/logo.png') }}" alt="">
                                </a>
                            </div>
                            <p>
                                Adres<br>
                                Şeyhsinan Mah. Hüsmen Kalfa Sok. Avukatlar İş Merkezi  <br>
                                No:5 Kat:3 Ofis:41 Çorlu / Tekirdağ
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Kurumsal</h3>
                            <ul>
                                <li><a href="#">Hakkımızda</a></li>
                                <li><a href="#">Fiyatlandırma</a></li>
                                <li><a href="#">Kariyer İpuçları</a></li>
                                <li><a href="#">Sık Sorulan Sorular</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Kategori</h3>
                            <ul>
                                <li><a href="{{ route('jobs.index') }}">Tasarım & Sanat</a></li>
                                <li><a href="{{ route('jobs.index') }}">Mühendislik</a></li>
                                <li><a href="{{ route('jobs.index') }}">Satış & Pazarlama</a></li>
                                <li><a href="{{ route('jobs.index') }}">Finans</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">Gelişmelerde İlk Siz Haberdar Olun</h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="E-posta adresinizi girin">
                                <button type="submit">Abone Ol</button>
                            </form>
                            <p class="newsletter_text">Yeni iş fırsatları ve kariyer ipuçları hakkında bilgi almak için abone olun.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> MertayGroup İş İlanları - Tüm hakları saklıdır | Türkiye'nin en büyük iş platformu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end -->

    <!-- JS here -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.querySelector('.sidebar-overlay');

        if (sidebar && overlay) {
            if (sidebar.classList.contains('active')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }
    }

    function openSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.querySelector('.sidebar-overlay');

        if (sidebar && overlay) {
            sidebar.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.querySelector('.sidebar-overlay');

        if (sidebar && overlay) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // ESC tuşu ile kapatma
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSidebar();
        }
    });

    // Konum Algılama Fonksiyonu
    function getCurrentLocation() {
        const btn = document.querySelector('.location_detect_btn');
        const input = document.querySelector('.location_input');
        
        if (!btn || !input) return;
        
        // HTTPS kontrolü
        if (location.protocol !== 'https:' && location.hostname !== 'localhost') {
            alert('Konum özelliği sadece güvenli bağlantılarda (HTTPS) çalışır.');
            return;
        }
        
        // Geolocation desteği kontrolü
        if (!navigator.geolocation) {
            alert('Tarayıcınız konum özelliğini desteklemiyor.');
            return;
        }
        
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Konum Alınıyor...';
        
        const options = {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 60000
        };
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Reverse geocoding ile şehir bilgisi al
                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lng}&localityLanguage=tr`)
                    .then(response => response.json())
                    .then(data => {
                        let location = '';
                        if (data.city) {
                            location = data.city;
                        } else if (data.locality) {
                            location = data.locality;
                        } else if (data.principalSubdivision) {
                            location = data.principalSubdivision;
                        }
                        
                        if (location) {
                            input.value = location;
                            btn.innerHTML = '<i class="fa fa-check"></i> Bulundu';
                            btn.style.background = '#28a745';
                        } else {
                            throw new Error('Konum bilgisi alınamadı');
                        }
                    })
                    .catch(error => {
                        console.error('Geocoding hatası:', error);
                        btn.innerHTML = '<i class="fa fa-exclamation-triangle"></i> Hata';
                        btn.style.background = '#dc3545';
                        alert('Konum bilgisi alınamadı. Lütfen manuel olarak girin.');
                    })
                    .finally(() => {
                        btn.disabled = false;
                        setTimeout(() => {
                            btn.innerHTML = '<i class="fa fa-location-arrow"></i> Konum';
                            btn.style.background = '#667eea';
                        }, 3000);
                    });
            },
            function(error) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-location-arrow"></i> Konum';
                
                let errorMessage = '';
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = 'Konum izni reddedildi. Tarayıcı ayarlarından konum iznini açabilirsiniz.';
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = 'Konum bilgisi mevcut değil.';
                        break;
                    case error.TIMEOUT:
                        errorMessage = 'Konum alma işlemi zaman aşımına uğradı.';
                        break;
                    default:
                        errorMessage = 'Bilinmeyen bir hata oluştu.';
                        break;
                }
                
                console.error('Geolocation hatası:', error);
                alert(errorMessage);
            },
            options
        );
    }
    </script>
</body>
</html>
