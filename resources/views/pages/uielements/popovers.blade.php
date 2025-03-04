@extends('layouts.master')

@section('styles')

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')
 
                  <!-- Page Header -->
                  <div class="block justify-between page-header md:flex">
                      <div>
                          <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Popovers</h3>
                      </div>
                      <ol class="flex items-center whitespace-nowrap min-w-0">
                          <li class="text-[0.813rem] ps-[0.5rem]">
                            <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                              Ui Elements
                              <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                            </a>
                          </li>
                          <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                              Popovers
                          </li>
                      </ol>
                  </div>
                  <!-- Page Header Close -->

                <!-- Start:: row-1 -->
                 <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-5 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Default Popovers
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-mediumt">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);">Popover Top
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Popover Top</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">And here's some amazing content. It's very engaging. Right?</p>
                                            </div>
                                          </a>
                                      </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);">Popover Right
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Popover Right</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">And here's some amazing content. It's very engaging. Right?</p>
                                            </div>
                                          </a>
                                      </div>
                                      <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:bottom]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);">Popover Bottom
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Popover Bottom</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">And here's some amazing content. It's very engaging. Right?</p>
                                            </div>
                                          </a>
                                      </div>
                                      <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:left]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);">Popover Left
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Popover Left</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">And here's some amazing content. It's very engaging. Right?</p>
                                            </div>
                                          </a>
                                      </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);"&gt;Header Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Primary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
        &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);"&gt;Header Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Primary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:bottom]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);"&gt;Header Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Primary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
        &lt;/div&gt;
        &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:left]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);"&gt;Header Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 !rounded-t-md !py-2  !px-4 text-defaulttextcolor border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Primary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-7 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Colored Headers
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);">Header Primary
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-primary !rounded-t-md !py-2  !px-4 text-white border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor  !text-[0.8rem] !py-4 !px-4 text-start">Popover With Primary Header</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-secondary me-2" href="javascript:void(0);">Header Secondary
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-secondary !py-2 !rounded-t-md !px-4 text-white border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">Popover With Secondary Header</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:bottom]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-info me-2" href="javascript:void(0);">Header Info
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-info !py-2 !px-4 !rounded-t-md text-white border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">Popover With Info Header</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:left]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-warning me-2" href="javascript:void(0);">Header warning
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-warning !py-2 !px-4 !rounded-t-md text-white border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">Popover With warning Header</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-success me-2" href="javascript:void(0);">Header succuss
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-success !py-2 !px-4 text-white !rounded-t-md border-defaultborder text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">Popover With succuss Header</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-danger me-2" href="javascript:void(0);">Header danger
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-defaultborder/10 bg-danger !py-2 !px-4 text-white border-defaultborder !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Color Header</h6>
                                                </div>
                                                <p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start">Popover With danger Header</p>
                                            </div>
                                          </a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-primary me-2" href="javascript:void(0);"&gt;Header Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-primary !rounded-t-md !py-2  !px-4 text-white border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor  !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Primary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-secondary me-2" href="javascript:void(0);"&gt;Header Secondary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-secondary !py-2 !rounded-t-md !px-4 text-white border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Secondary Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:bottom]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-info me-2" href="javascript:void(0);"&gt;Header Info
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-info !py-2 !px-4 !rounded-t-md text-white border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With Info Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:left]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-warning me-2" href="javascript:void(0);"&gt;Header warning
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-warning !py-2 !px-4 !rounded-t-md text-white border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With warning Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-success me-2" href="javascript:void(0);"&gt;Header succuss
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-success !py-2 !px-4 text-white !rounded-t-md border-defaultborder text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With succuss Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-outline-danger me-2" href="javascript:void(0);"&gt;Header danger
              &lt;div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-defaultborder/10 bg-danger !py-2 !px-4 text-white border-defaultborder !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color Header&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-defaulttextcolor !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With danger Header&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-1 -->

                <!-- Start:: row-2 -->
                 <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-12 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Colored Popovers
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <div class="hs-tooltip ti-main-tooltip  [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary-full me-2" href="javascript:void(0);">Primary
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-primary !z-[1000] !p-0 !max-w-[276px] !border-white/10" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-white/10 !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Primary Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With primary background</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-secondary-full me-2" href="javascript:void(0);">Secondary
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary !p-0 !max-w-[276px] !border-white/10" role="tooltip">
                                                <div  class="!border-b !border-solid dark:border-white/10 !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Secondary Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With secondary background</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-info-full me-2" href="javascript:void(0);">Info
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary  !p-0 !max-w-[276px]  !border-white/10" role="tooltip">
                                                <div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Info Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With info background</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-warning-full me-2" href="javascript:void(0);">Warning
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-warning  !p-0 !max-w-[276px] !border-white/10" role="tooltip">
                                                <div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Warning Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With warning background</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-success-full me-2" href="javascript:void(0);">Success
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-success  !p-0 !max-w-[276px] !border-white/10" role="tooltip">
                                                <div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Success Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With success background</p>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-danger-full me-2" href="javascript:void(0);">Danger
                                            <div class="hs-tooltip-content ti-main-tooltip-content !bg-danger  !p-0 !max-w-[276px] !border-white/10" role="tooltip">
                                                <div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]">
                                                <h6>Danger Color background</h6>
                                                </div>
                                                <p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start">Popover With danger background</p>
                                            </div>
                                          </a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
      &lt;div class="hs-tooltip ti-main-tooltip  [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary-full me-2" href="javascript:void(0);"&gt;Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-primary !z-[1000] !p-0 !max-w-[276px] !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-white/10 !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Primary Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With primary background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-secondary-full me-2" href="javascript:void(0);"&gt;Secondary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary !p-0 !max-w-[276px] !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid dark:border-white/10 !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Secondary Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With secondary background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-info-full me-2" href="javascript:void(0);"&gt;Info
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary  !p-0 !max-w-[276px]  !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Info Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With info background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-warning-full me-2" href="javascript:void(0);"&gt;Warning
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-warning  !p-0 !max-w-[276px] !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Warning Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With warning background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-success-full me-2" href="javascript:void(0);"&gt;Success
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-success  !p-0 !max-w-[276px] !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Success Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With success background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-danger-full me-2" href="javascript:void(0);"&gt;Danger
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-danger  !p-0 !max-w-[276px] !border-white/10" role="tooltip"&gt;
                  &lt;div  class="!border-b dark:border-white/10 !border-solid !py-2 !px-4 text-white border-white/10 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Danger Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-white !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With danger background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-2 -->

                <!-- Start:: row-3 -->
                 <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-12 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Light Popovers
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top] ">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary me-2" href="javascript:void(0);">Primary
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-primary/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-primary !border-primary/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-primary !text-[0.8rem] !py-4 !px-4 text-start">Popover With primary background</p>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-secondary me-2" href="javascript:void(0);">Secondary
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-secondary/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-secondary !border-secondary/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-secondary !text-[0.8rem] !py-4 !px-4 text-start">Popover With secondary background</p>

                                                </div>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-info me-2" href="javascript:void(0);">Info
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-info/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-info !border-info/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-info !text-[0.8rem] !py-4 !px-4 text-start">Popover With info background</p>

                                                </div>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-warning me-2" href="javascript:void(0);">Warning
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-warning/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-warning !border-warning/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-warning !text-[0.8rem] !py-4 !px-4 text-start">Popover With warning background</p>
                                                </div>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-success me-2" href="javascript:void(0);">Success
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-success/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-success !border-success/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-success !text-[0.8rem] !py-4 !px-4 text-start">Popover With success background</p>

                                                </div>
                                            </div>
                                          </a>
                                    </div>
                                    <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]">
                                        <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-danger me-2" href="javascript:void(0);">danger
                                            <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg !z-[1000] !p-0 !max-w-[276px] overflow-hidden" role="tooltip">
                                                <div class="!bg-danger/10">
                                                    <div  class="!border-b !border-solid !py-2 !px-4  text-danger !border-danger/20 !rounded-t-md text-start w-full text-[1rem]">
                                                    <h6>Color background</h6>
                                                    </div>
                                                    <p class="!text-danger !text-[0.8rem] !py-4 !px-4 text-start">Popover With danger background</p>

                                                </div>
                                            </div>
                                          </a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top] "&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary me-2" href="javascript:void(0);"&gt;Primary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-primary/10 !z-[1000] !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-primary !border-primary/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-primary !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With primary background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-secondary me-2" href="javascript:void(0);"&gt;Secondary
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary/10 !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-secondary !border-secondary/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-secondary !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With secondary background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-info me-2" href="javascript:void(0);"&gt;Info
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-info/10  !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-info !border-info/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-info !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With info background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-warning me-2" href="javascript:void(0);"&gt;Warning
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-warning/10  !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-warning !border-warning/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-warning !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With warning background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-success me-2" href="javascript:void(0);"&gt;Success
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-success/10  !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-success !border-success/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-success !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With success background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
      &lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:right]"&gt;
          &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-danger me-2" href="javascript:void(0);"&gt;danger
              &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-danger/10  !p-0 !max-w-[276px]" role="tooltip"&gt;
                  &lt;div  class="!border-b !border-solid !py-2 !px-4 text-danger !border-danger/20 !rounded-t-md text-start w-full text-[1rem]"&gt;
                  &lt;h6&gt;Color background&lt;/h6&gt;
                  &lt;/div&gt;
                  &lt;p class="!text-danger !text-[0.8rem] !py-4 !px-4 text-start"&gt;Popover With danger background&lt;/p&gt;
              &lt;/div&gt;
            &lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-3 -->

                <!-- Start:: row-4 -->
                 <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Disabled Popover
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]">
                                    <a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary-full opacity-60" href="javascript:void(0);">
                                        Disabled button
                                      <div class="hs-tooltip-content ti-main-tooltip-content dark:bg-bodybg " role="tooltip">
                                       Disabled Popover
                                      </div>
                                    </a>
                                  </div>
                               </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="hs-tooltip ti-main-tooltip [--trigger:click] [--placement:top]"&gt;
    &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle ti-btn ti-btn-primary-full opacity-60" href="javascript:void(0);"&gt;
        Disabled button
      &lt;div class="hs-tooltip-content ti-main-tooltip-content" role="tooltip"&gt;
       Disabled Popover
      &lt;/div&gt;
    &lt;/a&gt;
  &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Icon Popovers
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body flex">
                                <div class="hs-tooltip ti-main-tooltip me-6 !max-w-[276px] [--trigger:click] [--placement:top]">
                                    <a class="hs-tooltip-toggle ti-main-tooltip-toggle" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-primary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/></svg>
                                      <div class="hs-tooltip-content ti-main-tooltip-content !py-4 !px-4 !bg-primary !text-white" role="tooltip">
                                       <p>The Icon Popover</p>
                                      </div>
                                    </a>
                               </div>
                               <div class="hs-tooltip ti-main-tooltip !max-w-[276px] [--trigger:click] [--placement:left]">
                                <a class="hs-tooltip-toggle ti-main-tooltip-toggle" href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-secondary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                    <div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary !text-white !py-4 !px-4" role="tooltip">
                                        <p>The Icon Popover</p>
                                  </div>
                                </a>
                              </div>
                           </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="hs-tooltip ti-main-tooltip me-6 !max-w-[276px] [--trigger:click] [--placement:top]"&gt;
      &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle" href="javascript:void(0);"&gt;
          &lt;svg xmlns="http://www.w3.org/2000/svg" class="svg-primary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"&gt;&lt;path d="M0 0h24v24H0V0z" fill="none"/&gt;&lt;path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/&gt;&lt;/svg&gt;
        &lt;div class="hs-tooltip-content ti-main-tooltip-content !py-4 !px-4 !bg-primary !text-white" role="tooltip"&gt;
         &lt;p&gt;The Icon Popover&lt;/p&gt;
        &lt;/div&gt;
      &lt;/a&gt;
    &lt;/div&gt;
    &lt;div class="hs-tooltip ti-main-tooltip !max-w-[276px] [--trigger:click] [--placement:left]"&gt;
    &lt;a class="hs-tooltip-toggle ti-main-tooltip-toggle" href="javascript:void(0);"&gt;
      &lt;svg xmlns="http://www.w3.org/2000/svg" class="fill-secondary" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"&gt;&lt;path d="M0 0h24v24H0V0z" fill="none"/&gt;&lt;path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/&gt;&lt;/svg&gt;
      &lt;div class="hs-tooltip-content ti-main-tooltip-content !bg-secondary !text-white !py-4 !px-4" role="tooltip"&gt;
          &lt;p&gt;The Icon Popover&lt;/p&gt;
    &lt;/div&gt;
    &lt;/a&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-4 -->

@endsection

@section('scripts')
   
        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')
        
          
@endsection