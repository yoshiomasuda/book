<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container-fluid">

  <div>
    <section class="jumbotron">
      <div class="container text-center">
        <h1 class="display-4">The New Internet</h1>
        <p class="lead text-muted">Decentralized, secure, private. The PiperNet is on it's way to revolutionize every smartphone, PC, and smart-fridge near you.</p>
        <a class="btn btn-primary my-2" href="/create">登録</a><a class="btn btn-link my-2" href="#">Read more</a>
      </div>
    </section>
  </div>

  <div></div>
</div>

<td>総数 {{$item_number_sum}}</td>
<td>合計 {{$item_subtotal_sum}}</td>

@if(!empty($books))
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">画像</th>
      <!-- <th scope="col">コード</th> -->
      <th scope="col">@sortablelink('item_code', 'コード')</th>
      <!-- <th scope="col">商品名</th> -->
      <th scope="col">@sortablelink('item_name', '商品名')</th>
      <th scope="col">ブランド</th>
      <th scope="col">メーカー</th>
      <th scope="col">数量</th>
      <th scope="col">単価</th>
      <th scope="col">小計</th>
      <th scope="col">削除</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1;
    @endphp
    @foreach($books as $book)　
    <!--　複数の本から一つの本を検索 -->
    <form method="POST" class="form-horizontal">
      @csrf
      <input type="hidden" name="item_code" value="{{$book->item_code}}">
      <input type="hidden" name="item_amount" value="{{$book->item_amount}}">

      <tr>
        <th scope="row">
          @php
          echo $i;
          $i++;
          @endphp
        </th>
        <td>
          @if ($book->item_image !== null)
          <img src="{{ asset('/storage/img/'.$book->item_image) }}" width="60">
          @else
          @endif
        </td>
        <!-- <td><img src="/storage/app/public/img/{{ $book->item_image }}" /></td> -->
        <td>{{ $book->item_code }}</td>
        <td><a href="/{{ $book->id }}/edit">{{ $book->item_name }}</a></td>
        <td>{{ $book->item_brand }}</td>
        <td>{{ $book->item_maker }}</td>
        <td><input type="text" size="2" name="item_number" class="form-control" value="{{$book->item_number}}"></td>
        <td>{{ number_format($book->item_amount) }} 円</td>
        <td>{{ number_format($book->item_subtotal) }} 円</td>
        <td>
          <button type="submit" class="btn btn-primary">
            修正
          </button>
          <a href="/{{ $book->id }}/destroy" onclick="return confirm('完全に削除されますが、よろしいですか？')">削除</a>
        </td>
      </tr>
    </form>
    @endforeach
  </tbody>
</table>


<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4">
      {{ $books->appends(request()->query())->links() }}
    </div>
  </div>
  @else
  本がありません
  @endif

</div>
<!-- Book: 既に登録されてる本のリスト -->




@endsection