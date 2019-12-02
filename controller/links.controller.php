<?php
class LinksController{
    static public function ctrShowRoles($item, $value){
        $table = "links";
        $request = ModelLinks::modShowLinks($table, $item, $value);
        return $request;
    }
}
?>
