<?php

class Application
{
    /** @var null The controller */
    private $urlcontroller = null;

    private $urlaction = null;

    private $url_params = array();


    public function __construct()
    {
    
        $this->checkUrl();

        if (!$this->urlcontroller) { //default home controller

            require APP . 'controller/home.php';
            $page = new Home();
            $page->index();

        } elseif (file_exists(APP . 'controller/' . $this->urlcontroller . '.php')) {  // check if controller exist
             require APP . 'controller/' . $this->urlcontroller . '.php';
            $this->urlcontroller = new $this->urlcontroller();

    
            if (method_exists($this->urlcontroller, $this->url_action)) {

                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->urlcontroller, $this->url_action), $this->url_params);
                } else {
                    $this->urlcontroller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) { // if no action than set default action to index
                
                    $this->urlcontroller->index();
                }
                else {
                    header('location: ' . URL . 'home/error404');
                }
            }
        } else {
            header('location: ' . URL . 'home/error404');
        }
    }

    /**
     * Get and split the URL
     */
    private function checkUrl()
    {
        if (isset($_GET['url'])) {

                        $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

              $this->urlcontroller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;
    
            unset($url[0], $url[1]);
            $this->url_params = array_values($url);
        }
    }
}
