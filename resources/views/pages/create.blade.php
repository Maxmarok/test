<div>
    <h1>Уменьшите ссылку и получите статистику переходов</h1>

    @if (session('error'))
        <p class="text-danger">{{session('error')}}</p>
    @endif

    @component('components.create_detail')

    @endcomponent
</div>
