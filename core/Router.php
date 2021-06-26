<?php

class Router
{
    protected $routes;

    public function __construct($definitions)
    {
        $this->routes = $this->complileRoutes($definitions);
    }

    public function compileRoutes($definitions)
    {
        $routes = array();

        foreach ($definitions as $url => $params){
            $tokens = explode('/', ltrim($url,'/'));
            foreach($tokens as $i => $token){
                if(0 === strpos($token, ':')){
                    $name = substr($token,1);
                    $token = '?P<' . $name . '>[^/]+)';
                }
                $tokens[$i] = $token;
            }
            $tokens[$i] = $token;
        }

        $pattern = '/' . implode('/', $tokens);
        $routes[$pattern] = $params;
    }
        return $routes;
    }

    class Router
    {
        public function resolve($path_info)
        {
            if('/' !== substr($path_info,0,1)){
                $path_info = '/' . $path_info;
            }

            foreach ($this->routes as $pattern => $params){
                if(preg_match('#^'.$pattern . '$#',$path_info,$matches)){
                    $params = array_merge($parms,$matches);

                    return $params;
                }
            }

            return false;
        }
    }
}