<?php


namespace App\Controllers\Admin;


use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Model\Category;

class ProductCategoryController
{
    public $table_name = 'categories';
    public $categories;
    public $links;

    public function __construct()
    {
        $total = Category::all()->count();
        $object = new Category();

        list($this->categories, $this->links) = paginate(10, $total, $this->table_name, $object);

    }


    public function show()
    {
       return view('admin/products/categories', [
           'categories' => $this->categories,
           'links' => $this->links
       ]);
    }

    public function store()
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest();

                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                   $errors = $validate->getErrorMessages();
                    return view('admin/products/categories', [
                        'categories' => $this->categories,
                        'links' => $this->links,
                        'errors' => $errors
                    ]);
                }
                // process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug(translit($request->name))
                ]);
                $categories = Category::all();
                $message = 'Category Created';
                $total = Category::all()->count();
                $object = new Category();
                list($this->categories, $this->links) = paginate(10, $total, $this->table_name, $object);
                return view('admin/products/categories', [
                    'categories' => $this->categories,
                    'links' => $this->links,
                    'message' => $message
                ]);

            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'string' => true, 'unique' => 'categories']
                ];

                $validate = new ValidateRequest();

                $validate->abide($_POST, $rules);

                if ($validate->hasError()) {
                    $errors = $validate->getErrorMessages();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }

                Category::where('id', $id)->update(['name' => $request->name/*, 'slug' => slug(translit($request->name))*/]);

                echo json_encode(['success' => 'Record Update Successfully']);
                exit;

            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

}