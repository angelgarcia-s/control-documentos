@extends('layouts.master')

@section('styles')
 
        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')
 
                    <!-- Page Header -->
                    <div class="block justify-between page-header md:flex">
                        <div>
                            <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Paginations</h3>
                        </div>
                        <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[0.813rem] ps-[0.5rem]">
                              <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                               Ui Elements
                                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                              </a>
                            </li>
                            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                                Paginations
                            </li>
                        </ol>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start:: row-1 -->
                    <div class="grid grid-cols-12 gap-x-6">
                        <div class="xxl:col-span-3 xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Basic Pagination
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation">
                                        <ul class="ti-pagination  mb-0">
                                            <li class="page-item disabled"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Previous</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation"&gt;
        &lt;ul class="ti-pagination  mb-0"&gt;
            &lt;li class="page-item disabled"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Previous&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Next&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xxl:col-span-3 xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination With Icons
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation">
                                        <ul class="ti-pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="rtl:rotate-180 bx bx-chevron-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link  px-3 py-[0.375rem]" href="javascript:void(0);" aria-label="Next">
                                                    <span aria-hidden="true"><i class="rtl:rotate-180 bx bx-chevron-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation"&gt;
        &lt;ul class="ti-pagination mb-0"&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);" aria-label="Previous"&gt;
                    &lt;span aria-hidden="true"&gt;&lt;i class="rtl:rotate-180 bx bx-chevron-left"&gt;&lt;/i&gt;&lt;/span&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link  px-3 py-[0.375rem]" href="javascript:void(0);" aria-label="Next"&gt;
                    &lt;span aria-hidden="true"&gt;&lt;i class="rtl:rotate-180 bx bx-chevron-right"&gt;&lt;/i&gt;&lt;/span&gt;
                &lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xxl:col-span-6 xl:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination Sizing
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body flex flex-wrap justify-between gap-2">
                                    <nav aria-label="...">
                                        <ul class="ti-pagination pagination-sm mb-0">
                                            <li class="page-item " aria-current="page">
                                                <span class="page-link  active px-3 py-[0.375rem]">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                        </ul>
                                    </nav>
                                    <nav aria-label="...">
                                        <ul class="ti-pagination mb-0">
                                            <li class="page-item " aria-current="page">
                                                <span class="page-link  active px-3 py-[0.375rem]">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                        </ul>
                                    </nav>
                                    <nav aria-label="...">
                                        <ul class="ti-pagination pagination-lg mb-0">
                                            <li class="page-item " aria-current="page">
                                                <span class="page-link active px-3 py-[0.375rem]">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="..."&gt;
        &lt;ul class="ti-pagination pagination-sm mb-0"&gt;
            &lt;li class="page-item " aria-current="page"&gt;
                &lt;span class="page-link  active px-3 py-[0.375rem]"&gt;1&lt;/span&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
    &lt;nav aria-label="..."&gt;
        &lt;ul class="ti-pagination mb-0"&gt;
            &lt;li class="page-item " aria-current="page"&gt;
                &lt;span class="page-link  active px-3 py-[0.375rem]"&gt;1&lt;/span&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
    &lt;nav aria-label="..."&gt;
        &lt;ul class="ti-pagination pagination-lg mb-0"&gt;
            &lt;li class="page-item " aria-current="page"&gt;
                &lt;span class="page-link active px-3 py-[0.375rem]"&gt;1&lt;/span&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-1 -->

                    <!-- Start:: row-2  -->
                    <div class="grid grid-cols-12 gap-x-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Center &amp; Right Aligned Pagination
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation" class="mb-4">
                                        <ul class="ti-pagination justify-center">
                                            <li class="page-item disabled">
                                                <a class="page-link px-3 py-[0.375rem]">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <nav aria-label="Page navigation">
                                        <ul class="ti-pagination sm:justify-end justify-center mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link px-3 py-[0.375rem]">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation" class="mb-4"&gt;
        &lt;ul class="ti-pagination justify-center"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]"&gt;Previous&lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Next&lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
    &lt;nav aria-label="Page navigation"&gt;
        &lt;ul class="ti-pagination sm:justify-end justify-center mb-0"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]"&gt;Previous&lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;3&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Next&lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Active and disabled states
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body flex flex-wrap">
                                    <nav aria-label="..." class="me-4">
                                        <ul class="ti-pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link px-3 py-[0.375rem]">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item " aria-current="page">
                                                <a class="page-link active px-3 py-[0.375rem]" href="javascript:void(0);">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <nav aria-label="...">
                                        <ul class="ti-pagination">
                                            <li class="page-item disabled">
                                                <span class="page-link px-3 py-[0.375rem]">Previous</span>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">1</a></li>
                                            <li class="page-item " aria-current="page">
                                                <span class="page-link px-3 active py-[0.375rem]">2</span>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="..." class="me-4"&gt;
        &lt;ul class="ti-pagination"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]"&gt;Previous&lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item " aria-current="page"&gt;
                &lt;a class="page-link active px-3 py-[0.375rem]" href="javascript:void(0);"&gt;2&lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Next&lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
    &lt;nav aria-label="..."&gt;
        &lt;ul class="ti-pagination"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;span class="page-link px-3 py-[0.375rem]"&gt;Previous&lt;/span&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item " aria-current="page"&gt;
                &lt;span class="page-link px-3 active py-[0.375rem]"&gt;2&lt;/span&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem]" href="javascript:void(0);"&gt;Next&lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-2  -->

                    <!-- Start:: row-3 -->
                    <div class="grid grid-cols-12 gap-x-6">
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination Style-1
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation" class="pagination-style-1">
                                        <ul class="ti-pagination mb-0">
                                            <li class="page-item disabled rtl:rotate-180">
                                                <a aria-label="anchor" class="page-link" href="javascript:void(0);">
                                                    <i class="ri-arrow-left-s-line align-middle"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                            <li class="page-item "><a class="page-link active" href="javascript:void(0);">2</a></li>
                                            <li class="page-item">
                                                <a aria-label="anchor" class="page-link" href="javascript:void(0);">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">21</a></li>
                                            <li class="page-item rtl:rotate-180">
                                                <a aria-label="anchor" class="page-link" href="javascript:void(0);">
                                                    <i class="ri-arrow-right-s-line align-middle"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation" class="pagination-style-1"&gt;
        &lt;ul class="ti-pagination mb-0"&gt;
            &lt;li class="page-item disabled rtl:rotate-180"&gt;
                &lt;a aria-label="anchor" class="page-link" href="javascript:void(0);"&gt;
                    &lt;i class="ri-arrow-left-s-line align-middle"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item "&gt;&lt;a class="page-link active" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a aria-label="anchor" class="page-link" href="javascript:void(0);"&gt;
                    &lt;i class="bi bi-three-dots"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;21&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item rtl:rotate-180"&gt;
                &lt;a aria-label="anchor" class="page-link" href="javascript:void(0);"&gt;
                    &lt;i class="ri-arrow-right-s-line align-middle"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination Style-2
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation" class="pagination-style-2">
                                        <ul class="ti-pagination mb-0 flex-wrap">
                                            <li class="page-item disabled">
                                                <a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);">
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);">2</a></li>
                                            <li class="page-item">
                                                <a aria-label="anchor" class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);">17</a></li>
                                            <li class="page-item">
                                                <a class="page-link px-3 py-[0.375rem] !text-primary !border-0" href="javascript:void(0);">
                                                    next
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation" class="pagination-style-2"&gt;
        &lt;ul class="ti-pagination mb-0 flex-wrap"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);"&gt;
                    Prev
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item active"&gt;&lt;a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a aria-label="anchor" class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);"&gt;
                    &lt;i class="bi bi-three-dots"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link px-3 py-[0.375rem] !border-0" href="javascript:void(0);"&gt;17&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link px-3 py-[0.375rem] !text-primary !border-0" href="javascript:void(0);"&gt;
                    next
                &lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination Style-3
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation" class="pagination-style-3">
                                        <ul class="ti-pagination mb-0 flex-wrap">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0);">
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item "><a class="page-link active" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                            <li class="page-item">
                                                <a aria-label="anchor" class="page-link" href="javascript:void(0);">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">16</a></li>
                                            <li class="page-item">
                                                <a class="page-link !text-primary" href="javascript:void(0);">
                                                    next
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation" class="pagination-style-3"&gt;
        &lt;ul class="ti-pagination mb-0 flex-wrap"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link" href="javascript:void(0);"&gt;
                    Prev
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item "&gt;&lt;a class="page-link active" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a aria-label="anchor" class="page-link" href="javascript:void(0);"&gt;
                    &lt;i class="bi bi-three-dots"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;16&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link !text-primary" href="javascript:void(0);"&gt;
                    next
                &lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Pagination Style-4
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <nav aria-label="Page navigation" class="pagination-style-4">
                                        <ul class="ti-pagination mb-0 flex-wrap">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0);">
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item "><a class="page-link active" href="javascript:void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                            <li class="page-item">
                                                <a aria-label="anchor" class="page-link" href="javascript:void(0);">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">16</a></li>
                                            <li class="page-item">
                                                <a class="page-link !text-primary" href="javascript:void(0);">
                                                    next
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;nav aria-label="Page navigation" class="pagination-style-4"&gt;
        &lt;ul class="ti-pagination mb-0 flex-wrap"&gt;
            &lt;li class="page-item disabled"&gt;
                &lt;a class="page-link" href="javascript:void(0);"&gt;
                    Prev
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item "&gt;&lt;a class="page-link active" href="javascript:void(0);"&gt;1&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;2&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a aria-label="anchor" class="page-link" href="javascript:void(0);"&gt;
                    &lt;i class="bi bi-three-dots"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/li&gt;
            &lt;li class="page-item"&gt;&lt;a class="page-link" href="javascript:void(0);"&gt;16&lt;/a&gt;&lt;/li&gt;
            &lt;li class="page-item"&gt;
                &lt;a class="page-link !text-primary" href="javascript:void(0);"&gt;
                    next
                &lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-3 -->
                    
@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')


@endsection