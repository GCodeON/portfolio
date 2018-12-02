@component('styleguide::code-head')
    elements
@endcomponent

@component('styleguide::code', [
'title' => 'home section banner',
'note' => '',
'partial' => "
@component('components.section-banner')
    @slot('pre')
        Our
    @endslot
    Expertise
@endcomponent
"
])
    <div class="text-center">

        @component('components.section-banner')
            @slot('pre')
                Our
            @endslot
            Expertise
        @endcomponent
    </div>

    <div class="text-center">

        @component('components.section-banner')
            Services & Capabilities
        @endcomponent
    </div>

@endcomponent

@component('styleguide::code', [
'title' => 'image border blocks',
'note' => ''
])
    <div class="grid-x align-center">
        <div class="cell small-6">
            <div class="highlight-border">
                <img src="http://via.placeholder.com/705x478"/>
            </div>
        </div>
    </div>
@endcomponent



