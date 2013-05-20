<?php
class OutputJson extends View
{
    public function render($json)
    {
        echo $this->fetch($json);
    }

    protected function fetch($json)
    {
        return json_encode($json);

    }
}
?>
