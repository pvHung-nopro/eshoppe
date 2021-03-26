<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
.title__{
    color: red;
    font-size: 18px;
    font-family: fangsong;
}
.product_name__{
    color: black;
    font-size: 16px;
    font-family: fangsong;
}
.qty__{
    color: black;
    font-size: 14px;
    font-family: fangsong;
}

</style>
<body>
   <p class="title__" style="text-align: center;
   color: red;
   font-size: 22px;
   font-family: ui-sans-serif;">Thank you for your order</p>
    @foreach($product_name as $item)
   <p class="product_name__" style="    text-align: center;
   color: blue;
   font-size: 16px;
   font-family: fangsong;
">Product Name: {{$item->name}} </p>
   <p class="qty__" style="    text-align: center;
   color: blue;
   font-size: 16px;
   font-family: fangsong;
">amount      : {{$item->qty}} </p>
   </br>

   @endforeach
   <p style="    text-align: center;
   color: blue;
   font-size: 16px;
   font-family: fangsong;
">total money: ${{floatval($total['total_cart'])}} </p>
</body>
</html>
