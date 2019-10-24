Número do Pedido: {{ $order->id }}<br/>
Itens do pedido:<br/><br/>
@foreach ($order->pastels as $item)
    Sabor: {{ $item->name }}<br/>
    Quantidade: {{ $item->pivot->amount }}<br/>
    Preço por item: {{  $item->price }}<br/>
    Preço: {{ $item->pivot->amount * $item->price }}<br/><br/>
@endforeach
Total: {{ $order->value }}