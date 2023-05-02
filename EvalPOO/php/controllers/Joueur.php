<?php

class Joueur extends UserDao
{
    public function signIn()
    { 
        try{
        $this->createUser();
        $this->render('sign_in');
    } 
    catch (Exception $e) 
    {
        trigger_error("Erreur lors de la création du compte", E_USER_WARNING);
    }
    }

    public function logIn()
    {
        $this->connectUser();
        if ($_SESSION['username'] == 'admin') 
        {
            $this->render('dashboard_admin');
        }
        else
        {
            $this->render('dashboard_user');
        }
        

    }

    public function logOut()
    {
        $_SESSION = array();
        session_destroy();
        $this->render('index_template');
    }

    public function update()
    {
        if ($this->updateUser())
        {
            if ($_SESSION['username'] == 'admin')
            {
                echo "Les données ont été mis à jour";
                $this->render('dashboard_admin');
            }
            else
            {
                echo "Les données ont été mis à jour";
                $this->render('dashboard_user');
            } 
        }
        else
        {
            echo "Erreur lors de l'update";
        }
        
    }

    public function deleteUser()
    {
        if ($this->delete())
        {
            echo "Les données ont été supprimés";
            $this->render('index_template');
        }
        else
        {
            trigger_error("Erreur lors de la suppression", E_USER_WARNING);
            $this->render('dashboard_admin');
        }
        
    }

    public function deleteThisUser()
    {
        if ($this->deleteByUser()) 
        {
            echo "Les données ont été supprimés";
            $this->render('index_template');
            session_destroy();
        } 
        else 
        {
            trigger_error("Erreur lors de la suppression", E_USER_WARNING);
            $this->render('dashboard_admin');
        }
    }

}