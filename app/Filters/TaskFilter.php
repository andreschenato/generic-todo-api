<?php

namespace App\Filters;

use Illuminate\Http\Request;


class TaskFilter{
    protected $safeParams = [
        "status" => ["eq"],
    ];

    protected $operatorMap = [
        "eq"=> "=",
    ];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if(!isset($query)) {
                continue;
            }

            $column = $param;

            foreach($operators as $operator) {
                if(isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}