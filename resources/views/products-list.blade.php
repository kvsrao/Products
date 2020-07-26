@extends('layouts.app')

@section('content')
<div class="container">

<h1>List Of Products</h1>
@if(Session::has('pmessage'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('pmessage') }}</p>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Payment Metods</th>
                <th>Available Stock</th>
                <th>Image</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <?php 
                $images = json_decode($product->image);
                $categories = json_decode($product->category);
                $methods = json_decode($product->payment_mode);
            ?>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{!! $product->description  !!}</td>
                <td>
                    <!-- {{ $product->category }} -->

                    <?php
                        if($categories){
                            foreach($categories as $category){
                                ?>
                                <label>{{$category}}</label><br>
                                <?php
                            }
                        }
                    ?>


                </td>

                <td>
                    <!-- {{ $product->category }} -->

                    <?php
                        if($methods){
                            foreach($methods as $method){
                                ?>
                                <label>{{$method}}</label><br>
                                <?php
                            }
                        }
                    ?>


                </td>

                <td>{{$product->available_stock}}</td>

                <td>
                    <!-- {{ $product->image }} -->
                    <?php
                        foreach(@$images as $image){
                            ?>
                            <img src="{{asset($image)}}" width="80">
                            <?php
                        }
                    ?>
                </td>
                <td><a href="{{url('product-edit/'.$product->id)}}">Edit</a>/<a href="{{url('product-delete/'.$product->id)}}" > Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
