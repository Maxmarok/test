<form class="" method="POST" action="{{route('create_url')}}">
    <div class="form-group">
        <label for="url" class="col-sm-4 col-form-label">Ссылка:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input class="form-control col-sm-6 @if($errors->has('origin_url')) is-invalid @endif" id="origin_url" name="origin_url" type="text" placeholder="Введите ссылку, которую хотите уменьшить" value="{{old('origin_url')}}">
            </div>
        </div>

        @error('origin_url')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="ended_at" class="col-sm-4 col-form-label">Срок жизни ссылки до:</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6 position-relative">
                <input class="form-control col-sm-6 @if($errors->has('ended_at')) is-invalid @endif" id="ended_at" name="ended_at" type="text" placeholder="Укажите дату до окончания срока жизни ссылки" value="{{old('ended_at')}}">

                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        @error('ended_at')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="endless" class="col-sm-4 col-form-label">Неограниченный срок жизни</label>
        <div class="d-flex col-sm-12">
            <div class="col-sm-6">
                <input id="endless" name="endless" type="checkbox" @if(old('endless')) checked @endif">
            </div>
        </div>
    </div>

    <button class="btn btn-primary col-sm-2 mt-3"">Уменьшить</button>
</form>
