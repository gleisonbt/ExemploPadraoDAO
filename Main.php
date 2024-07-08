<?php

require_once 'User.php';
require_once 'UserDao.php';
require_once 'UserDaoImpl.php';
require_once 'DBConnection.php';

class Main {
    public static function main() {
        $userDao = new UserDaoImpl();

        // Mostra todos os usuários
        $users = $userDao->getAllUsers();
        foreach ($users as $user) {
            echo "ID: " . $user->getId() . ", Name: " . $user->getName() . ", Email: " . $user->getEmail() . "\n";
        }

        // Mostra apenas um usuário
        $user = $userDao->getUser(1);
        echo "ID: " . $user->getId() . ", Name: " . $user->getName() . ", Email: " . $user->getEmail() . "\n";

        // Atualiza um usuário
        $user->setEmail("email@exemple.com");
        $userDao->updateUser($user);

        // Deleta um usuário
        $userDao->deleteUser($user);
    }
}

Main::main();

?>
