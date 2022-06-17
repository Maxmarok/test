<table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">Дата и время перехода</th>
          <th scope="col">Страна</th>
          <th scope="col">Город</th>
          <th scope="col">User-Agent</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
            <tr>
                <td>
                    <span class="text-secondary">{{$item['open_time_days']}}</span><span class="text-muted">, {{$item['open_time_hours']}}</span>
                </td>
                <td>{{$item['country']}}</td>
                <td>{{$item['city']}}</td>
                <td>{{$item['beauty_user_agent']}}</td>
            </tr>
        @endforeach
      </tbody>
</table>
