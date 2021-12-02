<?php

namespace  App\Repo\Invoice;

interface InvoiceFace
{
    public function index();

    public function create($v);

    public function store($v);

    public function edit($v);

    public function update($v1, $v2);
    // public function reSet($v);

    public function destroy($v);
}