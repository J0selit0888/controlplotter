<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tfoot {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>REPORTE D.G.R.</h2>
    
                                    <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Fecha y hora</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regimpresion as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->usuario->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y H:i')}}</td>
                                           
                                    @endforeach
                                </tbody>
                            </table>
        <p>{{ \Carbon\Carbon::now()->format('d/m/Y H:i')}} </p>
    </div>

</body>

</html>
