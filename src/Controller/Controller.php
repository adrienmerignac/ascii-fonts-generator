<?php

namespace ASCII\Controller;

use ASCII\Http\Response;

abstract class Controller
{
    
    protected $response;
    
    public function __construct()
    {
        $this->response = new Response();
        session_start();

    if (!array_key_exists("token", $_SESSION)) {
        $_SESSION["token"] = password_hash(uniqid(), PASSWORD_DEFAULT);
    } elseif (array_key_exists("user", $_SESSION)
        && $_SESSION["user"]["ip"] !== filter_input(INPUT_SERVER, "REMOTE_ADDR")
        && $_SESSION["user"]["userAgent"] !== filter_input(INPUT_SERVER, "HTTP_USER_AGENT")) 
        {
            die("GTFO BITCH !!");
        }
    } 
    
    private function getTemplateName(string $template): string 
    {
        return  __DIR__ . "/../../app/views/" . $template . ".php";
    }
     
    protected function isSuperAdmin() {
        if(!($_SESSION["user"]["level"] == "superadmin") && !($_SESSION)["user"]["level"] == "admin") {
			$this->response->addHeader("Location", "/formation-php/web/auth?action=auth");
			return $this->response;
		} 
    }

    protected function render(string $template, array $data): Response 
    {
        $fileName = $this->getTemplateName($template);
        if (is_file($fileName)) {
        	extract($data);                             
//          Déclarer un tampon
            ob_start();
//          On peut inclure tranquillement
            include $fileName;
//          Récuperer le contenu du tampon
            $output = ob_get_contents();
//          Désactiver le tampon
            ob_end_clean();
            $this->response->setBody($output);
            return $this->response;
        }
        throw new \Exception("Template: " . $template . "is not a file");
    }
}