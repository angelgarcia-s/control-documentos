@extends('layouts.master')

@section('styles')
 
        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')

                <!-- Page Header -->
                <div class="block justify-between page-header md:flex">
                    <div>
                        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Avatars</h3>
                    </div>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-[0.813rem] ps-[0.5rem]">
                          <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                            Utilities
                            <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                          </a>
                        </li>
                        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                          Avatars
                        </li>
                    </ol>
                </div>
                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatars
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body py-4">
                                <span class="avatar me-2 avatar-radius-0">
                                    <img src="{{asset('build/assets/images/faces/1.jpg')}}" alt="img">
                                </span>
                                <span class="avatar me-2">
                                    <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                </span>
                                <span class="avatar me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;span class="avatar me-2 avatar-radius-0"&gt;
    &lt;img src="{{asset('build/assets/images/faces/1.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img"&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatar Sizes
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Avatars of different sizes
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-sm me-2">
                                    <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-md me-2">
                                    <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-lg me-2">
                                    <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl me-2">
                                    <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xxl me-2">
                                    <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img">
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;span class="avatar avatar-xs me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-sm me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-md me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-lg me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xl me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xxl me-2"&gt;
    &lt;img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img"&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatar With Icons
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Avatar contains icons to perform respective action.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge bg-success rounded-full avatar-badge"><i class="fe fe-camera text-[.5rem]"></i></a>
                                </span>
                                <span class="avatar avatar-sm me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-secondary avatar-badge"><i class="fe fe-edit text-[.5rem]"></i></a>
                                </span>
                                <span class="avatar avatar-md me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-warning avatar-badge"><i class="fe fe-plus text-[.5rem]"></i></a>
                                </span>
                                <span class="avatar avatar-lg me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-info avatar-badge"><i class="fe fe-edit text-[.625rem]"></i></a>
                                </span>
                                <span class="avatar avatar-xl me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-success avatar-badge"><i class="fe fe-camera text-[.625rem]"></i></a>
                                </span>
                                <span class="avatar avatar-xxl me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img">
                                    <a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-danger avatar-badge"><i class="fe fe-plus text-[.625rem]"></i></a>
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html"> &lt;span class="avatar avatar-xs me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge bg-success rounded-full avatar-badge"&gt;&lt;i class="fe fe-camera text-[.5rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-sm me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-secondary avatar-badge"&gt;&lt;i class="fe fe-edit text-[.5rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-md me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-warning avatar-badge"&gt;&lt;i class="fe fe-plus text-[.5rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-lg me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-info avatar-badge"&gt;&lt;i class="fe fe-edit text-[.625rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xl me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-success avatar-badge"&gt;&lt;i class="fe fe-camera text-[.625rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xxl me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img"&gt;
    &lt;a aria-label="anchor" href="javascript:void(0);" class="badge rounded-full bg-danger avatar-badge"&gt;&lt;i class="fe fe-plus text-[.625rem]"&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-1 -->

                <!-- Start::row-2 -->
                <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatar With Online Status Indicators
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        avatars having online status indicator.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs me-2 online avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-sm online me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-md me-2 online avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-lg me-2 online avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl me-2 online avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xxl me-2 online avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;span class="avatar avatar-xs me-2 online avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-sm online me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-md me-2 online avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-lg me-2 online avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xl me-2 online avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xxl me-2 online avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img"&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatar With Ofline Status Indicators
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        avatars having a offline status indicator.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs me-2 offline avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-sm offline me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-md me-2 offline avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-lg me-2 offline avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xl me-2 offline avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                </span>
                                <span class="avatar avatar-xxl me-2 offline avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img">
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;span class="avatar avatar-xs me-2 offline avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-sm offline me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-md me-2 offline avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-lg me-2 offline avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xl me-2 offline avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img"&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xxl me-2 offline avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img"&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatars With Number Badges
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Avatar numbers indicates the no. of unread notififactions/messages.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-primary avatar-badge">2</span>
                                </span>
                                <span class="avatar avatar-sm me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-secondary avatar-badge">5</span>
                                </span>
                                <span class="avatar avatar-md me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-warning avatar-badge">1</span>
                                </span>
                                <span class="avatar avatar-lg me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-info avatar-badge">7</span>
                                </span>
                                <span class="avatar avatar-xl me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-success avatar-badge">3</span>
                                </span>
                                <span class="avatar avatar-xxl me-2 avatar-rounded">
                                    <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img">
                                    <span class="badge rounded-full bg-danger avatar-badge">9</span>
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html"> &lt;span class="avatar avatar-xs me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-primary avatar-badge"&gt;2&lt;/span&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-sm me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-secondary avatar-badge"&gt;5&lt;/span&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-md me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-warning avatar-badge"&gt;1&lt;/span&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-lg me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-info avatar-badge"&gt;7&lt;/span&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xl me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-success avatar-badge"&gt;3&lt;/span&gt;
&lt;/span&gt;
&lt;span class="avatar avatar-xxl me-2 avatar-rounded"&gt;
    &lt;img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img"&gt;
    &lt;span class="badge rounded-full bg-danger avatar-badge"&gt;9&lt;/span&gt;
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-2 -->

                <!-- Start::row-3 -->
                <div class="grid grid-cols-12 gap-6">
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Avatar With Initials
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Avatar contains intials when user profile doesn't exist.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <span class="avatar avatar-xs m-2 bg-primary">
                                    xs
                                </span>
                                <span class="avatar avatar-sm m-2 bg-secondary">
                                    SM
                                </span>
                                <span class="avatar avatar-md m-2 bg-warning">
                                    MD
                                </span>
                                <span class="avatar avatar-lg m-2 bg-danger">
                                    LG
                                </span>
                                <span class="avatar avatar-xl m-2 bg-success">
                                    XL
                                </span>
                                <span class="avatar avatar-xxl m-2 bg-info">
                                    XXL
                                </span>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;span class="avatar avatar-xs m-2 bg-primary"&gt;
    xs
&lt;/span&gt;
&lt;span class="avatar avatar-sm m-2 bg-secondary"&gt;
    SM
&lt;/span&gt;
&lt;span class="avatar avatar-md m-2 bg-warning"&gt;
    MD
&lt;/span&gt;
&lt;span class="avatar avatar-lg m-2 bg-danger"&gt;
    LG
&lt;/span&gt;
&lt;span class="avatar avatar-xl m-2 bg-success"&gt;
    XL
&lt;/span&gt;
&lt;span class="avatar avatar-xxl m-2 bg-info"&gt;
    XXL
&lt;/span&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Stacked Avatars
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Group of avatars stacked together.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="avatar-list-stacked">
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar">
                                        <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                    </span>
                                    <a class="avatar bg-primary text-white" href="javascript:void(0);">
                                        +8
                                    </a>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="avatar-list-stacked"&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar"&gt;
            &lt;img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;a class="avatar bg-primary text-white" href="javascript:void(0);"&gt;
            +8
        &lt;/a&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Rounded Stacked Avatars
                                    <p class="subtitle text-muted text-[0.75rem] font-normal">
                                        Group of avatars stacked together.
                                    </p>
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="avatar-list-stacked">
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                    </span>
                                    <span class="avatar avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                    </span>
                                    <a class="avatar bg-primary avatar-rounded text-white" href="javascript:void(0);">
                                        +8
                                    </a>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="avatar-list-stacked"&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;span class="avatar avatar-rounded"&gt;
            &lt;img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img"&gt;
        &lt;/span&gt;
        &lt;a class="avatar bg-primary avatar-rounded text-white" href="javascript:void(0);"&gt;
            +8
        &lt;/a&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-3 -->

@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')

@endsection