<?php

array_last([1, 2, 3]); // 3
array_last([2, 3]); // 3
array_last(['a' => 2, 'b' => 1]); // 1
array_last([2, 3, null]); // null
array_last([]); // null
array_last([2, 3, $obj]); // $obj
array_last([1]); // 1
array_last([true]); // true
?>