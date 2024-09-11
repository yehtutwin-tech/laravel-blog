<?php
// app/View/Components/Article/ArticleItem.php
namespace App\View\Components\Article;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleItem extends Component
{
    public $article;

    /**
     * Create a new component instance.
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.article-item');
    }
}
