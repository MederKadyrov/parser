<?php

namespace Meder\ParserProject\Model;

interface DataSourceInterface
{
    public function fetch(): array;
}
