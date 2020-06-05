<?php

// PHP 提供的字符串匹配函数多是单模式匹配，因此大多通过 KMP 算法实现，我们以 strstr 函数为例，简单对底层实现源码进行剖析。

// strstr 是 PHP 标准库提供的函数，所以可以在 ext/standard/string.c 中找到其定义：

// 所以综合来看，strstr 的时间复杂度就是 KMP 算法的时间复杂度，是 O(n+m)，其中 n 是主串长度，m 是模式串长度。

// strpos 函数和 strstr 函数底层实现原理一样，你可以参考 strstr 函数的源码分析思路去查看。