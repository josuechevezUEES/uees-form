@if ($tipo_pregunta_id == 1)
    <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
    <div class="row">
        <div class="col-sm-auto">
            <input type="radio" name="" id="" class="form-radio-input"> Si
        </div>
        <div class="col-sm-auto">
            <input type="radio" name="" id="" class="form-radio-input"> No
        </div>
        <div class="col-sm-auto">
            <input type="radio" name="" id="" class="form-radio-input"> Nunca
        </div>
    </div>
@endif

@if ($tipo_pregunta_id == 2)
    <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
    <div class="row">
        <div class="col-sm-12">
            <input type="text" name="" id="" class="form-control" placeholder="Requerido">
        </div>
    </div>
@endif


@if ($tipo_pregunta_id == 3)
    <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
    <div class="row">
        <div class="col-sm-auto">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>
        <div class="col-sm-auto">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>
        <div class="col-sm-auto">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>
    </div>
@endif
