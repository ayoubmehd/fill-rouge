<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface EloquentRepositoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function paginate(): Collection;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $payload
     * @return App\Models\CtmPost
     */
    public function store(Request $request, array $payload): Model;

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  array  $payload
     * @return Bool
     */
    public function update(Request $request, $id, array $payload): Bool;


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Bool
     */
    public function destroy($id): Bool;
}
