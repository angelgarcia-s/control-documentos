@extends('layouts.master')

@section('styles')

        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
@endsection

@section('content')

                    <!-- Page Header -->
                    <div class="block justify-between page-header md:flex">
                        <div>
                            <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">Checks &amp; Radios</h3>
                        </div>
                        <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[0.813rem] ps-[0.5rem]">
                              <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                                Form Elements
                                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                              </a>
                            </li>
                            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
                               Checks &amp; Radios
                            </li>
                        </ol>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start:: row-1 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Checks
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Default checkbox
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"&gt;
    &lt;label class="form-check-label" for="flexCheckDefault"&gt;
        Default checkbox
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
        checked&gt;
    &lt;label class="form-check-label" for="flexCheckChecked"&gt;
        Checked checkbox
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Disabled
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled"
                                            disabled>
                                        <label class="form-check-label" for="flexCheckDisabled">
                                            Disabled checkbox
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input opacity-[0.6]" type="checkbox" value=""
                                            id="flexCheckCheckedDisabled" checked disabled>
                                        <label class="form-check-label" for="flexCheckCheckedDisabled">
                                            Disabled checked checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled"
        disabled&gt;
    &lt;label class="form-check-label" for="flexCheckDisabled"&gt;
        Disabled checkbox
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value=""
        id="flexCheckCheckedDisabled" checked disabled&gt;
    &lt;label class="form-check-label" for="flexCheckCheckedDisabled"&gt;
        Disabled checked checkbox
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Radios
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Default checked radio
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="flexRadioDefault"
        id="flexRadioDefault1"&gt;
    &lt;label class="form-check-label" for="flexRadioDefault1"&gt;
        Default radio
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="flexRadioDefault"
        id="flexRadioDefault2" checked&gt;
    &lt;label class="form-check-label" for="flexRadioDefault2"&gt;
        Default checked radio
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Disabled
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                            id="flexRadioDisabled" disabled>
                                        <label class="form-check-label" for="flexRadioDisabled">
                                            Disabled radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input opacity-[0.6]" type="radio" name="flexRadioDisabled"
                                            id="flexRadioCheckedDisabled" checked disabled>
                                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                                            Disabled checked radio
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="flexRadioDisabled"
        id="flexRadioDisabled" disabled&gt;
    &lt;label class="form-check-label" for="flexRadioDisabled"&gt;
        Disabled radio
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="flexRadioDisabled"
        id="flexRadioCheckedDisabled" checked disabled&gt;
    &lt;label class="form-check-label" for="flexRadioCheckedDisabled"&gt;
        Disabled checked radio
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-1 -->

                    <!-- Start:: row-2 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Default (stacked)
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Default checkbox
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"
                                            disabled>
                                        <label class="form-check-label" for="defaultCheck2">
                                            Disabled checkbox
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Default radio
                                        </label>
                                    </div>
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios3" value="option3" disabled>
                                        <label class="form-check-label" for="exampleRadios3">
                                            Disabled radio
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="defaultCheck1"&gt;
    &lt;label class="form-check-label" for="defaultCheck1"&gt;
        Default checkbox
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="defaultCheck2"
        disabled&gt;
    &lt;label class="form-check-label" for="defaultCheck2"&gt;
        Disabled checkbox
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="exampleRadios"
        id="exampleRadios1" value="option1" checked&gt;
    &lt;label class="form-check-label" for="exampleRadios1"&gt;
        Default radio
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check mb-0"&gt;
    &lt;input class="form-check-input" type="radio" name="exampleRadios"
        id="exampleRadios3" value="option3" disabled&gt;
    &lt;label class="form-check-label" for="exampleRadios3"&gt;
        Disabled radio
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6 lg:col-span-6 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Switches
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body flex flex-col gap-y-4">
                                      <div class="flex items-center">
                                        <input type="checkbox" id="hs-basic-with-description-checked" class="ti-switch" checked>
                                        <label for="hs-basic-with-description-checked" class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50">Checked</label>
                                      </div>
                                      <div class="flex items-center">
                                        <input type="checkbox" id="hs-basic-with-description-unchecked" class="ti-switch">
                                        <label for="hs-basic-with-description-unchecked" class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50">Unchecked</label>
                                      </div>
                                      <div class="flex items-center">
                                        <label class="text-sm text-gray-500 me-3 dark:text-[#8c9097] dark:text-white/50">On</label>
                                        <input type="checkbox" id="hs-basic-with-description" class="ti-switch">
                                        <label class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50">Off</label>
                                      </div>
                                   </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check form-switch"&gt;
    &lt;input class="form-check-input" type="checkbox" role="switch"
        id="flexSwitchCheckDefault"&gt;
    &lt;label class="form-check-label" for="flexSwitchCheckDefault"&gt;Default switch
        checkbox input&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-switch"&gt;
    &lt;input class="form-check-input" type="checkbox" role="switch"
        id="flexSwitchCheckChecked" checked&gt;
    &lt;label class="form-check-label" for="flexSwitchCheckChecked"&gt;Checked switch
        checkbox input&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-switch"&gt;
    &lt;input class="form-check-input" type="checkbox" role="switch"
        id="flexSwitchCheckDisabled" disabled&gt;
    &lt;label class="form-check-label" for="flexSwitchCheckDisabled"&gt;Disabled
        switch
        checkbox input&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-switch mb-0"&gt;
    &lt;input class="form-check-input" type="checkbox" role="switch"
        id="flexSwitchCheckCheckedDisabled" checked disabled&gt;
    &lt;label class="form-check-label" for="flexSwitchCheckCheckedDisabled"&gt;Disabled
        checked switch checkbox input&lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-2 -->

                    <!-- Start:: row-3 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xxl:col-span-6 xl:col-span-12 lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header  justify-between">
                                    <div class="box-title">
                                        Checkbox Sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body sm:flex items-center justify-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-sm" checked>
                                        <label class="form-check-label" for="checkebox-sm">
                                            Default
                                        </label>
                                    </div>
                                    <div class="form-check form-check-md flex items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-md" checked>
                                        <label class="form-check-label" for="checkebox-md">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check form-check-lg flex items-center">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg" checked>
                                        <label class="form-check-label" for="checkebox-lg">
                                            Large
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="checkebox-sm" checked&gt;
    &lt;label class="form-check-label" for="checkebox-sm"&gt;
        Default
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-md flex items-center"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="checkebox-md" checked&gt;
    &lt;label class="form-check-label" for="checkebox-md"&gt;
        Medium
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-lg flex items-center"&gt;
    &lt;input class="form-check-input" type="checkbox" value="" id="checkebox-lg" checked&gt;
    &lt;label class="form-check-label" for="checkebox-lg"&gt;
        Large
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xxl:col-span-6 xl:col-span-12 lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Radio Sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body sm:flex items-center justify-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Radio" id="Radio-sm">
                                        <label class="form-check-label" for="Radio-sm">
                                            default
                                        </label>
                                    </div>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="radio" name="Radio" id="Radio-md">
                                        <label class="form-check-label" for="Radio-md">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check form-check-lg">
                                        <input class="form-check-input" type="radio" name="Radio" id="Radio-lg" checked>
                                        <label class="form-check-label" for="Radio-lg">
                                            Large
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check"&gt;
    &lt;input class="form-check-input" type="radio" name="Radio" id="Radio-sm"&gt;
    &lt;label class="form-check-label" for="Radio-sm"&gt;
        default
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-md"&gt;
    &lt;input class="form-check-input" type="radio" name="Radio" id="Radio-md"&gt;
    &lt;label class="form-check-label" for="Radio-md"&gt;
        Medium
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-lg"&gt;
    &lt;input class="form-check-input" type="radio" name="Radio" id="Radio-lg" checked&gt;
    &lt;label class="form-check-label" for="Radio-lg"&gt;
        Large
    &lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-3 -->

                    <!-- Start:: row-4 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6 lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Inline
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body sm:flex gap-2">
                                    <div class="flex gap-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled>
                                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                                        </div>
                                   </div>
                                   <div class="flex gap-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio3" value="option3" disabled>
                                        <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                                    </div>
                                </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="checkbox" id="inlineCheckbox1"
        value="option1"&gt;
    &lt;label class="form-check-label" for="inlineCheckbox1"&gt;1&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="checkbox" id="inlineCheckbox2"
        value="option2"&gt;
    &lt;label class="form-check-label" for="inlineCheckbox2"&gt;2&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="checkbox" id="inlineCheckbox3"
        value="option3" disabled&gt;
    &lt;label class="form-check-label" for="inlineCheckbox3"&gt;3 (disabled)&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="radio" name="inlineRadioOptions"
        id="inlineRadio1" value="option1"&gt;
    &lt;label class="form-check-label" for="inlineRadio1"&gt;1&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="radio" name="inlineRadioOptions"
        id="inlineRadio2" value="option2"&gt;
    &lt;label class="form-check-label" for="inlineRadio2"&gt;2&lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-inline"&gt;
    &lt;input class="form-check-input" type="radio" name="inlineRadioOptions"
        id="inlineRadio3" value="option3" disabled&gt;
    &lt;label class="form-check-label" for="inlineRadio3"&gt;3 (disabled)&lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6  lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Reverse
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-check form-check-reverse mb-4">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="reverseCheck1">
                                        <label class="form-check-label" for="reverseCheck1">
                                            Reverse checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-reverse mb-4">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="reverseCheck2" disabled>
                                        <label class="form-check-label" for="reverseCheck2">
                                            Disabled reverse checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="form-check form-check-reverse mb-4"&gt;
    &lt;input class="form-check-input" type="checkbox" value=""
        id="reverseCheck1"&gt;
    &lt;label class="form-check-label" for="reverseCheck1"&gt;
        Reverse checkbox
    &lt;/label&gt;
&lt;/div&gt;
&lt;div class="form-check form-check-reverse mb-4"&gt;
    &lt;input class="form-check-input" type="checkbox" value=""
        id="reverseCheck2" disabled&gt;
    &lt;label class="form-check-label" for="reverseCheck2"&gt;
        Disabled reverse checkbox
    &lt;/label&gt;
&lt;/div&gt;

&lt;div class="form-check form-switch form-check-reverse"&gt;
    &lt;input class="form-check-input" type="checkbox"
        id="flexSwitchCheckReverse"&gt;
    &lt;label class="form-check-label" for="flexSwitchCheckReverse"&gt;Reverse
        switch
        checkbox input&lt;/label&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-4 -->

                    <!-- Start:: row-7 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6  lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Toggle Switches Style-1
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="grid grid-cols-12 gap-y-1">
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-secondary on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-warning on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-info on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-success on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-danger on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-light on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="toggle toggle-dark on mb-4">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="grid grid-cols-12 gap-y-1"&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-secondary on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-warning on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-info on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-success on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-danger on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-light on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="toggle toggle-dark on mb-4"&gt;
                &lt;span&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6  lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Toggle Switches Style-2
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="grid grid-cols-12 gap-y-1">
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchPrimary" name="toggleswitch001" type="checkbox" checked>
                                                <label for="toggleswitchPrimary" class="label-primary"></label><span class="ms-3">Primary</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchSecondary" name="toggleswitch002" type="checkbox" checked>
                                                <label for="toggleswitchSecondary" class="label-secondary"></label><span class="ms-3">Secondary</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchWarning" name="toggleswitch003" type="checkbox" checked>
                                                <label for="toggleswitchWarning" class="label-warning"></label><span class="ms-3">Warning</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchInfo" name="toggleswitch004" type="checkbox" checked>
                                                <label for="toggleswitchInfo" class="label-info"></label><span class="ms-3">Info</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchSuccess" name="toggleswitch005" type="checkbox" checked>
                                                <label for="toggleswitchSuccess" class="label-success"></label><span class="ms-3">Success</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchDanger" name="toggleswitch006" type="checkbox" checked>
                                                <label for="toggleswitchDanger" class="label-danger"></label><span class="ms-3">Danger</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchLight" name="toggleswitch007" type="checkbox" checked>
                                                <label for="toggleswitchLight" class="label-light"></label><span class="ms-3">Light</span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-4 col-span-12">
                                            <div class="custom-toggle-switch flex items-center mb-4">
                                                <input id="toggleswitchDark" name="toggleswitch008" type="checkbox" checked>
                                                <label for="toggleswitchDark" class="label-dark"></label><span class="ms-3">Dark</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">
    &lt;div class="grid grid-cols-12 gap-y-1"&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchPrimary" name="toggleswitch001" type="checkbox" checked&gt;
                &lt;label for="toggleswitchPrimary" class="label-primary"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Primary&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchSecondary" name="toggleswitch002" type="checkbox" checked&gt;
                &lt;label for="toggleswitchSecondary" class="label-secondary"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Secondary&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchWarning" name="toggleswitch003" type="checkbox" checked&gt;
                &lt;label for="toggleswitchWarning" class="label-warning"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Warning&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchInfo" name="toggleswitch004" type="checkbox" checked&gt;
                &lt;label for="toggleswitchInfo" class="label-info"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Info&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchSuccess" name="toggleswitch005" type="checkbox" checked&gt;
                &lt;label for="toggleswitchSuccess" class="label-success"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Success&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchDanger" name="toggleswitch006" type="checkbox" checked&gt;
                &lt;label for="toggleswitchDanger" class="label-danger"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Danger&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchLight" name="toggleswitch007" type="checkbox" checked&gt;
                &lt;label for="toggleswitchLight" class="label-light"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Light&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="xl:col-span-4 col-span-12"&gt;
            &lt;div class="custom-toggle-switch flex items-center mb-4"&gt;
                &lt;input id="toggleswitchDark" name="toggleswitch008" type="checkbox" checked&gt;
                &lt;label for="toggleswitchDark" class="label-dark"&gt;&lt;/label&gt;&lt;span class="ms-3"&gt;Dark&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-7 -->

                    <!-- Start:: row-8 -->
                     <div class="grid grid-cols-12 gap-6">
                        <div class="xl:col-span-6  lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Toggle Switch-1 Sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body flex flex-col">
                                    <div class="flex items-center flex-wrap mb-4">
                                        <div class=""> <p class="text-muted m-0">Small size toggle switch <code>toggle-sm</code></p></div>
                                        <div class="toggle toggle-sm on mb-0">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap mb-4">
                                        <div class=""> <p class="text-muted m-0">Default toggle switch <code></code></p></div>
                                        <div class="toggle toggle-secondary on mb-0">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap">
                                        <div class=""> <p class="text-muted m-0">Large size toggle switch <code>toggle-lg</code></p></div>
                                        <div class="toggle toggle-lg toggle-success on mb-0">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="flex items-center flex-wrap mb-4"&gt;
    &lt;div class=""&gt; &lt;p class="text-muted m-0"&gt;Small size toggle switch &lt;code&gt;toggle-sm&lt;/code&gt;&lt;/p&gt;&lt;/div&gt;
    &lt;div class="toggle toggle-sm on mb-0"&gt;
        &lt;span&gt;&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex items-center flex-wrap mb-4"&gt;
    &lt;div class=""&gt; &lt;p class="text-muted m-0"&gt;Default toggle switch &lt;code&gt;&lt;/code&gt;&lt;/p&gt;&lt;/div&gt;
    &lt;div class="toggle toggle-secondary on mb-0"&gt;
        &lt;span&gt;&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex items-center flex-wrap"&gt;
    &lt;div class=""&gt; &lt;p class="text-muted m-0"&gt;Large size toggle switch &lt;code&gt;toggle-lg&lt;/code&gt;&lt;/p&gt;&lt;/div&gt;
    &lt;div class="toggle toggle-lg toggle-success on mb-0"&gt;
        &lt;span&gt;&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-6  lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12 ">
                            <div class="box">
                                <div class="box-header justify-between">
                                    <div class="box-title">
                                        Toggle Switch-2 Sizes
                                    </div>
                                    <div class="prism-toggle">
                                        <button type="button" class="ti-btn !py-1 !px-2 ti-btn-primary !text-[0.75rem] !font-medium">Show Code<i class="ri-code-line ms-2 inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="box-body ">
                                    <div class="flex items-center flex-wrap mb-4">
                                        <div class=""><p class="text-muted m-0">Small size toggle switch <code>toggle-sm</code></p></div>
                                        <div class="custom-toggle-switch toggle-sm ms-2">
                                            <input id="size-sm" name="toggleswitchsize" type="checkbox" checked>
                                            <label for="size-sm" class="label-primary"></label>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap mb-4">
                                        <div class=""><p class="text-muted m-0">Default toggle switch</p></div>
                                        <div class="custom-toggle-switch ms-2">
                                            <input id="size-default" name="toggleswitchsize1" type="checkbox" checked>
                                            <label for="size-default" class="label-secondary mb-1"></label>
                                        </div>
                                    </div>
                                    <div class="sm:flex flex items-center flex-wrap">
                                        <div class="sm:mb-0 me-2"><p class="text-muted m-0">Large size toggle switch <code>toggle-lg</code></p></div>
                                        <div class="custom-toggle-switch toggle-lg sm:ms-2 ms-0">
                                            <input id="size-lg" name="toggleswitchsize2" type="checkbox" checked>
                                            <label for="size-lg" class="label-success mb-2"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer hidden border-t-0">
<!-- Prism Code -->
<pre class="language-html"><code class="language-html">&lt;div class="flex items-center flex-wrap mb-4"&gt;
    &lt;div class=""&gt;&lt;p class="text-muted m-0"&gt;Small size toggle switch &lt;code&gt;toggle-sm&lt;/code&gt;&lt;/p&gt;&lt;/div&gt;
    &lt;div class="custom-toggle-switch toggle-sm ms-2"&gt;
        &lt;input id="size-sm" name="toggleswitchsize" type="checkbox" checked&gt;
        &lt;label for="size-sm" class="label-primary"&gt;&lt;/label&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex items-center flex-wrap mb-4"&gt;
    &lt;div class=""&gt;&lt;p class="text-muted m-0"&gt;Default toggle switch&lt;/p&gt;&lt;/div&gt;
    &lt;div class="custom-toggle-switch ms-2"&gt;
        &lt;input id="size-default" name="toggleswitchsize" type="checkbox" checked&gt;
        &lt;label for="size-default" class="label-secondary mb-1"&gt;&lt;/label&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="flex items-center flex-wrap"&gt;
    &lt;div class=""&gt;&lt;p class="text-muted m-0"&gt;Large size toggle switch &lt;code&gt;toggle-lg&lt;/code&gt;&lt;/p&gt;&lt;/div&gt;
    &lt;div class="custom-toggle-switch toggle-lg ms-2"&gt;
        &lt;input id="size-lg" name="toggleswitchsize" type="checkbox" checked&gt;
        &lt;label for="size-lg" class="label-success mb-2"&gt;&lt;/label&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<!-- Prism Code -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-8 -->
                    
@endsection

@section('scripts')

        <!-- Prism JS -->
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>
        @vite('resources/assets/js/prism-custom.js')

@endsection