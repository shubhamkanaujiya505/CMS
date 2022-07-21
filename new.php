 <?php

function sum(...$numbers) {  // ... means access current object value
    $sum = 0;
    foreach ($numbers as $n) {
        $sum += $n;
    }
    return $sum ;
}

echo sum(1, 2, 3, 4, 5, 3, 4, 5, 6, 7);
?>
<!--
// function add($a)
// {
// $num = array_sum(explode(',',$a['n'])); // explode(",",$arr);
// // foreach($num as $v)
// // // {
// // $sum+=$v;
// // }
// echo $num;
// }
// //call function add
// if(isset($_GET['add']))
// {
// add($_GET['n']);
// }

// // //
// <form>
// <input type="text" name="n"/><br/>
// <input type="submit" value="add" name="add"/>
// </form>
//  -->

 <!-- array_sum(explode(',',$a['n']))); -->
