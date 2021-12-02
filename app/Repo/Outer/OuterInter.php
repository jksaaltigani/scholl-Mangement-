<?php

namespace  App\Repo\Outer;

interface OuterInter
{
    public function index();

    public function create();

    public function store($v);

    public function reSet($v);

    public function destroy($v);
}