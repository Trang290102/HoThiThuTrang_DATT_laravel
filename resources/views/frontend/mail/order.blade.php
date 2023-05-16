{{-- <style>
 .mail{
    width:500px;
    margin:0 auto;
    padding: 15px;
    text-align:center;
 }
</style> --}}

<div class="email" style="width:500px;margin:0 auto;padding: 15px;text-align:center;
">
    <h2>Xin chào {{$auth->name}}</h2>
    <p>Cảm ơn bạn đã đặt hàng tại website của chúng tôi, vui lòng kiểm tra lại thông tin đơn hàng. Mọi thắc mắc, xin vui lòng liên hệ qua website hoặc hotline: 097 503 0513.</p>
    <h3>Thông tin đơn hàng</h3>
    <table border="1" cellspacing="0" cellpadding="10"  style="width:100%">
        <tr>
            <th>Họ và tên</th>
            <td>{{$order->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$order->email}}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{$order->phone}}</td>
        </tr>
        <tr>
            <th>Địa chỉ giao hàng</th>
            <td>{{$order->address}}</td>
        </tr>
        <tr>
            <th>Mã đơn hàng</th>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <th>Ngày đặt hàng</th>
            <td>{{$order->created_at}}</td>
        </tr>
        <tr>
            <th>Hình thức thanh toán</th>
            <td>COD</td>
        </tr>
        <tr>
            <th>Ghi chú đơn hàng</th>
            <td>{{$order->note}}</td>
        </tr>
    </table>
    <h3>Chi tiết đơn hàng</h3>

    <table border="1" cellspacing="0" cellpadding="10" style="width:100%">
        <thead>
            <tr>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($cart->items as $item)
            <tr>
                <td>
                    {{$i++}}
                </td>
                <td>
                    {{$item['name']}}
                </td>
                <td>
                    <p>{{number_format($item['price'])}} VNĐ</p>
                </td>
                <td>
                    <p>{{$item['quantity']}}</p>
                </td>
                <td>
                    <p>{{number_format((int)$item['price']*(int)$item['quantity'])}} VNĐ</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Tổng giá trị đơn hàng: {{number_format($cart->total_price)}} VNĐ</h3>

</div>
