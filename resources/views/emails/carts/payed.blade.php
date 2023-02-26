@component('mail::message')
# PEDIDO PAGADO CORRECTAMENTE

Estimada/o {{ $client->name }}:  
Hemos recibido su pago correctamente.  
A continuación detallamos los datos del pedido  

@component('mail::table')
| Producto             | Cantidad                          | Total                   |
| -------------------- | --------------------------------- | ----------------------- |
@foreach ($cart->products as $product)
| {{ $product->name }} | {{ $product->pivot->quantity }}   | {{ $product->price }} € |
@endforeach
|                      | Total                             | {{ $cart->total }} €    |
@endcomponent

## DATOS DE ENVÍO

- {{ $client->name }}
- {{ $client->street }}, {{ $client->number }}, {{ $client->postal_code }}
- {{ $client->city }}, {{ $client->province }}, {{ $client->country }}
- {{ $client->email }}

**TOTAL**: {{ $cart->total }} €

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
