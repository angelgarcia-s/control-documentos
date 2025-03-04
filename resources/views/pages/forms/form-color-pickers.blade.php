@extends('layouts.master')

@section('styles')

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">

        <!-- Pickr CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/classic.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/monolith.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/@simonwep/pickr/themes/nano.min.css')}}">

@endsection

@section('content')
 
                            <!-- Page Header -->
                            <div class="block justify-between page-header md:flex">
                                <div>
                                    <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">Color Pickers</h3>
                                </div>
                                <ol class="flex items-center whitespace-nowrap min-w-0">
                                    <li class="text-[0.813rem] ps-[0.5rem]">
                                      <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                                        Form Elements
                                        <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                                      </a>
                                    </li>
                                    <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                      Color Pickers
                                    </li>
                                </ol>
                            </div>
                            <!-- Page Header Close -->

                            <!-- Start::row-1 -->
                            <div class="grid grid-cols-12 gap-6">
                            <div class="xl:col-span-3 col-span-12">
                                <div class="box">
                                    <div class="box-header justify-between">
                                        <div class="box-title">
                                            Color Picker
                                        </div>
                                        <div class="prism-toggle">
                                            <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <input type="color" class="form-control form-control-color !border-0"
                                                id="exampleColorInput" value="#136ad0" title="Choose your color">
                                    </div>
                                    <div class="box-footer hidden border-t-0">
        <!-- Prism Code -->
        <pre class="language-html"><code class="language-html">&lt;input type="color" class="form-control form-control-color border-0"
            id="exampleColorInput" value="#136ad0" title="Choose your color"&gt;</code></pre>
        <!-- Prism Code -->
                                    </div>
                                </div>
                            </div>
                          <div class="xl:col-span-9 col-span-12">
                              <div class="box">
                                  <div class="box-header">
                                      <div class="box-title">
                                          Classic
                                      </div>
                                  </div>
                                  <div class="box-body flex justify-between">
                                      <div>
                                          <div class="theme-container hidden"></div>
                                          <div class="pickr-container example-picker"></div>
                                      </div>
                                      <div>
                                          <div class="theme-container1 hidden"></div>
                                          <div class="pickr-container1 example-picker"></div>
                                      </div>
                                      <div>
                                          <div class="theme-container2 hidden"></div>
                                          <div class="pickr-container2 example-picker"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--End::row-1 -->

@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')


        <!-- Color Picker JS -->
        @vite('resources/assets/js/color-picker.js')


@endsection