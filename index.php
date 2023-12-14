<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Meus pedidos:</h1>
    <form action="salvar.php" method="post">
        <label>Data</label> <br>
        <input type="date" name="data">
        <label>Cliente</label><br><br>
        <input type="text" name="cliente">
        <label>Produto</label><br><br>
        <input type="text" name="produto">
        <label>Valor</label><br><br>
        <input type="number" name="valor">
        <input type="submit" value="Salvar">
    </form>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <h2>Meus pedidos:</h2>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td scope="row">23/11/23</td>
                    <td>José</td>
                    <td>Mesa</td>
                    <td>23,00</td>
                    <td><a name="editar" id="editar" class="btn btn-warning" href="#" role="button">Teste</a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Item</td>
                    <td>Item</td>
                    <td>Item</td>
                    <td>Item</td>
                    <td><a name="excluir" id="excluir" class="btn btn-danger" href="#" role="button">Teste</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>