@extends('layouts.default')

@section('content')
    <div class="container">
        @if($pets->isEmpty())
            @if(request()->get('submit'))
                @include('partials.components.heading', ['pageHeading' => 'Няма намерени резултати'])
            @endif
            @include('pet.partials.filter')
        @else
            @include('partials.components.heading', ['pageHeading' => 'Нашите домашни любимци'])

            <div class="row pets-results">
                <div class="col">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr>
                            <th>Име</th>
                            <th>Вид</th>
                            <th>Информация</th>
                            <th>Дата на добавяне</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pets as $pet)
                            <tr>
                                <td class="context">{{ $pet->name }}</td>
                                <td>{{ optional($pet->petType)->name }}</td>
                                <td>{{ $pet->description }}</td>
                                <td>{{ $pet->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('custom-js')
    <script>
        const instance = new Mark(document.querySelector('td.context'));
        instance.mark("{{ request()->get('name', '') }}", {
            'element': 'span',
            'className': 'highlight',
        });
    </script>
@endsection
