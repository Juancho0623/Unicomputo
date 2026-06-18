<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        h1 { color: #bb86fc; margin-bottom: 20px; }
        a { color: #bb86fc; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #2a2a2a;
            color: #e0e0e0;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn:hover { background: #333; text-decoration: none; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1e1e1e;
        }
        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        th { background: #252525; color: #bb86fc; }
        tr:hover { background: #2a2a2a; }
        .actions form { display: inline; }
        .actions button {
            background: #3a3a3a;
            color: #e0e0e0;
            border: none;
            padding: 4px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .actions button:hover { background: #4a4a4a; }
        .empty { padding: 20px; text-align: center; color: #888; }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Nuevo Producto</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $p)
            <tr>
                <td>{{ $p->codigo }}</td>
                <td>{{ $p->nombre }}</td>
                <td>${{ number_format($p->precio, 2) }}</td>
                <td>{{ $p->cantidad }}</td>
                <td>{{ $p->categoria }}</td>
                <td class="actions">
                    <a href="{{ route('products.edit', $p->id) }}">Editar</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button>Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="empty">No hay productos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
