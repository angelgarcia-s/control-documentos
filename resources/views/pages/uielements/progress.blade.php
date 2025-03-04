@extends('layouts.master')

@section('styles')

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')
 
                    <!-- Page Header -->
                    <div class="block justify-between page-header md:flex">
                        <div>
                            <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Progress</h3>
                        </div>
                        <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[0.813rem] ps-[0.5rem]">
                              <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                               Ui Elements
                                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                              </a>
                            </li>
                            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                Progress
                            </li>
                        </ol>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start:: row-1 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Basic Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4 !rounded-full" >
                                        <div class="progress-bar w-0"></div>
                                    </div>
                                    <div class="progress mb-4 " >
                                        <div class="progress-bar !rounded-s-full w-1/4"></div>
                                    </div>
                                    <div class="progress mb-4 !rounded-full" >
                                        <div class="progress-bar !rounded-s-full w-1/2"></div>
                                    </div>
                                    <div class="progress mb-4 !rounded-full" >
                                        <div class="progress-bar !rounded-s-full w-3/4"></div>
                                    </div>
                                    <div class="progress mb-0 !rounded-full" >
                                        <div class="progress-bar !rounded-s-full w-full"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
    <!-- Prism Code -->
    <pre class="language-html"><code class="language-html">
    &lt;div class="progress mb-4 !rounded-full" &gt;
    &lt;div class="progress-bar w-0"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4 " &gt;
    &lt;div class="progress-bar !rounded-s-full w-1/4"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4 !rounded-full" &gt;
    &lt;div class="progress-bar !rounded-s-full w-1/2"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4 !rounded-full" &gt;
    &lt;div class="progress-bar !rounded-s-full w-3/4"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-0 !rounded-full" &gt;
    &lt;div class="progress-bar !rounded-s-full w-full"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
    <!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Different Colored Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-secondary !rounded-s-full w-1/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-warning !rounded-s-full w-2/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-info !rounded-s-full w-3/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-success !rounded-s-full w-4/5"></div>
                                    </div>
                                    <div class="progress" >
                                        <div class="progress-bar !bg-danger !rounded-s-full w-full"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar !bg-secondary !rounded-s-full w-1/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4"&gt;
        &lt;div class="progress-bar !bg-warning !rounded-s-full w-2/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4"&gt;
        &lt;div class="progress-bar !bg-info !rounded-s-full w-3/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4"&gt;
        &lt;div class="progress-bar !bg-success !rounded-s-full w-4/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress"&gt;
        &lt;div class="progress-bar !bg-danger !rounded-s-full w-full"&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-1 -->

                    <!-- Start:: row-2 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Striped Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4" >
                                        <div class="progress-bar progress-bar-striped w-[10%]">
                                        </div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar progress-bar-striped !bg-secondary !rounded-s-full w-1/4">
                                        </div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar progress-bar-striped !bg-success !rounded-s-full w-2/4">
                                        </div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar progress-bar-striped !bg-info !rounded-s-full w-3/4">
                                        </div>
                                    </div>
                                    <div class="progress" >
                                        <div class="progress-bar progress-bar-striped !bg-warning !rounded-s-full w-full"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html"> &lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar progress-bar-striped w-[10%]"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar progress-bar-striped !bg-secondary !rounded-s-full w-1/4"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar progress-bar-striped !bg-success !rounded-s-full w-2/4"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar progress-bar-striped !bg-info !rounded-s-full w-3/4"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress" &gt;
    &lt;div class="progress-bar progress-bar-striped !bg-warning !rounded-s-full w-full"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Progress Height
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress progress-xs mb-4" >
                                        <div class="progress-bar bg-primary !rounded-s-full w-[10%]">
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mb-4" >
                                        <div class="progress-bar bg-primary !rounded-s-full w-1/4">
                                        </div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-primary !rounded-s-full w-2/4">
                                        </div>
                                    </div>
                                    <div class="progress progress-lg mb-4" >
                                        <div class="progress-bar bg-primary !rounded-s-full w-3/4">
                                        </div>
                                    </div>
                                    <div class="progress progress-xl" >
                                        <div class="progress-bar bg-primary !rounded-s-full w-full"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="progress progress-xs mb-4" &gt;
        &lt;div class="progress-bar bg-primary !rounded-s-full w-[10%]"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress progress-sm mb-4" &gt;
        &lt;div class="progress-bar bg-primary !rounded-s-full w-1/4"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar bg-primary !rounded-s-full w-2/4"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress progress-lg mb-4" &gt;
        &lt;div class="progress-bar bg-primary !rounded-s-full w-3/4"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress progress-xl" &gt;
        &lt;div class="progress-bar bg-primary !rounded-s-full w-full"&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-2 -->

                    <!-- Start:: row-3 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header flex justify-between">
                                    <div class="box-title">
                                        Progress With Labels
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !rounded-s-full w-[10%]">10%</div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-secondary !rounded-s-full w-1/5">20%</div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-success !rounded-s-full w-2/5">40%</div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar !bg-info !rounded-s-full w-3/5">60%</div>
                                    </div>
                                    <div class="progress mb-0" >
                                        <div class="progress-bar !bg-warning !rounded-s-full w-4/5">80%</div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar !rounded-s-full w-[10%]"&gt;10%&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar !bg-secondary !rounded-s-full w-1/5"&gt;20%&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar !bg-success !rounded-s-full w-2/5"&gt;40%&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar !bg-info !rounded-s-full w-3/5"&gt;60%&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-0" &gt;
        &lt;div class="progress-bar !bg-warning !rounded-s-full w-4/5"&gt;80%&lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Multiple bars With Sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress-stacked progress-xs mb-4 flex">
                                        <div class="progress-bar w-[5%]" ></div>
                                        <div class="progress-bar !bg-secondary !rounded-none w-[10%]" ></div>
                                        <div class="progress-bar !bg-success !rounded-none w-[15%]" ></div>
                                    </div>
                                    <div class="progress-stacked progress-sm mb-4 flex">
                                        <div class="progress-bar !bg-warning w-[10%]" ></div>
                                        <div class="progress-bar !bg-info !rounded-none w-[15%]" ></div>
                                        <div class="progress-bar !bg-danger !rounded-none w-[20%]" ></div>
                                    </div>
                                    <div class="progress-stacked mb-4 flex">
                                        <div class="progress-bar !bg-info w-[15%]" ></div>
                                        <div class="progress-bar !bg-success !rounded-none w-1/5" ></div>
                                        <div class="progress-bar !rounded-none w-1/4" ></div>
                                    </div>
                                    <div class="progress-stacked progress-lg mb-4 flex">
                                        <div class="progress-bar !bg-purple w-1/5" ></div>
                                        <div class="progress-bar !bg-teal !rounded-none w-1/4" ></div>
                                        <div class="progress-bar !bg-orange !rounded-none w-[30%]" ></div>
                                    </div>
                                    <div class="progress-stacked progress-xl mb-0 flex">
                                        <div class="progress-bar !bg-success w-1/4" ></div>
                                        <div class="progress-bar !bg-danger !rounded-none w-[30%]" ></div>
                                        <div class="progress-bar !bg-warning !rounded-none w-[35%]" ></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="progress-stacked progress-xs mb-4 flex"&gt;
        &lt;div class="progress-bar w-[5%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-secondary !rounded-none w-[10%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-success !rounded-none w-[15%]" &gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress-stacked progress-sm mb-4 flex"&gt;
        &lt;div class="progress-bar !bg-warning w-[10%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-info !rounded-none w-[15%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-danger !rounded-none w-[20%]" &gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress-stacked mb-4 flex"&gt;
        &lt;div class="progress-bar !bg-info w-[15%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-success !rounded-none w-1/5" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !rounded-none w-1/4" &gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress-stacked progress-lg mb-4 flex"&gt;
        &lt;div class="progress-bar !bg-purple w-1/5" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-teal !rounded-none w-1/4" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-orange !rounded-none w-[30%]" &gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress-stacked progress-xl mb-0 flex"&gt;
        &lt;div class="progress-bar !bg-success w-1/4" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-danger !rounded-none w-[30%]" &gt;&lt;/div&gt;
        &lt;div class="progress-bar !bg-warning !rounded-none w-[35%]" &gt;&lt;/div&gt;
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
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Animated Stripped Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4" >
                                        <div class="progress-bar progress-bar-striped progress-bar-animated w-[10%]"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated w-1/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated w-2/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated w-3/5"></div>
                                    </div>
                                    <div class="progress" >
                                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated w-4/5"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar progress-bar-striped progress-bar-animated w-[10%]"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated w-1/5"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar bg-success progress-bar-striped progress-bar-animated w-2/5"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress mb-4" &gt;
    &lt;div class="progress-bar bg-info progress-bar-striped progress-bar-animated w-3/5"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress" "&gt;
    &lt;div class="progress-bar bg-warning progress-bar-striped progress-bar-animated w-4/5"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Gradient Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-primary-gradient w-[10%]"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-secondary-gradient w-1/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-success-gradient w-2/5"></div>
                                    </div>
                                    <div class="progress mb-4" >
                                        <div class="progress-bar bg-info-gradient w-3/5"></div>
                                    </div>
                                    <div class="progress" >
                                        <div class="progress-bar bg-warning-gradient w-4/5"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar bg-primary-gradient w-[10%]"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar bg-secondary-gradient w-1/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" &gt;
        &lt;div class="progress-bar bg-success-gradient w-2/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"&gt;
        &lt;div class="progress-bar bg-info-gradient w-3/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress" &gt;
        &lt;div class="progress-bar bg-warning-gradient w-4/5"&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-4 -->

                    <!-- Start:: row-5 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Animated Progress
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress mb-4 progress-animate" >
                                        <div class="progress-bar bg-primary-gradient w-[10%]"></div>
                                    </div>
                                    <div class="progress mb-4 progress-animate" >
                                        <div class="progress-bar bg-secondary-gradient w-1/5"></div>
                                    </div>
                                    <div class="progress mb-4 progress-animate" >
                                        <div class="progress-bar bg-success-gradient w-2/5"></div>
                                    </div>
                                    <div class="progress mb-4 progress-animate" >
                                        <div class="progress-bar bg-info-gradient w-3/5"></div>
                                    </div>
                                    <div class="progress progress-animate" >
                                        <div class="progress-bar bg-warning-gradient w-4/5"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="progress mb-4 progress-animate" &gt;
        &lt;div class="progress-bar bg-primary-gradient w-[10%]"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4 progress-animate" &gt;
        &lt;div class="progress-bar bg-secondary-gradient w-1/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4 progress-animate" &gt;
        &lt;div class="progress-bar bg-success-gradient w-2/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress mb-4 progress-animate" &gt;
        &lt;div class="progress-bar bg-info-gradient w-3/5"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="progress progress-animate" &gt;
        &lt;div class="progress-bar bg-warning-gradient w-4/5"&gt;&lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Progress-1
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress progress-sm progress-custom mb-[3rem] progress-animate" >
                                        <h6 class="progress-bar-title text-[1rem]">Mobiles</h6>
                                        <div class="progress-bar w-1/2">
                                            <div class="progress-bar-value !bg-primary">50%</div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm progress-custom mb-[3rem] progress-animate" >
                                        <h6 class="progress-bar-title !bg-secondary text-[1rem] after:!border-s-secondary">Watches</h6>
                                        <div class="progress-bar progress-secondary w-3/5">
                                            <div class="progress-bar-value !bg-secondary">60%</div>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm progress-custom progress-animate" >
                                        <h6 class="progress-bar-title !bg-success text-[1rem] after:!border-s-success">Shirts</h6>
                                        <div class="progress-bar progress-success w-[70%]">
                                            <div class="progress-bar-value !bg-success">70%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html"> &lt;div class="progress progress-sm progress-custom mb-[3rem] progress-animate" &gt;
    &lt;h6 class="progress-bar-title text-[1rem]"&gt;Mobiles&lt;/h6&gt;
    &lt;div class="progress-bar w-1/2"&gt;
        &lt;div class="progress-bar-value !bg-primary"&gt;50%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm progress-custom mb-[3rem] progress-animate" &gt;
    &lt;h6 class="progress-bar-title !bg-secondary text-[1rem] after:!border-s-secondary"&gt;Watches&lt;/h6&gt;
    &lt;div class="progress-bar progress-secondary w-3/5"&gt;
        &lt;div class="progress-bar-value !bg-secondary"&gt;60%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm progress-custom progress-animate" "&gt;
    &lt;h6 class="progress-bar-title !bg-success text-[1rem] after:!border-s-success"&gt;Shirts&lt;/h6&gt;
    &lt;div class="progress-bar progress-success w-[70%]"&gt;
        &lt;div class="progress-bar-value !bg-success"&gt;70%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-5 -->

                    <!-- Start:: row-6 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Progress-2
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress progress-sm mb-4" >
                                        <div class="progress-item-1 !bg-primary"></div><div class="progress-item-2"></div><div class="progress-item-3"></div>
                                        <div class="progress-bar w-1/2"></div>
                                    </div>
                                    <div class="progress progress-sm mb-4" >
                                        <div class="progress-item-1 !bg-secondary"></div><div class="progress-item-2 !bg-secondary"></div><div class="progress-item-3"></div>
                                        <div class="progress-bar !bg-secondary w-3/5"></div>
                                    </div>
                                    <div class="progress progress-sm mb-4" >
                                        <div class="progress-item-1 !bg-success"></div><div class="progress-item-2 !bg-success"></div><div class="progress-item-3"></div>
                                        <div class="progress-bar !bg-success w-[70%]"></div>
                                    </div>
                                    <div class="progress progress-sm mb-4" >
                                        <div class="progress-item-1 !bg-info"></div><div class="progress-item-2 !bg-info"></div><div class="progress-item-3 !bg-info"></div>
                                        <div class="progress-bar !bg-info w-4/5"></div>
                                    </div>
                                    <div class="progress progress-sm" >
                                        <div class="progress-item-1 !bg-warning"></div><div class="progress-item-2 !bg-warning"></div><div class="progress-item-3 !bg-warning"></div>
                                        <div class="progress-bar !bg-warning w-[90%]"></div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="progress progress-sm mb-4" &gt;
    &lt;div class="progress-item-1 !bg-primary"&gt;&lt;/div&gt;&lt;div class="progress-item-2"&gt;&lt;/div&gt;&lt;div class="progress-item-3"&gt;&lt;/div&gt;
    &lt;div class="progress-bar w-1/2"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm mb-4" aria-valuenow="60" &gt;
    &lt;div class="progress-item-1 !bg-secondary"&gt;&lt;/div&gt;&lt;div class="progress-item-2 !bg-secondary"&gt;&lt;/div&gt;&lt;div class="progress-item-3"&gt;&lt;/div&gt;
    &lt;div class="progress-bar !bg-secondary w-3/5"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm mb-4" aria-valuenow="70" &gt;
    &lt;div class="progress-item-1 !bg-success"&gt;&lt;/div&gt;&lt;div class="progress-item-2 !bg-success"&gt;&lt;/div&gt;&lt;div class="progress-item-3"&gt;&lt;/div&gt;
    &lt;div class="progress-bar !bg-success w-[70%]"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm mb-4" aria-valuenow="80" &gt;
    &lt;div class="progress-item-1 !bg-info"&gt;&lt;/div&gt;&lt;div class="progress-item-2 !bg-info"&gt;&lt;/div&gt;&lt;div class="progress-item-3 !bg-info"&gt;&lt;/div&gt;
    &lt;div class="progress-bar !bg-info w-4/5"&gt;&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-sm" aria-valuenow="90" &gt;
    &lt;div class="progress-item-1 !bg-warning"&gt;&lt;/div&gt;&lt;div class="progress-item-2 !bg-warning"&gt;&lt;/div&gt;&lt;div class="progress-item-3 !bg-warning"&gt;&lt;/div&gt;
    &lt;div class="progress-bar !bg-warning w-[90%]"&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Progress-3
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress progress-lg mb-[3rem] custom-progress-3 progress-animate" >
                                        <div class="progress-bar w-1/2">
                                            <div class="progress-bar-value">50%</div>
                                        </div>
                                    </div>
                                    <div class="progress progress-lg mb-[3rem] custom-progress-3 progress-animate" >
                                        <div class="progress-bar !bg-secondary w-3/5">
                                            <div class="progress-bar-value secondary">60%</div>
                                        </div>
                                    </div>
                                    <div class="progress progress-lg custom-progress-3 progress-animate" >
                                        <div class="progress-bar !bg-success w-[70%]">
                                            <div class="progress-bar-value success">70%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="progress progress-lg mb-[3rem] custom-progress-3 progress-animate" &gt;
    &lt;div class="progress-bar w-1/2"&gt;
        &lt;div class="progress-bar-value"&gt;50%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-lg mb-[3rem] custom-progress-3 progress-animate" &gt;
    &lt;div class="progress-bar !bg-secondary w-3/5"&gt;
        &lt;div class="progress-bar-value secondary"&gt;60%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-lg custom-progress-3 progress-animate" &gt;
    &lt;div class="progress-bar !bg-success w-[70%]"&gt;
        &lt;div class="progress-bar-value success"&gt;70%&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-6 -->

                    <!-- Start:: row-7 -->
                    <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Progress-4
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="progress progress-xl mb-4 progress-animate custom-progress-4" >
                                        <div class="progress-bar bg-primary-gradient !rounded-sm w-[10%]"></div>
                                        <div class="progress-bar-label">10%</div>
                                    </div>
                                    <div class="progress progress-xl mb-4 progress-animate custom-progress-4 secondary" >
                                        <div class="progress-bar bg-secondary-gradient !rounded-sm w-1/5"></div>
                                            <div class="progress-bar-label">20%</div>
                                    </div>
                                    <div class="progress progress-xl mb-4 progress-animate custom-progress-4 success" >
                                        <div class="progress-bar bg-success-gradient !rounded-sm w-2/5"></div>
                                            <div class="progress-bar-label">40%</div>
                                    </div>
                                    <div class="progress progress-xl mb-4 progress-animate custom-progress-4 info" >
                                        <div class="progress-bar bg-info-gradient !rounded-sm w-3/5"></div>
                                            <div class="progress-bar-label">60%</div>
                                    </div>
                                    <div class="progress progress-xl mb-4 progress-animate custom-progress-4 warning" >
                                        <div class="progress-bar bg-warning-gradient !rounded-sm w-4/5"></div>
                                            <div class="progress-bar-label">80%</div>
                                    </div>
                                    <div class="progress progress-xl progress-animate custom-progress-4 danger" >
                                        <div class="progress-bar bg-danger-gradient !rounded-sm w-[90%]"></div>
                                            <div class="progress-bar-label">90%</div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="progress progress-xl mb-4 progress-animate custom-progress-4" &gt;
    &lt;div class="progress-bar bg-primary-gradient !rounded-sm w-[10%]"&gt;&lt;/div&gt;
    &lt;div class="progress-bar-label"&gt;10%&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-xl mb-4 progress-animate custom-progress-4 secondary" "&gt;
    &lt;div class="progress-bar bg-secondary-gradient !rounded-sm w-1/5"&gt;&lt;/div&gt;
        &lt;div class="progress-bar-label"&gt;20%&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-xl mb-4 progress-animate custom-progress-4 success" &gt;
    &lt;div class="progress-bar bg-success-gradient !rounded-sm w-2/5"&gt;&lt;/div&gt;
        &lt;div class="progress-bar-label"&gt;40%&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-xl mb-4 progress-animate custom-progress-4 info" &gt;
    &lt;div class="progress-bar bg-info-gradient !rounded-sm w-3/5"&gt;&lt;/div&gt;
        &lt;div class="progress-bar-label"&gt;60%&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-xl mb-4 progress-animate custom-progress-4 warning" &gt;
    &lt;div class="progress-bar bg-warning-gradient !rounded-sm w-4/5"&gt;&lt;/div&gt;
        &lt;div class="progress-bar-label"&gt;80%&lt;/div&gt;
&lt;/div&gt;
&lt;div class="progress progress-xl progress-animate custom-progress-4 danger" &gt;
    &lt;div class="progress-bar bg-danger-gradient !rounded-sm w-[90%]"&gt;&lt;/div&gt;
        &lt;div class="progress-bar-label"&gt;90%&lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Custom Progress-5
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <h6 class="font-semibold mb-2">Project Dependencies</h6>
                                    <div class="progress-stacked progress-xl mb-[3rem] flex">
                                        <div class="progress-bar w-1/2" >25%</div>
                                        <div class="progress-bar !bg-secondary !rounded-none w-[35%]" >35%</div>
                                        <div class="progress-bar !bg-danger !rounded-s-none !rounded-e-full w-2/5" >40%</div>
                                    </div>
                                    <div class="grid grid-cols-12 justify-center">
                                        <div class="xl:col-span-5 col-span-12">
                                            <div class="border border-defaultborder dark:border-defaultborder/10 p-4 rounded-md">
                                                <p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50">Html<span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal">25%</span></p>
                                                <div class="progress progress-xs mb-4 progress-animate" >
                                                    <div class="progress-bar bg-primary w-1/2">
                                                    </div>
                                                </div>
                                                <p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50">Css<span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal">35%</span></p>
                                                <div class="progress progress-xs mb-4 progress-animate" >
                                                    <div class="progress-bar !rounded-none !bg-secondary w-[35%]">
                                                    </div>
                                                </div>
                                                <p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50">Js<span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal">40%</span></p>
                                                <div class="progress progress-xs mb-0 progress-animate" >
                                                    <div class="progress-bar !rounded-e-full !bg-danger w-2/5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html"> 
    &lt;h6 class="font-semibold mb-2"&gt;Project Dependencies&lt;/h6&gt;
    &lt;div class="progress-stacked progress-xl mb-[3rem] flex"&gt;
        &lt;div class="progress-bar w-1/2"
            &gt;25%&lt;/div&gt;
        &lt;div class="progress-bar !bg-secondary !rounded-none w-[35%]"
            &gt;35%&lt;/div&gt;
        &lt;div class="progress-bar !bg-danger !rounded-s-none !rounded-e-full w-2/5"
            &gt;40%&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="grid grid-cols-12 justify-center"&gt;
        &lt;div class="xl:col-span-5 col-span-12"&gt;
            &lt;div class="border p-4"&gt;
                &lt;p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50"&gt;Html&lt;span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal"&gt;25%&lt;/span&gt;&lt;/p&gt;
                &lt;div class="progress progress-xs mb-4 progress-animate" &gt;
                    &lt;div class="progress-bar bg-primary w-1/2"&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50"&gt;Css&lt;span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal"&gt;35%&lt;/span&gt;&lt;/p&gt;
                &lt;div class="progress progress-xs mb-4 progress-animate " &gt;
                    &lt;div class="progress-bar !rounded-none !bg-secondary w-[35%]"&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;p class="text-[0.75rem] font-semibold mb-0 text-[#8c9097] dark:text-white/50"&gt;Js&lt;span class="ltr:float-right rtl:float-left text-[0.625rem] font-normal"&gt;40%&lt;/span&gt;&lt;/p&gt;
                &lt;div class="progress progress-xs mb-0 progress-animate " &gt;
                    &lt;div class="progress-bar !rounded-e-full !bg-danger w-2/5"&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-7 -->

@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')

@endsection