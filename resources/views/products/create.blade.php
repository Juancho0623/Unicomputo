<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
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
        .card {
            background: #1e1e1e;
            padding: 25px;
            border-radius: 6px;
            max-width: 500px;
        }
        .field { margin-bottom: 15px; }
        label { display: block; color: #aaa; margin-bottom: 5px; font-size: 14px; }
        input {
            width: 100%;
            padding: 10px;
            background: #2a2a2a;
            border: 1px solid #333;
            color: #e0e0e0;
            border-radius: 4px;
        }
        input:focus { outline: none; border-color: #bb86fc; }
        .btn {
            background: #3a3a3a;
            color: #e0e0e0;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover { background: #4a4a4a; }
    </style>
</head>
<body>
    <h1>Nuevo Producto</h1>
    <div class="card">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="field">
                <label>Código</label>
                <input type="text" name="codigo" required>
            </div>
            <div class="field">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="field">
                <label>Precio</label>
                <input type="number" step="0.01" name="precio" required>
            </div>
            <div class="field">
                <label>Cantidad</label>
                <input type="number" name="cantidad" required>
            </div>
            <div class="field">
                <label>Categoría</label>
                <input type="text" name="categoria" required>
            </div>
            <button class="btn">Guardar</button>
            <a href="{{ route('products.index') }}" style="margin-left:10px;">Cancelar</a>
        </form>
    </div>
</body>
</html>
