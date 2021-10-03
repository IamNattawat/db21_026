<?php
class Color
{
    public $Col_ID;
    public $ColName;

    public function __construct($Col_ID,$ColName)
    {
        $this->Col_ID = $Col_ID;
        $this->ColName = $ColName;
    }

    public static function getAll()
    {
        $colorList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Product_Color";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $Col_ID = $my_row[PC_ID];
            $ColName = $my_row[ColorName];
            $colorList[] = new Color($Col_ID,$ColName);
        }
        require("connection_close.php");
        return $colorList;
    }
}
?>