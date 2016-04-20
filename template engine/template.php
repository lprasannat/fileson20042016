<?php
class Template{
    private $var=array();
    public function assign($key,$value){
        $this->var[$key]=$value;
    }
    public function render($template_name){
        $path=$template_name.'.html';
        if(file_exists($path)){
            $contents=  file_get_contents($path);
            foreach($this->var as $key=>$value){
                $contents=preg_replace('/\['.$key.'\]/',$value,$contents);
            }
            $contents=preg_replace('/\<\!\-\- if(.*) \-\-\>/','<?php if($1):?>',$contents);
            $contents=preg_replace('/\<\!\-\- else \-\-\>/','<?php else:?>',$contents);
            $contents=preg_replace('/\<\!\-\-endif\-\-\>/','<?phpendif:?>',$contents);
            eval("?>$contents<?php");
        }else{
            exit('<h1>TemplateError</h1>');
        }
        
    }
}
?>