<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Repositories\Contracts\ArticleRepository;
use App\Repositories\Validators\ArticleValidator;

use App\Services\ArticlesService as Service;


class ArticlesController extends Controller
{

    /**
     * @var ArticleRepository
     */

    /**
     * @var ArticleValidator
     */
    protected $service;

    protected $validator;
    public function __construct(Service $service, ArticleValidator $validator)
    {
        $this->service = $service;
        $this->validator = $validator;
    }


    public function create(){
        return view('articles.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->service->index();

        dd($results);
        return view('articles.index')->with($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $results = $this->service->store();

            return $results;
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $article,
            ]);
        }

        return view('articles.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = $this->repository->find($id);

        return view('articles.edit', compact('article'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $article = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Article updated.',
                'data'    => $article->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Article deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Article deleted.');
    }
}
