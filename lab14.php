<?php
class Page
{
    private string $name;
    private string $template;

    public function __construct(string $name, string $template)
    {
        $this->name = $name;
        $this->template = $template;
    }

    public function render(): void
    {
        echo $this->template;
    }
}

class BlogPage extends Page
{
    public function __construct()
    {
        $template = <<<HTML
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="border:1px solid #ccc; padding:10px; width:200px;">
                <h3>Новость 1</h3>
                <p>Краткое описание первой новости.</p>
            </div>
            <div style="border:1px solid #ccc; padding:10px; width:200px;">
                <h3>Новость 2</h3>
                <p>Краткое описание второй новости.</p>
            </div>
            <div style="border:1px solid #ccc; padding:10px; width:200px;">
                <h3>Новость 3</h3>
                <p>Краткое описание третьей новости.</p>
            </div>
        </div>
        HTML;
        parent::__construct('blog', $template);
    }
}

$pageParam = $_GET['page'] ?? null;
$content = null;

if ($pageParam === 'page') {
    $defaultTemplate = '<div><p>It is a default page</p></div>';
    $page = new Page('page', $defaultTemplate);
    ob_start();
    $page->render();
    $content = ob_get_clean();
} elseif ($pageParam === 'blog') {
    $blog = new BlogPage();
    ob_start();
    $blog->render();
    $content = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 14</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; padding: 5px 10px; background: #007bff; color: white; text-decoration: none;}
    </style>
</head>
<body>
    <div class="nav">
        <a href="?page=page">Обычная страница</a>
        <a href="?page=blog">Блог с карточками</a>
    </div>
    <hr>
    <?php
    if ($content !== null) {
        echo $content;
    } else {
        echo "<p>Добро пожаловать! Выберите одну из страниц по ссылкам выше.</p>";
    }
    ?>
</body>
</html>
