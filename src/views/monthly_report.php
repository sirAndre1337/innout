<main class="content">
    <?php
        renderTitle(
            'Relatório Mensal',
            'Acompanhe seu saldo de horas',
            'icofont-ui-calendar'
        )
    ?>
    <div>
        <div class="bg-primary p-2 text-white d-flex">
            <div class="mr-auto">
                <span class="mr-2">Horas Trabalhadas : </span>
                <span><?= $sumOfWorkedTime ?></span>
            </div>
            <div>
                <span>Saldo Mensal : </span>
                <span class="text-success mx-2 <?= strpos($balance, '+') !== false ? 'text-succes' : 'text-danger' ?>">
                    <?= $balance ?>
                </span>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saida 1</th>
                <th>Entrada 2</th>
                <th>Saida 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php foreach($report as $registry): ?>
                        <tr>
                            <td><?= fomartDateToUtf(formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y')) ?></td>
                            <td><?= $registry->time1 ?></td>
                            <td><?= $registry->time2 ?></td>
                            <td><?= $registry->time3 ?></td>
                            <td><?= $registry->time4 ?></td>
                            <td><?= $registry->getBalance() ?></td>
                        </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
