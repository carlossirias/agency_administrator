<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        
        
    </style>
    
</head>
<body style="font-family:Roboto; background-image: url('https://i.ibb.co/VvP84r2/Proyecto-nuevo.jpg');">
    <div style="position: fixed; left: 0px; top: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000;">
        <img src="https://i.ibb.co/VvP84r2/Proyecto-nuevo.jpg" style="width: 100%;">
    </div>
    <header style="display: grid; width:100%; grid-template-columns: 1fr 1fr 1fr;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Logo_Eskimo_Nicaragua.svg/2560px-Logo_Eskimo_Nicaragua.svg.png" width="120" alt="" srcset="">

        <h1 style="text-align:center">{{Auth::user()->agency_name}}</h1>
        <p style="text-align:center">{{Auth::user()->agency_adress}}</p>
        <p style="text-align: center">{{Auth::user()->agency_phone}}</p>
    </header>
    <hr class="border border-danger border-2 opacity-50">
    <main>
        <h3>{{$seller[0]->seller_name}}</h3>
        <p><strong>Salida: </strong>{{$seller[0]->departure_datetime}} - <strong>Entrada: </strong>{{$seller[0]->arrival_datetime}}</p>
        <br>
        <table class="table" style="border: #b2b2b2 3px solid;">
            <thead style="border: #b2b2b2 1px solid;">
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Salida</th>
                <th scope="col">Entrada</th>
                <th scope="col">Venta</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($palletes as $pallete)
                <tr>
                    
                    <td>{{$pallete->pallete_name}}</td>
                    <td>{{$pallete->quantity_send}}</td>
                    <td>{{$pallete->quantity_sold}}</td>
                    <td>{{$pallete->quantity_send - $pallete->quantity_sold}}</td>
                    <td>{{env('COIN').$pallete->price}}</td>
                    <td>{{env('COIN').number_format($pallete->price * ($pallete->quantity_send - $pallete->quantity_sold),2)}}</td>
                </tr>
            @endforeach
            <tr style="border: #b2b2b2 1px solid;">
                <th colspan="5" style="text-align: right">Total:</th>
                <td>{{env('COIN').$seller[0]->total_earned}}</td>
            </tr>
            </tbody>
          </table>

          <p>Cada factura debe ser guardada con severa atencion.</p>
          <br>
          <br>
          <br>
        </main>
        <div style="position: fixed; bottom:0; left:0;">
            <span style=""><strong>Firma del vendedor: </strong>________________</span>
        </div>
</body>
</html>