<x-guest-layout>
    <section class="relative h-screen w-screen z-20">

        <div class="px-0 py-2 backdrop-blur-sm rounded-md shadow-xl bg-slate-800/90 w-[500px] flex flex-col justify-center items-center fixed z-20 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            {{-- <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot> --}}
    
            
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
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
            <form class="mt-12 animate__animated animate__fadeIn" method="POST" action="{{ route('login') }}">
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
            
                    <input name="email" type="email" id="email" value=""  class="text-black placeholder:text-black/50" placeholder="Email Address" autofocus
                        autocomplete required>
                    <input name="password" type="password" id="password" value="" class="text-black placeholder:text-black/50" placeholder="Password" autocomplete="off"
                        required>
            
                    <button id="login-button" type="submit">
                        <svg width="148" height="40" viewBox="0 0 148 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path id="login-button-bg"
                                d="M43.4486 0C29.4283 0 25.0318 0.784363 19.6906 9.13862C14.3488 17.4915 0 40 0 40H111.76C118.033 40 124.14 37.1982 126.769 32.5668L148 0H43.4486Z"
                                fill="#0075BF" />
                        </svg>
                        <div class="label">Log In</div>
                    </button>
                </div>
            </form>

            <x-validation-errors class="mt-2 mb-6" />
        </div>
    </section>
    {{-- <div class="fixed z-10 opacity-40 w-screen h-screen grayscale flex justify-center items-center animate__animated animate__fadeIn animate__delay-1s" data-vbg="https://www.youtube.com/watch?v=BqFSHbzSs7U">
        <div class="loading loading-infinity w-[200px]"></div>
    </div> --}}
    <div class="fixed z-10 opacity-20 contrast-200 w-screen h-screen hue-rotate-180 flex justify-center items-center" data-vbg="https://www.youtube.com/watch?v=TQQJD7D6PIU">
        <div class="loading loading-infinity w-[200px]"></div>
    </div>
    <div class="fixed z-[-1] h-screen w-screen bg-black"></div>
    <script type="text/javascript" src="https://unpkg.com/youtube-background/jquery.youtube-background.min.js"></script>
    <script type="text/javascript">
        const videoBackgrounds = new VideoBackgrounds('[data-vbg]');
    </script>
</x-guest-layout>

{{-- <x-guest-layout>

    


</x-guest-layout> --}}

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