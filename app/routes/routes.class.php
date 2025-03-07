<?php

    class Routes{

        public function __construct(
            private array $routes = array(),
            private string $method = "",
            private string $path = ""
        ){
            $this->initRoutes();
            $this->startInstancia();
        }

        private function getRoutes(){
            return $this->routes;
        }

        private function getHttp(string $path, array $dados){
            $this->routes['GET'][$path] = $dados;
        }

        private function postHttp(string $path, array $dados){
            $this->routes['POST'][$path] = $dados;
        }

        private function initRoutes(){
            $this->getHttp("/", [indexController::class, "index"]);

            //USERS
            $this->getHttp("/login", [usersController::class, "login"]);
            $this->getHttp("/logoff", [usersController::class, "logoff"]);
            $this->getHttp("/getIdUserSession", [usersController::class, "getIdUserSession"]);

            $this->postHttp("/login", [usersController::class, "login"]);

            //CHAT
            $this->getHttp("/chat", [chatsController::class, "entrarChat"]);
            $this->postHttp("/chat", [chatsController::class, "entrarChat"]);

            //MESSAGE
            $this->getHttp("/getMessages", [messageController::class, "getMessages"]);
        }

        private function runRoutes(){
            $server = new Server;

            $this->method = $server->getMethodHttp();
            $this->path = $server->getPathHtpp();

            if(isset($this->routes[$this->method][$this->path])){
                return $this->routes[$this->method][$this->path];
            } else {
                return exit("Rota não conhecida.");
            }
        }

        private function startInstancia(){
            $route = $this->runRoutes();
            $controller = $route[0];
            $action = $route[1];
            $controller = new $controller;
            $controller->$action();
        }
    }
?>