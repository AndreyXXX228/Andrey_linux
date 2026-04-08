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

$blog = new BlogPage();
$blog->render();
