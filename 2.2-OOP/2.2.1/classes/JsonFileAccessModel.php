<?php
class JsonFileAccessModel
{
    protected $fileName;
    protected $file;

    function __construct($fileName) {
        $this->fileName = Config::DATABASE_PATH . $fileName . '.json';
    }

    private function connect() {
        $this->file = fopen($this->fileName, 'r+');

    }

    private function disconnect() {
        fclose($this->file);
    }

    public function read() {
        $fd = fopen($this->fileName, 'r+');
        while(!feof($fd))
        {
            $str = htmlentities(fread($fd, 600));
        }
        fclose($fd);
        return $str;
    }

    public function write($text) {
        $fd = fopen($this->fileName, 'w');
        fwrite($fd,  $text);
        fclose($fd);
    }

    public function readJson() {
        $fd = fopen($this->fileName, 'r+');
        while(!feof($fd))
        {
            $str = htmlentities(fread($fd, 600));
        }
        fclose($fd);
        $jsonFile = json_encode($str);
        return $jsonFile;
    }

    public function writeJson($jsonFile) {
        $json = json_encode($jsonFile,JSON_PRETTY_PRINT);
        fwrite($this->file,  $json);
        fclose($fd);
    }
}
