<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">


    </head>
    <body>
        <div class="p-8">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="flex flex-col justify-center items-center text-grey-darkest">
                <h1 class="title text-4xl mb-6">
                    Dashboard
                </h1>
                <div class="text-center py-8">
                      <div class="text-grey-darker mb-2">
                        <span class="text-5xl">{{ $subscribers }}</span>
                      </div>
                      <div class="text-sm uppercase text-grey-dark tracking-wide">
                          Mailchimp Email Subscribers
                      </div>
                  </div>

                <div class="mt-4">
                <h3 class="text-md mb-4 uppercase tracking-wide">Lists</h3>
                    <ul class="list-reset">
                        @foreach($lists as $list)
                            <li class="mb-3"> {{ $list['name'] }} ({{ $list['stats']['member_count'] }})</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="text-center py-8">
                      <div class="text-grey-darker mb-2">
                        <span class="text-5xl">{{ $dripTotalSubscribers }}</span>
                      </div>
                      <div class="text-sm uppercase text-grey-dark tracking-wide">
                          Drip Email Subscribers
                      </div>
                  </div>

                <div class="mt-4">
                <h3 class="text-md mb-4 uppercase tracking-wide">Top Pages Last 30 Days</h3>
                <div class="text-sm mb-3 uppercase tracking-wide">Views</div>
                    <ul class="list-reset">
                        @foreach($topPages as $page)
                            <li class="mb-3"> <strong>{{ $page['pageViews'] }}</strong> <a href="https://mattwoods.io{{ $page['url'] }}" class="text-blue ml-4">{{ $page['url'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
