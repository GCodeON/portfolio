@foreach ($media_reel as $media)
        <div class="media">
            <img class="videoThumbnail" name="{{ $media['video'] }}" data-open="youtubeModal" alt="{{ $media['description'] }}" src="{{ $media['thumbnail'] }}"/>
                <img class="btn-play" src="/images/play.png" />
                <p>{!! $media["description"] !!}</p>
        </div>
@endforeach