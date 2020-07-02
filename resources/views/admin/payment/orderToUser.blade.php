<h1>{{$data['title']}}</h1>
<p>Khác hàng: <b>{{$data['name']}}</b></p>
<p>Có địa chỉ là: <b>{{$data['address']}}</b></p>
<p>Ngày đặt hàng: <b>{{$data['date']}}</b></p>
<?php $i=0; ?>
@foreach ($products as $item)
<p>Tên sản phẩm <?php echo $i=$i+1;?>: <b>{{$item->name_product}}</b></p>
@endforeach
<p>Tổng giá là: <b style="font-size: 30px;color: red;">{{$data['price']}}</b></p>
<p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi !</p> <br>
<p>thanks</p>
<p>tienthanhSport</p>
