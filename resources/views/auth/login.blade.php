<x-auth-layout>
    <section class="relative h-screen w-screen z-20">

        <div
            class="px-0 py-3 backdrop-blur-sm shadow-xl  text-base-100 lg:-mt-7
            {{-- lg:rounded-tl-[72px] lg:rounded-br-[72px]  --}}
             rounded-xl
            h-screen md:h-fit w-full flex flex-col justify-center items-center fixed z-20 lg:bottom-[50%] lg:left-[50%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            {{-- <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot> --}}

            <div class="text-center text-xl mt-6 font-bold uppercase tracking-widest">
                Pertamina Gas Negara
            </div>
            {{-- <div class="text-[50px] -mt-3 text-center font-bold">
                CRP PORTAL
            </div> --}}
            <div class="-mt-3 -mb-5">
                <svg width="914" height="91" viewBox="0 0 914 91" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 450px;">
                    <path
                        d="M85.4197 90.5012H48.5697C35.8097 90.5012 24.7364 86.2112 15.3497 77.6312C5.5964 68.7579 0.719733 58.0145 0.719733 45.4012C0.719733 32.7879 5.5964 22.0445 15.3497 13.1712C24.7364 4.59119 35.8097 0.30119 48.5697 0.30119H85.4197V30.0012H48.5697C44.3897 30.0012 40.6864 31.5412 37.4597 34.6212C34.2331 37.6279 32.6197 41.2212 32.6197 45.4012C32.6197 49.5812 34.2331 53.2112 37.4597 56.2912C40.6864 59.2979 44.3897 60.8012 48.5697 60.8012H85.4197V90.5012ZM82.1197 87.2012V64.1012H48.5697C43.4364 64.1012 38.9264 62.2679 35.0397 58.6012C31.2264 54.9345 29.3197 50.5345 29.3197 45.4012C29.3197 40.3412 31.2631 35.9779 35.1497 32.3112C39.0364 28.5712 43.5097 26.7012 48.5697 26.7012H82.1197V3.60119H48.5697C36.7631 3.60119 26.4597 7.59786 17.6597 15.5912C8.5664 23.8045 4.01973 33.7412 4.01973 45.4012C4.01973 57.0612 8.5664 66.9979 17.6597 75.2112C26.4597 83.2045 36.7631 87.2012 48.5697 87.2012H82.1197ZM189.963 90.5012H160.263C153.956 90.5012 147.246 87.5312 140.133 81.5912C139.399 81.0045 134.009 75.6879 123.963 65.6412V90.5012H88.7627V41.0012H143.763C145.229 41.0012 146.513 40.4512 147.613 39.3512C148.713 38.2512 149.263 36.9679 149.263 35.5012C149.263 34.0345 148.713 32.7512 147.613 31.6512C146.513 30.5512 145.229 30.0012 143.763 30.0012H88.7627V0.30119H152.563C160.996 0.30119 168.403 3.34452 174.783 9.43119C181.236 15.5179 184.463 22.7412 184.463 31.1012C184.463 37.0412 182.776 42.5412 179.403 47.6012C176.029 52.5879 171.629 56.3279 166.203 58.8212C167.303 60.1412 168.623 60.8012 170.163 60.8012H189.963V90.5012ZM186.663 87.2012V64.1012H170.163C166.789 64.1012 163.819 61.7912 161.253 57.1712C167.266 54.8979 171.996 51.5979 175.443 47.2712C179.256 42.5779 181.163 37.1879 181.163 31.1012C181.163 23.6212 178.266 17.1679 172.473 11.7412C166.679 6.31452 160.043 3.60119 152.563 3.60119H92.0627V26.7012H143.763C146.109 26.7012 148.163 27.5812 149.923 29.3412C151.683 31.1012 152.563 33.1545 152.563 35.5012C152.563 37.8479 151.683 39.9012 149.923 41.6612C148.163 43.4212 146.109 44.3012 143.763 44.3012H92.0627V87.2012H120.663V57.7212L139.913 76.7512C146.953 83.7179 153.736 87.2012 160.263 87.2012H186.663ZM289.006 32.2012C289.006 40.6345 285.779 48.0779 279.326 54.5312C272.946 60.9112 265.539 64.1012 257.106 64.1012H228.506V90.5012H193.306V41.0012H248.306C249.772 41.0012 251.056 40.4512 252.156 39.3512C253.256 38.2512 253.806 36.9679 253.806 35.5012C253.806 34.0345 253.256 32.7512 252.156 31.6512C251.056 30.5512 249.772 30.0012 248.306 30.0012H193.306V0.30119H257.106C265.539 0.30119 272.946 3.52786 279.326 9.98119C285.779 16.3612 289.006 23.7679 289.006 32.2012ZM285.706 32.2012C285.706 24.7212 282.809 18.0845 277.016 12.2912C271.222 6.49785 264.586 3.60119 257.106 3.60119H196.606V26.7012H248.306C250.652 26.7012 252.706 27.5812 254.466 29.3412C256.226 31.1012 257.106 33.1545 257.106 35.5012C257.106 37.8479 256.226 39.9012 254.466 41.6612C252.706 43.4212 250.652 44.3012 248.306 44.3012H196.606V87.2012H225.206V60.8012H257.106C264.586 60.8012 271.222 57.9045 277.016 52.1112C282.809 46.3179 285.706 39.6812 285.706 32.2012ZM437.506 32.2012C437.506 40.6345 434.279 48.0779 427.826 54.5312C421.446 60.9112 414.039 64.1012 405.606 64.1012H377.006V90.5012H341.806V41.0012H396.806C398.272 41.0012 399.556 40.4512 400.656 39.3512C401.756 38.2512 402.306 36.9679 402.306 35.5012C402.306 34.0345 401.756 32.7512 400.656 31.6512C399.556 30.5512 398.272 30.0012 396.806 30.0012H341.806V0.30119H405.606C414.039 0.30119 421.446 3.52786 427.826 9.98119C434.279 16.3612 437.506 23.7679 437.506 32.2012ZM434.206 32.2012C434.206 24.7212 431.309 18.0845 425.516 12.2912C419.722 6.49785 413.086 3.60119 405.606 3.60119H345.106V26.7012H396.806C399.152 26.7012 401.206 27.5812 402.966 29.3412C404.726 31.1012 405.606 33.1545 405.606 35.5012C405.606 37.8479 404.726 39.9012 402.966 41.6612C401.206 43.4212 399.152 44.3012 396.806 44.3012H345.106V87.2012H373.706V60.8012H405.606C413.086 60.8012 419.722 57.9045 425.516 52.1112C431.309 46.3179 434.206 39.6812 434.206 32.2012ZM536.506 45.4012C536.506 58.0145 531.629 68.7579 521.876 77.6312C512.489 86.2112 501.416 90.5012 488.656 90.5012C475.896 90.5012 464.822 86.2112 455.436 77.6312C445.682 68.7579 440.806 58.0145 440.806 45.4012C440.806 32.7879 445.682 22.0445 455.436 13.1712C464.822 4.59119 475.896 0.30119 488.656 0.30119C501.416 0.30119 512.489 4.59119 521.876 13.1712C531.629 22.0445 536.506 32.7879 536.506 45.4012ZM533.206 45.4012C533.206 33.6679 528.659 23.7312 519.566 15.5912C510.766 7.59786 500.462 3.60119 488.656 3.60119C476.849 3.60119 466.546 7.59786 457.746 15.5912C448.652 23.8045 444.106 33.7412 444.106 45.4012C444.106 57.1345 448.652 67.0712 457.746 75.2112C466.546 83.2045 476.849 87.2012 488.656 87.2012C500.462 87.2012 510.766 83.2412 519.566 75.3212C528.659 67.1079 533.206 57.1345 533.206 45.4012ZM507.906 45.4012C507.906 50.4612 505.962 54.8612 502.076 58.6012C498.262 62.2679 493.789 64.1012 488.656 64.1012C483.522 64.1012 479.012 62.2679 475.126 58.6012C471.312 54.9345 469.406 50.5345 469.406 45.4012C469.406 40.3412 471.312 35.9779 475.126 32.3112C479.012 28.5712 483.522 26.7012 488.656 26.7012C493.716 26.7012 498.189 28.5712 502.076 32.3112C505.962 35.9779 507.906 40.3412 507.906 45.4012ZM504.606 45.4012C504.606 41.2945 502.992 37.7012 499.766 34.6212C496.539 31.5412 492.836 30.0012 488.656 30.0012C484.476 30.0012 480.772 31.5412 477.546 34.6212C474.319 37.6279 472.706 41.2212 472.706 45.4012C472.706 49.5812 474.319 53.2112 477.546 56.2912C480.772 59.2979 484.476 60.8012 488.656 60.8012C492.836 60.8012 496.539 59.2979 499.766 56.2912C502.992 53.2112 504.606 49.5812 504.606 45.4012ZM641.006 90.5012H611.306C604.999 90.5012 598.289 87.5312 591.176 81.5912C590.442 81.0045 585.052 75.6879 575.006 65.6412V90.5012H539.806V41.0012H594.806C596.272 41.0012 597.556 40.4512 598.656 39.3512C599.756 38.2512 600.306 36.9679 600.306 35.5012C600.306 34.0345 599.756 32.7512 598.656 31.6512C597.556 30.5512 596.272 30.0012 594.806 30.0012H539.806V0.30119H603.606C612.039 0.30119 619.446 3.34452 625.826 9.43119C632.279 15.5179 635.506 22.7412 635.506 31.1012C635.506 37.0412 633.819 42.5412 630.446 47.6012C627.072 52.5879 622.672 56.3279 617.246 58.8212C618.346 60.1412 619.666 60.8012 621.206 60.8012H641.006V90.5012ZM637.706 87.2012V64.1012H621.206C617.832 64.1012 614.862 61.7912 612.296 57.1712C618.309 54.8979 623.039 51.5979 626.486 47.2712C630.299 42.5779 632.206 37.1879 632.206 31.1012C632.206 23.6212 629.309 17.1679 623.516 11.7412C617.722 6.31452 611.086 3.60119 603.606 3.60119H543.106V26.7012H594.806C597.152 26.7012 599.206 27.5812 600.966 29.3412C602.726 31.1012 603.606 33.1545 603.606 35.5012C603.606 37.8479 602.726 39.9012 600.966 41.6612C599.206 43.4212 597.152 44.3012 594.806 44.3012H543.106V87.2012H571.706V57.7212L590.956 76.7512C597.996 83.7179 604.779 87.2012 611.306 87.2012H637.706ZM735.021 30.0012H704.771V90.5012H669.571V30.0012H639.321V0.30119H735.021V30.0012ZM731.721 26.7012V3.60119H642.621V26.7012H672.871V87.2012H701.471V26.7012H731.721ZM825.929 90.5012H789.519L786.659 79.5012H763.339L760.479 90.5012H724.069L747.719 0.30119H802.279L825.929 90.5012ZM821.749 87.2012L799.639 3.60119H750.359L728.249 87.2012H757.839L760.699 76.2012H789.299L792.159 87.2012H821.749ZM784.459 58.6012H765.539L774.999 21.9712L784.459 58.6012ZM780.279 55.3012L774.999 35.1712L769.719 55.3012H780.279ZM913.642 90.5012H828.942V0.30119H864.142V60.8012H913.642V90.5012ZM910.342 87.2012V64.1012H860.842V3.60119H832.242V87.2012H910.342Z"
                        fill="currentColor" />
                </svg>

            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-success">
                    {{ session('status') }}
                </div>
            @endif
            {{--
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button>
                        {{ __('Log in') }}
                    </button>
                </div>
            </form> --}}
            <form class="mt-8 mb-12 md:mb-0" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="LoginForm">
                    <svg id="login-bg" width="373" height="114" viewBox="0 0 373 114" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 114C0 114 30.7845 65.0679 35.8008 56.9561C40.8165 48.8428 45.1375 48.0808 58.9947 48.0808H89.5372C87.7365 49.5907 84.6569 52.7427 82.3529 56.4472L51.2885 106.394C48.1825 111.975 41.6143 114 33.7326 114H0Z"
                            fill="#F5F5F5" />
                        <path id="username-bg"
                            d="M369.621 37.8459H111.483C105.51 37.8459 99.8777 35.2175 97.5142 31.1269L97.4988 31.1001L97.4816 31.0743L77.5281 1H328.518C335.481 1 339.857 1.20002 343.149 2.33996C346.342 3.4458 348.591 5.47001 351.162 9.42034L352 8.87496L351.162 9.42045C353.801 13.4758 358.666 20.968 362.872 27.4468C364.975 30.6862 366.912 33.672 368.324 35.848L369.621 37.8459Z"
                            fill="#F5F5F5" stroke="#E2383F00" stroke-width="2" />
                        <path id="password-bg"
                            d="M95.9645 57.5013L95.9646 57.5012C98.5349 53.5509 100.784 51.5267 103.978 50.4209C107.269 49.2809 111.646 49.0809 118.608 49.0809H371.136L351.183 79.1552L351.166 79.181L351.15 79.2078C348.787 83.2984 343.155 85.9268 337.181 85.9268H77.5057L78.8021 83.9289C80.2141 81.7529 82.1518 78.7671 84.2545 75.5277C88.46 69.0489 93.3251 61.5567 95.9645 57.5013Z"
                            fill="#F5F5F5" stroke="#ACC42A00" stroke-width="2" />
                        <path
                            d="M0 114C0 114 30.7845 65.0679 35.8008 56.9561C40.8165 48.8428 45.1375 48.0808 58.9947 48.0808H89.5372C87.7365 49.5907 84.6569 52.7427 82.3529 56.4472L51.2885 106.394C48.1825 111.975 41.6143 114 33.7326 114H0Z"
                            fill="#0075BF" />
                        <path
                            d="M118.608 48.0809C104.751 48.0809 100.405 48.8426 95.1264 56.9559C89.8467 65.0677 75.6648 86.9268 75.6648 86.9268H111.181C117.382 86.9268 123.417 84.2059 126.016 79.7081L147 48.0809H118.608Z"
                            fill="#ACC42A" />
                        <path
                            d="M104.392 0C118.249 0 122.595 0.76174 127.874 8.87496C133.153 16.9868 147.335 38.8459 147.335 38.8459H111.819C105.618 38.8459 99.5825 36.125 96.9838 31.6272L76 0H104.392Z"
                            fill="#E2383F" />
                    </svg>

                    <input name="email" type="email" id="email" value=""
                        class="text-black placeholder:text-black/50" placeholder="Email Address" autofocus autocomplete
                        required>
                    <input name="password" type="password" id="password" value=""
                        class="text-black placeholder:text-black/50" placeholder="Password" autocomplete="off" required>

                    <button id="login-button" type="submit">
                        <svg width="148" height="40" viewBox="0 0 148 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="login-button-bg"
                                d="M43.4486 0C29.4283 0 25.0318 0.784363 19.6906 9.13862C14.3488 17.4915 0 40 0 40H111.76C118.033 40 124.14 37.1982 126.769 32.5668L148 0H43.4486Z"
                                fill="#ACC32A" />
                        </svg>
                        <div class="label" style="color:black !important;">Log In</div>
                    </button>
                </div>
            </form>

            <x-validation-errors class="mt-2 mb-6" />



        </div>
        <div class="flex justify-between fixed px-12 pt-12 top-0 text-sm w-full z-[200]">
            <img src="{{ asset('/images/logo-bumn.png') }}" alt="" style="height: 30px" class="brightness-[1000]">
            <img src="{{ asset('/images/logo-hut.png') }}" alt="" style="height: 30px">

        </div>

        <div class="text-center text-white fixed bottom-5 opacity-50 text-sm w-full z-[200]">
            Copyright &copy; 2023 - PT Pertamina Gas Negara
        </div>

    </section>
    <div class="opacity-20 fixed z-10 w-screen h-screen grayscale flex justify-center items-center"
        data-vbg="
        https://www.youtube.com/watch?v=VJrff_xCU9w
    ">
        <div class="loading loading-infinity w-[200px]"></div>
    </div>
    {{-- <div class="fixed z-10 opacity-20 contrast-200 w-screen h-screen hue-rotate-180 flex justify-center items-center"
        data-vbg="https://www.youtube.com/watch?v=TQQJD7D6PIU">
        <div class="loading loading-infinity w-[200px]"></div>
    </div> --}}
    <div class="fixed z-[-1] h-screen w-screen bg-black"></div>

    <script type="text/javascript" src="https://unpkg.com/youtube-background/jquery.youtube-background.min.js"></script>
    <script type="text/javascript">
        const videoBackgrounds = new VideoBackgrounds('[data-vbg]');
    </script>
</x-auth-layout>

<script>
    const loginBg = document.getElementById("login-bg");
    const loginBox = loginBg.getBoundingClientRect();

    const usernameBg = document.getElementById("username-bg");
    const passwordBg = document.getElementById("password-bg");

    const usernameBox = usernameBg.getBoundingClientRect();
    const passwordBox = passwordBg.getBoundingClientRect();

    const usernameInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    const loginButton = document.getElementById("login-button");
    const loginButtonBg = document.getElementById("login-button-bg");

    // Adjust the position of input elements
    usernameInput.style.top = (usernameBox.top - loginBox.top) + "px";
    usernameInput.style.left = (usernameBox.left - loginBox.left + 78) + "px";
    passwordInput.style.top = (passwordBox.top - loginBox.top) + "px";
    passwordInput.style.left = (passwordBox.left - loginBox.left + 78) + "px";
    loginButton.style.top = (loginBox.height - 18) + "px";
    loginButton.style.right = 32 + "px";

    // Adjust the size of input elements
    usernameInput.style.width = (usernameBox.width - 78 - 32) + "px";
    usernameInput.style.height = usernameBox.height + "px";
    passwordInput.style.width = (passwordBox.width - 78 - 32) + "px";
    passwordInput.style.height = passwordBox.height + "px";

    usernameInput.addEventListener("focus", () => {
        usernameBg.style.fill = "#FFFFFF";
        usernameBg.style.stroke = "#E2383F";
    });
    usernameInput.addEventListener("blur", () => {
        usernameBg.style.fill = "#F5F5F5";
        usernameBg.style.stroke = "#E2383F00";
    });
    passwordInput.addEventListener("focus", () => {
        passwordBg.style.fill = "#FFFFFF";
        passwordBg.style.stroke = "#ACC42A";
    });
    passwordInput.addEventListener("blur", () => {
        passwordBg.style.fill = "#F5F5F5";
        passwordBg.style.stroke = "#ACC42A00";
    });
</script>
