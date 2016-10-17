<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Route;

use Illuminate\Support\Facades\Input;

use View;

class FormController extends Controller
{
    // 对应的模型 -> 表示这个Controller是对哪个Model进行单表操作的
    protected $model;

    // 所有的字段 -> 显示名字，字段是否要进行搜索，字段类型是什么
    protected $fields_all;

    // 列表页字段 -> (array)存放fields_all中需要显示的字段 是一个
    protected $fields_show;

    // 编辑页字段 -> 存放edit页面需要显示的字段
    protected $fields_edit;

    // 创建页字段 -> 存放create/add等页面需要显示的字段
    protected $fields_create;



    //public function __construct(Request $request)
    public function __construct()    {

        // TODO:做一些基础的判断，如果没有的话就抛出异常

        //问题 找不到Route类 已解决 没有使用对应的命名空间 添加use Route
        //问题 未解决 整理时查看一下use Route的Route是哪来的
        $route = Route::currentRouteAction();
        list($this->controller, $action) = explode('@', $route);

        // 取得Controller 的名字，不包含 namespace.
        // 问题 整理时测试此条代码的函数返回值情况 未解决
        $controller_name = substr($this->controller, strrpos($this->controller, "\\") + 1);
        view()->share('controller', $controller_name );

        $fields_show = array();
        foreach ($this->fields_show as $field) {
            $fields_show[$field] = $this->fields_all[$field];
        }
        view()->share('fields_show', $fields_show);

        $fields_edit = array();
        foreach ($this->fields_edit as $field) {
            $fields_edit[$field] = $this->fields_all[$field];
        }
        view()->share('fields_edit', $fields_edit);

        $fields_create = array();
        foreach ($this->fields_create as $field) {
            $fields_create[$field] = $this->fields_all[$field];
        }
        View::make('fields_create', $fields_create);

        //问题 未解决 能否在这里判断是否有表单输入? 如何判断?
//         if()
//         {
             view()->share('input', Input::all());
//         }
    }

 //下面开始重写resource路由的控制器方法
   //index方法
    public function index(Request $request)
    {
        return view('admin.index');
        $model = new $this->model;
        $builder = $model->orderBy('id', 'desc');

        $input = $request->all();
        foreach ($input as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (!isset($this->fields_all[$field])) {
                continue;
            }
            $search = $this->fields_all[$field];
            $builder->whereRaw($search['search'], [$value]);
        }
        $models = $builder->paginate(20);

        return view('form.index', [
            'models' => $models,
        ]);
    }

   //create方法
    public function create()
    {
        return view('form.create', []);
    }

   //store方法
    public function store(Request $request)
    {
        $model = new $this->model;
        $model->fill($request->all());
        $model->save();
        return Redirect::to(action($this->controller . '@index'));
    }

   //edit方法
    public function edit($id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        return view('form.edit', compact('model'));
    }

   //update方法
    public function update(Request $request,$id)
    {
        $model = new $this->model;
        $model = $model->find($id);
        $model->fill($request->all());
        $model->save();

        return Redirect::to(action($this->controller . '@index'));
    }

   //destroy方法
    public function destroy($id)
    {
        $model = new $this->model;
        $model->destroy($id);

        return Redirect::to(action($this->controller . '@index'));
    }

    public function show(){
        //
    }

}

