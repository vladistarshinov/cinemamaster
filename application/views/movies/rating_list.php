<h1><?php echo $title; ?></h1>
<hr>

    <?php echo $pagination; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Фильм</th>
                    <th class="text-center">Год</th>
                    <th class="text-center">Рейтинг</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movie_data as $key=>$value): ?>
                    <tr>
                        <td class="col-lg-1 col-md-1 col-xs-2">
                        <img class="img-responsive img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['poster']; ?>">
                        </td>
                        <td class="vert-align"><a href="/movies/view/<?php echo $value['slug']; ?>/"><?php echo $value['name']; ?></a></td>
                        <td class="text-center vert-align"><?php echo $value['year']; ?></td>
                        <td class="text-center vert-align"><span class="badge"><?php echo $value['rating']; ?></span></td>
                    </tr>

                <?php endforeach;?>
            </tbody>

        </table>

    <?php echo $pagination; ?>