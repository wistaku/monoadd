@extends("layouts.home")

@section("title")
    住所一覧 - モノアド
@endsection

@section("content")
    <section class="index__section">
        <div class="index__inner">
            <div class="index__summary">
                <h2>住所一覧</h2>
                <p>住所をクリックすると、その住所にあるモノ一覧が表示されます</p>
            </div>
            @forelse ($addresses as $address)
            <div class="index__detail">
                <div class="index__div">
                    <a href="{{ route("address.show", $address) }}">{{ $address->address_name }}</a>
                    <div class="index__form">
                        <form class="delete__form" method="post" action="{{ route("address.delete", $address) }}">
                            @csrf
                            @method("DELETE")
                            <button>削除</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="index__detail">
                <p class="empty__p">まだ住所が登録されていません。</p>
            </div>
            @endforelse
            <div class="paginate__div">
                {{ $addresses->links() }}
            </div>
        </div>
    </section>
@endsection
