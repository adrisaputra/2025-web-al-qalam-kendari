@php
$setting = \App\Helpers\Helpers::setting();
@endphp
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
        <title>{{ __($setting->application_name) }}</title>
    	<link rel="icon" type="image/x-icon" href="{{ asset('storage/upload/setting/'.$setting->small_icon) }}"/>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />  
		<meta property="og:locale" content="in" />
		<meta property="og:type" content="Websitee" />
		<meta property="og:title" content={{ __($setting->application_name) }} />
		<meta property="og:url" content="{{ url('') }}" />
		<meta property="og:site_name" content={{ __($setting->application_name) }} />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
          @yield('content')
        <!--end::Main-->
		<script>var hostUrl = "backend/assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('backend/assets/js/custom/authentication/sign-in/general.js') }}"></script>
	
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
	</body>
	<!--end::Body-->
</html>
