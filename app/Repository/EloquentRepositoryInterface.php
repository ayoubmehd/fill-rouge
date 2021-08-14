<?php

namespace App\Repository;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface EloquentRepositoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function paginate();

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $payload
     * @return App\Models\CtmPost
     */
    public function store(array $payload): Model;

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Models\CtmPost
     */
    public function show($id): Model;


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  array  $payload
     * @return Bool
     */
    public function update($id, array $payload): Bool;


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Bool
     */
    public function destroy($id): Bool;

    /**
     * Associate a model with the current model
     *
     * @param  Model  $rel
     * @param  string  $relName
     * @return void
     */
    public function associate(string $relName, Model $rel): void;
}
