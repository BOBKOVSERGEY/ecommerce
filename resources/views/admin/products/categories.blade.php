@extends('admin.layout.base')
@section('title', 'Product Categories')

@section('content')
  <div class="category">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h1>Product Categories</h1>
      </div>
    </div>
    @if($message)
      <div class="grid-x grid-padding-x">
        <div class="cell">
          <div class="callout success" data-closable="slide-out-right">
            <h5>This a friendly message.</h5>
            <p>{{ $message }}</p>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    @endif

    @if(isset($errors))
      <div class="grid-x grid-padding-x">
        <div class="cell">
          <div class="callout alert" data-closable="slide-out-right">
            <h5>This is an alert callout</h5>
            @foreach($errors as $errorArray)
              @foreach($errorArray as $error)
                <p>{{ $error }}</p>
              @endforeach
            @endforeach
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    @endif

    <div class="grid-x grid-padding-x">
      <div class="cell small-12 medium-6">
        <form action="/admin/product/categories" method="post">
          <div class="input-group">
            <input type="text" class="input-group-field" placeholder="Search by name">
            <div class="input-group-button">
              <input type="submit" class="button" value="Search">
            </div>
          </div>
        </form>
      </div>
      <div class="cell small-12 medium-6">
        <form action="/admin/product/categories" method="post">
          <div class="input-group">
            <input type="text" class="input-group-field" name="name" placeholder="Category name">
            <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
            <div class="input-group-button">
              <input type="submit" class="button" value="Create">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="grid-x grid-padding-x">
      <div class="cell">
        @if(count($categories))
          <table class="hover">
            <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category['name'] }}</td>
                  <td>{{ $category['slug'] }}</td>
                  <td>{{ $category['added'] }}</td>
                  <td width="100" class="text-right">
                    <a href="#"><i class="fas fa-edit"></i></a>
                    <a href="#"><i class="fas fa-times"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! $links !!}
          @else
          <h3>You have not created any category</h3>
        @endif
      </div>
    </div>
  </div>
@endsection
