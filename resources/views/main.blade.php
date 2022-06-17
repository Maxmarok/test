
@component('header') @endcomponent
<div class="main">
    <div class="container m-auto">
        <div class="row">
            <div class="d-flex col-9 m-auto flex-column">
                @if(isset($catalog))
                    @component('pages.'.$catalog, [
                        'data' => isset($data) ? $data : [],
                    ]) @endcomponent
                @endif
            </div>
        </div>
    </div>
</div>
@component('footer') @endcomponent
