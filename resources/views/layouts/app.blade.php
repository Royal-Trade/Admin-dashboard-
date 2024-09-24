<x-layouts.base>
    @if(
            in_array(request()->route()->getName(), [
                'register',
                'register-example',
                'login',
                'login-example',
                'forgot-password',
                'forgot-password-example',
                'reset-password',
                'reset-password-example'
            ])
        )

            {{ $slot }}
            {{-- Footer --}}
            @include('layouts.footer2')


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

        {{ $slot }}
    @else
        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
            {{-- TopBar --}}
            <!-- @include('layouts.topbar') -->


            <!-- <hr> -->
            {{ $slot }}
            {{-- Footer --}}
            @include('layouts.footer')
        </main>

    @endif
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</x-layouts.base>