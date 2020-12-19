<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')

<!-- Bootstrapの定形コード･･･ -->
<div class="card-body">
    <div class="card-title">
        本の登録
    </div>

    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- 本登録フォーム -->
    <form method="POST" class="form-horizontal" action="/create" enctype="multipart/form-data">
         @csrf

        <!-- 本の番号 -->
        <div class="card-title">
        本のコード
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_code" class="form-control">
            </div>
        </div>

        <!-- 本のタイトル -->
        <div class="card-title">
        本のタイトル
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_name" class="form-control">
            </div>
        </div>

        <!-- 本のブランド -->
        <div class="card-title">
        本のブランド
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_brand" class="form-control">
            </div>
        </div>

        <!-- 本のメーカー -->
        <div class="card-title">
        本のメーカー
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_maker" class="form-control">
            </div>
        </div>

        <!-- 本の数量 -->
        <div class="card-title">
        本の数量
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_number" class="form-control">
            </div>
        </div>

        <!-- 本の金額 -->
        <div class="card-title">
        本の金額
        </div>
        <div class="form-group">
            <div class="col-sm-6">
            <input type="text" name="item_amount" class="form-control">
            </div>
        </div>

        <!-- 画像 -->
        <div class="form-group">
            <label for="item_image"><i class="fas fa-check-square"></i> メイン画像</label>
            <input class="form-control-file" type="file" name="item_image" accept="image/*">
        </div>

       


        <!-- 本　登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
    




@endsection
