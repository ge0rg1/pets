<div class="row">
    <div class="col">
        <div class="card @if(!request()->get('submit')) mt-5 @endif">
            <h5 class="card-header">
                Намери
            </h5>
            <div class="card-body">
                <form
                    method="GET"
                    action="{{ route('pet.index') }}"
                >
                    <div
                        class="form-group"
                    >
                        <label
                            class="col-form-label"
                            for="petType"
                        >Вид животно</label>
                        <select
                            name="pet_type_id"
                            class="form-control"
                            id="petType"
                        >
                            <option value="">Изберете...</option>
                            @foreach($petTypes as $type)
                                <option
                                    value="{{ $type->id }}"
                                >{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div
                        class="form-group"
                    >
                        <label
                            class="col-form-label"
                            for="name"
                        >Име на домашния любимец</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                        >
                    </div>
                    <button
                        type="submit"
                        name="submit"
                        value="1"
                        class="btn btn-primary float-right"
                    >Търси
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
