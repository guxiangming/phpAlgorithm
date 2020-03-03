<?php
    // bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )

    // sort > ext >standard >php_array.h

    // 查看 zend_sort 函数的源码，可以看到当数据量较小时（小于等于16)，会使用插入排序，因为此时插入排序性能更好；否则会使用快速排序。


    ln /usr/src/kernels/3.10.0-1062.12.1.el7.x86_64/include/generated/uapi/linux/version.h /usr/src/kernels/3.10.0-1062.12.1.el7.x86_64/include/linux/version.h


    ln -s /usr/src/kernels/3.10.0-1062.12.1.el7.x86_64/include/generated/uapi/linux/version.h /usr/src/kernels/3.10.0-1062.12.1.el7.x86_64/include/linux/version.h


    cp /usr/src/kernels/3.10.0-1062.12.1.el7.x86_64/include/generated/uapi/linux/version.h /lib/modules/3.10.0-1062.12.1.el7.x86_64/build/include/linux/