<nav class="text-gray-500 dark:text-gray-400 text-sm">
    <ol class="list-reset flex">
        @php
            $segments = Request::segments();
        @endphp
        @foreach($segments as $index => $segment)
            <li>
                <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}" class="hover:text-gray-700 dark:hover:text-gray-300">
                    {{ ucfirst($segment) }}
                </a>
                @if(!$loop->last)
                    <span class="mx-2"> / </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
