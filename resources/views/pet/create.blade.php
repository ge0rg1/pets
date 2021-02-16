@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <h5 class="card-header">
                        Добави домашен любимец
                    </h5>
                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('pet.store') }}"
                        >
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Име на домашния любимец</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="petType">Вид животно</label>
                                    <select
                                        name="petType"
                                        class="form-control"
                                        id="petType"
                                    >
                                        <option>Изберете...</option>
                                        @foreach($petTypes as $type)
                                            <option
                                                @if($type->id == old('petType')) selected
                                                @endif value="{{ $type->id }}"
                                            >{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Информация</label>
                                <textarea
                                    class="form-control"
                                    id="description"
                                    rows="3"
                                    name="description"
                                >{{ old('description') }}</textarea>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >Запази
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
