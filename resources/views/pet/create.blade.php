@extends('layouts.default')

@section('content')
    <div class="container">
        <form
            method="POST"
            action="{{ route('pet.store') }}"
        >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Име на домашния любимец</label>
                    <input
                        type="text"
                        class="form-control"
                        id="inputEmail4"
                        placeholder="Email"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Вид животно</label>
                    <select
                        class="form-control"
                        id="exampleFormControlSelect2"
                    >
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Информация</label>
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                ></textarea>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >Запази
            </button>
        </form>
    </div>
@endsection
