<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Productos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="w-auto p-3">
        <div class="w-auto p-3">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Productos</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="#">Clientes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="w-auto p-3">
    <form id="form-compra" class="row g-3">  
        <div class="w-75 p-3">
            <h2>Ventas</h2>
            
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($producto as $item_product)
                    <div class="col">
                        <div class="card">
                        <img src="https://cdn.dribbble.com/users/1380436/screenshots/6812317/reload.gif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Producto: {{$item_product->name_product}}</h5>
                            <p class="card-text"> Price: $ {{$item_product->unitarie_price}}</p>
                            <button type="button" class="btn btn-info" onclick="agregarACompra('{{$item_product->id}}', '{{$item_product->name_product}}', {{$item_product->unitarie_price}})">Agregar a compra</button>
                        </div>
                        </div>
                    </div>      
                @endforeach
            </div>
        </div>
            <div class="w-25 p-3 position-fixed top-0 end-0 h-100 bg-light">
                <h2>Compra actual
                </h2> 
                <br>
                    @csrf
                    @if (session('Exito'))
                        <h5 class="alert alert-success">{{session('Exito')}}</h5>
                    @endif
                    @if (session('Error'))
                    <h5 class="alert alert-warning">{{session('Error')}}</h5>
                    @endif
                    @error('name_product')
                    <h5 class="alert alert-warning">{{$message}}</h5>    
                    @enderror
                    @error('unitarie_price')
                    <h5 class="alert alert-warning">{{$message}}</h5>    
                    @enderror
                <table id="tabla-compra" class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio / U</th>
                        <th scope="col">Precio total</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
                    
                    <div class="col-auto">
                    <button type="button" onclick="enviarCompra()" class="btn btn-primary mb-3">Hacer compra</button>
                    </div>

            </div>
        </div>


        </div>
    </form>
    <script src="{{ asset('js/sale.js') }}"> </script>
    </body>

</html>