<?php

class UserDao extends Controller
{
    public function createUser()
    {
        $db = connectDb();
        if (isset($_POST['forminscription'])) {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = hash('sha256', $_POST['password']);
            if ($this->checkUser()) {
                $sql = "INSERT INTO Users (username, password, email) VALUES (:username, :password, :email)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function checkUser()
    {
        $db = connectDb();
        $username = htmlspecialchars($_POST['username']);
        $mail = htmlspecialchars($_POST['email']);
        $mdp =
            hash('sha256', $_POST['password']);
        $mdp2 =
            hash('sha256', $_POST['password2']);
        $reqpseudo = $db->prepare("SELECT * FROM Users WHERE Username = ?");
        $reqpseudo->execute(array($username));
        $pseudoexist = $reqpseudo->rowCount();
        if ($pseudoexist == 0) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $db->prepare("SELECT * FROM Users WHERE Email = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    if ($mdp == $mdp2) {
                        return TRUE;
                    } else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                } else {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            } else {
                $erreur = "Votre adresse mail n'est pas valide !";
            }
        } else {
            $erreur = "Pseudo déjà utilisé !";
        }
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
    }

    public function connectUser()
    {
        $db = connectDb();
        if (isset($_POST['formconnexion'])) {
            $username = htmlspecialchars($_POST['username']);
            $password =
                hash('sha256', $_POST['password']);
            if (!empty($username) and !empty($password)) {
                $requser = $db->prepare("SELECT * FROM Users WHERE Username = ? AND Password = ?");
                $requser->execute(array($username, $password));
                $userexist = $requser->rowCount();
                if ($userexist == 1) {
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['ID'];
                    $_SESSION['username'] = $userinfo['Username'];
                    $_SESSION['mail'] = $userinfo['Email'];
                    return TRUE;
                } else {
                    $erreur = "Mauvais mail ou mot de passe !";
                }
            } else {
                $erreur = "Tous les champs doivent être complétés !";
            }
        }
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
    }

    public function updateUser()
    {
        $db = connectDb();
        if ($_SESSION['username'] != 'admin')
        {
            $updateID = $_SESSION['id'];
        }
        else {
            $updateID = $_POST['id'];
        }
        if (isset($_SESSION['id'])) {
            $requser = $db->prepare("SELECT * FROM Users WHERE id = ?");
            $requser->execute(array($updateID));
            $user = $requser->fetch();
            if (isset($_POST['newpseudo']) and !empty($_POST['newpseudo']) and $_POST['newpseudo'] != $user['Username']) {
                $newpseudo = htmlspecialchars($_POST['newpseudo']);
                $insertpseudo = $db->prepare("UPDATE Users SET Username = ? WHERE id = ?");
                $insertpseudo->execute(array($newpseudo, $updateID));
                return TRUE;
            }
            if (isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['Email']) {
                $newmail = htmlspecialchars($_POST['newmail']);
                $insertmail = $db->prepare("UPDATE Users SET Email = ? WHERE id = ?");
                $insertmail->execute(array($newmail, $updateID));
                return TRUE;
            }
            if (isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2'])) {
                $mdp1 = hash('sha256',$_POST['newmdp1']);
                $mdp2 = hash('sha256',$_POST['newmdp2']);
                if ($mdp1 == $mdp2) {
                    $insertmdp = $db->prepare("UPDATE Users SET Password = ? WHERE id = ?");
                    $insertmdp->execute(array($mdp1, $updateID));
                    return TRUE;
                } else {
                    echo "Vos deux mdp ne correspondent pas !";
                }
            }
        }
    }

    public function getAllUsers()
    {
        $db = connectDb();
        $sql = "SELECT * FROM Users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function delete()
    {
        $db = connectDb();
        $sql = "DELETE FROM Users WHERE id =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($_POST['id']));
        return TRUE;
    }

    public function deleteByUser()
    {
        $db = connectDb();
        $sql = "DELETE FROM Users WHERE id =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($_SESSION['id']));
        return TRUE;
    }

    public function getName($id){
        $db = connectDb();
        $sql = "SELECT Username FROM Users WHERE id =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['Username'];
    }
}
