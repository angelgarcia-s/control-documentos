@extends('layouts.master')

@section('styles')
 
        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')

                    <!-- Page Header -->
                    <div class="block justify-between page-header md:flex">
                        <div>
                            <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Buttons</h3>
                        </div>
                        <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[0.813rem] ps-[0.5rem]">
                              <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                              Ui Elements
                                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                              </a>
                            </li>
                            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                Buttons
                            </li>
                        </ol>
                    </div>
                    <!-- Page Header Close -->

                <!--ROW-START-->
                <div class="grid grid-cols-12 gap-x-6">
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Default Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-light ti-btn-wave">Light</button>
                                    <button type="button" class="ti-btn ti-btn-dark ti-btn-wave text-white">Dark</button>
                                    <button type="button" class="ti-btn ti-btn-link ti-btn-wave">Link</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" class="ti-btn ti-btn-primary-full ti-btn-wave"&gt;Primary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-secondary-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-success-full ti-btn-wave"&gt;Success&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-danger-full ti-btn-wave"&gt;Danger&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-warning-full ti-btn-wave"&gt;Warning&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-info-full ti-btn-wave"&gt;Info&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-light ti-btn-wave"&gt;Light&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-dark ti-btn-wave text-white"&gt;Dark&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-link ti-btn-wave"&gt;Link&lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Rounded Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-full !rounded-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary-full !rounded-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success-full !rounded-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger-full !rounded-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning-full !rounded-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info-full !rounded-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-light !rounded-full ti-btn-wave">Light</button>
                                    <button type="button" class="ti-btn ti-btn-dark !rounded-full ti-btn-wave text-white">Dark</button>
                                    <button type="button" class="ti-btn ti-btn-link !rounded-full ti-btn-wave">Link</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary-full !rounded-full ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary-full !rounded-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success-full !rounded-full ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger-full !rounded-full ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning-full !rounded-full ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info-full !rounded-full ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-light !rounded-full ti-btn-wave"&gt;Light&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-dark !rounded-full ti-btn-wave text-white"&gt;Dark&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-link !rounded-full ti-btn-wave"&gt;Link&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Light Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-purple ti-btn-wave">purple</button>
                                    <button type="button" class="ti-btn ti-btn-teal ti-btn-wave">teal</button>
                                    <button type="button" class="ti-btn ti-btn-orange ti-btn-wave">orange</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-purple ti-btn-wave"&gt;purple&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-teal ti-btn-wave"&gt;teal&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-orange ti-btn-wave"&gt;orange&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Light Rounded Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary !rounded-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary !rounded-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success !rounded-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger !rounded-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning !rounded-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info !rounded-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-purple !rounded-full ti-btn-wave">purple</button>
                                    <button type="button" class="ti-btn ti-btn-teal !rounded-full ti-btn-wave">teal</button>
                                    <button type="button" class="ti-btn ti-btn-orange !rounded-full ti-btn-wave">orange</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary !rounded-full ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary !rounded-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success !rounded-full ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger !rounded-full ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning !rounded-full ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info !rounded-full ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-purple !rounded-full ti-btn-wave"&gt;purple&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-teal !rounded-full ti-btn-wave"&gt;teal&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-orange !rounded-full ti-btn-wave"&gt;orange&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Outline Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-outline-primary ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-outline-success ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-outline-danger ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-outline-warning ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-outline-info ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-outline-light ti-btn-wave">Light</button>
                                    <button type="button" class="ti-btn ti-btn-outline-dark ti-btn-wave">Dark</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-primary ti-btn-wave"&gt;Primary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-wave"&gt;Secondary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-success ti-btn-wave"&gt;Success&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-danger ti-btn-wave"&gt;Danger&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-warning ti-btn-wave"&gt;Warning&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-info ti-btn-wave"&gt;Info&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-light ti-btn-wave"&gt;Light&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-dark ti-btn-wave"&gt;Dark&lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Rounded Outline Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-outline-primary !rounded-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-outline-secondary !rounded-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-outline-success !rounded-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-outline-danger !rounded-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-outline-warning !rounded-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-outline-info !rounded-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-outline-light !rounded-full ti-btn-wave">Light</button>
                                    <button type="button" class="ti-btn ti-btn-outline-dark !rounded-full ti-btn-wave">Dark</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-primary !rounded-full ti-btn-wave"&gt;Primary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-secondary !rounded-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-success !rounded-full ti-btn-wave"&gt;Success&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-danger !rounded-full ti-btn-wave"&gt;Danger&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-warning !rounded-full ti-btn-wave"&gt;Warning&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-info !rounded-full ti-btn-wave"&gt;Info&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-light !rounded-full ti-btn-wave"&gt;Light&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-dark !rounded-full ti-btn-wave"&gt;Dark&lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Gradient Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-gradient ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary-gradient ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success-gradient ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger-gradient ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning-gradient ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info-gradient ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-orange-gradient ti-btn-wave">Orange</button>
                                    <button type="button" class="ti-btn ti-btn-purple-gradient ti-btn-wave">Purple</button>
                                    <button type="button" class="ti-btn ti-btn-teal-gradient ti-btn-wave">Teal</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" class="ti-btn ti-btn-primary-gradient ti-btn-wave"&gt;Primary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-secondary-gradient ti-btn-wave"&gt;Secondary&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-success-gradient ti-btn-wave"&gt;Success&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-danger-gradient ti-btn-wave"&gt;Danger&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-warning-gradient ti-btn-wave"&gt;Warning&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-info-gradient ti-btn-wave"&gt;Info&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-orange-gradient ti-btn-wave"&gt;Orange&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-purple-gradient ti-btn-wave"&gt;Purple&lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-teal-gradient ti-btn-wave"&gt;Teal&lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Rounded Gradient Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-gradient !rounded-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-secondary-gradient !rounded-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-success-gradient !rounded-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-danger-gradient !rounded-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-warning-gradient !rounded-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-info-gradient !rounded-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-orange-gradient !rounded-full ti-btn-wave">Orange</button>
                                    <button type="button" class="ti-btn ti-btn-purple-gradient !rounded-full ti-btn-wave">Purple</button>
                                    <button type="button" class="ti-btn ti-btn-teal-gradient !rounded-full ti-btn-wave">Teal</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary-gradient !rounded-full ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary-gradient !rounded-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success-gradient !rounded-full ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger-gradient !rounded-full ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning-gradient !rounded-full ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info-gradient !rounded-full ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-orange-gradient !rounded-full ti-btn-wave"&gt;Orange&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-purple-gradient !rounded-full ti-btn-wave"&gt;Purple&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-teal-gradient !rounded-full ti-btn-wave"&gt;Teal&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Ghost Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-ghost-primary ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-secondary ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-success ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-danger ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-warning ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-info ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-orange ti-btn-wave">Orange</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-purple ti-btn-wave">Purple</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-teal ti-btn-wave">Teal</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-primary ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-secondary ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-success ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-danger ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-warning ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-info ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-orange ti-btn-wave"&gt;Orange&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-purple ti-btn-wave"&gt;Purple&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-teal ti-btn-wave"&gt;Teal&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                   Rounded Ghost Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-ghost-primary !rounded-full ti-btn-wave">Primary</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-secondary !rounded-full ti-btn-wave">Secondary</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-success !rounded-full ti-btn-wave">Success</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-danger !rounded-full ti-btn-wave">Danger</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-warning !rounded-full ti-btn-wave">Warning</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-info !rounded-full ti-btn-wave">Info</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-orange !rounded-full ti-btn-wave">Orange</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-purple !rounded-full ti-btn-wave">Purple</button>
                                    <button type="button" class="ti-btn ti-btn-ghost-teal !rounded-full ti-btn-wave">Teal</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-primary !rounded-full ti-btn-wave"&gt;Primary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-secondary !rounded-full ti-btn-wave"&gt;Secondary&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-success !rounded-full ti-btn-wave"&gt;Success&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-danger !rounded-full ti-btn-wave"&gt;Danger&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-warning !rounded-full ti-btn-wave"&gt;Warning&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-info !rounded-full ti-btn-wave"&gt;Info&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-orange !rounded-full ti-btn-wave"&gt;Orange&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-purple !rounded-full ti-btn-wave"&gt;Purple&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-ghost-teal !rounded-full ti-btn-wave"&gt;Teal&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Button tags
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <a class="ti-btn ti-btn-primary-full ti-btn-wave" href="javascript:void(0);">Link</a>
                                    <button class="ti-btn ti-btn-secondary-full ti-btn-wave" type="submit">Button</button>
                                    <input class="ti-btn ti-btn-info-full" type="button" value="Input">
                                    <input class="ti-btn ti-btn-warning-full" type="button" value="Submit">
                                    <input class="ti-btn ti-btn-success-full" type="button" value="Reset">
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;a class="ti-btn ti-btn-primary-full ti-btn-wave" href="javascript:void(0);"&gt;Link&lt;/a&gt;
    &lt;button class="ti-btn ti-btn-secondary-full ti-btn-wave" type="submit"&gt;Button&lt;/button&gt;
    &lt;input class="ti-btn ti-btn-info-full" type="button" value="Input"&gt;
    &lt;input class="ti-btn ti-btn-warning-full" type="button" value="Submit"&gt;
    &lt;input class="ti-btn ti-btn-success-full" type="button" value="Reset"&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    disabled state with anchor tags
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list flex">
                                    <div class="mb-4">
                                        <button type="button" class="ti-btn ti-btn-primary-full ti-btn-disabled">Primary
                                            button</button>
                                        <button type="button" class="ti-btn ti-btn-secondary-full ti-btn-disabled">Button</button>
                                        <button type="button" class="ti-btn ti-btn-outline-primary ti-btn-disabled">Primary
                                            button</button>
                                        <button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-disabled">Button</button>
                                    </div>

                                    <div>
                                        <a class="ti-btn ti-btn-primary ti-btn-disabled" aria-disabled="true">Primary
                                            link</a>
                                        <a class="ti-btn ti-btn-secondary ti-btn-disabled" aria-disabled="true">Link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list flex"&gt;
        &lt;div class="mb-4"&gt;
            &lt;button type="button" class="ti-btn ti-btn-primary-full ti-btn-disabled"&gt;Primary
                button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-secondary-full ti-btn-disabled"&gt;Button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-outline-primary ti-btn-disabled"&gt;Primary
                button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-disabled"&gt;Button&lt;/button&gt;
        &lt;/div&gt;

        &lt;div&gt;
            &lt;a class="ti-btn ti-btn-primary ti-btn-disabled" aria-disabled="true"&gt;Primary
                link&lt;/a&gt;
            &lt;a class="ti-btn ti-btn-secondary ti-btn-disabled" aria-disabled="true"&gt;Link&lt;/a&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Loading Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list md:flex flex-wrap">
                                    <button type="button" class="ti-btn ti-btn-primary-full ti-btn-loader m-2">
                                        <span class="me-2">Loading</span>
                                        <span class="loading"><i class="ri-loader-2-fill text-[1rem] animate-spin"></i></span>
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-loader m-2">
                                        <span class="me-2">Loading</span>
                                        <span class="loading"><i class="ri-loader-2-fill text-[1rem] animate-spin"></i></span>
                                    </button>
                                    <button type="button" class="ti-btn bg-info/10 text-info ti-btn-loader m-2">
                                        <span class="me-2">Loading</span>
                                        <span class="loading"><i class="ri-loader-4-line text-[1rem] animate-spin"></i></span>
                                    </button>
                                    <button type="button" class="ti-btn bg-warning/10 text-warning ti-btn-loader m-2">
                                        <span class="me-2">Loading</span>
                                        <span class="loading"><i class="ri-loader-5-line text-[1rem] animate-spin"></i></span>
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-success-full ti-btn-loader ti-btn-disabled m-2">
                                        <span class="me-2">Disabled</span>
                                        <span class="loading"><i class="ri-refresh-line text-[1rem] animate-spin"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list md:flex flex-wrap"&gt;
        &lt;button type="button" class="ti-btn ti-btn-primary-full ti-btn-loader m-2"&gt;
            &lt;span class="me-2"&gt;Loading&lt;/span&gt;
            &lt;span class="loading"&gt;&lt;i class="ri-loader-2-fill text-[1rem] animate-spin"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-outline-secondary ti-btn-loader m-2"&gt;
            &lt;span class="me-2"&gt;Loading&lt;/span&gt;
            &lt;span class="loading"&gt;&lt;i class="ri-loader-2-fill text-[1rem] animate-spin"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn bg-info/10 text-info ti-btn-loader m-2"&gt;
            &lt;span class="me-2"&gt;Loading&lt;/span&gt;
            &lt;span class="loading"&gt;&lt;i class="ri-loader-4-line text-[1rem] animate-spin"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn bg-warning/10 text-warning ti-btn-loader m-2"&gt;
            &lt;span class="me-2"&gt;Loading&lt;/span&gt;
            &lt;span class="loading"&gt;&lt;i class="ri-loader-5-line text-[1rem] animate-spin"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-success-full ti-btn-loader ti-btn-disabled m-2"&gt;
            &lt;span class="me-2"&gt;Disabled&lt;/span&gt;
            &lt;span class="loading"&gt;&lt;i class="ri-refresh-line text-[1rem] animate-spin"&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">Icon Buttons</div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list md:flex block">
                                    <div class="md:mb-0 mb-2">
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-primary-full ti-btn-wave">
                                            <i class="ri-bank-fill"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-info-full ti-btn-wave">
                                            <i class="ri-medal-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-danger-full ti-btn-wave">
                                            <i class="ri-archive-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-warning-full ti-btn-wave me-5">
                                            <i class="ri-calendar-2-line"></i>
                                        </button>
                                    </div>
                                    <div class="md:mb-0 mb-2">
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-primary/10 text-primary !border hover:bg-primary hover:text-white !rounded-full ti-btn-wave">
                                            <i class="ri-home-smile-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-secondary/10 text-secondary hover:bg-secondary hover:text-white !rounded-full ti-btn-wave">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-success/10 text-success hover:bg-success hover:text-white !rounded-full ti-btn-wave">
                                            <i class="ri-notification-3-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-danger/10 text-danger hover:bg-danger hover:text-white !rounded-full ti-btn-wave me-5">
                                            <i class="ri-chat-settings-line"></i>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-primary !rounded-full ti-btn-wave">
                                            <i class="ri-phone-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-teal !border-teal !text-teal !rounded-full ti-btn-wave">
                                            <i class="ri-customer-service-2-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-success !rounded-full ti-btn-wave">
                                            <i class="ri-live-line"></i>
                                        </button>
                                        <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-secondary !rounded-full ti-btn-wave">
                                            <i class="ri-save-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list md:flex block"&gt;
        &lt;div class="md:mb-0 mb-2"&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-primary-full ti-btn-wave"&gt;
                &lt;i class="ri-bank-fill"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-info-full ti-btn-wave"&gt;
                &lt;i class="ri-medal-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-danger-full ti-btn-wave"&gt;
                &lt;i class="ri-archive-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-warning-full ti-btn-wave me-5"&gt;
                &lt;i class="ri-calendar-2-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="md:mb-0 mb-2"&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-primary/10 text-primary !border hover:bg-primary hover:text-white !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-home-smile-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-secondary/10 text-secondary hover:bg-secondary hover:text-white !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-delete-bin-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-success/10 text-success hover:bg-success hover:text-white !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-notification-3-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon bg-danger/10 text-danger hover:bg-danger hover:text-white !rounded-full ti-btn-wave me-5"&gt;
                &lt;i class="ri-chat-settings-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
        &lt;/div&gt;
        &lt;div class=""&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-primary !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-phone-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-teal !border-teal !text-teal !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-customer-service-2-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-success !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-live-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
            &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-outline-secondary !rounded-full ti-btn-wave"&gt;
                &lt;i class="ri-save-line"&gt;&lt;/i&gt;
            &lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Social Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-facebook ti-btn-wave">
                                        <i class="ri-facebook-line"></i>
                                    </button>
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-twitter ti-btn-wave">
                                        <i class="ri-twitter-line"></i>
                                    </button>
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-instagram ti-btn-wave">
                                        <i class="ri-instagram-line"></i>
                                    </button>
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-github ti-btn-wave">
                                        <i class="ri-github-line"></i>
                                    </button>
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-youtube ti-btn-wave">
                                        <i class="ri-youtube-line"></i>
                                    </button>
                                    <button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-google ti-btn-wave">
                                        <i class="ri-google-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-facebook ti-btn-wave"&gt;
            &lt;i class="ri-facebook-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-twitter ti-btn-wave"&gt;
            &lt;i class="ri-twitter-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-instagram ti-btn-wave"&gt;
            &lt;i class="ri-instagram-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-github ti-btn-wave"&gt;
            &lt;i class="ri-github-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-youtube ti-btn-wave"&gt;
            &lt;i class="ri-youtube-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
        &lt;button type="button" aria-label="button" class="ti-btn ti-btn-icon ti-btn-google ti-btn-wave"&gt;
            &lt;i class="ri-google-line"&gt;&lt;/i&gt;
        &lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="grid grid-cols-12">
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box">
                                    <div class="box-header justify-between">
                                        <div class="box-title">
                                            Sizes
                                        </div>
                                        <div class="prism-toggle">
                                            <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                            <button type="button" class="ti-btn ti-btn-primary-full !py-1 !px-2 ti-btn-wave">Small
                                                button</button>
                                            <button type="button" class="ti-btn ti-btn-secondary-full ti-btn-wave">Default
                                                button</button>
                                            <button type="button" class="ti-btn ti-btn-success-full ti-btn-lg ti-btn-wave">Large
                                                button</button>
                                        </div>
                                    </div>
                                    <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary-full !py-1 !px-2 ti-btn-wave"&gt;Small
        button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary-full ti-btn-wave"&gt;Default
        button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success-full ti-btn-lg ti-btn-wave"&gt;Large
        button&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="grid grid-cols-12">
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box">
                                    <div class="box-header justify-between">
                                        <div class="box-title">
                                            Button Widths
                                        </div>
                                        <div class="prism-toggle">
                                            <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                            <button type="button" class="ti-btn ti-btn-primary-full ti-btn-w-xs ti-btn-wave">XS</button>
                                            <button type="button" class="ti-btn ti-btn-secondary-full ti-btn-w-sm ti-btn-wave">SM</button>
                                            <button type="button" class="ti-btn ti-btn-warning-full ti-btn-w-md ti-btn-wave">MD</button>
                                            <button type="button" class="ti-btn ti-btn-info-full ti-btn-w-lg ti-btn-wave">LG</button>
                                        </div>
                                    </div>
                                    <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary-full ti-btn-w-xs ti-btn-wave"&gt;XS&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary-full ti-btn-w-sm ti-btn-wave"&gt;SM&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning-full ti-btn-w-md ti-btn-wave"&gt;MD&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info-full ti-btn-w-lg ti-btn-wave"&gt;LG&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Buttons With Different Shadows
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list flex">
                                    <div class="me-[3rem]">
                                        <button type="button" class="ti-btn ti-btn-primary-full shadow-sm ti-btn-wave">Button</button>
                                        <button type="button" class="ti-btn ti-btn-primary-full shadow ti-btn-wave">Button</button>
                                        <button type="button" class="ti-btn ti-btn-primary-full shadow-lg ti-btn-wave">Button</button>
                                    </div>
                                    <div>
                                        <button type="button" class="ti-btn ti-btn-secondary-full !py-1 !px-2 shadow-sm ti-btn-wave">Button</button>
                                        <button type="button" class="ti-btn ti-btn-info-full shadow ti-btn-wave">Button</button>
                                        <button type="button" class="ti-btn ti-btn-lg ti-btn-success-full shadow-lg ti-btn-wave">Button</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list flex"&gt;
        &lt;div class="me-[3rem]"&gt;
            &lt;button type="button" class="ti-btn ti-btn-primary-full shadow-sm ti-btn-wave"&gt;Button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-primary-full shadow ti-btn-wave"&gt;Button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-primary-full shadow-lg ti-btn-wave"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
        &lt;div&gt;
            &lt;button type="button" class="ti-btn ti-btn-secondary-full !py-1 !px-2 shadow-sm ti-btn-wave"&gt;Button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-info-full shadow ti-btn-wave"&gt;Button&lt;/button&gt;
            &lt;button type="button" class="ti-btn ti-btn-lg ti-btn-success-full shadow-lg ti-btn-wave"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Different Colored Buttons With Shadows
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-full shadow-primary ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-secondary-full shadow-secondary ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-success-full shadow-success ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-info-full shadow-info ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-warning-full shadow-warning ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-danger-full shadow-danger ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-purple-full shadow-purple ti-btn-wave">Button</button>
                                    <button type="button" class="ti-btn ti-btn-orange-full shadow-orange ti-btn-wave">Button</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-primary-full shadow-primary ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary-full shadow-secondary ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success-full shadow-success ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-info-full shadow-info ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning-full shadow-warning ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger-full shadow-danger ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-purple-full shadow-purple ti-btn-wave"&gt;Button&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-orange-full shadow-orange ti-btn-wave"&gt;Button&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-6 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Label Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-primary-full label-ti-btn">
                                        <i class="ri-chat-smile-line label-ti-btn-icon  me-2"></i>
                                        Primary
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-secondary-full label-ti-btn">
                                        <i class="ri-settings-4-line label-ti-btn-icon me-2"></i>
                                        Secondary
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-warning-full label-ti-btn !rounded-full">
                                        <i class="ri-spam-2-line label-ti-btn-icon me-2 !rounded-full"></i>
                                        Warning
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-info-full label-ti-btn !rounded-full">
                                        <i class="ri-phone-line label-ti-btn-icon me-2 !rounded-full"></i>
                                        Info
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-success-full label-ti-btn label-end">
                                        <i class="ri-thumb-up-line label-ti-btn-icon ms-2"></i>
                                        Success
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-danger-full label-ti-btn label-end !rounded-full">
                                        <i class="ri-close-line label-ti-btn-icon ms-2 !rounded-full"></i>
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;button type="button" class="ti-btn ti-btn-primary-full label-ti-btn"&gt;
            &lt;i class="ri-chat-smile-line label-ti-btn-icon  me-2"&gt;&lt;/i&gt;
            Primary
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-secondary-full label-ti-btn"&gt;
            &lt;i class="ri-settings-4-line label-ti-btn-icon me-2"&gt;&lt;/i&gt;
            Secondary
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-warning-full label-ti-btn !rounded-full"&gt;
            &lt;i class="ri-spam-2-line label-ti-btn-icon me-2 !rounded-full"&gt;&lt;/i&gt;
            Warning
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-info-full label-ti-btn !rounded-full"&gt;
            &lt;i class="ri-phone-line label-ti-btn-icon me-2 !rounded-full"&gt;&lt;/i&gt;
            Info
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-success-full label-ti-btn label-end"&gt;
            &lt;i class="ri-thumb-up-line label-ti-btn-icon ms-2"&gt;&lt;/i&gt;
            Success
        &lt;/button&gt;
        &lt;button type="button" class="ti-btn ti-btn-danger-full label-ti-btn label-end !rounded-full"&gt;
            &lt;i class="ri-close-line label-ti-btn-icon ms-2 !rounded-full"&gt;&lt;/i&gt;
            Cancel
        &lt;/button&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Custom Buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <button type="button" class="ti-btn ti-btn-info-full custom-button !rounded-full">
                                        <span class="custom-ti-btn-icons"><i class="ri-twitter-line text-info"></i></span>
                                        Twitter
                                    </button>
                                    <button type="button" class="ti-btn ti-btn-teal ti-btn-border-down border-0">Border</button>
                                    <button type="button" class="ti-btn ti-btn-secondary ti-btn-border-start">Border</button>
                                    <button type="button" class="ti-btn ti-btn-purple ti-btn-border-end">Border</button>
                                    <button type="button" class="ti-btn ti-btn-warning ti-btn-border-top">Border</button>
                                    <button type="button" class="ti-btn ti-btn-danger-full ti-btn-hover ti-btn-hover-animate">Like</button>
                                    <button type="button" class="ti-btn ti-btn-success-full ti-btn-darken-hover">Hover</button>
                                    <button type="button" class="ti-btn ti-btn-orange-full ti-btn-custom-border">Hover</button>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
    &lt;button type="button" class="ti-btn ti-btn-info-full custom-button !rounded-full"&gt;
        &lt;span class="custom-ti-btn-icons"&gt;&lt;i class="ri-twitter-line text-info"&gt;&lt;/i&gt;&lt;/span&gt;
        Twitter
    &lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-teal ti-btn-border-down border-0"&gt;Border&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-secondary ti-btn-border-start"&gt;Border&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-purple ti-btn-border-end"&gt;Border&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-warning ti-btn-border-top"&gt;Border&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-danger-full ti-btn-hover ti-btn-hover-animate"&gt;Like&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-success-full ti-btn-darken-hover"&gt;Hover&lt;/button&gt;
    &lt;button type="button" class="ti-btn ti-btn-orange-full ti-btn-custom-border"&gt;Hover&lt;/button&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <div class="box">
                            <div class="box-header justify-between">
                                <div class="box-title">
                                    Block buttons
                                </div>
                                <div class="prism-toggle">
                                    <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="ti-btn-list space-x-2 rtl:space-x-reverse">
                                    <div class="grid  gap-2 mb-6">
                                        <button class="ti-btn ti-btn-primary-full ti-btn-wave" type="button">Button</button>
                                        <button class="ti-btn ti-btn-secondary-full ti-btn-wave" type="button">Button</button>
                                    </div>
                                    <div class="grid gap-2 md:block">
                                        <button class="ti-btn ti-btn-info-full ti-btn-wave" type="button">Button</button>
                                        <button class="ti-btn ti-btn-success-full ti-btn-wave" type="button">Button</button>
                                    </div>
                                    <div class="grid !mx-auto gap-2 w-[50%] ">
                                        <button class="ti-btn ti-btn-danger-full ti-btn-wave" type="button">Button</button>
                                        <button class="ti-btn ti-btn-warning-full ti-btn-wave" type="button">Button</button>
                                    </div>
                                    <div class="grid gap-2 md:flex md:justify-end">
                                        <button class="ti-btn ti-btn-teal-full md:me-2 ti-btn-wave" type="button">Button</button>
                                        <button class="ti-btn ti-btn-purple-full ti-btn-wave" type="button">Button</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="ti-btn-list space-x-2 rtl:space-x-reverse"&gt;
        &lt;div class="grid  gap-2 mb-6"&gt;
            &lt;button class="ti-btn ti-btn-primary-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
            &lt;button class="ti-btn ti-btn-secondary-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="grid gap-2 md:block"&gt;
            &lt;button class="ti-btn ti-btn-info-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
            &lt;button class="ti-btn ti-btn-success-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="grid !mx-auto gap-2 w-[50%] "&gt;
            &lt;button class="ti-btn ti-btn-danger-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
            &lt;button class="ti-btn ti-btn-warning-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="grid gap-2 md:flex md:justify-end"&gt;
            &lt;button class="ti-btn ti-btn-teal-full md:me-2 ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
            &lt;button class="ti-btn ti-btn-purple-full ti-btn-wave" type="button"&gt;Button&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--ROW-END-->

@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')
        

@endsection