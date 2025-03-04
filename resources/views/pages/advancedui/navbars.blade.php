@extends('layouts.master')

@section('styles')
 
      
@endsection

@section('content')

                      <!-- Page Header -->
                      <div class="block justify-between page-header md:flex">
                          <div>
                              <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Navbars</h3>
                          </div>
                          <ol class="flex items-center whitespace-nowrap min-w-0">
                              <li class="text-[0.813rem] ps-[0.5rem]">
                                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                                  Advanced Ui
                                  <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                                </a>
                              </li>
                              <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                Navbars
                              </li>
                          </ol>
                      </div>
                      <!-- Page Header Close -->

                      <!-- Start::row-1 -->
                      <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Basic Navbar</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class=" w-full mx-auto sm:px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <a href="javascript:void(0);" class="header-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                    <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                  </a>
                                  <div class="flex flex-row items-center gap-5 mt-5 sm:justify-end sm:mt-0 sm:ps-5">
                                    <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Account</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Work</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Blog</a>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar With horizontal scroll</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 xxl:flex xxl:items-center xxl:justify-between" aria-label="Global">
                                  <a href="javascript:void(0);" class="header-logo">
                                    <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                    <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                  </a>
                                  <div
                                    class="flex flex-row items-center gap-5 mt-5 pb-2 overflow-x-auto xxl:justify-end xxl:mt-0 sm:ps-5 xxl:pb-0 xxl:overflow-x-visible">
                                    <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Dashboard</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Widgets</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Components</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Advanced Ui</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Basic Ui</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Elements</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Forms</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Pages</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Authentication</a>
                                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                      href="javascript:void(0);">Maps</a>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar With collapse</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="javascript:void(0);" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bodybg dark:hover:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-with-collapse" aria-controls="navbar-with-collapse"
                                        aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-with-collapse" class="hidden basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar Collapse with animation</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="javascript:void(0);" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bodybg dark:hover:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-collapse-with-animation"
                                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-collapse-with-animation"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar with Image</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="javascript:void(0);" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bodybg dark:hover:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-image-2" aria-controls="navbar-image-2"
                                        aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-image-2"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar with Alignment</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="javascript:void(0);" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bodybg dark:hover:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment"
                                        aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-alignment"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar with MegaMenu</h5>
                            </div>
                            <div class="box-body">
                              <header
                                class="relative flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-white text-sm dark:bg-bodybg">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="{{url('index')}}" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="dark:hidden block">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="hidden dark:block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bodybg dark:hover:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-with-mega-menu" aria-controls="navbar-with-mega-menu"
                                        aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-with-mega-menu"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-primary" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-500 whitespace-nowrap"
                                        href="javascript:void(0);">Blog</a>
                                        <div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none]">
                                            <button id="hs-mega-menu-basic-dr" type="button" class="flex items-center w-full text-gray-600 hover:text-gray-400 font-medium dark:text-gray-400 dark:hover:text-gray-500 ">
                                                Dropdown
                                                <svg class="ltr:ml-2 rtl:mr-2 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                                </svg>
                                            </button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-lg p-2 dark:bg-gray-800 sm:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full sm:border before:-top-5 before:left-0 before:w-full before:h-5 hidden" style="">
                                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                About
                                                </a>
                                                <div class="hs-dropdown relative [--strategy:static] sm:[--strategy:absolute] [--adaptive:none]">
                                                <button type="button" class="flex justify-between w-full items-center text-sm text-gray-800 rounded-md py-2 px-3 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                                    Sub Menu
                                                    <svg class="sm:-rotate-90 ml-2 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                                    </svg>
                                                </button>

                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 sm:mt-2 bg-white sm:shadow-md rounded-lg p-2 dark:bg-gray-800 sm:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute sm:border before:-right-5 before:top-0 before:h-full before:w-5 top-0 ltr:right-full rtl:left-full !mx-[10px]">
                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                    Newsletter
                                                    </a>
                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                    Purchases
                                                    </a>
                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                    Downloads
                                                    </a>
                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                    Team Account
                                                    </a>
                                                </div>
                                                </div>

                                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                Services
                                                </a>
                                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-0 focus:ring-primary dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0);">
                                                Customer Story
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-12">
                          <div class="box">
                            <div class="box-header">
                              <h5 class="box-title">Navbar with Color variants</h5>
                            </div>
                            <div class="box-body space-y-4">
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-primary text-sm py-4 rounded-sm">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="{{url('index')}}" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border border-white/[.25] font-medium bg-primary text-white shadow-sm align-middle hover:bg-primary focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white/10 focus:ring-primary transition-all text-sm dark:bg-transparent dark:hover:bg-primary dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-white dark:focus:ring-offset-white/10"
                                        data-hs-collapse="#navbar-primary" aria-controls="navbar-primary" aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-primary"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-white" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-300 hover:text-white"
                                        href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-300 hover:text-white"
                                        href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-300 hover:text-white"
                                        href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                              <header
                                class="flex flex-wrap sm:justify-start sm:flex-nowrap z-40 w-full bg-secondary text-sm py-4 rounded-sm">
                                <nav class="w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
                                  <div class="flex items-center justify-between">
                                    <a href="{{url('index')}}" class="header-logo">
                                      <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="block">
                                    </a>
                                    <div class="sm:hidden">
                                      <button type="button"
                                        class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-sm border border-white/[.25] font-medium bg-secondary text-white shadow-sm align-middle hover:bg-white/[.15] focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-secondary focus:ring-white transition-all text-sm"
                                        data-hs-collapse="#navbar-secondary" aria-controls="navbar-secondary"
                                        aria-label="Toggle navigation">
                                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                        <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                                          viewBox="0 0 16 16">
                                          <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </div>
                                  <div id="navbar-secondary"
                                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                                      <a class="font-medium text-white" href="javascript:void(0);" aria-current="page">Landing</a>
                                      <a class="font-medium text-gray-300 hover:text-white" href="javascript:void(0);">Account</a>
                                      <a class="font-medium text-gray-300 hover:text-white" href="javascript:void(0);">Work</a>
                                      <a class="font-medium text-gray-300 hover:text-white" href="javascript:void(0);">Blog</a>
                                    </div>
                                  </div>
                                </nav>
                              </header>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End::row-1 -->
         
@endsection

@section('scripts')


@endsection