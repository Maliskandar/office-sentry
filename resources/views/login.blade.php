<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="/resources/css/style.css" rel="stylesheet">
</head>

<body class="bg-slate-800 ">
    <section id="" class="bg-slate-800 ">
        <div class="bg-gradient-to-b from-blue-50 to-transparent from-blue-900 shadow-lg absolute h-full w-full">

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="bg-red-200 rounded-md px-2 py-2 mb-2">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl">
            <div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
                <div class="self-start hidden lg:flex flex-col  text-gray-300">

                    <h1 class="my-3 font-semibold text-4xl">Welcome back</h1>
                    <p class="pr-3 text-sm opacity-75">Lorem ipsum is placeholder text commonly used in the graphic,
                        print,
                        and publishing industries for previewing layouts and visual mockups</p>
                </div>
            </div>
            <div class="flex justify-center self-center  z-10">
                <div class="p-12 bg-slate-800 mx-auto rounded-3xl w-96 ">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-7">
                            <h3 class="font-semibold text-2xl text-white">Login</h3>
                            <p class="text-gray-400">Silakan Login terlebih dahulu <a href="#"
                                    class="text-sm text-purple-700 hover:text-purple-700"></a></p>
                        </div>
                        <div class="space-y-6">
                            <div class="">
                                <input type="email" value="{{ old('email') }}" name="email"
                                    placeholder="Masukkan email"
                                    class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400">
                            </div>


                            <div class="relative" x-data="{ show: true }">
                                <input type="show ? 'password' : 'text'" name="password" placeholder="Masukkan password"
                                    class="text-sm text-gray-200 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-purple-400">
                                <div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">

                                </div>
                            </div>


                            <div class="flex items-center justify-between">

                                <div class="text-sm ml-auto">
                                    <a href="#" class="text-cyan-700 hover:text-cyan-800">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center bg-cyan-700  hover:bg-cyan-800 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                                    Login
                                </button>
                            </div>
                            <div class="flex items-center justify-center space-x-2 my-5">
                                <span class="h-px w-16 bg-gray-100"></span>
                                <span class="text-gray-300 font-normal">or</span>
                                <span class="h-px w-16 bg-gray-100"></span>
                            </div>
                            <div class="flex justify-center gap-5 w-full ">

                                <button type="submit"
                                    class="w-full flex items-center justify-center mb-6 md:mb-0 border border-gray-300 hover:border-gray-900 hover:bg-gray-900 text-sm text-gray-500 p-3  rounded-lg tracking-wide font-medium  cursor-pointer transition ease-in duration-500">
                                    <svg class="w-4 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#EA4335"
                                            d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z" />
                                        <path fill="#34A853"
                                            d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z" />
                                        <path fill="#4A90E2"
                                            d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z" />
                                        <path fill="#FBBC05"
                                            d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z" />
                                    </svg>
                                    <!-- <svg class="w-4" fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.99 13.9v-3.72h9.36c.14.63.25 1.22.25 2.05 0 5.71-3.83 9.77-9.6 9.77-5.52 0-10-4.48-10-10S6.48 2 12 2c2.7 0 4.96.99 6.69 2.61l-2.84 2.76c-.72-.68-1.98-1.48-3.85-1.48-3.31 0-6.01 2.75-6.01 6.12s2.7 6.12 6.01 6.12c3.83 0 5.24-2.65 5.5-4.22h-5.51v-.01Z"></path></svg> -->
                                    <span>Google</span>
                                </button>
                    </form>
                    <button type="submit"
                        class="w-full flex items-center justify-center mb-6 md:mb-0 border border-gray-300 hover:border-gray-900 hover:bg-gray-900 text-sm text-gray-500 p-3  rounded-lg tracking-wide font-medium  cursor-pointer transition ease-in duration-500 px-">
                        <svg class="w-4 mr-2" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <style>
                                .st0 {
                                    fill: #fff
                                }

                                .st1 {
                                    fill: #f5bb41
                                }

                                .st2 {
                                    fill: #2167d1
                                }

                                .st3 {
                                    fill: #3d84f3
                                }

                                .st4 {
                                    fill: #4ca853
                                }

                                .st5 {
                                    fill: #398039
                                }

                                .st6 {
                                    fill: #d74f3f
                                }

                                .st7 {
                                    fill: #d43c89
                                }

                                .st8 {
                                    fill: #b2005f
                                }

                                .st9 {
                                    stroke: #000
                                }

                                .st10,
                                .st11,
                                .st9 {
                                    fill: none;
                                    stroke-width: 3;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-miterlimit: 10
                                }

                                .st10 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    stroke: #000
                                }

                                .st11 {
                                    stroke: #040404
                                }

                                .st11,
                                .st12,
                                .st13 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd
                                }

                                .st13 {
                                    fill: #040404
                                }

                                .st14 {
                                    fill: url(#SVGID_1_)
                                }

                                .st15 {
                                    fill: url(#SVGID_2_)
                                }

                                .st16 {
                                    fill: url(#SVGID_3_)
                                }

                                .st17 {
                                    fill: url(#SVGID_4_)
                                }

                                .st18 {
                                    fill: url(#SVGID_5_)
                                }

                                .st19 {
                                    fill: url(#SVGID_6_)
                                }

                                .st20 {
                                    fill: url(#SVGID_7_)
                                }

                                .st21 {
                                    fill: url(#SVGID_8_)
                                }

                                .st22 {
                                    fill: url(#SVGID_9_)
                                }

                                .st23 {
                                    fill: url(#SVGID_10_)
                                }

                                .st24 {
                                    fill: url(#SVGID_11_)
                                }

                                .st25 {
                                    fill: url(#SVGID_12_)
                                }

                                .st26 {
                                    fill: url(#SVGID_13_)
                                }

                                .st27 {
                                    fill: url(#SVGID_14_)
                                }

                                .st28 {
                                    fill: url(#SVGID_15_)
                                }

                                .st29 {
                                    fill: url(#SVGID_16_)
                                }

                                .st30 {
                                    fill: url(#SVGID_17_)
                                }

                                .st31 {
                                    fill: url(#SVGID_18_)
                                }

                                .st32 {
                                    fill: url(#SVGID_19_)
                                }

                                .st33 {
                                    fill: url(#SVGID_20_)
                                }

                                .st34 {
                                    fill: url(#SVGID_21_)
                                }

                                .st35 {
                                    fill: url(#SVGID_22_)
                                }

                                .st36 {
                                    fill: url(#SVGID_23_)
                                }

                                .st37 {
                                    fill: url(#SVGID_24_)
                                }

                                .st38 {
                                    fill: url(#SVGID_25_)
                                }

                                .st39 {
                                    fill: url(#SVGID_26_)
                                }

                                .st40 {
                                    fill: url(#SVGID_27_)
                                }

                                .st41 {
                                    fill: url(#SVGID_28_)
                                }

                                .st42 {
                                    fill: url(#SVGID_29_)
                                }

                                .st43 {
                                    fill: url(#SVGID_30_)
                                }

                                .st44 {
                                    fill: url(#SVGID_31_)
                                }

                                .st45 {
                                    fill: url(#SVGID_32_)
                                }

                                .st46 {
                                    fill: url(#SVGID_33_)
                                }

                                .st47 {
                                    fill: url(#SVGID_34_)
                                }

                                .st48 {
                                    fill: url(#SVGID_35_)
                                }

                                .st49 {
                                    fill: url(#SVGID_36_)
                                }

                                .st50 {
                                    fill: url(#SVGID_37_)
                                }

                                .st51 {
                                    fill: url(#SVGID_38_)
                                }

                                .st52 {
                                    fill: url(#SVGID_39_)
                                }

                                .st53 {
                                    fill: url(#SVGID_40_)
                                }

                                .st54 {
                                    fill: url(#SVGID_41_)
                                }

                                .st55 {
                                    fill: url(#SVGID_42_)
                                }

                                .st56 {
                                    fill: url(#SVGID_43_)
                                }

                                .st57 {
                                    fill: url(#SVGID_44_)
                                }

                                .st58 {
                                    fill: url(#SVGID_45_)
                                }

                                .st59 {
                                    fill: #040404
                                }

                                .st60 {
                                    fill: url(#SVGID_46_)
                                }

                                .st61 {
                                    fill: url(#SVGID_47_)
                                }

                                .st62 {
                                    fill: url(#SVGID_48_)
                                }

                                .st63 {
                                    fill: url(#SVGID_49_)
                                }

                                .st64 {
                                    fill: url(#SVGID_50_)
                                }

                                .st65 {
                                    fill: url(#SVGID_51_)
                                }

                                .st66 {
                                    fill: url(#SVGID_52_)
                                }

                                .st67 {
                                    fill: url(#SVGID_53_)
                                }

                                .st68 {
                                    fill: url(#SVGID_54_)
                                }

                                .st69 {
                                    fill: url(#SVGID_55_)
                                }

                                .st70 {
                                    fill: url(#SVGID_56_)
                                }

                                .st71 {
                                    fill: url(#SVGID_57_)
                                }

                                .st72 {
                                    fill: url(#SVGID_58_)
                                }

                                .st73 {
                                    fill: url(#SVGID_59_)
                                }

                                .st74 {
                                    fill: url(#SVGID_60_)
                                }

                                .st75 {
                                    fill: url(#SVGID_61_)
                                }

                                .st76 {
                                    fill: url(#SVGID_62_)
                                }

                                .st77,
                                .st78 {
                                    fill: none;
                                    stroke-miterlimit: 10
                                }

                                .st77 {
                                    stroke: #000;
                                    stroke-width: 3
                                }

                                .st78 {
                                    stroke: #fff
                                }

                                .st79 {
                                    fill: #4bc9ff
                                }

                                .st80 {
                                    fill: #50d
                                }

                                .st81 {
                                    fill: #ff3a00
                                }

                                .st82 {
                                    fill: #e6162d
                                }

                                .st84 {
                                    fill: #f93
                                }

                                .st85 {
                                    fill: #b92b27
                                }

                                .st86 {
                                    fill: #00aced
                                }

                                .st87 {
                                    fill: #bd2125
                                }

                                .st89 {
                                    fill: #6665d2
                                }

                                .st90 {
                                    fill: #ce3056
                                }

                                .st91 {
                                    fill: #5bb381
                                }

                                .st92 {
                                    fill: #61c3ec
                                }

                                .st93 {
                                    fill: #e4b34b
                                }

                                .st94 {
                                    fill: #181ef2
                                }

                                .st95 {
                                    fill: red
                                }

                                .st96 {
                                    fill: #fe466c
                                }

                                .st97 {
                                    fill: #fa4778
                                }

                                .st98 {
                                    fill: #f70
                                }

                                .st99 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #1f6bf6
                                }

                                .st100 {
                                    fill: #520094
                                }

                                .st101 {
                                    fill: #4477e8
                                }

                                .st102 {
                                    fill: #3d1d1c
                                }

                                .st103 {
                                    fill: #ffe812
                                }

                                .st104 {
                                    fill: #344356
                                }

                                .st105 {
                                    fill: #00cc76
                                }

                                .st106 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #345e90
                                }

                                .st107 {
                                    fill: #1f65d8
                                }

                                .st108 {
                                    fill: #eb3587
                                }

                                .st109 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #603a88
                                }

                                .st110 {
                                    fill: #e3ce99
                                }

                                .st111 {
                                    fill: #783af9
                                }

                                .st112 {
                                    fill: #ff515e
                                }

                                .st113 {
                                    fill: #ff4906
                                }

                                .st114 {
                                    fill: #503227
                                }

                                .st115 {
                                    fill: #4c7bd9
                                }

                                .st116 {
                                    fill: #69c9d0
                                }

                                .st117 {
                                    fill: #1b92d1
                                }

                                .st118 {
                                    fill: #eb4f4a
                                }

                                .st119 {
                                    fill: #513728
                                }

                                .st120 {
                                    fill: #f60
                                }

                                .st121 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #b61438
                                }

                                .st122 {
                                    fill: #fffc00
                                }

                                .st123 {
                                    fill: #141414
                                }

                                .st124 {
                                    fill: #94d137
                                }

                                .st125,
                                .st126 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #f1f1f1
                                }

                                .st126 {
                                    fill: #66e066
                                }

                                .st127 {
                                    fill: #2d8cff
                                }

                                .st128 {
                                    fill: #f1a300
                                }

                                .st129 {
                                    fill: #4ba2f2
                                }

                                .st130 {
                                    fill: #1a5099
                                }

                                .st131 {
                                    fill: #ee6060
                                }

                                .st132 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #f48120
                                }

                                .st133 {
                                    fill: #222
                                }

                                .st134 {
                                    fill: url(#SVGID_63_)
                                }

                                .st135 {
                                    fill: #0077b5
                                }

                                .st136 {
                                    fill: #fc0
                                }

                                .st137 {
                                    fill: #eb3352
                                }

                                .st138 {
                                    fill: #f9d265
                                }

                                .st139 {
                                    fill: #f5b955
                                }

                                .st140 {
                                    fill: #dd2a7b
                                }

                                .st141 {
                                    fill: #66e066
                                }

                                .st142 {
                                    fill: #eb4e00
                                }

                                .st143 {
                                    fill: #ffc794
                                }

                                .st144 {
                                    fill: #b5332a
                                }

                                .st145 {
                                    fill: #4e85eb
                                }

                                .st146 {
                                    fill: #58a45c
                                }

                                .st147 {
                                    fill: #f2bc42
                                }

                                .st148 {
                                    fill: #d85040
                                }

                                .st149 {
                                    fill: #464eb8
                                }

                                .st150 {
                                    fill: #7b83eb
                                }
                            </style>
                            <g id="Layer_1" />
                            <g id="Layer_2">
                                <path
                                    d="M50 2.5c-58.892 1.725-64.898 84.363-7.46 95h14.92c57.451-10.647 51.419-93.281-7.46-95z"
                                    style="fill:#1877f2" />
                                <path
                                    d="M57.46 64.104h11.125l2.117-13.814H57.46v-8.965c0-3.779 1.85-7.463 7.781-7.463h6.021V22.101c-12.894-2.323-28.385-1.616-28.722 17.66V50.29H30.417v13.814H42.54V97.5h14.92V64.104z"
                                    style="fill:#f1f1f1" />
                            </g>
                        </svg>
                        <!-- <svg class="w-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" fill-rule="evenodd" d="M9.945 22v-8.834H7V9.485h2.945V6.54c0-3.043 1.926-4.54 4.64-4.54 1.3 0 2.418.097 2.744.14v3.18h-1.883c-1.476 0-1.82.703-1.82 1.732v2.433h3.68l-.736 3.68h-2.944L13.685 22"></path></svg> -->
                        <span>Facebook</span>
                    </button>

                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0f172a" fill-opacity="1"
                d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
    </section>

    {{-- <section id="#">
        <div class="align-content-center px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 mt-24">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">Welcome Back!</h2>
                <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-600">Login to your account</p>
            </div>
            <div class="max-w-md mx-auto mt-8 md:mt-16">
                <div class="overflow-hidden bg-white rounded-md shadow-md">
                    <div class="px-4 py-6 sm:px-8 sm:py-7">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="bg-red-200 rounded-md px-2 py-2 mb-2">
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="space-y-5">
                                <div>
                                    <label for="email" class="text-base font-medium text-gray-900"> Email address
                                    </label>
                                    <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                            </svg>
                                        </div>

                                        <input type="email" value="{{ old('email') }}" name="email"
                                            placeholder="Enter your email"
                                            class="form-control block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="password" class="text-base font-medium text-gray-900"> Password
                                        </label>

                                        <a href="#" title=""
                                            class="text-sm font-medium text-orange-500 transition-all duration-200 hover:text-orange-600 focus:text-orange-600 hover:underline">
                                            Forgot password? </a>
                                    </div>
                                    <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                            </svg>
                                        </div>

                                        <input type="password" name="password" placeholder="Enter your password"
                                            class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>

                                <div>
                                    <button name="submit" type="submit"
                                        class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700">
                                        Log in
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-base text-gray-600">Don’t have an account? <a href="#"
                                            title=""
                                            class="font-medium text-orange-500 transition-all duration-200 hover:text-orange-600 hover:underline">Create
                                            a free account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> --}}
