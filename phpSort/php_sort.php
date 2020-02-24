<?php
    // bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )

    // sort > ext >standard >php_array.h

    // 查看 zend_sort 函数的源码，可以看到当数据量较小时（小于等于16)，会使用插入排序，因为此时插入排序性能更好；否则会使用快速排序。