@extends('layouts.frontend')

@section('content')
    <div class="container px-6 mx-auto">
        <h2><?php echo $source?></h2>
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <?php $flag = false;
                foreach ($cart as $c ) {
                    if ($c->id == $product['id']) {
                        $flag = true;
                        break;
                    }
                }
            ?>
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="{{ url($product->avatar) }}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">

                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->title }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    <?php if($flag){ ?>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <button class="px-4 py-2 text-white bg-red-600">Delete form cart</button>
                        </form>
                    <?php } else { ?>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->title }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->avatar }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        </form>
                    <?php } ?>
                </div>

            </div>
            @endforeach
        </div>
        <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
            <ul class="pagination">
                <?php
                $link = "?page=";
                if ($page > 1) : ?>
                    <li class="prev"><a class="nav-link" href="<?php echo $link.($page - 1) ?>">Prev</a></li>
                <?php endif; ?>

                <?php if ($page > 3) : ?>
                    <li class="start"><a class="nav-link" href="<?php echo $link?>1">1</a></li>
                    <li class="dots"><a>...</a></li>
                <?php endif; ?>

                <?php if ($page - 2 > 0) : ?><li class="page"><a class="nav-link" href="<?php echo $link.($page - 2) ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                <?php if ($page - 1 > 0) : ?><li class="page"><a class="nav-link" href="<?php echo $link.($page - 1) ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a class="nav-link" href="<?php echo $link.$page ?>"><?php echo $page ?></a></li>

                <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a class="nav-link" href="<?php echo $link.($page + 1) ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a class="nav-link" href="<?php echo $link.($page + 2) ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                    <li class="dots"><a>...</a></li>
                    <li class="end"><a class="nav-link" href="<?php echo $link.ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                    <li class="next"><a class="nav-link" href="<?php echo $link.($page + 1) ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        {{-- {{ $products->links() }} --}}
    </div>
@endsection
