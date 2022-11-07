<main class="content">
    <?php
        renderTitle(
            'Relatório Mensal',
            'Acompanhe seu saldo de horas',
            'icofont-ui-calendar'
        )
    ?>
    <div>
        <form action="#" method="post" class="d-flex">
            <?php if($user->is_admin) : ?>
                <select name="user" class="form-control mr-2" placeholder="Selecione o usuario">
                    <?php
                        foreach($users as $user) {
                            $selected = $user->id === $selectedUserId ? 'selected' : '';
                            echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
                        }
                    ?>
                </select>
            <?php endif ?>
            <select name="period" class="form-control" placeholder="Selecione o periodo">
                <?php
                    foreach($periods as $key => $month) {
                        $month = fomartDateToUtf($month);
                        $selected = $key === $selectedPeriod ? 'selected' : '';
                        echo "<option value='{$key}' ${$selected}>{$month}</option>";
                    }
                ?>
            </select>
            <button class="btn btn-primary ml-2">
                    <i class="icofont-search"></i>
            </button>
        </form>
        <div class="bg-primary p-2 text-white d-flex my-2">
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
