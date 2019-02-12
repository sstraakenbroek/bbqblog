<header class="masthead" style="background-image: url('@yield('masthead.background', asset('storage/img/home.jpg') )')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>@yield('masthead.title', config('app.name'))</h1>
                    @hasSection('masthead.subtitle')
                        <span class="subheading">@yield('masthead.subtitle')</span>
                    @endif
                    @hasSection('masthead.meta')
                        <span class="meta">@yield('masthead.meta')</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>