<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
        <div class="container">
          <a class="navbar-brand" href="{{ route('app.main') }}">{{ config("app.name") }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('app.main') }}">{{ __("app.menu.home")}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">{{ __("News")}}</a>
              </li>

              <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('Trademarks') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($trademarks as $trademark)
                                <li>
                                    <a class="dropdown-item" href="#">
                                        {{ $trademark->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                
                </ul>
              </li>

            </ul>
            <ul class="navbar-nav d-flex align-items-center justify-content-end" style="margin-right:0">

            <li class="nav-item text-light mx-3">
              @if($currentUser->cart)
              <a href="{{route('cart')}}" class="header-cart" style="color: white;">Корзина ({{ $currentUser->cart->items->count() }})</a>
              @else
              <span class="header-cart">Корзина</span>
              @endif
            </li>

            @unlessrole('user')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __("app.menu.dashboard")}}
                </a>
                <ul class="dropdown-menu">
                  @hasanyrole('super-admin|admin|moderator')
                  <li>
                    <a class="dropdown-item" href="{{route('categories.list')}}">
                    {{ __("app.menu.categories")}}
                    </a>
                  </li>
                  @endhasanyrole
                  @hasanyrole('super-admin|admin|moderator')
                <li>
                    <a class="dropdown-item" href="{{route('articles.index')}}">
                    {{ __("app.menu.news")}}
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('super-admin|admin|moderator')
                <li>
                    <a class="dropdown-item" href="{{route('products.index')}}">
                    {{ __("Products")}}
                    </a>
                  </li>
                  @endhasanyrole
                  @hasanyrole('super-admin|admin|moderator')
                  <li>
                    <a class="dropdown-item" href="{{route('trademarks.index')}}">
                    {{ __("Trademarks")}}
                    </a>
                  </li>
                  @endhasanyrole
                  @hasanyrole('super-admin|admin')
                  <li>
                    <a class="dropdown-item" href="{{route('users.index')}}">
                    {{ __("Users")}}
                    </a>
                  </li>
                  @endhasanyrole
                  @hasrole('super-admin')
                  <li>
                    <a class="dropdown-item" href="{{route('roles.index')}}">
                    {{ __("Roles")}}
                    </a>
                  </li>
                  @endhasrole
                  @hasrole('super-admin')
                  <li>
                    <a class="dropdown-item" href="{{route('permissions.index')}}">
                    {{ __("Permissions")}}
                    </a>
                  </li>
                  @endhasrole
                </ul>
              </li>
              @endunlessrole
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__("Lang")}}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="{{route('app.change-lang', 'en')}}">
                    {{__("English")}}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('app.change-lang', 'ru')}}">
                    {{__("Russian")}}
                    </a>
                </li>
                </ul>
              </li>
                    @if (auth()->user())
                        <li class="nav-item text-light mx-3">
                            {{ auth()->user()->name }}
                        </li>
                        <li class="nav-item text-light mx-3">

                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">{{ __("app.menu.logout")}}</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('auth.register') }}">{{__("Register")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('auth.login-page') }}">{{__("LogIn")}}</a>
                        </li>
                    @endif
                </ul>
          </div>
        </div>
      </nav>
</header>