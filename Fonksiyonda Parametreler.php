<?php
    function test()
    {
        echo func_num_args() . '<br>';
        print_r(func_get_args()) . '<br>';
        echo func_get_arg(2);
    }

    test('metehan', 'siber', 'vatan', 'yavuzlar');

?>