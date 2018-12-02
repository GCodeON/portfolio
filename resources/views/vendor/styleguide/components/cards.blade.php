@component('styleguide::code-head')
    cards
@endcomponent

@component('styleguide::code', [
'title' => 'hover card',
'note' => '',
'partial' => '
<div class="grid-x align-center">
    <div class="cell small-4">
        @component(\'components.hover-card\')
            @slot(\'image\')
                <img src="/images/case-study/fresh-empire.png" alt="">
            @endslot

            <img class="logo" src="/images/case-study/fresh-empire-logo.png" alt="">
            <p>A national tobacco prevention campaign targeting high-risk multicultural youth to associate Hip Hop culture with a tobacco-free lifestyle</p>

            @slot(\'hover\')
                <div class="text-center vert-seperator">
                    <img src="/images/case-study/hover-line.png" alt="">
                </div>
                <div class="cta">view case study</div>
            @endslot

        @endcomponent
    </div>
</div>
'
])

    <div class="grid-x align-center">
        <div class="cell medium-4">
            @component('components.hover-card', ['link' => '/some-page'])
                @slot('image')
                    <img src="/images/case-study/fresh-empire.png" alt="">
                @endslot

                <img class="logo" src="/images/case-study/fresh-empire-logo.png" alt="">
                <p>A national tobacco prevention campaign targeting high-risk multicultural youth to associate Hip Hop culture with a tobacco-free lifestyle</p>

                @slot('hover')
                    <div class="text-center vert-seperator">
                        <img src="/images/case-study/hover-line.png" alt="">
                    </div>
                    <div class="cta">view case study</div>
                @endslot
            @endcomponent
        </div>
    </div>
@endcomponent

@component('styleguide::code', [
'title' => 'business card',
'note' => '',
'partial' => '
@component(\'components.business-card\')
    @slot(\'image\')
        <img data-interchange="[/images/business-cards/sm/research-strategy.png, small], [/images/business-cards/md/research-strategy.png, medium] ">
    @endslot
    <h3 class="title">Business Strategy</h3>
    <p>Audience Insights</p>
    <p>Formative Research</p>
    <p>Segmentation Research</p>
    <p>Creative & Message Testing</p>
    <p>Media Trackers</p>
    <p>Strategic Planning</p>
@endcomponent
'
])

    <div class="grid-x grid-margin-x">
        <div class="cell medium-6">
            @component('components.business-card')
                @slot('image')
                    <img data-interchange="[/images/business-cards/sm/research-strategy.png, small], [/images/business-cards/md/research-strategy.png, medium] ">
                @endslot
                <h3 class="title">Business Strategy</h3>
                <p>Audience Insights</p>
                <p>Formative Research</p>
                <p>Segmentation Research</p>
                <p>Creative & Message Testing</p>
                <p>Media Trackers</p>
                <p>Strategic Planning</p>
            @endcomponent
        </div>
        <div class="cell medium-6">
            @component('components.business-card')
                @slot('image')
                    <img data-interchange="[/images/business-cards/sm/research-strategy.png, small], [/images/business-cards/md/research-strategy.png, medium] ">
                @endslot
                <h3 class="title">Business Strategy</h3>
                <p>Audience Insights</p>
                <p>Formative Research</p>
                <p>Segmentation Research</p>
                <p>Creative & Message Testing</p>
                <p>Media Trackers</p>
                <p>Strategic Planning</p>
            @endcomponent
        </div>
    </div>

@endcomponent



