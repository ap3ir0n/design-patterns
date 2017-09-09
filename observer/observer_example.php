<?php

namespace Observer;

spl_autoload_register(function ($class_name) {
    include 'observer.php';
});

class Auth extends Subject 
{
    public function login() {
        $this->setState("login");
    }
    
    public function logout() {
        $this->setState("logout");
    }
}

class AuthForumHook extends Observer 
{
    public function update(Subject $subject) {
        if ($subject->getState() === 'login') {
            $this->onLogin($subject);
        } elseif ($subject->getState() === 'logout') {
            $this->onLogout($subject);
        }
    }
    
    public function onLogin($subject) {
        echo "User in!\r\n";
    }

    public function onLogout($subject) {
        echo "User out!\r\n";
    }

}

$auth = new Auth();
$auth->attach(new AuthForumHook());

$auth->login();
$auth->logout();