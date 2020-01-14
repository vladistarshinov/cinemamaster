<h1>Все новости</h1>

<?php foreach ($news as $key => $value): ?>
    <h2> <a href="view/<?php echo $value['slug']; ?>"> <?php echo $value['title']; ?> </a> </h2>
<?php endforeach ?>
