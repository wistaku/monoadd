@extends("layouts.home")

@section("title")
    {{$tag->tag_name}} - モノアド
@endsection

@section("content")
    <section class="index__section">
        <div class="index__inner">
            <div class="index__summary">
                <h2>{{ $tag->tag_name }}</h2>
            </div>
            @forelse ($belongings as $belonging)
            <div class="index__detail">
                <div class="index__div">
                    <div>
                        <p class="belonging__name">{{ $belonging->belonging_name }}</p>
                        <p>住所：{{ $belonging->address->address_name }}</p>
                    </div>
                    <div class="index__form">
                        <form class="edit__form" method="get" action="{{ route("belonging.edit", $belonging) }}">
                            @csrf
                            <button>編集</button>
                        </form>
                        <form class="delete__form" method="post" action="{{ route("belonging.delete", $belonging) }}">
                            @csrf
                            @method("DELETE")
                            <button>削除</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="index__detail">
                <p class="empty__p">まだモノが登録されていません。</p>
            </div>
            @endforelse
        </div>
    </section>
@endsection
