@extends("layouts.home")

@section("title")
    住所登録 - モノアド
@endsection

@section("content")
    <section class="create__wrapper">
        <div class="create__inner">
            <div class="create__summary">
                <h2>住所登録</h2>
            </div>
            <form method="post" action="{{ route("belonging.store") }}" class="belonging-submit__form">
                @csrf
                <div>
                    <label for="">名前</label>
                    <input type="text" name="belonging_name" value="{{ old("belonging_name") }}">
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
                    <button>登録する</button>
                </div>
            </form>

            <form method="post" action="{{ route("address.store") }}" class="address-submit__form">
                @csrf
                <label for="">住所を追加する</label>
                <div class="address-submit__div">
                    <input name="address_name" type="text" placeholder="例:クローゼット" value="{{ old("address_name") }}">
                    <button>追加する</button>
                </div>
                @error("address_name")
                    <p class="error">{{ $message }}</p>
                @enderror
            </form>

            <form method="post" action="{{ route("tag.store") }}" class="tag-submit__form">
                @csrf
                <label for="">タグを追加する</label>
                <div class="tag-submit__div">
                    <input name="tag_name" type="text" placeholder="例:筆記用具" value="{{ old("tag_name") }}">
                    <button>追加する</button>
                </div>
                @error("tag_name")
                    <p class="error">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </section>
@endsection
