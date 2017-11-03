<?php

namespace ASCII\Controller\Auth;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\CharactersModel;
use ASCII\Entity\User;
use ASCII\Manager\Manager;

class AuthController extends Controller
{

    public function auth ()
    {

    try {
        $model = new \stdClass();

        if (array_key_exists("user", $_SESSION)) {
            throw new \Exception("You are already logged");
        } 
        if (!($mail = filter_input(INPUT_POST, "user_mail"))
            ||  !($pswd = filter_input(INPUT_POST, "user_pswd"))
            ||  !($token = filter_input(INPUT_POST, "token"))
            ||  $token !== $_SESSION["token"]) {
        
            throw new \RuntimeException ();

        } elseif (!($user = Manager::getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(["userMail" => $mail]))) {
                throw new \OutOfBoundsException("rr");
        }
        // Le bon password?
        if   (!password_verify($pswd, $user->getUserPswd())) {
            throw new \OutOfBoundsException;
        }

        $_SESSION["user"] = [
            "userAgent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT"),
            "time"      => time(),
            "ip"        => filter_input(INPUT_SERVER, "REMOTE_ADDR"),
            "id"        => $user->getUserId(),
            "level"     => $user->getUserLevel()->getUserLevelName(),
        ]; 
        // var_dump($_SESSION);
        $model->success = "You are logged";
        } catch (\OutOfBoundsException $e) {
            $error = "Bad Credentials";
        } catch (\RuntimeException $e) {
        } catch (\Throwable $e) {
            $error = $e->getMessage();

        } finally {
            
            $model->error = isset($error) ? $error : null;
                return $this->render("auth/auth", [
                "token" => $_SESSION["token"],
                "user" => array_key_exists("user", $_SESSION) ? $_SESSION["user"]["level"] : null,
                "model" => $model
            ]);
        }
    }
       
    public function destroy ()
    {
       try {
           $model = new \stdClass;
           if (!array_key_exists("user", $_SESSION)) {
               throw new \Exception("You are still logged out");
           }
           if ($_SESSION["token"] !== filter_input(INPUT_GET, "token")) {
                throw new \Exception("You should not try madafaka");
           } 
           session_destroy();
           // Vide le boutton de session
           $_SESSION = [];

           $model->success = "You are logged out";
       } catch (\Throwable $e) {
            $model->error = $e->getMessage();
       } finally {
        return $this->render("auth/destroy", [
            "model" => $model, 
            "user" => array_key_exists("user", $_SESSION) ? $_SESSION["user"]["level"] : null,
            "token" => array_key_exists("user", $_SESSION) ? $_SESSION["token"]: null,
            header('Refresh: 3; URL=http://localhost/formation-php/web/auth?action=auth')
            ]);
       }  
    }
}