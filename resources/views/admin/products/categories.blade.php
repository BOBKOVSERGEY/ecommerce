@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminCategories')

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
                    <a data-open="item-{{ $category['id'] }}"><i class="fas fa-edit"></i></a>
                    <a href="#"><i class="fas fa-times"></i></a>
                    <div class="reveal" id="item-{{ $category['id'] }}" data-animation-in="scale-in-up" data-animation-out="spin-out" data-reveal  >
                      <h1>Edit Category</h1>
                      <div class="notification callout"></div>

                          <form>
                            <div class="input-group">
                              <input type="text" id="item-name-{{ $category['id'] }}" class="input-group-field" name="name" value="{{ $category['name'] }}">
                            </div>
                            <div class="text-center">
                              <input type="submit" class="button update-category" id="{{ $category['id'] }}" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Update">
                            </div>
                          </form>

                      <button class="close-button" data-close aria-label="Close modal" type="button">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
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
