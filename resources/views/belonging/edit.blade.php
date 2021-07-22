@extends("layouts.home")

@section("title")
    住所変更 - モノアド
@endsection

@section("content")
    <section class="create__wrapper">
        <div class="create__inner">
            <div class="create__summary">
                <h2>住所変更</h2>
            </div>
            <form method="post" action="{{ route("belonging.update", $belonging) }}" class="belonging-submit__form">
                @csrf
                @method("PATCH")
                <div>
                    <label for="">名前</label>
                    <input type="text" name="belonging_name" value="{{ old("belonging_name", $belonging->belonging_name) }}">
                    @error("belonging_name")
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="">住所</label>
                    @error("address_option")
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <select name="address_option">
                        @forelse ($addresses as $address)
                            <option>{{ $address->address_name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div>
                    <label for="">タグ</label>
                    @error("tag_option")
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <select name="tag_option">
                        @forelse ($tags as $tag)
                            <option>{{ $tag->tag_name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div>
                    <button>変更する</button>
                </div>
            </form>
        </div>
    </section>
@endsection
