<div>
    <div class="col-sm-12 mb-5">
        <h1>Подробная статистика</h1>
        @component('components.url_detail', [
            'fullUrl'  => $data['short']['full_url'],
            'shortUrl' => $data['short']['short_url'],
            'statsUrl' => $data['stats_url'],
            'endedTime' => $data['short']['ended_time'],
        ])@endcomponent
    </div>

    @if(count($data['stats']) > 0)
        @component('components.statistics_table', [
            'data' => $data['stats']
        ]) @endcomponent

    @else
        <h2>Переходов по ссылке еще не зафиксировано</h2>
    @endif
</div>
