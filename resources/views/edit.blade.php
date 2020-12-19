<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')

<!-- Bootstrapの定形コード･･･ -->
<div class="card-body">
    <div class="card-title">
        本の編集
    </div>

    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- 本登録フォーム -->
    <form method="POST" class="form-horizontal">
        @csrf

        <!-- 本の番号 -->
        <div class="card-title">
        本のコード
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_code" class="form-control" value="{{$book->item_code}}">
            </div>
        </div>
 
        
        <!-- 本のタイトル -->
        <div class="card-title">
        本のタイトル
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_name" class="form-control"value="{{$book->item_name}}">
            </div>
        </div>

        <!-- 本のブランド -->
        <div class="card-title">
        本のブランド
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_brand" class="form-control"value="{{$book->item_brand}}">
            </div>
        </div>

        <!-- 本のメーカー -->
        <div class="card-title">
        本のメーカー
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_maker" class="form-control"value="{{$book->item_maker}}">
            </div>
        </div>



        <!-- 本の番号 -->
        <div class="card-title">
        本の数
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_number" class="form-control"value="{{$book->item_number}}">
            </div>
        </div>

        <!-- 本の金額 -->
        <div class="card-title">
        本の金額
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_amount" class="form-control"value="{{$book->item_amount}}">
            </div>
        </div>


        <!-- 本　登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
            <div class="col-sm-offset-3 col-sm-6">
                <a href="/">bac</a>
            </div>
        </div>
    </form>
    




@endsection
