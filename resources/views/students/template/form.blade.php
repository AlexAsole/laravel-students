@php
if (isset($edit) && !empty($edit)) {
    $method = 'PATCH';
    $url = route('students.update', ['student' => $student->id]);
    $product = 'MODIFICA';
} else {
    $method = 'POST';
    $url = route('students.store');
    $product = 'INSERISCI';
}
@endphp



<form action="{{ $url }}" method="post">
    @csrf
    @method( $method )
    <div class="form-group">

        <label for="name">Nome</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
            placeholder="name" value="{{ isset($student) ? $student->name : '' }}">
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    </div>

    <div class="form-group">

        <label for="last_name">Cognome</label>
        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name"
            placeholder="last_name" value="{{ isset($student) ? $student->last_name : '' }}">
        <div class="invalid-feedback">
            {{ $errors->first('last_name') }}
        </div>
    </div>

    <div class="form-group">

        <label for="class">Classe</label>
        <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class"
            placeholder="class" value="{{ isset($student) ? $student->class : '' }}">
        <div class="invalid-feedback">
            {{ $errors->first('class') }}
        </div>
    </div>

    <div class="form-group">

        <label for="birth">Data di nascita</label>
        <input class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" type="date" name="birth"
            placeholder="birth" value="{{ isset($student) ? $student->birth : '' }}">
        <div class="invalid-feedback">
            {{ $errors->first('birth') }}
        </div>
    </div>



    <button type="submit" class="btn btn-primary">
        Fatto?
    </button>
</form>
