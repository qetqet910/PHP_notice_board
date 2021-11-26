<?php



class SELECT_cateNoWhere
{
    public function getAll()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'notice_board');
        if ($conn->connect_error) {
            die($conn->connect_error);
        }

        $cates = [];

        $result = $conn->query("SELECT * FROM notice_cate");

        if ($result) {
            while ($cate = $result->fetch_array(MYSQLI_ASSOC)) {
                $cates[] = $cate;
            }
        }

        return $cates;
    }
}
