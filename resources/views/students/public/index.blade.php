@extends('students.template.base')

@section('title', 'Indice')

@section('content')
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Classe</th>
                <th scope="col">Data di nascita</th>
                @auth
                    <th scope="col">
                        <a class="btn btn-light" href="{{ route('students.create') }}">Crea</a>
                    </th>
                @endauth



            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->birth }}</td>
                    @auth
                        <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModalCenter{{ $student->id }}">
                                CANCELLA
                            </button>
                            <div class="modal fade" id="exampleModalCenter{{ $student->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">TITOLO BELLO</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            TESTO BELLO
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('students.destroy', compact('student')) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Cancella</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endauth

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
