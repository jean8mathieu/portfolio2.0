<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumb as $key => $value)
                <li class="breadcrumb-item {{ ($value == end($breadcrumb)) ? 'active' : '' }}">
                    @if($value === end($breadcrumb))
                        {{ $key }}
                    @else
                        @if(empty($value))
                            {{ $key }}
                        @else
                            <a href="{{ $value }}">{{ $key }}</a>
                        @endif
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
</div>
