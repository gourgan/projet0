<?php


class acteur{
        private $login;
        private $mdp;
        private $role;
        private $email;
        
        function __construct($login, $mdp, $role, $email) {
            $this->login = $login;
            $this->mdp = $mdp;
            $this->role = $role;
            $this->email = $email;
        }
        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function getMdp() {
            return $this->mdp;
        }

        public function setMdp($mdp) {
            $this->mdp = $mdp;
        }

        public function getRole() {
            return $this->role;
        }

        public function setRole($role) {
            $this->role = $role;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }


    
    
}
?>
