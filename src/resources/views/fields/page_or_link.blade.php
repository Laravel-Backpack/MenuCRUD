{{-- PAGE OR LINK field --}}
{{-- Used in Backpack\MenuCRUD --}}

<?php
    $field['allows_null'] = $field['allows_null'] ?? false;
   
    [$type, $link, $page_id] = explode(',', $field['name']);
    $field['configurationNames'] = [];

    $field['configurationNames']['type'] = $type ?? 'type';
    $field['configurationNames']['link'] = $link ?? 'link';
    $field['configurationNames']['page_id'] = $page_id ?? 'page_id';
    $field['options']['page_link'] = $field['options']['page_link'] ?? trans('backpack::crud.page_link');
    $field['options']['internal_link'] = $field['options']['internal_link'] ?? trans('backpack::crud.internal_link');
    $field['options']['external_link'] = $field['options']['external_link'] ?? trans('backpack::crud.external_link');

    $field['pages'] = $field['pages'] ?? ($field['page_model'] ?? config('backpack.pagemanager.page_model_class'))::all();
?>

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <div class="row" data-init-function="bpFieldInitPageOrLinkElement">
        {{-- hidden placeholders for content --}}
        <input type="hidden" value="{{ $entry->{$field['configurationNames']['page_id']} ?? '' }}" name="{{ $field['configurationNames']['page_id'] }}" />
        <input type="hidden" value="{{ $entry->{$field['configurationNames']['link']} ?? '' }}" name="{{ $field['configurationNames']['link'] }}" />

        <div class="col-sm-3">
            {{-- type select --}}
            <select
                data-identifier="page_or_link_select"
                name="{!! $field['configurationNames']['type'] !!}"
                @include('crud::fields.inc.attributes')
                >

                @if ($field['allows_null'])
                    <option value="">-</option>
                @endif

                @foreach ($field['options'] as $key => $value)
                    <option value="{{ $key }}"
                        @if (isset($entry) && $key === $entry->{$field['configurationNames']['type']})
                            selected
                        @endif
                    >{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-9">
            {{-- page slug input --}}
            <div class="page_or_link_value page_link {{ (isset($entry) && $entry->{$field['configurationNames']['type']} === 'page_link') || (isset($entry) && !$entry->{$field['configurationNames']['type']} && !$field['allows_null']) || (!isset($entry) && !$field['allows_null']) ? '' : 'd-none' }}">
                <select
                    class="form-control"
                    for="{{ $field['configurationNames']['page_id'] }}"
                    required
                    >
                    @foreach ($field['pages'] as $page)
                        <option value="{{ $page->id }}"
                            @if (isset($entry) && $page->id === $entry->{$field['configurationNames']['page_id']})
                                selected
                            @endif
                        >{{ $page->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- internal link input --}}
            <div class="page_or_link_value internal_link {{ isset($entry) && $entry->{$field['configurationNames']['type']} === 'internal_link' ? '' : 'd-none' }}">
                <input
                    type="text"
                    class="form-control"
                    placeholder="{{ trans('backpack::crud.internal_link_placeholder', ['url', url(config('backpack.base.route_prefix').'/page')]) }}"
                    for="{{ $field['configurationNames']['link'] }}"
                    required
                    @if(isset($entry))
                        @if ($entry->{$field['configurationNames']['type']} !== 'internal_link' && $entry->{$field['configurationNames']['type']} !== 'page_link')
                            disabled="disabled"
                        @endif

                        @if ($entry->{$field['configurationNames']['type']} === 'internal_link' && $entry->{$field['configurationNames']['link']})
                            value="{{ $entry->{$field['configurationNames']['link']} }}"
                        @endif
                    @else
                        disabled="disabled"
                    @endif
                    >
            </div>

            {{-- external link input --}}
            <div class="page_or_link_value external_link {{ isset($entry) && $entry->{$field['configurationNames']['type']} === 'external_link' ? '' : 'd-none' }}">
                <input
                    type="url"
                    class="form-control"
                    placeholder="{{ trans('backpack::crud.page_link_placeholder') }}"
                    for="{{ $field['configurationNames']['link'] }}"
                    required
                    @if(isset($entry))
                        @if ($entry->{$field['configurationNames']['type']} !== 'external_link' && $entry->{$field['configurationNames']['type']} !== 'page_link')
                            disabled="disabled"
                        @endif

                        @if ($entry->{$field['configurationNames']['type']} === 'external_link' && $entry->{$field['configurationNames']['link']})
                            value="{{ $entry->{$field['configurationNames']['link']} }}"
                        @endif
                    @else
                        disabled="disabled"
                    @endif
                    >
            </div>
        </div>
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

@include('crud::fields.inc.wrapper_end')


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
    <script>
        function bpFieldInitPageOrLinkElement(element) {
            element = element[0]; // jQuery > Vanilla

            const select = element.querySelector('select[data-identifier=page_or_link_select]');
            const values = element.querySelectorAll('.page_or_link_value');

            // updates hidden fields
            const updateHidden = () => {
                let selectedInput = select.value && element.querySelector(`.${select.value}`).firstElementChild;
                element.querySelectorAll(`input[type="hidden"]`).forEach(hidden => {
                    hidden.value = selectedInput && hidden.getAttribute('name') === selectedInput.getAttribute('for') ? selectedInput.value : '';
                });
            }

            // save input changes to hidden placeholders
            values.forEach(value => value.firstElementChild.addEventListener('input', updateHidden));

            // main select change
            select.addEventListener('change', () => {
                values.forEach(value => {
                    let isSelected = value.classList.contains(select.value);

                    // toggle visibility and disabled
                    value.classList.toggle('d-none', !isSelected);
                    value.firstElementChild.toggleAttribute('disabled', !isSelected);
                });

                // updates hidden fields
                updateHidden();
            });
        }
    </script>
    @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}