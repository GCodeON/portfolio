<div class="card hover-card">
    <a href="{{ $link or '' }}">
    {{ $image }}
    <div class="card-section text-center">
        {{ $slot }}

        <div class="hover-content">
            {{ $hover }}
        </div>
    </div>
    </a>
</div>