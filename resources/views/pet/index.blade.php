@extends('layouts.default')

@section('content')
    <div class="container">
        @if(session()->has('alert-success'))
            <div class="alert alert-success mt-5">
                {{ session()->get('alert-success') }}
            </div>
        @endif

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
                        <tbody class="context">
                        @foreach($pets as $pet)
                            <tr>
                                <td>{{ $pet->name }}</td>
                                <td class="exclude-highlight">{{ optional($pet->petType)->name }}</td>
                                <td class="exclude-highlight">{{ $pet->description }}</td>
                                <td class="exclude-highlight">{{ $pet->created_at->format('d.m.Y') }}</td>
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
        const instance = new Mark(document.querySelector('tbody.context'));
        instance.mark("{{ request()->get('name', '') }}", {
            'exclude': [
                '.exclude-highlight',
            ],
            'acrossElements': true,
            'element': 'span',
            'className': 'highlight',
        });
    </script>
@endsection
