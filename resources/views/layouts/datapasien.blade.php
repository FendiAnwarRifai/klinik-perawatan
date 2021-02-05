<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>@yield('title', 'Dasboard | Aplikasi Klinik Kecantikan')</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin:: Global Mandatory Vendors -->
	<link href="../../vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<link href="../../vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Optional Vendors -->

	<link href="../../../assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--begin::Global Theme Styles -->
	<link href="assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Global Theme Styles -->

	<!--begin::Page Vendors Styles -->
	<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="assets/demo/media/img/logo/favicon.ico" />
	<!-- date -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<!-- Main css -->
<link rel="stylesheet" href="stepsa/css/style.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body style="background-image: url(assets/app/media/img/bg/bg-5.jpg)" class="m-page--boxed m-body--fixed m-header--static m-aside--offcanvas-default">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- begin::Header -->
		<header id="m_header" class="m-grid__item	m-grid m-grid--desktop m-grid--hor-desktop  m-header ">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--hor-desktop m-container m-container--responsive m-container--xxl">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-header__wrapper">

					<!-- begin::Brand -->
					<div class="m-stack__item m-brand">
						<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a class="m-brand__logo-wrapper">
									<img alt="" src="assets/demo/media/img/logo/logo.png"/>
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<div class="m-stack__item m-stack__item--middle m-brand__logo" id="judul">
									<b id="fonts">Aplikasi Klinik Kecantikan</b>
								</div>

								<!-- begin::Responsive Header Menu Toggler-->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>

								<!-- end::Responsive Header Menu Toggler-->

								<!-- begin::Topbar Toggler-->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>

								<!--end::Topbar Toggler-->
							</div>
						</div>
					</div>

					<!-- end::Brand -->

					<!-- begin::Topbar -->
					<div class="m-grid__item m-grid__item--fluid m-header-head" id="m_header_nav">
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
									m-dropdown-toggle="click">
									<a href="#" class="m-nav__link m-dropdown__toggle">
										<span class="m-topbar__welcome m--hidden-tablet m--hidden-mobile">Hello,&nbsp;</span>
										<span class="m-topbar__username m--hidden-tablet m--hidden-mobile m--padding-right-15"><span class="m-link">{{ Auth::user()->name }}</span></span>
										<span class="m-topbar__userpic">
											<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="" />
										</span>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
												<div class="m-card-user m-card-user--skin-dark">
													<div class="m-card-user__pic">
														<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt="" />
													</div>
													<div class="m-card-user__details">
														<span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
													</div>
												</div>
											</div>
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav m-nav--skin-light">
														<li class="m-nav__item">
															<a href="password.change" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-profile-1"></i>
																<span class="m-nav__link-text">Ganti Password</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit">
														</li>
														<li class="m-nav__item">
															<a href="{{ route('logout') }}"
															onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">{{ __('Logout') }}</a>
															<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
															</form>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- end::Topbar -->
			</div>
		</div>
	</header>

	<!-- end::Header -->

	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid m-grid--hor m-container m-container--responsive m-container--xxl">
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
			<div class="m-grid__item m-body__nav">
				<div class="m-stack m-stack--ver m-stack--desktop">

					<!-- begin::Horizontal Menu -->
					<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
						<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
							<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">

								<li class="m-menu__item " aria-haspopup="true"><a href="{{url('/home')}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Dashboard</span></a>
								</li>
								
								<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
									<a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><span
										class="m-menu__link-text">Schedule</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item " aria-haspopup="true"><a href="{{url('now')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Jadwal Pasien Hari Ini</span></a>
												</li>
												<li class="m-menu__item " aria-haspopup="true"><a href="{{url('terjadwal')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">List Pasien Terjadwal</span></a>
												</li>
											</ul>
										</div>
									</li>

								<li class="m-menu__item  m-menu__item--active  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span
									class="m-menu__item-here"></span><span class="m-menu__link-text">Data</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
										<ul class="m-menu__subnav">
												<li class="m-menu__item " aria-haspopup="true"><a href="{{url('/datadokter')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dokter</span></a>

													<li class="m-menu__item  m-menu__item--active " aria-haspopup="true"><a href="{{url('datapasien')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
														class="m-menu__link-text">Pasien</span> </a></li>
												</li>
											</ul>
										</div>
									</li>

									<li class="m-menu__item " aria-haspopup="true"><a href="{{url('/obathome')}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Obat</span></a>
									</li>

									<li class="m-menu__item " aria-haspopup="true"><a href="{{url('/index')}}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Cetak Pasien</span></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- end::Horizontal Menu -->
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">

						<!-- BEGIN: Subheader -->
						<div class="m-subheader ">

						</div>

						<!-- END: Subheader -->
						<div class="m-content">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- begin::Body -->

		<!-- begin::Footer -->
		<footer class="m-grid__item		m-footer ">
			<div class="m-container m-container--responsive m-container--xxl">
				<div class="m-footer__wrapper">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--skin-dark m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">About</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Privacy</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">T&C</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">Purchase</span>
									</a>
								</li>
								<li class="m-nav__item m-nav__item--last">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- end:: Page -->

	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>

	<!-- end::Scroll Top -->

	<!--begin:: Global Mandatory Vendors -->
	<script src="../../vendors/jquery/dist/jquery.js" type="text/javascript"></script>
	<script src="../../vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
	<script src="../../vendors/moment/min/moment.min.js" type="text/javascript"></script>
	<script src="../../vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
	<script src="../../vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
	<script src="../../vendors/wnumb/wNumb.js" type="text/javascript"></script>

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<script src="../../vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
	<script src="../../vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
	<script src="../../vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
	<script src="../../vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
	<script src="../../vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
	<script src="../../vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
	<script src="../../vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>
	<script src="../../vendors/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
	<script src="../../vendors/handlebars/dist/handlebars.js" type="text/javascript"></script>
	<script src="../../vendors/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
	<script src="../../vendors/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
	<script src="../../vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
	<script src="../../vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
	<script src="../../vendors/nouislider/distribute/nouislider.js" type="text/javascript"></script>
	<script src="../../vendors/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
	<script src="../../vendors/autosize/dist/autosize.js" type="text/javascript"></script>
	<script src="../../vendors/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
	<script src="../../vendors/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
	<script src="../../vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
	<script src="../../vendors/summernote/dist/summernote.js" type="text/javascript"></script>
	<script src="../../vendors/markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
	<script src="../../vendors/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
	<script src="../../vendors/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
	<script src="../../vendors/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
	<script src="../../vendors/toastr/build/toastr.min.js" type="text/javascript"></script>
	<script src="../../vendors/jstree/dist/jstree.js" type="text/javascript"></script>
	<script src="../../vendors/raphael/raphael.js" type="text/javascript"></script>
	<script src="../../vendors/morris.js/morris.js" type="text/javascript"></script>
	<script src="../../vendors/chartist/dist/chartist.js" type="text/javascript"></script>
	<script src="../../vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
	<script src="../../vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
	<script src="../../vendors/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
	<script src="../../vendors/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
	<script src="../../vendors/counterup/jquery.counterup.js" type="text/javascript"></script>
	<script src="../../vendors/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
	<script src="../../vendors/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
	<script src="../../vendors/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Bundle -->
	<script src="assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

	<!--end::Global Theme Bundle -->

	<!--begin::Page Vendors -->
	<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

	<!--end::Page Vendors -->

	<!--begin::Page Scripts -->
	<script src="assets/app/js/dashboard.js" type="text/javascript"></script>

	<!--begin::Page Vendors -->
	<script src="../../../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

	<!--end::Page Vendors -->

	<!--begin::Page Scripts -->
	<script src="../../../assets/demo/custom/crud/datatables/basic/paginations.js" type="text/javascript"></script>
<script src="../../../assets/demo/custom/crud/forms/validation/form-widgets.js" type="text/javascript"></script>
<script src="../../../assets/demo/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
	<!--end::Page Scripts -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
	@include('sweet::alert')
</body>

<!-- end::Body -->
</html>
