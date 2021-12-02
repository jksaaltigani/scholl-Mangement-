<?php

namespace  App\Repo\Recept;

interface ReceptFace
{
    public function index();

    // public function create($v);

    public function store($v);

    public function edit($v);

    public function update($v1, $v2);
    // public function reSet($v);

    public function destroy($v);

    public function show($id);
}