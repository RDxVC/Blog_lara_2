@extends('layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Добавить статью
      <small>приятные слова..</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    {{Form::open([
      'route' => 'new.post.store',
      'files' => true
      ])}}
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Добавляем статью</h3>
        @include('admin.errors')
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('title)')}}">
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Лицевая картинка</label>
            <input type="file" name="image" id="exampleInputFile">

            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
          </div>
          <!-- /.input group -->
          </div>

          <!-- Date -->
          <div class="form-group">
            <label>Дата:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="date" class="form-control pull-right" id="datepicker" value="{{old('date')}}">
            </div>
            <!-- /.input group -->
          </div>

          <!-- checkbox -->
          <div class="form-group">
            <label>
              <input type="checkbox" class="minimal" name="status">
            </label>
            <label>
              Опубликовать
            </label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Описание</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Полный текст</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>
    </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('posts.index') }}" class="btn btn-default">Назад</a>
        <button class="btn btn-success pull-right">Добавить</button>
      </div>
      <!-- /.box-footer-->
      <!-- /.box -->
      {{Form::close()}}
    </section>

    </div>
  <!-- /.content -->

<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })
</script>
@endsection
