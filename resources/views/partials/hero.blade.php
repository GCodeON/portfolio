<div class="hero @if (isset($class)) {{ $class }} @endif @if ($project) project @endif  @if (isset($brand)) {{ $brand }} @endif @if (isset($topic)) {{ $topic }} @endif" style="background-image: url('{{ $background_image }}');">
	<div class="buffer"></div>
	<div class="overlay">
		<div>
			<svg preserveAspectRatio="none" viewBox="0 0 100 100">
				<polygon class="hide-for-medium" points="-15,100 100,100 100,85" opacity="1"></polygon>
				<polygon class="show-for-medium" points="0,0 100,0 0,100" opacity="1"></polygon>
			</svg>
		</div>
	</div>
	<div class="grid-container height-100">
		<div class="grid-x grid-margin-x align-middle height-100">
		@if (isset($brand))
		<div class="cell medium-12 large-7 hero-container">
		@else 
			<div class="cell medium-7 hero-container">
		@endif
				<div class="hero-content">
					@if (isset($title))
						{!! $title !!}
					@elseif (isset($brand))
						<img class="logo" src="/images/case-study/md/{{ $brand }}-logo.png">
					@endif
					<hr />
					@if (isset($content)) 
						<p class="description">
							{!! $content !!}
							@if (isset($project_type_icons))
								<br />
								<ul class="project-type-icons">
									@foreach ($project_type_icons as $type_icon)
										<li><img src="{{ $type_icon['icon'] }}" /></li>
									@endforeach
								</ul>
								<span class="project-type-icons"></span>
							@endif
						</p>
					@endif
					@if (isset($cta)) 
						<a class="btn-cta">{{ $cta }}</a>
					@endif
					@if (isset($media_reel))
						<div class="media-reel">
							@include ('partials.media-reel', $media_reel)
						</div>
						@include ('partials.video-modal')
					@endif
				</div>
			</div>
		</div>
	</div>
</div>