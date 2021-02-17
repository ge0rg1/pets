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
                                <div
                                    class="form-group col-md-6"
                                >
                                    <label
                                        class="col-form-label @error('name') text-danger @enderror"
                                        for="name"
                                    >Име на домашния любимец</label>
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    >
                                    <div class="invalid-feedback">
                                        @error('name') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div
                                    class="form-group col-md-6"
                                >
                                    <label
                                        class="col-form-label @error('pet_type_id') text-danger @enderror"
                                        for="petType"
                                    >Вид животно</label>
                                    <select
                                        name="pet_type_id"
                                        class="form-control @error('pet_type_id') is-invalid @enderror"
                                        id="petType"
                                    >
                                        <option value="">Изберете...</option>
                                        @foreach($petTypes as $type)
                                            <option
                                                @if($type->id == old('pet_type_id')) selected
                                                @endif value="{{ $type->id }}"
                                            >{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('pet_type_id') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group"
                            >
                                <label
                                    class="col-form-label @error('description') text-danger @enderror"
                                    for="description"
                                >Информация</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    rows="3"
                                    name="description"
                                >{{ old('description') }}</textarea>
                                <div class="invalid-feedback">
                                    @error('description') {{ $message }} @enderror
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary float-right"
                            >Запази
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
