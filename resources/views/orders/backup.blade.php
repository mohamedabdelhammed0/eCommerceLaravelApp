@php
    $product_id = \App\Product::find( $product->{'id'} );
   $product_id = $product_id->{'id'};

   // final method
   \App\Product::find($product_id)->sizes()->sync([1,2,3,4,5,6,7,8]);

     $sizeNameBefore=  \App\Product::find( $product_id )->sizes()->pluck('name');
     $targetSize = $product->{'attributes'}[0]->{'size'};

     $sizeIdBefore=  \App\Product::find( $product_id )->sizes()->pluck('size_id');
    dd();
     $sizeAfter =  $sizeIdBefore->reject( $product->{'attributes'}[0]->{'size'} )->values();
            dd($sizeAfter);

@endphp
