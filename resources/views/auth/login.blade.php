<x-auth-layout>
    <section class="relative h-screen w-screen z-20">

        <div
            class="px-0 py-3 text-base-100 lg:-mt-7
            {{-- lg:rounded-tl-[72px] lg:rounded-br-[72px]  --}}
             rounded-xl
            h-screen md:h-fit w-full flex flex-col justify-center items-center fixed z-20 lg:bottom-[50%] lg:left-[50%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            {{-- <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot> --}}


            <div class="text-[50px] mb-3 text-center font-bold">
                RCP PORTAL
            </div>


            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex gap-2 items-center justify-center">


                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block w-full text-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block w-full text-black" type="password" name="password" required autocomplete="current-password" />
                    </div>

                </div>
                <button class="btn btn-primary btn-block mt-5">
                    {{ __('Log in') }}
                </button>



            </form>


            <x-validation-errors class="mt-2 mb-6" />



        </div>
        <div class="flex justify-between fixed px-12 pt-12 top-0 text-sm w-full z-[200]">
            <img src="{{ asset('/images/logo-bumn.png') }}" alt="" style="height: 30px" class="brightness-[1000]">
            <img src="{{ asset('/images/logo-hut.png') }}" alt="" style="height: 30px">

        </div>

        <div class="text-center text-white fixed bottom-5 opacity-50 text-sm w-full z-[200]">
            Copyright &copy; 2023 - PT Pelita Berkah Abadi
        </div>

    </section>
    {{-- <div class="opacity-20 fixed z-10 w-screen h-screen grayscale flex justify-center items-center"
        data-vbg="
        https://www.youtube.com/watch?v=VJrff_xCU9w
    "> --}}
        {{-- <div class="loading loading-infinity w-[200px]"></div>
    </div> --}}
    {{-- <div class="fixed z-10 opacity-20 contrast-200 w-screen h-screen hue-rotate-180 flex justify-center items-center"
        data-vbg="https://www.youtube.com/watch?v=TQQJD7D6PIU">
        <div class="loading loading-infinity w-[200px]"></div>
    </div> --}}
    <div class="fixed z-[-1] h-screen w-screen bg-black"></div>

    {{-- <script type="text/javascript" src="https://unpkg.com/youtube-background/jquery.youtube-background.min.js"></script>
    <script type="text/javascript">
        const videoBackgrounds = new VideoBackgrounds('[data-vbg]');
    </script> --}}
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
