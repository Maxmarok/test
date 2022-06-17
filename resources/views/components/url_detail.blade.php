<div>
    <div class="form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">Уменьшенная ссылка:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input class="form-control col-sm-6" id="short" type="text" value="{{$shortUrl}}" readonly>
            </div>
            <button class="btn btn-success col-sm-2" onclick="copyText('short')">Скопировать</button>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label">Оригинальная ссылка:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input class="form-control" id="origin_url" type="text" value="{{$fullUrl}}" readonly>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label">Срок жизни ссылки до:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input class="form-control" id="ended_time" type="text" value="{{$endedTime}}" disabled>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 col-form-label">Ссылка на статистику:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input class="form-control" id="stats" type="text" value="{{$statsUrl}}" readonly>
            </div>
            <button class="btn btn-success col-sm-2" onclick="copyText('stats')">Скопировать</button>
        </div>
    </div>

    <div class="d-flex col-sm-9 mt-4">
        <div class="col-sm-4 mr-1">
            <a href="{{route('main')}}" class="btn btn-primary">Уменьшить другую ссылку</a>
        </div>
        @if(request()->route()->getName() !== 'stats')
        <div class="col-sm-4 ml-1">
            <a href="{{$statsUrl}}" class="btn btn-warning">Перейти в статистику</a>
        </div>
        @endif
    </div>
</div>


