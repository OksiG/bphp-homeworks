<?php
class Users extends JsonDataArray
{
    public function displaySortedList() {
        $test = new Users;
        $test->newQuery()->getObjs();
        echo $test;
    }
}
?>