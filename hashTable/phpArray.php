<?php

/*
 * @Descripttion: 
 * @Author: czm
 * @Date: 2020-04-02 16:13:14
 */

// arData：散列表中保存存储元素的数组，其内存是连续的，arData 指向数组的起始位置；
// nTableSize：数组的总容量，即可以容纳的元素数，arData 的内存大小就是根据这个值确定的，它的大小的是 2 的幂次方，最小为 8，然后按照 8、16、32...依次递增；
// nTableMask：这个值在散列函数根据 key 的哈希值映射元素的时候用到，它的值实际就是 nTableSize 的负数，即  nTableMask = -nTableSize，用位运算来表示就是 nTableMask = ~nTableSize + 1；
// nNumUsed、nNumOfElements：nNumUsed 是指数组当前使用的 Bucket 数，但不是数组有效元素个数，因为某个数组元素被删除后并没有立即从数组中删除，而是将其标记为 IS_UNDEF，只有在数组需要扩容时才会真正删除，nNumOfElements 则表示数组中有效的元素数量，即调用 count 函数返回值，如果没有扩容，nNumUsed 一直递增，无论是否删除元素；
// nNextFreeElement：这个是给自动确定数值索引使用的，默认从 0 开始，比如 $arr[] = 200，这个时候 nNextFreeElement 值会自动加 1；
// pDestructor：当删除或覆盖数组中的某个元素时，如果提供了这个函数句柄，则在删除或覆盖时调用此函数，对旧元素进行清理；
// u：这个联合体结构主要用于一些辅助作用。

// typdef struct _Bucket{
//     zval val;
//     zend_ulong h;
//     zengd_string *key;
// }Bucket;

//数组周期
// 1、初始化时并不会立即分配 arData 的内存，插入第一个元素之后才会分配 arData 的内存。初始化操作可以通过 zend_hash_init 宏完成，最后由 _zend_hash_init_int 函数处理
// 2、插入时会检查数组是否已经分配存储空间，因为初始化并没有实际分配 arData 的内存，在第一次插入时才会根据 nTableSize 的大小分配 分配以后会把 HashTable->u.flags 打上 HASH_FLAG_INITIALIZED 掩码，这样，下次插入时发现已经分配了就不会重复操作，这段检查逻辑位于 _zend_hash_add_or_update_i 函数中
// 3、PHP 数组底层的散列表采用链地址法解决哈希冲突，即将冲突的 Bucket 串成链表。
// 4、清楚了 HashTable 的实现和哈希冲突的解决方式之后，查找的过程就比较简单了：首先根据 key 计算出的散列值与 nTableMask 计算得到最终散列值 nIndex，然后根据散列值从中间映射表中得到存储元素在有序存储数组中的位置 idx，接着根据 idx 从有序存储数组（即 arData）中取出 Bucket，遍历该 Bucket，判断 Bucket 的 key 是否是要查找的 key，如果是则终止遍历，否则继续根据  zval.u2.next 遍历比较。
// 5、关于数组数据删除前面我们在介绍散列表中的 nNumUsed 和 nNumOfElements 字段时已经提及过，从数组中删除元素时，并没有真正移除，并重新 rehash，而是当 arData 满了之后，才会移除无用的数据，从而提高性能。即数组在需要扩容的情况下才会真正删除元素：首先检查数组中已删除元素所占比例，如果比例达到阈值则触发重新构建索引的操作，这个过程会把已删除的 Bucket 移除，然后把后面的 Bucket 往前移动补上空位，如果还没有达到阈值则会分配一个原数组大小 2 倍的新数组，然后把原数组的元素复制到新数组上，最后重建索引，重建索引会将已删除的 Bucket 移除

// API_URL/api/user/companies?sso_token=eyJpdiI6IkduTWFLOXlZeWg2aGdUQ2ljV1FcL1FnPT0iLCJ2YWx1ZSI6IjlvTDIwbFRVVE04QitRWUhxb3plTVBKdGpsSjRsOCtvZk1NYVh6RnM0eGZwd0g3b3ZQODRJK2d0VGVyUnlpVldrT2dyODZqS2ErdHZtWWlNazF
// API_URL=http://192.168.1.110:7002（测试）

