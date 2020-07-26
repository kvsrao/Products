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
                    <form method="post" action="{{ url('product-update/'.$product->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="product_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text"
                                    class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                    value="{{ $product->product_name }}" required autocomplete="product_name" autofocus>

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
                                    value="{{ old('description') }}" required autocomplete="description" autofocus >{{ $product->description }}</textarea>
                                <script>
                                    CKEDITOR.replace( 'description' );
                                </script>

                                <!-- <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ $product->description }}" required autocomplete="description" autofocus> -->

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

                                <?php
                                    $cats = json_decode($product->category);
                                    if($cats){
                                        foreach($cats as $cat){
                                            // echo $cat;
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="category[]" value="{{$cat}}" checked>{{$cat}}</label>
                                            </div>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="category[]" value="Option 1">Option 1</label>
                                            </div>


                                            <div class="checkbox">
                                                <label><input type="checkbox" name="category[]" value="Option 2">Option 2</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="category[]" value="Option 3">Option 3</label>
                                            </div>

                                        <?php
                                    }
                                ?>

                                <!-- <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 1">Option 1</label>
                                </div>


                                <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 2">Option 2</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="category[]" value="Option 3">Option 3</label>
                                </div> -->




                                <!-- <input id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" name="category"
                                    required autocomplete="category" value="{{ $product->category }}"> -->

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
                                    autocomplete="stock" value="{{ $product->stock }}">

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
                                    value="{{ $product->available_stock }}">

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
                                    required autocomplete="publish_date" value="{{ $product->publish_date }}">

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
                                    class="form-control @error('review_enable') is-invalid @enderror" name="review_enable"
                                    required autocomplete="review_enable" value="{{ $product->review_enable }}"> -->
                         
                                <div class="radio">
                                    <label><input type="radio" name="review_enable" value="1"   <?php if($product->review_enable == 1) echo "checked" ?>    >Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="review_enable" value="0"  <?php if($product->review_enable == 0) echo "checked" ?>   >Option 2</label>
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
                                    class="form-control @error('comment_enable') is-invalid @enderror" name="comment_enable"
                                    required autocomplete="comment_enable" value="{{ $product->comment_enable }}"> -->



                                <div class="radio">
                                    <label><input type="radio" name="comment_enable" value="1"   <?php if($product->comment_enable == 1) echo "checked" ?>   >Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="comment_enable" value="0"  <?php if($product->comment_enable == 0) echo "checked" ?>    >Option 2</label>
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
                                    class="form-control @error('shipping_option') is-invalid @enderror" name="shipping_option"
                                    required autocomplete="shipping_option" value="{{ $product->shipping_option }}"> -->

                                <?php
                                $options = json_decode($product->shipping_option);
                                if($options){
                                    foreach($options as $option){
                                        // echo $cat;
                                        ?>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="shipping_option[]" value="{{$option}}" checked>{{$option}}</label>
                                        </div>
                                    <?php
                                    }
                                }else{
                                    ?>
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
                                    <?php
                                }
                                ?>    




                                <!-- <div class="checkbox">
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
                                </div> -->


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
                                    required autocomplete="payment_mode" value="{{ $product->payment_mode }}"> -->

                                
                                    
                                <?php
                                    $payments = json_decode($product->payment_mode);
                                    if($payments){
                                        foreach($payments as $payment){
                                            // echo $cat;
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="payment_mode[]" value="{{$payment}}" checked>{{$payment}}</label>
                                            </div>
                                        <?php
                                        }
                                    }else{
                                        ?>
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
                                        <?php
                                    }
                                ?>     

<!-- 
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
                                </div> -->



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
