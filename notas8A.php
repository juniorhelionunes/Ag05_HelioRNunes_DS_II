<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas - 8º Ano A</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="container">

        <section class="card">

            <header>
                <h1>Notas do 8º Ano A</h1>
                <p>Resultado dos alunos</p>

                <form method="POST" action="">
                    <button type="submit" name="ordenar" class="botao-ordenar">
                        Ordenar por média
                    </button>
                </form>
            </header>

            <?php
            //array multidimensional com os dados dos alunos e suas notas
            $aluno = array(
                array("nome" => "Zulmira", "Nota Primeiro Bimestre" => 10.0, "Nota Segundo Bimestre" => 0.0, "Nota Terceiro Bimestre" => 8.0, "Nota Quarto Bimestre" => 4.0),
                array("nome" => "Aline", "Nota Primeiro Bimestre" => 10.0, "Nota Segundo Bimestre" => 9.5, "Nota Terceiro Bimestre" => 9.0, "Nota Quarto Bimestre" => 10.0),
                array("nome" => "Alfredo", "Nota Primeiro Bimestre" => 8.0, "Nota Segundo Bimestre" => 5.0, "Nota Terceiro Bimestre" => 2.5, "Nota Quarto Bimestre" => 1.0),
                array("nome" => "Carla", "Nota Primeiro Bimestre" => 5.0, "Nota Segundo Bimestre" => 6.5, "Nota Terceiro Bimestre" => 7.0, "Nota Quarto Bimestre" => 8.0),
                array("nome" => "Cesar", "Nota Primeiro Bimestre" => 9.0, "Nota Segundo Bimestre" => 9.0, "Nota Terceiro Bimestre" => 8.5, "Nota Quarto Bimestre" => 9.5),
                array("nome" => "Daniel", "Nota Primeiro Bimestre" => 10.0, "Nota Segundo Bimestre" => 7.0, "Nota Terceiro Bimestre" => 8.0, "Nota Quarto Bimestre" => 9.0),
                array("nome" => "Esnar", "Nota Primeiro Bimestre" => 8.0, "Nota Segundo Bimestre" => 6.0, "Nota Terceiro Bimestre" => 7.5, "Nota Quarto Bimestre" => 8.0),
                array("nome" => "Henzo", "Nota Primeiro Bimestre" => 2.0, "Nota Segundo Bimestre" => 6.5, "Nota Terceiro Bimestre" => 6.0, "Nota Quarto Bimestre" => 9.0),
                array("nome" => "Pablo", "Nota Primeiro Bimestre" => 7.0, "Nota Segundo Bimestre" => 4.0, "Nota Terceiro Bimestre" => 5.0, "Nota Quarto Bimestre" => 7.5),
                array("nome" => "Wallace", "Nota Primeiro Bimestre" => 8.0, "Nota Segundo Bimestre" => 7.0, "Nota Terceiro Bimestre" => 4.0, "Nota Quarto Bimestre" => 8.5),
            );

            //condição para ordenar o array de alunos com base na média das notas, caso o botão "Ordenar por média" seja clicado

            if (isset($_POST['ordenar'])) {

                usort($aluno, function ($a, $b) {

                    $mediaA = (
                        $a["Nota Primeiro Bimestre"] +
                        $a["Nota Segundo Bimestre"] +
                        $a["Nota Terceiro Bimestre"] +
                        $a["Nota Quarto Bimestre"]
                    ) / 4;

                    $mediaB = (
                        $b["Nota Primeiro Bimestre"] +
                        $b["Nota Segundo Bimestre"] +
                        $b["Nota Terceiro Bimestre"] +
                        $b["Nota Quarto Bimestre"]
                    ) / 4;

                    return $mediaB <=> $mediaA;
                });

            }

            ?>

            <table>

                <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>1º Bimestre</th>
                        <th>2º Bimestre</th>
                        <th>3º Bimestre</th>
                        <th>4º Bimestre</th>
                        <th>Média</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    //foreach para percorrer o array de alunos e exibir os dados na tabela, calculando a média das notas e definindo a cor da célula com base na média
                    foreach ($aluno as $alunos) {

                        $media = (
                            $alunos["Nota Primeiro Bimestre"] +
                            $alunos["Nota Segundo Bimestre"] +
                            $alunos["Nota Terceiro Bimestre"] +
                            $alunos["Nota Quarto Bimestre"]
                        ) / 4;

                        if ($media >= 6) {
                            $cor = "verde";
                        } else {
                            $cor = "vermelho";
                        }

                        ?>

                        <tr>

                            <td>
                                <!-- Tabela com os dados dos alunos e suas notas, exibindo a média e a cor correspondente -->
                                <?php echo $alunos["nome"]; ?>
                            </td>

                            <td>
                                <?php echo $alunos["Nota Primeiro Bimestre"]; ?>
                            </td>

                            <td>
                                <?php echo $alunos["Nota Segundo Bimestre"]; ?>
                            </td>

                            <td>
                                <?php echo $alunos["Nota Terceiro Bimestre"]; ?>
                            </td>

                            <td>
                                <?php echo $alunos["Nota Quarto Bimestre"]; ?>
                            </td>

                            <td class="<?php echo $cor; ?>">
                                <?php echo number_format($media, 1, ",", "."); ?>
                            </td>

                        </tr>

                        <?php
                    }

                    ?>

                </tbody>

            </table>

        </section>

    </main>

</body>

</html>