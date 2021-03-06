<?php

namespace CodeFin\Http\Controllers;

use Illuminate\Http\Request;

use CodeFin\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CodeFin\Http\Requests\BankAccountCreateRequest;
use CodeFin\Http\Requests\BankAccountUpdateRequest;
use CodeFin\Repositories\BankAccountRepository;



class BankAccountsController extends Controller
{

    /**
     * @var BankAccountRepository
     */
    protected $repository;

    /**
     * @var BankAccountValidator
     */
    protected $validator;

    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = $this->repository->skipPresenter(false)->all();

        return $bankAccounts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankAccountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {


            $bankAccount = $this->repository->create($request->all());
            return response()->json($bankAccount, 201);
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
        $bankAccount = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json($bankAccount);
        }

        return view('bankAccounts.show', compact('bankAccount'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BankAccountUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {

            $bankAccount = $this->repository->update($request->all(), $id);
            return response()->json($bankAccount);
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
        $this->repository->delete($id);

        return response()->json([],204);
    }
}
