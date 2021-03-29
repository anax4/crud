<?php
$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '<tr>
                    <td>' . $vaga->id . '</td>
                    <td>' . $vaga->titulo . '</td>
                    <td>' . $vaga->descricao . '</td>
                    <td>' . ($vaga->ativo == 1 ? 'Ativo' : 'Inativo') . '</td>
                    <td>' . date('d/m/Y H:i:s', strtotime($vaga->data)) . '</td>
                    <td>
                        <a href="editar.php?id=' . $vaga->id . '">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>

                        <a href="excluir.php?id=' . $vaga->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>


                    </td>';
}

?>


<main>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success mt-3"> Nova Vaga</button>
        </a>
    </section>

    <section>
        <table class="table mt-3 bg-light">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Título</td>
                    <td>Descrição</td>
                    <td>Status</td>
                    <td>Data</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>

    </section>

</main>