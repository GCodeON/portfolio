@component('styleguide::code-head')
    carousels
@endcomponent

@component('styleguide::code', [
'title' => 'our approach carousel',
'note' => '',
'partial' => '
<carousel-tabs class="carousel-arrow-tab"></carousel-tabs>

'
])

    <carousel-tabs class="carousel-arrow-tab"></carousel-tabs>


@endcomponent

@component('styleguide::code', [
'title' => 'behavior carousel',
'note' => '',
'partial' => '
<carousel-behavior class="carousel-bracket-tab"></carousel-behavior>

'
])

    <carousel-behavior class="carousel-bracket-tab"></carousel-behavior>


@endcomponent

@component('styleguide::code', [
'title' => 'population carousel',
'note' => '',
'partial' => '
<carousel-population class="carousel-bracket-tab tab-right"></carousel-population>

'
])

    <carousel-population class="carousel-bracket-tab tab-right"></carousel-population>


@endcomponent





