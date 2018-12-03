<div class="static-header">
    <div class="title-bar">
        <div class="title-bar-left">
            <div class="logo">
                <a class="ga-logo home" href="/" data-ga-category="Navigational Clicks" data-ga-action="Click Header"
                   data-ga-label="Logo">
                    <!-- <img src="/images/logo.svg"  alt="site logo"> -->
                    <h5>Gera Soto</h5>
                </a>
            </div>
        </div>
        <div class="title-bar-right">
            <ul class="hide-for-small-only menu desktop-menu">
                @foreach($menu as $item)
                    <li class="{{$item['class'] or ''}}{{ $item['active'] ? ' active' : '' }}">
                        <a href="{{$item['url']}}">{{$item['name']}}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="hide-for-small-only menu sub-menu desktop-menu">
                @foreach($subMenu as $item)
                    <li class="{{$item['class'] or ''}}{{ $item['active'] ? ' active' : '' }}">
                        <a href="{{$item['url']}}">{{$item['name']}}</a>
                    </li>
                @endforeach
            </ul>
            <button type="button" data-toggle="mobile-menu fixed-header" class="clear button black mobile-menu-open show-for-small-only">
                <span>Menu</span>
            </button>
        </div>
    </div>
</div>

<div id="fixed-header" class="fixed-header" data-toggler=".open">
    <div class="title-bar">
        <div class="title-bar-left">
            <div class="logo">
                <a class="ga-logo home" href="/" data-ga-category="Navigational Clicks" data-ga-action="Click Header"
                   data-ga-label="Logo">
                    <img src="/images/logo.png" alt="logo"/>
                </a>
            </div>
        </div>
        <div class="title-bar-right">
            <button type="button" data-toggle="mobile-menu fixed-header" class="clear button black mobile-menu-open">
                <span>Menu</span>
            </button>
        </div>
    </div>
</div>

<div class="full reveal" id="mobile-menu" data-toggler=".open">
    <div class="transition-container">
        <div class="reveal-header">
            <div class="title-bar">
                <div class="title-bar-left">
                    <div class="logo">
                        <a class="ga-logo home" href="/" data-ga-category="Navigational Clicks" data-ga-action="Click Header"
                           data-ga-label="Logo">
                           @include ('partials.logo-svg')
                        </a>
                    </div>
                </div>
                <div class="title-bar-right">
                    <button class="mobile-menu-close close-button" aria-label="Close reveal" type="button" data-close="mobile-menu">
                        <!-- <img src="{{asset('images/close-button.svg')}}" alt="close modal"> -->
                        @include('partials.close-button-svg')
                    </button>
                </div>
            </div>
        </div>
        <div class="reveal-body">
            <div class="top-menu">
                <ul class="menu vertical">
                    @foreach($menu as $item)
                        <li class="{{ $item['active'] ? 'active' : '' }}">
                            <a href="{{$item['url']}}">{{$item['name']}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bottom-menu">
                <ul class="menu sub-menu align-center">
                    @foreach($subMenu as $item)
                        <li class="{{$item['class'] or ''}}{{ $item['active'] ? ' active' : '' }}">
                            <a href="{{$item['url']}}">{{$item['name']}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="share-icons">
                <div class="menu-label show-for-medium">
                    <span class="vertical-rl">Follow us</span>
                    <hr class="vertical">
                </div>
                <ul class="menu icons align-center">
                    <li>
                        <a href="">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
