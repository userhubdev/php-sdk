<?php

namespace UserHub\Internal;

interface Transport
{
    public function execute(Request $request): Response;
}
