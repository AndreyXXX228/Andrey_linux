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

$page = new Page('page', '<div><p>It is a default page</p></div>');
$page->render();
