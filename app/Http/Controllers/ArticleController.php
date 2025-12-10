<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(2); // количество статей на странице. По умолчанию 15
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    public function create()
    {
        // Передаем в шаблон вновь созданный объект. Он нужен для вывода формы
        $article = new Article();
        return view('article.create', compact('article'));

    }
    // Обработчик данных формы
    // Здесь понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:50',
        ]);

        $article = new Article();
        // Заполнение статьи данныит из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();
        // Создаем флеш сообщение 
        \Session::flash('flash_success', 'Статья была создана успешно!');

        // Редирект на указанный маршрут 
        return redirect()->route('article.index');
    }
}
