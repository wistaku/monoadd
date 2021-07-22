@extends("layouts.home")

@section("title")
    タグ一覧 - モノアド
@endsection

@section("content")
    <section class="index__section">
        <div class="index__inner">
            <div class="index__summary">
                <h2>タグ一覧</h2>
                <p>タグをクリックすると、そのタグがついたモノ一覧が表示されます</p>
            </div>
            @forelse ($tags as $tag)
            <div class="index__detail">
                <div class="index__div">
                    <a href="{{ route("tag.show", $tag) }}">{{ $tag->tag_name }}</a>
                    <div class="index__form">
                        <form class="delete__form" method="post" action="{{ route("tag.delete", $tag) }}">
                            @csrf
                            @method("DELETE")
                            <button>削除</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="index__detail">
                <p class="empty__p">まだタグが登録されていません。</p>
            </div>
            @endforelse
            <div class="paginate__div">
                {{ $tags->links() }}
            </div>
        </div>
    </section>
@endsection
