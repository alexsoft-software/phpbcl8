<?php

array_first([1, 2, 3]); // 1
array_first([2, 3]); // 2
array_first(['a' => 2, 'b' => 1]); // 2
array_first([null, 2, 3]); // null
array_first([]); // null
array_first([$obj, 2, 3]); // $obj
array_first([1]); // 1
array_first([true]); // true
?>