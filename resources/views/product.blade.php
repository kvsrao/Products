@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('pmessage'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('pmessage') }}</p>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('product-register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text"
                                    class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                    value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">

                                <textarea name="description" class="@error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" required autocomplete="description" autofocus ></textarea>
                                <script>
                                    CKEDITOR.replace( 'description' );
                                </script>

                                <!-- <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" required autocomplete="description" autofocus> -->

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image[]" value="{{ old('image') }}" required autocomplete="image" multiple >

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">


                                <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 1">Option 1</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 2">Option 2</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 3">Option 3</label>
                                </div>

                                <!-- <input id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" name="category"
                                    required autocomplete="category" value="{{ old('category') }}"> -->

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number"
                                    class="form-control @error('stock') is-invalid @enderror" name="stock" required
                                    autocomplete="stock" value="{{ old('stock') }}">

                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="available_stock"
                                class="col-md-4 col-form-label text-md-right">{{ __('Available Stock') }}</label>

                            <div class="col-md-6">
                                <input id="available_stock" type="number"
                                    class="form-control @error('available_stock') is-invalid @enderror"
                                    name="available_stock" required autocomplete="available_stock"
                                    value="{{ old('available_stock') }}">

                                @error('available_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="publish_date"
                                class="col-md-4 col-form-label text-md-right">{{ __('Publish Date') }}</label>

                            <div class="col-md-6">
                                <input id="publish_date" type="date"
                                    class="form-control @error('publish_date') is-invalid @enderror" name="publish_date"
                                    required autocomplete="publish_date" value="{{ old('publish_date') }}">

                                @error('publish_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="review_enable"
                                class="col-md-4 col-form-label text-md-right">{{ __('Review Enable') }}</label>

                            <div class="col-md-6">

                                <!-- <input id="review_enable" type="text"
                                    class="form-control @error('review_enable') is-invalid @enderror"
                                    name="review_enable" required autocomplete="review_enable"
                                    value="{{ old('review_enable') }}"> -->



                                <div class="radio">
                                    <label><input type="radio" name="review_enable" value="1" checked>Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="review_enable" value="0">Option 2</label>
                                </div>



                                @error('review_enable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="comment_enable"
                                class="col-md-4 col-form-label text-md-right">{{ __('Comment Enable') }}</label>

                            <div class="col-md-6">

                                <!-- <input id="comment_enable" type="text"
                                    class="form-control @error('comment_enable') is-invalid @enderror"
                                    name="comment_enable" required autocomplete="comment_enable"
                                    value="{{ old('comment_enable') }}"> -->


                                <div class="radio">
                                    <label><input type="radio" name="comment_enable" value="1" checked>Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="comment_enable" value="0">Option 2</label>
                                </div>

                                @error('comment_enable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="shipping_option"
                                class="col-md-4 col-form-label text-md-right">{{ __('Shipping Option') }}</label>

                            <div class="col-md-6">

                                <!-- <input id="shipping_option" type="text"
                                    class="form-control @error('shipping_option') is-invalid @enderror"
                                    name="shipping_option" required autocomplete="shipping_option"
                                    value="{{ old('shipping_option') }}"> -->



                                <div class="checkbox">
                                    <label><input type="checkbox" name="shipping_option[]" value="Option 1">Option
                                        1</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="shipping_option[]" value="Option 2">Option
                                        2</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="shipping_option[]" value="Option 3">Option
                                        3</label>
                                </div>

                                @error('shipping_option')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="payment_mode"
                                class="col-md-4 col-form-label text-md-right">{{ __('Payment Mode') }}</label>

                            <div class="col-md-6">

                                <!-- <input id="payment_mode" type="text"
                                    class="form-control @error('payment_mode') is-invalid @enderror" name="payment_mode"
                                    required autocomplete="payment_mode" value="{{ old('payment_mode') }}"> -->


                                <div class="checkbox">
                                    <label><input type="checkbox" name="payment_mode[]" value="Option 1">Option
                                        1</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="payment_mode[]" value="Option 2">Option
                                        2</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="payment_mode[]" value="Option 3">Option
                                        3</label>
                                </div>



                                @error('payment_mode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
